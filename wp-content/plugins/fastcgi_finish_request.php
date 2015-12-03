<?php
/**
 * @package fastcgi_finish_request
 * @version 1.0
 */
/*
Plugin Name: fastcgi_finish_request
Plugin URI: https://ubuntudanmark.dk/
Description: This plugin makes WordPress call fastcgi_finish_request() when outputting the page, speeding thing up for Nginx and the likes.
Author: Anders Jenbo
Version: 1.0
*/

add_action(
	'shutdown',
	function () {
		if (function_exists('fastcgi_finish_request')) {
			fastcgi_finish_request();
		}
	},
	1
);
