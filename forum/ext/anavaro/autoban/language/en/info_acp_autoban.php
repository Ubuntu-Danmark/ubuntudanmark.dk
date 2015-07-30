<?php

/**
*
* Auto Ban [English]
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
	'AUTOBAN_ACTIVE'	=> 'Auto Ban',
	'AUTOBAN_ACTIVE_EXPLAIN'	=> 'Activate banning on certain count of warnings',
	'AUTOBAN_COUNT'	=> 'Warnings count',
	'AUTOBAN_COUNT_EXPLAIN'	=> 'How many warnings for user to auto ban',
	'AUTOBAN_DURATION'	=> 'Auto Ban Duration',
	'AUTOBAN_DURATION_EXPLAIN'	=> 'Duration in days for the automatic ban',
	'AUTOBAN_REASON'	=> 'Ban reason',
	'AUTOBAN_REASON_EXPLAIN'	=> 'Reason for user ban'
));
