<?php
/**
*
* @package phpBB Extension - Default Gravatar
* @copyright (c) 2015 Anders Jenbo
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

$lang = array_merge($lang, array(
	'ACP_DEFAULT_GRAVATAR_TITLE'	=> 'Standard Gravatar',
	'ACP_DEFAULT_GRAVATAR_SIZE'		=> 'Størrelse',
	'ACP_DEFAULT_GRAVATAR_SAVED'	=> 'Settings have been saved successfully!',
));
