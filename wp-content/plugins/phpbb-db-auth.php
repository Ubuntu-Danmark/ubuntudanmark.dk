<?php
/**
 * @package phpBB_db_auth
 * @version 1.0
 */
/*
Plugin Name: phpBB Database Authentication
Plugin URI: https://ubuntudanmark.dk/
Description: This package lets you automaticaly siging in if you are logged in to a phpBB forum.
Author: Anders Jenbo
Version: 1.0
*/

if ( is_admin() ){
	add_action(
		'admin_menu',
		function() {
			add_options_page(
				'phpBB DB Auth Settings',
				'phpBB DB Auth',
				'administrator',
				'phpbb-db-auth',
				function() {
					// Set class property
					?><div class="wrap"><h2>phpBB DB Auth Settings</h2><form method="post" action="options.php"> <?php
					// This prints out all hidden setting fields
					settings_fields( 'phpbb-db-auth' );
					do_settings_sections( 'phpbb-db-auth' );
					?><table class="form-table">
						<tr valign="top">
						<th scope="row">phpbb_path</th>
						<td><input type="text" name="phpbb_path" value="<?php echo esc_attr( get_option( 'phpbb_path' ) ); ?>" placeholder="/srv/site/forum" /></td>
						</tr>

						<tr valign="top">
						<th scope="row">Enable normal users:</th>
						<td><input type="checkbox" name="phpbb_registre_no_rank" value="1" <?php checked( get_option( 'phpbb_registre_no_rank' ) ); ?> /></td>
						</tr>
					</table><?php
					submit_button();
					?></form></div><?php
				}
			);
		}
	);
	add_action(
		'admin_init',
		function() {
			register_setting( 'phpbb-db-auth', 'phpbb_path' );
			register_setting( 'phpbb-db-auth', 'phpbb_registre_no_rank' );
		}
	);
}

/**
 * Authenticate the user using the phpBB session cookie.
 *
 * @global string $wpdb
 *
 * @param WP_User|WP_Error|null $user     WP_User or WP_Error object from a previous callback. Default null.
 * @param string                $username Username. If not empty, cancels the authentication.
 * @param string                $password Password. If not empty, cancels the authentication.
 * @return WP_User              WP_User on success.
 */
function phpbb_login( $user, $username, $password ) {
	if ( $user instanceof WP_User || $username || $password) {
		return $user;
	}

	$table_prefix = function() {
		$phpbb_path = get_option( 'phpbb_path' );
		$phpbb_config_path = $phpbb_path . '/config.php';
		if ( ! $phpbb_path || ! file_exists( $phpbb_config_path ) ) {
			return;
		}

		include $phpbb_config_path;

		if ( ! isset( $table_prefix, $dbname ) ) {
			return;
		}

		return $dbname . '.' . $table_prefix;
	};
	$table_prefix = $table_prefix();

	if ( ! $table_prefix ) {
		return;
	}

	global $wpdb;

	$cookie_name = $wpdb->get_var( "SELECT config_value FROM " . $table_prefix . "config WHERE `config_name` = 'cookie_name'" );

	if ( empty( $_COOKIE[$cookie_name . '_sid'] ) ) {
		return;
	}
	$phpBB_sid = $_COOKIE[$cookie_name . '_sid'];

	$phpBB_user_id = $wpdb->get_var( $wpdb->prepare( "SELECT session_user_id FROM " . $table_prefix . "sessions WHERE `session_id` = %s LIMIT 1", $phpBB_sid ) );
	$phpBB_user = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM " . $table_prefix . "users WHERE `user_id` = %d LIMIT 1", $phpBB_user_id ) );
	if ( ! $phpBB_user ) {
		return;
	}
	$phpBB_user = $phpBB_user[0];

	$user = get_user_by( 'email', $phpBB_user->user_email );
	if ($user) {
		return $user;
	}

	if ( ! $phpBB_user->user_rank && ! get_option( 'phpbb_registre_no_rank' ) ) {
		return;
	}

	$user = new stdClass;
	$user->user_email = $phpBB_user->user_email;
	$user->nickname = $phpBB_user->username;
	$user->user_login = $phpBB_user->username;

	$user_id = wp_insert_user( $user );
	$user = get_user_by( 'id', $user_id );

	switch ( $phpBB_user->user_rank ) {
		case 2:
			$role = 'administrator';
		case 3:
			$role = 'editor';
		default:
			$role = get_option('default_role');
	}
	$user->set_role($role);

	return $user;
}

add_filter( 'authenticate', 'phpbb_login', 5, 3 );
