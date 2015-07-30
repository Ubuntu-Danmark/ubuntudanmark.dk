<?php
/**
 * @author Crunchify.com
 * Plugin: Facebook Members
 */
?>

<div class="postbox">
	<div class="crunchify">
		<h3>
			Option Panel to include Likebox into your Post/Page (<a
				href="http://wordpress.org/plugins/facebook-members/faq/"
				target="_blank">Code</a>)
		</h3>

		<div>
			<table class="form-table">

				<tr valign="top" class="alternate">
					<th scope="row" style="width: 29%;"><label>Facebook Page Name</label></th>
					<td><textarea id="styled" name="as_facebook_mem_page_name"
							cols="18" rows="1"><?php echo get_option('as_facebook_mem_page_name'); ?></textarea>
                    &nbsp;<?=$fb_pagename?>
                    <br> <a
						href="http://www.facebook.com/pages/create.php" target="_blank">Create
							Fanpage</a></td>

				</tr>
				<tr valign="top">
					<th scope="row" style="width: 29%;"><label>Like Box Width</label></th>
					<td><textarea id="styled" name="as_facebook_mem_width" cols="18"
							rows="1"><?php echo get_option('as_facebook_mem_width'); ?></textarea></td>

				</tr>
				<tr valign="top" class="alternate">
					<th scope="row" style="width: 29%;"><label>Like Box Height</label></th>
					<td><textarea id="styled" name="as_facebook_mem_height" cols="18"
							rows="1"><?php echo get_option('as_facebook_mem_height'); ?></textarea></td>
				</tr>
				<tr valign="top">
					<th scope="row"><label>Show Header?</label></th>
					<td><input name="as_facebook_mem_header" type="radio" value="true"
						<?php checked('true', $as_facebook_mem_header); ?> /> &nbsp;YES <input
						name="as_facebook_mem_header" type="radio" value="false"
						<?php checked('false', $as_facebook_mem_header); ?> />
                    &nbsp;NO (default)
                    &nbsp;<?=$fb_showheader?>
                </td>
				</tr>

				<tr valign="top" class="alternate">
					<th scope="row"><label>Show Stream?</label></th>
					<td><input name="as_facebook_mem_stream" type="radio" value="true"
						<?php checked('true', $as_facebook_mem_stream); ?> /> &nbsp;YES <input
						name="as_facebook_mem_stream" type="radio" value="false"
						<?php checked('false', $as_facebook_mem_stream); ?> />
                    &nbsp;NO (default)
                    &nbsp;<?=$fb_showstream?>
                </td>
				</tr>
				<tr valign="top">
					<th scope="row"><label>Show Faces?</label></th>
					<td><input name="as_facebook_mem_faces" type="radio" value="true"
						<?php checked('true', $as_facebook_mem_faces); ?> /> &nbsp;YES
						(default) <input name="as_facebook_mem_faces" type="radio"
						value="false" <?php checked('false', $as_facebook_mem_faces); ?> />
						&nbsp;NO</td>
				</tr>
				<tr valign="top" class="alternate">
					<th scope="row"><label>Background Color <?=$new_icon?></label></th>

					<td><textarea id="styled" name="as_facebook_mem_color_scheme"
							cols="18" rows="1"><?php echo get_option('as_facebook_mem_color_scheme'); ?></textarea>
						<br> Keep it blank for transparent background <br> <a
						href="http://www.w3schools.com/html/html_colors.asp"
						target="_blank">Color Codes (Do not put #)</a></td>
				</tr>

				<tr valign="top">
					<th scope="row" style="width: 29%;"><label>Border Color <?=$new_icon?></label></th>
					<td><textarea id="styled" name="as_facebook_mem_broder_color"
							cols="18" rows="1"><?php echo get_option('as_facebook_mem_broder_color'); ?></textarea></td>
				</tr>
			</table>
		</div>
	</div>
</div>

<a href="http://Crunchify.com/facebook-members/" target="_blank">Feedback</a>
|
<a href="http://twitter.com/Crunchify" target="_blank">Twitter</a>
|
<a href="http://www.facebook.com/Crunchify" target="_blank">Facebook</a>

<div class="submit">

	<input name="my_fmz_update_setting" type="hidden"
		value="<?php echo wp_create_nonce('fmz-update-setting'); ?>" /> <input
		type="submit" name="info_update" class="button-primary"
		value="<?php _e('Update options'); ?> &raquo;" />

</div>
