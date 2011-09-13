<?php
/**
*
* acp_modules [Danish]
*
* @package language
* @version Id: modules.php 8479 2008-03-29 00:22:48Z naderman $
* @version $Id: modules.php 10 2010-02-06 18:13:13Z jan skovsgaard $
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
	'ACP_MODULE_MANAGEMENT_EXPLAIN'	=> 'Bemærk menustrukturen i ACP er opdelt i tre niveauer [Faneblad » Kategori » Modul], mens strukturen i MCP og UCP kun er i to niveauer [Faneblad » Modul]. Vær også opmærksom på at du lukker dig selv ude fra moduladministrationen, hvis du sletter eller slår det faneblad, den kategori eller det modul fra, der er ansvarlig for denne. I phpBB\'s standardopsætning er dette modul placeret under fanebladet system, med kategorinavnet moduladministration',
	'ADD_MODULE'					=> 'Tilføj modul',
	'ADD_MODULE_CONFIRM'			=> 'Er du sikker på at du ønsker at tilføje det valgte modul med den valgte tilstand?',
	'ADD_MODULE_TITLE'				=> 'Tilføj modul',

	'CANNOT_REMOVE_MODULE'	=> 'Ude af stand til at slette modul, det er blevet tildelt undermoduler. Slet eller flyt venligst alle undermoduler før udførelse af denne handling',
	'CATEGORY'				=> 'Faneblad/kategori',
	'CHOOSE_MODE'			=> 'Modul',
	'CHOOSE_MODE_EXPLAIN'	=> 'Vælg det element der repræsenterer modulet.',
	'CHOOSE_MODULE'			=> 'Modulfil',
	'CHOOSE_MODULE_EXPLAIN'	=> 'Vælg den fil modulet befinder sig i.',
	'CREATE_MODULE'			=> 'Opret nyt modul',

	'DEACTIVATED_MODULE'	=> 'Deaktiveret modul',
	'DELETE_MODULE'			=> 'Slet modul',
	'DELETE_MODULE_CONFIRM'	=> 'Er du sikker på at du ønsker at slette dette modul?',

	'EDIT_MODULE'			=> 'Rediger modul',
	'EDIT_MODULE_EXPLAIN'	=> 'Her kan du ændre specifikke indstillinger for et modul.',

	'HIDDEN_MODULE'			=> 'Skjult modul',

	'MODULE'					=> 'Modul',
	'MODULE_ADDED'				=> 'Modul tilføjet.',
	'MODULE_DELETED'			=> 'Modul slettet.',
	'MODULE_DISPLAYED'			=> 'Modul vist',
	'MODULE_DISPLAYED_EXPLAIN'	=> 'Vælg Nej hvis modulet ikke skal vises i kontrolpanelet, det vil kun kunne nås via direkte URL.',
	'MODULE_EDITED'				=> 'Modul redigeret.',
	'MODULE_ENABLED'			=> 'Modul aktiveret',
	'MODULE_LANGNAME'			=> 'Modulnavn',
	'MODULE_LANGNAME_EXPLAIN'	=> 'Indtast det viste modulnavn. Brug sprognøgle, hvis navnet tilbydes fra sprogfil.',
	'MODULE_TYPE'				=> 'Modultype',

	'NO_CATEGORY_TO_MODULE'	=> 'Ude af stand til gøre kategori til modul. Slet venligst alle undermoduler før udførelse af denne handling.',
	'NO_MODULE'				=> 'Intet modul fundet.',
	'NO_MODULE_ID'			=> 'Intet ID for modul angivet.',
	'NO_MODULE_LANGNAME'	=> 'Intet modulnavn angivet.',
	'NO_PARENT'				=> 'Intet overmodul',

	'PARENT'				=> 'Overmodul',
	'PARENT_NO_EXIST'		=> 'Overmodul eksisterer ikke.',

	'SELECT_MODULE'			=> 'Vælg et modul',
));

?>