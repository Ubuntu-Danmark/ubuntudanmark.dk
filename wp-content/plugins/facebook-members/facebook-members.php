<?php
/*
Plugin Name: Facebook Members
Plugin URI: http://icrunched.co/facebook-members/
Description: Facebook Members is a WordPres Social Plugin that enables Facebook Page owners to attract and gain Likes from their own website. It uses Like Box.
Version: 4.5.2
Author: icrunched
Author URI: http://iCrunched.co
*/

/*
    Copyright (C) 2012 iCrunched.co

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/


// Some default options
add_option('as_facebook_mem_page_name', 'wordpress');
add_option('as_facebook_mem_width', '292');
add_option('as_facebook_mem_broder_color', '');
add_option('as_facebook_mem_color_scheme', 'FFFFF');
add_option('as_facebook_mem_height', '255');
add_option('as_facebook_mem_no_connection', '10');
add_option('as_facebook_mem_stream', 'false');
add_option('as_facebook_mem_header', 'true');
add_option('as_facebook_mem_faces', 'true');

add_option('as_facebook_mem_widget_page_name', 'wordpress');
add_option('as_facebook_mem_widget_title', 'Like Box');
add_option('as_facebook_mem_widget_width', '292');
add_option('as_facebook_mem_widget_border_color', '');
add_option('as_facebook_mem_widget_color_scheme', 'FFFFFF');
add_option('as_facebook_mem_widget_height', '255');
add_option('as_facebook_mem_widget_stream', 'false');
add_option('as_facebook_mem_widget_faces', 'true');
add_option('as_facebook_mem_widget_no_connection', '10');

add_option('as_fbmembers_show_sponser_link', '-1');

function filter_as_facebook_mem_likebox($content)
{
    if (strpos($content, "<!--facebook-members-->") !== FALSE)
    {
        $content = preg_replace('/<p>\s*<!--(.*)-->\s*<\/p>/i', "<!--$1-->", $content);
        $content = str_replace('<!--facebook-members-->', as_facebook_mem_likebox(), $content);
    }
    return $content;
}


function as_facebook_mem_likebox()
{
	$fm_pagename = get_option('as_facebook_mem_page_name');
	$fm_width = get_option('as_facebook_mem_width');
	$fm_height = get_option('as_facebook_mem_height');
	$fm_no_connection = get_option('as_facebook_mem_no_connection');
	$fm_broder_color = get_option('as_facebook_mem_broder_color');
	$fm_stream = get_option('as_facebook_mem_stream');
	$fm_color_scheme = get_option('as_facebook_mem_color_scheme');
	$fm_header = get_option('as_facebook_mem_header');
	$fm_faces = get_option('as_facebook_mem_faces');

	$fm_widget_title = get_option('as_facebook_mem_widget_title');
	$fm_widget_width = get_option('as_facebook_mem_widget_width');
	$fm_widget_height = get_option('as_facebook_mem_widget_height');

	$subtract1 = 2;
	$mywidth = $fm_width - $subtract1;
	$myheight = $fm_height - $subtract1;
	$border_start = '<div id="likeboxwrap" style="width:'.$mywidth .'px; height:'.$myheight.'px; background: #'.$fm_color_scheme.'; border:1px solid #'.$fm_broder_color.'; overflow:hidden;">';

	$show_sponser1 = get_option('as_fbmembers_show_sponser_link');

	if ($show_sponser1 == 1)
	{
		$sponserlink_profile = "";
	}
	else
	{
		$sponserlink_profile = '<div align="left">- <a href="http://icrunched.co/facebook-members/" title="Facebook Members WordPress Plugin" target="_blank"> <font size="1">' . 'Facebook Members WordPress Plugin' . '</font></a></div>';
	}


$T1 = '<iframe src="//www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2F'.$fm_pagename.'&amp;width='.$fm_width.'&amp;height='.$fm_height.'&amp;colorscheme=light&amp;show_faces='.$fm_faces.'&amp;border_color&amp;stream='.$fm_stream.'&amp;header='.$fm_header.'" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:'.$fm_width.'px; height:'.$fm_height.'px; margin:-1px;" allowTransparency="true"></iframe>';

	$border_end = '</div>';

	$output = $border_start.$T1.$border_end;

	return $output . $sponserlink_profile;
}



// Displays Wordpress Blog Facebook Members Options menu
function as_facebook_mem_add_option_page() {
    if (function_exists('add_options_page')) {
        add_options_page('Facebook Members', 'Facebook Members', 8, __FILE__, 'as_facebook_mem_options_page');
    }
}

function as_facebook_mem_options_page() {

	$as_facebook_mem_stream = $_POST['as_facebook_mem_stream'];
	$as_facebook_mem_header = $_POST['as_facebook_mem_header'];
	$as_facebook_mem_faces = $_POST['as_facebook_mem_faces'];
	$as_facebook_mem_widget_stream = $_POST['as_facebook_mem_widget_stream'];
	$as_facebook_mem_widget_faces = $_POST['as_facebook_mem_widget_faces'];

    if (isset($_POST['info_update']))
    {
		update_option('as_facebook_mem_page_name', (string)$_POST["as_facebook_mem_page_name"]);
        update_option('as_facebook_mem_width', (string)$_POST["as_facebook_mem_width"]);
        update_option('as_facebook_mem_height', (string)$_POST['as_facebook_mem_height']);
		update_option('as_facebook_mem_no_connection', (string)$_POST['as_facebook_mem_no_connection']);
		update_option('as_facebook_mem_broder_color', (string)$_POST['as_facebook_mem_broder_color']);
		update_option('as_facebook_mem_widget_title', (string)$_POST['as_facebook_mem_widget_title']);

		update_option('as_fbmembers_show_sponser_link', ($_POST['as_fbmembers_show_sponser_link']=='1') ? '1':'-1' );

		update_option('as_facebook_mem_widget_page_name', (string)$_POST['as_facebook_mem_widget_page_name']);
		update_option('as_facebook_mem_widget_title', (string)$_POST['as_facebook_mem_widget_title']);
		update_option('as_facebook_mem_widget_width', (string)$_POST['as_facebook_mem_widget_width']);
		update_option('as_facebook_mem_widget_height', (string)$_POST['as_facebook_mem_widget_height']);
		update_option('as_facebook_mem_widget_stream', (string)$_POST['as_facebook_mem_widget_stream']);
		update_option('as_facebook_mem_widget_color_scheme', (string)$_POST['as_facebook_mem_widget_color_scheme']);
		update_option('as_facebook_mem_widget_faces', (string)$_POST['as_facebook_mem_widget_faces']);
		update_option('as_facebook_mem_widget_no_connection', (string)$_POST['as_facebook_mem_widget_no_connection']);
		update_option('as_facebook_mem_widget_border_color', (string)$_POST['as_facebook_mem_widget_border_color']);

		update_option('as_facebook_mem_stream', (string)$_POST['as_facebook_mem_stream']);
		update_option('as_facebook_mem_color_scheme', (string)$_POST['as_facebook_mem_color_scheme']);
		update_option('as_facebook_mem_header', (string)$_POST['as_facebook_mem_header']);
		update_option('as_facebook_mem_faces', (string)$_POST['as_facebook_mem_faces']);

        echo '<div id="message" class="updated fade"><p><strong>Settings saved.</strong></p></div>';
        echo '</strong>';
    }else
	{
			$as_facebook_mem_stream = get_option('as_facebook_mem_stream');
			$as_facebook_mem_header = get_option('as_facebook_mem_header');
			$as_facebook_mem_faces = get_option('as_facebook_mem_faces');
			$as_facebook_mem_widget_stream = get_option('as_facebook_mem_widget_stream');
			$as_facebook_mem_widget_faces = get_option('as_facebook_mem_widget_faces');
	}

    $new_icon = '<img border="0" src="'.$icon_url.'/wp-content/plugins/facebook-members/new.gif" /> ';

    ?>

    <div class="wrap">

    <form method="post" action="<?php echo $_SERVER["REQUEST_URI"]; ?>">
    <input type="hidden" name="info_update" id="info_update" value="true" />


    <u><h2>Facebook Members Like Box Plugin</h2></u>

	<div align="left">
	<br>
	<h3>Follow us on Twitter & Facebook to get latest update:</h3>
	
	<a href="https://twitter.com/iCrunched" class="twitter-follow-button" data-show-count="false" data-size="large">Follow @iCrunched</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

<iframe src="//www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fpages%2FiCrunchedco%2F117867008360385&amp;width=292&amp;height=62&amp;colorscheme=light&amp;show_faces=false&amp;border_color&amp;stream=false&amp;header=false" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:292px; height:62px;" allowTransparency="true"></iframe>

<script type="text/javascript"><!--
google_ad_client = "ca-pub-4032710958875645";
/* divinepushti.post */
google_ad_slot = "2406932865";
google_ad_width = 468;
google_ad_height = 60;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
	</div>
	
		<div style="float:left;width:60%;">

<br>


			<div class="postbox">
				<h3>Facebook Members - Option Panel </h3>
				<div>
				<table class="form-table">

				<tr valign="top" class="alternate">
          			<th scope="row" style="width:29%;"><label>Facebook Page Name</label></th>
                      <td><textarea name="as_facebook_mem_page_name" cols="18" rows="1"><?php echo get_option('as_facebook_mem_page_name'); ?></textarea>
                      <a href="http://www.facebook.com/pages/create.php" target="_blank">Create Fanpage</a>
                      </td>

				</tr>
				<tr valign="top">
          			<th scope="row" style="width:29%;"><label>Like Box Width</label></th>
                      <td><textarea name="as_facebook_mem_width" cols="18" rows="1"><?php echo get_option('as_facebook_mem_width'); ?></textarea></td>
				</tr>
				<tr valign="top" class="alternate">
          			<th scope="row" style="width:29%;"><label>Like Box Height</label></th>
                      <td><textarea name="as_facebook_mem_height" cols="18" rows="1"><?php echo get_option('as_facebook_mem_height'); ?></textarea></td>
				</tr>
				<tr valign="top">
          			<th scope="row" style="width:29%;"><label># of Connection?</label></th>
                      <td><textarea name="as_facebook_mem_no_connection" cols="18" rows="1"><?php echo get_option('as_facebook_mem_no_connection'); ?></textarea></td>
				</tr>
					<tr valign="top">
						<th scope="row"><label>Show Header?</label></th>
						<td>
							<input name="as_facebook_mem_header" type="radio" value="true" <?php checked('true', $as_facebook_mem_header); ?> />
						&nbsp;YES

							<input name="as_facebook_mem_header" type="radio" value="false" <?php checked('false', $as_facebook_mem_header); ?> />
						&nbsp;NO (default)

						</td>
					</tr>

					<tr valign="top" class="alternate">
						<th scope="row"><label>Show Stream?</label></th>
						<td>
							<input name="as_facebook_mem_stream" type="radio" value="true" <?php checked('true', $as_facebook_mem_stream); ?> />
						&nbsp;YES

							<input name="as_facebook_mem_stream" type="radio" value="false" <?php checked('false', $as_facebook_mem_stream); ?> />
						&nbsp;NO (default)

						</td>
					</tr>
					<tr valign="top" >
						<th scope="row"><label>Show Faces? <?=$new_icon?></label></th>
						<td>
							<input name="as_facebook_mem_faces" type="radio" value="true" <?php checked('true', $as_facebook_mem_faces); ?> />
						&nbsp;YES (default)

							<input name="as_facebook_mem_faces" type="radio" value="false" <?php checked('false', $as_facebook_mem_faces); ?> />
						&nbsp;NO

						</td>
					</tr>
				<tr valign="top"  class="alternate">
					<th scope="row"><label>Background Color <?=$new_icon?></label></th>

					<td><textarea name="as_facebook_mem_color_scheme" cols="18" rows="1"><?php echo get_option('as_facebook_mem_color_scheme'); ?></textarea> <a href="http://www.w3schools.com/html/html_colornames.asp" target="_blank">Color Codes (Do not put #)</a></td>
				</tr>

				<tr valign="top" class="alternate">
          			<th scope="row" style="width:29%;"><label>Border Color <?=$new_icon?></label></th>
                      <td><textarea name="as_facebook_mem_broder_color" cols="18" rows="1"><?php echo get_option('as_facebook_mem_broder_color'); ?></textarea></td>
				</tr>
				</table>
			</div>
			</div>
			
					<a href="http://icrunched.co/facebook-members/" target="_blank">Feedback</a> | <a href="http://twitter.com/iCrunched" target="_blank">Twitter</a> | <a href="http://www.facebook.com/pages/iCrunchedco/117867008360385" target="_blank">Facebook</a>

   		 <div class="submit">
	        <input type="submit" name="info_update" class="button-primary" value="<?php _e('Update options'); ?> &raquo;" />

	    </div>

			<div class="postbox">
				<h3>Facebook Members - Widget/Sidebar Options </h3>
					<div>
					<table class="form-table">

				<tr valign="top">
          			<th scope="row" style="width:29%;"><label>Widget Title</label></th>
                      <td><textarea name="as_facebook_mem_widget_title" cols="18" rows="1"><?php echo get_option('as_facebook_mem_widget_title'); ?></textarea></td>
				</tr>
				<tr valign="top" class="alternate">
          			<th scope="row" style="width:29%;"><label>Facebook Page Name</label></th>
                      <td><textarea name="as_facebook_mem_widget_page_name" cols="18" rows="1"><?php echo get_option('as_facebook_mem_widget_page_name'); ?></textarea></td>
				</tr>
				<tr valign="top">
          			<th scope="row" style="width:29%;"><label>Widget Width</label></th>
                      <td><textarea name="as_facebook_mem_widget_width" cols="18" rows="1"><?php echo get_option('as_facebook_mem_widget_width'); ?></textarea></td>
				</tr>
				<tr valign="top" class="alternate">
          			<th scope="row" style="width:29%;"><label>Widget Height</label></th>
                      <td><textarea name="as_facebook_mem_widget_height" cols="18" rows="1"><?php echo get_option('as_facebook_mem_widget_height'); ?></textarea></td>
				</tr>
				<tr valign="top">
          			<th scope="row" style="width:29%;"><label># of Connection?</label></th>
                      <td><textarea name="as_facebook_mem_widget_no_connection" cols="18" rows="1"><?php echo get_option('as_facebook_mem_widget_no_connection'); ?></textarea></td>
				</tr>
				<tr valign="top" class="alternate">
					<th scope="row"><label>Show Stream?</label></th>
					<td>
						<input name="as_facebook_mem_widget_stream" type="radio" value="true" <?php checked('true', $as_facebook_mem_widget_stream); ?> />
					&nbsp;YES

						<input name="as_facebook_mem_widget_stream" type="radio" value="false" <?php checked('false', $as_facebook_mem_widget_stream); ?> />
					&nbsp;NO (default)

					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><label>Show Faces? <?=$new_icon?></label></th>
					<td>
						<input name="as_facebook_mem_widget_faces" type="radio" value="true" <?php checked('true', $as_facebook_mem_widget_faces); ?> />
					&nbsp;YES (default)

						<input name="as_facebook_mem_widget_faces" type="radio" value="false" <?php checked('false', $as_facebook_mem_widget_faces); ?> />
					&nbsp;NO

					</td>
				</tr>
				<tr valign="top"  class="alternate">
					<th scope="row"><label>Background Color <?=$new_icon?></label></th>

					<td><textarea name="as_facebook_mem_widget_color_scheme" cols="18" rows="1"><?php echo get_option('as_facebook_mem_widget_color_scheme'); ?></textarea> <a href="http://www.w3schools.com/html/html_colornames.asp" target="_blank">Color Codes (Do not put #)</a></td></td>
				</tr>
				<tr valign="top">
          			<th scope="row" style="width:29%;"><label>Border Color <?=$new_icon?></label></th>
                      <td><textarea name="as_facebook_mem_widget_border_color" cols="18" rows="1"><?php echo get_option('as_facebook_mem_widget_border_color'); ?></textarea></td>
				</tr>
				<tr valign="top" class="alternate">
						<th scope="row" style="width:29%;"><label>If you like, help promote a plugin</label></th>
					<td>
					<input name="as_fbmembers_show_sponser_link" type="checkbox"<?php if(get_option('as_fbmembers_show_sponser_link')!='-1') echo 'checked="checked"'; ?> value="1" /> <code>Check</code> to hide promotion link after widget
					</td>
				</tr>

 					</table>
					</div>
		</div>
		
							<a href="http://icrunched.co/facebook-members/" target="_blank">Feedback</a> | <a href="http://twitter.com/iCrunched" target="_blank">Twitter</a> | <a href="http://www.facebook.com/pages/iCrunchedco/117867008360385" target="_blank">Facebook</a>

   		 <div class="submit">
	        <input type="submit" name="info_update" class="button-primary" value="<?php _e('Update options'); ?> &raquo;" />

	    </div>


    </form>
</div>

    </div>

<?php

}

function show_as_facebook_mem_likebox_widget($args)
{
	extract($args);

	$fm_pagename = get_option('as_facebook_mem_page_name');
	$fm_header = get_option('as_facebook_mem_header');

	$fm_widget_page_name = get_option('as_facebook_mem_widget_page_name');
	$fm_widget_stream = get_option('as_facebook_mem_widget_stream');
	$fm_widget_color_scheme = get_option('as_facebook_mem_widget_color_scheme');
	$fm_widget_faces = get_option('as_facebook_mem_widget_faces');
	$fm_widget_title = get_option('as_facebook_mem_widget_title');
	$fm_widget_width = get_option('as_facebook_mem_widget_width');
	$fm_widget_height = get_option('as_facebook_mem_widget_height');
	$fm_widget_no_connection = get_option('as_facebook_mem_widget_no_connection');
	$fm_widget_border_color = get_option('as_facebook_mem_widget_border_color');

	$subtract1 = 2;
	$mywidth = $fm_widget_width - $subtract1;
	$myheight = $fm_widget_height - $subtract1;
	$border_start = '<div id="likeboxwrap" style="width:'.$mywidth .'px; height:'.$myheight.'px; background: #'.$fm_widget_color_scheme.'; border:1px solid #'.$fm_widget_border_color.'; overflow:hidden;">';

	$show_sponser1 = get_option('as_fbmembers_show_sponser_link');

	if ($show_sponser1 == 1)
	{
		$sponserlink_profile = "";
	}
	else
	{
		$sponserlink_profile = '<div align="left">- <a href="http://icrunched.co/facebook-members/" title="Facebook Members WordPress Plugin" target="_blank"> <font size="1">' . 'Facebook Members WordPress Plugin' . '</font></a></div>';
	}

 	$T2 = '<div id="likebox-frame"><iframe src="//www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2F'.$fm_widget_page_name.'&amp;width='.$fm_widget_width.'&amp;height='.$fm_widget_height.'&amp;colorscheme=light&amp;show_faces='.$fm_widget_faces.'&amp;border_color&amp;stream='.$fm_widget_stream.'&amp;header=false" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:'.$fm_widget_width.'px; height:'.$fm_widget_height.'px; margin:-1px;" allowTransparency="true"></iframe></div>';

	$border_end = '</div>';

	echo $before_widget;
	echo $before_title . $fm_widget_title . $after_title;
    echo $border_start.$T2.$border_end . $sponserlink_profile;
    echo $after_widget;
}


function as_facebook_mem_likebox_widget_control()
{
    ?>
    <p>
    <? _e("Please go to <b>Settings -> Facebook Members</b> for all required options. "); ?>
    </p>
    <?php
}

function widget_as_facebook_mem_likebox_init()
{
    $widget_options = array('classname' => 'widget_as_facebook_mem_likebox', 'description' => __( "Display Facebook Members") );
    wp_register_sidebar_widget('as_facebook_mem_likebox_widgets', __('Facebook Members'), 'show_as_facebook_mem_likebox_widget', $widget_options);
    wp_register_widget_control('as_facebook_mem_likebox_widgets', __('Facebook Members'), 'as_facebook_mem_likebox_widget_control' );
}

add_filter('the_content', 'filter_as_facebook_mem_likebox');

add_action('init', 'widget_as_facebook_mem_likebox_init');
// Insert the as_facebook_mem_add_option_page in the 'admin_menu'
add_action('admin_menu', 'as_facebook_mem_add_option_page');

?>