<?php

/**
 * Database auth plug-in for PHPBB - Wordpress Connector
 *
 * This is for authentication via the integrated user table
 *
 * @package login
 * @version 0.9
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 *
 */
//Doesn't load it in the admin area of the plugin, or it will make a conflict
if ($_GET['i'] != 'board' && $_GET['mode'] != 'auth') {
    include(dirname(__FILE__) . '/auth_db.php');
}


/**
 * @ignore
 */
if (!defined('IN_PHPBB')) {
    exit;
}

function init_wpbb()
{

}

// Provide option for WordPress path
function acp_wpbb(&$new)
{
    // These are fields required in the config table
    $tpl = '
	<dl>
		<dt><label for="op_path">WordPress Path:</label><br /><span>This is the path to your WordPress installation relative to the site\'s root directory.  Most users will not need to change this.</span></dt>
		<dd><input type="text" id="wpbb_path" size="40" name="config[wpbb_path]" value="' . $new['wpbb_path'] . '" /></dd>
	</dl>
	';

    return array(
        'tpl' => $tpl,
        'config' => array('wpbb_path')
    );
}

/**
 * Login function
 */
function login_wpbb(&$username, &$password)
{
    global $db, $config;

    //checks if Wordpress is loaded, if not uses simple authentication
    if (function_exists('wp_signon')) {

        //Manage Autologin -> transfer from BB to WP
        if (!empty($_POST['autologin'])) {
            $_POST['rememberme'] = 'forever';
        }

        global $current_user;

        /*
         * * Exists in PHPBB ?
         */
        $username = strtolower($username);
        $sql = 'SELECT user_id, username, user_password, user_passchg, user_pass_convert, user_email, user_type, user_login_attempts
                FROM ' . USERS_TABLE . "
                WHERE username_clean = '" . $db->sql_escape(utf8_clean_string($username)) . "'";
        $result = $db->sql_query($sql);
        $phpBB_user = $db->sql_fetchrow($result);

        /*
         * * Exists in WP ?
         */
        //SYNC to WP
        wpbb_WordPress::loadAdminAPI();

        if (isset($current_user)) {
            wp_clear_auth_cookie();
        }

        if (
            is_ssl() && force_ssl_login() && !force_ssl_admin()
            && (0 !== strpos($redirect_to, 'https')) && (0 === strpos($redirect_to, 'http'))
        ) {
            $secure_cookie = false;
        } else {
            $secure_cookie = '';
        }

        // Use the wp_signon function to get the object of our user from WP
        $wp_user = wp_signon(
            array(
                'user_login' => $username,
                'user_password' => html_entity_decode($password)
            ),
            $secure_cookie
        );


        // Flag whether or not the user exists in wordpress
        $in_wp = isset($wp_user->errors['invalid_username']) || ($wp_user->ID == 0 && !isset($wp_user->errors['incorrect_password'])) ? FALSE : TRUE;

        //WP 0 BB 1 ?
        if ($phpBB_user && !$in_wp) { //if he doesn't exist creates the user in wordpress
            $username = $phpBB_user['username'];

            $user_row = array(
                'username' => $username,
                'email' => $phpBB_user['user_email'] ? $phpBB_user['user_email'] : '',
                'password' => html_entity_decode($password)
            );

            $wp_user = wpbb_WordPress::addUser($user_row);

            $wp_user = wp_signon(
                array(
                    'user_login' => $username,
                    'user_password' => html_entity_decode($password)
                ),
                $secure_cookie
            );
        } else {
            if (!$phpBB_user && $in_wp) {
                $email = $wp_user->user_email ? $wp_user->user_email : '';

                // since group IDs may change, use a query to make sure it is the right default group.
                $sql = 'SELECT group_id FROM ' . GROUPS_TABLE . " WHERE group_name = '" .
                    $db->sql_escape(REGISTERED) . "' AND group_type = " . GROUP_SPECIAL;
                $result = $db->sql_query($sql);

                $row = $db->sql_fetchrow($result);
                $group_id = $row['group_id'];

                $user_row = array(
                    'username' => $username,
                    'user_password' => phpbb_hash($password),
                    'group_id' => $group_id,
                    'user_email' => $email,
                    'user_type' => 0
                );

                $id = wpbb_phpBB3::addUser($user_row);
                $phpBB_user = wpbb_phpBB3::getUserById($id);
            }
        }

        //logon phpBB is the access right in wordpress ?
        if (wp_check_password($password, $wp_user->user_pass, $wp_user->ID)) {
            wpbb_phpBB3::changePassword($username, $password);

            return array(
                'status' => LOGIN_SUCCESS,
                'error_msg' => false,
                'user_row' => $phpBB_user,
            );
        } else {
            return array(
                'status' => LOGIN_ERROR_PASSWORD,
                'error_msg' => 'LOGIN_ERROR_PASSWORD',
                'user_row' => $phpBB_user,
            );
        }
    }
    return login_db($username, $password);
}

//Executed when the session is closed
function logout_wpbb($data, $new_session)
{
    if (function_exists('wp_clear_auth_cookie')) { //if WP is loaded
        wp_clear_auth_cookie();
    }
    return $data;
}

function validate_session_wpbb()
{
    global $phpbb_root_path, $phpEx;
    // Need to block registrations for users that already exist
    $mode = request_var('mode', '');

    /**
     *  There's no hook for password changing in phpBB so we have to reuse validation technique from ucp_profile.php
     */
    if ($mode == 'reg_details' && !empty($_POST['submit'])) { // password and email changing
        global $auth, $config, $user;

        $data = array(
            'username' => utf8_normalize_nfc(request_var('username', $user->data['username'], true)),
            'email' => strtolower(request_var('email', $user->data['user_email'])),
            'email_confirm' => strtolower(request_var('email_confirm', '')),
            'new_password' => request_var('new_password', '', true),
            'cur_password' => request_var('cur_password', '', true),
            'password_confirm' => request_var('password_confirm', '', true),
        );

        // Do not check cur_password, it is the old one.
        $check_ary = array(
            'new_password' => array(
                array('string', true, $config['min_pass_chars'], $config['max_pass_chars']),
                array('password')
            ),
            'password_confirm' => array('string', true, $config['min_pass_chars'], $config['max_pass_chars'])
        );

        if ($auth->acl_get('u_chgname') && $config['allow_namechange']) {
            $check_ary['username'] = array(
                array('string', false, $config['min_name_chars'], $config['max_name_chars']),
                array('username')
            );
        }

        if (sizeof(validate_data($data, $check_ary))) {
            return true;
        }
        if ($auth->acl_get('u_chgpasswd') && $data['new_password'] && $data['password_confirm'] != $data['new_password']) {
            return true;
        }
        if (
            (
                $data['new_password']
                || ($auth->acl_get('u_chgemail') && $data['email'] != $user->data['user_email'])
                || ($data['username'] != $user->data['username'] && $auth->acl_get('u_chgname') && $config['allow_namechange'])
            ) && !phpbb_check_hash($data['cur_password'], $user->data['user_password'])
        ) {
            return true;
        }

        if ($auth->acl_get('u_chgemail') && $data['email'] != $user->data['user_email'] && $data['email_confirm'] != $data['email']) {
            return true;
        }

        define('WP_ADMIN', true);
        wpbb_WordPress::loadAdminAPI();
        wpbb_WordPress::updateUser($data);
    }

    if ($mode != 'register' || !request_var('username', '', true)) {
        return true;
    }

    if ($user->data['is_registered'] || isset($_REQUEST['not_agreed'])) { //FIX BY BRIAN PAN
        //if(wpbb_userExists($username, 'phpbb')){
        // User exists, TODO -- notify user somehow
        redirect(append_sid($phpbb_root_path . 'index' . $phpEx));
    } else {
        return true;
    }
}
