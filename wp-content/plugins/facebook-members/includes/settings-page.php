<?php
/**
 * @author Crunchify.com
 * Plugin: Facebook Members
 */
?>

<div class="wrap">

	<form method="post" action="<?php echo $_SERVER["REQUEST_URI"]; ?>">
		<input type="hidden" name="info_update" id="info_update" value="true" />

            <?php wp_nonce_field('fmz-update-setting','fmz-update-setting'); ?>

            <u><h2>Facebook Members Like Box Plugin by Crunchify.com</h2></u>

		<div align="left">
			<br> <a href="https://twitter.com/Crunchify"
				class="twitter-follow-button" data-show-count="false">Follow
				@Crunchify</a>
			<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
			<div id="fb-root"></div>
			<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

			<div class="fb-like" data-href="https://www.facebook.com/Crunchify"
				data-layout="standard" data-action="like" data-show-faces="false"
				data-share="true"></div>

			<br>
			<br>
			<br> <b>NOTE:</b> Please use plugin <a
				href="https://wordpress.org/plugins/facebook-page-likebox">Facebook
				Page Likebox</a> going forward. Facebook Members plugin is
			deprecated.. <br>

		</div>
		<div id="poststuff" class="metabox-holder has-right-sidebar">


			<div style="float: left; width: 70%;">

				<br>

                    <?php
																				require_once 'setting-page/crunchify-left-column.php';
																				require_once 'setting-page/crunchify-right-column.php';
																				require_once 'setting-page/crunchify-footer.php';
																				
																				?>
