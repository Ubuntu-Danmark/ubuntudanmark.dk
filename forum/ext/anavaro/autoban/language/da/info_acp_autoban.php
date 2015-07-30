<?php

/**
*
* Auto Ban [Danish]
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
	'AUTOBAN_ACTIVE'	=> 'Automatisk udelukkelse',
	'AUTOBAN_ACTIVE_EXPLAIN'	=> 'Aktivér automatisk udelukkelse på et defineret antal advarsler',
	'AUTOBAN_COUNT'	=> 'Advarsels antal',
	'AUTOBAN_COUNT_EXPLAIN'	=> 'Hvor mange advarsler kræves for automatisk udelukkelse',
	'AUTOBAN_DURATION'	=> 'Varighed af automatisk udelukkelse',
	'AUTOBAN_DURATION_EXPLAIN'	=> 'Varighed i dage for automatisk udelukkelse',
	'AUTOBAN_REASON'	=> 'Årsag til udelukkelse',
	'AUTOBAN_REASON_EXPLAIN'	=> 'Årsag til udelukkelse af bruger'
));
