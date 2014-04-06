<?php
/*
  Plugin Name: PHPBB Single Sign On
  Version: 0.9
  Plugin URI: http://www.onigoetz.ch/plugins/wordpress-phpbb-plugin/
  Description: Connecte un site wordpress à PHPBB
  Author: Stéphane Goetz
  Author URI: http://www.onigoetz.ch
 */

if (!defined('LOADED_PHPBB')) {
    define('LOADED_WP', true);
}

include(dirname(__FILE__) . '/module.phpbb.php');
include(dirname(__FILE__) . '/module.wp.php');
include(dirname(__FILE__) . '/common-functions.php');

$wp2bb_enabled = get_option('wp2bb_enabled', false);
if ($wp2bb_enabled) {
    include(dirname(__FILE__) . '/wp2bb/main.php');
}

if (is_admin()) {
    define('WPBB_OPTIONS_FILE', dirname(plugin_basename(__FILE__)) . '/options.php');
    define('WPBB_OPTIONS_PAGE', get_option('siteurl') . '/wp-admin/admin.php?page=' . WPBB_OPTIONS_FILE);

    /**
     * Installation Hook
     */
    function wpbb_install()
    {
        $default_options = array('path' => 'forum/');
        add_option('connect_phpbb_options', $default_options);
    }

    register_activation_hook(__FILE__, 'wpbb_install');

    /**
     * Options Page
     */
    function wpbb_options_page()
    {
        add_options_page('PHP BB', 'PHP BB Options', 10, WPBB_OPTIONS_FILE);
    }

    add_action('admin_menu', 'wpbb_options_page');
}

/**
 * On login actions
 *
 * @param WP_User|WP_Error $userdata
 * @param string $password
 * @return object
 */
function wpbb_login($userdata, $password)
{
    // check to see if phpBB exists
    if (!wpbb_phpBB3::phpbbConfig() OR !wpbb_phpBB3::phpbbPatched()) {
        return $userdata;
    }

    define('FROM_WP', TRUE);

    // Set up phpBB environment
    wpbb_phpBB3::load();

    global $db;

    //PHPBB
    $phpBB_user = wpbb_phpBB3::getUserByName($userdata->user_login);

    //Wordpress
    $in_wp = ($userdata->ID == 0) ? FALSE : TRUE;

    //WP 1 BB 0 ?
    if (!$phpBB_user && $in_wp) { //If he doesn't exists, create the user in phpbb
        $email = $userdata->user_email ? $userdata->user_email : '';

        // since group IDs may change, use a query to make sure it is the right default group.
        $sql = 'SELECT group_id FROM ' . GROUPS_TABLE . " WHERE group_name = '" . $db->sql_escape(REGISTERED) . "' AND group_type = " . GROUP_SPECIAL;
        $result = $db->sql_query($sql);

        $row = $db->sql_fetchrow($result);
        $group_id = $row['group_id'];

        $user_row = array(
            'username' => $userdata->user_login,
            'user_password' => phpbb_hash($password),
            'group_id' => $group_id,
            'user_email' => $email,
            'user_type' => 0
        );

        $id = wpbb_phpBB3::addUser($user_row);
        $phpBB_user = wpbb_phpBB3::getUserById($id);
    }

    wpbb_phpBB3::checkPasswordAndLogin($phpBB_user['user_id'], $userdata->user_login, $password);

    return $userdata;
}

//Doesn't add the hook if we're in phpbb
if (defined('LOADED_WP')) {
    add_action('wp_authenticate_user', 'wpbb_login', 10, 2);
}

////////////////////////////////////////////////////////////////////////////////

/**
 * Logout action
 */
function wpbb_logout()
{
    if (!defined('FROM_WP')) {
        define('FROM_WP', TRUE);
    }

    if (wpbb_phpBB3::phpbbConfig()) { // check to see if phpBB exists
        wpbb_phpBB3::load();
        wpbb_phpBB3::logout();
    }

    return false;
}

add_action('wp_logout', 'wpbb_logout');

////////////////////////////////////////////////////////////////////////////////

/**
 * PASSWORD CHANGES, when a user changes his password in wordpress, it applies to phpbb
 *
 * @param string $username
 * @param string $pass1
 * @param string $pass2
 * @return bool
 */
function wpbb_change_password($username, $pass1, $pass2)
{
    if (!empty($pass1) && !empty($pass2) && $pass1 == $pass2) {
        wpbb_phpBB3::load();
        if (wpbb_phpBB3::getUserByName($username)) {
            wpbb_phpBB3::changePassword($username, $pass1);
        }
    }
    return true;
}

add_filter('check_passwords', 'wpbb_change_password', 10, 3);

////////////////////////////////////////////////////////////////////////////////

/**
 * Runs tests in admin to show if the user has some configs to do.
 *
 * @return null
 */
function wpbb_admin_warnings()
{
    if (wpbb_run_test(false)) {

        function wpbb_warning()
        {
            $link = sprintf(
                __('You have to <a href="%s">Follow the instructions</a> for it to work.'),
                get_option('siteurl') . '/wp-admin/admin.php?page=phpbb-single-sign-on/options.php'
            );

            echo "
            <div id='phpbb-warning' class='updated fade'>
                <p><strong>" . __('PHP Single Sign On is almost ready.') . "</strong>$link</p>
            </div>
            ";
        }

        add_action('admin_notices', 'wpbb_warning');
        return;
    }
}

add_action('init', 'wpbb_admin_warnings');

////////////////////////////////////////////////////////////////////////////////

/**
 * Email existing
 *
 * @param string $login
 * @param string $email
 * @param object $errors
 * @return null
 */
function wpbb_register_post($login, $email, $errors)
{
    if ($errors->get_error_code()) {
        return; // No need to add to the despair
    }

    if (wpbb_phpBB3::get_wp_user_by_email($email)) {
        $errors->add(
            'email_exists',
            __('<strong>ERROR</strong>: This email is already registered, please choose another one.')
        );
    }
}

add_action('register_post', 'wpbb_register_post', 10, 3);

////////////////////////////////////////////////////////////////////////////////

/**
 * Error Hints
 *
 * @param string $login
 * @param string $email
 * @param object $errors
 * @return null
 */
function wpbb_register_hint($login, $email, $errors)
{
    error_log($errors->get_error_code());

    if ($errors->get_error_code() != 'email_exists' and $errors->get_error_code() != 'username_exists') {
        return;
    }

    $errors->add(
        'email_exists',
        sprintf("<a href=\"%s\">%s</a>", site_url('wp-login.php', 'login'), __('Log In'))
    );

    $errors->add(
        'email_exists',
        sprintf(
            "<a href=\"%s\" title=\"%s\">%s</a>",
            site_url('wp-login.php?action=lostpassword', 'recover password'),
            __('Password Lost and Found'),
            __('Lost your password?')
        )
    );
}

add_action('register_post', 'wpbb_register_hint', 11, 3);
