<?php
/*
Plugin Name: Simple WP FirePHP
Plugin URI: http://kinrowan.net/wordpress/Simple-WP-FirePHP
Description: Simplify Including FIrePHP extensions in a Wordpress install for inline debugging
Version: 0.2.0
Author: Cori Schlegel
Author URI: http://kinrowan.net
*/

/*
    Copyright 2010 Cori Schlegel
    Licensed under the DBAD License, Version 0.1 (the "License"); you may not use this Software except in compliance with the License. A copy of the License should have been included with the Software, or you may obtain a copy of the License at http://github.com/SFEley/candy/blob/master/LICENSE.markdown
    Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the specific language governing permissions and limitations under the License.

Changelog:
v.0.1: Alpha
v.0.2:	*	Included the DBAD License
	*	Simple WP FirePHP loads first
	*	credit where credit is due (i.e. mostly not me)
	
Credits: 
	Plugin load fisrt code is used with props to Ivan Weiler and cribbed shamelessly from his Wordpress FirePHP plugin  [http://inchoo.net/wordpress/wordpress-firephp-plugin/] via Chandima Cumaranatunge's Wordpress Logger plugin [http://wordpress.org/extend/plugins/wordpress-logger/].  In fact, I decided to do this before seeing his plugin, and if his were in the http://wordpress.org/extend/plugins directory I wouldn't have done it at all.
	Thanks to Frank Bültge, whose WP-FirePHP plugin [http://wordpress.org/extend/plugins/wp-firephp/] looks amazing, even if it is more than my needs dictate.
	Thanks to Cristhoph Dorn and the FirePHP [http://www.firephp.org/] crew for the tools that all this is based on.
*/

function activation_hook(){
		
	$simple_wp_firephp = plugin_basename(__FILE__);
		
	$active_plugins = get_option('active_plugins');
		
	$new_active_plugins = array();
		
	array_push($new_active_plugins, $simple_wp_firephp);
		
	foreach($active_plugins as $plugin)
		if($plugin!=$simple_wp_firephp) $new_active_plugins[] = $plugin;
				
	update_option('active_plugins',$new_active_plugins);
}
	
	
function pre_update_option_active_plugins($newvalue){
		
	$simple_wp_firephp = plugin_basename(__FILE__);
	
	if(!in_array($simple_wp_firephp,$newvalue)) return $newvalue;
	
	$new_active_plugins = array();
	
	array_push($new_active_plugins, $simple_wp_firephp);
	
	foreach($newvalue as $plugin)
		if($plugin!=$simple_wp_firephp) $new_active_plugins[] = $plugin;
		
	return $new_active_plugins;
}

/*	load the important stuff	*/
include_once( "FirePHPCore/FirePHP.class.php");
include_once( "FirePHPCore/fb.php");

/* Force Simple-WP-FirePHP to load before other plugins */
register_activation_hook( __FILE__, 'activation_hook' );
add_filter( 'pre_update_option_active_plugins', 'pre_update_option_active_plugins' );


?>
