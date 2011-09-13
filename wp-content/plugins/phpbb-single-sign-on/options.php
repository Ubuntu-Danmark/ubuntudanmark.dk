<?php
//wpbb_get_functions_conflict(); //TEST
$connect_phpbb_options = get_option('connect_phpbb_options');
if (empty($connect_phpbb_options)) {
    $connect_phpbb_options = array('path' => '');
}

$message ='';

switch ($_POST['stage']) {

    //Check if there are new options set
    case 'update':
        //Processing the Wordpress Part
        //--------------------------------------------------------------------------
        $new_options = array();

        foreach ($connect_phpbb_options as $key => $option) {
            $new_options[$key] = $_POST[strtolower($key)];
        }

        update_option('connect_phpbb_options', $new_options);
        $connect_phpbb_options = $new_options;

        //Processing the phpbb part
        //--------------------------------------------------------------------------
        $phpbb_db_prefix = wpbb_get_phpbb_prefix();
        if ($phpbb_db_prefix != '') {
            if (isset($_POST['auth_method']) && $_POST['auth_method'] != '') {
                wpbb_set_config_value($phpbb_db_prefix, 'auth_method', $_POST['auth_method']);
            }
            if (isset($_POST['wpbb_path']) && $_POST['wpbb_path'] != '') {
                wpbb_set_config_value($phpbb_db_prefix, 'wpbb_path', $_POST['wpbb_path']);
            }
        }

        if (isset($_POST['reauth_option']) && $_POST['reauth_option'] != '') {
            if ($_POST['reauth_option'] == 'enabled') {
                wpbb_reauth_enable();
            } else {
                wpbb_reauth_disable();
            }
        }

        if (isset($_POST['wp2bb']) && $_POST['wp2bb'] == 'on') {
            update_option('wp2bb_enabled', true);
        } else {
            update_option('wp2bb_enabled', false);
        }

        $message = '<div class="updated"><p>' . __('Updated files', 'phpbb') . '</p></div>';
        break;
    case 'install-common':

        if (is_writable($config_files['common']['folder'])) {
            //is original file ?
            if (wpbb_get_file_version($config_files['common']['destin']) == 'Original') {
                //is original file there ?
                if (file_exists($config_files['common-orig']['destin'])) {
                    unlink($config_files['common-orig']['destin']);
                }
                //put the original file there
                copy($config_files['common']['destin'], $config_files['common-orig']['destin']);
            }

            //in all cases, install the file
            //is the file there ?
            if (file_exists($config_files['common']['destin'])) {
                unlink($config_files['common']['destin']);
            }
            copy($config_files['common']['source'], $config_files['common']['destin']);
        } else {
            $error = true;
        }

        $message = '<div class="updated"><p>' . __('Installed common.php', 'phpbb') . '</p></div>';
        break;
    case 'install-auth':

        //if the auth folder is writable
        if (is_writable($config_files['auth_wpbb']['folder'])) {
            //the file is already installed
            if (!file_exists($config_files['auth_wpbb']['destin'])) {
                copy($config_files['auth_wpbb']['source'], $config_files['auth_wpbb']['destin']);
            } else {
                unlink($config_files['auth_wpbb']['destin']);
                copy($config_files['auth_wpbb']['source'], $config_files['auth_wpbb']['destin']);
            }
            //if the file isn't writable
        } else {
            $error = true;
        }

        $message = '<div class="updated"><p>' . __('WPBB Install', 'phpbb') . '</p></div>';
        break;
    case 'patch-posting':
        wpbb_validate_user_patch(realpath(ABSPATH . PHPBBPATH) . '/posting.php');

        $message = '<div class="updated"><p>' . __('Patched file', 'phpbb') . '</p></div>';
        break;

    case 'patch-user_function';
        wpbb_validate_user_patch(realpath(ABSPATH . PHPBBPATH) . '/includes/functions_user.php');
        wpbb_validate_user2_patch(realpath(ABSPATH . PHPBBPATH) . '/includes/functions_user.php');

        $message = '<div class="updated"><p>' . __('Patched file', 'phpbb') . '</p></div>';
        break;
}


$phpbb_db_prefix = wpbb_get_phpbb_prefix();
if ($phpbb_db_prefix != '') {
    $phpbb_found = true;
} else {
    $phpbb_found = false;
}
?>
<div class="wrap">
    <h2><?php _e('PHP BB Options', 'phpbb') ?></h2>
    <?php echo $message; ?>
    <form name="form1" method="post" id="configuration" action="<?php echo WPBB_OPTIONS_PAGE ?>">
        <input type="hidden" name="stage" value="update" />
        <table class="widefat" summary="" title="PHPBB">
            <thead>
            <tr>
                <th scope="col" colspan="2"><?php _e('Wordpress Part', 'phpbb') ?></th>
                <?php if ($phpbb_found) { ?>
                    <th scope="col" colspan="2"><?php _e('PHPBB Part', 'phpbb') ?></th>
                    <th scope="col" colspan="2"><?php _e('WP2BB Part', 'phpbb') ?></th>
                <?php } ?>
            </tr>
            <tbody id="the-list">
            <tr valign="baseline">
                <th scope="row"><?php _e('Path', 'phpbb') ?></th>
                <td>
                    <input type="text" value="<?php echo $connect_phpbb_options['path'] ?>" name="path" />
                    <div><small><?php _e('To PHPBB from Wordpress', 'phpbb') ?></small></div>
                </td>
                <?php if ($phpbb_found) { ?>
                <th scope="row"><?php _e('Path', 'phpbb'); ?></th>
                <td>
                    <input type="text" value="<?php echo wpbb_get_config_value('wpbb_path') ?>" name="wpbb_path" />
                    <div><small><?php _e('To Wordpress from PHPBB', 'phpbb'); ?></small></div>
                </td>
                <th scope="row"><?php _e('Enable', 'phpbb'); ?></th>
                <td>
                    <?php
                        $wp2bb_checked = '';
                        $wp2bb = get_option('wp2bb_enabled');
                        if(!empty($wp2bb) OR $wp2bb){ $wp2bb_checked = ' checked="checked"'; }
                    ?>
                    <input type="checkbox" value="on" name="wp2bb" <?php echo $wp2bb_checked; ?> />
                    <div><small><?php _e('Enables you to publish your posts in the forum', 'phpbb'); ?></small></div>
                </td>
                <?php } ?>
            </tr>
            <?php if ($phpbb_found) { ?>
                <tr valign="baseline">
                    <td>&nbsp;</td><td>&nbsp;</td>
                    <th scope="row"><?php _e('Auth Method', 'phpbb') ?></th>
                    <td>
                        <select name="auth_method">
                            <?php echo wpbb_select_auth_method(wpbb_get_config_value('auth_method')); ?>
                        </select>
                        <div><small><?php _e('Auth method to use, you have to use "wpbb" to make this plugin work', 'phpbb') ?></small></div>
                    </td>
                    <td>&nbsp;</td><td>&nbsp;</td>
                </tr>
                <tr valign="baseline">
                    <td>&nbsp;</td><td>&nbsp;</td>
                    <th scope="row"><?php _e('ACP Reauthentication', 'phpbb') ?></th>
                    <td>
                        <select name="reauth_option">
                            <?php echo wpbb_select_reauth(); ?>
                        </select>
                        <div><small><?php _e('Sometimes the ACP won\'t let you log in, disable the relog', 'phpbb') ?></small></div>
                    </td>
                    <td>&nbsp;</td><td>&nbsp;</td>
                </tr>
            <?php } ?>

            </tbody>
        </table>
        <p class="submit">
            <input type="submit" name="Submit" value="<?php _e('Save Changes', 'phpbb') ?>" />
        </p>
    </form>


<?php
$error = wpbb_run_test();

if ($error == true) {
?>
    <p>The phpBB Plugin is not activated now.</p>

    <p>If the check didn't work correctly, you can see on the following instructions on how to manually correct the problems.</p>
    <p>Notice : if the first test isn't correct, the following won't work, so please do it in the right order.</p>

    <p><strong>Wordpress Path</strong></p>
    <p>This is the first thing you have to set, it is the relative path to your PHPBB installation.<br />
        If the wordpress is at the root of your web folder (/www/) and your forum in the wordpress folder (www/forum/).<br />
        You will have to set <strong>forum/</strong> as path. (don't forget the end slash)
    </p>

    <p><strong>auth_wpbb.php</strong></p>
    <p>This file must be copied from <strong><?php echo $config_files['auth_wpbb']['source']; ?></strong> to <strong><?php echo $config_files['auth_wpbb']['destin']; ?></strong></p>

    <p><strong>common.php</strong></p>
    <?php if (wpbb_get_file_version($config_files['common']['destin']) == 'Original') { ?>
            <p>It seems that this file is the original common.php file.<br />
                you will have to rename this file from <strong>common.php</strong> to <strong>common-orig.php</strong><br />
                the file is in the folder <strong><?php echo $config_files['common']['folder'] ?></strong></p>
    <?php } ?>
    <p>This file must be copied from <strong><?php echo $config_files['common']['source']; ?></strong> to <strong><?php echo $config_files['common']['destin']; ?></strong></p>

    <p><strong>common-orig.php</strong></p>
    <p>You already did this on the previous step, this file doesn't exist by default, it's the original common.php file, because this script needs another one in place to load some libraries</p>

    <p><strong>auth_method</strong></p>
    <p>This form element only appears when the path_var is correctly set.<br />You have to set it to <strong>wpbb</strong></p>
    <p></p>
<?php } ?>
</div>