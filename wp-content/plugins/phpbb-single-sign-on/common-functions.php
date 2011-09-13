<?php

//Load ABSPATH & PHPBBPATH
wpbb_phpBB3::loadConstants();

//prepare the paths to the folders and files
$config_files = array(
    'auth_wpbb' => array(
        'source' => realpath(dirname(__FILE__) . '/files/auth_wpbb.php'),
        'destin' => realpath(ABSPATH . PHPBBPATH . 'includes/auth') . '/auth_wpbb.php',
        'folder' => realpath(ABSPATH . PHPBBPATH . 'includes/auth')
    ),
    'common' => array(
        'source' => realpath(dirname(__FILE__) . '/files/common.php'),
        'destin' => realpath(ABSPATH . PHPBBPATH) . '/common.php',
        'folder' => realpath(ABSPATH . PHPBBPATH)
    ),
    'common-orig' => array(
        'destin' => realpath(ABSPATH . PHPBBPATH) . '/common-orig.php',
    ),
);

/*
 * Updater Part
 */
function wpbb_get_file_version($file) {
    if (file_exists($file)) {
        $content = file_get_contents($file);
        if (strpos($content, '@version $Id') !== false) {
            return "Original";
        }
        preg_match('/@version\s([0-9.]+)/', $content, $version);
        return $version[1];
    } else {
        return 0;
    }
}

function wpbb_create_form($action, $title) {
    static $form_num;

    if(empty($form_num)){
        $form_num = 1;
    } else {
        $form_num++;
    }

return '
    <form name="form'.$form_num.'" method="post" action="'.WPBB_OPTIONS_PAGE.'">
        <input type="hidden" name="stage" value="'.$action.'" />
        <input type="submit" name="Submit" value="'.__($title, 'phpbb').'" class="button" />
    </form>
';
}

function wpbb_get_file_versions() {
    global $config_files;
    //GETS all the files versions ::
    $file_versions = array(
        'auth_wpbb' => array(
            'source' => wpbb_get_file_version($config_files['auth_wpbb']['source']),
            'destin' => wpbb_get_file_version($config_files['auth_wpbb']['destin'])
        ),
        'common' => array(
            'source' => wpbb_get_file_version($config_files['common']['source']),
            'destin' => wpbb_get_file_version($config_files['common']['destin'])
        ),
        'common-orig' => array(
            'destin' => wpbb_get_file_version($config_files['common-orig']['destin']),
        )
    );
    return $file_versions;
}

/*
 * PHPBB config Part
 */

function wpbb_get_config_value($config_name) {
    global $wpdb;

    //Get_the phpbb prefix
    $phpbb_db_prefix = wpbb_get_phpbb_prefix();
    $config_table = $phpbb_db_prefix . 'config';

    $data = $wpdb->get_var('SELECT config_value FROM ' . $config_table . ' WHERE config_name = \'' . $config_name . '\'', 0, 0);

    return $data;
}

function wpbb_set_config_value($prefix, $config_name, $value) {
    global $wpdb;

    if ($prefix != '') {
        $config_table = $prefix . 'config';

        $query = "UPDATE `" . $config_table . "` SET `config_value` = '" . $value . "' WHERE `config_name` = '" . $config_name . "'";
        $wpdb->query($query);
    }
}

function wpbb_get_phpbb_prefix() {
    $file = wpbb_phpBB3::phpbbConfig();

    if (file_exists($file)) {
        $content = file_get_contents($file);

        preg_match('/dbname\s{0,}=\s{0,}[\'"]([0-9A-Za-z_]+)[\'"]/', $content, $dbname);
        preg_match('/table_prefix\s{0,}=\s{0,}[\'"]([0-9A-Za-z_]+)[\'"]/', $content, $table_prefix);

        return $table_prefix[1];
    } else {
        return 0;
    }
}

//function to get the auth modes, copied from phpbb 3.0.6 : /includes/acp_/acp_board.php line 665
function wpbb_select_auth_method($selected_method, $key = '') {
    $phpbb_root_path = ABSPATH . PHPBBPATH;
    $phpEx = 'php';

    $auth_plugins = array();

    $dp = @opendir($phpbb_root_path . 'includes/auth');

    if (!$dp) {
        return '';
    }

    while (($file = readdir($dp)) !== false) {
        if (preg_match('#^auth_(.*?)\.' . $phpEx . '$#', $file)) {
            $auth_plugins[] = preg_replace('#^auth_(.*?)\.' . $phpEx . '$#', '\1', $file);
        }
    }
    closedir($dp);

    sort($auth_plugins);

    $auth_select = '';
    foreach ($auth_plugins as $method) {
        $selected = ($selected_method == $method) ? ' selected="selected"' : '';
        $auth_select .= '<option value="' . $method . '"' . $selected . '>' . $method . '</option>';
    }

    return $auth_select;
}

function wpbb_reauth_enabled(){
    $filename = ABSPATH . PHPBBPATH.'adm/index.php';
    $file = file_get_contents($filename);

    if(strpos($file, '//login_box(\'\', $user->lang[\'LOGIN_ADMIN_CONFIRM\'], $user->lang[\'LOGIN_ADMIN_SUCCESS\'], true, false);') !== false){
        return false;
    } else {
        return true;
    }
}

function wpbb_reauth_disable(){
    $filename = ABSPATH . PHPBBPATH.'adm/index.php';
    $file = file_get_contents($filename);

    $file = str_replace(
            "\t".'login_box(\'\', $user->lang[\'LOGIN_ADMIN_CONFIRM\'], $user->lang[\'LOGIN_ADMIN_SUCCESS\'], true, false);',
            "\t".'//login_box(\'\', $user->lang[\'LOGIN_ADMIN_CONFIRM\'], $user->lang[\'LOGIN_ADMIN_SUCCESS\'], true, false);',
            $file);
    file_put_contents($filename, $file);
}

function wpbb_reauth_enable(){
    $filename = ABSPATH . PHPBBPATH.'adm/index.php';
    $file = file_get_contents($filename);

    $file = str_replace(
            "\t".'//login_box(\'\', $user->lang[\'LOGIN_ADMIN_CONFIRM\'], $user->lang[\'LOGIN_ADMIN_SUCCESS\'], true, false);',
            "\t".'login_box(\'\', $user->lang[\'LOGIN_ADMIN_CONFIRM\'], $user->lang[\'LOGIN_ADMIN_SUCCESS\'], true, false);',
            $file);
    file_put_contents($filename, $file);
}

function wpbb_select_reauth() {
    $phpbb_root_path = ABSPATH . PHPBBPATH;

    if(wpbb_reauth_enabled()){
        $selected_auth = 'enabled';
    } else {
        $selected_auth = 'disabled';
    }

    $auth_plugins = array(
        'enabled' => __('Enabled'),
        'disabled' => __('Disabled')
    );

    $auth_select = '';
    foreach ($auth_plugins as $method => $value) {
        $selected = ($selected_auth == $method) ? ' selected="selected"' : '';
        $auth_select .= '<option value="' . $method . '"' . $selected . '>' . $value . '</option>';
    }

    return $auth_select;
}

/*
 * Test Part
 */

function wpbb_run_test($echo = true) {
    global $config_files;
    wp_cache_delete('connect_phpbb_options', 'options');
    $file_versions = wpbb_get_file_versions();

    $plugin_url = WP_PLUGIN_URL.'/'.dirname(plugin_basename(__FILE__)).'/';

    $test = array(
        'auth_wpbb' => true,
        'common' => true,
        'common-orig' => array('state' => true, 'message' => 'Original'),
        'auth_method' => true,
        'path_var' => true,
        'posting.php' => true,
        'functions_user.php' => true,
    );
    $error = false;

    $phpbb_db_prefix = wpbb_get_phpbb_prefix();
    if ($phpbb_db_prefix != '') {
        $phpbb_found = true;
    } else {
        $phpbb_found = false;
    }



    /**
     * Configurations
     */

    $result = '<tr><th colspan="5">'.__('configuration', 'phpbb').'</th></tr>';

    ////////////////////////////////////////////////////////////////////////////
    //path_var
    

    $path_var = get_option('connect_phpbb_options');
    if (!(isset($path_var['path']) && $path_var['path'] != '')) {
        $error = true;
        $test['path_var'] = false;
    }

    if($echo){
        $result .= '<tr class="alternate">
                <td>Wordpress Path</td>
                <th><i>Variable</i></th>
                <td>' . $path_var['path'] . '</td>
                <td>' . wpbb_passed_test($test['path_var']) . '</td>
                <td><a href="#configuration" class="button" style="height:17px; margin:1px; line-height:23px;">'.__('Configure').'</a></td>
            </tr>';
    }

    ////////////////////////////////////////////////////////////////////////////
    //auth_method
    $auth_method = wpbb_get_config_value('auth_method');
    if ($auth_method != 'wpbb') {
        $error = true;
        $test['auth_method'] = false;
    }

    if($echo){
            $result .= '<tr>
                <td>Auth Mode</td>
                <td>wpbb</td>
                <td>' . $auth_method . '</td>
                <td>' . wpbb_passed_test($test['auth_method']) . '</td>
                <td>' . (($phpbb_found)? '<a href="#configuration" class="button" style="height:17px; margin:1px; line-height:23px;">'.__('Configure').'</a>' : '').'</td>
            </tr>';
    }

    if($echo){
        $result .= '<tr class="alternate"><th colspan="5">'.__('Files', 'phpbb').'</th></tr>';
    }

    ////////////////////////////////////////////////////////////////////////////
    //auth_wpbb.php
    if ($file_versions['auth_wpbb']['source'] != $file_versions['auth_wpbb']['destin']) {
        $error = true;
        $test['auth_wpbb'] = false;
    }



    if($echo){
        $result .= '<tr>
                <td>auth_wpbb.php</td>
                <td>' . $file_versions['auth_wpbb']['source'] . '</td>
                <td>' . $file_versions['auth_wpbb']['destin'] . '</td>
                <td>' . wpbb_passed_test($test['auth_wpbb']) . '</td>
                <td>' . (($phpbb_found)? wpbb_create_form('install-auth','Install') : '').'</td>
            </tr>';
    }

    ////////////////////////////////////////////////////////////////////////////
    //common.php
    if ($file_versions['common']['source'] != $file_versions['common']['destin']) {
        $error = true;
        $test['common'] = false;
    }

    if($echo){
        $result .= '<tr class="alternate">
                <td>common.php</td>
                <td>' . $file_versions['common']['source'] . '</td>
                <td>' . $file_versions['common']['destin'] . '</td>
                <td>' . wpbb_passed_test($test['common']) . '</td>
                <td>' . (($phpbb_found)? wpbb_create_form('install-common','Install') : '').'</td>
            </tr>';
    }


    ////////////////////////////////////////////////////////////////////////////
    //common-orig.php
    if (file_exists($config_files['common-orig']['destin'])) {
        if ($file_versions['common-orig']['destin'] !== 'Original') {
            $error = true;
            $test['common-orig'] = array('state' => false, 'message' => 'Wrong Version');
        }
    } else {
        $error = true;
        $test['common-orig'] = array('state' => false, 'message' => 'File not found');
    }

    if($echo){
        $result .= '<tr>
                <td>common-orig.php</td>
                <td>-</td>
                <td>' . $test['common-orig']['message'] . '</td>
                <td>' . wpbb_passed_test($test['common-orig']) . '</td>
                <td>' . (($phpbb_found)? wpbb_create_form('install-common','Install') : '').'</td>
            </tr>';
    }

    ////////////////////////////////////////////////////////////////////////////

    $result .= '<tr class="alternate"><th colspan="5">'.__('Patches', 'phpbb').'</th></tr>';

    ////////////////////////////////////////////////////////////////////////////
    //posting.php
    $posting_patched = wpbb_validate_user_patched(realpath(ABSPATH . PHPBBPATH).'/posting.php');
    if(!$posting_patched){
        $error = true;
        $test['posting.php'] = false;
    }

    if($echo){
        $result .= '<tr>
                <td>posting.php</td>
                <th>'.__('Yes').'</th>
                <td>' . (($posting_patched)? __('Yes') : __('No')) . '</td>
                <td>' . wpbb_passed_test($test['posting.php']) . '</td>
                <td>' . (($phpbb_found)? wpbb_create_form('patch-posting','Patch') : '').'</td>
            </tr>';
    }


    ////////////////////////////////////////////////////////////////////////////
    //includes/functions_user.php
    $functions_user = wpbb_validate_user_patched(realpath(ABSPATH . PHPBBPATH).'/includes/functions_user.php');
    $functions_user2 = wpbb_validate_user2_patched(realpath(ABSPATH . PHPBBPATH).'/includes/functions_user.php');
    if(!$functions_user OR !$functions_user2){
        $error = true;
        $test['functions_user.php'] = false;
    }

    if($echo){
        $result .= '<tr class="alternate">
                <td>functions_user.php</td>
                <th>'.__('Yes').'</th>
                <td>' . (($functions_user)? __('Yes') : __('No')) . '</td>
                <td>' . wpbb_passed_test($test['functions_user.php']) . '</td>
                <td>' . (($phpbb_found)? wpbb_create_form('patch-user_function','Patch') : '').'</td>
            </tr>';
    }

    
    ////////////////////////////////////////////////////////////////////////////

    if ($echo){
        echo '
	<table class="widefat" summary="" title="PHPBB">
		<thead>
		<tr>
                        <th scope="col">&nbsp;</th>
			<th scope="col">'.__('Recommended', 'phpbb').'</th>
			<th scope="col">'.__('Current', 'phpbb').'</th>
			<th scope="col">'.__('OK ?', 'phpbb').'</th>
                        <th scope="col">'.__('Action', 'phpbb').'</th>
		</tr>
		<tbody id="the-list">
                '.$result.'
		</tbody>
	</table>
        ';
    }

    return $error;
}

function wpbb_passed_test($test_result) {
    if (is_array($test_result)) {
        $test_result = $test_result['state'];
    }
    if ($test_result) {
        return '<span style="color:green">OK</span>';
    } else {
        return '<span style="color:red">Error</span>';
    }
}

/*
 * Functions list Part
 */

/*function wpbb_get_functions_conflict() {
    $functions_list = wpbb_folder_function_list(ABSPATH . PHPBBPATH);

    $modules_directory = str_replace('/phpbb-single-sign-on', '', dirname(__FILE__));

    $modules_list = wpbb_get_modules_list($modules_directory);

    foreach ($modules_list as $module) {
        $list = wpbb_folder_function_list($modules_directory . '/' . $module . '/');

        print_r(array_intersect($list, $functions_list));
    }
}

function wpbb_get_modules_list($modules_directory) {
    $modules_list = array();

    $iterator = new DirectoryIterator($modules_directory);
    foreach ($iterator as $file) {
        if ($file->isDir() && !$file->isDot()) {
            $name = $file->getFilename();
            if ($name != 'phpbb-single-sign-on') {
                $modules_list[] = $name;
            }
        }
    }
    return $modules_list;
}

function wpbb_folder_function_list($folder) {
    $file_list = wpbb_get_files_list($folder);

    $function_list = array();
    foreach ($file_list as $file) {
        $file_path = $folder . $file;
        $function_list = array_merge($function_list, wpbb_functions_list($file_path));
    }

    $function_list = array_unique($function_list);

    return $function_list;
}

function wpbb_get_files_list($directory, &$list = array(), $base = '') {
    $iterator = new DirectoryIterator($directory);
    foreach ($iterator as $file) {

        if (!$file->isDot()) {
            $name = $file->getFilename();

            if ($file->isDir() && $name != 'cache') {
                wpbb_get_files_list($directory . '/' . $name, &$list, $base . $name . '/');
            } else {
                if (strpos($name, '.php') !== false && $name != 'auth_wpbb.php' && $name != 'common-orig.php') {
                    $list[] = $base . $name;
                }
            }
        }
    }
    return $list;
}

function wpbb_functions_list($file) {
    if (file_exists($file)) {
        $content = file_get_contents($file);

        preg_match_all('/function\s{1,}([0-9A-Za-z_\-]+)\s{0,}\(/', $content, $functions);

        if (count($functions != 0)) {
            return $functions[1];
        }
    }
    //else
    return array();
}*/

function wpbb_validate_user_patch($file) {
    if (file_exists($file)) {
        $content = file_get_contents($file);
        $content = str_replace(' phpbb_validate_username', ' validate_phpbb_username', $content); //DEBUG PHASE, REMOVE FOR PROD
        $content = str_replace(' validate_username', ' validate_phpbb_username', $content);

        file_put_contents($file, $content);
        return true;
    } else {
        return false;
    }
}

function wpbb_validate_user_patched($file) {
    if (file_exists($file)) {
        $content = file_get_contents($file);

        if(strpos($content,'validate_phpbb_username') !== false){
            return true;
        } else {
            return false;
        }
        
    } else {
        return false;
    }
}


function wpbb_validate_user2_patch($file) {
    if (file_exists($file)) {
        $content = file_get_contents($file);
        $content = str_replace(
                '$function = array_shift($validate);'."\n\t\t\t".'array',
                '$function = array_shift($validate);'."\n\t\t\t".'if($function == \'username\'){$function = \'phpbb_username\';}'."\n\t\t\t".'array', $content);

        file_put_contents($file, $content);
        return true;
    } else {
        return false;
    }
}

function wpbb_validate_user2_patched($file) {
    if (file_exists($file)) {
        $content = file_get_contents($file);

        if(strpos($content,'$function = array_shift($validate);'."\n\t\t\t".'if($function == \'username\'){$function = \'phpbb_username\';}') !== false){
            return true;
        } else {
            return false;
        }

    } else {
        return false;
    }
}


class Registry extends ArrayObject
{
    /**
     * Class name of the singleton registry object.
     * @var string
     */
    private static $_registryClassName = 'Registry';

    /**
     * Registry object provides storage for shared objects.
     * @var Zend_Registry
     */
    private static $_registry = null;

    /**
     * Retrieves the default registry instance.
     *
     * @return Zend_Registry
     */
    public static function getInstance()
    {
        if (self::$_registry === null) {
            self::init();
        }

        return self::$_registry;
    }

    /**
     * Set the default registry instance to a specified instance.
     *
     * @param Zend_Registry $registry An object instance of type Zend_Registry,
     *   or a subclass.
     * @return void
     * @throws Zend_Exception if registry is already initialized.
     */
    public static function setInstance(Registry $registry)
    {
        if (self::$_registry !== null) {
            throw new Exception('Registry is already initialized');
        }

        self::setClassName(get_class($registry));
        self::$_registry = $registry;
    }

    /**
     * Initialize the default registry instance.
     *
     * @return void
     */
    protected static function init()
    {
        self::setInstance(new self::$_registryClassName());
    }

    /**
     * Set the class name to use for the default registry instance.
     * Does not affect the currently initialized instance, it only applies
     * for the next time you instantiate.
     *
     * @param string $registryClassName
     * @return void
     * @throws Zend_Exception if the registry is initialized or if the
     *   class name is not valid.
     */
    public static function setClassName($registryClassName = 'Registry')
    {
        if (self::$_registry !== null) {
            throw new Exception('Registry is already initialized');
        }

        if (!is_string($registryClassName)) {
            throw new Exception("Argument is not a class name");
        }

        self::$_registryClassName = $registryClassName;
    }

    /**
     * Unset the default registry instance.
     * Primarily used in tearDown() in unit tests.
     * @returns void
     */
    public static function _unsetInstance()
    {
        self::$_registry = null;
    }

    /**
     * getter method, basically same as offsetGet().
     *
     * This method can be called from an object of type Zend_Registry, or it
     * can be called statically.  In the latter case, it uses the default
     * static instance stored in the class.
     *
     * @param string $index - get the value associated with $index
     * @return mixed
     * @throws Zend_Exception if no entry is registerd for $index.
     */
    public static function get($index)
    {
        $instance = self::getInstance();

        if (!$instance->offsetExists($index)) {
            throw new Exception("No entry is registered for key '$index'");
        }

        return $instance->offsetGet($index);
    }

    /**
     * setter method, basically same as offsetSet().
     *
     * This method can be called from an object of type Zend_Registry, or it
     * can be called statically.  In the latter case, it uses the default
     * static instance stored in the class.
     *
     * @param string $index The location in the ArrayObject in which to store
     *   the value.
     * @param mixed $value The object to store in the ArrayObject.
     * @return void
     */
    public static function set($index, $value)
    {
        $instance = self::getInstance();
        $instance->offsetSet($index, $value);
    }

    /**
     * Returns TRUE if the $index is a named value in the registry,
     * or FALSE if $index was not found in the registry.
     *
     * @param  string $index
     * @return boolean
     */
    public static function isRegistered($index)
    {
        if (self::$_registry === null) {
            return false;
        }
        return self::$_registry->offsetExists($index);
    }

    /**
     * Constructs a parent ArrayObject with default
     * ARRAY_AS_PROPS to allow acces as an object
     *
     * @param array $array data array
     * @param integer $flags ArrayObject flags
     */
    public function __construct($array = array(), $flags = parent::ARRAY_AS_PROPS)
    {
        parent::__construct($array, $flags);
    }

    /**
     * @param string $index
     * @returns mixed
     *
     * Workaround for http://bugs.php.net/bug.php?id=40442 (ZF-960).
     */
    public function offsetExists($index)
    {
        return array_key_exists($index, $this);
    }

}