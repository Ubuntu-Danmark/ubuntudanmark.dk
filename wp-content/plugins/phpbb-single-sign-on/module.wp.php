<?php

class wpbb_WordPress
{
    public static function loadAdminAPI()
    {
        require_once(ABSPATH . 'wp-admin/includes/admin.php');
    }

    public static function addUser($user)
    {
        global $wpdb;
        // Derived from wp_insert_user() wp-includes/registration.php line 104
        $user_login = sanitize_user($user['username']);
        $user_login = apply_filters('pre_user_login', $user_login);
        $user_login = $wpdb->escape($user_login);


        //preparing user data
        $data = array(
            'user_pass' => wp_hash_password($user['password']),
            'user_email' => ($user['email'] ? $wpdb->escape($user['email']) : ''),
            'user_login' => $user_login,
            'user_url' => '',
            'user_nicename' => apply_filters('pre_user_nicename', sanitize_title($user_login)),
            'display_name' => $user_login,
            'user_registered' => gmdate('Y-m-d H:i:s')
        );

        //creation
        $wpdb->insert($wpdb->users, $data);
        $user_id = (int)$wpdb->insert_id;

        $wp_user = new WP_User($user_id);
        $wp_user->set_role(get_option('default_role'));

        wp_cache_delete($user_id, 'users');
        wp_cache_delete($user_login, 'userlogins');

        return $wp_user;
    }

    public static function updateUser($data)
    {
        $user = '';
        $user->ID = wpbb_WordPress::getIdByName($data['username']);
        $user->user_login = $data['username'];
        $user->user_pass = $data['new_password'];
        $user->user_email = $data['email'];

        wp_update_user(get_object_vars($user));
    }

    public static function getIdByName($string)
    {
        $user = get_user_by('login', $string);

        if ($user) {
            return $user->ID;
        }

        return 0;
    }
}
