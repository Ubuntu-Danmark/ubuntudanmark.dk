<?php
/**
*
* acp_database [Danish]
*
* @package language
* @version Id: database.php 9765 2009-07-17 10:11:10Z bantu $
* @version $Id: database.php 10 2010-02-06 18:13:13Z jan skovsgaard $
* @source file is copyright (c) 2005,phpBB Group
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

// Database Backup/Restore
$lang = array_merge($lang, array(
	'ACP_BACKUP_EXPLAIN'	=> 'Her kan du foretage backup af din phpBB-database. Du kan gemme den dannede backup i <samp>store/</samp>-mappen på serveren eller downloade den direkte. Afhængig af din serverkonfiguration vil du være i stand til at pakke filen med forskellige komprimeringsværktøjer.',
	'ACP_RESTORE_EXPLAIN'	=> 'Dette vil udføre en fuld gendannelse af alle phpBB-tabeller fra en gemt fil. Hvis din server understøtter det, kan du bruge en gzip eller bzip2-komprimeret tekstfil, den bliver automatisk udpakket. <strong>ADVARSEL</strong> Alle eksisterende data bliver overskrevet. Gendannelsen kan tage lang tid at gennemføre, forlad venligst ikke denne side før gendannelsen er fuldført. Backupfilerne gemmes i <samp>store/</samp>-mappen og forventes at være dannet med phpBB\'s indbyggede backupsystem. Ved forsøg på at gendanne databasen fra en backupfil der ikke er dannet med det interne backupsystem, kan du ikke være sikker på at gendannelsen bliver fuldført med succes.',

	'BACKUP_DELETE'		=> 'Backupfilen blev slettet.',
	'BACKUP_INVALID'	=> 'Den valgte fil for backup er ugyldig',
	'BACKUP_OPTIONS'	=> 'Valgmuligheder for backup',
	'BACKUP_SUCCESS'	=> 'Dannelsen af backupfilen lykkedes med den placering du angav.',
	'BACKUP_TYPE'		=> 'Backuptype',

	'DATABASE' => 'Databaseværktøjer',
	'DATA_ONLY'			=> 'Data alene',
	'DELETE_BACKUP'			=> 'Slet backup',
	'DELETE_SELECTED_BACKUP'	=> 'Er du sikker på at du ønsker at slette den valgte backup?',
	'DESELECT_ALL'		=> 'Fravælg alle',
	'DOWNLOAD_BACKUP'		=> 'Download backup',
	
	'FILE_TYPE'			=> 'Filtype',
	'FILE_WRITE_FAIL'	=> 'Der kan ikke skrives til store-mappen.',
	'FULL_BACKUP'		=> 'Fuld',
	
	'RESTORE_FAILURE'	=> 'Backupfilen kan være ødelagt.',
	'RESTORE_OPTIONS'		=> 'Valgmuligheder for gendannelse',
	'RESTORE_SUCCESS'		=> 'Gendannelsen af databasen lykkedes.<br /><br />Dit board skulle være tilbage i den stand det var i da backup\'en blev taget.',

	'SELECT_ALL'	=> 'Vælg alle',
	'SELECT_FILE'			=> 'Vælg en fil',
	'START_BACKUP'		=> 'Start backup',
	'START_RESTORE'			=> 'Start gendannelse',
	'STORE_AND_DOWNLOAD'	=> 'Gem og download',
	'STORE_LOCAL'		=> 'Gem fil lokalt',
	'STRUCTURE_ONLY'	=> 'Struktur alene',

	'TABLE_SELECT'		=> 'Tabelvalg',
	'TABLE_SELECT_ERROR'=> 'Du skal vælge mindst en tabel.',
));

?>