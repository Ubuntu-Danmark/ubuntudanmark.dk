<?php

/**
*
* newspage [Bulgarian]
*
* @package language
* @version $Id$
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
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
	'AUTOBAN_ACTIVE'	=> 'Автоматично банване',
	'AUTOBAN_ACTIVE_EXPLAIN'	=> 'Активирай автоматичното банване след определен брой предупреждения',
	'AUTOBAN_COUNT'	=> 'Брой предупреждения',
	'AUTOBAN_COUNT_EXPLAIN'	=> 'Брой предупреждения след които потребителя да бъде баннат',
	'AUTOBAN_DURATION'	=> 'Период за автоматичния бан',
	'AUTOBAN_DURATION_EXPLAIN'	=> 'Период за който да е активен автоматичния бан в дни.',
	'AUTOBAN_REASON'	=> 'Причина за бана',
	'AUTOBAN_REASON_EXPLAIN'	=> 'Каква е причината поради която потребителя е баннат'
));
