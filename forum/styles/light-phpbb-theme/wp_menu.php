<?php
define('WP_USE_THEMES', false);
require('../../../' . 'wp-load.php');

//ob_start();
thematic_header();
exit;
$primary_header_menu = ob_get_clean();
$primary_header_menu = preg_replace(
    '#(.+)class="menu-item (.+?)href="/forum/"#s',
    '\1class="menu-item current-menu-item \2href="/forum/"',
    $primary_header_menu
);
preg_match('#.+href="/forum/".+?/a>#s', $primary_header_menu, $match);
echo $match[0];
