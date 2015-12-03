<?php
define('WP_USE_THEMES', false);
require('../../../' . 'wp-load.php');

ob_start();
thematic_header();
$primary_header_menu = ob_get_clean();
$primary_header_menu = preg_replace(
	'#(.+)class="menu-item (.+?)href="/forum/"#s',
	'\1class="menu-item current-menu-item \2href="/forum/"',
	$primary_header_menu
);
preg_match('#.+href="/forum/".+?/a>#s', $primary_header_menu, $match);

header('Content-Type: application/json');
echo json_encode(
	[
		$match[0],
		mb_substr($primary_header_menu, mb_strlen($match[0])),
	]
);

if (function_exists('fastcgi_finish_request')) {
	fastcgi_finish_request();
}
