<?php
/**
*
* acp_bots [Danish]
*
* @package language
* @version Id: bots.php 8479 2008-03-29 00:22:48Z naderman $
* @version $Id: bots.php 10 2010-02-06 18:13:13Z jan skovsgaard $
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

// Bot settings
$lang = array_merge($lang, array(
	'BOTS'				=> 'Administrer botter',
	'BOTS_EXPLAIN'		=> '"Botter", "spiders" eller "crawlers" er automatiserede agenter, som normalt anvendes af søgemaskiner til at opdatere deres databaser. Da botter sjældent gør korrekt brug af sessioner, kan de forvrænge besøgstællere, forøge belastningen og somme tider ikke indeksere sider korrekt. Her kan du definere en speciel type bruger for at overvinde disse problemer.',
	'BOT_ACTIVATE'		=> 'Aktiver',
	'BOT_ACTIVE'		=> 'Botten sættes aktiv',
	'BOT_ADD'			=> 'Tilføj bot',
	'BOT_ADDED'			=> 'Ny bot tilføjet.',
	'BOT_AGENT'			=> 'Agentmatch',
	'BOT_AGENT_EXPLAIN'	=> 'En streng der matcher bottens browseragent, delvise matches er tilladt.',
	'BOT_DEACTIVATE'	=> 'Deaktiver',
	'BOT_DELETED'		=> 'Botten er slettet.',
	'BOT_EDIT'			=> 'Rediger bot',
	'BOT_EDIT_EXPLAIN'	=> 'Her kan du, afhængig af overskriften, enten tilføje en ny bot, eller ændre en eksisterende bots brugerkonto. Du kan definere en agentstreng og/eller en eller flere IP-adresser (eller interval af adresser) til at matche. Vær omhyggelig med definitionen af matchende agentstrenge eller adresser. Du kan også specificere en typografi og et sprog som botten vil læse boardet med. Det giver dig mulighed for at reducere bottens brug af båndbredde ved at vælge en simpel typografi for denne. Husk at sætte passende tilladelser for den specielle brugergruppe "Botter".',
	'BOT_LANG'			=> 'Bottens sprog',
	'BOT_LANG_EXPLAIN'	=> 'Vælg det sprog botten præsenteres for.',
	'BOT_LAST_VISIT'	=> 'Seneste besøg',
	'BOT_IP'			=> 'Bottens IP-adresse',
	'BOT_IP_EXPLAIN'	=> 'Delvise matches er tilladt, adskil adresser med et komma.',
	'BOT_NAME'			=> 'Bot',
	'BOT_NAME_EXPLAIN'	=> 'Bottens brugernavn.',
	'BOT_NAME_TAKEN'	=> 'Navnet er allerede i brug på dit board og kan derfor ikke anvendes til denne bot.',
	'BOT_NEVER'			=> 'Aldrig',
	'BOT_STYLE'			=> 'Bottens typografi',
	'BOT_STYLE_EXPLAIN'	=> 'Vælg den typografi botten præsenteres for.',
	'BOT_UPDATED'		=> 'Eksisterende bot opdateret.',

	'ERR_BOT_AGENT_MATCHES_UA'	=> 'Den anførte botagent svarer til den du i øjeblikket anvender. Juster venligst agenten for denne bot.',
	'ERR_BOT_NO_IP'			=> 'IP-adressen du angav var ugyldig eller værtsnavnet kunne ikke findes.',
	'ERR_BOT_NO_MATCHES'	=> 'Du skal angive mindst en agent eller IP-adresse for dette botmatch.',

	'NO_BOT'	=> 'Fandt ingen bot med det specificerede ID',
	'NO_BOT_GROUP'	=> 'Ude af stand til at finde speciel botgruppe.',
));

?>