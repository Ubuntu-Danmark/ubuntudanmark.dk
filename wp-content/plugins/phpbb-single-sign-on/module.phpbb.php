<?php

class wpbb_phpBB3 {

    var $user;
    var $loggedin;

    function getIdentity() {
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

    function load(){
        if(defined('IN_PHPBB') OR defined('PHPBB_INSTALLED')){
            return false;
        }
        
        define('IN_PHPBB', true);
        global $phpbb_root_path, $phpEx, $auth, $template, $cache, $db, $config, $user;

        $prp = $phpbb_root_path = ABSPATH . PHPBBPATH;
        $phpEx = substr(strrchr(__FILE__, '.'), 1);

        if(!wpbb_phpBB3::phpbbPatched()){
            return array();
        }

        $common_file = $phpbb_root_path .'common-orig.'.$phpEx;

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

    function loadConstants(){
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

    function phpbbPatched(){
        if(file_exists(ABSPATH . PHPBBPATH .'common-orig.php')){
            return true;
        }
        return false;
    }

    function phpbbExists(){
        if(file_exists(ABSPATH . PHPBBPATH .'common.php')){
            return true;
        }
        return false;
    }

    function phpbbConfig(){
        if(file_exists(ABSPATH . PHPBBPATH .'config.php')){
            return ABSPATH . PHPBBPATH .'config.php';
        }
        return false;
    }

    /*
     * WP wants a user obj on success and an WP_Error on failure
     */

    function login($username, $password) {

        global $db;

        //PHPBB
        $phpBB_user = self::getUserByName($username);

        //Wordpress
        $wp_user = wpbb_Wordpress::getIdByName($username);
        $in_wp = ($wp_user == 0) ? FALSE : TRUE;

        //WP 1 BB 0 ?
        if (!$phpBB_user && $in_wp) { //If he doesn't exists, create the user in phpbb
            $email = $wp_user->user_email ? $wp_user->user_email : '';

            // since group IDs may change, use a query to make sure it is the right default group.
            $sql = 'SELECT group_id FROM ' . GROUPS_TABLE . " WHERE group_name = '" . $db->sql_escape(REGISTERED) . "' AND group_type = " . GROUP_SPECIAL;
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

        //has to be done when identity is checked
        //wpbb_phpBB3::changePassword($username, $password);
    }

    function logout() {
        global $user, $auth;

        $user->session_kill();
        $user->session_begin();
    }

    /*
     * OLD FUNCTION
     * function changePassword($username,$password){
      $phpbb_root_path = ABSPATH.PHPBBPATH;

      require($phpbb_root_path.'config.php');

      // set user_pass_convert to 1 so user's pass will be hashed under phpBB rules when logging in after pass is changed in WordPress
      $sql = 'UPDATE ' . USERS_TABLE . ' SET user_password="'.md5($password).'",user_pass_convert=1 WHERE username = "' . $username . '"';
      $result = mysql_query($sql);
      } */

    function changePassword($username, $password) {
        global $db;

        $hashed = phpbb_hash($password);
        $sql = 'UPDATE ' . USERS_TABLE . ' SET user_password="' . $hashed . '",user_pass_convert=0,user_last_search=1 WHERE username = "' . $username . '"';

        $result = $db->sql_query($sql);
    }

    function addUser($user) {
        global $phpbb_root_path, $phpEx;

        // Use the user_add function, this code is from auth.php line 864-869
        if (!function_exists('user_add')) {
            include($phpbb_root_path . 'includes/functions_user.' . $phpEx);
        }

        return user_add($user);
    }

    function getUserById($id) {
        global $db;
        mysql_select_db($db->dbname);

        $sql = 'SELECT user_id, username, user_password, user_passchg, user_pass_convert, user_email, user_type, user_login_attempts
                FROM ' . USERS_TABLE . "
                WHERE user_id = '" . $id . "'";

        $result = $db->sql_query($sql);
        $user = $db->sql_fetchrow($result);
        $db->sql_freeresult($result);
        return $user;
    }

    function getUserByName($name) {
        $phpbb_root_path = ABSPATH . PHPBBPATH;

        require($phpbb_root_path . 'config.php');

        $dbr = mysql_connect($dbhost, $dbuser, $dbpasswd);
        mysql_select_db($dbname);
        define('USERS_TABLE', $table_prefix . 'users');

        $sql = 'SELECT user_id, username, user_password, user_passchg, user_pass_convert, user_email, user_type, user_login_attempts
                FROM ' . USERS_TABLE . " WHERE username = '" . $name . "'";

        $result = mysql_query($sql);
        if ($result) {
            $user = mysql_fetch_object($result);
            mysql_free_result($result);
            return $user;
        }

        return false;
    }

    ////////////////////////////////////////////////////////////

    function get_wp_user_by_email($email) {
        $lcemail = strtolower($email);

        $phpbb_root_path = ABSPATH . PHPBBPATH;
        require($phpbb_root_path . 'config.php');
        $dbr = mysql_connect($dbhost, $dbuser, $dbpasswd);
        mysql_select_db($dbname);
        define('USERS_TABLE', $table_prefix . 'users');
        $sql = 'SELECT username, user_email FROM ' . USERS_TABLE .
                " WHERE user_email = '" . esc_sql($lcemail) . "'";
        $result = mysql_query($sql);
        if ($result) {
            $user = mysql_fetch_row($result);
            if ($user[0]) {
                $user_row = array(
                    'username' => $user[0],
                    'email' => $user[1],
                    'password' => wp_generate_password(),
                );
                return wpbb_WordPress::addUser($user_row);
            }
        }

        return false;
    }

    ////////////////////////////////////////////////////////////

    function get_wp_user_by_name($name) {
        $phpbb_root_path = ABSPATH . PHPBBPATH;
        require($phpbb_root_path . 'config.php');
        $dbr = mysql_connect($dbhost, $dbuser, $dbpasswd);
        mysql_select_db($dbname);
        define('USERS_TABLE', $table_prefix . 'users');
        $sql = 'SELECT username, user_email FROM ' . USERS_TABLE .
                " WHERE username = '" . esc_sql($name) . "'";
        $result = mysql_query($sql);
        if ($result) {
            $user = mysql_fetch_row($result);
            if ($user[0]) {
                $user_row = array(
                    'username' => $user[0],
                    'email' => $user[1],
                    'password' => wp_generate_password(),
                );
                return wpbb_WordPress::addUser($user_row);
            }
        }

        return false;
    }

}

