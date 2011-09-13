<?php
/** 
*
* acp_prune [Danish]
*
* @package language
* @version Id: prune.php 9933 2009-08-06 09:12:21Z marshalrusty $
* @version $Id: prune.php 55 2010-05-24 13:00:39Z jan skovsgaard $
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

// User pruning
$lang = array_merge($lang, array(
	'ACP_PRUNE_USERS_EXPLAIN'	=> 'I denne sektion har du mulighed for at slette eller deaktivere brugere på dit board. Brugerkonti kan filtreres på flere måder: efter antal indlæg, senest aktiv, osv. Kriterierne kan kombineres for at indkredse brugerkonti. F.eks. kan du beskære brugere der ikke har været aktive siden 2002-01-01 med mindre end 10 indlæg. Alternativt kan du indtaste en liste over brugere direkte i tekstboksen, hver bruger på en linie for sig - ethvert andet angivet kriterium bliver her ignoreret. Vær varsom med denne funktion, sletning af en bruger kan ikke fortrydes!',

	'DEACTIVATE_DELETE'			=> 'Deaktiver eller slet',
	'DEACTIVATE_DELETE_EXPLAIN'	=> 'Vælg om brugere skal deaktiveres eller slettes. Bemærk at sletning ikke kan fortrydes!',
	'DELETE_USERS'				=> 'Slet',
	'DELETE_USER_POSTS'			=> 'Slet beskårede brugeres indlæg',
	'DELETE_USER_POSTS_EXPLAIN' => 'Valget har kun betydning hvis du herunder vælger at slette brugere.',

	'JOINED_EXPLAIN'			=> 'Indtast en dato i <kbd>YYYY-MM-DD</kbd> format.',

	'LAST_ACTIVE_EXPLAIN'		=> 'Indtast en dato i <kbd>YYYY-MM-DD</kbd> format. For at beskære brugere der aldrig har været logget ind angives <kbd>0000-00-00</kbd>, <em>Før</em> og <em>Efter</em> parametrene vil blive ignoreret.',
	
	'PRUNE_USERS_LIST'				=> 'Brugere der beskæres', 
	'PRUNE_USERS_LIST_DELETE'		=> 'Med det valgte kriterie for beskæring af brugere vil følgende brugerkonti blive slettet.', 
	'PRUNE_USERS_LIST_DEACTIVATE'	=> 'Med det valgte kriterie for beskæring af brugere vil følgende brugerkonti blive deaktiveret.',

	'SELECT_USERS_EXPLAIN'		=> 'Angiv brugere her, hvert brugernavn på en ny linie. Anførte brugere bliver slettet uafhængigt af kriterierne ovenfor. Grundlæggere kan ikke beskæres.',

	'USER_DEACTIVATE_SUCCESS'	=> 'De valgte brugere er blevet deaktiveret.',
	'USER_DELETE_SUCCESS'		=> 'De valgte brugere er blevet slettet.',
	'USER_PRUNE_FAILURE'		=> 'Ingen brugere matcher valgte kriterier.',
	
	'WRONG_ACTIVE_JOINED_DATE'	=> 'Dato er angivet forkert, den skal angives i formatet <kbd>YYYY-MM-DD</kbd>.',
));

// Forum Pruning
$lang = array_merge($lang, array(
	'ACP_PRUNE_FORUMS_EXPLAIN'	=> 'Dette vil slette ethvert emne, der ikke er blevet skrevet i eller set inden for det antal dage, du vælger. Hvis du ikke indtaster et tal, så vil alle emner blive slettet. Som standard vil emner med åbne afstemninger, opslag og bekendtgørelser ikke blive slettet.',

	'FORUM_PRUNE'		=> 'Beskær forum',

	'NO_PRUNE'			=> 'Ingen fora beskåret.',

	'SELECTED_FORUM'	=> 'Valgt forum',
	'SELECTED_FORUMS'	=> 'Valgte fora',

	'POSTS_PRUNED'					=> 'Indlæg beskåret',
	'PRUNE_ANNOUNCEMENTS'			=> 'Beskær bekendtgørelser',
	'PRUNE_FINISHED_POLLS'			=> 'Beskær afsluttede afstemninger',
	'PRUNE_FINISHED_POLLS_EXPLAIN'	=> 'Fjerner emner med afsluttede afstemninger.',
	'PRUNE_FORUM_CONFIRM'			=> 'Er du sikker på at du vil beskære de valgte fora med de specificerede indstillinger? Når først emner og indlæg er slettet kan de ikke gendannes.',
	'PRUNE_NOT_POSTED'				=> 'Dage siden sidste indlæg',
	'PRUNE_NOT_VIEWED'				=> 'Dage siden sidst set',
	'PRUNE_OLD_POLLS'				=> 'Beskær gamle afstemninger',
	'PRUNE_OLD_POLLS_EXPLAIN'		=> 'Fjerner emner med afstemninger ikke stemt i for alderen af sidste indlæg.',
	'PRUNE_STICKY'					=> 'Beskær opslag',
	'PRUNE_SUCCESS'					=> 'Beskæring af fora blev gennemført.',

	'TOPICS_PRUNED'		=> 'emner beskåret',
));

?>