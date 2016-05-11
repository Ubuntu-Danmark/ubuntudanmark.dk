<?php
/**
 * Show twitter follow me badge
 *
 * @package wp-followme-css
 * @version 3.0.0
 */

/*
Plugin Name: WP FollowMe CSS
Plugin URI: https://ubuntudanmark.dk/
Description: WP FollowMe CSS is a wordpress plugin that allow you to add a twitter "Follow Me" badge on your WordPress blog.
Author: Anders Jenbo
Version: 3.0.0
*/

/**
 * Set up defaults for plugin
 */
register_activation_hook( __FILE__, function() {
	if ( ! get_option( 'wp_followme_options' ) ) {
		$wp_followme = array(
			'twitter'     => '',
			'top'         => '200',
			'align'       => 'right',
			'followmsg'   => 'Follow Me',
			'icon'        => plugins_url( 'icons/11.png', __FILE__ ),
			'color'       => '59B7FF',
			'iconbgcolor' => 'FFFFFF',
			'textcolor'   => 'FFFFFF',
			'textsize'    => '14',
			'textfont'    => 'Verdana',
			'bordercolor' => 'FFFFFF',
		);
		update_option( 'wp_followme_options', $wp_followme );
	}
} );

/**
 * Delete settings from the database on uninstall
 */
register_uninstall_hook( __FILE__, 'wp_followme_css_uninstall_hook' );
function wp_followme_css_uninstall_hook() {
    delete_option('wp_followme_options');
};

/**
 * Add settings link to plugin page
 */
add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), function( $links ) {
	$settings_link = '<a href="options-general.php?page=followme.php">' . __( 'Settings' ) . '</a>';
	array_push( $links, $settings_link );
	return $links;
} );

/**
 * Setup admin warnings
 */
add_action( 'init', function() {
	add_action( 'admin_notices', function() {
		$wp_followme = get_option( 'wp_followme_options' );

		if ( ! $wp_followme['twitter'] ) {
			echo '<div id="followme-warning" class="updated fade"><p><strong>WP FollowMe CSS plugin is not configured yet.</strong> You must <a href="options-general.php?page=followme.php">enter your Twitter URL</a> for it to work.</p></div>';
		} elseif ( substr( $wp_followme['twitter'], 0, 4 ) !== 'http' ) {
			echo '<div id="followme-warning" class="updated fade"><p><strong>WP FollowMe CSS plugin is not properly configured.</strong> The <a href="options-general.php?page=followme.php">Twitter URL</a> must begin with http.</p></div>';
		}
	} );
} );

/**
 * Inline styles
 */
add_action( 'wp_head', function() {
	$wp_followme = get_option( 'wp_followme_options' );
	?><style type="text/css">
	.wp_followme_c2 {
		position: fixed;
		background: #<?php esc_attr_e( $wp_followme['color'] ); ?>;
		top: <?php echo (int) $wp_followme['top']; ?>px;
		<?php esc_attr_e( $wp_followme['align'] ); ?>: 0px;
		width: 32px;
		height: 160px;
		border: 1px solid #<?php esc_attr_e( $wp_followme['bordercolor'] ); ?>;
		color: #<?php esc_attr_e( $wp_followme['textcolor'] ); ?>;
		font-family: <?php $wp_followme['textfont']; ?>;
		font-size: <?php echo (int) $wp_followme['textsize']; ?>px;
		font-weight: bold;
	}
	.wp_followme_c2 .rotate180 {
		width: 130px;
		height: 32px;
		position: absolute;
		bottom: 48px;
		left: -49px;
		line-height: 32px;
		text-align: center;
	}
	.rotate180 {
		-webkit-transform: rotate(-90deg);
		-moz-transform: rotate(-90deg);
		-o-transform: rotate(-90deg);
		-ms-transform: rotate(-90deg);
		transform: rotate(-90deg);
		filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=3);
	}
</style><?php
} );

/**
 * Render badge
 */
add_action( 'wp_footer', function() {
	$wp_followme = get_option( 'wp_followme_options' );
	?><div style="position:relative">
	<div class="wp_followme_c2">
		<a href="<?php esc_attr_e( $wp_followme['twitter'] ); ?>" style="color:rgb(255, 255, 255)">
			<img src="<?php esc_attr_e( $wp_followme['icon'] ); ?>"<?php
			if ( $wp_followme['iconbgcolor'] ) {
				echo 'style="background:#' . esc_attr( $wp_followme['iconbgcolor'] ) . '"';
			}
			?>>
			<div class="rotate180"><?php esc_html_e( $wp_followme['followmsg'] ); ?></div>
		</a>
	</div>
</div><?php
} );

/**
 * Render settings page
 */
function wp_followme_settings_page() {
	require_once( ABSPATH . '/wp-admin/includes/plugin-install.php' );

	wp_enqueue_script( 'jscolor', plugins_url( 'js/jscolor.min.js', __FILE__ ) );
	wp_enqueue_script( 'jquery' );
	?>
<script type="text/javascript">
	jQuery(function() {
		var iconurl = jQuery('#iconurl');
		var twit_icon = jQuery('.twit_icon');
		var iconHighlightStyle = '2px dotted #ABABAB';
		var iconDisabledStyle = '2px dotted transparent';

		// Disable input if overwritten
		jQuery('#iconbgc').click(function() {
			var iconbgi = jQuery('#iconbgi');
			if (jQuery('#iconbgc:checked').length) {
				iconbgi.prop('disabled', true);
			} else {
				iconbgi.prop('disabled', false);
			}
		});

		// Highlight icon on select
		twit_icon.click(function() {
			var selectedBg = jQuery(this);
			iconurl.val(selectedBg.attr('src'));
			twit_icon.css('border', iconDisabledStyle);
			selectedBg.css('border', iconHighlightStyle);
		});

		// Highlight previously selected icon
		twit_icon.css('border', iconDisabledStyle);
		jQuery('.twit_icon[src="' + iconurl.val() + '"]').css('border', iconHighlightStyle);
	});
</script>
<div class="wrap">
	<h2>WP FollowMe CSS</h2>

	<form id="followme_options" method="post" action="options.php">
		<div id="poststuff" class="metabox-holder has-right-sidebar">

			<div style="float:left;width:60%">
				<?php
				settings_fields( 'wp-followme-group' );
				$wp_followme = get_option( 'wp_followme_options' );
				?>
				<h2>Settings</h2>

				<div class="postbox" style="line-height:1.4em">
					<h3 style="cursor:pointer"><span>WP FollowMe CSS Options</span></h3>
					<div>
						<table class="form-table">


							<tr valign="top" class="alternate">
								<th scope="row" style="width:20%"><label for="wp_followme_options[twitter]" style="font-weight:bold">Your Twitter URL</label></th>
								<td>
									<input autocomplete="off" type="text" name="wp_followme_options[twitter]" value="<?php esc_attr_e( $wp_followme['twitter'] ); ?>" class="regular-text code" /> <br />Example: https://twitter.com/wpburn<br />
									<?php
									if ( isset( $wp_followme['twitter'] ) ) {
										if ( ! $wp_followme['twitter'] ) {
											echo '<span style="color:red">Error:</span> <strong>Twitter URL cannot be blank</strong>';
										} elseif ( mb_substr( $wp_followme['twitter'], 0, 4 ) !== 'http' ) {
											echo '<span style="color:red">Error:</span> <strong>Twitter URL must begin with <em>http</em></strong>';
										}
									}
									?>
								</td>
							</tr>


							<tr valign="top" class="alternate">
								<th scope="row" style="width:20%"><label for="wp_followme_options[followmsg]">Follow message</label></th>
								<td><input autocomplete="off" type="text" name="wp_followme_options[followmsg]" value="<?php esc_attr_e( $wp_followme['followmsg'] ); ?>" class="regular-text code" /></td>
							</tr>


							<tr valign="top" class="alternate">
								<th scope="row" style="width:20%"><label for="wp_followme_options[textfont]">Font</label></th>
								<td><input autocomplete="off" type="text" name="wp_followme_options[textfont]" value="<?php esc_attr_e( $wp_followme['textfont'] ); ?>" class="regular-text code" /></td>
							</tr>


							<tr valign="top" class="alternate">
								<th scope="row" style="width:20%"><label for="wp_followme_options[textsize]">Font size</label></th>
								<td><input autocomplete="off" type="text" name="wp_followme_options[textsize]" value="<?php esc_attr_e( $wp_followme['textsize'] ); ?>" class="regular-text code" /></td>
							</tr>

							<tr valign="top">
								<th scope="row" style="width:20%"><label for="wp_followme_options[color]">Background color</label></th>
								<td><input autocomplete="off" type="text" name="wp_followme_options[color]" value="<?php esc_attr_e( $wp_followme['color'] ); ?>" id="iconbgall" class="jscolor regular-text code" /></td>
							</tr>

							<tr valign="top">
								<th scope="row" style="width:20%"><label for="wp_followme_options[iconbgcolor]">Icon background color</label></th>
								<td><input autocomplete="off" type="text" name="wp_followme_options[iconbgcolor]" value="<?php esc_attr_e( $wp_followme['iconbgcolor'] ?: $wp_followme['color'] ); ?>"<?php
								if ( ! $wp_followme['iconbgcolor'] ) {
									echo ' disabled="disabled"';
								}
								?> id="iconbgi" class="jscolor regular-text code" />
								<br />
								<input id="iconbgc" type="checkbox" name="iconbgcolor" value="iconbgcolor"<?php
								if ( ! $wp_followme['iconbgcolor'] ) {
									echo ' checked="checked"';
								}
								?>/> Use same color as the badge background color
								</td>
							</tr>

							<tr valign="top" class="alternate">
								<th scope="row" style="width:20%"><label for="wp_followme_options[textcolor]">Text color</label></th>
								<td><input autocomplete="off" type="text" name="wp_followme_options[textcolor]" value="<?php esc_attr_e( $wp_followme['textcolor'] ); ?>" class="jscolor regular-text code" /></td>
							</tr>

							<tr valign="top" class="alternate">
								<th scope="row" style="width:20%"><label for="wp_followme_options[bordercolor]">Badge border color</label></th>
								<td><input autocomplete="off" type="text" name="wp_followme_options[bordercolor]" value="<?php esc_attr_e( $wp_followme['bordercolor'] ); ?>" class="jscolor regular-text code" /></td>
							</tr>

							<tr valign="top">
								<th scope="row" style="width:20%"><label for="wp_followme_options[icon]">Icon URL</label></th>
								<td><input autocomplete="off" type="text" name="wp_followme_options[icon]" id="iconurl" value="<?php esc_attr_e( $wp_followme['icon'] ); ?>" class="regular-text code" /></td>
							</tr>

							<tr valign="top">
								<th scope="row" style="width:20%">Choose icon</th>
								<td>
									<table width="300" border="0" cellspacing="5" cellpadding="5">
										<tr>
											<td><img src="<?php esc_attr_e( plugins_url( 'icons/1.png', __FILE__ ) ); ?>" class="twit_icon" /></td>
											<td><img src="<?php esc_attr_e( plugins_url( 'icons/2.png', __FILE__ ) ); ?>" class="twit_icon" /></td>
											<td><img src="<?php esc_attr_e( plugins_url( 'icons/3.png', __FILE__ ) ); ?>" class="twit_icon" /></td>
											<td><img src="<?php esc_attr_e( plugins_url( 'icons/4.png', __FILE__ ) ); ?>" class="twit_icon" /></td>
										</tr>
										<tr>
											<td><img src="<?php esc_attr_e( plugins_url( 'icons/5.png', __FILE__ ) ); ?>" class="twit_icon" /></td>
											<td><img src="<?php esc_attr_e( plugins_url( 'icons/6.png', __FILE__ ) ); ?>" class="twit_icon" /></td>
											<td><img src="<?php esc_attr_e( plugins_url( 'icons/7.png', __FILE__ ) ); ?>" class="twit_icon" /></td>
											<td><img src="<?php esc_attr_e( plugins_url( 'icons/8.png', __FILE__ ) ); ?>" class="twit_icon" /></td>
										</tr>
										<tr>
											<td><img src="<?php esc_attr_e( plugins_url( 'icons/9.png', __FILE__ ) ); ?>" class="twit_icon" /></td>
											<td><img src="<?php esc_attr_e( plugins_url( 'icons/10.png', __FILE__ ) ); ?>" class="twit_icon" /></td>
											<td><img src="<?php esc_attr_e( plugins_url( 'icons/11.png', __FILE__ ) ); ?>" class="twit_icon" /></td>
											<td><img src="<?php esc_attr_e( plugins_url( 'icons/12.png', __FILE__ ) ); ?>" class="twit_icon" /></td>
										</tr>
										<tr>
											<td><img src="<?php esc_attr_e( plugins_url( 'icons/13.png', __FILE__ ) ); ?>" class="twit_icon" /></td>
											<td><img src="<?php esc_attr_e( plugins_url( 'icons/14.png', __FILE__ ) ); ?>" class="twit_icon" /></td>
											<td><img src="<?php esc_attr_e( plugins_url( 'icons/15.png', __FILE__ ) ); ?>" class="twit_icon" /></td>
											<td><img src="<?php esc_attr_e( plugins_url( 'icons/16.png', __FILE__ ) ); ?>" class="twit_icon" /></td>
										</tr>
									</table>
								</td>
							</tr>

							<tr valign="top">
								<th scope="row" style="width:20%"> </th>
								<td>To choose an icon, click on it. Currently used icon has a selection border.<br />
									To use your own icon, put its URL into the <em>Icon URL</em> field and save the changes.
								</td>
							</tr>

						</table>
					</div>
				</div>

				<h2>Positioning</h2>
				<table class="form-table">

					<tr valign="top">
						<th scope="row"><label for="wp_followme_options[align]">Alignment</label></th>
						<td><select name="wp_followme_options[align]">
							<option value="left" <?php
							if ( 'left' === $wp_followme['align'] ) {
								echo 'selected';
							}
							?> >Left</option>
							<option value="right" <?php
							if ( 'right' === $wp_followme['align'] ) {
								echo 'selected';
							}
							?> >Right</option>
						</select></td>
					</tr>

					<tr valign="top">
						<th scope="row"><label for="wp_followme_options[top]">Distance From Top</label></th>
						<td><input type="text" name="wp_followme_options[top]" class="small-text" value="<?php esc_attr_e( $wp_followme['top'] ); ?>" />&nbsp;px</td>
					</tr>

				</table>

				<div class="submit">
					<input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save Changes' ); ?>" />
				</div>

			</div>
	</form>

</div> <!--end of poststuff -->


</div> <!--end of float wrap -->
<?php
}

/**
 * Adding admin menus
 */
if ( is_admin() ) {
	add_action( 'admin_menu', function() {
		add_options_page( 'WP FollowMe CSS', 'WP FollowMe CSS', 9, 'followme.php', 'wp_followme_settings_page' );
	} );
	add_action( 'admin_init', function() {
		register_setting( 'wp-followme-group', 'wp_followme_options' );
	} );
}
