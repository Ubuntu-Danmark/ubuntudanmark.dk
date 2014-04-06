<?php

class wpbb_phpBB3
{
    public static function getConfigValue($config_name)
    {
        if (self::foundInstall()) {
            self::load();
        }

        global $db;

        //may be called before we have a valid configuration
        if (!is_object($db)) {
            return null;
        }

        $sql = 'SELECT config_value FROM ' . CONFIG_TABLE . ' WHERE config_name = \'' . $config_name . '\'';
        $result = $db->sql_query($sql);
        $row = $db->sql_fetchrow($result);
        $db->sql_freeresult($result);
        return $row['config_value'];
    }

    public static function setConfigValue($config_name, $value)
    {
        if (self::foundInstall()) {
            self::load();
        }

        if (function_exists('set_config')) {
            set_config($config_name, $value);
        }
    }

    public static function foundInstall()
    {
        return (bool)self::phpbbConfig();
    }

    public static function getIdentity()
    {
        global $user;

        if ($user->data['is_registered'] == TRUE) {
            return array(
                'id' => $user->data['user_id'],
                'alias' => $user->data['username_clean'],
                'email' => $user->data['user_email'],
                'rank' => $user->rank['user_rank']
            );
        } else {
            return array();
        }
    }

    public static function load()
    {
        if (defined('IN_PHPBB') OR defined('PHPBB_INSTALLED')) {
            return false;
        }

        if (!defined('IN_PHPBB')) {
            define('IN_PHPBB', true);
        }

        global $phpbb_root_path, $phpEx, $auth, $template, $cache, $db, $config, $user;

        $prp = $phpbb_root_path = ABSPATH . PHPBBPATH;
        $phpEx = substr(strrchr(__FILE__, '.'), 1);

        if (!wpbb_phpBB3::phpbbPatched()) {
            return array();
        }

        $common_file = $phpbb_root_path . 'common-orig.' . $phpEx;

        // Hack to fix declaration of make_clickable
        $include_contents = file_get_contents($common_file);
        $include_contents = str_replace('<?php', '', $include_contents);
        $include_contents = str_replace('?>', '', $include_contents);
        $include_contents = str_replace('require($phpbb_root_path . \'includes/functions_content.\' . $phpEx);', '', $include_contents);
        eval($include_contents);

        $user->session_begin();
        $auth->acl($user->data);
        $user->setup();

        Registry::set('user', $user);

        wpbb_phpBB3::getIdentity();

    }

    public static function loadConstants()
    {
        $connect_phpbb_options = get_option('connect_phpbb_options');
        if ($connect_phpbb_options == '') {
            $connect_phpbb_options = array('path' => '');
        }

        //Get the paths
        if (!defined('ABSPATH')) {
            define('ABSPATH', (dirname(dirname(dirname(dirname(__FILE__))))) . '/');
        }

        if (!defined('PHPBBPATH')) {
            if ($connect_phpbb_options['path'] != '') {
                define('PHPBBPATH', $connect_phpbb_options['path']);
            } else {
                define('PHPBBPATH', 'forum/');
            }
        }
    }

    public static function phpbbPatched()
    {
        if (file_exists(ABSPATH . PHPBBPATH . 'common-orig.php')) {
            return true;
        }
        return false;
    }

    public static function phpbbConfig()
    {
        if (file_exists(ABSPATH . PHPBBPATH . 'config.php')) {
            return ABSPATH . PHPBBPATH . 'config.php';
        }
        return false;
    }

    public static function logout()
    {
        global $user;

        $user->session_kill();
        $user->session_begin();
    }

    public static function changePassword($username, $password)
    {
        global $db;

        $hashed = phpbb_hash($password);
        $sql = 'UPDATE ' . USERS_TABLE . ' SET user_password="' . $hashed . '",user_pass_convert=0,user_last_search=1 WHERE username_clean = "' . utf8_clean_string($username) . '"';

        $result = $db->sql_query($sql);
    }

    public static function addUser($user)
    {
        global $phpbb_root_path, $phpEx;

        // Use the user_add function, this code is from auth.php line 864-869
        if (!function_exists('user_add')) {
            include($phpbb_root_path . 'includes/functions_user.' . $phpEx);
        }

        return user_add($user);
    }

    public static function getUserById($id)
    {
        global $db;

        $cols = 'user_id, username, user_password, user_passchg, user_pass_convert, user_email, user_type, user_login_attempts';
        $sql = 'SELECT ' . $cols . ' FROM ' . USERS_TABLE . " WHERE user_id = '" . $id . "'";

        $result = $db->sql_query($sql);
        $user = $db->sql_fetchrow($result);
        $db->sql_freeresult($result);
        return $user;
    }

    public static function getUserByName($name)
    {
        global $db;

        $cols = 'user_id, username, user_password, user_passchg, user_pass_convert, user_email, user_type, user_login_attempts';
        $sql = 'SELECT ' . $cols . ' FROM ' . USERS_TABLE . " WHERE username_clean = '" . utf8_clean_string($name) . "'";

        $result = $db->sql_query($sql);
        if ($result) {
            $user = $db->sql_fetchrow($result);
            $db->sql_freeresult($result);
            return $user;
        }

        return false;
    }

    public static function checkPasswordAndLogin($user_id, $username, $password)
    {
        global $phpbb_root_path, $phpEx;

        $user = Registry::get('user');

        if (!function_exists('login_db')) {
            include($phpbb_root_path . 'includes/auth/auth_db.' . $phpEx);
        }

        $login = login_db($username, $password);

        $viewonline = 1;
        $autologin = 0;
        if (!empty($_POST['rememberme'])) {
            $autologin = 1;
        }

        // If login succeeded, we will log the user in... else we pass the login array through...
        if ($login['status'] == LOGIN_SUCCESS) {
            $old_session_id = $user->session_id;

            //TODO :: find how it is managed for the admin part
            $admin = 0;
            if ($admin) {
                global $SID, $_SID;

                $cookie_expire = time() - 31536000;
                $user->set_cookie('u', '', $cookie_expire);
                $user->set_cookie('sid', '', $cookie_expire);
                unset($cookie_expire);

                $SID = '?sid=';
                $user->session_id = $_SID = '';
            }

            $result = $user->session_create($user_id, $admin, $autologin, $viewonline);

            // Successful session creation
            if ($result === true) {
                // If admin re-authentication we remove the old session entry because a new one has been created...
                if ($admin) {
                    // the login array is used because the user ids do not differ for re-authentication
                    $sql = 'DELETE FROM ' . SESSIONS_TABLE . "
                                        WHERE session_id = '" . $db->sql_escape($old_session_id) . "'
                                        AND session_user_id = {$login['user_row']['user_id']}";
                    $db->sql_query($sql);
                }

                return array(
                    'status' => LOGIN_SUCCESS,
                    'error_msg' => false,
                    'user_row' => $login['user_row'],
                );
            }

            return array(
                'status' => LOGIN_BREAK,
                'error_msg' => $result,
                'user_row' => $login['user_row'],
            );
        }
    }

    public static function get_wp_user_by_email($email)
    {
        $lcemail = strtolower($email);

        global $db;

        $sql = 'SELECT username, user_email FROM ' . USERS_TABLE . " WHERE user_email = '" . esc_sql($lcemail) . "'";
        $result = $db->sql_query($sql);
        if ($result) {
            $user = $db->sql_fetchrow($result);
            $db->sql_freeresult($result);
            if ($user) {
                $user_row = array(
                    'username' => $user['username'],
                    'email' => $user['user_email'],
                    'password' => wp_generate_password(),
                );
                return wpbb_WordPress::addUser($user_row);
            }

        }

        return false;
    }
}
