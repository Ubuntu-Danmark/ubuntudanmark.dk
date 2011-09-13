<?php
/**
*
* acp_users [Danish]
*
* @package language
* @version Id: users.php 10700 2010-08-19 15:27:05Z git-gate $
* @version $Id: users.php 75 2010-08-22 08:02:08Z jan skovsgaard $
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
	'ADMIN_SIG_PREVIEW'		=> 'Vis signaturen',
	'AT_LEAST_ONE_FOUNDER'	=> 'Du kan ikke ændre denne grundlægger til en almindelig bruger. Der skal være mindst en grundlægger aktiveret på boardet. Hvis du ønsker at ændre denne brugers status, skal du først forfremme en anden bruger til grundlægger.',

	'BAN_ALREADY_ENTERED'   => 'Udelukkelsen er tidligere udført. Udelukkelseslisten er ikke blevet opdateret.',
	'BAN_SUCCESSFUL'		=> 'Udelukkelse er udført.',

	'CANNOT_BAN_ANONYMOUS'      => 'Du har ikke tilladelse til udelukke gæstebrugerkontoen. Tilladelser for anonyme brugere kan indstilles under fanen Tilladelser.',
	'CANNOT_BAN_FOUNDER'	=> 'Du har ikke tilladelse til at udelukke grundlæggere.',
	'CANNOT_BAN_YOURSELF'			=> 'Du kan ikke udelukke dig selv.',
	'CANNOT_DEACTIVATE_BOT'	=> 'Du har ikke tilladelse til at deaktivere botters konti. Deaktiver i stedet botten på administrationssiden for botter.',
	'CANNOT_DEACTIVATE_FOUNDER'	=> 'Du har ikke tilladelse til at deaktivere grundlæggeres konti.',
	'CANNOT_DEACTIVATE_YOURSELF'	=> 'Du kan ikke deaktivere din egen konto.',
	'CANNOT_FORCE_REACT_BOT'	=> 'Du kan ikke gennemtvinge genaktivering af botters konti. Genaktiver i stedet botten på administrationssiden for botter.',
	'CANNOT_FORCE_REACT_FOUNDER'	=> 'Du kan ikke gennemtvinge genaktivering af grundlæggeres konti.',
	'CANNOT_FORCE_REACT_YOURSELF'	=> 'Du kan ikke gennemtvinge genaktivering af din egen konto.',
	'CANNOT_REMOVE_ANONYMOUS'		=> 'Du kan ikke fjerne gæstebrugerkontoen.',
	'CANNOT_REMOVE_YOURSELF'		=> 'Du kan ikke fjerne din egen brugerkonto.',
	'CANNOT_SET_FOUNDER_IGNORED'	=> 'Du kan ikke forfremme ignorerede brugere til at være grundlæggere.',
	'CANNOT_SET_FOUNDER_INACTIVE'	=> 'Du skal aktivere brugere før du forfremmer dem til grundlæggere, kun aktive brugere kan forfremmes.',
	'CONFIRM_EMAIL_EXPLAIN'			=> 'Du skal kun specificere dette, hvis du ændrer brugerens emailadresse.',

	'DELETE_POSTS'			=> 'Slet indlæg',
	'DELETE_USER'			=> 'Slet bruger',
	'DELETE_USER_EXPLAIN'	=> 'Vær opmærksom på at når en bruger slettes er det definitivt, brugeren kan ikke gendannes.',

	'FORCE_REACTIVATION_SUCCESS'	=> 'Tvungen genaktivering gennemført',
	'FOUNDER'						=> 'Grundlægger',
	'FOUNDER_EXPLAIN'				=> 'Grundlæggere har samme tilladelser som administratorer og kan ikke udelukkes, slettes eller ændres af medlemmer som ikke selv har samme status.',

	'GROUP_APPROVE'			=> 'Godkend bruger',
	'GROUP_DEFAULT'			=> 'Gruppestandard for bruger',
	'GROUP_DELETE'			=> 'Slet bruger fra gruppe',
	'GROUP_DEMOTE'			=> 'Degrader gruppeleder',
	'GROUP_PROMOTE'			=> 'Forfrem til gruppeleder',

	'IP_WHOIS_FOR'			=> 'Hvem har denne %s IP-adresse',

	'LAST_ACTIVE'			=> 'Senest aktiv',

	'MOVE_POSTS_EXPLAIN'	=> 'Vælg venligst det forum, hvortil du ønsker at flytte alle denne brugers indlæg.',

	'NO_SPECIAL_RANK'		=> 'Ingen speciel rang tildelt',
	'NO_WARNINGS'			=> 'Ingen advarsler.',
	'NOT_MANAGE_FOUNDER'	=> 'Du forsøgte at administrere en bruger med grundlæggerstatus. Kun grundlæggere kan administrere andre grundlæggere.',

	'QUICK_TOOLS'			=> 'Hurtig værktøjer',

	'REGISTERED'			=> 'Tilmeldt',
	'REGISTERED_IP'			=> 'Tilmeldt fra IP-adresse',
	'RETAIN_POSTS'			=> 'Tilbagehold indlæg',

	'SELECT_FORM'			=> 'Vælg element',
	'SELECT_USER'			=> 'Vælg bruger',

	'USER_ADMIN'					=> 'Administrer',
	'USER_ADMIN_ACTIVATE'			=> 'Aktiver konto',
	'USER_ADMIN_ACTIVATED'			=> 'Brugeraktivering er gennemført',
	'USER_ADMIN_AVATAR_REMOVED'		=> 'Brugers avatar er slettet',
	'USER_ADMIN_BAN_EMAIL'			=> 'Udeluk pr. emailadresse',
	'USER_ADMIN_BAN_EMAIL_REASON'	=> 'Emailadresse er udelukket via brugeradministrationen',
	'USER_ADMIN_BAN_IP'				=> 'Udeluk pr. IP-adresse',
	'USER_ADMIN_BAN_IP_REASON'		=> 'IP-adresse er udelukket via brugeradministrationen',
	'USER_ADMIN_BAN_NAME_REASON'	=> 'Brugernavn er udelukket via brugeradministrationen',
	'USER_ADMIN_BAN_USER'			=> 'Udeluk pr. brugernavn',
	'USER_ADMIN_DEACTIVATE'			=> 'Deaktiver konto',
	'USER_ADMIN_DEACTIVED'			=> 'Brugerdeaktivering er gennemført',
	'USER_ADMIN_DEL_ATTACH'			=> 'Slet alle vedhæftede filer',
	'USER_ADMIN_DEL_AVATAR'			=> 'Slet avatar',
	'USER_ADMIN_DEL_OUTBOX'		=> 'Tøm PB-udbakke',
	'USER_ADMIN_DEL_POSTS'			=> 'Slet alle indlæg',
	'USER_ADMIN_DEL_SIG'			=> 'Slet signatur',
	'USER_ADMIN_EXPLAIN'			=> 'Når bruger er valgt, kan du i dropdownmenuen vælge det brugerelement du ønsker at gennemse. Her er tilsammen mulighed for at ændre samtlige brugers indstillinger.',
	'USER_ADMIN_FORCE'				=> 'Gennemtving genaktivering',
	'USER_ADMIN_LEAVE_NR'			=> 'Fjern fra gruppen nye brugere',
	'USER_ADMIN_MOVE_POSTS'			=> 'Flyt alle indlæg',
	'USER_ADMIN_SIG_REMOVED'		=> 'Signaturen er slettet fra brugerkontoen',
	'USER_ATTACHMENTS_REMOVED'		=> 'Alle brugers vedhæftede filer er nu flyttet',
	'USER_AVATAR_NOT_ALLOWED' => 'Avatar vises ikke, da brug af avatars er blevet deaktiveret.',
	'USER_AVATAR_UPDATED'			=> 'Brugers avatarinformation er nu opdateret',
	'USER_AVATAR_TYPE_NOT_ALLOWED' => 'Nuværende avatar vises ikke, da denne type ikke er tilladt.',
	'USER_CUSTOM_PROFILE_FIELDS'	=> 'Tilpassede profilfelter',
	'USER_DELETED'					=> 'Bruger er nu slettet',
	'USER_GROUP_ADD'				=> 'Tilføj bruger til gruppen',
	'USER_GROUP_NORMAL'				=> 'Bruger er medlem af følgende brugerdefinerede grupper',
	'USER_GROUP_PENDING'			=> 'Grupper hvor brugers medlemskab er under behandling',
	'USER_GROUP_SPECIAL'			=> 'Bruger er medlem af følgende prædefinerede grupper',
	'USER_LIFTED_NR'						=> 'Brugers status som ny tilmeldt bruger er fjernet.',
	'USER_NO_ATTACHMENTS'			=> 'Der er ingen vedhæftede filer at vise.',
	'USER_OUTBOX_EMPTIED'			=> 'Brugers udbakke i pb-systemet er tømt.',
	'USER_OUTBOX_EMPTY'			=> 'Brugers udbakke var tom.',
	'USER_OVERVIEW_UPDATED'			=> 'Brugerinformation er opdateret',
	'USER_POSTS_DELETED'			=> 'Alle indlæg fra denne bruger er nu flyttet.',
	'USER_POSTS_MOVED'				=> 'Brugers indlæg er nu flyttet til modtageforum',
	'USER_PREFS_UPDATED'			=> 'Brugerindstillinger er opdateret',
	'USER_PROFILE'					=> 'Brugerprofil',
	'USER_PROFILE_UPDATED'			=> 'Brugerprofil opdateret',
	'USER_RANK'						=> 'Brugerrang',
	'USER_RANK_UPDATED'				=> 'Brugerrang opdateret',
	'USER_SIG_UPDATED'				=> 'Brugersignatur er opdateret',
	'USER_WARNING_LOG_DELETED'		=> 'Ingen tilgængelig information. Hændelsen kan være blevet slettet fra loggen.',
	'USER_TOOLS'					=> 'Grundlæggende værktøjer',
));

?>