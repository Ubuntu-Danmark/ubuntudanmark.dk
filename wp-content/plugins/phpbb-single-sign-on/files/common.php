<?php

/**
 * Common.php file Replacement for PHPBB - Wordpress Connector
 *
 * This is for the loading without conflict of the two scripts
 *
 * @package login
 * @version 0.9
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 *
 */

if (!defined('LOADED_WP')) {
    define('LOADED_PHPBB', true);
}


function include_for_eval($file)
{
    $file_contents = file_get_contents($file);
    $file_contents = preg_replace('/^\s*\<\?php/', '', $file_contents);
    $file_contents = preg_replace('/\?\>\s*$/', '', $file_contents);

    return $file_contents;
}

//Affected files :

//Common.php
//config.php
//includes/session.php
//includes/functions_content.php
//includes/constants.php

$include_common_contents = include_for_eval($phpbb_root_path . 'common-orig.' . $phpEx);

//called on line 127 of common.php //require($phpbb_root_path . 'config.' . $phpEx);
$include_config_contents = include_for_eval($phpbb_root_path . 'config.' . $phpEx);

//called on line 189 of common.php //require($phpbb_root_path . 'includes/session.' . $phpEx);
$include_session_contents = include_for_eval($phpbb_root_path . 'includes/session.' . $phpEx);

//called on line 193 of common.php //require($phpbb_root_path . 'includes/functions_content.' . $phpEx);
$include_formatting_contents = include_for_eval($phpbb_root_path . 'includes/functions_content.' . $phpEx);

//called on line 195 of common.php //require($phpbb_root_path . 'includes/constants.' . $phpEx);
$include_constants_contents = include_for_eval($phpbb_root_path . 'includes/constants.' . $phpEx);

//Fusionne
$include_common_contents = str_replace(
    'require($phpbb_root_path . \'config.\' . $phpEx);',
    $include_config_contents,
    $include_common_contents
);
$include_common_contents = str_replace(
    'require($phpbb_root_path . \'includes/session.\' . $phpEx);',
    $include_session_contents,
    $include_common_contents
);
$include_common_contents = str_replace(
    'require($phpbb_root_path . \'includes/functions_content.\' . $phpEx);',
    $include_formatting_contents,
    $include_common_contents
);
$include_common_contents = str_replace(
    'require($phpbb_root_path . \'includes/constants.\' . $phpEx);',
    $include_constants_contents,
    $include_common_contents
);

//Clean memory
unset($include_config_contents);
unset($include_session_contents);
unset($include_formatting_contents);
unset($include_constants_contents);


//removes $table_prefix conflict
$include_common_contents = str_replace('$table_prefix', '$dbname.".".$table_prefix2', $include_common_contents);

//removes make_clickable() conflict
$include_common_contents = str_replace('make_clickable', 'wpbb_make_clickable', $include_common_contents);


/*
 * COOKIE
 */

//corrige le get_cookie
$original_get_cookie = array(
    '$this->cookie_data[\'u\'] = request_var($config[\'cookie_name\'] . \'_u\', 0, false, true);',
    '$this->cookie_data[\'k\'] = request_var($config[\'cookie_name\'] . \'_k\', \'\', false, true);',
    '$this->session_id 		= request_var($config[\'cookie_name\'] . \'_sid\', \'\', false, true);'
);
$new_get_cookie = array(
    '$this->cookie_data[\'u\'] = $_COOKIE[$config[\'cookie_name\'] . \'_u\'];',
    '$this->cookie_data[\'k\'] = $_COOKIE[$config[\'cookie_name\'] . \'_k\'];',
    '$this->session_id = $_COOKIE[$config[\'cookie_name\'] . \'_sid\'];'
);
$include_common_contents = str_replace($original_get_cookie, $new_get_cookie, $include_common_contents);

//Include de la version modifiée de common.php
eval($include_common_contents);


/**
 * Loads Wordpress
 */

//save all vars before they're escaped by wordpress (but not $_FILE nor $GLOBALS)
$saved_vars = array(
    'SERVER' => $_SERVER,
    'GET' => $_GET,
    'POST' => $_POST,
    'COOKIE' => $_COOKIE,
    'SESSION' => $_SESSION,
    'REQUEST' => $_REQUEST,
    'ENV' => $_ENV
);

$wbh = '/' . (isset($config['wpbb_path'])? $config['wpbb_path'] : '') . 'wp-blog-header.php';

$root_path = dirname(__FILE__);

//tests if the wordpress files exist
if (file_exists(dirname($root_path) . $wbh)) {
    include dirname($root_path) . $wbh;
} else {
    if (file_exists($root_path . $wbh)) {
        include $root_path . $wbh;
    } else {
        //nothing found
    }
}

header("HTTP/1.0 200 OK");

//restore all vars.
foreach ($saved_vars as $key => $val) {
    $varname = '_' . $key;
    global $$varname;
    $$varname = $val;
}

