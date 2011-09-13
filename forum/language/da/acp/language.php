<?php
/**
*
* acp_language [Danish]
*
* @package language
* @version Id: language.php language.php 9649 2009-06-21 19:17:20Z bantu $
* @version $Id: language.php 10 2010-02-06 18:13:13Z jan skovsgaard $
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
	'ACP_FILES'						=> 'Administration af sprogfiler',
	'ACP_LANGUAGE_PACKS_EXPLAIN'	=> 'Her kan du installere og fjerne sprogpakker. Boardets standardsprog er mærket med en stjerne (*).',

	'EMAIL_FILES'			=> 'Emailskabeloner',

	'FILE_CONTENTS'				=> 'Filindhold',
	'FILE_FROM_STORAGE'			=> 'Fil fra opbevaringsmappe',

	'HELP_FILES'				=> 'Hjælpefiler',

	'INSTALLED_LANGUAGE_PACKS'	=> 'Installerede sprogpakker',
	'INVALID_LANGUAGE_PACK'		=> 'Den valgte sprogpakke ser ikke ud til at være gyldig. Verificer venligst sprogpakken og upload den igen hvis nødvendigt.',
	'INVALID_UPLOAD_METHOD'		=> 'Den valgte uploadmetode er ikke gyldig, vælg venligst en anden metode.',

	'LANGUAGE_DETAILS_UPDATED'			=> 'Sproginformationer korrekt opdateret.',
	'LANGUAGE_ENTRIES'					=> 'Sproglinier',
	'LANGUAGE_ENTRIES_EXPLAIN'			=> 'Her kan du ændre eksisterende sprogpakkelinier eller manglende oversættelser.<br /><strong>Bemærk:</strong> Når du har ændret i en sprogfil gemmes ændringerne i en separat mappe så du kan downloade filen. Ændringerne træder ikke i kraft så dine brugere kan se dem før du erstatter de originale filer på serveren (ved at uploade dem).',
	'LANGUAGE_FILES'					=> 'Sprogfiler',
	'LANGUAGE_KEY'						=> 'Sprognøgle',
	'LANGUAGE_PACK_ALREADY_INSTALLED'	=> 'Denne sprogpakke er allerede installeret.',
	'LANGUAGE_PACK_DELETED'				=> 'Sprogpakken <strong>%s</strong> er nu fjernet og alle brugere, der havde valgt dette sprog, er blevet sat til at bruge boardets standardsprog.',
	'LANGUAGE_PACK_DETAILS'				=> 'Sprogpakkeinformationer',
	'LANGUAGE_PACK_INSTALLED'			=> 'Sprogpakken <strong>%s</strong> er blevet installeret.',
	'LANGUAGE_PACK_ISO'					=> 'ISO',
	'LANGUAGE_PACK_LOCALNAME'			=> 'Lokalt navn',
	'LANGUAGE_PACK_NAME'				=> 'Navn',
	'LANGUAGE_PACK_NOT_EXIST'			=> 'Den valgte sprogpakke findes ikke.',
	'LANGUAGE_PACK_USED_BY'				=> 'Bruges af (incl. botter)',
	'LANGUAGE_VARIABLE'					=> 'Sprogvariabel',
	'LANG_AUTHOR'						=> 'Sprogpakkens forfatter',
	'LANG_ENGLISH_NAME'					=> 'Engelsk navn',
	'LANG_ISO_CODE'						=> 'ISO kode',
	'LANG_LOCAL_NAME'					=> 'Lokalt navn',

	'MISSING_LANGUAGE_FILE'		=> 'Manglende sprogfil: <strong style="color:red">%s</strong>',
	'MISSING_LANG_VARIABLES'	=> 'Manglende sprogvariabler',
	'MODS_FILES'				=> 'MODs sprogfiler',

	'NO_FILE_SELECTED'			=> 'Du har ikke angivet en sprogfil.',
	'NO_LANG_ID'					=> 'Du har ikke angivet en sprogpakke.',
	'NO_REMOVE_DEFAULT_LANG'		=> 'Du kan ikke fjerne standardsprogpakken.<br />Hvis du ønsker at fjerne denne sprogpakke, skal du ændre boardets standardsprog først.',
	'NO_UNINSTALLED_LANGUAGE_PACKS'	=> 'Ingen afinstallerede sprogpakker',

	'REMOVE_FROM_STORAGE_FOLDER'		=> 'Fjern fra opbevaringsmappe',

	'SELECT_DOWNLOAD_FORMAT'	=> 'Vælg downloadformat',
	'SUBMIT_AND_DOWNLOAD'		=> 'Indsend og download fil',
	'SUBMIT_AND_UPLOAD'		=> 'Indsend og upload fil',

	'THOSE_MISSING_LANG_FILES'			=> 'Følgende sprogfiler mangler i %s-sprogmappen',
	'THOSE_MISSING_LANG_VARIABLES'		=> 'Følgende sprogvariabler mangler i <strong>%s</strong>-sprogpakken',

	'UNINSTALLED_LANGUAGE_PACKS'	=> 'Afinstallerede sprogpakker',

	'UNABLE_TO_WRITE_FILE'		=> 'Der kunne ikke skrives til filen %s.',
	'UPLOAD_COMPLETED'			=> 'Upload er gennemført',
	'UPLOAD_FAILED'				=> 'Upload af filen mislykkedes af ukendte årsager. Du er nødt til er udskifte den relevante fil manuelt.',
	'UPLOAD_METHOD'				=> 'Uploadmetode',
	'UPLOAD_SETTINGS'			=> 'Uploadindstillinger',

	'WRONG_LANGUAGE_FILE'		=> 'Valgte sprogfil er ugyldig.',
));

?>