<?php

class wpbb_WordPress {

    function load() {

    }

    function loadAdminAPI() {
        require_once(ABSPATH . '/wp-admin/includes/admin.php');
    }

    function addUser($user) {
        global $wpdb;
        mysql_select_db(DB_NAME);  // Select WP database
        // Derived from wp_insert_user() wp-includes/registration.php line 104
        $user_login = sanitize_user($user['username']);
        $user_login = apply_filters('pre_user_login', $user_login);


        //preparing user data
        $user_pass = wp_hash_password($user['password']);
        $user_email = $user['email'] ? $wpdb->escape($user['email']) : '';
        $user_login = $wpdb->escape($user_login);
        $user_url = '';
        $user_nicename = apply_filters('pre_user_nicename', sanitize_title($user_login));
        $display_name = $user_login;
        $user_registered = gmdate('Y-m-d H:i:s');

        $data = compact('user_pass', 'user_email', 'user_login', 'user_url', 'user_nicename', 'display_name', 'user_registered');

        //creation
        $wpdb->insert($wpdb->users, $data);
        $user_id = (int) $wpdb->insert_id;

        $wp_user = new WP_User($user_id);
        $wp_user->set_role(get_option('default_role'));

        wp_cache_delete($user_id, 'users');
        wp_cache_delete($user_login, 'userlogins');

        return $wp_user;
    }

    function getNicename($username) {
        return apply_filters('pre_user_nicename', sanitize_title($username));
    }

    function logout() {
        wp_clear_auth_cookie();
    }

    function updateUser($data) {
        $user = '';
        $user->ID = wpbb_WordPress::getIdByName($data['username']);
        $user->user_login = $data['username'];
        $user->user_pass = $data['new_password'];
        $user->user_email = $data['email'];

        wp_update_user(get_object_vars($user));
    }

    function changePassword($username, $password) {
        $id = wpbb_WordPress::getIdByName($username);
        if ($id != false) {
            $user = array();
            $user['ID'] = $id;
            $user['user_pass'] = $password;

            wp_update_user($user);
        }
    }

    function getIdByName($user) {
        mysql_select_db(DB_NAME);
        //to find the informations correctly
        //return get_profile('id', wpbb_WordPress::getNicename($user));
        return get_profile('id', $user);
    }

    function wpbb_login() {
        if (isset($_REQUEST['redirect_to']))
            $redirect_to = $_REQUEST['redirect_to'];
        else
            $redirect_to = admin_url();

        if (is_ssl() && force_ssl_login() && !force_ssl_admin() && ( 0 !== strpos($redirect_to, 'https') ) && ( 0 === strpos($redirect_to, 'http') ))
            $secure_cookie = false;
        else
            $secure_cookie = '';

        if ('POST' == $_SERVER['REQUEST_METHOD']) {
            $user = wp_signon('', $secure_cookie);

            $redirect_to = apply_filters('login_redirect', $redirect_to, isset($_REQUEST['redirect_to']) ? $_REQUEST['redirect_to'] : '', $user);

            if (!is_wp_error($user)) {
                if (!$user->has_cap('edit_posts') && ( empty($redirect_to) || strpos($redirect_to, 'wp-admin/') )) {
                    $redirect_to = admin_url('profile.php');
                }
                wp_safe_redirect($redirect_to);
                exit();
            }

            $errors = $user;
        }
        // Clear errors if loggedout is set.
        if (!empty($_GET['loggedout']))
            $errors = new WP_Error();

        return array('redirect_to' => $redirect_to, 'errors' => $errors);
    }

    function wpbb_register() {
        if (!get_option('users_can_register')) {
            wp_redirect('wp-login.php?registration=disabled');
            exit();
        }

        global $errors;
        $errors = new WP_Error();
        require_once( ABSPATH . WPINC . '/registration.php');

        $user_login = '';
        $user_email = '';

        if ('POST' == $_SERVER['REQUEST_METHOD']) {
            require_once( ABSPATH . WPINC . '/registration.php');

            $user_login = $_POST['user_login'];
            $user_email = $_POST['user_email'];
            register_new_user($user_login, $user_email);
            if (!is_wp_error($errors)) {
                wp_redirect('wp-login.php?checkemail=registered');
                exit();
            }
        }
        return $errors;
    }

    function wpbb_lostpassword() {
        $http_post = ('POST' == $_SERVER['REQUEST_METHOD']);
        if ($http_post) {
            $errors = retrieve_password();
            if (!is_wp_error($errors)) {
                wp_redirect('wp-login.php?checkemail=confirm');
                exit();
            }
        } else {
            $errors = new WP_Error(); // initialize error object
        }

        if ('invalidkey' == $_GET['error'] && isset($errors))
            $errors->add('invalidkey', __('Sorry, that key does not appear to be valid.'));

        do_action('lost_password');
        return $errors;
    }

    function wpbb_profile() {
        if (!$user_id) {
            $current_user = wp_get_current_user();
            $user_id = $current_user->ID;
        }
        require_once(ABSPATH . 'wp-admin/includes/user.php');

        if ($_POST['action'] == 'update') {
            require_once(ABSPATH . 'wp-admin/includes/admin.php');
            check_admin_referer('update-user_' . $user_id);

            do_action('personal_options_update');

            $errors = edit_user($user_id);

            if (!is_wp_error($errors)) {
                global $wpdb;
                $userdata = get_userdata($user_id);
                $user_login = $wpdb->escape($userdata->user_login);
                // is password being changed in wordpress?
                if (!empty($_POST['pass1'])) // using $_POST['pass1'] is ok here because it will not reach this point if value doesn't pass checks in edit_user()
                    wpbb_updatePassword($user_login, $_POST['pass1'], 'wp');

                if (!empty($_POST['email']))
                    wpbb_updateEmail($user_login, $_POST['email'], 'wp');

                //op_selectDbFromModule('wp');

                $redirect = add_query_arg('wp_http_referer', urlencode($wp_http_referer), "profile.php");
                wp_redirect($redirect);
                exit;
            }
        }

        $profileuser = get_user_to_edit($user_id);

        return array(
            'is_profile_page' => TRUE,
            'profileuser' => $profileuser,
            'user_id' => $user_id,
            'errors' => $errors
        );
    }

}