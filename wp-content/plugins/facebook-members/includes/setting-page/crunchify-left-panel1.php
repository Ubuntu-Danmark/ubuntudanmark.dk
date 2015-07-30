<?php
/**
 * @author Crunchify.com
 * Plugin: Facebook Members
 */
?>

<div class="postbox">
	<div class="crunchify">
		<h3>Recommendation Bar Setting</h3>

		<div>
			<table class="form-table">

				<tr valign="top" class="alternate">
					<th scope="row" style="width: 29%;"><label>Your Facebook AppID</label></th>
					<td><textarea id="styled" name="as_facebook_mem_reco_appid"
							cols="18" rows="1"><?php echo get_option('as_facebook_mem_reco_appid'); ?></textarea>
                    &nbsp;<?=$fb_recco?>
                    <br> <a
						href="http://Crunchify.com/step-by-step-direction-to-get-facebook-appid-for-facebook-members-plugin/"
						target="_blank">Step by Step Direction</a></td>
				</tr>

				<tr valign="top">
					<th scope="row" style="width: 29%;"><label>Enter your read time</label></th>
					<td><textarea id="styled" name="as_facebook_mem_reco_readtime"
							cols="18" rows="1"><?php echo get_option('as_facebook_mem_reco_readtime'); ?></textarea>
                    &nbsp;<?=$fb_readtime?>
                </td>
				</tr>
				<tr valign="top" class="alternate">
					<th scope="row" style="width: 29%;"><label>Verb to Display?</label></th>
					<td><textarea id="styled" name="as_facebook_mem_reco_verb"
							cols="18" rows="1"><?php echo get_option('as_facebook_mem_reco_verb'); ?></textarea>
						i.e like/recommend</td>
				</tr>
				<tr valign="top">
					<th scope="row" style="width: 29%;"><label>Side?</label></th>
					<td><textarea id="styled" name="as_facebook_mem_reco_side"
							cols="18" rows="1"><?php echo get_option('as_facebook_mem_reco_side'); ?></textarea>
						i.e left/right</td>
				</tr>
				<tr valign="top" class="alternate">
					<th scope="row"><label>Site Domain?</label></th>
					<td><textarea id="styled" name="as_facebook_mem_reco_domain"
							cols="18" rows="1"><?php echo get_option('as_facebook_mem_reco_domain'); ?></textarea>
						i.e. http://crunchify.com</td>
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
