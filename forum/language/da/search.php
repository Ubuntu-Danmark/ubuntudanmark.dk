<?php
/**
*
* search [Danish]
*
* @package language
* @version Id: search.php 10790 2010-09-16 20:45:17Z git-gate $
* @version $Id: search.php 77 2010-09-18 06:34:58Z jan skovsgaard $
* @source file is copyright (c) 2005 phpBB Group
* @modified and translated by Olympus DK Team
* @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
*
* This file is part of the Danish language package for phpBB 3.x.x.
* Copyright (c) 2006, 2007, 2008 Olympus DK Team
*
* The package is free software; you can redistribute it and/or modify it under the terms of the GNU
* General Public License as published by the Free Software Foundation, version 2 of the License.
*
* The Danish language package is distributed in the hope that it will be useful, but WITHOUT ANY
* WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR
* A PARTICULAR PURPOSE. See the GNU General Public License for more details.
*
* You should have received a copy of the GNU General Public License along with this language
* package. If not, see <http://www.gnu.org/licenses/old-licenses/gpl-2.0.html>.
*
*/

/**
* DO NOT CHANGE
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

// DEVELOPERS PLEASE NOTE 
//
// All language files should use UTF-8 as their encoding and the files must not contain a BOM.
//
// Placeholders can now contain order information, e.g. instead of
// 'Page %s of %s' you can (and should) write 'Page %1$s of %2$s', this allows
// translators to re-order the output of data while ensuring it remains correct
//
// You do not need this where single placeholders are used, e.g. 'Message %d' is fine
// equally where a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., 'Click %sHERE%s' is fine

$lang = array_merge($lang, array(
	'ALL_AVAILABLE'			=> 'Alle',
	'ALL_RESULTS'			=> 'Alle søgeresultater',

	'DISPLAY_RESULTS'		=> 'Vis resultater som',

	'FOUND_SEARCH_MATCH'	=> 'Søgningen gav %d træffer',
	'FOUND_SEARCH_MATCHES'	=> 'Søgningen gav %d træffere',
	'FOUND_MORE_SEARCH_MATCHES'	=> 'Søgningen gav mere end %d træffere',

	'GLOBAL'				=> 'Global bekendtgørelse',

	'IGNORED_TERMS'			=> 'ignoreret',
	'IGNORED_TERMS_EXPLAIN'	=> 'Følgende ord: <strong>%s</strong> - er for alment anvendt og blev ignoreret i søgningen.',

	'JUMP_TO_POST'			=> 'Hop til indlæg',

	'LOGIN_EXPLAIN_EGOSEARCH'	=> 'Du skal være tilmeldt som bruger og logget ind for at få vist egne indlæg.',
	'LOGIN_EXPLAIN_UNREADSEARCH'	=> 'Du skal være tilmeldt som bruger og logget ind for at få vist dine ulæste indlæg.',
	
	'MAX_NUM_SEARCH_KEYWORDS_REFINE'	=> 'Du søgte efter for mange ord, en søgning må maksimalt indeholde %1$d ord.',

	'NO_KEYWORDS'			=> 'Du skal angive mindst et søgeord. Hvert ord skal bestå af mindst %d tegn og højst %d tegn (eksklusiv ubekendte).',
	'NO_RECENT_SEARCHES'	=> 'Ingen søgning er foretaget for nylig.',
	'NO_SEARCH'				=> 'Beklager, du har ikke tilladelse til at benytte søgefunktionen.',
	'NO_SEARCH_RESULTS'		=> 'Intet emne eller indlæg passer til dine søgekriterier.',
	'NO_SEARCH_TIME'		=> 'Beklager, søgefunktionen kan ikke bruges lige nu. Prøv venligst igen om få minutter.',
	'NO_SEARCH_UNREADS'    => 'Beklager, søgning efter ulæste indlæg er deaktiveret på boardet.',
	'WORD_IN_NO_POST'		=> 'Ingen indlæg blev fundet, ordet <strong>%s</strong> forekommer ikke i noget indlæg.',
	'WORDS_IN_NO_POST'		=> 'Ingen indlæg blev fundet, ordene <strong>%s</strong> forekommer ikke i noget indlæg.',

	'POST_CHARACTERS'		=> 'tegn i indlæg',

	'RECENT_SEARCHES'		=> 'Nylige søgninger',
	'RESULT_DAYS'			=> 'Afgræns resultater til forrige',
	'RESULT_SORT'			=> 'Sorter resultater efter',
	'RETURN_FIRST'			=> 'Vis første',
	'RETURN_TO_SEARCH_ADV'	=> 'Tilbage til avanceret søgning',

	'SEARCHED_FOR'			=> 'Anvendt søgeord',
	'SEARCHED_TOPIC'		=> 'Det søgte emne',
	'SEARCH_ALL_TERMS'		=> 'Søg efter alle udtryk eller brug indtastet søgeparameter ',
	'SEARCH_ANY_TERMS'		=> 'Søg efter alle udtryk',
	'SEARCH_AUTHOR'			=> 'Søg efter en bestemt forfatter',
	'SEARCH_AUTHOR_EXPLAIN'	=> 'Brug * som ubekendt for ukendte tegn.',
	'SEARCH_FIRST_POST'		=> 'Kun første indlæg i emnet',
	'SEARCH_FORUMS'			=> 'Søg i fora',
	'SEARCH_FORUMS_EXPLAIN'	=> 'Vælg det forum eller de fora du vil søge i. Der søges automatisk i underfora medmindre du fravælger "Søg i underfora" herunder.',
	'SEARCH_IN_RESULTS'		=> 'Søg i fundne træffere',
	'SEARCH_KEYWORDS_EXPLAIN'	=> 'Sæt <strong>+</strong> foran et søgeord der skal findes og <strong>-</strong> foran et søgeord der skal udelukkes i søgningen.<br />Skriv mange søgeord adskilt med <strong>|</strong> og omgivet af parantes, når blot et af ordene skal findes. <br />Brug * som ubekendt for ukendte tegn.',
	'SEARCH_MSG_ONLY'		=> 'Søg kun i beskedfeltet',
	'SEARCH_OPTIONS'		=> 'Søgemuligheder',
	'SEARCH_QUERY'			=> 'Søgeord',
	'SEARCH_SUBFORUMS'		=> 'Søg i underfora',
	'SEARCH_TITLE_MSG'		=> 'Indlæggets overskrift og beskedfelt',
	'SEARCH_TITLE_ONLY'		=> 'Emnets overskrift',
	'SEARCH_WITHIN'			=> 'Søg i',
	'SORT_ASCENDING'		=> 'Stigende',
	'SORT_AUTHOR'			=> 'Forfatter',
	'SORT_DESCENDING'		=> 'Faldende',
	'SORT_FORUM'			=> 'Forum',
	'SORT_POST_SUBJECT'		=> 'Indlæggets overskrift',
	'SORT_TIME'				=> 'Indlæggets dato',

	'TOO_FEW_AUTHOR_CHARS'	=> 'Du skal angive mindst %d tegn af forfatterens navn',
));

?>