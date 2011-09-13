<?php
class S2_Form_widget extends WP_Widget {
	/**
	Declares the Subscribe2 widget class.
	*/
	function S2_Form_widget() {
		$widget_ops = array('classname' => 's2_form_widget', 'description' => __('Sidebar Widget for Subscribe2', 'subscribe2') );
		$control_ops = array('width' => 250, 'height' => 300);
		$this->WP_Widget('s2_form_widget', __('Subscribe2 Widget'), $widget_ops, $control_ops);
	}
	
	/**
	Displays the Widget
	*/
	function widget($args, $instance) {
		extract($args);
		$title = empty($instance['title']) ? __('Subscribe2', 'subscribe2') : $instance['title'];
		$div = empty($instance['div']) ? 'search' : $instance['div'];
		$widgetprecontent = empty($instance['widgetprecontent']) ? '' : $instance['widgetprecontent'];
		$widgetpostcontent = empty($instance['widgetpostcontent']) ? '' : $instance['widgetpostcontent'];
		$hidebutton = empty($instance['hidebutton']) ? 'none' : $instance['hidebutton'];
		$postto = empty($instance['postto']) ? '' : $instance['postto'];
		if ( $hidebutton == 'subscribe' || $hidebutton == 'unsubscribe' ) {
			$hide = " hide=\"" . $hidebutton . "\"";
		}
		if ( $postto ) {
			$postid = " id=\"" . $postto . "\"";
		}
		$shortcode = "[subscribe2" . $hide . $postid . "]";
		echo $before_widget;
		echo $before_title . $title . $after_title;
		echo "<div class=\"" . $div . "\">";
		$content = do_shortcode( $shortcode );
		if ( !empty($widgetprecontent) ) {
			echo $widgetprecontent;
		}
		echo $content;
		if ( !empty($widgetpostcontent) ) {
			echo $widgetpostcontent;
		}
		echo "</div>";
		echo $after_widget;
	}
	
	/**
	Saves the widgets settings.
	*/
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags(stripslashes($new_instance['title']));
		$instance['div'] = strip_tags(stripslashes($new_instance['div']));
		$instance['widgetprecontent'] = stripslashes($new_instance['widgetprecontent']);
		$instance['widgetpostcontent'] = stripslashes($new_instance['widgetpostcontent']);
		$instance['hidebutton'] = strip_tags(stripslashes($new_instance['hidebutton']));
		$instance['postto'] = stripslashes($new_instance['postto']);
		
		return $instance;
	}
	
	/**
	Creates the edit form for the widget.
	*/
	function form($instance) {
		// set some defaults, getting any old options first
		$options = get_option('widget_subscribe2widget');
		if ( $options === false ) {
			$defaults = array('title' => 'Subscribe2', 'div' => 'search', 'widgetprecontent' => '', 'widgetpostcontent' => '', 'hidebutton' => 'none', 'postto' => '');
		} else {
			$defaults = array('title' => $options['title'], 'div' => $options['div'], 'widgetprecontent' => $options['widgetprecontent'], 'widgetpostcontent' => $options['widgetpostcontent'], 'hidebutton' => $options['hidebutton'], 'postto' => $options['postto']);
			delete_option('widget_subscribe2widget');
		}
		// code to obtain old settings too
		$instance = wp_parse_args( (array) $instance, $defaults);
		
		$title = htmlspecialchars($instance['title'], ENT_QUOTES);
		$div= htmlspecialchars($instance['div'], ENT_QUOTES);
		$widgetprecontent = htmlspecialchars($instance['widgetprecontent'], ENT_QUOTES);
		$widgetpostcontent = htmlspecialchars($instance['widgetpostcontent'], ENT_QUOTES);
		$hidebutton = htmlspecialchars($instance['hidebutton'], ENT_QUOTES);
		$postto = htmlspecialchars($instance['postto'], ENT_QUOTES);

		global $wpdb;
		$sql = "SELECT ID, post_title FROM $wpdb->posts WHERE post_type='page' AND post_status='publish'";
		$pages = $wpdb->get_results($sql);

		echo "<div>\r\n";
		echo "<p><label for=\"" . $this->get_field_name('title') . "\">" . __('Title', 'subscribe2') . ":\r\n";
		echo "<input class=\"widefat\" id=\"" . $this->get_field_id('title') . "\" name=\"" . $this->get_field_name('title') . "\" type=\"text\" value=\"" . $title . "\" /></label></p>\r\n";
		echo "<p><label for=\"" . $this->get_field_name('div') . "\">" . __('Div class name', 'subscribe2') . ":\r\n";
		echo "<input class=\"widefat\" id=\"" . $this->get_field_id('div') . "\" name=\"" . $this->get_field_name('div') . "\" type=\"text\" value=\"" . $div . "\" /></label></p>\r\n";
		echo "<p><label for=\"" . $this->get_field_name('widgetprecontent') . "\">" . __('Pre-Content', 'subscribe2') . ":\r\n";
		echo "<textarea class=\"widefat\" id=\"" . $this->get_field_name('widgetprecontent') . "\" name=\"" . $this->get_field_name('widgetprecontent') . "\" rows=\"2\" cols=\"25\">" . $widgetprecontent . "</textarea></label></p>\r\n";
		echo "<p><label for=\"" . $this->get_field_name('widgetpostcontent') . "\">" . __('Post-Content', 'subscribe2') . ":\r\n";
		echo "<textarea class=\"widefat\" id=\"" . $this->get_field_id('widgetpostcontent') . "\" name=\"" . $this->get_field_name('widgetpostcontent') . "\" rows=\"2\" cols=\"25\">" . $widgetpostcontent . "</textarea></label></p>\r\n";
		echo "<p><label for=\"" . $this->get_field_name('hidebutton') . "\">" . __('Hide button', 'subscribe2') . ":<br />\r\n";
		echo "<input name=\"" . $this->get_field_name('hidebutton') . "\" type=\"radio\" value=\"none\"". checked('none', $hidebutton, false) . "/>" . __('None', 'subscribe2') . "<br /><input name=\"" . $this->get_field_name('hidebutton') . "\" type=\"radio\" value=\"subscribe\"". checked('subscribe', $hidebutton, false) . "/>" . __('Subscribe', 'subscribe2') . "<br /><input name=\"" . $this->get_field_name('hidebutton') . "\" type=\"radio\" value=\"unsubscribe\"". checked('unsubscribe', $hidebutton, false) . "/>" . __('Unsubscribe', 'subscribe2') . "</label></p>\r\n";
		if ( !empty($pages) ) {
			echo "<p><label for=\"" . $this->get_field_name('postto') . "\">" . __('Post form content to page', 'subscribe2') . ":\r\n";
			echo "<select id=\"" . $this->get_field_id('postto') . "\" name=\"" . $this->get_field_name('postto') . "\">\r\n";
			echo "<option value=\"\">" . __('Use Subscribe2 Default', 'subscribe2') . "</option>\r\n";
			global $mysubscribe2;
			$mysubscribe2->pages_dropdown($postto);
			echo "</select></label></p>\r\n";
		}
		echo "</div>\r\n";
	}
} // End S2_Form_widget class
?>