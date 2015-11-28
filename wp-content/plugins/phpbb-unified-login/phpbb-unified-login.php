<?php
/**
 * @package PhpBB_Unified_Login
 * @version 1.0
 */
/*
Plugin Name: phpBB Unified Login
Author: StrasWeb
Version: 1.0
Author URI: http://strasweb.fr/
*/
global $db;
$phpEx = "php";
define('IN_PHPBB', true);
define('ROOT_PATH', get_option('phpbb_root'));
$phpbb_root_path = ROOT_PATH . '/';
if (is_file($phpbb_root_path . 'config.'.$phpEx)) {
    require $phpbb_root_path . 'config.'.$phpEx;
    require $phpbb_root_path . 'includes/constants.'.$phpEx;
    require $phpbb_root_path . 'includes/functions.'.$phpEx;
    require $phpbb_root_path . 'includes/acm/acm_' . $acm_type . '.' . $phpEx;
    require $phpbb_root_path . 'includes/db/' . $dbms . '.' . $phpEx;
    require $phpbb_root_path . 'includes/cache.'.$phpEx;
    require $phpbb_root_path . 'includes/session.'.$phpEx;
    require $phpbb_root_path . 'includes/auth.' . $phpEx;
    require $phpbb_root_path . 'includes/utf/utf_tools.' . $phpEx;

    $cache = new cache();
    $db = new $sql_db();
    $db->sql_connect($dbhost, $dbuser, $dbpasswd, $dbname, $dbport, false, defined('PHPBB_DB_NEW_LINK') ? PHPBB_DB_NEW_LINK : false);

    $config = $cache->obtain_config();


    /**
    * Set users default group
    *
    * @access private
    */
    function PhpBB_group_set_user_default($group_id, $user_id_ary, $group_attributes = false, $update_listing = false)
    {
        global $cache, $db;

        if (empty($user_id_ary))
        {
            return;
        }

        $attribute_ary = array(
            'group_colour'          => 'string',
            'group_rank'            => 'int',
            'group_avatar'          => 'string',
            'group_avatar_type'     => 'int',
            'group_avatar_width'    => 'int',
            'group_avatar_height'   => 'int',
        );

        $sql_ary = array(
            'group_id'      => $group_id
        );

        // Were group attributes passed to the function? If not we need to obtain them
        if ($group_attributes === false)
        {
            $sql = 'SELECT ' . implode(', ', array_keys($attribute_ary)) . '
                FROM ' . GROUPS_TABLE . "
                WHERE group_id = $group_id";
            $result = $db->sql_query($sql);
            $group_attributes = $db->sql_fetchrow($result);
            $db->sql_freeresult($result);
        }

        foreach ($attribute_ary as $attribute => $type)
        {
            if (isset($group_attributes[$attribute]))
            {
                // If we are about to set an avatar or rank, we will not overwrite with empty, unless we are not actually changing the default group
                if ((strpos($attribute, 'group_avatar') === 0 || strpos($attribute, 'group_rank') === 0) && !$group_attributes[$attribute])
                {
                    continue;
                }

                settype($group_attributes[$attribute], $type);
                $sql_ary[str_replace('group_', 'user_', $attribute)] = $group_attributes[$attribute];
            }
        }

        // Before we update the user attributes, we will make a list of those having now the group avatar assigned
        if (isset($sql_ary['user_avatar']))
        {
            // Ok, get the original avatar data from users having an uploaded one (we need to remove these from the filesystem)
            $sql = 'SELECT user_id, group_id, user_avatar
                FROM ' . USERS_TABLE . '
                WHERE ' . $db->sql_in_set('user_id', $user_id_ary) . '
                    AND user_avatar_type = ' . AVATAR_UPLOAD;
            $result = $db->sql_query($sql);

            while ($row = $db->sql_fetchrow($result))
            {
                avatar_delete('user', $row);
            }
            $db->sql_freeresult($result);
        }
        else
        {
            unset($sql_ary['user_avatar_type']);
            unset($sql_ary['user_avatar_height']);
            unset($sql_ary['user_avatar_width']);
        }

        $sql = 'UPDATE ' . USERS_TABLE . ' SET ' . $db->sql_build_array('UPDATE', $sql_ary) . '
            WHERE ' . $db->sql_in_set('user_id', $user_id_ary);
        $db->sql_query($sql);

        if (isset($sql_ary['user_colour']))
        {
            // Update any cached colour information for these users
            $sql = 'UPDATE ' . FORUMS_TABLE . " SET forum_last_poster_colour = '" . $db->sql_escape($sql_ary['user_colour']) . "'
                WHERE " . $db->sql_in_set('forum_last_poster_id', $user_id_ary);
            $db->sql_query($sql);

            $sql = 'UPDATE ' . TOPICS_TABLE . " SET topic_first_poster_colour = '" . $db->sql_escape($sql_ary['user_colour']) . "'
                WHERE " . $db->sql_in_set('topic_poster', $user_id_ary);
            $db->sql_query($sql);

            $sql = 'UPDATE ' . TOPICS_TABLE . " SET topic_last_poster_colour = '" . $db->sql_escape($sql_ary['user_colour']) . "'
                WHERE " . $db->sql_in_set('topic_last_poster_id', $user_id_ary);
            $db->sql_query($sql);

            global $config;

            if (in_array($config['newest_user_id'], $user_id_ary))
            {
                set_config('newest_user_colour', $sql_ary['user_colour'], true);
            }
        }

        if ($update_listing)
        {
            group_update_listings($group_id);
        }

        // Because some tables/caches use usercolour-specific data we need to purge this here.
        $cache->destroy('sql', MODERATOR_CACHE_TABLE);
    }

    /**
    * Adds an user
    *
    * @param mixed $user_row An array containing the following keys (and the appropriate values): username, group_id (the group to place the user in), user_email and the user_type(usually 0). Additional entries not overridden by defaults will be forwarded.
    * @param string $cp_data custom profile fields, see custom_profile::build_insert_sql_array
    * @return the new user's ID.
    */
    function PhpBB_user_add($user_row, $cp_data = false)
    {
        global $db, $user, $auth, $config, $phpbb_root_path, $phpEx;

        if (empty($user_row['username']) || !isset($user_row['group_id']) || !isset($user_row['user_email']) || !isset($user_row['user_type']))
        {
            return false;
        }

        $username_clean = utf8_clean_string($user_row['username']);

        if (empty($username_clean))
        {
            return false;
        }

        $sql_ary = array(
            'username'          => $user_row['username'],
            'username_clean'    => $username_clean,
            'user_password'     => (isset($user_row['user_password'])) ? $user_row['user_password'] : '',
            'user_pass_convert' => 0,
            'user_email'        => strtolower($user_row['user_email']),
            'user_email_hash'   => phpbb_email_hash($user_row['user_email']),
            'group_id'          => $user_row['group_id'],
            'user_type'         => $user_row['user_type'],
        );

        // These are the additional vars able to be specified
        $additional_vars = array(
            'user_permissions'  => '',
            'user_timezone'     => $config['board_timezone'],
            'user_dateformat'   => $config['default_dateformat'],
            'user_lang'         => $config['default_lang'],
            'user_style'        => (int) $config['default_style'],
            'user_actkey'       => '',
            'user_ip'           => '',
            'user_regdate'      => time(),
            'user_passchg'      => time(),
            'user_options'      => 230271,
            // We do not set the new flag here - registration scripts need to specify it
            'user_new'          => 0,

            'user_inactive_reason'  => 0,
            'user_inactive_time'    => 0,
            'user_lastmark'         => time(),
            'user_lastvisit'        => 0,
            'user_lastpost_time'    => 0,
            'user_lastpage'         => '',
            'user_posts'            => 0,
            'user_dst'              => (int) $config['board_dst'],
            'user_colour'           => '',
            'user_occ'              => '',
            'user_interests'        => '',
            'user_avatar'           => '',
            'user_avatar_type'      => 0,
            'user_avatar_width'     => 0,
            'user_avatar_height'    => 0,
            'user_new_privmsg'      => 0,
            'user_unread_privmsg'   => 0,
            'user_last_privmsg'     => 0,
            'user_message_rules'    => 0,
            'user_full_folder'      => PRIVMSGS_NO_BOX,
            'user_emailtime'        => 0,

            'user_notify'           => 0,
            'user_notify_pm'        => 1,
            'user_notify_type'      => NOTIFY_EMAIL,
            'user_allow_pm'         => 1,
            'user_allow_viewonline' => 1,
            'user_allow_viewemail'  => 1,
            'user_allow_massemail'  => 1,

            'user_sig'                  => '',
            'user_sig_bbcode_uid'       => '',
            'user_sig_bbcode_bitfield'  => '',

            'user_form_salt'            => unique_id(),
        );

        // Now fill the sql array with not required variables
        foreach ($additional_vars as $key => $default_value)
        {
            $sql_ary[$key] = (isset($user_row[$key])) ? $user_row[$key] : $default_value;
        }

        // Any additional variables in $user_row not covered above?
        $remaining_vars = array_diff(array_keys($user_row), array_keys($sql_ary));

        // Now fill our sql array with the remaining vars
        if (sizeof($remaining_vars))
        {
            foreach ($remaining_vars as $key)
            {
                $sql_ary[$key] = $user_row[$key];
            }
        }

        $sql = 'INSERT INTO ' . USERS_TABLE . ' ' . $db->sql_build_array('INSERT', $sql_ary);
        $db->sql_query($sql);

        $user_id = $db->sql_nextid();

        // Insert Custom Profile Fields
        if ($cp_data !== false && sizeof($cp_data))
        {
            $cp_data['user_id'] = (int) $user_id;

            if (!class_exists('custom_profile'))
            {
                include_once($phpbb_root_path . 'includes/functions_profile_fields.' . $phpEx);
            }

            $sql = 'INSERT INTO ' . PROFILE_FIELDS_DATA_TABLE . ' ' .
                $db->sql_build_array('INSERT', custom_profile::build_insert_sql_array($cp_data));
            $db->sql_query($sql);
        }

        // Place into appropriate group...
        $sql = 'INSERT INTO ' . USER_GROUP_TABLE . ' ' . $db->sql_build_array('INSERT', array(
            'user_id'       => (int) $user_id,
            'group_id'      => (int) $user_row['group_id'],
            'user_pending'  => 0)
        );
        $db->sql_query($sql);

        // Now make it the users default group...
        PhpBB_group_set_user_default($user_row['group_id'], array($user_id), false);

        // Add to newly registered users group if user_new is 1
        if ($config['new_member_post_limit'] && $sql_ary['user_new'])
        {
            $sql = 'SELECT group_id
                FROM ' . GROUPS_TABLE . "
                WHERE group_name = 'NEWLY_REGISTERED'
                    AND group_type = " . GROUP_SPECIAL;
            $result = $db->sql_query($sql);
            $add_group_id = (int) $db->sql_fetchfield('group_id');
            $db->sql_freeresult($result);

            if ($add_group_id)
            {
                // Because these actions only fill the log unneccessarily we skip the add_log() entry with a little hack. :/
                $GLOBALS['skip_add_log'] = true;

                // Add user to "newly registered users" group and set to default group if admin specified so.
                if ($config['new_member_group_default'])
                {
                    group_user_add($add_group_id, $user_id, false, false, true);
                    $user_row['group_id'] = $add_group_id;
                }
                else
                {
                    group_user_add($add_group_id, $user_id);
                }

                unset($GLOBALS['skip_add_log']);
            }
        }

        // set the newest user and adjust the user count if the user is a normal user and no activation mail is sent
        if ($user_row['user_type'] == USER_NORMAL || $user_row['user_type'] == USER_FOUNDER)
        {
            set_config('newest_user_id', $user_id, true);
            set_config('newest_username', $user_row['username'], true);
            set_config_count('num_users', 1, true);

            $sql = 'SELECT group_colour
                FROM ' . GROUPS_TABLE . '
                WHERE group_id = ' . (int) $user_row['group_id'];
            $result = $db->sql_query_limit($sql, 1);
            $row = $db->sql_fetchrow($result);
            $db->sql_freeresult($result);

            set_config('newest_user_colour', $row['group_colour'], true);
        }

        return $user_id;
    }


    function PhpBB_login($user_login)
    {
        global $db;
        $user = new session();
        $user->session_begin();
        $auth = new auth();


        $sql = 'SELECT user_id, username, user_password, user_passchg, user_email, user_type
            FROM ' . USERS_TABLE . "
            WHERE username_clean = '" . $db->sql_escape(utf8_clean_string($user_login)) . "'";
        $result = $db->sql_query($sql);
        $row = $db->sql_fetchrow($result);
        $db->sql_freeresult($result);
        $user->session_create($row['user_id']);
    }

    function PhpBB_signup($user_id)
    {
        global $db;
        $sql = 'SELECT group_id
            FROM ' . GROUPS_TABLE . "
            WHERE group_name = 'REGISTERED'
                AND group_type = " . GROUP_SPECIAL;
        $result = $db->sql_query($sql);
        $add_group_id = (int) $db->sql_fetchfield('group_id');
        $db->sql_freeresult($result);
        PhpBB_user_add(array('username'=>$_POST['user_login'], 'user_email'=>$_POST['user_email'], 'user_type'=>0, 'group_id'=>$add_group_id));
    }

    function PhpBB_logout($user_id)
    {
        global $db;
        $user = new session();
        $user->session_kill();
    }

    add_action('wp_login', 'PhpBB_login');
    add_action('wp_logout', 'PhpBB_logout');
    add_action('user_register', 'PhpBB_signup');
}

function PhpBB_settings_path() {
    echo '<input name="phpbb_root" placeholder="/var/www/phpbb" value="'.get_option( 'phpbb_root' ). '" type="text" />';
}

function PhpBB_settings() {
    add_settings_field(
        'phpbb_root',
        'phpBB path',
        'PhpBB_settings_path',
        'general'
    );
    register_setting( 'general', 'phpbb_root' );
} 
 
add_action( 'admin_init', 'PhpBB_settings' );
?>
