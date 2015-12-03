<?php
/**
 * Calling fastcgi_finish_request on shutdown
 *
 * @package fastcgi_finish_request
 * @version 1.0
 */

/*
Plugin Name: fastcgi_finish_request
Plugin URI: https://ubuntudanmark.dk/
Description: Plugin to make WordPress faster when running on a fcgi setup by calling fastcgi_finish_request.
Author: Anders Jenbo
Version: 1.0
*/

add_action(
	'shutdown',
	function () {
		if ( function_exists( 'fastcgi_finish_request' ) ) {
			fastcgi_finish_request();
		}
	},
	1
);
