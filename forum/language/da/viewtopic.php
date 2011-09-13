<?php
/**
*
* viewtopic [Danish]
*
* @package language
* @version Id: viewtopic.php 9972 2009-08-14 08:42:46Z Kellanved $
* @version $Id: viewtopic.php 39 2010-03-06 12:43:59Z jan skovsgaard $
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
	'ATTACHMENT'						=> 'Vedhæftet fil',
	'ATTACHMENT_FUNCTIONALITY_DISABLED'	=> 'Vedhæftning af filer er slået fra.',

	'BOOKMARK_ADDED'		=> 'Bogmærke for emnet er tilføjet.',
	'BOOKMARK_ERR'			=> 'Det lykkedes ikke at bogmærke emnet. Forsøg venligst igen.',
	'BOOKMARK_REMOVED'		=> 'Bogmærke for emnet er fjernet.',
	'BOOKMARK_TOPIC'		=> 'Bogmærk emne',
	'BOOKMARK_TOPIC_REMOVE'	=> 'Fjern fra bogmærker',
	'BUMPED_BY'				=> 'Senest placeret øverst af %1$s %2$s.',
	'BUMP_TOPIC'			=> 'Placer emne øverst',

	'CODE'					=> 'Kode',
	'COLLAPSE_QR'			=> 'Skjul kommentarfelt',

	'DELETE_TOPIC'			=> 'Slet emne',
	'DOWNLOAD_NOTICE'		=> 'Du har ikke de nødvendige tilladelser til at se vedhæftede filer i dette indlæg.',

	'EDITED_TIMES_TOTAL'	=> 'Senest rettet af %1$s %2$s, rettet i alt %3$d gange.',
	'EDITED_TIME_TOTAL'		=> 'Senest rettet af %1$s %2$s, rettet i alt %3$d gang.',
	'EMAIL_TOPIC'			=> 'Email emne til ven',
	'ERROR_NO_ATTACHMENT'	=> 'Den valgte vedhæftede fil eksisterer ikke længere.',

	'FILE_NOT_FOUND_404'	=> 'Filen <strong>%s</strong> eksisterer ikke.',
	'FORK_TOPIC'			=> 'Kopier emne',

	'FULL_EDITOR'			=> 'Komplet skrivefelt',	//Full Editor

	'LINKAGE_FORBIDDEN'		=> 'Du har ikke tilladelse til at se, downloade fra, eller linke til/fra denne side.',
	'LOGIN_NOTIFY_TOPIC'	=> 'Du er blevet informeret om dette emne, log venligst ind for at se det.',
	'LOGIN_VIEWTOPIC'		=> 'Boardadministratoren kræver at du er tilmeldt og logget ind for at se dette emne.',

	'MAKE_ANNOUNCE'				=> 'Ændre til "Bekendtgørelse"',
	'MAKE_GLOBAL'				=> 'Ændre til "Global bekendtgørelse"',
	'MAKE_NORMAL'				=> 'Ændre til "Standardemne"',
	'MAKE_STICKY'				=> 'Ændre til "Opslag"',
	'MAX_OPTIONS_SELECT'		=> 'Du kan vælge op til <strong>%d</strong> muligheder',
	'MAX_OPTION_SELECT'			=> 'Du kan vælge <strong>1</strong> mulighed',
	'MISSING_INLINE_ATTACHMENT'	=> 'Den vedhæftede fil <strong>%s</strong> er ikke længere tilgængelig',
	'MOVE_TOPIC'				=> 'Flyt emne',

	'NO_ATTACHMENT_SELECTED'=> 'Du har ikke valgt en vedhæftet fil at downloade eller se.',
	'NO_NEWER_TOPICS'		=> 'Der er ingen nyere emner i dette forum.',
	'NO_OLDER_TOPICS'		=> 'Der er ingen ældre emner i dette forum.',
	'NO_UNREAD_POSTS'		=> 'Der er ingen nye ulæste indlæg i dette emne.',
	'NO_VOTE_OPTION'		=> 'Du skal vælge en afstemningsmulighed når du stemmer.',
	'NO_VOTES'				=> 'Ingen stemmer',

	'POLL_ENDED_AT'			=> 'Afstemning sluttede %s',
	'POLL_RUN_TILL'			=> 'Afstemningen varer indtil %s',
	'POLL_VOTED_OPTION'		=> 'Du stemte på denne afstemningsmulighed',
	'PRINT_TOPIC'			=> 'Udskriv emne',

	'QUICK_MOD'				=> 'Redigeringsværktøjer',
	'QUICKREPLY'				=> 'Skriv en kommentar',
	'QUOTE'					=> 'Citat',

	'REPLY_TO_TOPIC'		=> 'Svar på emne',
	'RETURN_POST'			=> '%sTilbage til indlægget%s',

	'SHOW_QR'					=> 'Kommenter',
	'SUBMIT_VOTE'			=> 'Stem',

	'TOTAL_VOTES'			=> 'Afgivne stemmer',

	'UNLOCK_TOPIC'			=> 'Lås emne op',

	'VIEW_INFO'				=> 'Indlægsinformation',
	'VIEW_NEXT_TOPIC'		=> 'Næste emne',
	'VIEW_PREVIOUS_TOPIC'	=> 'Forrige emne',
	'VIEW_RESULTS'			=> 'Vis resultater',
	'VIEW_TOPIC_POST'		=> '1 indlæg',
	'VIEW_TOPIC_POSTS'		=> '%d indlæg',
	'VIEW_UNREAD_POST'		=> 'Første ulæste indlæg',
	'VISIT_WEBSITE'			=> 'Hjemmeside',
	'VOTE_SUBMITTED'		=> 'Din stemme er nu registreret.',
	'VOTE_CONVERTED'		=> 'Ændring af afgivne stemmer er ikke understøttet for konverterede afstemninger.',

));

?>