<?php
/*
Plugin Name: Subscribe2
Plugin URI: http://subscribe2.wordpress.com
Description: Notifies an email list when new entries are posted.
Version: 6.5
Author: Matthew Robinson
Author URI: http://subscribe2.wordpress.com
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&amp;hosted_button_id=2387904
*/

/*
Copyright (C) 2006-11 Matthew Robinson
Based on the Original Subscribe2 plugin by
Copyright (C) 2005 Scott Merrill (skippy@skippy.net)

This file is part of Subscribe2.

Subscribe2 is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

Subscribe2 is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Subscribe2. If not, see <http://www.gnu.org/licenses/>.
*/

global $wp_version;
if ( version_compare($wp_version, '2.8', '<') ) {
	// Subscribe2 needs WordPress 2.8 or above, exit if not on a compatible version
	$exit_msg = sprintf(__('This version of Subscribe2 requires WordPress 2.8 or greater. Please update %1$s or use an older version of %2$s.', 'subscribe2'), '<a href="http://codex.wordpress.org/Updating_WordPress">Wordpress</a>', '<a href="http://wordpress.org/extend/plugins/subscribe2/download/">Subscribe2</a>');
	exit($exit_msg);
}
if ( version_compare($wp_version, '3.0', '<') ) {
	global $wpmu_version;
	if ( isset($wpmu_version) || strpos($wp_version, 'wordpress-mu') ) {
		// Subscribe2 needs WordPress MultiSite 3.0 or above, exit if not on a compatible version
		$exit_msg = sprintf(__('This version of Subscribe2 requires WordPress Multisite 3.0 or greater. Please update %1$s or use an older version of %2$s.', 'subscribe2'), '<a href="http://codex.wordpress.org/Updating_WordPress">Wordpress</a>', '<a href="http://wordpress.org/extend/plugins/subscribe2/download/">Subscribe2</a>');
	}
}

// our version number. Don't touch this or any line below
// unless you know exactly what you are doing
define( 'S2VERSION', '6.5' );
define( 'S2PATH', trailingslashit(dirname(__FILE__)) );
define( 'S2DIR', trailingslashit(plugin_basename(dirname(__FILE__))) );
define( 'S2URL', plugin_dir_url(dirname(__FILE__)) . S2DIR );

// Set minimum execution time to 5 minutes - won't affect safe mode
$safe_mode = array('On', 'ON', 'on', 1);
if ( !in_array(ini_get('safe_mode'), $safe_mode) && ini_get('max_execution_time') < 300 ) {
	@ini_set('max_execution_time', 300);
}

/* Include buttonsnap library by Owen Winckler */
if ( !class_exists('buttonsnap') ) {
	require( S2PATH . 'include/buttonsnap.php' );
}

$mysubscribe2 = new s2class;
$mysubscribe2->s2init();

// start our class
class s2class {
// variables and constructor are declared at the end

	/**
	Load all our strings
	*/
	function load_strings() {
		// adjust the output of Subscribe2 here

		$this->please_log_in = "<p class=\"s2_message\">" . __('To manage your subscription options please', 'subscribe2') . " <a href=\"" . get_option('siteurl') . "/wp-login.php\">" . __('login', 'subscribe2') . "</a>.</p>";

		$this->use_profile_admin = "<p class=\"s2_message\">" . __('You may manage your subscription options from your', 'subscribe2') . " <a href=\"" . get_option('siteurl') . "/wp-admin/users.php?page=s2_users\">" . __('profile', 'subscribe2') . "</a>.</p>";
		if ( $this->s2_mu === true ) {
			global $blog_id, $user_ID;
			if ( !is_blog_user($blog_id) ) {
				// if we are on multisite and the user is not a member of this blog change the link
				$this->use_profile_admin = "<p class=\"s2_message\"><a href=\"" . get_option('siteurl') . "/wp-admin/?s2mu_subscribe=" . $blog_id . "\">" . __('Subscribe', 'subscribe2') . "</a> " . __('to email notifications when this blog posts new content', 'subscribe2') . ".</p>";
			}
		}

		$this->use_profile_users = "<p class=\"s2_message\">" . __('You may manage your subscription options from your', 'subscribe2') . " <a href=\"" . get_option('siteurl') . "/wp-admin/profile.php?page=s2_users\">" . __('profile', 'subscribe2') . "</a>.</p>";
		if ( $this->s2_mu === true ) {
			global $blog_id, $user_ID;
			if ( !is_blog_user($blog_id) ) {
				// if we are on multisite and the user is not a member of this blog change the link
				$this->use_profile_users = "<p class=\"s2_message\"><a href=\"" . get_option('siteurl') . "/wp-admin/?s2mu_subscribe=" . $blog_id . "\">" . __('Subscribe', 'subscribe2') . "</a> " . __('to email notifications when this blog posts new content', 'subscribe2') . ".</p>";
			}
		}

		$this->confirmation_sent = "<p class=\"s2_message\">" . __('A confirmation message is on its way!', 'subscribe2') . "</p>";

		$this->already_subscribed = "<p class=\"s2_error\">" . __('That email address is already subscribed.', 'subscribe2') . "</p>";

		$this->not_subscribed = "<p class=\"s2_error\">" . __('That email address is not subscribed.', 'subscribe2') . "</p>";

		$this->not_an_email = "<p class=\"s2_error\">" . __('Sorry, but that does not look like an email address to me.', 'subscribe2') . "</p>";

		$this->barred_domain = "<p class=\"s2_error\">" . __('Sorry, email addresses at that domain are currently barred due to spam, please use an alternative email address.', 'subscribe2') . "</p>";

		$this->error = "<p class=\"s2_error\">" . __('Sorry, there seems to be an error on the server. Please try again later.', 'subscribe2') . "</p>";

		$this->no_page = "<p class=\"s2_error\">" . __('You must to create a WordPress page for this plugin to work correctly.', 'subscribe2') . "<p>";

		$this->mail_sent = "<p class=\"s2_message\">" . __('Message sent!', 'subscribe2') . "</p>";

		$this->mail_failed = "<p class=\"s2_error\">" . __('Message failed! Check your settings and check with your hosting provider', 'subscribe2') . "</p>";

		// confirmation messages
		$this->no_such_email = "<p class=\"s2_error\">" . __('No such email address is registered.', 'subscribe2') . "</p>";

		$this->added = "<p class=\"s2_message\">" . __('You have successfully subscribed!', 'subscribe2') . "</p>";

		$this->deleted = "<p class=\"s2_message\">" . __('You have successfully unsubscribed.', 'subscribe2') . "</p>";

		$this->subscribe = __('subscribe', 'subscribe2'); //ACTION replacement in subscribing confirmation email

		$this->unsubscribe = __('unsubscribe', 'subscribe2'); //ACTION replacement in unsubscribing in confirmation email

		// menu strings
		$this->options_saved = __('Options saved!', 'subscribe2');
		$this->options_reset = __('Options reset!', 'subscribe2');
	} // end load_strings()

/* ===== WordPress menu registration and scripts ===== */
	/**
	Hook the menu
	*/
	function admin_menu() {
		$s2management = add_management_page(__('Subscribers', 'subscribe2'), __('Subscribers', 'subscribe2'), "manage_options", 's2_tools', array(&$this, 'manage_menu'));
		add_action("admin_print_scripts-$s2management", array(&$this, 'checkbox_form_js'));

		$s2options = add_options_page(__('Subscribe2 Options', 'subscribe2'), __('Subscribe2', 'subscribe2'), "manage_options", 's2_settings', array(&$this, 'options_menu'));
		add_action("admin_print_scripts-$s2options", array(&$this, 'checkbox_form_js'));
		add_action("admin_print_scripts-$s2options", array(&$this, 'option_form_js'));
		add_filter('plugin_row_meta', array(&$this, 'plugin_links'), 10, 2);

		$s2user = add_users_page(__('Your Subscriptions', 'subscribe2'), __('Your Subscriptions', 'subscribe2'), "read", 's2_users', array(&$this, 'user_menu'));
		add_action("admin_print_scripts-$s2user", array(&$this, 'checkbox_form_js'));
		add_action("admin_print_styles-$s2user", array(&$this, 'user_admin_css'));

		add_submenu_page('post-new.php', __('Mail Subscribers', 'subscribe2'), __('Mail Subscribers', 'subscribe2'), "publish_posts", 's2_posts', array(&$this, 'write_menu'));

		$s2nonce = md5('subscribe2');
	} // end admin_menu()

	/**
	Hook for Admin Drop Down Icons
	*/
	function ozh_s2_icon() {
		return S2URL . 'include/email_edit.png';
	} // end ozh_s2_icon()

	/**
	Insert Javascript and CSS into admin_header
	*/
	function checkbox_form_js() {
		wp_enqueue_script('s2_checkbox', S2URL . 'include/s2_checkbox' . $this->script_debug . '.js', array('jquery'), '1.1');
	} //end checkbox_form_js()

	function user_admin_css() {
		wp_enqueue_style('s2_user_admin', S2URL . 'include/s2_user_admin.css', array(), '1.0');
	} // end user_admin_css()

	function option_form_js() {
		wp_enqueue_script('s2_edit', S2URL . 'include/s2_edit' . $this->script_debug . '.js', array('jquery'), '1.0');
	} // end option_form_js()

/* ===== Install, upgrade, reset ===== */
	/**
	Install our table
	*/
	function install() {
		// include upgrade-functions for maybe_create_table;
		if ( !function_exists('maybe_create_table') ) {
			require_once(ABSPATH . 'wp-admin/install-helper.php');
		}
		$date = date('Y-m-d');
		$sql = "CREATE TABLE $this->public (
			id int(11) NOT NULL auto_increment,
			email varchar(64) NOT NULL default '',
			active tinyint(1) default 0,
			date DATE default '$date' NOT NULL,
			ip char(64) NOT NULL default 'admin',
			PRIMARY KEY (id) )";

		// create the table, as needed
		maybe_create_table($this->public, $sql);

		// safety check if options exist and if not create them
		if ( !is_array($this->subscribe2_options) ) {
			$this->reset();
		}
	} // end install()

	/**
	Upgrade function for the database and settings
	*/
	function upgrade() {
		global $wpdb, $wp_version, $wpmu_version;
		// include upgrade-functions for maybe_add_column;
		if ( !function_exists('maybe_add_column') ) {
			require_once(ABSPATH . 'wp-admin/install-helper.php');
		}
		$date = date('Y-m-d');
		maybe_add_column($this->public, 'date', "ALTER TABLE $this->public ADD date DATE DEFAULT '$date' NOT NULL AFTER active");
		maybe_add_column($this->public, 'ip', "ALTER TABLE $this->public ADD ip char(64) DEFAULT 'admin' NOT NULL AFTER date");

		// let's take the time to check process registered users
		// existing public subscribers are subscribed to all categories
		$users = $this->get_all_registered('ID');
		if ( !empty($users) ) {
			foreach ( $users as $user_ID ) {
				$check_format = $this->get_user_meta($user_ID, $this->get_usermeta_keyname('s2_format'));
				// if user is already registered update format remove 's2_excerpt' field and update 's2_format'
				if ( 'html' == $check_format ) {
					$this->delete_user_meta($user_ID, 's2_excerpt');
				} elseif ( 'text' == $check_format ) {
					$this->update_user_meta($user_ID, $this->get_usermeta_keyname('s2_format'), $this->get_user_meta($user_ID, 's2_excerpt'), true);
					$this->delete_user_meta($user_ID, 's2_excerpt');
				} elseif ( empty($check_format) ) {
					// no prior settings so create them
					$this->register($user_ID);
				}
				$subscribed = $this->get_user_meta($user_ID, $this->get_usermeta_keyname('s2_subscribed'));
				if ( strstr($subscribed, '-1') ) {
					// make sure we remove '-1' from any settings
					$old_cats = explode(',', $subscribed);
					$pos = array_search('-1', $old_cats);
					unset($old_cats[$pos]);
					$cats = implode(',', $old_cats);
					$this->update_user_meta($user_ID, $this->get_usermeta_keyname('s2_subscribed'), $cats);
				}
			}
		}
		// update the options table to serialized format
		$old_options = $wpdb->get_col("SELECT option_name from $wpdb->options where option_name LIKE 's2%' AND option_name != 's2_future_posts'");

		if ( !empty($old_options) ) {
			foreach ( $old_options as $option ) {
				$value = get_option($option);
				$option_array = substr($option, 3);
				$this->subscribe2_options[$option_array] = $value;
				delete_option($option);
			}
		}
		$this->subscribe2_options['version'] = S2VERSION;
		// ensure that the options are in the database
		require(S2PATH . "include/options.php");
		// correct autoformat to upgrade from pre 5.6
		if ( $this->subscribe2_options['autoformat'] == 'text' ) {
			$this->subscribe2_options['autoformat'] = 'excerpt';
		}
		if ( $this->subscribe2_options['autoformat'] == 'full' ) {
			$this->subscribe2_options['autoformat'] = 'post';
		}
		// change old CAPITALISED keywords to those in {PARENTHESES}; since version 6.4
		$keywords = array('BLOGNAME', 'BLOGLINK', 'TITLE', 'POST', 'POSTTIME', 'TABLE', 'TABLELINKS', 'PERMALINK', 'TINYLINK', 'DATE', 'TIME', 'MYNAME', 'EMAIL', 'AUTHORNAME', 'LINK', 'CATS', 'TAGS', 'COUNT', 'ACTION');
		$keyword = implode('|', $keywords);
		$regex = '/(?<!\{)\b('.$keyword.')\b(?!\{)/xm';
		$replace = '{\1}';
		$this->subscribe2_options['mailtext'] = preg_replace($regex, $replace, $this->subscribe2_options['mailtext']);
		$this->subscribe2_options['notification_subject'] = preg_replace($regex, $replace, $this->subscribe2_options['notification_subject']);
		$this->subscribe2_options['confirm_email'] = preg_replace($regex, $replace, $this->subscribe2_options['confirm_email']);
		$this->subscribe2_options['confirm_subject'] = preg_replace($regex, $replace, $this->subscribe2_options['confirm_subject']);
		$this->subscribe2_options['remind_email'] = preg_replace($regex, $replace, $this->subscribe2_options['remind_email']);
		$this->subscribe2_options['remind_subject'] = preg_replace($regex, $replace, $this->subscribe2_options['remind_subject']);
		update_option('subscribe2_options', $this->subscribe2_options);

		// upgrade old wpmu user meta data to new
		if ( $this->s2_mu === true ) {
			$this->namechange_subscribe2_widget();
			// loop through all users
			foreach ( $users as $user_ID ) {
				// get categories which the user is subscribed to (old ones)
				$categories = $this->get_user_meta($user_ID, 's2_subscribed');
				$categories = explode(',', $categories);
				$format = $this->get_user_meta($user_ID, 's2_format');
				$autosub = $this->get_user_meta($user_ID, 's2_autosub');

				// load blogs of user (only if we need them)
				$blogs = array();
				if ( count($categories) > 0 && !in_array('-1', $categories) ) {
					$blogs = get_blogs_of_user($user_ID, true);
				}

				foreach ( $blogs as $blog ) {
					switch_to_blog($blog->userblog_id);

					$blog_categories = (array)$wpdb->get_col("SELECT term_id FROM $wpdb->term_taxonomy WHERE taxonomy = 'category'");
					$subscribed_categories = array_intersect($categories, $blog_categories);
					if ( !empty($subscribed_categories) ) {
						foreach ( $subscribed_categories as $subscribed_category ) {
							$this->update_user_meta($user_ID, $this->get_usermeta_keyname('s2_cat') . $subscribed_category, $subscribed_category);
						}
						$this->update_user_meta($user_ID, $this->get_usermeta_keyname('s2_subscribed'), implode(',', $subscribed_categories));
					}
					if ( !empty($format) ) {
						$this->update_user_meta($user_ID, $this->get_usermeta_keyname('s2_format'), $format);
					}
					if ( !empty($autosub) ) {
						$this->update_user_meta($user_ID, $this->get_usermeta_keyname('s2_autosub'), $autosub);
					}
					restore_current_blog();
				}

				// delete old user meta keys
				$this->delete_user_meta($user_ID, 's2_subscribed');
				$this->delete_user_meta($user_ID, 's2_format');
				$this->delete_user_meta($user_ID, 's2_autosub');
				foreach ( $categories as $cat ) {
					$this->delete_user_meta($user_ID, 's2_cat' . $cat);
				}
			}
		}

		// ensure existing public subscriber emails are all sanitized
		$confirmed = $this->get_public();
		$unconfirmed = $this->get_public(0);
		$public_subscribers = array_merge((array)$confirmed, (array)$unconfirmed);

		foreach ( $public_subscribers as $email ) {
			$new_email = $this->sanitize_email($email);
			if ( $email !== $new_email ) {
				$wpdb->get_results("UPDATE $this->public SET email='$new_email' WHERE CAST(email as binary)='$email'");
			}
		}
		return;
	} // end upgrade()

	/**
	Reset our options
	*/
	function reset() {
		delete_option('subscribe2_options');
		wp_clear_scheduled_hook('s2_digest_cron');
		unset($this->subscribe2_options);
		require(S2PATH . "include/options.php");
		update_option('subscribe2_options', $this->subscribe2_options);
	} // end reset()

/* ===== mail handling ===== */
	/**
	Performs string substitutions for subscribe2 mail tags
	*/
	function substitute($string = '') {
		if ( '' == $string ) {
			return;
		}
		$string = str_replace("{BLOGNAME}", html_entity_decode(get_option('blogname'), ENT_QUOTES), $string);
		$string = str_replace("{BLOGLINK}", get_option('home'), $string);
		$string = str_replace("{TITLE}", stripslashes($this->post_title), $string);
		$link = "<a href=\"" . $this->permalink . "\">" . $this->permalink . "</a>";
		$string = str_replace("{PERMALINK}", $link, $string);
		if ( strstr($string, "{TINYLINK}") ) {
			$tinylink = file_get_contents('http://tinyurl.com/api-create.php?url=' . urlencode($this->permalink));
			if ( $tinylink !== 'Error' || $tinylink != false ) {
				$tlink = "<a href=\"" . $tinylink . "\">" . $tinylink . "</a>";
				$string = str_replace("{TINYLINK}", $tlink, $string);
			} else {
				$string = str_replace("{TINYLINK}", $link, $string);
			}
		}
		$string = str_replace("{DATE}", $this->post_date, $string);
		$string = str_replace("{TIME}", $this->post_time, $string);
		$string = str_replace("{MYNAME}", stripslashes($this->myname), $string);
		$string = str_replace("{EMAIL}", $this->myemail, $string);
		$string = str_replace("{AUTHORNAME}", stripslashes($this->authorname), $string);
		$string = str_replace("{CATS}", $this->post_cat_names, $string);
		$string = str_replace("{TAGS}", $this->post_tag_names, $string);
		$string = str_replace("{COUNT}", $this->post_count, $string);

		return $string;
	} // end substitute()

	/**
	Delivers email to recipients in HTML or plaintext
	*/
	function mail($recipients = array(), $subject = '', $message = '', $type='text') {
		if ( empty($recipients) || '' == $message ) { return; }

		if ( 'html' == $type ) {
			$headers = $this->headers('html');
			if ( 'yes' == $this->subscribe2_options['stylesheet'] ) {
				$mailtext = apply_filters('s2_html_email', "<html><head><title>" . $subject . "</title><link rel=\"stylesheet\" href=\"" . get_stylesheet_uri() . "\" type=\"text/css\" media=\"screen\" /></head><body>" . $message . "</body></html>");
			} else {
				$mailtext = apply_filters('s2_html_email', "<html><head><title>" . $subject . "</title></head><body>" . $message . "</body></html>");
			}
		} else {
			$headers = $this->headers();
			$message = preg_replace('|&[^a][^m][^p].{0,3};|', '', $message);
			$message = preg_replace('|&amp;|', '&', $message);
			$message = wordwrap(strip_tags($message), 80, "\n");
			$mailtext = apply_filters('s2_plain_email', $message);
		}

		// Replace any escaped html symbols in subject
		$subject = html_entity_decode($subject, ENT_QUOTES);

		// Construct BCC headers for sending or send individual emails
		$bcc = '';
		natcasesort($recipients);
		if ( function_exists('wpmq_mail') || $this->subscribe2_options['bcclimit'] == 1 ) {
			// BCCLimit is 1 so send individual emails
			foreach ( $recipients as $recipient ) {
				$recipient = trim($recipient);
				// sanity check -- make sure we have a valid email
				if ( !is_email($recipient) || empty($recipient) ) { continue; }
				// Use the mail queue provided we are not sending a preview
				if ( function_exists('wpmq_mail') && !$this->preview_email ) {
					@wp_mail($recipient, $subject, $mailtext, $headers, '', 0);
				} else {
					@wp_mail($recipient, $subject, $mailtext, $headers);
				}
			}
			return true;
		} elseif ( $this->subscribe2_options['bcclimit'] == 0 ) {
			// we're not using BCCLimit
			foreach ( $recipients as $recipient ) {
				$recipient = trim($recipient);
				// sanity check -- make sure we have a valid email
				if ( !is_email($recipient) ) { continue; }
				// and NOT the sender's email, since they'll get a copy anyway
				if ( !empty($recipient) && $this->myemail != $recipient ) {
					('' == $bcc) ? $bcc = "Bcc: $recipient" : $bcc .= ", $recipient";
					// Bcc Headers now constructed by phpmailer class
				}
			}
			$headers .= "$bcc\n";
		} else {
			// we're using BCCLimit
			$count = 1;
			$batch = array();
			foreach ( $recipients as $recipient ) {
				$recipient = trim($recipient);
				// sanity check -- make sure we have a valid email
				if ( !is_email($recipient) ) { continue; }
				// and NOT the sender's email, since they'll get a copy anyway
				if ( !empty($recipient) && $this->myemail != $recipient ) {
					('' == $bcc) ? $bcc = "Bcc: $recipient" : $bcc .= ", $recipient";
					// Bcc Headers now constructed by phpmailer class
				}
				if ( $this->subscribe2_options['bcclimit'] == $count ) {
					$count = 0;
					$batch[] = $bcc;
					$bcc = '';
				}
				$count++;
			}
			// add any partially completed batches to our batch array
			if ( '' != $bcc ) {
				$batch[] = $bcc;
			}
		}
		// rewind the array, just to be safe
		reset($recipients);

		// actually send mail
		if ( isset($batch) && !empty($batch) ) {
			foreach ( $batch as $bcc ) {
					$newheaders = $headers . "$bcc\n";
					$status = @wp_mail($this->myemail, $subject, $mailtext, $newheaders);
			}
		} else {
			$status = @wp_mail($this->myemail, $subject, $mailtext, $headers);
		}
		return $status;
	} // end mail()

	/**
	Construct standard set of email headers
	*/
	function headers($type='text') {
		if ( empty($this->myname) || empty($this->myemail) ) {
			if ( $this->subscribe2_options['sender'] == 'blogname' ) {
				$this->myname = html_entity_decode(get_option('blogname'), ENT_QUOTES);
				$this->myemail = get_option('admin_email');
			} else {
				$admin = $this->get_userdata($this->subscribe2_options['sender']);
				$this->myname = html_entity_decode($admin->display_name, ENT_QUOTES);
				$this->myemail = $admin->user_email;
			}
		}

		$header['From'] = $this->myname . " <" . $this->myemail . ">";
		$header['Reply-To'] = $this->myname . " <" . $this->myemail . ">";
		$header['Return-path'] = "<" . $this->myemail . ">";
		$header['Precedence'] = "list\nList-Id: " . get_option('blogname') . "";
		$header['X-Mailer'] = "PHP" . phpversion() . "";
		if ( $type == 'html' ) {
			// To send HTML mail, the Content-Type header must be set
			$header['Content-Type'] = get_option('html_type') . "; charset=\"". get_option('blog_charset') . "\"";
		} else {
			$header['Content-Type'] = "text/plain; charset=\"". get_option('blog_charset') . "\"";
		}

		// apply header filter to allow on-the-fly amendments
		$header = apply_filters('s2_email_headers', $header);
		// collapse the headers using $key as the header name
		foreach ( $header as $key => $value ) {
			$headers[$key] = $key . ": " . $value;
		}
		$headers = implode("\n", $headers);
		$headers .= "\n";

		return $headers;
	} // end headers()

	/**
	Sends an email notification of a new post
	*/
	function publish($post = 0, $preview = '') {
		if ( !$post ) { return $post; }

		if ( $this->s2_mu ) {
			global $switched;
			if ( $switched ) { return; }
		}

		if ( $preview == '' ) {
			// we aren't sending a Preview to the current user so carry out checks
			$s2mail = get_post_meta($post->ID, 's2mail', true);
			if ( (isset($_POST['s2_meta_field']) && $_POST['s2_meta_field'] == 'no') || strtolower(trim($s2mail)) == 'no' ) { return $post; }

			// are we doing daily digests? If so, don't send anything now
			if ( $this->subscribe2_options['email_freq'] != 'never' ) { return $post; }

			// is the current post of a type that should generate a notification email?
			// uses s2_post_types filter to allow for custom post types in WP 3.0
			if ( $this->subscribe2_options['pages'] == 'yes' ) {
				$s2_post_types = array('page', 'post');
			} else {
				$s2_post_types = array('post');
			}
			$s2_post_types = apply_filters('s2_post_types', $s2_post_types);
			if ( !in_array($post->post_type, $s2_post_types) ) {
				return $post;
			}

			// is this post set in the future?
			if ( $post->post_date > current_time('mysql') ) {
				// bail out
				return $post;
			}

			//Are we sending notifications for password protected posts?
			if ( $this->subscribe2_options['password'] == "no" && $post->post_password != '' ) {
					return $post;
			}

			$post_cats = wp_get_post_categories($post->ID);
			$check = false;
			// is the current post assigned to any categories
			// which should not generate a notification email?
			foreach ( explode(',', $this->subscribe2_options['exclude']) as $cat ) {
				if ( in_array($cat, $post_cats) ) {
					$check = true;
				}
			}

			if ( $check ) {
				// hang on -- can registered users subscribe to
				// excluded categories?
				if ( '0' == $this->subscribe2_options['reg_override'] ) {
					// nope? okay, let's leave
					return $post;
				}
			}

			// Are we sending notifications for Private posts?
			// Action is added if we are, but double check option and post status
			if ( $this->subscribe2_options['private'] == "yes" && $post->post_status == 'private' ) {
				// don't send notification to public users
				$check = true;
			}

			// lets collect our subscribers
			if ( !$check ) {
				// if this post is assigned to an excluded
				// category, or is a private post then
				// don't send public subscribers a notification
				$public = $this->get_public();
			}
			$post_cats_string = implode(',', $post_cats);
			$registered = $this->get_registered("cats=$post_cats_string");

			// do we have subscribers?
			if ( empty($public) && empty($registered) ) {
				// if not, no sense doing anything else
				return $post;
			}
		}

		// we set these class variables so that we can avoid
		// passing them in function calls a little later
		$this->post_title = "<a href=\"" . get_permalink($post->ID) . "\">" . html_entity_decode($post->post_title, ENT_QUOTES) . "</a>";
		$this->permalink = get_permalink($post->ID);
		$this->post_date = get_the_time(get_option('date_format'));
		$this->post_time = get_the_time();

		$author = get_userdata($post->post_author);
		$this->authorname = $author->display_name;

		// do we send as admin, or post author?
		if ( 'author' == $this->subscribe2_options['sender'] ) {
			// get author details
			$user = &$author;
			$this->myemail = $user->user_email;
			$this->myname = html_entity_decode($user->display_name, ENT_QUOTES);
		} elseif ( 'blogname' == $this->subscribe2_options['sender'] ) {
			$this->myemail = get_option('admin_email');
			$this->myname = html_entity_decode(get_option('blogname'), ENT_QUOTES);
		} else {
			// get admin details
			$user = $this->get_userdata($this->subscribe2_options['sender']);
			$this->myemail = $user->user_email;
			$this->myname = html_entity_decode($user->display_name, ENT_QUOTES);
		}

		$this->post_cat_names = implode(', ', wp_get_post_categories($post->ID, array('fields' => 'names')));
		$this->post_tag_names = implode(', ', wp_get_post_tags($post->ID, array('fields' => 'names')));

		// Get email subject
		$subject = stripslashes(strip_tags($this->substitute($this->subscribe2_options['notification_subject'])));
		// Get the message template
		$mailtext = apply_filters('s2_email_template', $this->subscribe2_options['mailtext']);
		$mailtext = stripslashes($this->substitute($mailtext));

		$plaintext = $post->post_content;
		if ( function_exists('strip_shortcodes') ) {
			$plaintext = strip_shortcodes($plaintext);
		}
		$gallid = '[gallery id="' . $post->ID . '"';
		$content = str_replace('[gallery', $gallid, $post->post_content);
		$content = apply_filters('the_content', $content);
		$content = str_replace("]]>", "]]&gt", $content);
		$excerpt = $post->post_excerpt;
		if ( '' == $excerpt ) {
			// no excerpt, is there a <!--more--> ?
			if ( false !== strpos($plaintext, '<!--more-->') ) {
				list($excerpt, $more) = explode('<!--more-->', $plaintext, 2);
				// strip leading and trailing whitespace
				$excerpt = strip_tags($excerpt);
				$excerpt = trim($excerpt);
			} else {
				// no <!--more-->, so grab the first 55 words
				$excerpt = strip_tags($plaintext);
				$words = explode(' ', $excerpt, $this->excerpt_length + 1);
				if (count($words) > $this->excerpt_length) {
					array_pop($words);
					array_push($words, '[...]');
					$excerpt = implode(' ', $words);
				}
			}
		}
		$html_excerpt = $post->post_excerpt;
		if ( '' == $html_excerpt ) {
			// no excerpt, is there a <!--more--> ?
			if ( false !== strpos($content, '<!--more-->') ) {
				list($html_excerpt, $more) = explode('<!--more-->', $content, 2);
				// balance HTML tags and then strip leading and trailing whitespace
				$html_excerpt = trim(balanceTags($html_excerpt, true));
			} else {
				// no <!--more-->, so grab the first 55 words
				$words = explode(' ', $content, $this->excerpt_length + 1);
				if (count($words) > $this->excerpt_length) {
					array_pop($words);
					array_push($words, '[...]');
					$html_excerpt = implode(' ', $words);
					// balance HTML tags and then strip leading and trailing whitespace
					$html_excerpt = trim(balanceTags($html_excerpt, true));
				} else {
					$html_excerpt = $content;
				}
			}
		}

		// prepare mail body texts
		$excerpt_body = str_replace("{POST}", $excerpt, $mailtext);
		$full_body = str_replace("{POST}", strip_tags($plaintext), $mailtext);
		$html_body = str_replace("\r\n", "<br />\r\n", $mailtext);
		$html_body = str_replace("{POST}", $content, $html_body);
		$html_excerpt_body = str_replace("\r\n", "<br />\r\n", $mailtext);
		$html_excerpt_body = str_replace("{POST}", $html_excerpt, $html_excerpt_body);

		if ( $preview != '' ) {
			$this->myemail = $preview;
			$this->myname = __('Plain Text Excerpt Preview', 'subscribe2');
			$this->mail(array($preview), $subject, $excerpt_body);
			$this->myname = __('Plain Text Full Preview', 'subscribe2');
			$this->mail(array($preview), $subject, $full_body);
			$this->myname = __('HTML Excerpt Preview', 'subscribe2');
			$this->mail(array($preview), $subject, $html_excerpt_body, 'html');
			$this->myname = __('HTML Full Preview', 'subscribe2');
			$this->mail(array($preview), $subject, $html_body, 'html');
		} else {
			// first we send plaintext summary emails
			$registered = $this->get_registered("cats=$post_cats_string&format=excerpt");
			if ( empty($registered) ) {
				$recipients = (array)$public;
			} elseif ( empty($public) ) {
				$recipients = (array)$registered;
			} else {
				$recipients = array_merge((array)$public, (array)$registered);
			}
			$this->mail($recipients, $subject, $excerpt_body);

			// next we send plaintext full content emails
			$this->mail($this->get_registered("cats=$post_cats_string&format=post"), $subject, $full_body);

			// next we send html excerpt content emails
			$this->mail($this->get_registered("cats=$post_cats_string&format=html_excerpt"), $subject, $html_excerpt_body, 'html');

			// finally we send html full content emails
			$this->mail($this->get_registered("cats=$post_cats_string&format=html"), $subject, $html_body, 'html');
		}
	} // end publish()

	/**
	Send confirmation email to a public subscriber
	*/
	function send_confirm($what = '', $is_remind = false) {
		if ( $this->filtered == 1 ) { return true; }
		if ( !$this->email || !$what ) { return false; }
		$id = $this->get_id($this->email);
		if ( !$id ) {
			return false;
		}

		// generate the URL "?s2=ACTION+HASH+ID"
		// ACTION = 1 to subscribe, 0 to unsubscribe
		// HASH = md5 hash of email address
		// ID = user's ID in the subscribe2 table
		// use home instead of siteurl incase index.php is not in core wordpress directory
		$link = get_option('home') . "/?s2=";

		if ( 'add' == $what ) {
			$link .= '1';
		} elseif ( 'del' == $what ) {
			$link .= '0';
		}
		$link .= md5($this->email);
		$link .= $id;

		// sort the headers now so we have all substitute information
		$mailheaders = $this->headers();

		if ( $is_remind == true ) {
			$body = $this->substitute(stripslashes($this->subscribe2_options['remind_email']));
			$subject = $this->substitute(stripslashes($this->subscribe2_options['remind_subject']));
		} else {
			$body = $this->substitute(stripslashes($this->subscribe2_options['confirm_email']));
			if ( 'add' == $what ) {
				$body = str_replace("{ACTION}", $this->subscribe, $body);
				$subject = str_replace("{ACTION}", $this->subscribe, $this->subscribe2_options['confirm_subject']);
			} elseif ( 'del' == $what ) {
				$body = str_replace("{ACTION}", $this->unsubscribe, $body);
				$subject = str_replace("{ACTION}", $this->unsubscribe, $this->subscribe2_options['confirm_subject']);
			}
			$subject = html_entity_decode($this->substitute(stripslashes($subject)), ENT_QUOTES);
		}

		$body = str_replace("{LINK}", $link, $body);

		if ( $is_remind == true && function_exists('wpmq_mail') ) {
			// could be sending lots of reminders so queue them if wpmq is enabled
			@wp_mail($this->email, $subject, $body, $mailheaders, '', 0);
		} else {
			return @wp_mail($this->email, $subject, $body, $mailheaders);
		}
	} // end send_confirm()

/* ===== Subscriber functions ===== */
	/**
	Given a public subscriber ID, returns the email address
	*/
	function get_email($id = 0) {
		global $wpdb;

		if ( !$id ) {
			return false;
		}
		return $wpdb->get_var("SELECT email FROM $this->public WHERE id=$id");
	} // end get_email()

	/**
	Given a public subscriber email, returns the subscriber ID
	*/
	function get_id($email = '') {
		global $wpdb;

		if ( !$email ) {
			return false;
		}
		return $wpdb->get_var("SELECT id FROM $this->public WHERE email='$email'");
	} // end get_id()

	/**
	Activate an public subscriber email address
	If the address is not already present, it will be added
	*/
	function activate($email = '') {
		global $wpdb;

		if ( '' == $email ) {
			if ( '' != $this->email ) {
				$email = $this->email;
			} else {
				return false;
			}
		}

		if ( false !== $this->is_public($email) ) {
			$check = $wpdb->get_var("SELECT user_email FROM $wpdb->users WHERE user_email='$this->email'");
			if ( $check ) { return; }
			$wpdb->get_results("UPDATE $this->public SET active='1', ip='$this->ip' WHERE CAST(email as binary)='$email'");
		} else {
			global $current_user;
			$wpdb->get_results($wpdb->prepare("INSERT INTO $this->public (email, active, date, ip) VALUES (%s, %d, NOW(), %s)", $email, 1, $current_user->user_login));
		}
	} // end activate()

	/**
	Add an public subscriber to the subscriber table as unconfirmed
	*/
	function add($email = '') {
		if ( $this->filtered ==1 ) { return; }
		global $wpdb;

		if ( '' == $email ) {
			if ( '' != $this->email ) {
				$email = $this->email;
			} else {
				return false;
			}
		}

		if ( !is_email($email) ) { return false; }

		if ( false !== $this->is_public($email) ) {
			$wpdb->get_results("UPDATE $this->public SET date=NOW() WHERE CAST(email as binary)='$email'");
		} else {
			$wpdb->get_results($wpdb->prepare("INSERT INTO $this->public (email, active, date, ip) VALUES (%s, %d, NOW(), %s)", $email, 0, $this->ip));
		}
	} // end add()

	/**
	Remove a public subscriber user from the subscription table
	*/
	function delete($email = '') {
		global $wpdb;

		if ( '' == $email ) {
			if ( '' != $this->email ) {
				$email = $this->email;
			} else {
				return false;
			}
		}

		if ( !is_email($email) ) { return false; }
		$wpdb->get_results("DELETE FROM $this->public WHERE CAST(email as binary)='$email'");
	} // end delete()

	/**
	Toggle a public subscriber's status
	*/
	function toggle($email = '') {
		global $wpdb;

		if ( '' == $email || ! is_email($email) ) { return false; }

		// let's see if this is a public user
		$status = $this->is_public($email);
		if ( false === $status ) { return false; }

		if ( '0' == $status ) {
			$wpdb->get_results("UPDATE $this->public SET active='1' WHERE CAST(email as binary)='$email'");
		} else {
			$wpdb->get_results("UPDATE $this->public SET active='0' WHERE CAST(email as binary)='$email'");
		}
	} // end toggle()

	/**
	Send reminder email to unconfirmed public subscribers
	*/
	function remind($emails = '') {
		if ( '' == $emails ) { return false; }

		$recipients = explode(",", $emails);
		if ( !is_array($recipients) ) { $recipients = (array)$recipients; }
		foreach ( $recipients as $recipient ) {
			$this->email = $recipient;
			$this->send_confirm('add', true);
		}
	} //end remind()

	/**
	Check email is not from a barred domain
	*/
	function is_barred($email='') {
		$barred_option = $this->subscribe2_options['barred'];
		list($user, $domain) = split('@', $email);
		$bar_check = stristr($barred_option, $domain);

		if ( !empty($bar_check) ) {
			return true;
		} else {
			return false;
		}
	} // end is_barred()

	/**
	Confirm request from the link emailed to the user and email the admin
	*/
	function confirm($content = '') {
		global $wpdb;

		if ( 1 == $this->filtered ) { return $content; }

		$code = $_GET['s2'];
		$action = intval(substr($code, 0, 1));
		$hash = substr($code, 1, 32);
		$code = str_replace($hash, '', $code);
		$id = intval(substr($code, 1));
		if ( $id ) {
			$this->email = $this->sanitize_email($this->get_email($id));
			if ( !$this->email || $hash !== md5($this->email) ) {
				return $this->no_such_email;
			}
		} else {
			return $this->no_such_email;
		}

		// get current status of email so messages are only sent once per emailed link
		$current = $this->is_public($this->email);

		if ( '1' == $action ) {
			// make this subscription active
			$this->message = $this->added;
			if ( '1' != $current ) {
				$this->ip = $_SERVER['REMOTE_ADDR'];
				$this->activate($this->email);
				if ( $this->subscribe2_options['admin_email'] == 'subs' || $this->subscribe2_options['admin_email'] == 'both' ) {
					( '' == get_option('blogname') ) ? $subject = "" : $subject = "[" . stripslashes(get_option('blogname')) . "] ";
					$subject .= __('New Subscription', 'subscribe2');
					$subject = html_entity_decode($subject, ENT_QUOTES);
					$message = $this->email . " " . __('subscribed to email notifications!', 'subscribe2');
					$recipients = $wpdb->get_col("SELECT DISTINCT(user_email) FROM $wpdb->users INNER JOIN $wpdb->usermeta ON $wpdb->users.ID = $wpdb->usermeta.user_id WHERE $wpdb->usermeta.meta_key='" . $wpdb->prefix . "user_level' AND $wpdb->usermeta.meta_value='10'");
					if ( empty($recipients) ) {
						global $wp_version;
						if ( version_compare($wp_version, '3.1', '<') ) {
							// WordPress version is less than 3.1, use WP_User_Search class
							if ( !class_exists(WP_User_Search) ) {
								require(ABSPATH . 'wp-admin/includes/user.php');
								$wp_user_query = new WP_User_Search( '', '', 'administrator');
								$admins_string = implode(', ', $wp_user_query->get_results());
								$sql = "SELECT ID, display_name FROM $wpdb->users WHERE ID IN (" . $admins_string . ")";
								$recipients = $wpdb->get_results($sql);
							}
						} else {
							// WordPress version is 3.1 or greater, use WP_User_Query class
							$role = array('fields' => array('user_email'), 'role' => 'administrator');
							$wp_user_query = get_users( $role );
							foreach ($wp_user_query as $user) {
								$recipients[] = $user->user_email;
							}
						}
					}
					$headers = $this->headers();
					foreach ( $recipients as $recipient ) {
						@wp_mail($recipient, $subject, $message, $headers);
					}
				}
			}
			$this->filtered = 1;
		} elseif ( '0' == $action ) {
			// remove this subscriber
			$this->message = $this->deleted;
			if ( '0' != $current ) {
				$this->delete();
				if ( $this->subscribe2_options['admin_email'] == 'unsubs' || $this->subscribe2_options['admin_email'] == 'both' ) {
					( '' == get_option('blogname') ) ? $subject = "" : $subject = "[" . stripslashes(get_option('blogname')) . "] ";
					$subject .= __('New Unsubscription', 'subscribe2');
					$subject = html_entity_decode($subject, ENT_QUOTES);
					$message = $this->email . " " . __('unsubscribed from email notifications!', 'subscribe2');
					$recipients = $wpdb->get_col("SELECT DISTINCT(user_email) FROM $wpdb->users INNER JOIN $wpdb->usermeta ON $wpdb->users.ID = $wpdb->usermeta.user_id WHERE $wpdb->usermeta.meta_key='" . $wpdb->prefix . "user_level' AND $wpdb->usermeta.meta_value='10'");
					if ( empty($recipients) ) {
						global $wp_version;
						if ( version_compare($wp_version, '3.1', '<') ) {
							// WordPress version is less than 3.1, use WP_User_Search class
							if ( !class_exists(WP_User_Search) ) {
								require(ABSPATH . 'wp-admin/includes/user.php');
								$wp_user_query = new WP_User_Search( '', '', 'administrator');
								$admins_string = implode(', ', $wp_user_query->get_results());
								$sql = "SELECT ID, display_name FROM $wpdb->users WHERE ID IN (" . $admins_string . ")";
								$recipients = $wpdb->get_results($sql);
							}
						} else {
							// WordPress version is 3.1 or greater, use WP_User_Query class
							$role = array('fields' => array('user_email'), 'role' => 'administrator');
							$wp_user_query = get_users( $role );
							foreach ($wp_user_query as $user) {
								$recipients[] = $user->user_email;
							}
						}
					}
					$headers = $this->headers();
					// send individual emails so we don't reveal admin emails to each other
					foreach ( $recipients as $recipient ) {
						@wp_mail($recipient, $subject, $message, $headers);
					}
				}
			}
			$this->filtered = 1;
		}

		if ( '' != $this->message ) {
			return $this->message;
		}
	} // end confirm()

	/**
	Is the supplied email address a public subscriber?
	*/
	function is_public($email = '') {
		global $wpdb;

		if ( '' == $email ) { return false; }

		// run the query and force case sensitivity
		$check = $wpdb->get_var("SELECT active FROM $this->public WHERE CAST(email as binary)='$email'");
		if ( '0' == $check || '1' == $check ) {
			return $check;
		} else {
			return false;
		}
	} // end is_public()

	/**
	Is the supplied email address a registered user of the blog?
	*/
	function is_registered($email = '') {
		global $wpdb;

		if ( '' == $email ) { return false; }

		$check = $wpdb->get_var("SELECT user_email FROM $wpdb->users WHERE user_email='$email'");
		if ( $check ) {
			return true;
		} else {
			return false;
		}
	} // end is_registered()

	/**
	Return Registered User ID from email
	*/
	function get_user_id($email = '') {
		global $wpdb;

		if ( '' == $email ) { return false; }

		$id = $wpdb->get_var("SELECT id FROM $wpdb->users WHERE user_email='$email'");

		return $id;
	} // end get_user_id()

	/**
	Return an array of all the public subscribers
	*/
	function get_public($confirmed = 1) {
		global $wpdb;
		if ( 1 == $confirmed ) {
			if ( '' == $this->all_public ) {
				$this->all_public = $wpdb->get_col("SELECT email FROM $this->public WHERE active='1'");
			}
			return $this->all_public;
		} else {
			if ( '' == $this->all_unconfirmed ) {
				$this->all_unconfirmed = $wpdb->get_col("SELECT email FROM $this->public WHERE active='0'");
			}
			return $this->all_unconfirmed;
		}
	} // end get_public()

	/**
	Return an array of all subscribers
	*/
	function get_all_registered($id = '') {
		global $wpdb;

		if ( $this->s2_mu ) {
			if ( $id ) {
				return $wpdb->get_col("SELECT user_id FROM $wpdb->usermeta WHERE meta_key='" . $wpdb->prefix . "capabilities'");
			} else {
				$result = $wpdb->get_col("SELECT user_id FROM $wpdb->usermeta WHERE meta_key='" . $wpdb->prefix . "capabilities'");
				$ids = implode(',', $result);
				return $wpdb->get_col("SELECT user_email FROM $wpdb->users WHERE ID IN ($ids)");
			}
		} else {
			if ( $id ) {
				return $wpdb->get_col("SELECT ID FROM $wpdb->users");
			} else {
				return $wpdb->get_col("SELECT user_email FROM $wpdb->users");
			}
		}
	} // end get_all_registered()

	/**
	Return an array of registered subscribers
	Collect all the registered users of the blog who are subscribed to the specified categories
	*/
	function get_registered($args = '') {
		global $wpdb;

		$format = '';
		$cats = '';
		$subscribers = array();

		parse_str($args, $r);
		if ( !isset($r['format']) )
			$r['format'] = 'all';
		if ( !isset($r['cats']) )
			$r['cats'] = '';

		$JOIN = ''; $AND = '';
		// text or HTML subscribers
		if ( 'all' != $r['format'] ) {
			$JOIN .= "INNER JOIN $wpdb->usermeta AS b ON a.user_id = b.user_id ";
			$AND .= " AND b.meta_key='" . $this->get_usermeta_keyname('s2_format') . "' AND b.meta_value=";
			if ( 'html' == $r['format'] ) {
				$AND .= "'html'";
			} elseif ( 'html_excerpt' == $r['format'] ) {
				$AND .= "'html_excerpt'";
			} elseif ( 'post' == $r['format'] ) {
				$AND .= "'post'";
			} elseif ( 'excerpt' == $r['format'] ) {
				$AND .= "'excerpt'";
			}
		}

		// specific category subscribers
		if ( '' != $r['cats'] ) {
			$JOIN .= "INNER JOIN $wpdb->usermeta AS c ON a.user_id = c.user_id ";
			$and = '';
			foreach ( explode(',', $r['cats']) as $cat ) {
				('' == $and) ? $and = "c.meta_key='" . $this->get_usermeta_keyname('s2_cat') . "$cat'" : $and .= " OR c.meta_key='" . $this->get_usermeta_keyname('s2_cat') . "$cat'";
			}
			$AND .= " AND ($and)";
		}

		if ( $this->s2_mu ) {
			$sql = "SELECT a.user_id FROM $wpdb->usermeta AS a " . $JOIN . "WHERE a.meta_key='" . $wpdb->prefix . "capabilities'" . $AND;
		} else {
			$sql = "SELECT a.user_id FROM $wpdb->usermeta AS a " . $JOIN . "WHERE a.meta_key='" . $this->get_usermeta_keyname('s2_subscribed') . "'" . $AND;
		}
		$result = $wpdb->get_col($sql);
		if ( $result ) {
			$ids = implode(',', $result);
			$registered = $wpdb->get_col("SELECT user_email FROM $wpdb->users WHERE ID IN ($ids)");
		}

		if ( empty($registered) ) { return false; }

		// apply filter to registered users to add or remove additional addresses, pass args too for additional control
		$registered = apply_filters('s2_registered_subscribers', $registered, $args);
		return $registered;
	} // end get_registered()

	/**
	Collects the signup date for all public subscribers
	*/
	function signup_date($email = '') {
		if ( '' == $email ) { return false; }

		global $wpdb;
		if ( !empty($this->signup_dates) ) {
			return $this->signup_dates[$email];
		} else {
			$results = $wpdb->get_results("SELECT email, date FROM $this->public", ARRAY_N);
			foreach ( $results as $result ) {
				$this->signup_dates[$result[0]] = $result[1];
			}
			return $this->signup_dates[$email];
		}
	} // end signup_date()

	/**
	Collects the ip address for all public subscribers
	*/
	function signup_ip($email = '') {
		if ( '' == $email ) {return false; }

		global $wpdb;
		if ( !empty($this->signup_ips) ) {
			return $this->signup_ips[$email];
		} else {
			$results = $wpdb->get_results("SELECT email, ip FROM $this->public", ARRAY_N);
			foreach ( $results as $result ) {
				$this->signup_ips[$result[0]] = $result[1];
			}
			return $this->signup_ips[$email];
		}
	} // end signup_ip()

	/**
	function to ensure email is compliant with internet messaging standards
	*/
	function sanitize_email($email) {
		if ( !is_email($email) ) { return; }

		// ensure that domain is in lowercase as per internet email standards
		list($name, $domain) = explode('@', $email, 2);
		return $name . "@" . strtolower($domain);;
	} // end sanitize_email()

	/**
	Create the appropriate usermeta values when a user registers
	If the registering user had previously subscribed to notifications, this function will delete them from the public subscriber list first
	*/
	function register($user_ID = 0, $consent = false) {
		global $wpdb;

		if ( 0 == $user_ID ) { return $user_ID; }
		$user = get_userdata($user_ID);

		// Subscribe registered users to categories obeying excluded categories
		if ( 0 == $this->subscribe2_options['reg_override'] || 'no' == $this->subscribe2_options['newreg_override'] ) {
			$all_cats = $this->all_cats(true, 'ID');
		} else {
			$all_cats = $this->all_cats(false, 'ID');
		}

		$cats = '';
		foreach ( $all_cats as $cat ) {
			('' == $cats) ? $cats = "$cat->term_id" : $cats .= ",$cat->term_id";
		}

		if ( '' == $cats ) {
			// sanity check, might occur if all cats excluded and reg_override = 0
			return $user_ID;
		}

		// has this user previously signed up for email notification?
		if ( false !== $this->is_public($this->sanitize_email($user->user_email)) ) {
			// delete this user from the public table, and subscribe them to all the categories
			$this->delete($user->user_email);
			$this->update_user_meta($user_ID, $this->get_usermeta_keyname('s2_subscribed'), $cats);
			foreach ( explode(',', $cats) as $cat ) {
				$this->update_user_meta($user_ID, $this->get_usermeta_keyname('s2_cat') . $cat, "$cat");
			}
			$this->update_user_meta($user_ID, $this->get_usermeta_keyname('s2_format'), 'excerpt');
			$this->update_user_meta($user_ID, $this->get_usermeta_keyname('s2_autosub'), $this->subscribe2_options['autosub_def']);
		} else {
			// create post format entries for all users
			if ( in_array($this->subscribe2_options['autoformat'], array('html', 'html_excerpt', 'post', 'excerpt')) ) {
				$this->update_user_meta($user_ID, $this->get_usermeta_keyname('s2_format'), $this->subscribe2_options['autoformat']);
			} else {
				$this->update_user_meta($user_ID, $this->get_usermeta_keyname('s2_format'), 'excerpt');
			}
			$this->update_user_meta($user_ID, $this->get_usermeta_keyname('s2_autosub'), $this->subscribe2_options['autosub_def']);
			// if the are no existing subscriptions, create them if we have consent
			if (  true === $consent ) {
				$this->update_user_meta($user_ID, $this->get_usermeta_keyname('s2_subscribed'), $cats);
				foreach ( explode(',', $cats) as $cat ) {
					$this->update_user_meta($user_ID, $this->get_usermeta_keyname('s2_cat') . $cat, "$cat");
				}
			}
		}
		return $user_ID;
	} // end register()

	/**
	Subscribe all registered users to category selected on Admin Manage Page
	*/
	function subscribe_registered_users($emails = '', $cats = array()) {
		if ( '' == $emails || '' == $cats ) { return false; }
		global $wpdb;

		$useremails = explode(",", $emails);
		$useremails = implode("', '", $useremails);

		$sql = "SELECT ID FROM $wpdb->users WHERE user_email IN ('$useremails')";
		$user_IDs = $wpdb->get_col($sql);

		foreach ( $user_IDs as $user_ID ) {
			$old_cats = $this->get_user_meta($user_ID, $this->get_usermeta_keyname('s2_subscribed'));
			if ( !empty($old_cats) ) {
				$old_cats = explode(',', $old_cats);
				$newcats = array_unique(array_merge($cats, $old_cats));
			} else {
				$newcats = $cats;
			}
			if ( !empty($newcats) ) {
				// add subscription to these cat IDs
				foreach ( $newcats as $id ) {
					$this->update_user_meta($user_ID, $this->get_usermeta_keyname('s2_cat') . $id, "$id");
				}
				$this->update_user_meta($user_ID, $this->get_usermeta_keyname('s2_subscribed'), implode(',', $newcats));
			}
			unset($newcats);
		}
	} // end subscribe_registered_users()

	/**
	Unsubscribe all registered users to category selected on Admin Manage Page
	*/
	function unsubscribe_registered_users($emails = '', $cats = array()) {
		if ( '' == $emails || '' == $cats ) { return false; }
		global $wpdb;

		$useremails = explode(",", $emails);
		$useremails = implode("', '", $useremails);

		$sql = "SELECT ID FROM $wpdb->users WHERE user_email IN ('$useremails')";
		$user_IDs = $wpdb->get_col($sql);

		foreach ( $user_IDs as $user_ID ) {
			$old_cats = explode(',', $this->get_user_meta($user_ID, $this->get_usermeta_keyname('s2_subscribed')));
			$remain = array_diff($old_cats, $cats);
			if ( !empty($remain) ) {
				// remove subscription to these cat IDs and update s2_subscribed
				foreach ( $cats as $id ) {
					$this->delete_user_meta($user_ID, $this->get_usermeta_keyname('s2_cat') . $id);
				}
				$this->update_user_meta($user_ID, $this->get_usermeta_keyname('s2_subscribed'), implode(',', $remain));
			} else {
				// remove subscription to these cat IDs and update s2_subscribed to ''
				foreach ( $cats as $id ) {
					$this->delete_user_meta($user_ID, $this->get_usermeta_keyname('s2_cat') . $id);
				}
				$this->delete_user_meta($user_ID, $this->get_usermeta_keyname('s2_subscribed'));
			}
			unset($remain);
		}
	} // end unsubscribe_registered_users()

	/**
	Handles bulk changes to email format for Registered Subscribers
	*/
	function format_change($format, $subscribers_string) {
		if ( empty($format) ) { return; }

		global $wpdb;
		$emails ='';
		$subscribers = explode(',', $subscribers_string);
		foreach ( $subscribers as $subscriber ) {
			( '' == $emails) ? $emails = "'$subscriber'" : $emails .= ",'$subscriber'";
		}
		$ids = $wpdb->get_col("SELECT ID FROM $wpdb->users WHERE user_email IN ($emails)");
		$ids = implode(',', $ids);
		$sql = "UPDATE $wpdb->usermeta SET meta_value='{$format}' WHERE meta_key='" . $this->get_usermeta_keyname('s2_format') . "' AND user_id IN ($ids)";
		$wpdb->get_results("UPDATE $wpdb->usermeta SET meta_value='{$format}' WHERE meta_key='" . $this->get_usermeta_keyname('s2_format') . "' AND user_id IN ($ids)");
	} // end format_change()

	/**
	Handles bulk update to digest preferences
	*/
	function digest_change($digest, $emails) {
		if ( empty($digest) ) { return; }

		global $wpdb;
		$useremails = explode(",", $emails);
		$useremails = implode("', '", $useremails);

		$sql = "SELECT ID FROM $wpdb->users WHERE user_email IN ('$useremails')";
		$user_IDs = $wpdb->get_col($sql);

		if ( $digest == 'digest' ) {
			$exclude = explode(',', $this->subscribe2_options['exclude']);
			if ( !empty($exclude) ) {
				$all_cats = $this->all_cats(true, 'ID');
			} else {
				$all_cats = $this->all_cats(false, 'ID');
			}

			$cats_string = '';
			foreach ( $all_cats as $cat ) {
				('' == $cats_string) ? $cats_string = "$cat->term_id" : $cats_string .= ",$cat->term_id";
			}

			foreach ( $user_IDs as $user_ID ) {
				foreach ( $all_cats as $cat ) {
					$this->update_user_meta($user_ID, $this->get_usermeta_keyname('s2_cat') . $cat->term_id, $cat->term_id);
				}
				$this->update_user_meta($user_ID, $this->get_usermeta_keyname('s2_subscribed'), $cats_string);
			}
		} elseif ( $digest == '-1' ) {
			foreach ( $user_IDs as $user_ID ) {
				$cats = explode(',', $this->get_user_meta($user_ID, $this->get_usermeta_keyname('s2_subscribed')));
				foreach ( $cats as $id ) {
					$this->delete_user_meta($user_ID, $this->get_usermeta_keyname('s2_cat') . $id);
				}
				$this->delete_user_meta($user_ID, $this->get_usermeta_keyname('s2_subscribed'));
			}
		}
	} // end digest_change()

	/**
	Handles subscriptions and unsubscriptions for different blogs on WPMU installs
	*/
	function wpmu_subscribe() {
		// subscribe to new blog
		if ( !empty($_GET['s2mu_subscribe']) ) {
			$sub_id = intval($_GET['s2mu_subscribe']);
			if ( $sub_id >= 0 ) {
				switch_to_blog($sub_id);

				$user_ID = get_current_user_id();

				// if user is not a user of the current blog
				if ( !is_blog_user($sub_id) ) {
					// add user to current blog as subscriber
					add_user_to_blog($sub_id, $user_ID, 'subscriber');
					// add an action hook for external manipulation of blog and user data
					do_action_ref_array('subscribe2_wpmu_subscribe', array($user_ID, $sub_id));
				}

				// get categories, remove excluded ones if override is off
				if ( 0 == $this->subscribe2_options['reg_override'] ) {
					$all_cats = $this->all_cats(true, 'ID');
				} else {
					$all_cats = $this->all_cats(false, 'ID');
				}

				$cats_string = '';
				foreach ( $all_cats as $cat ) {
					('' == $cats_string) ? $cats_string = "$cat->term_id" : $cats_string .= ",$cat->term_id";
					$this->update_user_meta($user_ID, $this->get_usermeta_keyname('s2_cat') . $cat->term_id, $cat->term_id);
				}
				if ( empty($cats_string) ) {
					$this->delete_user_meta($user_ID, $this->get_usermeta_keyname('s2_subscribed'));
				} else {
					$this->update_user_meta($user_ID, $this->get_usermeta_keyname('s2_subscribed'), $cats_string);
				}
			}
		} elseif ( !empty($_GET['s2mu_unsubscribe']) ) {
			// unsubscribe from a blog
			$unsub_id = intval($_GET['s2mu_unsubscribe']);
			if ( $unsub_id >= 0 ) {
				switch_to_blog($unsub_id);

				$user_ID = get_current_user_id();

				// delete subscription to all categories on that blog
				$cats = $this->get_user_meta($user_ID, $this->get_usermeta_keyname('s2_subscribed'));
				$cats = explode(',', $cats);
				if ( !is_array($cats) ) {
					$cats = array($cats);
				}

				foreach ( $cats as $id ) {
					$this->delete_user_meta($user_ID, $this->get_usermeta_keyname('s2_cat') . $id);
				}
				$this->delete_user_meta($user_ID, $this->get_usermeta_keyname('s2_subscribed'));

				// add an action hook for external manipulation of blog and user data
				do_action_ref_array('subscribe2_wpmu_unsubscribe', array($user_ID, $unsub_id));

				restore_current_blog();
			}
		}

		if ( !is_user_member_of_blog($user_ID) ) {
			$user_blogs = get_active_blog_for_user($user_ID);
			if ( is_array($user_blogs) ) {
				switch_to_blog(key($user_blogs));
			} else {
				// no longer a member of a blog
				wp_redirect(get_option('siteurl')); // redirect to front page
				exit(0);
			}
		}

		// redirect to profile page
		if ( current_user_can('manage_options') ) {
			$url = get_option('siteurl') . '/wp-admin/users.php?page=s2_users';
			wp_redirect($url);
			exit(0);
		} else {
			$url = get_option('siteurl') . '/wp-admin/profile.php?page=s2_users';
			wp_redirect($url);
			exit(0);
		}
	} // end wpmu_subscribe()

	/**
	Filter the usermeta function to allow backwards compatibility to WordPress 2.8 and 2.9
	WordPress 3.0 replaced all *_usermeta() functions with *_user_meta counterparts
	*/
	function get_user_meta($user_ID, $keyname) {
		global $wp_version;
		if ( version_compare($wp_version, '3.0', '<') ) {
			// WordPress version is less than 3.0, use get_usermeta
			$user_meta = get_usermeta($user_ID, $keyname);
		} else {
			$user_meta = get_user_meta($user_ID, $keyname, true);
		}

		return $user_meta;
	} // end get_user_meta()

	function update_user_meta($user_ID, $keyname, $value) {
		global $wp_version;
		if ( version_compare($wp_version, '3.0', '<') ) {
			// WordPress version is less than 3.0, use update_usermeta
			$user_meta = update_usermeta($user_ID, $keyname, $value);
		} else {
			$user_meta = update_user_meta($user_ID, $keyname, $value);
		}

		return $user_meta;
	} // end update_user_meta()

	function delete_user_meta($user_ID, $keyname) {
		global $wp_version;
		if ( version_compare($wp_version, '3.0', '<') ) {
			// WordPress version is less than 3.0, use delete_usermeta
			$user_meta = delete_usermeta($user_ID, $keyname);
		} else {
			$user_meta = delete_user_meta($user_ID, $keyname);
		}

		return $user_meta;
	} // end delete_user_meta()

	/**
	Get objects parents
	Uses get_ancestors in WordPress 3.1+ and copies this function in lower versions
	Can be dropped and calls substituted when Subscribe2 requires WordPress 3.1+
	*/
	function get_parents($object_id = 0, $object_type = '') {
		if ( function_exists('get_ancestors') ) {
			return get_ancestors($object_id, $object_type);
		} else {
			// code copied directly from wp-includes/taxonomy.php
			// get_ancestors() function
			$object_id = (int) $object_id;

			$ancestors = array();

			if ( empty( $object_id ) ) {
				return apply_filters('get_ancestors', $ancestors, $object_id, $object_type);
			}

			if ( is_taxonomy_hierarchical( $object_type ) ) {
				$term = get_term($object_id, $object_type);
				while ( ! is_wp_error($term) && ! empty( $term->parent ) && ! in_array( $term->parent, $ancestors ) ) {
					$ancestors[] = (int) $term->parent;
					$term = get_term($term->parent, $object_type);
				}
			} elseif ( null !== get_post_type_object( $object_type ) ) {
				$object = get_post($object_id);
				if ( ! is_wp_error( $object ) && isset( $object->ancestors ) && is_array( $object->ancestors ) )
					$ancestors = $object->ancestors;
				else {
					while ( ! is_wp_error($object) && ! empty( $object->post_parent ) && ! in_array( $object->post_parent, $ancestors ) ) {
						$ancestors[] = (int) $object->post_parent;
						$object = get_post($object->post_parent);
					}
				}
			}

			return apply_filters('get_ancestors', $ancestors, $object_id, $object_type);
		}
	} // end get_parents()

	/**
	Check if taxonomy exists
	Uses taxonomy_exists in WordPress 3.0+ and copies this function in lower versions
	Can be dropped and calls substituted when Subscribe2 requires WordPress 3.0+
	*/
	function s2_taxonomy_exists($taxonomy) {
		if ( function_exists('taxonomy_exists') ) {
			return taxonomy_exists($taxonomy);
		} else {
			global $wp_taxonomies;
			return isset( $wp_taxonomies[$taxonomy] );
		}
	} // end s2_taxonomy_exists()

	/**
	Autosubscribe registered users to newly created categories
	if registered user has selected this option
	*/
	function new_category($new_category='') {
		if ( 'no' == $this->subscribe2_options['show_autosub'] ) { return; }
		// don't subscribe to individual new categories if we are doing digest emails
		if ( $this->subscribe2_options['email_freq'] != 'never' ) { return; }
		global $wpdb;

		if ( 'yes' == $this->subscribe2_options['show_autosub'] ) {
			if ( $this->s2_mu ) {
				$sql = "SELECT DISTINCT a.user_id FROM $wpdb->usermeta AS a INNER JOIN $wpdb->usermeta AS b WHERE a.user_id = b.user_id AND a.meta_key='" . $this->get_usermeta_keyname('s2_autosub') . "' AND a.meta_value='yes' AND b.meta_key='" . $this->get_usermeta_keyname('s2_subscribed') . "'";
			} else {
				$sql = "SELECT DISTINCT user_id FROM $wpdb->usermeta WHERE $wpdb->usermeta.meta_key='" . $this->get_usermeta_keyname('s2_autosub') . "' AND $wpdb->usermeta.meta_value='yes'";
			}
			$user_IDs = $wpdb->get_col($sql);
			if ( '' == $user_IDs ) { return; }

			foreach ( $user_IDs as $user_ID ) {
				$old_cats = $this->get_user_meta($user_ID, $this->get_usermeta_keyname('s2_subscribed'));
				if ( empty($old_cats) ) {
					$newcats = (array)$new_category;
				} else {
					$old_cats = explode(',', $old_cats);
					$newcats = array_merge($old_cats, (array)$new_category);
				}
				// add subscription to these cat IDs
				$this->update_user_meta($user_ID, $this->get_usermeta_keyname('s2_cat') . $new_category, "$new_category");
				$this->update_user_meta($user_ID, $this->get_usermeta_keyname('s2_subscribed'), implode(',', $newcats));
			}
		} elseif ( 'exclude' == $this->subscribe2_options['show_autosub'] ) {
			$excluded_cats = explode(',', $this->subscribe2_options['exclude']);
			$excluded_cats[] = $new_category;
			$this->subscribe2_options['exclude'] = implode(',', $excluded_cats);
			update_option('subscribe2_options', $this->subscribe2_options);
		}
	} // end new_category()

	function delete_category($deleted_category='') {
		global $wpdb;

		if ( $this->s2_mu ) {
			$sql = "SELECT DISTINCT a.user_id FROM $wpdb->usermeta AS a INNER JOIN $wpdb->usermeta AS b WHERE a.user_id = b.user_id AND a.meta_key='" . $this->get_usermeta_keyname('s2_cat') . "$deleted_category' AND b.meta_key='" . $this->get_usermeta_keyname('s2_subscribed') . "'";
		} else {
			$sql = "SELECT DISTINCT user_id FROM $wpdb->usermeta WHERE meta_key='" . $this->get_usermeta_keyname('s2_cat') . "$deleted_category'";
		}
		$user_IDs = $wpdb->get_col($sql);
		if ( '' == $user_IDs ) { return; }

		foreach ( $user_IDs as $user_ID ) {
			$old_cats = explode(',', $this->get_user_meta($user_ID, $this->get_usermeta_keyname('s2_subscribed')));
			if ( !is_array($old_cats) ) {
				$old_cats = array($old_cats);
			}
			// add subscription to these cat IDs
			$this->delete_user_meta($user_ID, $this->get_usermeta_keyname('s2_cat') . $deleted_category);
			$remain = array_diff($old_cats, (array)$deleted_category);
			$this->update_user_meta($user_ID, $this->get_usermeta_keyname('s2_subscribed'), implode(',', $remain));
		}
	} // end delete_category()

	/**
	Get admin data from record 1 or first user with admin rights
	*/
	function get_userdata($admin_id) {
		global $wpdb, $userdata;

		if ( is_numeric($admin_id) ) {
			$admin = get_userdata($admin_id);
		} elseif ( $admin_id == 'admin' ) {
			//ensure compatibility with < 4.16
			$admin = get_userdata('1');
		} else {
			$admin = &$userdata;
		}

		// if user record is empty grab the first admin from the database
		if ( empty($admin) ) {
			$sql = "SELECT DISTINCT(ID) FROM $wpdb->users INNER JOIN $wpdb->usermeta ON $wpdb->users.ID = $wpdb->usermeta.user_id WHERE $wpdb->usermeta.meta_key='" . $wpdb->prefix . "user_level' AND $wpdb->usermeta.meta_value IN (8, 9, 10) LIMIT 1";
			$admin = get_userdata($wpdb->get_var($sql));
		}

		// handle issues from WordPress core where user_level is not set or set low
		if ( empty($admin) ) {
			global $wp_version;
			if ( version_compare($wp_version, '3.1', '<') ) {
				// WordPress version is less than 3.1, use WP_User_Search class
				if ( !class_exists(WP_User_Search) ) {
					require(ABSPATH . 'wp-admin/includes/user.php');
					$wp_user_query = new WP_User_Search( '', '', 'administrator');
					$admins_string = implode(', ', $wp_user_query->get_results());
					$sql = "SELECT ID, display_name FROM $wpdb->users WHERE ID IN (" . $admins_string . ")";
					$admin = $wpdb->get_results($sql);
				}
			} else {
				// WordPress version is 3.1 or greater, use WP_User_Query class
				$role = array('role' => 'administrator');
				$wp_user_query = get_users( $role );
				foreach ($wp_user_query as $user) {
					$admin[] = $user;
				}
			}
			$admin = $admin[0];
		}

		return $admin;
	} //end get_userdata()

/* ===== Menus ===== */
	/**
	Our management page
	*/
	function manage_menu() {
		global $wpdb, $s2nonce;

		//Get Registered Subscribers for bulk management
		$registered = $this->get_registered();
		$all_users = $this->get_all_registered();

		// was anything POSTed ?
		if ( isset($_POST['s2_admin']) ) {
			check_admin_referer('subscribe2-manage_subscribers' . $s2nonce);
			if ( $_POST['addresses'] ) {
				$sub_error = '';
				$unsub_error = '';
				foreach ( preg_split ("|[\s,]+|", $_POST['addresses']) as $email ) {
					$email = $this->sanitize_email($email);
					if ( is_email($email) && $_POST['subscribe'] ) {
						if ( $this->is_public($email) !== false ) {
							('' == $sub_error) ? $sub_error = "$email" : $sub_error .= ", $email";
							continue;
						}
						$this->activate($email);
						$message = "<div id=\"message\" class=\"updated fade\"><p><strong>" . __('Address(es) subscribed!', 'subscribe2') . "</strong></p></div>";
					} elseif ( is_email($email) && $_POST['unsubscribe'] ) {
						if ( $this->is_public($email) === false ) {
							('' == $unsub_error) ? $unsub_error = "$email" : $unsub_error .= ", $email";
							continue;
						}
						$this->delete($email);
						$message = "<div id=\"message\" class=\"updated fade\"><p><strong>" . __('Address(es) unsubscribed!', 'subscribe2') . "</strong></p></div>";
					}
				}
				if ( $sub_error != '' ) {
					echo "<div id=\"message\" class=\"error\"><p><strong>" . __('Some emails were not processed, the following were already subscribed' , 'subscribe2') . ":<br />$sub_error</strong></p></div>";
				}
				if ( $unsub_error != '' ) {
					echo "<div id=\"message\" class=\"error\"><p><strong>" . __('Some emails were not processed, the following were not in the database' , 'subscribe2') . ":<br />$unsub_error</strong></p></div>";
				}
				echo $message;
				$_POST['what'] = 'confirmed';
			} elseif ( $_POST['process'] ) {
				if ( $_POST['delete'] ) {
					foreach ( $_POST['delete'] as $address ) {
						$this->delete($address);
					}
					echo "<div id=\"message\" class=\"updated fade\"><p><strong>" . __('Address(es) deleted!', 'subscribe2') . "</strong></p></div>";
				}
				if ( $_POST['confirm'] ) {
					foreach ( $_POST['confirm'] as $address ) {
						$this->toggle($this->sanitize_email($address));
					}
					$message = "<div id=\"message\" class=\"updated fade\"><p><strong>" . __('Status changed!', 'subscribe2') . "</strong></p></div>";
				}
				if ( $_POST['unconfirm'] ) {
					foreach ( $_POST['unconfirm'] as $address ) {
						$this->toggle($this->sanitize_email($address));
					}
					$message = "<div id=\"message\" class=\"updated fade\"><p><strong>" . __('Status changed!', 'subscribe2') . "</strong></p></div>";
				}
				echo $message;
			} elseif ( $_POST['searchterm'] ) {
				$confirmed = $this->get_public();
				$unconfirmed = $this->get_public(0);
				$subscribers = array_merge((array)$confirmed, (array)$unconfirmed, (array)$all_users);
				foreach ( $subscribers as $subscriber ) {
					if ( is_numeric(stripos($subscriber, $_POST['searchterm'])) ) {
						$result[] = $subscriber;
					}
				}
			} elseif ( $_POST['remind'] ) {
				$this->remind($_POST['reminderemails']);
				echo "<div id=\"message\" class=\"updated fade\"><p><strong>" . __('Reminder Email(s) Sent!', 'subscribe2') . "</strong></p></div>";
			} elseif ( $_POST['sub_categories'] && 'subscribe' == $_POST['manage'] ) {
				$this->subscribe_registered_users($_POST['emails'], $_POST['category']);
				echo "<div id=\"message\" class=\"updated fade\"><p><strong>" . __('Registered Users Subscribed!', 'subscribe2') . "</strong></p></div>";
			} elseif ( $_POST['sub_categories'] && 'unsubscribe' == $_POST['manage'] ) {
				$this->unsubscribe_registered_users($_POST['emails'], $_POST['category']);
				echo "<div id=\"message\" class=\"updated fade\"><p><strong>" . __('Registered Users Unsubscribed!', 'subscribe2') . "</strong></p></div>";
			} elseif ( $_POST['sub_format'] ) {
				$this->format_change( $_POST['format'], $_POST['emails'] );
				echo "<div id=\"message\" class=\"updated fade\"><p><strong>" . __('Format updated for Selected Registered Users!', 'subscribe2') . "</strong></p></div>";
			} elseif ( $_POST['sub_digest'] ) {
				$this->digest_change( $_POST['sub_category'], $_POST['emails'] );
				echo "<div id=\"message\" class=\"updated fade\"><p><strong>" . __('Digest Subscription updated for Selected Registered Users!', 'subscribe2') . "</strong></p></div>";
			}
		}

		//Get Public Subscribers once for filter
		$confirmed = $this->get_public();
		$unconfirmed = $this->get_public(0);
		// safety check for our arrays
		if ( '' == $confirmed ) { $confirmed = array(); }
		if ( '' == $unconfirmed ) { $unconfirmed = array(); }
		if ( '' == $registered ) { $registered = array(); }
		if ( '' == $all_users ) { $all_users = array(); }

		$reminderform = false;
		$urlpath = str_replace("\\", "/", S2PATH);
		$urlpath = trailingslashit(get_option('siteurl')) . substr($urlpath,strpos($urlpath, "wp-content/"));
		if ( isset($_GET['s2page']) ) {
			$page = (int) $_GET['s2page'];
		} else {
			$page = 1;
		}

		if ( isset($_POST['what']) ) {
			$page = 1;
			if ( 'all' == $_POST['what'] ) {
				$what = 'all';
				$subscribers = array_merge((array)$confirmed, (array)$unconfirmed, (array)$all_users);
			} elseif ( 'public' == $_POST['what'] ) {
				$what = 'public';
				$subscribers = array_merge((array)$confirmed, (array)$unconfirmed);
			} elseif ( 'confirmed' == $_POST['what'] ) {
				$what = 'confirmed';
				$subscribers = $confirmed;
			} elseif ( 'unconfirmed' == $_POST['what'] ) {
				$what = 'unconfirmed';
				$subscribers = $unconfirmed;
				if ( !empty($subscribers) ) {
					$reminderemails = implode(",", $subscribers);
					$reminderform = true;
				}
			} elseif ( is_numeric($_POST['what']) ) {
				$what = intval($_POST['what']);
				$subscribers = $this->get_registered("cats=$what");
			} elseif ( 'registered' == $_POST['what'] ) {
				$what = 'registered';
				$subscribers = $registered;
			} elseif ( 'all_users' == $_POST['what'] ) {
				$what = 'all_users';
				$subscribers = $all_users;
			}
		} elseif ( isset($_GET['what']) ) {
			if ( 'all' == $_GET['what'] ) {
				$what = 'all';
				$subscribers = array_merge((array)$confirmed, (array)$unconfirmed, (array)$all_users);
			} elseif ( 'public' == $_GET['what'] ) {
				$what = 'public';
				$subscribers = array_merge((array)$confirmed, (array)$unconfirmed);
			} elseif ( 'confirmed' == $_GET['what'] ) {
				$what = 'confirmed';
				$subscribers = $confirmed;
			} elseif ( 'unconfirmed' == $_GET['what'] ) {
				$what = 'unconfirmed';
				$subscribers = $unconfirmed;
				if ( !empty($subscribers) ) {
					$reminderemails = implode(",", $subscribers);
					$reminderform = true;
				}
			} elseif ( is_numeric($_GET['what']) ) {
				$what = intval($_GET['what']);
				$subscribers = $this->get_registered("cats=$what");
			} elseif ( 'registered' == $_GET['what'] ) {
				$what = 'registered';
				$subscribers = $registered;
			} elseif ( 'all_users' == $_GET['what'] ) {
				$what = 'all_users';
				$subscribers = $all_users;
			}
		} else {
			$what = 'all';
			$subscribers = array_merge((array)$confirmed, (array)$unconfirmed, (array)$all_users);
		}
		if ( $_POST['searchterm'] ) {
			$subscribers = &$result;
			$what = 'public';
		}

		if ( !empty($subscribers) ) {
			natcasesort($subscribers);
			// Displays a page number strip - adapted from code in Akismet
			$args['what'] = $what;
			$total_subscribers = count($subscribers);
			$total_pages = ceil($total_subscribers / $this->subscribe2_options['entries']);
			$strip = '';
			if ( $page > 1 ) {
				$args['s2page'] = $page - 1;
				$strip .= '<a class="prev" href="' . clean_url(add_query_arg($args)) . '">&laquo; '. __('Previous Page', 'subscribe2') .'</a>' . "\n";
			}
			if ( $total_pages > 1 ) {
				for ( $page_num = 1; $page_num <= $total_pages; $page_num++ ) {
					if ( $page == $page_num ) {
						$strip .= "<strong>Page " . $page_num . "</strong>\n";
					} else {
						if ( $page_num < 3 || ( $page_num >= $page - 2 && $page_num <= $page + 2 ) || $page_num > $total_pages - 2 ) {
							$args['s2page'] = $page_num;
							$strip .= "<a class=\"page-numbers\" href=\"" . clean_url(add_query_arg($args)) . "\">" . $page_num . "</a>\n";
							$trunc = true;
						} elseif ( $trunc == true ) {
							$strip .= "...\n";
							$trunc = false;
						}
					}
				}
			}
			if ( ( $page ) * $this->subscribe2_options['entries'] < $total_subscribers ) {
				$args['s2page'] = $page + 1;
				$strip .= "<a class=\"next\" href=\"" . clean_url(add_query_arg($args)) . "\">". __('Next Page', 'subscribe2') . " &raquo;</a>\n";
			}
		}

		// show our form
		echo "<div class=\"wrap\">";
		screen_icon();
		echo "<h2>" . __('Manage Subscribers', 'subscribe2') . "</h2>\r\n";
		echo "<form method=\"post\" action=\"\">\r\n";
		if ( function_exists('wp_nonce_field') ) {
			wp_nonce_field('subscribe2-manage_subscribers' . $s2nonce);
		}
		echo "<h2>" . __('Add/Remove Subscribers', 'subscribe2') . "</h2>\r\n";
		echo "<p>" . __('Enter addresses, one per line or comma-separated', 'subscribe2') . "<br />\r\n";
		echo "<textarea rows=\"2\" cols=\"80\" name=\"addresses\"></textarea></p>\r\n";
		echo "<input type=\"hidden\" name=\"s2_admin\" />\r\n";
		echo "<p class=\"submit\" style=\"border-top: none;\"><input type=\"submit\" class=\"button-primary\" name=\"subscribe\" value=\"" . __('Subscribe', 'subscribe2') . "\" />";
		echo "&nbsp;<input type=\"submit\" class=\"button-primary\" name=\"unsubscribe\" value=\"" . __('Unsubscribe', 'subscribe2') . "\" /></p>\r\n";

		// subscriber lists
		echo "<h2>" . __('Current Subscribers', 'subscribe2') . "</h2>\r\n";
		echo "<br />";
		$this->display_subscriber_dropdown($what, __('Filter', 'subscribe2'));
		// show the selected subscribers
		$alternate = '';
		echo "<table cellpadding=\"2\" cellspacing=\"2\" width=\"100%\">";
		$searchterm = ( $_POST['searchterm'] ) ? $_POST['searchterm'] : '';
		echo "<tr class=\"alternate\"><td width=\"50%\"><input type=\"text\" name=\"searchterm\" value=\"" . $searchterm . "\" />&nbsp;\r\n";
		echo "<input type=\"submit\" class=\"button-secondary\" name=\"search\" value=\"" . __('Search Subscribers', 'subscribe2') . "\" /></td>\r\n";
		if ( $reminderform ) {
			echo "<td width=\"25%\" align=\"right\"><input type=\"hidden\" name=\"reminderemails\" value=\"" . $reminderemails . "\" />\r\n";
			echo "<input type=\"submit\" class=\"button-secondary\" name=\"remind\" value=\"" . __('Send Reminder Email', 'subscribe2') . "\" /></td>\r\n";
		} else {
			echo "<td width=\"25%\"></td>";
		}
		if ( !empty($subscribers) ) {
			$exportcsv = implode(",\r\n", $subscribers);
			echo "<td width=\"25%\" align=\"right\"><input type=\"hidden\" name=\"exportcsv\" value=\"" . $what . "\" />\r\n";
			echo "<input type=\"submit\" class=\"button-secondary\" name=\"csv\" value=\"" . __('Save Emails to CSV File', 'subscribe2') . "\" /></td>\r\n";
		}
		echo "</tr></table>";

		echo "<table class=\"widefat\" cellpadding=\"2\" cellspacing=\"2\">";
		if ( !empty($subscribers) ) {
			echo "<tr><td colspan=\"3\" align=\"center\"><input type=\"submit\" class=\"button-secondary\" name=\"process\" value=\"" . __('Process', 'subscribe2') . "\" /></td>\r\n";
			echo "<td align=\"right\">" . $strip . "</td></tr>\r\n";
		}
		if ( !empty($subscribers) ) {
			if ( is_int($this->subscribe2_options['entries']) ) {
				$subscriber_chunks = array_chunk($subscribers, $this->subscribe2_options['entries']);
			} else {
				$subscriber_chunks = array_chunk($subscribers, 25);
			}
			$chunk = $page - 1;
			$subscribers = $subscriber_chunks[$chunk];
			echo "<tr class=\"alternate\" style=\"height:1.5em;\">\r\n";
			echo "<td width=\"4%\" align=\"center\">";
			echo "<img src=\"" . $urlpath . "include/accept.png\" alt=\"&lt;\" title=\"" . __('Confirm this email address', 'subscribe2') . "\" /></td>\r\n";
			echo "<td width=\"4%\" align=\"center\">";
			echo "<img src=\"" . $urlpath . "include/exclamation.png\" alt=\"&gt;\" title=\"" . __('Unconfirm this email address', 'subscribe2') . "\" /></td>\r\n";
			echo "<td width=\"4%\" align=\"center\">";
			echo "<img src=\"" . $urlpath . "include/cross.png\" alt=\"X\" title=\"" . __('Delete this email address', 'subscribe2') . "\" /></td><td></td></tr>\r\n";
			echo "<tr><td align=\"center\"><input type=\"checkbox\" name=\"checkall\" value=\"confirm_checkall\" /></td>\r\n";
			echo "<td align=\"center\"><input type=\"checkbox\" name=\"checkall\" value=\"unconfirm_checkall\" /></td>\r\n";
			echo "<td align=\"center\"><input type=\"checkbox\" name=\"checkall\" value=\"delete_checkall\" /></td>\r\n";
			echo "<td align=\"left\"><strong>" . __('Select / Unselect All', 'subscribe2') . "</strong></td></tr>\r\n";

			foreach ( $subscribers as $subscriber ) {
				echo "<tr class=\"$alternate\" style=\"height:1.5em;\">";
				echo "<td align=\"center\">\r\n";
				if ( in_array($subscriber, $confirmed) ) {
					echo "</td><td align=\"center\">\r\n";
					echo "<input class=\"unconfirm_checkall\" title=\"" . __('Unconfirm this email address', 'subscribe2') . "\" type=\"checkbox\" name=\"unconfirm[]\" value=\"" . $subscriber . "\" /></td>\r\n";
					echo "<td align=\"center\">\r\n";
					echo "<input class=\"delete_checkall\" title=\"" . __('Delete this email address', 'subscribe2') . "\" type=\"checkbox\" name=\"delete[]\" value=\"" . $subscriber . "\" />\r\n";
					echo "</td>\r\n";
					echo "<td><span style=\"color:#006600\">&#x221A;&nbsp;&nbsp;</span><a href=\"mailto:" . $subscriber . "\">" . $subscriber . "</a>\r\n";
					echo "(<span style=\"color:#006600\"><abbr title=\"" . $this->signup_ip($subscriber) . "\">" . $this->signup_date($subscriber) . "</abbr></span>)\r\n";
				} elseif ( in_array($subscriber, $unconfirmed) ) {
					echo "<input class=\"confirm_checkall\" title=\"" . __('Confirm this email address', 'subscribe2') . "\" type=\"checkbox\" name=\"confirm[]\" value=\"" . $subscriber . "\" /></td>\r\n";
					echo "<td align=\"center\"></td>\r\n";
					echo "<td align=\"center\">\r\n";
					echo "<input class=\"delete_checkall\" title=\"" . __('Delete this email address', 'subscribe2') . "\" type=\"checkbox\" name=\"delete[]\" value=\"" . $subscriber . "\" />\r\n";
					echo "</td>\r\n";
					echo "<td><span style=\"color:#FF0000\">&nbsp;!&nbsp;&nbsp;&nbsp;</span><a href=\"mailto:" . $subscriber . "\">" . $subscriber . "</a>\r\n";
					echo "(<span style=\"color:#FF0000\"><abbr title=\"" . $this->signup_ip($subscriber) . "\">" . $this->signup_date($subscriber) . "</abbr></span>)\r\n";
				} elseif ( in_array($subscriber, $all_users) ) {
					echo "</td><td align=\"center\"></td><td align=\"center\"></td>\r\n";
					echo "<td><span style=\"color:#006600\">&reg;&nbsp;&nbsp;</span><a href=\"mailto:" . $subscriber . "\">" . $subscriber . "</a>\r\n";
					echo "(<a href=\"" . get_option('siteurl') . "/wp-admin/users.php?page=s2_users&amp;email=" . urlencode($subscriber) . "\">" . __('edit', 'subscribe2') . "</a>)\r\n";
				}
				echo "</td></tr>\r\n";
				('alternate' == $alternate) ? $alternate = '' : $alternate = 'alternate';
			}
		} else {
			if ( $_POST['searchterm'] ) {
				echo "<tr><td align=\"center\"><b>" . __('No matching subscribers found', 'subscribe2') . "</b></td></tr>\r\n";
			} else {
				echo "<tr><td align=\"center\"><b>" . __('NONE', 'subscribe2') . "</b></td></tr>\r\n";
			}
		}
		if ( !empty($subscribers) ) {
			echo "<tr><td colspan=\"3\" align=\"center\"><input type=\"submit\" class=\"button-secondary\" name=\"process\" value=\"" . __('Process', 'subscribe2') . "\" /></td>\r\n";
			echo "<td align=\"right\">" . $strip . "</td></tr>\r\n";
		}
		echo "</table>\r\n";

		// show bulk managment form if filtered in some Registered Users
		if ( in_array($what, array('registered', 'all_users')) || is_numeric($what) ) {
			$subscribers_string = implode(',', $subscribers);
			echo "<h2>" . __('Bulk Management', 'subscribe2') . "</h2>\r\n";
			if ( $this->subscribe2_options['email_freq'] == 'never' ) {
				echo __('Preferences for Registered Users selected in the filter above can be changed using this section.', 'subscribe2') . "<br />\r\n";
				echo "<strong><em style=\"color: red\">" . __('Consider User Privacy as changes cannot be undone', 'subscribe2') . "</em></strong><br />\r\n";
				echo "<br />" . __('Action to perform', 'subscribe2') . ":\r\n";
				echo "<label><input type=\"radio\" name=\"manage\" value=\"subscribe\" checked=\"checked\" /> " . __('Subscribe', 'subscribe2') . "</label>&nbsp;&nbsp;\r\n";
				echo "<label><input type=\"radio\" name=\"manage\" value=\"unsubscribe\" /> " . __('Unsubscribe', 'subscribe2') . "</label><br /><br />\r\n";
				echo "<input type=\"hidden\" name=\"emails\" value=\"$subscribers_string\" />\r\n";
				$this->display_category_form();
				echo "<p class=\"submit\"><input type=\"submit\" class=\"button-primary\" name=\"sub_categories\" value=\"" . __('Bulk Update Categories', 'subscribe2') . "\" /></p>";

				echo "<br />" . __('Send email as', 'subscribe2') . ":\r\n";
				echo "<label><input type=\"radio\" name=\"format\" value=\"html\" /> " . __('HTML - Full', 'subscribe2') . "</label>&nbsp;&nbsp;\r\n";
				echo "<label><input type=\"radio\" name=\"format\" value=\"html_excerpt\" /> " . __('HTML - Excerpt', 'subscribe2') . "</label>&nbsp;&nbsp;\r\n";
				echo "<label><input type=\"radio\" name=\"format\" value=\"post\" /> " . __('Plain Text - Full', 'subscribe2') . "</label>&nbsp;&nbsp;\r\n";
				echo "<label><input type=\"radio\" name=\"format\" value=\"excerpt\" checked=\"checked\" /> " . __('Plain Text - Excerpt', 'subscribe2') . "</label>\r\n";
				echo "<p class=\"submit\"><input type=\"submit\" class=\"button-primary\" name=\"sub_format\" value=\"" . __('Bulk Update Format', 'subscribe2') . "\" /></p>";
			} else {
				echo __('Preferences for Registered Users selected in the filter above can be changed using this section.', 'subscribe2') . "<br />\r\n";
				echo "<strong><em style=\"color: red\">" . __('Consider User Privacy as changes cannot be undone', 'subscribe2') . "</em></strong><br />\r\n";
				echo "<br />" . __('Subscribe Selected Users to recieve a periodic digest notification', 'subscribe2') . ":\r\n";
				echo "<label><input type=\"radio\" name=\"sub_category\" value=\"digest\" checked=\"checked\" /> ";
				echo __('Yes', 'subscribe2') . "</label>&nbsp;&nbsp;\r\n";
				echo "<label><input type=\"radio\" name=\"sub_category\" value=\"-1\" /> ";
				echo __('No', 'subscribe2') . "</label>";
				echo "<input type=\"hidden\" name=\"emails\" value=\"$subscribers_string\" />\r\n";
				echo "<p class=\"submit\"><input type=\"submit\" class=\"button-primary\" name=\"sub_digest\" value=\"" . __('Bulk Update Digest Subscription', 'subscribe2') . "\" /></p>";
			}
		}
		echo "</form></div>\r\n";

		include(ABSPATH . 'wp-admin/admin-footer.php');
		// just to be sure
		die;
	} // end manage_menu()

	/**
	Our options page
	*/
	function options_menu() {
		global $s2nonce, $wpdb, $wp_version;

		// send error message if no WordPress page exists
		$sql = "SELECT ID FROM $wpdb->posts WHERE post_type='page' AND post_status='publish' LIMIT 1";
		$id = $wpdb->get_var($sql);
		if ( empty($id) ) {
			echo "<div id=\"message\" class=\"error\"><p><strong>$this->no_page</strong></p></div>";
		}

		// was anything POSTed?
		if ( isset( $_POST['s2_admin']) ) {
			check_admin_referer('subscribe2-options_subscribers' . $s2nonce);
			if ( $_POST['reset'] ) {
				$this->reset();
				echo "<div id=\"message\" class=\"updated fade\"><p><strong>$this->options_reset</strong></p></div>";
			} elseif ( $_POST['preview'] ) {
				global $user_email;
				$this->preview_email = true;
				if ( 'never' == $this->subscribe2_options['email_freq'] ) {
					$post = get_posts('numberposts=1');
					$this->publish($post[0], $user_email);
				} else {
					$this->subscribe2_cron($user_email);
				}
				echo "<div id=\"message\" class=\"updated fade\"><p><strong>" . __('Preview message(s) sent to logged in user', 'subscribe2') . "</strong></p></div>";
			} elseif ( $_POST['resend'] ) {
				$status = $this->subscribe2_cron('', 'resend');
				if ( $status === false ) {
					echo "<div id=\"message\" class=\"updated fade\"><p><strong>" . __('The Digest Notification email contained no post information. No email was sent', 'subscribe2') . "</strong></p></div>";
				} else {
					echo "<div id=\"message\" class=\"updated fade\"><p><strong>" . __('Attempt made to resend the Digest Notification email', 'subscribe2') . "</strong></p></div>";
				}
			} elseif ( $_POST['submit'] ) {
				// BCClimit
				if ( is_numeric($_POST['bcc']) && $_POST['bcc'] >= 0 ) {
					$this->subscribe2_options['bcclimit'] = $_POST['bcc'];
				}
				// admin_email
				$this->subscribe2_options['admin_email'] = $_POST['admin_email'];

				// send as blogname, author or admin?
				if ( is_numeric($_POST['sender']) ) {
					$sender = $_POST['sender'];
				} elseif ($_POST['sender'] == 'author') {
					$sender = 'author';
				} else {
					$sender = 'blogname';
				}
				$this->subscribe2_options['sender'] = $sender;

				// send email for pages, private and password protected posts
				$this->subscribe2_options['stylesheet'] = $_POST['stylesheet'];
				$this->subscribe2_options['pages'] = $_POST['pages'];
				$this->subscribe2_options['password'] = $_POST['password'];
				$this->subscribe2_options['private'] = $_POST['private'];
				$this->subscribe2_options['cron_order'] = $_POST['cron_order'];

				// send per-post or digest emails
				$email_freq = $_POST['email_freq'];
				$scheduled_time = wp_next_scheduled('s2_digest_cron');
				if ( $email_freq != $this->subscribe2_options['email_freq'] || $_POST['hour'] != date('H', $scheduled_time) ) {
					// make sure the timezone strings are right
					if ( function_exists('date_default_timezone_get') && date_default_timezone_get() != get_option('timezone_string') ) {
						date_default_timezone_set(get_option('timezone_string'));
					}
					$this->subscribe2_options['email_freq'] = $email_freq;
					wp_clear_scheduled_hook('s2_digest_cron');
					$scheds = (array)wp_get_schedules();
					$interval = ( isset($scheds[$email_freq]['interval']) ) ? (int) $scheds[$email_freq]['interval'] : 0;
					if ( $interval == 0 ) {
						// if we are on per-post emails remove last_cron entry
						unset($this->subscribe2_options['last_s2cron']);
						unset($this->subscribe2_options['previous_s2cron']);
					} else {
						// if we are using digest schedule the event and prime last_cron as now
						$time = time() + $interval;
						if ( $interval < 86400 ) {
							// Schedule CRON events occurring less than daily starting now and periodically thereafter
							$maybe_time = mktime($_POST['hour'], 0, 0, date('m', time()), date('d', time()), date('Y', time()));
							// is maybe_time in the future
							$offset = $maybe_time - time();
							// is maybe_time + $interval in the future
							$offset2 = ($maybe_time + $interval) - time();
							if ( $offset < 0 ) {
								if ( $offset2 < 0 ) {
									$timestamp = &$time;
								} else {
									$timestamp = $maybe_time + $interval;
								}
							} else {
								$timestamp = &$maybe_time;
							}
						} else {
							// Schedule other CRON events starting at user defined hour and periodically thereafter
							$timestamp = mktime($_POST['hour'], 0, 0, date('m', $time), date('d', $time), date('Y', $time));
						}
						wp_schedule_event($timestamp, $email_freq, 's2_digest_cron');
						if ( !isset($this->subscribe2_options['last_s2cron']) ) {
							$this->subscribe2_options['last_s2cron'] = current_time('mysql');
						}
					}
				}

				// email subject and body templates
				// ensure that are not empty before updating
				if ( !empty($_POST['notification_subject']) ) {
					$this->subscribe2_options['notification_subject'] = $_POST['notification_subject'];
				}
				if ( !empty($_POST['mailtext']) ) {
					$this->subscribe2_options['mailtext'] = $_POST['mailtext'];
				}
				if ( !empty($_POST['confirm_subject']) ) {
					$this->subscribe2_options['confirm_subject'] = $_POST['confirm_subject'];
				}
				if ( !empty($_POST['confirm_email']) ) {
					$this->subscribe2_options['confirm_email'] = $_POST['confirm_email'];
				}
				if ( !empty($_POST['remind_subject']) ) {
					$this->subscribe2_options['remind_subject'] = $_POST['remind_subject'];
				}
				if ( !empty($_POST['remind_email']) ) {
					$this->subscribe2_options['remind_email'] = $_POST['remind_email'];
				}

				// excluded categories
				if ( !empty($_POST['category']) ) {
					sort($_POST['category']);
					$exclude_cats = implode(',', $_POST['category']);
				} else {
					$exclude_cats = '';
				}
				$this->subscribe2_options['exclude'] = $exclude_cats;
				// allow override?
				( isset($_POST['reg_override']) ) ? $override = '1' : $override = '0';
				$this->subscribe2_options['reg_override'] = $override;

				// default WordPress page where Subscribe2 token is placed
				if ( is_numeric($_POST['page']) && $_POST['page'] >= 0 ) {
					$this->subscribe2_options['s2page'] = $_POST['page'];
				}

				// Number of subscriber per page
				if ( is_numeric($_POST['entries']) && $_POST['entries'] > 0 ) {
					$this->subscribe2_options['entries'] = (int)$_POST['entries'];
				}

				// show meta link?
				( $_POST['show_meta'] == '1' ) ? $showmeta = '1' : $showmeta = '0';
				$this->subscribe2_options['show_meta'] = $showmeta;

				// show button?
				( $_POST['show_button'] == '1' ) ? $showbutton = '1' : $showbutton = '0';
				$this->subscribe2_options['show_button'] = $showbutton;

				// show widget in Presentation->Widgets
				( $_POST['widget'] == '1' ) ? $showwidget = '1' : $showwidget = '0';
				$this->subscribe2_options['widget'] = $showwidget;

				// show counterwidget in Presentation->Widgets
				( $_POST['counterwidget'] == '1' ) ? $showcounterwidget = '1' : $showcounterwidget = '0';
				$this->subscribe2_options['counterwidget'] = $showcounterwidget;

				// Subscribe2 over ride postmeta checked by default
				( $_POST['s2meta_default'] == '1' ) ? $s2meta_default = '1' : $s2meta_default = '0';
				$this->subscribe2_options['s2meta_default'] = $s2meta_default;

				//automatic subscription
				$this->subscribe2_options['autosub'] = $_POST['autosub'];
				$this->subscribe2_options['newreg_override'] = $_POST['newreg_override'];
				$this->subscribe2_options['wpregdef'] = $_POST['wpregdef'];
				$this->subscribe2_options['autoformat'] = $_POST['autoformat'];
				$this->subscribe2_options['show_autosub'] = $_POST['show_autosub'];
				$this->subscribe2_options['autosub_def'] = $_POST['autosub_def'];
				$this->subscribe2_options['comment_subs'] = $_POST['comment_subs'];

				//barred domains
				$this->subscribe2_options['barred'] = $_POST['barred'];

				echo "<div id=\"message\" class=\"updated fade\"><p><strong>$this->options_saved</strong></p></div>";
				update_option('subscribe2_options', $this->subscribe2_options);
			}
		}
		// show our form
		echo "<div class=\"wrap\">";
		screen_icon();
		echo "<h2>" . __('Subscribe2 Settings', 'subscribe2') . "</h2>\r\n";
		echo "<a href=\"http://subscribe2.wordpress.com/\">" . __('Plugin Blog', 'subscribe2') . "</a> | ";
		echo "<a href=\"https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&amp;hosted_button_id=2387904\">" . __('Make a donation via PayPal', 'subscribe2') . "</a>";
		echo "<form method=\"post\" action=\"\">\r\n";
		if ( function_exists('wp_nonce_field') ) {
			wp_nonce_field('subscribe2-options_subscribers' . $s2nonce);
		}
		echo "<input type=\"hidden\" name=\"s2_admin\" value=\"options\" />\r\n";
		echo "<input type=\"hidden\" id=\"jsbcc\" value=\"" . $this->subscribe2_options['bcclimit'] . "\" />";
		echo "<input type=\"hidden\" id=\"jspage\" value=\"" . $this->subscribe2_options['s2page'] . "\" />";
		echo "<input type=\"hidden\" id=\"jsentries\" value=\"" . $this->subscribe2_options['entries'] . "\" />";

		// settings for outgoing emails
		echo "<h2>" . __('Notification Settings', 'subscribe2') . "</h2>\r\n";
		echo __('Restrict the number of recipients per email to (0 for unlimited)', 'subscribe2') . ': ';
		echo "<span id=\"s2bcc_1\"><span id=\"s2bcc\" style=\"background-color: #FFFBCC\">" . $this->subscribe2_options['bcclimit'] . "</span> ";
		echo "<a href=\"#\" onclick=\"s2_show('bcc'); return false;\">" . __('Edit', 'subscribe2') . "</a></span>\n";
		echo "<span id=\"s2bcc_2\">\r\n";
		echo "<input type=\"text\" name=\"bcc\" value=\"" . $this->subscribe2_options['bcclimit'] . "\" size=\"3\" />\r\n";
		echo "<a href=\"#\" onclick=\"s2_update('bcc'); return false;\">". __('Update', 'subscribe2') . "</a>\n";
		echo "<a href=\"#\" onclick=\"s2_revert('bcc'); return false;\">". __('Revert', 'subscribe2') . "</a></span>\n";

		echo "<br /><br />" . __('Send Admins notifications for new', 'subscribe2') . ': ';
		echo "<label><input type=\"radio\" name=\"admin_email\" value=\"subs\"";
		if ( 'subs' == $this->subscribe2_options['admin_email'] ) {
			echo " checked=\"checked\"";
		}
		echo " /> " . __('Subscriptions', 'subscribe2') . "</label>&nbsp;&nbsp;";
		echo "<label><input type=\"radio\" name=\"admin_email\" value=\"unsubs\"";
		if ( 'unsubs' == $this->subscribe2_options['admin_email'] ) {
			echo " checked=\"checked\"";
		}
		echo " /> " . __('Unsubscriptions', 'subscribe2') . "</label>&nbsp;&nbsp;";
		echo "<label><input type=\"radio\" name=\"admin_email\" value=\"both\"";
		if ( 'both' == $this->subscribe2_options['admin_email'] ) {
			echo " checked=\"checked\"";
		}
		echo " /> " . __('Both', 'subscribe2') . "</label>&nbsp;&nbsp;";
		echo "<label><input type=\"radio\" name=\"admin_email\" value=\"none\"";
		if ( 'none' == $this->subscribe2_options['admin_email'] ) {
			echo " checked=\"checked\"";
		}
		echo " /> " . __('Neither', 'subscribe2') . "</label><br /><br />\r\n";

		echo __('Include theme CSS stylesheet in HTML notifications', 'subscribe2') . ': ';
		echo "<label><input type=\"radio\" name=\"stylesheet\" value=\"yes\"";
		if ( 'yes' == $this->subscribe2_options['stylesheet'] ) {
			echo " checked=\"checked\"";
		}
		echo " /> " . __('Yes', 'subscribe2') . "</label>&nbsp;&nbsp;";
		echo "<label><input type=\"radio\" name=\"stylesheet\" value=\"no\"";
		if ( 'no' == $this->subscribe2_options['stylesheet'] ) {
			echo " checked=\"checked\"";
		}
		echo " /> " . __('No', 'subscribe2') . "</label><br /><br />\r\n";

		echo __('Send Emails for Pages', 'subscribe2') . ': ';
		echo "<label><input type=\"radio\" name=\"pages\" value=\"yes\"";
		if ( 'yes' == $this->subscribe2_options['pages'] ) {
			echo " checked=\"checked\"";
		}
		echo " /> " . __('Yes', 'subscribe2') . "</label>&nbsp;&nbsp;";
		echo "<label><input type=\"radio\" name=\"pages\" value=\"no\"";
		if ( 'no' == $this->subscribe2_options['pages'] ) {
			echo " checked=\"checked\"";
		}
		echo " /> " . __('No', 'subscribe2') . "</label><br /><br />\r\n";
		echo __('Send Emails for Password Protected Posts', 'subscribe2') . ': ';
		echo "<label><input type=\"radio\" name=\"password\" value=\"yes\"";
		if ( 'yes' == $this->subscribe2_options['password'] ) {
			echo " checked=\"checked\"";
		}
		echo " /> " . __('Yes', 'subscribe2') . "</label>&nbsp;&nbsp;";
		echo "<label><input type=\"radio\" name=\"password\" value=\"no\"";
		if ( 'no' == $this->subscribe2_options['password'] ) {
			echo " checked=\"checked\"";
		}
		echo " /> " . __('No', 'subscribe2') . "</label><br /><br />\r\n";
		echo __('Send Emails for Private Posts', 'subscribe2') . ': ';
		echo "<label><input type=\"radio\" name=\"private\" value=\"yes\"";
		if ( 'yes' == $this->subscribe2_options['private'] ) {
			echo " checked=\"checked\"";
		}
		echo " /> " . __('Yes', 'subscribe2') . "</label>&nbsp;&nbsp;";
		echo "<label><input type=\"radio\" name=\"private\" value=\"no\"";
		if ( 'no' == $this->subscribe2_options['private'] ) {
			echo " checked=\"checked\"";
		}
		echo " /> " . __('No', 'subscribe2') . "</label><br /><br />\r\n";
		echo __('Send Email From', 'subscribe2') . ': ';
		echo "<label>\r\n";
		$this->admin_dropdown(true);
		echo "</label><br /><br />\r\n";
		if ( function_exists('wp_schedule_event') ) {
			echo __('Send Emails', 'subscribe2') . ": <br /><br />\r\n";
			$this->display_digest_choices();
			echo __('For digest notifications, date order for posts is', 'subscribe2') . ": \r\n";
			echo "<label><input type=\"radio\" name=\"cron_order\" value=\"desc\"";
			if ( 'desc' == $this->subscribe2_options['cron_order'] ) {
				echo " checked=\"checked\"";
			}
			echo " /> " . __('Descending', 'subscribe2') . "</label>&nbsp;&nbsp;";
			echo "<label><input type=\"radio\" name=\"cron_order\" value=\"asc\"";
			if ( 'asc' == $this->subscribe2_options['cron_order'] ) {
				echo " checked=\"checked\"";
			}
			echo " /> " . __('Ascending', 'subscribe2') . "</label><br /><br />\r\n";
		}

		// email templates
		echo "<h2>" . __('Email Templates', 'subscribe2') . "</h2>\r\n";
		echo"<br />";
		echo "<table width=\"100%\" cellspacing=\"2\" cellpadding=\"1\" class=\"editform\">\r\n";
		echo "<tr><td>";
		echo __('New Post email (must not be empty)', 'subscribe2') . ":<br />\r\n";
		echo __('Subject Line', 'subscribe2') . ": ";
		echo "<input type=\"text\" name=\"notification_subject\" value=\"" . stripslashes($this->subscribe2_options['notification_subject']) . "\" size=\"30\" />";
		echo "<br />\r\n";
		echo "<textarea rows=\"9\" cols=\"60\" name=\"mailtext\">" . stripslashes($this->subscribe2_options['mailtext']) . "</textarea><br /><br />\r\n";
		echo "</td><td valign=\"top\" rowspan=\"3\">";
		echo "<p class=\"submit\"><input type=\"submit\" class=\"button-secondary\" name=\"preview\" value=\"" . __('Send Email Preview', 'subscribe2') . "\" /></p>\r\n";
		echo "<h3>" . __('Message substitutions', 'subscribe2') . "</h3>\r\n";
		echo "<dl>";
		echo "<dt><b><em style=\"color: red\">" . __('IF THE FOLLOWING KEYWORDS ARE ALSO IN YOUR POST THEY WILL BE SUBSTITUTED' ,'subscribe2') . "</em></b></dt><dd></dd>\r\n";
		echo "<dt><b>{BLOGNAME}</b></dt><dd>" . get_option('blogname') . "</dd>\r\n";
		echo "<dt><b>{BLOGLINK}</b></dt><dd>" . get_option('home') . "</dd>\r\n";
		echo "<dt><b>{TITLE}</b></dt><dd>" . __("the post's title<br />(<i>for per-post emails only</i>)", 'subscribe2') . "</dd>\r\n";
		echo "<dt><b>{POST}</b></dt><dd>" . __("the excerpt or the entire post<br />(<i>based on the subscriber's preferences</i>)", 'subscribe2') . "</dd>\r\n";
		echo "<dt><b>{POSTTIME}</b></dt><dd>" . __("the excerpt of the post and the time it was posted<br />(<i>for digest emails only</i>)", 'subscribe2') . "</dd>\r\n";
		echo "<dt><b>{TABLE}</b></dt><dd>" . __("a list of post titles<br />(<i>for digest emails only</i>)", 'subscribe2') . "</dd>\r\n";
		echo "<dt><b>{TABLELINKS}</b></dt><dd>" . __("a list of post titles followed by links to the atricles<br />(<i>for digest emails only</i>)", 'subscribe2') . "</dd>\r\n";
		echo "<dt><b>{PERMALINK}</b></dt><dd>" . __("the post's permalink<br />(<i>for per-post emails only</i>)", 'subscribe2') . "</dd>\r\n";
		echo "<dt><b>{TINYLINK}</b></dt><dd>" . __("the post's permalink after conversion by TinyURL<br />(<i>for per-post emails only</i>)", 'subscribe2') . "</dd>\r\n";
		echo "<dt><b>{DATE}</b></dt><dd>" . __("the date the post was made<br />(<i>for per-post emails only</i>)", "subscribe2") . "</dd>\r\n";
		echo "<dt><b>{TIME}</b></dt><dd>" . __("the time the post was made<br />(<i>for per-post emails only</i>)", "subscribe2") . "</dd>\r\n";
		echo "<dt><b>{MYNAME}</b></dt><dd>" . __("the admin or post author's name", 'subscribe2') . "</dd>\r\n";
		echo "<dt><b>{EMAIL}</b></dt><dd>" . __("the admin or post author's email", 'subscribe2') . "</dd>\r\n";
		echo "<dt><b>{AUTHORNAME}</b></dt><dd>" . __("the post author's name", 'subscribe2') . "</dd>\r\n";
		echo "<dt><b>{LINK}</b></dt><dd>" . __("the generated link to confirm a request<br />(<i>only used in the confirmation email template</i>)", 'subscribe2') . "</dd>\r\n";
		echo "<dt><b>{ACTION}</b></dt><dd>" . __("Action performed by LINK in confirmation email<br />(<i>only used in the confirmation email template</i>)", 'subscribe2') . "</dd>\r\n";
		echo "<dt><b>{CATS}</b></dt><dd>" . __("the post's assigned categories", 'subscribe2') . "</dd>\r\n";
		echo "<dt><b>{TAGS}</b></dt><dd>" . __("the post's assigned Tags", 'subscribe2') . "</dd>\r\n";
		echo "<dt><b>{COUNT}</b></dt><dd>" . __("the number of posts included in the digest email<br />(<i>for digest emails only</i>)", 'subscribe2') . "</dd>\r\n";
		echo "</dl></td></tr><tr><td>";
		echo __('Subscribe / Unsubscribe confirmation email', 'subscribe2') . ":<br />\r\n";
		echo __('Subject Line', 'subscribe2') . ": ";
		echo "<input type=\"text\" name=\"confirm_subject\" value=\"" . stripslashes($this->subscribe2_options['confirm_subject']) . "\" size=\"30\" /><br />\r\n";
		echo "<textarea rows=\"9\" cols=\"60\" name=\"confirm_email\">" . stripslashes($this->subscribe2_options['confirm_email']) . "</textarea><br /><br />\r\n";
		echo "</td></tr><tr valign=\"top\"><td>";
		echo __('Reminder email to Unconfirmed Subscribers', 'subscribe2') . ":<br />\r\n";
		echo __('Subject Line', 'subscribe2') . ": ";
		echo "<input type=\"text\" name=\"remind_subject\" value=\"" . stripslashes($this->subscribe2_options['remind_subject']) . "\" size=\"30\" /><br />\r\n";
		echo "<textarea rows=\"9\" cols=\"60\" name=\"remind_email\">" . stripslashes($this->subscribe2_options['remind_email']) . "</textarea><br /><br />\r\n";
		echo "</td></tr></table><br />\r\n";

		// excluded categories
		echo "<h2>" . __('Excluded Categories', 'subscribe2') . "</h2>\r\n";
		echo"<p>";
		echo "<strong><em style=\"color: red\">" . __('Posts assigned to any Excluded Category do not generate notifications and are not included in digest notifications', 'subscribe2') . "</em></strong><br />\r\n";
		echo"</p>";
		$this->display_category_form(explode(',', $this->subscribe2_options['exclude']));
		echo "<center><label><input type=\"checkbox\" name=\"reg_override\" value=\"1\"";
		if ( '1' == $this->subscribe2_options['reg_override'] ) {
			echo " checked=\"checked\"";
		}
		echo " /> " . __('Allow registered users to subscribe to excluded categories?', 'subscribe2') . "</label></center><br />\r\n";

		// Appearance options
		echo "<h2>" . __('Appearance', 'subscribe2') . "</h2>\r\n";
		echo"<p>";

		// WordPress page ID where subscribe2 token is used
		echo __('Set default Subscribe2 page as ID', 'subscribe2') . ': ';
		echo "<select name=\"page\">\r\n";
		$this->pages_dropdown($this->subscribe2_options['s2page']);
		echo "</select>\r\n";

		// Number of subscribers per page
		echo "<br /><br />" . __('Set the number of Subscribers displayed per page', 'subscribe2') . ': ';
		echo "<span id=\"s2entries_1\"><span id=\"s2entries\" style=\"background-color: #FFFBCC\">" . $this->subscribe2_options['entries'] . "</span> ";
		echo "<a href=\"#\" onclick=\"s2_show('entries'); return false;\">" . __('Edit', 'subscribe2') . "</a></span>\n";
		echo "<span id=\"s2entries_2\">\r\n";
		echo "<input type=\"text\" name=\"entries\" value=\"" . $this->subscribe2_options['entries'] . "\" size=\"3\" />\r\n";
		echo "<a href=\"#\" onclick=\"s2_update('entries'); return false;\">". __('Update', 'subscribe2') . "</a>\n";
		echo "<a href=\"#\" onclick=\"s2_revert('entries'); return false;\">". __('Revert', 'subscribe2') . "</a></span>\n";

		// show link to WordPress page in meta
		echo "<br /><br /><label><input type=\"checkbox\" name=\"show_meta\" value=\"1\"";
		if ( '1' == $this->subscribe2_options['show_meta'] ) {
			echo " checked=\"checked\"";
		}
		echo " /> " . __('Show a link to your subscription page in "meta"?', 'subscribe2') . "</label><br /><br />\r\n";

		// show QuickTag button
		echo "<label><input type=\"checkbox\" name=\"show_button\" value=\"1\"";
		if ( '1' == $this->subscribe2_options['show_button'] ) {
			echo " checked=\"checked\"";
		}
		echo " /> " . __('Show the Subscribe2 button on the Write toolbar?', 'subscribe2') . "</label><br /><br />\r\n";

		// show Widget
		echo "<label><input type=\"checkbox\" name=\"widget\" value=\"1\"";
		if ( '1' == $this->subscribe2_options['widget'] ) {
			echo " checked=\"checked\"";
		}
		echo " /> " . __('Enable Subscribe2 Widget?', 'subscribe2') . "</label><br /><br />\r\n";

		// show Counter Widget
		echo "<label><input type=\"checkbox\" name=\"counterwidget\" value=\"1\"";
		if ( '1' == $this->subscribe2_options['counterwidget'] ) {
			echo " checked=\"checked\"";
		}
		echo " /> " . __('Enable Subscribe2 Counter Widget?', 'subscribe2') . "</label><br /><br />\r\n";

		// s2_meta checked by default
		echo "<label><input type =\"checkbox\" name=\"s2meta_default\" value=\"1\"";
		if ( "1" == $this->subscribe2_options['s2meta_default'] ) {
			echo " checked=\"checked\"";
		}
		echo " /> " . __('Disable email notifications is checked by default on authoring pages?', 'subscribe2') . "</label>\r\n";
		echo "</p>";

		//Auto Subscription for new registrations
		echo "<h2>" . __('Auto Subscribe', 'subscribe2') . "</h2>\r\n";
		echo"<p>";
		echo __('Subscribe new users registering with your blog', 'subscribe2') . ":<br />\r\n";
		echo "<label><input type=\"radio\" name=\"autosub\" value=\"yes\"";
		if ( 'yes' == $this->subscribe2_options['autosub'] ) {
			echo " checked=\"checked\"";
		}
		echo " /> " . __('Automatically', 'subscribe2') . "</label>&nbsp;&nbsp;";
		echo "<label><input type=\"radio\" name=\"autosub\" value=\"wpreg\"";
		if ( 'wpreg' == $this->subscribe2_options['autosub'] ) {
			echo " checked=\"checked\"";
		}
		echo " /> " . __('Display option on Registration Form', 'subscribe2') . "</label>&nbsp;&nbsp;";
		echo "<label><input type=\"radio\" name=\"autosub\" value=\"no\"";
		if ( 'no' == $this->subscribe2_options['autosub'] ) {
			echo " checked=\"checked\"";
		}
		echo " /> " . __('No', 'subscribe2') . "</label><br /><br />\r\n";
		echo __('Auto-subscribe includes any excluded categories', 'subscribe2') . ":<br />\r\n";
		echo "<label><input type=\"radio\" name=\"newreg_override\" value=\"yes\"";
		if ( 'yes' == $this->subscribe2_options['newreg_override'] ) {
			echo " checked=\"checked\"";
		}
		echo " /> " . __('Yes', 'subscribe2') . "</label>&nbsp;&nbsp;";
		echo "<label><input type=\"radio\" name=\"newreg_override\" value=\"no\"";
		if ( 'no' == $this->subscribe2_options['newreg_override'] ) {
			echo " checked=\"checked\"";
		}
		echo " /> " . __('No', 'subscribe2') . "</label><br /><br />\r\n";
		echo __('Registration Form option is checked by default', 'subscribe2') . ":<br />\r\n";
		echo "<label><input type=\"radio\" name=\"wpregdef\" value=\"yes\"";
		if ( 'yes' == $this->subscribe2_options['wpregdef'] ) {
			echo " checked=\"checked\"";
		}
		echo " /> " . __('Yes', 'subscribe2') . "</label>&nbsp;&nbsp;";
		echo "<label><input type=\"radio\" name=\"wpregdef\" value=\"no\"";
		if ( 'no' == $this->subscribe2_options['wpregdef'] ) {
			echo " checked=\"checked\"";
		}
		echo " /> " . __('No', 'subscribe2') . "</label><br /><br />\r\n";
		echo __('Auto-subscribe users to receive email as', 'subscribe2') . ": <br />\r\n";
		echo "<label><input type=\"radio\" name=\"autoformat\" value=\"html\"";
		if ( 'html' == $this->subscribe2_options['autoformat'] ) {
			echo "checked=\"checked\" ";
		}
		echo "/> " . __('HTML - Full', 'subscribe2') ."</label>&nbsp;&nbsp;";
		echo "<label><input type=\"radio\" name=\"autoformat\" value=\"html_excerpt\"";
		if ( 'html_excerpt' == $this->subscribe2_options['autoformat'] ) {
			echo "checked=\"checked\" ";
		}
		echo "/> " . __('HTML - Excerpt', 'subscribe2') ."</label>&nbsp;&nbsp;";
		echo "<label><input type=\"radio\" name=\"autoformat\" value=\"post\" ";
		if ( 'post' == $this->subscribe2_options['autoformat'] ) {
			echo "checked=\"checked\" ";
		}
		echo "/> " . __('Plain Text - Full', 'subscribe2') . "</label>&nbsp;&nbsp;";
		echo "<label><input type=\"radio\" name=\"autoformat\" value=\"excerpt\" ";
		if ( 'excerpt' == $this->subscribe2_options['autoformat'] ) {
			echo "checked=\"checked\" ";
		}
		echo "/> " . __('Plain Text - Excerpt', 'subscribe2') . "</label><br /><br />";
		echo __('Registered Users have the option to auto-subscribe to new categories', 'subscribe2') . ": <br />\r\n";
		echo "<label><input type=\"radio\" name=\"show_autosub\" value=\"yes\"";
		if ( 'yes' == $this->subscribe2_options['show_autosub'] ) {
			echo " checked=\"checked\"";
		}
		echo " /> " . __('Yes', 'subscribe2') . "</label>&nbsp;&nbsp;";
		echo "<label><input type=\"radio\" name=\"show_autosub\" value=\"no\"";
		if ( 'no' == $this->subscribe2_options['show_autosub'] ) {
			echo " checked=\"checked\"";
		}
		echo " /> " . __('No', 'subscribe2') . "</label>&nbsp;&nbsp;";
		echo "<label><input type=\"radio\" name=\"show_autosub\" value=\"exclude\"";
		if ( 'exclude' == $this->subscribe2_options['show_autosub'] ) {
			echo " checked=\"checked\"";
		}
		echo " /> " .__('New categories are immediately excluded', 'subscribe2') . "</label><br /><br />";
		echo __('Option for Registered Users to auto-subscribe to new categories is checked by default', 'subscribe2') . ": <br />\r\n";
		echo "<label><input type=\"radio\" name=\"autosub_def\" value=\"yes\"";
		if ( 'yes' == $this->subscribe2_options['autosub_def'] ) {
			echo " checked=\"checked\"";
		}
		echo " /> " . __('Yes', 'subscribe2') . "</label>&nbsp;&nbsp;";
		echo "<label><input type=\"radio\" name=\"autosub_def\" value=\"no\"";
		if ( 'no' == $this->subscribe2_options['autosub_def'] ) {
			echo " checked=\"checked\"";
		}
		echo " /> " . __('No', 'subscribe2');
		if ( version_compare($wp_version, '2.9', '>') ) {
			// comment meta was introduced in WP2.9, don't display this if we are on a lower version
			echo"</label><br /><br />";
			echo __('Display checkbox to allow subscriptions from the comment form', 'subscribe2') . ": <br />\r\n";
			if ( version_compare($wp_version, '3.0', '>') ) {
				echo "<label><input type=\"radio\" name=\"comment_subs\" value=\"before\"";
				if ( 'before' == $this->subscribe2_options['comment_subs'] ) {
					echo " checked=\"checked\"";
				}
				echo " /> " . __('Before the Comment Submit button', 'subscribe2') . "</label>&nbsp;&nbsp;";
			}
			echo "<label><input type=\"radio\" name=\"comment_subs\" value=\"after\"";
			if ( 'after' == $this->subscribe2_options['comment_subs'] ) {
				echo " checked=\"checked\"";
			}
			echo " /> " . __('After the Comment Submit button', 'subscribe2') . "</label>&nbsp;&nbsp;";
			echo "<label><input type=\"radio\" name=\"comment_subs\" value=\"no\"";
			if ( 'no' == $this->subscribe2_options['comment_subs'] ) {
				echo " checked=\"checked\"";
			}
			echo " /> " . __('No', 'subscribe2');
		}
		echo"</label></p>";

		//barred domains
		echo "<h2>" . __('Barred Domains', 'subscribe2') . "</h2>\r\n";
		echo"<p>";
		echo __('Enter domains to bar from public subscriptions: <br /> (Use a new line for each entry and omit the "@" symbol, for example email.com)', 'subscribe2');
		echo "<br />\r\n<textarea style=\"width: 98%;\" rows=\"4\" cols=\"60\" name=\"barred\">" . $this->subscribe2_options['barred'] . "</textarea>";
		echo"</p>";

		// submit
		echo "<p class=\"submit\" align=\"center\"><input type=\"submit\" class=\"button-primary\" name=\"submit\" value=\"" . __('Submit', 'subscribe2') . "\" /></p>";

		// reset
		echo "<h2>" . __('Reset Default', 'subscribe2') . "</h2>\r\n";
		echo "<p>" . __('Use this to reset all options to their defaults. This <strong><em>will not</em></strong> modify your list of subscribers.', 'subscribe2') . "</p>\r\n";
		echo "<p class=\"submit\" align=\"center\">";
		echo "<input type=\"submit\" id=\"deletepost\" name=\"reset\" value=\"" . __('RESET', 'subscribe2') .
		"\" />";
		echo "</p></form></div>\r\n";

		include(ABSPATH . 'wp-admin/admin-footer.php');
		// just to be sure
		die;
	} // end options_menu()

	/**
	Our profile menu
	*/
	function user_menu() {
		global $user_ID, $s2nonce;

		if ( isset($_GET['email']) ) {
			global $wpdb;
			$user_ID = $wpdb->get_var("SELECT ID FROM $wpdb->users WHERE user_email = '" . urldecode($_GET['email']) . "'");
		} else {
			get_currentuserinfo();
		}

		// was anything POSTed?
		if ( isset($_POST['s2_admin']) && 'user' == $_POST['s2_admin'] ) {
			check_admin_referer('subscribe2-user_subscribers' . $s2nonce);

			if ( isset($_POST['s2_format']) ) {
				$this->update_user_meta($user_ID, $this->get_usermeta_keyname('s2_format'), $_POST['s2_format']);
			} else {
				// value has not been set so use default
				$this->update_user_meta($user_ID, $this->get_usermeta_keyname('s2_format'), 'excerpt');
			}
			if ( isset($_POST['new_category']) ) {
				$this->update_user_meta($user_ID, $this->get_usermeta_keyname('s2_autosub'), $_POST['new_category']);
			} else {
				// value has not been passed so use Settings defaults
				if ( $this->subscribe2_options['show_autosub'] == 'yes' && $this->subscribe2_options['autosub_def'] == 'yes' ) {
					$this->update_user_meta($user_ID, $this->get_usermeta_keyname('s2_autosub'), 'yes');
				} else {
					$this->update_user_meta($user_ID, $this->get_usermeta_keyname('s2_autosub'), 'no');
				}
			}

			$cats = $_POST['category'];

			if ( empty($cats) || $cats == '-1' ) {
				$oldcats = explode(',', $this->get_user_meta($user_ID, $this->get_usermeta_keyname('s2_subscribed')));
				if ( $oldcats ) {
					foreach ( $oldcats as $cat ) {
						$this->delete_user_meta($user_ID, $this->get_usermeta_keyname('s2_cat') . $cat);
					}
				}
				$this->delete_user_meta($user_ID, $this->get_usermeta_keyname('s2_subscribed'));
			} elseif ( $cats == 'digest' ) {
				$all_cats = $this->all_cats(false, 'ID');
				foreach ( $all_cats as $cat ) {
					('' == $catids) ? $catids = "$cat->term_id" : $catids .= ",$cat->term_id";
					$this->update_user_meta($user_ID, $this->get_usermeta_keyname('s2_cat') . $cat->term_id, $cat->term_id);
				}
				$this->update_user_meta($user_ID, $this->get_usermeta_keyname('s2_subscribed'), $catids);
			} else {
				if ( !is_array($cats) ) {
					$cats = (array)$_POST['category'];
				}
				sort($cats);
				$old_cats = explode(',', $this->get_user_meta($user_ID, $this->get_usermeta_keyname('s2_subscribed')));
				$remove = array_diff($old_cats, $cats);
				$new = array_diff($cats, $old_cats);
				if ( !empty($remove) ) {
					// remove subscription to these cat IDs
					foreach ( $remove as $id ) {
						$this->delete_user_meta($user_ID, $this->get_usermeta_keyname('s2_cat') . $id);
					}
				}
				if ( !empty($new) ) {
					// add subscription to these cat IDs
					foreach ( $new as $id ) {
						$this->update_user_meta($user_ID, $this->get_usermeta_keyname('s2_cat') . $id, $id);
					}
				}
				$this->update_user_meta($user_ID, $this->get_usermeta_keyname('s2_subscribed'), implode(',', $cats));
			}
			echo "<div id=\"message\" class=\"updated fade\"><p><strong>" . __('Subscription preferences updated.', 'subscribe2') . "</strong></p></div>\n";
		}

		// show our form
		echo "<div class=\"wrap\">";
		screen_icon();
		echo "<h2>" . __('Notification Settings', 'subscribe2') . "</h2>\r\n";
		if ( isset($_GET['email']) ) {
			$user = get_userdata($user_ID);
			echo "<span style=\"color: red;line-height: 300%;\">" . __('Editing Subscribe2 preferences for user', 'subscribe2') . ": " . $user->display_name . "</span>";
		}
		echo "<form method=\"post\" action=\"\">";
		echo "<p>";
		if ( function_exists('wp_nonce_field') ) {
			wp_nonce_field('subscribe2-user_subscribers' . $s2nonce);
		}
		echo "<input type=\"hidden\" name=\"s2_admin\" value=\"user\" />";
		if ( $this->subscribe2_options['email_freq'] == 'never' ) {
			echo __('Receive email as', 'subscribe2') . ": &nbsp;&nbsp;";
			echo "<label><input type=\"radio\" name=\"s2_format\" value=\"html\"";
			if ( 'html' == $this->get_user_meta($user_ID, $this->get_usermeta_keyname('s2_format')) ) {
				echo "checked=\"checked\" ";
			}
			echo "/> " . __('HTML - Full', 'subscribe2') ."</label>&nbsp;&nbsp;";
			echo "<label><input type=\"radio\" name=\"s2_format\" value=\"html_excerpt\" ";
			if ( 'html_excerpt' == $this->get_user_meta($user_ID, $this->get_usermeta_keyname('s2_format')) ) {
				echo "checked=\"checked\" ";
			}
			echo "/> " . __('HTML - Excerpt', 'subscribe2') . "</label>&nbsp;&nbsp;";
			echo "<label><input type=\"radio\" name=\"s2_format\" value=\"post\" ";
			if ( 'post' == $this->get_user_meta($user_ID, $this->get_usermeta_keyname('s2_format')) ) {
				echo "checked=\"checked\" ";
			}
			echo "/> " . __('Plain Text - Full', 'subscribe2') . "</label>&nbsp;&nbsp;";
			echo "<label><input type=\"radio\" name=\"s2_format\" value=\"excerpt\" ";
			if ( 'excerpt' == $this->get_user_meta($user_ID, $this->get_usermeta_keyname('s2_format')) ) {
				echo "checked=\"checked\" ";
			}
			echo "/> " . __('Plain Text - Excerpt', 'subscribe2') . "</label><br /><br />\r\n";

			if ( $this->subscribe2_options['show_autosub'] == 'yes' ) {
				echo __('Automatically subscribe me to newly created categories', 'subscribe2') . ': &nbsp;&nbsp;';
				echo "<label><input type=\"radio\" name=\"new_category\" value=\"yes\" ";
				if ( 'yes' == $this->get_user_meta($user_ID, $this->get_usermeta_keyname('s2_autosub')) ) {
					echo "checked=\"checked\" ";
				}
				echo "/> " . __('Yes', 'subscribe2') . "</label>&nbsp;&nbsp;";
				echo "<label><input type=\"radio\" name=\"new_category\" value=\"no\" ";
				if ( 'no' == $this->get_user_meta($user_ID, $this->get_usermeta_keyname('s2_autosub')) ) {
					echo "checked=\"checked\" ";
				}
				echo "/> " . __('No', 'subscribe2') . "</label>";
				echo "</p>";
			}

			// subscribed categories
			if ( $this->s2_mu ) {
				global $blog_id;
				$subscribed = $this->get_user_meta($user_ID, $this->get_usermeta_keyname('s2_subscribed'));
				// if we are subscribed to the current blog display an "unsubscribe" link
				if ( !empty($subscribed) ) {
					$unsubscribe_link = esc_url( add_query_arg('s2mu_unsubscribe', $blog_id) );
					echo "<p><a href=\"". $unsubscribe_link ."\" class=\"button\">" . __('Unsubscribe me from this blog', 'subscribe2') . "</a></p>";
				} else {
					// else we show a "subscribe" link
					$subscribe_link = esc_url( add_query_arg('s2mu_subscribe', $blog_id) );
					echo "<p><a href=\"". $subscribe_link ."\" class=\"button\">" . __('Subscribe to all categories', 'subscribe2') . "</a></p>";
				}
				echo "<h2>" . __('Subscribed Categories on', 'subscribe2') . " " . get_option('blogname') . " </h2>\r\n";
			} else {
				echo "<h2>" . __('Subscribed Categories', 'subscribe2') . "</h2>\r\n";
			}
			$this->display_category_form(explode(',', $this->get_user_meta($user_ID, $this->get_usermeta_keyname('s2_subscribed'))), $this->subscribe2_options['reg_override']);
		} else {
			// we're doing daily digests, so just show
			// subscribe / unnsubscribe
			echo __('Receive periodic summaries of new posts?', 'subscribe2') . ': &nbsp;&nbsp;';
			echo "<label>";
			echo "<input type=\"radio\" name=\"category\" value=\"digest\" ";
			if ( $this->get_user_meta($user_ID, $this->get_usermeta_keyname('s2_subscribed')) ) {
				echo "checked=\"checked\" ";
			}
			echo "/> " . __('Yes', 'subscribe2') . "</label> <label><input type=\"radio\" name=\"category\" value=\"-1\" ";
			if ( !$this->get_user_meta($user_ID, $this->get_usermeta_keyname('s2_subscribed')) ) {
				echo "checked=\"checked\" ";
			}
			echo "/> " . __('No', 'subscribe2');
			echo "</label></p>";
		}

		// submit
		echo "<p class=\"submit\"><input type=\"submit\" class=\"button-primary\" name=\"submit\" value=\"" . __("Update Preferences", 'subscribe2') . " &raquo;\" /></p>";
		echo "</form>\r\n";

		// list of subscribed blogs on wordpress mu
		if ( $this->s2_mu && !isset($_GET['email']) ) {
			global $blog_id, $current_user;
			$s2blog_id = $blog_id;
			get_currentuserinfo();
			$blogs = $this->get_mu_blog_list();

			$blogs_subscribed = array();
			$blogs_notsubscribed = array();

			foreach ( $blogs as $blog ) {
				// switch to blog
				switch_to_blog($blog['blog_id']);

				// check that the Subscribe2 plugin is active on the current blog
				$current_plugins = get_option('active_plugins');
				if ( !is_array($current_plugins) ) {
					$current_plugins = (array)$current_plugins;
				}
				if ( !in_array(S2DIR . 'subscribe2.php', $current_plugins) ) {
					continue;
				}

				// check if we're subscribed to the blog
				$subscribed = $this->get_user_meta($user_ID, $this->get_usermeta_keyname('s2_subscribed'));

				$blogname = get_option('blogname');
				if ( strlen($blogname) > 30 ) {
					$blog['blogname'] = wp_html_excerpt($blogname, 30) . "..";
				} else {
					$blog['blogname'] = $blogname;
				}
				$blog['description'] = get_option('blogdescription');
				$blog['blogurl'] = get_option('home');
				$blog['subscribe_page'] = get_option('home') . "/wp-admin/users.php?page=s2_users";

				$key = strtolower($blog['blogname'] . "-" . $blog['blog_id']);
				if ( !empty($subscribed) ) {
					$blogs_subscribed[$key] = $blog;
				} else {
					$blogs_notsubscribed[$key] = $blog;
				}
				restore_current_blog();
			}

			if ( !empty($blogs_subscribed) ) {
				ksort($blogs_subscribed);
				echo "<h2>" . __('Subscribed Blogs', 'subscribe2') . "</h2>\r\n";
				echo "<ul class=\"s2_blogs\">\r\n";
				foreach ( $blogs_subscribed as $blog ) {
					echo "<li><span class=\"name\"><a href=\"" . $blog['blogurl'] . "\" title=\"" . $blog['description'] . "\">" . $blog['blogname'] . "</a></span>\r\n";
					if ( $s2blog_id == $blog['blog_id'] ) {
						echo "<span class=\"buttons\">" . __('Viewing Settings Now', 'subscribe2') . "</span>\r\n";
					} else {
						echo "<span class=\"buttons\">";
						if ( is_user_member_of_blog($current_user->id, $blog['blog_id']) ) {
							echo "<a href=\"". $blog['subscribe_page'] . "\">" . __('View Settings', 'subscribe2') . "</a>\r\n";
						}
						echo "<a href=\"" . esc_url( add_query_arg('s2mu_unsubscribe', $blog['blog_id']) ) . "\">" . __('Unsubscribe', 'subscribe2') . "</a></span>\r\n";
					}
					echo "<div class=\"additional_info\">" . $blog['description'] . "</div>\r\n";
					echo "</li>";
				}
				echo "</ul>\r\n";
			}

			if ( !empty($blogs_notsubscribed) ) {
				ksort($blogs_notsubscribed);
				echo "<h2>" . __('Subscribe to new blogs', 'subscribe2') . "</h2>\r\n";
				echo "<ul class=\"s2_blogs\">";
				foreach ( $blogs_notsubscribed as $blog ) {
					echo "<li><span class=\"name\"><a href=\"" . $blog['blogurl'] . "\" title=\"" . $blog['description'] . "\">" . $blog['blogname'] . "</a></span>\r\n";
					if ( $s2blog_id == $blog['blog_id'] ) {
						echo "<span class=\"buttons\">" . __('Viewing Settings Now', 'subscribe2') . "</span>\r\n";
					} else {
						echo "<span class=\"buttons\">";
						if ( is_user_member_of_blog($current_user->id, $blog['blog_id']) ) {
							echo "<a href=\"". $blog['subscribe_page'] . "\">" . __('View Settings', 'subscribe2') . "</a>\r\n";
						}
						echo "<a href=\"" . esc_url( add_query_arg('s2mu_subscribe', $blog['blog_id']) ) . "\">" . __('Subscribe', 'subscribe2') . "</a></span>\r\n";
					}
					echo "<div class=\"additional_info\">" . $blog['description'] . "</div>\r\n";
					echo "</li>";
				}
				echo "</ul>\r\n";
			}
		}

		echo "</div>\r\n";

		include(ABSPATH . 'wp-admin/admin-footer.php');
		// just to be sure
		die;
	} // end user_menu()

	/**
	Display the Write sub-menu
	*/
	function write_menu() {
		global $wpdb, $s2nonce, $current_user;

		// was anything POSTed?
		if ( isset($_POST['s2_admin']) && 'mail' == $_POST['s2_admin'] ) {
			check_admin_referer('subscribe2-write_subscribers' . $s2nonce);
			$subject = $this->substitute(stripslashes(strip_tags($_POST['subject'])));
			$body = $this->substitute(stripslashes($_POST['content']));
			if ( '' != $current_user->display_name || '' != $current_user->user_email ) {
				$this->myname = html_entity_decode($current_user->display_name, ENT_QUOTES);
				$this->myemail = $current_user->user_email;
			}
			if ( isset($_POST['send']) ) {
				if ( 'confirmed' == $_POST['what'] ) {
					$recipients = $this->get_public();
				} elseif ( 'unconfirmed' == $_POST['what'] ) {
					$recipients = $this->get_public(0);
				} elseif ( 'public' == $_POST['what'] ) {
					$confirmed = $this->get_public();
					$unconfirmed = $this->get_public(0);
					$recipients = array_merge((array)$confirmed, (array)$unconfirmed);
				} elseif ( is_numeric($_POST['what']) ) {
					$cat = intval($_POST['what']);
					$recipients = $this->get_registered("cats=$cat");
				} elseif ( 'all_users' == $_POST['what'] ) {
					$recipients = $this->get_all_registered();
				} else {
					$recipients = $this->get_registered();
				}
			} elseif ( isset($_POST['preview']) ) {
				global $user_email;
				$recipients[] = $user_email;
			}
			$status = $this->mail($recipients, $subject, $body, 'text');
			if ( $status ) {
				$message = $this->mail_sent;
			} else {
				global $phpmailer;
				$message = $this->mail_failed . $phpmailer->ErrorInfo;
			}
			echo "<div id=\"message\" class=\"updated\"><strong><p>" . $message . "</p></strong></div>\r\n";
		}

		// show our form
		echo "<div class=\"wrap\">";
		screen_icon();
		echo "<h2>" . __('Send an email to subscribers', 'subscribe2') . "</h2>\r\n";
		echo "<form method=\"post\" action=\"\">\r\n";
		if ( function_exists('wp_nonce_field') ) {
			wp_nonce_field('subscribe2-write_subscribers' . $s2nonce);
		}
		if ( isset($_POST['subject']) ) {
			$subject = $_POST['subject'];
		} else {
			$subject = __('A message from', 'subscribe2') . " " . get_option('blogname');
		}
		if ( !isset($_POST['content']) ) {
			$body = '';
		}
		echo "<p>" . __('Subject', 'subscribe2') . ": <input type=\"text\" size=\"69\" name=\"subject\" value=\"" . $subject . "\" /> <br /><br />";
		echo "<textarea rows=\"12\" cols=\"75\" name=\"content\">" . $body . "</textarea>";
		echo "<br /><br />\r\n";
		echo __('Recipients:', 'subscribe2') . " ";
		$this->display_subscriber_dropdown('registered', false, array('all'));
		echo "<input type=\"hidden\" name=\"s2_admin\" value=\"mail\" />";
		echo "</p>";
		echo "<p class=\"submit\"><input type=\"submit\" class=\"button-secondary\" name=\"preview\" value=\""  . __('Preview', 'subscribe2') . "\" \><input type=\"submit\" class=\"button-primary\" name=\"send\" value=\"" . __('Send', 'subscribe2') . "\" /></p>";
		echo "</form></div>\r\n";
		echo "<div style=\"clear: both;\"><p>&nbsp;</p></div>";

		include(ABSPATH . 'wp-admin/admin-footer.php');
		// just to be sure
		die;
	} // end write_menu()

/* ===== helper functions: forms and stuff ===== */
	/**
	Get an object of all categories, include default and custom type
	*/
	function all_cats($exclude = false, $orderby = 'slug') {
		$all_cats = array();
		$s2_taxonomies = array('category');
		$s2_taxonomies = apply_filters('s2_taxonomies', $s2_taxonomies);

		foreach( $s2_taxonomies as $taxonomy ) {
			if ( $this->s2_taxonomy_exists($taxonomy) ) {
				$all_cats = array_merge($all_cats, get_categories(array('hide_empty' => false, 'orderby' => $orderby, 'taxonomy' => $taxonomy)));
			}
		}

		if ( $exclude === true ) {
			// remove excluded categories from the returned object
			$excluded = explode(',', $this->subscribe2_options['exclude']);

			// need to use $id like this as this is a mixed array / object
			$id = 0;
			foreach ( $all_cats as $cat) {
				if ( in_array($cat->term_id, $excluded) ) {
					unset($all_cats[$id]);
				}
				$id++;
			}
		}

		return $all_cats;
	} // end all_cats()

	/**
	Display a table of categories with checkboxes
	Optionally pre-select those categories specified
	*/
	function display_category_form($selected = array(), $override = 1) {
		global $wpdb;

		if ( $override == 0 ) {
			$all_cats = $this->all_cats(true);
		} else {
			$all_cats = $this->all_cats(false);
		}

		$half = (count($all_cats) / 2);
		$i = 0;
		$j = 0;
		echo "<table width=\"100%\" cellspacing=\"2\" cellpadding=\"5\" class=\"editform\">\r\n";
		echo "<tr><td align=\"left\" colspan=\"2\">\r\n";
		echo "<label><input type=\"checkbox\" name=\"checkall\" value=\"checkall_cat\" /> " . __('Select / Unselect All', 'subscribe2') . "</label>\r\n";
		echo "</td></tr>\r\n";
		echo "<tr valign=\"top\"><td width=\"50%\" align=\"left\">\r\n";
		foreach ( $all_cats as $cat ) {
			if ( $i >= $half && 0 == $j ){
				echo "</td><td width=\"50%\" align=\"left\">\r\n";
				$j++;
			}
			$catName = '';
			$parents = array_reverse( $this->get_parents($cat->term_id, $cat->taxonomy) );
			if ( $parents ) {
				foreach ( $parents as $parent ) {
					$parent = get_term($parent, $cat->taxonomy);
					$catName .= $parent->name . ' &raquo; ';
				}
			}
			$catName .= $cat->name;

			if ( 0 == $j ) {
				echo "<label><input class=\"checkall_cat\" type=\"checkbox\" name=\"category[]\" value=\"" . $cat->term_id . "\"";
				if ( in_array($cat->term_id, $selected) ) {
						echo " checked=\"checked\"";
				}
				echo " /> <abbr title=\"" . $cat->slug . "\">" . $catName . "</abbr></label><br />\r\n";
			} else {
				echo "<label><input class=\"checkall_cat\" type=\"checkbox\" name=\"category[]\" value=\"" . $cat->term_id . "\"";
				if ( in_array($cat->term_id, $selected) ) {
							echo " checked=\"checked\"";
				}
				echo " /> <abbr title=\"" . $cat->slug . "\">" . $catName . "</abbr></label><br />\r\n";
			}
			$i++;
		}
		echo "</td></tr>\r\n";
		echo "</table>\r\n";
	} // end display_category_form()

	/**
	Display a drop-down form to select subscribers
	$selected is the option to select
	$submit is the text to use on the Submit button
	*/
	function display_subscriber_dropdown($selected = 'registered', $submit = '', $exclude = array()) {
		global $wpdb;

		$who = array('all' => __('All Users and Subscribers', 'subscribe2'),
			'public' => __('Public Subscribers', 'subscribe2'),
			'confirmed' => ' &nbsp;&nbsp;' . __('Confirmed', 'subscribe2'),
			'unconfirmed' => ' &nbsp;&nbsp;' . __('Unconfirmed', 'subscribe2'),
			'all_users' => __('All Registered Users', 'subscribe2'),
			'registered' => __('Registered Subscribers', 'subscribe2'));

		$all_cats = $this->all_cats(false);

		// count the number of subscribers
		$count['confirmed'] = $wpdb->get_var("SELECT COUNT(id) FROM $this->public WHERE active='1'");
		$count['unconfirmed'] = $wpdb->get_var("SELECT COUNT(id) FROM $this->public WHERE active='0'");
		if ( in_array('unconfirmed', $exclude) ) {
			$count['public'] = $count['confirmed'];
		} elseif ( in_array('confirmed', $exclude) ) {
			$count['public'] = $count['unconfirmed'];
		} else {
			$count['public'] = ($count['confirmed'] + $count['unconfirmed']);
		}
		if ( $this->s2_mu ) {
			$count['all_users'] = $wpdb->get_var("SELECT COUNT(meta_key) FROM $wpdb->usermeta WHERE meta_key='" . $wpdb->prefix . "capabilities'");
		} else {
			$count['all_users'] = $wpdb->get_var("SELECT COUNT(ID) FROM $wpdb->users");
		}
		if ( $this->s2_mu ) {
			$count['registered'] = $wpdb->get_var("SELECT COUNT(meta_key) FROM $wpdb->usermeta WHERE meta_key='" . $wpdb->prefix . "capabilities' AND meta_key='" . $this->get_usermeta_keyname('s2_subscribed') . "'");
		} else {
			$count['registered'] = $wpdb->get_var("SELECT COUNT(meta_key) FROM $wpdb->usermeta WHERE meta_key='" . $this->get_usermeta_keyname('s2_subscribed') . "'");
		}
		$count['all'] = ($count['confirmed'] + $count['unconfirmed'] + $count['all_users']);
		if ( $this->s2_mu ) {
			foreach ( $all_cats as $cat ) {
				$count[$cat->name] = $wpdb->get_var("SELECT COUNT(a.meta_key) FROM $wpdb->usermeta AS a INNER JOIN $wpdb->usermeta AS b ON a.user_id = b.user_id WHERE a.meta_key='" . $wpdb->prefix . "capabilities' AND b.meta_key='" . $this->get_usermeta_keyname('s2_cat') . $cat->term_id . "'");
			}
		} else {
			foreach ( $all_cats as $cat ) {
				$count[$cat->name] = $wpdb->get_var("SELECT COUNT(meta_value) FROM $wpdb->usermeta WHERE meta_key='" . $this->get_usermeta_keyname('s2_cat') . $cat->term_id . "'");
			}
		}

		// do have actually have some subscribers?
		if ( 0 == $count['confirmed'] && 0 == $count['unconfirmed'] && 0 == $count['all_users'] ) {
			// no? bail out
			return;
		}

		echo "<select name=\"what\">\r\n";
		foreach ( $who as $whom => $display ) {
			if ( in_array($whom, $exclude) ) { continue; }
			if ( 0 == $count[$whom] ) { continue; }

			echo "<option value=\"" . $whom . "\"";
			if ( $whom == $selected ) { echo " selected=\"selected\" "; }
			echo ">$display (" . ($count[$whom]) . ")</option>\r\n";
		}

		if ( $count['registered'] > 0 ) {
			foreach ( $all_cats as $cat ) {
				if ( in_array($cat->term_id, $exclude) ) { continue; }
				echo "<option value=\"" . $cat->term_id . "\"";
				if ( $cat->term_id == $selected ) { echo " selected=\"selected\" "; }
				echo "> &nbsp;&nbsp;" . $cat->name . "&nbsp;(" . $count[$cat->name] . ") </option>\r\n";
			}
		}
		echo "</select>";
		if ( false !== $submit ) {
			echo "&nbsp;<input type=\"submit\" class=\"button-secondary\" value=\"$submit\" />\r\n";
		}
	} // end display_subscriber_dropdown()

	/**
	Display a drop down list of administrator level users and
	optionally include a choice for Post Author
	*/
	function admin_dropdown($inc_author = false) {
		global $wpdb;

		$sql = "SELECT ID, display_name FROM $wpdb->users INNER JOIN $wpdb->usermeta ON $wpdb->users.ID = $wpdb->usermeta.user_id WHERE $wpdb->usermeta.meta_key='" . $wpdb->prefix . "user_level' AND $wpdb->usermeta.meta_value IN (8, 9, 10)";
		$admins = $wpdb->get_results($sql);

		// handle issues from WordPress core where user_level is not set or set low
		if ( empty($admins) ) {
			global $wp_version;
			if ( version_compare($wp_version, '3.1', '<') ) {
				// WordPress version is less than 3.1, use WP_User_Search class
				if ( !class_exists(WP_User_Search) ) {
					require(ABSPATH . 'wp-admin/includes/user.php');
					$wp_user_query = new WP_User_Search( '', '', 'administrator');
					$admins_string = implode(', ', $wp_user_query->get_results());
					$sql = "SELECT ID, display_name FROM $wpdb->users WHERE ID IN (" . $admins_string . ")";
					$admins = $wpdb->get_results($sql);
				}
			} else {
				// WordPress version is 3.1 or greater, use WP_User_Query class
				$args = array('fields' => array('ID', 'display_name'), 'role' => 'administrator');
				$wp_user_query = get_users( $args );
				foreach ($wp_user_query as $user) {
					$admins[] = $user;
				}
			}
		}

		if ( $inc_author ) {
			$author[] = (object)array('ID' => 'author', 'display_name' => 'Post Author');
			$author[] = (object)array('ID' => 'blogname', 'display_name' => html_entity_decode(get_option('blogname'), ENT_QUOTES));
			$admins = array_merge($author, $admins);
		}

		echo "<select name=\"sender\">\r\n";
		foreach ( $admins as $admin ) {
			echo "<option value=\"" . $admin->ID . "\"";
			if ( $admin->ID == $this->subscribe2_options['sender'] ) {
				echo " selected=\"selected\"";
			}
			echo ">" . $admin->display_name . "</option>\r\n";
		}
		echo "</select>\r\n";
	} // end admin_dropdown()

	/**
	Display a dropdown of choices for digest email frequency
	and give user details of timings when event is scheduled
	*/
	function display_digest_choices() {
		global $wpdb;
		$scheduled_time = wp_next_scheduled('s2_digest_cron');
		$schedule = (array)wp_get_schedules();
		$schedule = array_merge(array('never' => array('interval' => 0, 'display' => __('For each Post', 'subscribe2'))), $schedule);
		$sort = array();
		foreach ( (array)$schedule as $key => $value ) {
			$sort[$key] = $value['interval'];
		}
		asort($sort);
		$schedule_sorted = array();
		foreach ( $sort as $key => $value ) {
			$schedule_sorted[$key] = $schedule[$key];
		}
		foreach ( $schedule_sorted as $key => $value ) {
			echo "<label><input type=\"radio\" name=\"email_freq\" value=\"" . $key . "\"";
			if ( $key == $this->subscribe2_options['email_freq'] ) {
				echo " checked=\"checked\" ";
			}
			echo " /> " . $value['display'] . "</label><br />\r\n";
		}
		echo "<br />" . __('Send Digest Notification at', 'subscribe2') . ": \r\n";
		$hours = array('12am', '1am', '2am', '3am', '4am', '5am', '6am', '7am', '8am', '9am', '10am', '11am', '12pm', '1pm', '2pm', '3pm', '4pm', '5pm', '6pm', '7pm', '8pm', '9pm', '10pm', '11pm');
		echo "<select name=\"hour\">\r\n";
		while ( $hour = current($hours) ) {
			echo "<option value=\"" . key($hours) . "\"";
			if ( key($hours) == date('H', $scheduled_time) && !empty($scheduled_time) ){
				echo " selected=\"selected\"";
			}
			echo ">" . $hour . "</option>\r\n";
			next($hours);
		}
		echo "</select>\r\n";
		echo "<strong><em style=\"color: red\">" . __('This option will be ignored if the time selected is not in the future in relation to the current time', 'subscribe2') . "</em></strong>\r\n";
		if ( $scheduled_time ) {
			$datetime = get_option('date_format') . ' @ ' . get_option('time_format');
			echo "<p>" . __('Current UTC time is', 'subscribe2') . ": \r\n";
			echo "<strong>" . date_i18n($datetime, false, 'gmt') . "</strong></p>\r\n";
			echo "<p>" . __('Current blog time is', 'subscribe2') . ": \r\n";
			echo "<strong>" . date_i18n($datetime) . "</strong></p>\r\n";
			echo "<p>" . __('Next email notification will be sent when your blog time is after', 'subscribe2') . ": \r\n";
			echo "<strong>" . date_i18n($datetime, $scheduled_time) . "</strong></p>\r\n";
			if ( !empty($this->subscribe2_options['previous_s2cron']) ) {
				echo "<p>" . __('Attempt to resend the last Digest Notification email', 'subscribe2') . ": ";
				echo "<input type=\"submit\" class=\"button-secondary\" name=\"resend\" value=\"" . __('Resend Digest', 'subscribe2') . "\" /></p>\r\n";
			}
		} else {
			echo "<br />";
		}
	} // end display_digest_choices()

	/**
	Create and display a dropdown list of pages
	*/
	function pages_dropdown($s2page) {
		global $wpdb;
		$sql = "SELECT ID, post_title FROM $wpdb->posts WHERE post_type='page' AND post_status='publish'";
		$pages = $wpdb->get_results($sql);

		if ( empty($pages) ) { return; }

		$option = '';
		foreach ( $pages as $page ) {
			$option .= "<option value=\"" . $page->ID . "\"";
			if ( $page->ID == $s2page ) {
				$option .= " selected=\"selected\"";
			}
			$option .= ">" . $page->post_title . "</option>\r\n";
		}

		echo $option;
	} // end pages_dropdown()

	/**
	Export subscriber emails and other details to CSV
	*/
	function prepare_export( $what ) {
		$confirmed = $this->get_public();
		$unconfirmed = $this->get_public(0);
		if ( 'all' == $what ) {
			$subscribers = array_merge((array)$confirmed, (array)$unconfirmed, (array)$this->get_all_registered());
		} elseif ( 'public' == $what ) {
			$subscribers = array_merge((array)$confirmed, (array)$unconfirmed);
		} elseif ( 'confirmed' == $what ) {
			$subscribers = $confirmed;
		} elseif ( 'unconfirmed' == $what ) {
			$subscribers = $unconfirmed;
		} elseif ( is_numeric($what) ) {
			$subscribers = $this->get_registered("cats=$what");
		} elseif ( 'registered' == $what ) {
			$subscribers = $this->get_registered();
		} elseif ( 'all_users' == $what ) {
			$subscribers = $this->get_all_registered();
		}

		natcasesort($subscribers);

		$exportcsv = "User Email,User Name";
		$all_cats = $this->all_cats(false, 'ID');

		foreach ($all_cats as $cat) {
			$exportcsv .= "," . $cat->cat_name;
			$cat_ids[] = $cat->term_id;
		}
		$exportcsv .= "\r\n";

		foreach ( $subscribers as $subscriber ) {
			if ( $this->is_registered($subscriber) ) {
				$user_ID = $this->get_user_id( $subscriber );
				$user_info = get_userdata($user_ID);

				$cats = explode(',', $this->get_user_meta($user_info->ID, $this->get_usermeta_keyname('s2_subscribed')));
				$subscribed_cats = '';
				foreach ( $cat_ids as $cat ) {
					(in_array($cat, $cats)) ? $subscribed_cats .= ",Yes" : $subscribed_cats .= ",No";
				}

				$exportcsv .= $user_info->user_email . ',';
				$exportcsv .= $user_info->display_name;
				$exportcsv .= $subscribed_cats . "\r\n";
			} else {
				if ( in_array($subscriber, $confirmed) ) {
					$exportcsv .= $subscriber . ',' . __('Confirmed Public Subscriber', 'subscribe2') . "\r\n";
				} elseif ( in_array($subscriber, $unconfirmed) ) {
					$exportcsv .= $subscriber . ',' . __('Unconfirmed Public Subscriber', 'subscribe2') . "\r\n";
				}
			}
		}

		return $exportcsv;
	} // end prepare_export()

	/**
	Filter for usermeta table key names to adjust them if needed for WPMU blogs
	*/
	function get_usermeta_keyname($metaname) {
		global $wpdb;

		// Is this WordPressMU or not?
		if ( $this->s2_mu === true ) {
			switch( $metaname ) {
				case 's2_subscribed':
				case 's2_cat':
				case 's2_format':
				case 's2_autosub':
					return $wpdb->prefix . $metaname;
					break;
			}
		}
		// Not MU or not a prefixed option name
		return $metaname;
	} // end get_usermeta_keyname()

	/**
	Obtain a list of current WordPress multiuser blogs
	Note this may affect performance but there is no alternative
	*/
	function get_mu_blog_list() {
		global $wpdb;
		$blogs = $wpdb->get_results( $wpdb->prepare("SELECT blog_id, domain, path FROM $wpdb->blogs WHERE site_id = %d AND archived = '0' AND mature = '0' AND spam = '0' AND deleted = '0' ORDER BY registered DESC", $wpdb->siteid), ARRAY_A );

		foreach ( $blogs as $details ) {
			//reindex the array so the key is the same as the blog_id
			$blog_list[$details['blog_id']] = $details;
		}

		if ( false == is_array( $blog_list ) ) {
			return array();
		}

		return $blog_list;
	} // end get_mu_blog_list()

	/**
	Adds a links directly to the settings page from the plugin page
	*/
	function plugin_links($links, $file) {
		if ( $file == S2DIR.'subscribe2.php' ) {
			$links[] = "<a href='options-general.php?page=s2_settings'>" . __('Settings', 'subscribe2') . "</a>";
			$links[] = "<a href='https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&amp;hosted_button_id=2387904'><b>" . __('Donate', 'subscribe2') . "</b></a>";
		}
		return $links;
	} // end plugin_links()

	/**
	Adds information to the WordPress registration screen for new users
	*/
	function register_form() {
		if ( 'no' == $this->subscribe2_options['autosub'] ) { return; }
		if ( 'wpreg' == $this->subscribe2_options['autosub'] ) {
			echo "<p>\r\n<label>";
			echo __('Check here to Subscribe to email notifications for new posts', 'subscribe2') . ":<br />\r\n";
			echo "<input type=\"checkbox\" name=\"reg_subscribe\"";
			if ( 'yes' == $this->subscribe2_options['wpregdef'] ) {
				echo " checked=\"checked\"";
			}
			echo " /></label>\r\n";
			echo "</p>\r\n";
		} elseif ( 'yes' == $this->subscribe2_options['autosub'] ) {
			echo "<p>\r\n<center>\r\n";
			echo __('By registering with this blog you are also agreeing to receive email notifications for new posts but you can unsubscribe at anytime', 'subscribe2') . ".<br />\r\n";
			echo "</center></p>\r\n";
		}
	} // end register_form()

	/**
	Process function to add action if user selects to subscribe to posts during registration
	*/
	function register_post($user_ID = 0) {
		global $_POST;
		if ( 0 == $user_ID ) { return; }
		if ( 'yes' == $this->subscribe2_options['autosub'] || ( 'on' == $_POST['reg_subscribe'] && 'wpreg' == $this->subscribe2_options['autosub'] ) ) {
			$this->register($user_ID, true);
		} else {
			$this->register($user_ID, false);
		}
	} // end register_post()

	/**
	Register user details when new user is added to a multisite blog
	*/
	function wpmu_add_user($user_ID = 0) {
		if ( 0 == $user_ID ) { return; }
		if ( 'yes' == $this->subscribe2_options['autosub'] ) {
			$this->register($user_ID, true);
		} else {
			$this->register($user_ID, false);
		}
	} // end wpmu_add_user()

	/**
	Delete user details when a user is removed from a multisite blog
	*/
	function wpmu_remove_user($user_ID) {
		if ( 0 == $user_ID ) { return; }
		$this->delete_user_meta($user_ID, $this->get_usermeta_keyname('s2_format'));
		$this->delete_user_meta($user_ID, $this->get_usermeta_keyname('s2_autosub'));
		$cats = $this->get_user_meta($user_ID, $this->get_usermeta_keyname('s2_subscribed'));
		if ( !empty($cats) ) {
			$cats = explode(',', $cats);
			foreach ( $cats as $cat ) {
				$this->delete_user_meta($user_ID, $this->get_usermeta_keyname('s2_cat') . $cat);
			}
		}
		$this->delete_user_meta($user_ID, $this->get_usermeta_keyname('s2_subscribed'));
	} // end wpmu_remove_user()

	/**
	Create meta box on write pages
	*/
	function s2_meta_init() {
		add_meta_box('subscribe2', __('Subscribe2 Notification Override', 'subscribe2' ), array(&$this, 's2_meta_box'), 'post', 'advanced');
		add_meta_box('subscribe2', __('Subscribe2 Notification Override', 'subscribe2' ), array(&$this, 's2_meta_box'), 'page', 'advanced');
	} // end s2_meta_init()

	/**
	Meta box code for WordPress 2.5+
	*/
	function s2_meta_box() {
		global $post_ID;
		$s2mail = get_post_meta($post_ID, 's2mail', true);
		echo "<input type=\"hidden\" name=\"s2meta_nonce\" id=\"s2meta_nonce\" value=\"" . wp_create_nonce(md5(plugin_basename(__FILE__))) . "\" />";
		echo __("Check here to disable sending of an email notification for this post/page", 'subscribe2');
		echo "&nbsp;&nbsp;<input type=\"checkbox\" name=\"s2_meta_field\" value=\"no\"";
		if ( $s2mail == 'no' || ($this->subscribe2_options['s2meta_default'] == "1" && $s2mail == "") ) {
			echo " checked=\"checked\"";
		}
		echo " />";
	} // end s2_meta_box()

	/**
	Meta box form handler
	*/
	function s2_meta_handler($post_id) {
		if ( !isset($_POST['s2meta_nonce']) || !wp_verify_nonce($_POST['s2meta_nonce'], md5(plugin_basename(__FILE__))) ) { return $post_id; }

		if ( 'page' == $_POST['post_type'] ) {
			if ( !current_user_can('edit_page', $post_id) ) { return $post_id; }
		} else {
			if ( !current_user_can('edit_post', $post_id) ) { return $post_id; }
		}

		if ( isset($_POST['s2_meta_field']) && $_POST['s2_meta_field'] == 'no' ) {
			update_post_meta($post_id, 's2mail', $_POST['s2_meta_field']);
		} else {
			update_post_meta($post_id, 's2mail', 'yes');
		}
	} // end s2_meta_box_handler()

/* ===== comment subscriber functions ===== */
	/**
	Display check box on comment page
	*/
	function s2_comment_meta_form() {
		if ( is_user_logged_in() ) {
			echo $this->use_profile_admin;
		} else {
			echo "<label><input type=\"checkbox\" name=\"s2_comment_request\" value=\"1\" />" . __('Check here to Subscribe to notifications for new posts', 'subscribe2') . "</label>";
		}
	} // end s2_comment_meta_form()

	/**
	Process comment meta data
	*/
	function s2_comment_meta($comment_ID) {
		if ( $_POST['s2_comment_request'] == '1' ) {
			add_comment_meta($comment_ID, 's2_comment_request', $_POST['s2_comment_request']);
		}
	} // end s2_comment_meta()

	/**
	Action subscribe requests made on comment forms when comments are approved
	*/
	function comment_status($comment_ID = 0, $comment_status = 0){
		global $wpdb;

		// get meta data
		$subscribe = get_comment_meta($comment_ID, 's2_comment_request', true);
		if ( $subscribe != '1' ) { return $comment_ID; }

		// Retrieve the information about the comment
		$sql = "SELECT comment_author_email, comment_approved FROM $wpdb->comments WHERE comment_ID='$comment_ID' LIMIT 1";
		$comment = $wpdb->get_row($sql, OBJECT);
		if ( empty($comment) ) { return $comment_ID; }

		switch ($comment->comment_approved){
			case '0': // Unapproved
				break;
			case '1': // Approved
				$is_public = $this->is_public($comment->comment_author_email);
				if ( $is_public == 0 ) {
					$this->toggle($comment->comment_author_email);
				}
				$is_registered = $this->is_registered($comment->comment_author_email);
				if ( !$is_public && !$is_registered ) {
					$this->activate($comment->comment_author_email);
				}
				delete_comment_meta($comment_ID, 's2_comment_request');
				break;
			default: // post is trash, spam or deleted
				delete_comment_meta($comment_ID, 's2_comment_request');
				break;
		}

		return $comment_ID;
	} // end comment_status()

/* ===== template and filter functions ===== */
	/**
	Display our form; also handles (un)subscribe requests
	*/
	function shortcode($atts) {
		extract(shortcode_atts(array(
			'hide'  => '',
			'id'    => '',
			'url' => ''
			), $atts));

		// if a button is hidden, show only other
		if ( $hide == 'subscribe' ) {
			$this->input_form_action = "<input type=\"submit\" name=\"unsubscribe\" value=\"" . __('Unsubscribe', 'subscribe2') . "\" />";
		} elseif ( $hide == 'unsubscribe' ) {
			$this->input_form_action = "<input type=\"submit\" name=\"subscribe\" value=\"" . __('Subscribe', 'subscribe2') . "\" />";
		} else {
			// both form input actions
			$this->input_form_action = "<input type=\"submit\" name=\"subscribe\" value=\"" . __('Subscribe', 'subscribe2') . "\" />&nbsp;<input type=\"submit\" name=\"unsubscribe\" value=\"" . __('Unsubscribe', 'subscribe2') . "\" />";
		}
		// if ID is provided, get permalink
		if ( $id ) {
			$url = get_permalink( $id );
		}
		// build default form
		$this->form = "<form method=\"post\" action=\"" . $url . "\"><input type=\"hidden\" name=\"ip\" value=\"" . $_SERVER['REMOTE_ADDR'] . "\" /><p><label for=\"s2email\">" . __('Your email:', 'subscribe2') . "</label><br /><input type=\"text\" name=\"email\" id=\"s2email\" value=\"" . __('Enter email address...', 'subscribe2') . "\" size=\"20\" onfocus=\"if (this.value == '" . __('Enter email address...', 'subscribe2') . "') {this.value = '';}\" onblur=\"if (this.value == '') {this.value = '" . __('Enter email address...', 'subscribe2') . "';}\" /></p><p>" . $this->input_form_action . "</p></form>\r\n";
		$this->s2form = $this->form;

		global $user_ID;
		get_currentuserinfo();
		if ( $user_ID ) {
			if ( current_user_can('manage_options') ) {
				$this->s2form = $this->use_profile_admin;
			} else {
				$this->s2form = $this->use_profile_users;
			}
		}
		if ( isset($_POST['subscribe']) || isset($_POST['unsubscribe']) ) {
			global $wpdb, $user_email;
			if ( !is_email($_POST['email']) ) {
				$this->s2form = $this->form . $this->not_an_email;
			} elseif ( $this->is_barred($_POST['email']) ) {
				$this->s2form = $this->form . $this->barred_domain;
			} else {
				$this->email = $this->sanitize_email($_POST['email']);
				$this->ip = $_POST['ip'];
				// does the supplied email belong to a registered user?
				$check = $wpdb->get_var("SELECT user_email FROM $wpdb->users WHERE user_email = '$this->email'");
				if ( '' != $check ) {
					// this is a registered email
					$this->s2form = $this->please_log_in;
				} else {
					// this is not a registered email
					// what should we do?
					if ( isset($_POST['subscribe']) ) {
						// someone is trying to subscribe
						// lets see if they've tried to subscribe previously
						if ( '1' !== $this->is_public($this->email) ) {
							// the user is unknown or inactive
							$this->add($this->email);
							$status = $this->send_confirm('add');
							// set a variable to denote that we've already run, and shouldn't run again
							$this->filtered = 1;
							if ( $status ) {
								$this->s2form = $this->confirmation_sent;
							} else {
								$this->s2form = $this->error;
							}
						} else {
							// they're already subscribed
							$this->s2form = $this->already_subscribed;
						}
						$this->action = 'subscribe';
					} elseif ( isset($_POST['unsubscribe']) ) {
						// is this email a subscriber?
						if ( false == $this->is_public($this->email) ) {
							$this->s2form = $this->form . $this->not_subscribed;
						} else {
							$status = $this->send_confirm('del');
							// set a variable to denote that we've already run, and shouldn't run again
							$this->filtered = 1;
							if ( $status ) {
								$this->s2form = $this->confirmation_sent;
							} else {
								$this->s2form = $this->error;
							}
						}
						$this->action='unsubscribe';
					}
				}
			}
		}
		return $this->s2form;
	} // end shortcode()

	/**
	Display form when deprecated <!--subscribe2--> is used
	*/
	function filter($content = '') {
		if ( '' == $content || !strstr($content, '<!--subscribe2-->') ) { return $content; }

		return preg_replace('|(<p>)?(\n)*<!--subscribe2-->(\n)*(</p>)?|', do_shortcode( '[subscribe2]' ), $content);
	} // end filter()

	/**
	Overrides the default query when handling a (un)subscription confirmation
	This is basically a trick: if the s2 variable is in the query string, just grab the first
	static page and override it's contents later with title_filter()
	*/
	function query_filter() {
		// don't interfere if we've already done our thing
		if ( 1 == $this->filtered ) { return; }

		global $wpdb;

		if ( 0 != $this->subscribe2_options['s2page'] ) {
			return "page_id=" . $this->subscribe2_options['s2page'];
		} else {
			$id = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_type='page' AND post_status='publish' LIMIT 1");
			if ( $id ) {
				return "page_id=$id";
			} else {
				return "showposts=1";
			}
		}
	} // end query_filter()

	/**
	Overrides the page title
	*/
	function title_filter($title) {
		// don't interfere if we've already done our thing
		if ( in_the_loop() ) {
			return __('Subscription Confirmation', 'subscribe2');
		} else {
			return $title;
		}
	} // end title_filter()

/* ===== widget functions ===== */
	/**
	Register the form widget
	*/
	function subscribe2_widget() {
		require_once( S2PATH . 'include/widget.php');
		register_widget('S2_Form_widget');
	} // end subscribe2_widget()

	/**
	Register the counter widget
	*/
	function counter_widget() {
		require_once( S2PATH . 'include/counterwidget.php');
		register_widget('S2_Counter_widget');
	} // end counter_widget()

	/**
	Function to add css and js files to admin header
	*/
	function widget_s2counter_css_and_js() {
		// ensure we only add colorpicker js to widgets page
		if ( stripos($_SERVER['REQUEST_URI'], 'widgets.php' ) !== false ) {
			wp_enqueue_style('colorpicker', S2URL . 'include/colorpicker/css/colorpicker.css', '', '20090523'); // colorpicker css
			wp_enqueue_script('colorpicker_js', S2URL . 'include/colorpicker/js/colorpicker' . $this->script_debug . '.js', array('jquery'), '20090523'); // colorpicker js
			wp_enqueue_script('s2_colorpicker', S2URL . 'include/s2_colorpicker' . $this->script_debug . '.js', array('colorpicker_js'), '1.3'); //my js
		}
	} // end widget_s2_counter_css_and_js()

	/**
	Rename WPMU widgets on upgrade without requiring user to re-enable
	*/
	function namechange_subscribe2_widget() {
		global $wpdb;
		$blogs = $wpdb->get_col("SELECT blog_id FROM {$wpdb->blogs}");

		foreach ( $blogs as $blog ) {
			switch_to_blog($blog);

			$sidebars = get_option('sidebars_widgets');
			if ( empty($sidebars) || !is_array($sidebars) ) { return; }
			$changed = false;
			foreach ( $sidebars as $s =>$sidebar ) {
				if ( empty($sidebar) || !is_array($sidebar) ) { break; }
				foreach ( $sidebar as $w => $widget ) {
					if ( $widget == 'subscribe2widget' ) {
						$sidebars[$s][$w] = 'subscribe2';
						$changed = true;
					}
				}
			}
			if ( $changed ) {
				update_option('sidebar_widgets', $sidebars);
			}
		}
		restore_current_blog();
	} // end namechange_subscribe2_widget()

	/**
	Add hook for Minimeta Widget plugin
	*/
	function add_minimeta() {
		if ( $this->subscribe2_options['s2page'] != 0 ) {
			echo "<li><a href=\"" . get_option('siteurl') . "/?page_id=" . $this->subscribe2_options['s2page'] . "\">" . __('[Un]Subscribe to Posts', 'subscribe2') . "</a></li>\r\n";
		}
	} // end add_minimeta()

/* ===== Write Toolbar Button Functions ===== */
	/**
	Register our button in the QuickTags bar
	*/
	function button_init() {
		if ( !current_user_can('edit_posts') && !current_user_can('edit_pages') ) { return; }
		if ( 'true' == get_user_option('rich_editing') ) {
			// Use WordPress 2.5+ hooks
			add_filter('mce_external_plugins', array(&$this, 'mce3_plugin'));
			add_filter('mce_buttons', array(&$this, 'mce3_button'));
		} else {
			buttonsnap_separator();
			buttonsnap_jsbutton(S2URL . 'include/s2_button.png', __('Subscribe2', 'subscribe2'), 's2_insert_token();');
		}
	} // end button_init()

	/**
	Add buttons for WordPress 2.5+ using built in hooks
	*/
	function mce3_plugin($arr) {
		$path = S2URL . 'tinymce3/editor_plugin.js';
		$arr['subscribe2'] = $path;
		return $arr;
	} // end mce3_plugin()

	function mce3_button($arr) {
		$arr[] = 'subscribe2';
		return $arr;
	} // end mce3_button()

	function s2_edit_form() {
		echo "<!-- Start Subscribe2 Quicktags Javascript -->\r\n";
		echo "<script type=\"text/javascript\">\r\n";
		echo "//<![CDATA[\r\n";
		echo "function s2_insert_token() {
			buttonsnap_settext('[subscribe2]');
		}\r\n";
		echo "//]]>\r\n";
		echo "</script>\r\n";
		echo "<!-- End Subscribe2 Quicktags Javascript -->\r\n";
	} // end s2_edit_form()

/* ===== wp-cron functions ===== */
	/**
	Add a weekly event to cron
	*/
	function add_weekly_sched($sched) {
		$sched['weekly'] = array('interval' => 604800, 'display' => __('Weekly', 'subscribe2'));
		return $sched;
	} // end add_weekly_sched()

	/**
	Send a daily digest of today's new posts
	*/
	function subscribe2_cron($preview = '', $resend = '') {
		if ( defined('DOING_S2_CRON') && DOING_S2_CRON ) { return; }
		define( 'DOING_S2_CRON', true );
		global $wpdb;

		if ( '' == $preview ) {
			// update last_s2cron execution time before completing or bailing
			$now = current_time('mysql');
			$prev = $this->subscribe2_options['last_s2cron'];
			$last = $this->subscribe2_options['previous_s2cron'];
			$this->subscribe2_options['last_s2cron'] = $now;
			$this->subscribe2_options['previous_s2cron'] = $prev;
			if ( '' == $resend ) {
				// update sending times provided this is not a resend
				update_option('subscribe2_options', $this->subscribe2_options);
			}

			// set up SQL query based on options
			if ( $this->subscribe2_options['private'] == 'yes' ) {
				$status	= "'publish', 'private'";
			} else {
				$status = "'publish'";
			}

			// send notifications for allowed post type (defaults for posts and pages)
			// uses s2_post_types filter to allow for custom post types in WP 3.0
			if ( $this->subscribe2_options['pages'] == 'yes' ) {
				$s2_post_types = array('page', 'post');
			} else {
				$s2_post_types = array('post');
			}
			$s2_post_types = apply_filters('s2_post_types', $s2_post_types);
			foreach( $s2_post_types as $post_type ) {
				('' == $type) ? $type = "'$post_type'" : $type .= ", '$post_type'";
			}

			// collect posts
			if ( $resend == 'resend' ) {
				if ( $this->subscribe2_options['cron_order'] == 'desc' ) {
					$posts = $wpdb->get_results("SELECT ID, post_title, post_excerpt, post_content, post_type, post_password, post_date, post_author FROM $wpdb->posts WHERE post_date >= '$last' AND post_date < '$prev' AND post_status IN ($status) AND post_type IN ($type) ORDER BY post_date DESC");
				} else {
					$posts = $wpdb->get_results("SELECT ID, post_title, post_excerpt, post_content, post_type, post_password, post_date, post_author FROM $wpdb->posts WHERE post_date >= '$last' AND post_date < '$prev' AND post_status IN ($status) AND post_type IN ($type) ORDER BY post_date ASC");
				}
			} else {
				if ( $this->subscribe2_options['cron_order'] == 'desc' ) {
					$posts = $wpdb->get_results("SELECT ID, post_title, post_excerpt, post_content, post_type, post_password, post_date, post_author FROM $wpdb->posts WHERE post_date >= '$prev' AND post_date < '$now' AND post_status IN ($status) AND post_type IN ($type) ORDER BY post_date DESC");
				} else {
					$posts = $wpdb->get_results("SELECT ID, post_title, post_excerpt, post_content, post_type, post_password, post_date, post_author FROM $wpdb->posts WHERE post_date >= '$prev' AND post_date < '$now' AND post_status IN ($status) AND post_type IN ($type) ORDER BY post_date ASC");
				}
			}
		} else {
			// we are sending a preview
			$posts = get_posts('numberposts=1');
		}

		// do we have any posts?
		if ( empty($posts) && !has_filter('s2_digest_email') ) { return false; }
		$this->post_count = count($posts);

		// if we have posts, let's prepare the digest
		$datetime = get_option('date_format') . ' @ ' . get_option('time_format');
		$all_post_cats = array();
		$mailtext = apply_filters('s2_email_template', $this->subscribe2_options['mailtext']);
		$table = '';
		$tablelinks = '';
		$message_post= '';
		$message_posttime = '';
		foreach ( $posts as $post ) {
			$post_cats = wp_get_post_categories($post->ID);
			$post_cats_string = implode(',', $post_cats);
			$all_post_cats = array_unique(array_merge($all_post_cats, $post_cats));
			$check = false;
			// Pages are put into category 1 so make sure we don't exclude
			// pages if category 1 is excluded
			if ( $post->post_type != 'page' ) {
				// is the current post assigned to any categories
				// which should not generate a notification email?
				foreach ( explode(',', $this->subscribe2_options['exclude']) as $cat ) {
					if ( in_array($cat, $post_cats) ) {
						$check = true;
					}
				}
			}
			// is the current post set by the user to
			// not generate a notification email?
			$s2mail = get_post_meta($post->ID, 's2mail', true);
			if ( strtolower(trim($s2mail)) == 'no' ) {
				$check = true;
			}
			// is the current post private
			// and should this not generate a notification email?
			if ( $this->subscribe2_options['password'] == 'no' && $post->post_password != '' ) {
				$check = true;
			}
			// if this post is excluded
			// don't include it in the digest
			if ( $check ) {
				continue;
			}
			$post_title = html_entity_decode($post->post_title, ENT_QUOTES);
			('' == $table) ? $table .= "* " . $post_title : $table .= "\r\n* " . $post_title;
			('' == $tablelinks) ? $tablelinks .= "* " . $post_title : $tablelinks .= "\r\n* " . $post_title;
			$message_post .= $post_title;
			$message_posttime .= $post_title;
			if ( strstr($mailtext, "{AUTHORNAME}") ) {
				$author = get_userdata($post->post_author);
				if ( $author->display_name != '' ) {
					$message_post .= " (" . __('Author', 'subscribe2') . ": " . $author->display_name . ")";
					$message_posttime .= " (" . __('Author', 'subscribe2') . ": " . $author->display_name . ")";
				}
			}
			$message_post .= "\r\n";
			$message_posttime .= "\r\n";

			$tablelinks .= "\r\n" . get_permalink($post->ID) . "\r\n";
			$message_post .= get_permalink($post->ID) . "\r\n";
			$message_posttime .= __('Posted on', 'subscribe2') . ": " . mysql2date($datetime, $post->post_date) . "\r\n";
			$message_posttime .= get_permalink($post->ID) . "\r\n";
			if ( strstr($mailtext, "{CATS}") ) {
				$post_cat_names = implode(', ', wp_get_post_categories($post->ID, array('fields' => 'names')));
				$message_post .= __('Posted in', 'subscribe2') . ": " . $post_cat_names . "\r\n";
				$message_posttime .= __('Posted in', 'subscribe2') . ": " . $post_cat_names . "\r\n";
			}
			if ( strstr($mailtext, "{TAGS}") ) {
				$post_tag_names = implode(', ', wp_get_post_tags($post->ID, array('fields' => 'names')));
				if ( $post_tag_names != '' ) {
					$message_post .= __('Tagged as', 'subscribe2') . ": " . $post_tag_names . "\r\n";
					$message_posttime .= __('Tagged as', 'subscribe2') . ": " . $post_tag_names . "\r\n";
				}
			}
			$message_post .= "\r\n";
			$message_posttime .= "\r\n";

			$excerpt = $post->post_excerpt;
			if ( '' == $excerpt ) {
				// no excerpt, is there a <!--more--> ?
				if ( false !== strpos($post->post_content, '<!--more-->') ) {
					list($excerpt, $more) = explode('<!--more-->', $post->post_content, 2);
					$excerpt = strip_tags($excerpt);
					if ( function_exists('strip_shortcodes') ) {
						$excerpt = strip_shortcodes($excerpt);
					}
				} else {
					$excerpt = strip_tags($post->post_content);
					if ( function_exists('strip_shortcodes') ) {
						$excerpt = strip_shortcodes($excerpt);
					}
					$words = explode(' ', $excerpt, $this->excerpt_length + 1);
					if ( count($words) > $this->excerpt_length ) {
						array_pop($words);
						array_push($words, '[...]');
						$excerpt = implode(' ', $words);
					}
				}
				// strip leading and trailing whitespace
				$excerpt = trim($excerpt);
			}
			$message_post .= $excerpt . "\r\n\r\n";
			$message_posttime .= $excerpt . "\r\n\r\n";
		}

		// we add a blank line after each post excerpt now trim white space that occurs for the last post
		$message_post = trim($message_post);
		$message_posttime = trim($message_posttime);

		// apply filter to allow external content to be inserted or content manipulated
		$message_post = apply_filters('s2_digest_email', $message_post, $now, $prev, $last, $this->subscribe2_options['cron_order']);
		$message_posttime = apply_filters('s2_digest_email', $message_posttime, $now, $prev, $last, $this->subscribe2_options['cron_order']);

		//sanity check - don't send a mail if the content is empty
		if ( !$message_post && !$message_posttime && !$table && !$tablelinks ) {
			return;
		}

		// get sender details
		if ( $this->subscribe2_options['sender'] == 'blogname' ) {
			$this->myname = html_entity_decode(get_option('blogname'), ENT_QUOTES);
			$this->myemail = get_bloginfo('admin_email');
		} else {
			$user = $this->get_userdata($this->subscribe2_options['sender']);
			$this->myemail = $user->user_email;
			$this->myname = html_entity_decode($user->display_name, ENT_QUOTES);
		}

		$scheds = (array)wp_get_schedules();
		$email_freq = $this->subscribe2_options['email_freq'];
		$display = $scheds[$email_freq]['display'];
		( '' == get_option('blogname') ) ? $subject = "" : $subject = "[" . stripslashes(get_option('blogname')) . "] ";
		$subject .= $display . " " . __('Digest Email', 'subscribe2');
		$mailtext = str_replace("{TABLELINKS}", $tablelinks, $mailtext);
		$mailtext = str_replace("{TABLE}", $table, $mailtext);
		$mailtext = str_replace("{POSTTIME}", $message_posttime, $mailtext);
		$mailtext = str_replace("{POST}", $message_post, $mailtext);
		$mailtext = stripslashes($this->substitute($mailtext));

		// prepare recipients
		if ( $preview != '' ) {
			$this->myemail = $preview;
			$this->myname = __('Digest Preview', 'subscribe2');
			$this->mail(array($preview), $subject, $mailtext);
		} else {
			$public = $this->get_public();
			$all_post_cats_string = implode(',', $all_post_cats);
			$registered = $this->get_registered("cats=$all_post_cats_string");
			$recipients = array_merge((array)$public, (array)$registered);
			$this->mail($recipients, $subject, $mailtext);
		}
	} // end subscribe2_cron()

/* ===== Our constructor ===== */
	/**
	Subscribe2 constructor
	*/
	function s2init() {
		// load the options
		$this->subscribe2_options = get_option('subscribe2_options');
		// if SCRIPT_DEBUG is true, use dev scripts
		$this->script_debug = ( defined('SCRIPT_DEBUG') && SCRIPT_DEBUG ) ? '.dev' : '';

		add_action('init', array(&$this, 'subscribe2'));
		if ( '1' == $this->subscribe2_options['show_button'] ) {
			add_action('init', array(&$this, 'button_init'));
		}

		// add action to display widget if option is enabled
		if ( '1' == $this->subscribe2_options['widget'] ) {
			add_action('widgets_init', array(&$this, 'subscribe2_widget'));
		}

		// add action to display counter widget if option is enabled
		if ( '1' == $this->subscribe2_options['counterwidget'] ) {
			add_action('admin_init', array(&$this, 'widget_s2counter_css_and_js'));
			add_action('widgets_init', array(&$this, 'counter_widget'));
		}

		// add action to handle WPMU subscriptions and unsubscriptions
		if ( isset($_GET['s2mu_subscribe']) || isset($_GET['s2mu_unsubscribe']) ) {
			add_action('init', array(&$this, 'wpmu_subscribe'));
		}
	} // end s2init()

	function subscribe2() {
		global $wpdb, $table_prefix, $wp_version, $wpmu_version;

		load_plugin_textdomain('subscribe2', 'wp-content/plugins/' . S2DIR, '/' . S2DIR);

		// Is this WordPressMU or not?
		$this->s2_mu = false;
		if ( isset($wpmu_version) || strpos($wp_version, 'wordpress-mu') ) {
			$this->s2_mu = true;
		}
		if ( function_exists('is_multisite') && is_multisite() ) {
			$this->s2_mu = true;
		}

		// do we need to install anything?
		$this->public = $table_prefix . "subscribe2";
		if ( $wpdb->get_var("SHOW TABLES LIKE '{$this->public}'") != $this->public ) { $this->install(); }
		//do we need to upgrade anything?
		if ( is_array($this->subscribe2_options) && $this->subscribe2_options['version'] !== S2VERSION ) {
			add_action('shutdown', array(&$this, 'upgrade'));
		}

		if ( isset($_GET['s2']) ) {
			// someone is confirming a request
			if ( defined('DOING_S2_CONFIRM') && DOING_S2_CONFIRM ) { return; }
			define( 'DOING_S2_CONFIRM', true );
			add_filter('query_string', array(&$this, 'query_filter'));
			add_filter('the_title', array(&$this, 'title_filter'));
			add_filter('the_content', array(&$this, 'confirm'));
		}

		if ( isset($_POST['s2_admin']) && $_POST['csv'] ) {
			$date = date('Y-m-d');
			header("Content-Description: File Transfer");
			header("Content-type: application/octet-stream");
			header("Content-Disposition: attachment; filename=subscribe2_users_$date.csv");
			header("Pragma: no-cache");
			header("Expires: 0");
			echo $this->prepare_export($_POST['exportcsv']);
			exit(0);
		}

		//add regular actions and filters
		add_action('admin_menu', array(&$this, 'admin_menu'));
		add_action('admin_menu', array(&$this, 's2_meta_init'));
		add_action('save_post', array(&$this, 's2_meta_handler'));
		add_action('create_category', array(&$this, 'new_category'));
		add_action('delete_category', array(&$this, 'delete_category'));
		add_shortcode('subscribe2', array(&$this, 'shortcode'));
		add_filter('the_content', array(&$this, 'filter'), 10);
		add_filter('cron_schedules', array(&$this, 'add_weekly_sched'));

		// add actions for other plugins
		if ( '1' == $this->subscribe2_options['show_meta'] ) {
			add_action('wp_meta', array(&$this, 'add_minimeta'), 0);
		}

		// Add filters for Ozh Admin Menu
		if ( function_exists('wp_ozh_adminmenu') ) {
			add_filter('ozh_adminmenu_icon_s2_posts', array(&$this, 'ozh_s2_icon'));
			add_filter('ozh_adminmenu_icon_s2_users', array(&$this, 'ozh_s2_icon'));
			add_filter('ozh_adminmenu_icon_s2_tools', array(&$this, 'ozh_s2_icon'));
			add_filter('ozh_adminmenu_icon_s2_settings', array(&$this, 'ozh_s2_icon'));
		}

		// add action to display editor buttons if option is enabled
		if ( '1' == $this->subscribe2_options['show_button'] ) {
			add_action('edit_page_form', array(&$this, 's2_edit_form'));
			add_action('edit_form_advanced', array(&$this, 's2_edit_form'));
		}

		// add actions for automatic subscription based on option settings
		add_action('register_form', array(&$this, 'register_form'));
		add_action('user_register', array(&$this, 'register_post'));
		if ( $this->s2_mu ) {
			add_action('add_user_to_blog', array(&$this, 'wpmu_add_user'), 10);
			add_action('remove_user_from_blog', array(&$this, 'wpmu_remove_user'), 10);
		}

		// add actions for processing posts based on per-post or cron email settings
		if ( $this->subscribe2_options['email_freq'] != 'never' ) {
			add_action('s2_digest_cron', array(&$this, 'subscribe2_cron'));
		} else {
			add_action('new_to_publish', array(&$this, 'publish'));
			add_action('draft_to_publish', array(&$this, 'publish'));
			add_action('pending_to_publish', array(&$this, 'publish'));
			add_action('private_to_publish', array(&$this, 'publish'));
			add_action('future_to_publish', array(&$this, 'publish'));
			if ( $this->subscribe2_options['private'] == 'yes' ) {
				add_action('new_to_private', array(&$this, 'publish'));
				add_action('draft_to_private', array(&$this, 'publish'));
				add_action('pending_to_private', array(&$this, 'publish'));
			}
		}

		// add actions for comment subscribers
		if ( 'no' != $this->subscribe2_options['comment_subs'] ) {
			if ( 'before' == $this->subscribe2_options['comment_subs'] ) {
				add_action('comment_form_after_fields', array(&$this, 's2_comment_meta_form'));
			} else {
				add_action('comment_form', array(&$this, 's2_comment_meta_form'));
			}
			add_action('comment_post', array(&$this, 's2_comment_meta'), 1);
			add_action('wp_set_comment_status', array(&$this, 'comment_status'));
		}

		// load our strings
		$this->load_strings();
	} // end subscribe2()

/* ===== our variables ===== */
	// cache variables
	var $subscribe2_options = array();
	var $all_public = '';
	var $all_unconfirmed = '';
	var $excluded_cats = '';
	var $post_title = '';
	var $permalink = '';
	var $myname = '';
	var $myemail = '';
	var $signup_dates = array();
	var $filtered = 0;
	var $preview_email = false;

	// state variables used to affect processing
	var $action = '';
	var $email = '';
	var $message = '';
	var $excerpt_length = 55;

	// some messages
	var $please_log_in = '';
	var $use_profile_admin = '';
	var $use_profile_users = '';
	var $confirmation_sent = '';
	var $already_subscribed = '';
	var $not_subscribed ='';
	var $not_an_email = '';
	var $barred_domain = '';
	var $error = '';
	var $mail_sent = '';
	var $mail_failed = '';
	var $form = '';
	var $no_such_email = '';
	var $added = '';
	var $deleted = '';
	var $subscribe = '';
	var $unsubscribe = '';
	var $confirm_subject = '';
	var $options_saved = '';
	var $options_reset = '';
} // end class subscribe2
?>