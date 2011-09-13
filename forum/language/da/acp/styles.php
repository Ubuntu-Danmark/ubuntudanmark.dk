<?php
/** 
*
* acp_styles [Danish]
*
* @package language
* @version Id: styles.php 10813 2010-10-17 20:00:22Z git-gate $
* @version $Id: styles.php 97 2010-11-11 18:26:26Z jan skovsgaard $
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
// All language files should use UTF-8 as their encoding and the files must not contain a BOM
//
// Placeholders can now contain order information, e.g. instead of
// 'Page %s of %s' you can (and should) write 'Page %1$s of %2$s', this allows
// translators to re-order the output of data while ensuring it remains correct
//
// You do not need this where single placeholders are used, e.g. 'Message %d' is fine
// equally where a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., 'Click %sHERE%s' is fine

$lang = array_merge($lang, array(
	'ACP_IMAGESETS_EXPLAIN'	=> 'Grafikpakker omfatter alle de ikoner og knapper der anvendes på boardets fora, når der skrives indlæg etc. samt andre ikke typografi- og sprogspecifikke grafikelementer. Her kan du ændre, eksportere og slette eksisterende grafikpakker, samt importere og aktivere nye pakker.',
	'ACP_STYLES_EXPLAIN'	=> 'Her kan du vedligeholde de tilgængelige typografier på dit board. En typografi består af en skabelon, et tema og en grafikpakke. Du kan ændre, slette, deaktivere og genaktivere eksisterende typografier eller oprette og importere nye. Du kan også se hvordan en typografi vil se ud, ved at bruge muligheden "vis prøve". Den valgte typografi for boardets grundindstilling er markeret med en (*). Der er også listet, hvor mange brugere, der har valgt at bruge hver af de tilgængelige typografier. Hvis du har valgt at tilsidesætte brugerens valg af typografi, er det ikke afspejlet her.',
	'ACP_TEMPLATES_EXPLAIN'	=> 'En skabelon omfatter alle de markeringer der bruges for at skabe dit boards udseende. Her kan du ændre, slette og eksportere eksisterende skabeloner og importere nye og afprøve disse. Du kan også modificere skabelonkoden, der bruges til at generere BBkode.',
	'ACP_THEMES_EXPLAIN'	=> 'Her kan du oprette, installere, ændre, slette temaer. Et tema er en kombination af farver og billeder som er tilknyttet din skabelon og definerer det basale udseende af dit board. Hvor mange muligheder du har for at ændre i disse indstillinger afhænger af konfiguration af både serveren og selve installationen, se manualen for yderligere information. Bemærk at det er muligt at vælge et eksisterende tema som udgangspunkt, når du opretter et nyt tema.',
	'ADD_IMAGESET'			=> 'Tilføj en ny grafikpakke',
	'ADD_IMAGESET_EXPLAIN'	=> 'Her kan du tilføje en ny grafikpakke. Afhængig af serverens konfiguration og de skrivetilladelser du har til filerne på denne, har du forskellige muligheder. For eksempel er du måske i stand til at oprette denne grafikpakke med udgangspunkt i den eksisterende. Du kan også have mulighed for at importere et grafikpakkearkiv (fra lagringsmappen). Hvis du uploader eller importerer et arkiv, vil pakkens navn automatisk blive bestemt.',
	'ADD_STYLE'				=> 'Tilføj en ny typografi',
	'ADD_STYLE_EXPLAIN'		=> 'Her kan du tilføje en ny typografi. Afhængig af serverens konfiguration og de skrivetilladelser du har til filerne på denne, har du forskellige muligheder. For eksempel er du måske i stand til at oprette denne typografi med udgangspunkt i den eksisterende. Du kan også have mulighed for at importere et typografiarkiv (fra lagringsmappen). Hvis du uploader eller importerer et arkiv, vil typografiens navn automatisk blive bestemt.',
	'ADD_TEMPLATE'			=> 'Tilføj ny skabelon',
	'ADD_TEMPLATE_EXPLAIN'	=> 'Her kan du tilføje en ny skabelon. Afhængig af serverens konfiguration og de skrivetilladelser du har til filerne på denne, har du forskellige muligheder. For eksempel er du måske i stand til at oprette denne skabelon med udgangspunkt i den eksisterende. Du kan også være i stand til at importere et skabelonarkiv (fra lagringsmappen). Hvis du uploader eller importerer et arkiv, kan skabelonnavnet arves fra arkivnavnet(dette gøres ved at navnefeltet for skabelonen efterlades blankt).',
	'ADD_THEME'				=> 'Tilføj nyt tema',
	'ADD_THEME_EXPLAIN'		=> 'Her kan du tilføje et nyt tema. Afhængig af serverens konfiguration og de skrivetilladelser du har til filerne på denne, har du forskellige muligheder. For eksempel er du måske i stand til at oprette dette tema med udgangspunkt i det eksisterende. Du kan også have mulighed for at importere et temaarkiv (fra lagringsmappen). Hvis du uploader eller importerer et arkiv, kan temanavnet arves fra arkivnavnet(dette gøres ved at navnefeltet for temaet efterlades blankt).',
	'ARCHIVE_FORMAT'		=> 'Filtype for arkiv',
	'AUTOMATIC_EXPLAIN'		=> 'Udfyldes feltet ikke, forsøges automatisk bestemmelse.',

	'BACKGROUND'			=> 'Baggrund',
	'BACKGROUND_COLOUR'		=> 'Baggrundsfarve',
	'BACKGROUND_IMAGE'		=> 'Baggrundsgrafik',
	'BACKGROUND_REPEAT'		=> 'Gentag baggrund',
	'BOLD'					=> 'Fed',

	'CACHE'						=> 'Mellemlager',
	'CACHE_CACHED'				=> 'Mellemlagret',
	'CACHE_FILENAME'			=> 'Skabelonfil',
	'CACHE_FILESIZE'			=> 'Filstørrelse',
	'CACHE_MODIFIED'			=> 'Ændret',
	'CONFIRM_IMAGESET_REFRESH'	=> 'Er du sikker på at du vil opdatere alle grafikpakkedata? Indstillingerne i grafikpakkens konfigurationsfil vil blive overskrevet med alle de ændringer der er foretaget med grafikpakkeeditoren.',
	'CONFIRM_TEMPLATE_CLEAR_CACHE'	=> 'Er du sikker på at du vil rydde alle mellemlagrede versioner af dine skabelonfiler?',
	'CONFIRM_TEMPLATE_REFRESH'	=> 'Er du sikker på at du vil opdatere alle skabelondata i databasen med indholdet af skabelonfilerne? Det overskriver alle modifikationer som er blevet foretaget i skabeloneditoren, mens skabelonen var lagret i databasen.',
	'CONFIRM_THEME_REFRESH'		=> 'Er du sikker på at du vil opdatere alle temadata i databasen med indholdet af temafilerne? Det overskriver alle modifikationer som er blevet foretaget i temaeditoren, mens temaet var lagret i databasen.',
	'COPYRIGHT'					=> 'Copyright',
	'CREATE_IMAGESET'			=> 'Opret ny grafikpakke',
	'CREATE_STYLE'				=> 'Opret ny typografi',
	'CREATE_TEMPLATE'			=> 'Opret ny skabelon',
	'CREATE_THEME'				=> 'Opret nyt tema',
	'CURRENT_IMAGE'				=> 'Nuværende grafik',
	
	'DEACTIVATE_DEFAULT'		=> 'Du kan ikke deaktivere standardindstillingens typografi.',
	'DELETE_FROM_FS'			=> 'Slet fra filsystemet',
	'DELETE_IMAGESET'			=> 'Slet grafikpakke',
	'DELETE_IMAGESET_EXPLAIN'	=> 'Her kan du fjerne den valgte grafikpakke fra databasen. Bemærk at der ikke er nogen mulighed for at fortryde. Det anbefales derfor at du først eksporterer din pakke til mulig fremtidig brug.',
	'DELETE_STYLE'				=> 'Slet typografi',
	'DELETE_STYLE_EXPLAIN'		=> 'Her kan du slette den valgte typografi. Ikke alle typografielementer kan slettes herfra. Skabeloner, tema og grafikpakke slettes individuelt. Pas på, når en typografi slettes er der ingen mulighed for at fortryde.',
	'DELETE_TEMPLATE'			=> 'Slet skabelon',
	'DELETE_TEMPLATE_EXPLAIN'	=> 'Her kan du fjerne den valgte skabelon fra databasen. Bemærk at der ikke er nogen mulighed for at fortryde. Det anbefales derfor at du først eksporterer skabelonen til mulig fremtidig brug.',
	'DELETE_THEME'				=> 'Slet tema',
	'DELETE_THEME_EXPLAIN'		=> 'Her kan du fjerne det valgte tema fra databasen. Bemærk at der ikke er nogen mulighed for at fortryde. Det anbefales derfor at du først eksporterer temaet til mulig fremtidig brug.',
	'DETAILS'					=> 'Oplysninger',
	'DIMENSIONS_EXPLAIN'		=> 'Hvis du vælger "Ja", inkluderes data for bredde og højde.',
	

	'EDIT_DETAILS_IMAGESET'				=> 'Ændre information om grafikpakken',
	'EDIT_DETAILS_IMAGESET_EXPLAIN'		=> 'Her kan grafikpakkeinformation ændres, eksempelvis pakkens navn.',
	'EDIT_DETAILS_STYLE'				=> 'Ændre typografi',
	'EDIT_DETAILS_STYLE_EXPLAIN'		=> 'Ved at bruge nedenstående formular kan den eksisterende typografi ændres. Du kan ændre kombinationen af skabeloner, temaer og grafikpakker som er med til at bestemme hvordan typografiens endelige udseende bliver. Desuden kan du vælge (tilbage til) grundindstillingens typografi.',
	'EDIT_DETAILS_TEMPLATE'				=> 'Ændre information om skabelonen',
	'EDIT_DETAILS_TEMPLATE_EXPLAIN'		=> 'Her kan du ændre skabeloninformation, eksempelvis navnet. Du kan også have tilladelser til skifte lagringen af typografiarket fra filsystemet til database og omvendt. Om denne mulighed er tilgængelig afhænger af din servers PHP-konfiguration og om der kan skrives til skabelonen fra serveren.',
	'EDIT_DETAILS_THEME'				=> 'Ændre information om temaet',
	'EDIT_DETAILS_THEME_EXPLAIN'		=> 'Her kan du ændre temainformation, eksempelvis navnet. Du kan også have tilladelser til skifte lagringen af temaet fra filsystemet til database og omvendt. Om denne mulighed er tilgængelig afhænger af din servers PHP-konfiguration og om der kan skrives til temafilen fra serveren.',
	'EDIT_IMAGESET'						=> 'Ændre grafikpakke',
	'EDIT_IMAGESET_EXPLAIN'				=> 'Her kan du ændre de enkelte elementer i grafikpakken. Du kan også specificere størrelsen på grafikken. Størrelsespecifikationen er et tilvalg, ved at specificere denne kan man ungå visningsproblemer i nogle browsere. Til gengæld spares der en lille smule plads i databasen, hvis størrelsen ikke angives.',
	'EDIT_TEMPLATE'						=> 'Ændre skabelon',
	'EDIT_TEMPLATE_EXPLAIN'				=> 'Her kan du ændre dine skabeloner direkte. Husk at ændringerne er permanente og ikke kan fortrydes når de først er indsendt. Hvis PHP kan skrive til skabelonfilerne i din typografimappe vil alle ændringer foretaget her, blive skrevet direkte til disse filer. Hvis PHP ikke kan skrive direkte til disse, vil filerne blive kopieret til databasen og ændringerne vil kun være tilstede i denne. Husk at lukke alle erstatningsvariable led {XXXX} og betingede angivelser, når du ændrer i skabelonfiler.',
	'EDIT_TEMPLATE_STORED_DB'			=> 'Der kunne ikke skrives til skabelonfilen, så skabelonen er blevet lagret i databasen, som nu indeholder den ændrede fil.',
	'EDIT_THEME'						=> 'Ændre tema',
	'EDIT_THEME_EXPLAIN'				=> 'Her kan du redigere det valgte tema, ændre farver, billeder, etc.',
	'EDIT_THEME_STORED_DB'				=> 'Der kunne ikke skrives til temafilen, så temaet er blevet lagret i databasen som nu indeholder den ændrede fil.',
	'EDIT_THEME_STORE_PARSED'	=> 'Temaet kræver at typografiarket analyseres. Det er kun muligt hvis det er lagret i databasen.',
	'EDITOR_DISABLED'					=> 'Skabeloneditoren er slået fra.',
	'EXPORT'							=> 'Eksporter',

	'FOREGROUND'			=> 'Forgrund',
	'FONT_COLOUR'			=> 'Tekstfarve',
	'FONT_FACE'				=> 'Skrifttype',
	'FONT_FACE_EXPLAIN'		=> 'Du kan specificere flere skrifttyper adskilt af kommaer. Hvis en bruger ikke har den første font installeret, vil den første af de efterfølgende som virker blive valgt.',
	'FONT_SIZE'				=> 'Skriftstørrelse',

	'GLOBAL_IMAGES'			=> 'Global',

	'HIDE_CSS'				=> 'Gem rå CSS',

	'IMAGE_WIDTH'				=> 'Grafikbredde',
	'IMAGE_HEIGHT'				=> 'Grafikhøjde',
	'IMAGE'						=> 'Grafikfil',
	'IMAGE_NAME'				=> 'Elementets navn',
	'IMAGE_PARAMETER'			=> 'Parameter',
	'IMAGE_VALUE'				=> 'Værdi',
	'IMAGESET_ADDED'			=> 'Ny grafikpakke er føjet til filsystemet.',
	'IMAGESET_ADDED_DB'			=> 'Ny grafikpakke er føjet til databasen.',
	'IMAGESET_DELETED'			=> 'Grafikpakken er blevet slettet.',
	'IMAGESET_DELETED_FS'		=> 'Grafikpakke er slettet fra databasen, men nogle filer kan stadig eksistere i filsystemet.',
	'IMAGESET_DETAILS_UPDATED'	=> 'Informationer om grafikpakken er blevet opdateret.',
	'IMAGESET_ERR_ARCHIVE'		=> 'Vælg venligst en arkiveringsmetode.',
	'IMAGESET_ERR_COPY_LONG'	=> 'Copyright kan ikke være længere end 60 tegn.',
	'IMAGESET_ERR_NAME_CHARS'	=> 'Grafikpakkens navn må kun indholde alfanummeriske tegn, -, +, _ og mellemrum.',
	'IMAGESET_ERR_NAME_EXIST'	=> 'Der eksisterer allerede en grafikpakke med dette navn.',
	'IMAGESET_ERR_NAME_LONG'	=> 'Grafikpakkens navn kan ikke være længere end 30 tegn.',
	'IMAGESET_ERR_NOT_IMAGESET'	=> 'Det valgte arkiv indholder ikke en gyldig grafikpakke.',
	'IMAGESET_ERR_STYLE_NAME'	=> 'Du skal angive et navn til denne grafikpakke.',
	'IMAGESET_EXPORT'			=> 'Ekporter grafikpakke',
	'IMAGESET_EXPORT_EXPLAIN'	=> 'Her kan du eksportere en grafikpakke som et arkiv. Arkivet vil indeholde alle nødvendige data for at installere pakken på et andet board. Du kan vælge at hente filen direkte, placere den i din lagermappe til senere hentning, eventuelt med FTP.',
	'IMAGESET_EXPORTED'			=> 'Grafikpakken er eksporteret og gemt i %s.',
	'IMAGESET_NAME'				=> 'Navn på grafikpakke',
	'IMAGESET_REFRESHED'		=> 'Grafikpakken er blevet genindlæst.',
	'IMAGESET_UPDATED'			=> 'Grafikpakken er blevet opdateret.',
	'ITALIC'					=> 'Kursiv',

	'IMG_CAT_BUTTONS'		=> 'Sprogspecifikke knapper',
	'IMG_CAT_CUSTOM'		=> 'Brugerdefinerede elementer',
	'IMG_CAT_FOLDERS'		=> 'Emneikoner',
	'IMG_CAT_FORUMS'		=> 'Forumikoner',
	'IMG_CAT_ICONS'			=> 'Generelle ikoner',
	'IMG_CAT_LOGOS'			=> 'Logo\'er',
	'IMG_CAT_POLLS'			=> 'Afstemning',
	'IMG_CAT_UI'			=> 'Generelle elementer i brugerfladen',
	'IMG_CAT_USER'			=> 'Ekstra elementer',

	'IMG_SITE_LOGO'			=> 'Hovedlogo',
	'IMG_UPLOAD_BAR'		=> 'Statusbjælke for upload',
	'IMG_POLL_LEFT'			=> 'Afstemning venstre side',
	'IMG_POLL_CENTER'		=> 'Afstemning centreret',
	'IMG_POLL_RIGHT'		=> 'Afstemning højre side',
	'IMG_ICON_FRIEND'		=> 'Tilføj venneliste',
	'IMG_ICON_FOE'			=> 'Tilføj ignorerliste',

	'IMG_FORUM_LINK'			=> 'Forumlink',
	'IMG_FORUM_READ'			=> 'Forum',
	'IMG_FORUM_READ_LOCKED'		=> 'Låst forum',
	'IMG_FORUM_READ_SUBFORUM'	=> 'Underforum',
	'IMG_FORUM_UNREAD'			=> 'Ulæste i forum',
	'IMG_FORUM_UNREAD_LOCKED'	=> 'Ulæste i låst forum',
	'IMG_FORUM_UNREAD_SUBFORUM'	=> 'Ulæste i underforum',
	'IMG_SUBFORUM_READ'			=> 'Billedtekst underforum',
	'IMG_SUBFORUM_UNREAD'		=> 'Billedtekst underforum ulæste',

	'IMG_TOPIC_MOVED'			=> 'Emne flyttet',

	'IMG_TOPIC_READ'				=> 'Emne',
	'IMG_TOPIC_READ_MINE'			=> 'Emne aktiv i',
	'IMG_TOPIC_READ_HOT'			=> 'Populært emne',
	'IMG_TOPIC_READ_HOT_MINE'		=> 'Populært emne aktiv i',
	'IMG_TOPIC_READ_LOCKED'			=> 'Emne låst',
	'IMG_TOPIC_READ_LOCKED_MINE'	=> 'Låst emne aktiv i',

	'IMG_TOPIC_UNREAD'				=> 'Ulæste i emne',
	'IMG_TOPIC_UNREAD_MINE'			=> 'Ulæste i emne aktiv i',
	'IMG_TOPIC_UNREAD_HOT'			=> 'Ulæst i populært emne',
	'IMG_TOPIC_UNREAD_HOT_MINE'		=> 'Ulæst i populært emne aktiv i',
	'IMG_TOPIC_UNREAD_LOCKED'		=> 'Ulæste i låst emne',
	'IMG_TOPIC_UNREAD_LOCKED_MINE'	=> 'Ulæste i låst emne aktiv i',

	'IMG_STICKY_READ'				=> 'Opslag',
	'IMG_STICKY_READ_MINE'			=> 'Opslag aktiv i',
	'IMG_STICKY_READ_LOCKED'		=> 'Opslag låst',
	'IMG_STICKY_READ_LOCKED_MINE'	=> 'Låst opslag aktiv i',
	'IMG_STICKY_UNREAD'				=> 'Ulæste i opslag',
	'IMG_STICKY_UNREAD_MINE'		=> 'Ulæste i opslag aktiv i',
	'IMG_STICKY_UNREAD_LOCKED'		=> 'Ulæste i låst opslag',
	'IMG_STICKY_UNREAD_LOCKED_MINE'	=> 'Ulæste i låst opslag aktiv i',

	'IMG_ANNOUNCE_READ'					=> 'Bekendtgørelse',
	'IMG_ANNOUNCE_READ_MINE'			=> 'Bekendtgørelse aktiv i',
	'IMG_ANNOUNCE_READ_LOCKED'			=> 'Bekendtgørelse låst',
	'IMG_ANNOUNCE_READ_LOCKED_MINE'		=> 'Låst bekendtgørelse aktiv i',
	'IMG_ANNOUNCE_UNREAD'				=> 'Ulæste i bekendtgørelse',
	'IMG_ANNOUNCE_UNREAD_MINE'			=> 'Ulæste i bekendtgørelse aktiv i',
	'IMG_ANNOUNCE_UNREAD_LOCKED'		=> 'Ulæste i låst bekendtgørelse',
	'IMG_ANNOUNCE_UNREAD_LOCKED_MINE'	=> 'Ulæste i låst bekendtgørelse aktiv i',

	'IMG_GLOBAL_READ'					=> 'Global bekendtgørelse',
	'IMG_GLOBAL_READ_MINE'				=> 'Global bekendtgørelse aktiv i',
	'IMG_GLOBAL_READ_LOCKED'			=> 'Global bekendtgørelse låst',
	'IMG_GLOBAL_READ_LOCKED_MINE'		=> 'Låst global bekendtgørelse aktiv i',
	'IMG_GLOBAL_UNREAD'					=> 'Ulæste i global bekendtgørelse',
	'IMG_GLOBAL_UNREAD_MINE'			=> 'Ulæste i global bekendtgørelse aktiv i',
	'IMG_GLOBAL_UNREAD_LOCKED'			=> 'Ulæste i låst global bekendtgørelse',
	'IMG_GLOBAL_UNREAD_LOCKED_MINE'		=> 'Ulæste i låst global bekendtgørelse aktiv i',

	'IMG_PM_READ'		=> 'Læs privat besked',
	'IMG_PM_UNREAD'		=> 'Ulæst privat besked',

	'IMG_ICON_BACK_TOP'			=> 'Tilbage til toppen',

	'IMG_ICON_CONTACT_AIM'		=> 'AIM',
	'IMG_ICON_CONTACT_EMAIL'	=> 'Send email',
	'IMG_ICON_CONTACT_ICQ'		=> 'ICQ',
	'IMG_ICON_CONTACT_JABBER'	=> 'Jabber',
	'IMG_ICON_CONTACT_MSNM'		=> 'MSNM',
	'IMG_ICON_CONTACT_PM'		=> 'Send privat besked',
	'IMG_ICON_CONTACT_YAHOO'	=> 'YIM',
	'IMG_ICON_CONTACT_WWW'		=> 'Hjemmeside',

	'IMG_ICON_POST_DELETE'			=> 'Slet indlæg',
	'IMG_ICON_POST_EDIT'			=> 'Rediger indlæg',
	'IMG_ICON_POST_INFO'			=> 'Vis information om indlægget',
	'IMG_ICON_POST_QUOTE'			=> 'Citer indlæg',
	'IMG_ICON_POST_REPORT'			=> 'Rapporter indlæg',
	'IMG_ICON_POST_TARGET'			=> 'Minipost',
	'IMG_ICON_POST_TARGET_UNREAD'	=> 'Ulæst minipost',


	'IMG_ICON_TOPIC_ATTACH'			=> 'Vedhæftet fil',
	'IMG_ICON_TOPIC_LATEST'			=> 'Seneste indlæg',
	'IMG_ICON_TOPIC_NEWEST'			=> 'Seneste ulæste indlæg',
	'IMG_ICON_TOPIC_REPORTED'		=> 'Rapporterede indlæg',
	'IMG_ICON_TOPIC_UNAPPROVED'		=> 'Ikke godkendte indlæg',

	'IMG_ICON_USER_ONLINE'		=> 'Bruger online',
	'IMG_ICON_USER_OFFLINE'		=> 'Bruger offline',
	'IMG_ICON_USER_PROFILE'		=> 'Vis profil',
	'IMG_ICON_USER_SEARCH'		=> 'Søg indlæg',
	'IMG_ICON_USER_WARN'		=> 'Advar bruger',

	'IMG_BUTTON_PM_FORWARD'		=> 'Videresend privat besked',
	'IMG_BUTTON_PM_NEW'			=> 'Ny privat besked',
	'IMG_BUTTON_PM_REPLY'		=> 'Besvar privat besked',
	'IMG_BUTTON_TOPIC_LOCKED'	=> 'Emne låst',
	'IMG_BUTTON_TOPIC_NEW'		=> 'Nyt emne',
	'IMG_BUTTON_TOPIC_REPLY'	=> 'Besvar emne',

	'IMG_USER_ICON1'		=> 'Brugerdefineret element 1',
	'IMG_USER_ICON2'		=> 'Brugerdefineret element 2',
	'IMG_USER_ICON3'		=> 'Brugerdefineret element 3',
	'IMG_USER_ICON4'		=> 'Brugerdefineret element 4',
	'IMG_USER_ICON5'		=> 'Brugerdefineret element 5',
	'IMG_USER_ICON6'		=> 'Brugerdefineret element 6',
	'IMG_USER_ICON7'		=> 'Brugerdefineret element 7',
	'IMG_USER_ICON8'		=> 'Brugerdefineret element 8',
	'IMG_USER_ICON9'		=> 'Brugerdefineret element 9',
	'IMG_USER_ICON10'		=> 'Brugerdefineret element 10',

	'INCLUDE_DIMENSIONS'		=> 'Inkluder dimensioner',
	'INCLUDE_IMAGESET'			=> 'Inkluder grafikpakke',
	'INCLUDE_TEMPLATE'			=> 'Inkluder skabelon',
	'INCLUDE_THEME'				=> 'Inkluder tema',
	'INHERITING_FROM'			=> 'Arvet fra',
	'INSTALL_IMAGESET'			=> 'Installer grafikpakke',
	'INSTALL_IMAGESET_EXPLAIN'	=> 'Her kan du installere den valgte grafikpakke. Du har mulighed for at ændre pakkeinformationer, eller anvende pakken som som den er.',
	'INSTALL_STYLE'				=> 'Installer typografi',
	'INSTALL_STYLE_EXPLAIN'		=> 'Her kan du installere en ny typografi og korresponderende elementer (tema, skabelon og grafikpakke). Hvis du allerede har de relevante elementer installeret, vil disse ikke blive overskrevet. Nogle typografier kræver, at eksisterende elementer allerede er installeret. Du bliver advaret, hvis du forsøger at installere en typografi, der ikke indeholder de nødvendige elementer.',
	'INSTALL_TEMPLATE'			=> 'Installer skabelon',
	'INSTALL_TEMPLATE_EXPLAIN'	=> 'Her kan du installere en ny skabelon. Du har et forskelligt antal muligheder, som er afhængig af din serverkonfiguration.',
	'INSTALL_THEME'				=> 'Installer tema',
	'INSTALL_THEME_EXPLAIN'		=> 'Her kan dit valgte tema installeres. Du kan ændre i temainformationerne eller vælge temaets grundindstillinger.',
	'INSTALLED_IMAGESET'		=> 'Installerede grafikpakker',
	'INSTALLED_STYLE'			=> 'Installerede typografier',
	'INSTALLED_TEMPLATE'		=> 'Installerede skabeloner',
	'INSTALLED_THEME'			=> 'Installerede temaer',

	'LINE_SPACING'				=> 'Linieafstand',
	'LOCALISED_IMAGES'			=> 'Sprogspecifikke grafikelementer',
	'LOCATION_DISABLED_EXPLAIN'	=> 'Denne indstilling er nedarvet og kan ikke ændres.',

	'NO_CLASS'					=> 'Klasse kunne ikke findes i typografien.',
	'NO_IMAGESET'				=> 'Grafikpakken findes ikke på filsystemet.',
	'NO_IMAGE'					=> 'Ingen grafikfil',
	'NO_IMAGE_ERROR'			=> 'Grafikfil findes ikke på filsystemet.',
	'NO_STYLE'					=> 'Typografien findes ikke på filsystemet.',
	'NO_TEMPLATE'				=> 'Skabelonen findes ikke på filsystemet.',
	'NO_THEME'					=> 'Temaet findes ikke på filsystemet.',
	'NO_UNINSTALLED_IMAGESET'	=> 'Ingen grafikpakker.',
	'NO_UNINSTALLED_STYLE'		=> 'Ingen typografier.',
	'NO_UNINSTALLED_TEMPLATE'	=> 'Ingen skabeloner.',
	'NO_UNINSTALLED_THEME'		=> 'Ingen temaer.',
	'NO_UNIT'					=> 'Ingen',

	'ONLY_IMAGESET'			=> 'Det er den sidste grafikpakke på boardet, du kan ikke slette den.',
	'ONLY_STYLE'			=> 'Det er den sidste typografi på boardet, du kan ikke slette den.',
	'ONLY_TEMPLATE'			=> 'Det er den sidste skabelon på boardet, du kan ikke slette den.',
	'ONLY_THEME'			=> 'Det er det sidste tema på boardet, du kan ikke slettet det.',
	'OPTIONAL_BASIS'		=> 'Basismuligheder',

	'REFRESH'					=> 'Genindlæs',
	'REPEAT_NO'					=> 'Ingen',
	'REPEAT_X'					=> 'Kun horisontalt',
	'REPEAT_Y'					=> 'Kun vertikalt',
	'REPEAT_ALL'				=> 'Begge retninger',
	'REPLACE_IMAGESET'			=> 'Erstat grafikpakke med',
	'REPLACE_IMAGESET_EXPLAIN'	=> 'Denne grafikpakke vil erstatte den du sletter i alle de typografier pakken anvendes.',
	'REPLACE_STYLE'				=> 'Erstat typografi med',
	'REPLACE_STYLE_EXPLAIN'		=> 'Denne typografi erstatter den du sletter, alle brugere der har valgt den oprindelige, vil automatisk få denne nye som typografi.',
	'REPLACE_TEMPLATE'			=> 'Erstat skabelon med',
	'REPLACE_TEMPLATE_EXPLAIN'	=> 'Denne skabelon erstatter den du sletter og i alle de typografier den anvendes.',
	'REPLACE_THEME'				=> 'Erstat tema med',
	'REPLACE_THEME_EXPLAIN'		=> 'Dette tema erstatter det du sletter og i alle de typografier det anvendes.',
	'REQUIRES_IMAGESET'			=> 'Denne typografi kræver at grafikpakken %s installeres.',
	'REQUIRES_TEMPLATE'			=> 'Denne typografi kræver at skabelonen %s installeres.',
	'REQUIRES_THEME'			=> 'Denne typografi kræver at temaet %s installeres.',

	'SELECT_IMAGE'				=> 'Vælg grafikelement',
	'SELECT_TEMPLATE'			=> 'Vælg skabelonfil',
	'SELECT_THEME'				=> 'Vælg temafil',
	'SELECTED_IMAGE'			=> 'Valgte grafikfil',
	'SELECTED_IMAGESET'			=> 'Valgte grafikpakke',
	'SELECTED_TEMPLATE'			=> 'Valgte skabelon',
	'SELECTED_TEMPLATE_FILE'	=> 'Valgte skabelonfil',
	'SELECTED_THEME'			=> 'Valgte tema',
	'SELECTED_THEME_FILE'		=> 'Valgte temafil',
	'STORE_DATABASE'			=> 'Database',
	'STORE_FILESYSTEM'			=> 'Filsystem',
	'STYLE_ACTIVATE'			=> 'Aktiver',
	'STYLE_ACTIVE'				=> 'Aktiv',
	'STYLE_ADDED'				=> 'Typografien er blevet tilføjet.',
	'STYLE_DEACTIVATE'			=> 'Deaktiver',
	'STYLE_DEFAULT'				=> 'Standardtypografi for boardet',
	'STYLE_DELETED'				=> 'Typografien er blevet slettet.',
	'STYLE_DETAILS_UPDATED'		=> 'Typografien er blevet ændret.',
	'STYLE_ERR_ARCHIVE'			=> 'Vælg arkiveringsformat.',
	'STYLE_ERR_COPY_LONG'		=> 'Copyright må ikke være længere end 60 tegn.',
	'STYLE_ERR_MORE_ELEMENTS'	=> 'Du skal vælge mindst et typografielement.',
	'STYLE_ERR_NAME_CHARS'		=> 'Typografinavnet må kun indeholde alfanumeriske tegn, samt -, +, _ og mellemrum.',
	'STYLE_ERR_NAME_EXIST'		=> 'Der eksisterer allerede en typografi med dette navn.',
	'STYLE_ERR_NAME_LONG'		=> 'Typografinavnet må ikke være længere end 30 tegn.',
	'STYLE_ERR_NO_IDS'			=> 'Du skal vælge en skabelon, et tema og en grafikpakke til denne typografi.',
	'STYLE_ERR_NOT_STYLE'		=> 'Den importerede eller uploadede fil indeholder ikke et gyldigt typografiarkiv.',
	'STYLE_ERR_STYLE_NAME'		=> 'Du skal angive et navn til denne typografi.',
	'STYLE_EXPORT'				=> 'Eksporter typografi',
	'STYLE_EXPORT_EXPLAIN'		=> 'Her kan du eksportere typografien til et arkiv. En typografi behøver ikke at indeholde alle elementer (skabeloner osv), men skal mindst indeholde et. Hvis du f.eks. har lavet et nyt tema og en grafikpakke til en almindelig brugt skabelon, kan du simpelthen eksportere disse og undlade skabelonen. Du kan vælge at hente filen direkte, placere den i din lagermappe til senere hentning, eventuelt med FTP.',
	'STYLE_EXPORTED'			=> 'Typografien er eksporteret og gemt i %s.',
	'STYLE_IMAGESET'			=> 'Grafikpakke',
	'STYLE_NAME'				=> 'Typografiens navn',
	'STYLE_TEMPLATE'			=> 'Skabelon',
	'STYLE_THEME'				=> 'Tema',
	'STYLE_USED_BY'				=> 'Bruges af (inklusive botter)',

	'TEMPLATE_ADDED'			=> 'Skabelonen er blevet tilføjet og lagret i filsystemet.',
	'TEMPLATE_ADDED_DB'			=> 'Skabelonen er blevet tilføjet og lagret i databasen.',
	'TEMPLATE_CACHE'			=> 'Skabelonmellemlager',
	'TEMPLATE_CACHE_EXPLAIN'	=> 'I standardindstillingen mellemlagrer phpBB den oversatte skabelon. Det reducerer belastningen på serveren hver gang en side vises og medvirker til at reducere den tid det tager at generere en side. Her kan du se hver fils mellemlagerstatus og slette enkelte filer eller hele mellemlageret.',
	'TEMPLATE_CACHE_CLEARED'	=> 'Skabelonmellemlageret er slettet.',
	'TEMPLATE_CACHE_EMPTY'		=> 'Der er ingen mellemlagrede skabeloner.',
	'TEMPLATE_DELETED'			=> 'Skabelonen er slettet.',
	'TEMPLATE_DELETE_DEPENDENT'	=> 'Skabelonen kan ikke slettes, da en eller flere andre skabeloner arver dennes egenskaber:',
	'TEMPLATE_DELETED_FS'		=> 'Skabelonen er slettet fra databasen, men der kan restere filer på filsystemet.',
	'TEMPLATE_DETAILS_UPDATED'	=> 'Informationer om skabelonen er blevet opdateret.',
	'TEMPLATE_EDITOR'			=> 'Rå HTML-skabeloneditor',
	'TEMPLATE_EDITOR_HEIGHT'	=> 'Skabelonhøjdeeditor',
	'TEMPLATE_ERR_ARCHIVE'		=> 'Vælg arkiveringsformat.',
	'TEMPLATE_ERR_CACHE_READ'	=> 'Mellemlagermappe brugt til at gemme udgaver af skabelonfiler som ikke kunne åbnes.',
	'TEMPLATE_ERR_COPY_LONG'	=> 'Copyright må ikke være længere end 60 tegn.',
	'TEMPLATE_ERR_NAME_CHARS'	=> 'Navnet på skabelonen må kun indeholde alfanumeriske tegn, samt -, +, _ og mellemrum.',
	'TEMPLATE_ERR_NAME_EXIST'	=> 'Der eksisterer allerede en skabelon med dette navn.',
	'TEMPLATE_ERR_NAME_LONG'	=> 'Navnet på skabelonen må ikke være længere end 30 tegn.',
	'TEMPLATE_ERR_NOT_TEMPLATE'	=> 'Det angivne arkiv indeholder ikke en gyldigt skabelon.',
	'TEMPLATE_ERR_REQUIRED_OR_INCOMPLETE'	=> 'Den nye skabelon forudsætter at skabelonen %s er installeret og ikke arver egenskaber fra sig selv.',
	'TEMPLATE_ERR_STYLE_NAME'	=> 'Du skal angive et navn til denne skabelon.',
	'TEMPLATE_EXPORT'			=> 'Eksporter skabelon',
	'TEMPLATE_EXPORT_EXPLAIN'	=> 'Her kan du eksportere en skabelon som et arkiv. Arkivet vil indeholde alle nødvendige data for at installere skabelonen på et andet board. Du kan vælge at hente filen direkte, placere den i din lagermappe til senere hentning, eventuelt med FTP.',
	'TEMPLATE_EXPORTED'			=> 'Skabeloner er eksporteret og gemt i %s.',
	'TEMPLATE_FILE'				=> 'Skabelonfil',
	'TEMPLATE_FILE_UPDATED'		=> 'Skabelonfilen er blevet opdateret.',
	'TEMPLATE_INHERITS'		=> 'Skabelonen arver egenskaber fra %s og skal derfor anvende samme indstillinger for lagring af skabelonfiler som denne.',
	'TEMPLATE_LOCATION'			=> 'Gem skabelonen i',
	'TEMPLATE_LOCATION_EXPLAIN'	=> 'Billeder bliver altid gemt i filsystemet.',
	'TEMPLATE_NAME'				=> 'Skabelonnavn',
	'TEMPLATE_FILE_NOT_WRITABLE'	=> 'Der kan ikke skrives til templatefilen %s. Kontroller venligst at tilladelser for mappen og filerne er korrekte.',
	'TEMPLATE_REFRESHED'		=> 'Skabelonen er genindlæst.',

	'THEME_ADDED'				=> 'Nyt tema er tilføjet i filsystemet.',
	'THEME_ADDED_DB'			=> 'Nyt tema er tilføjet i databasen.',
	'THEME_CLASS_ADDED'			=> 'Klasse er blevet tilføjet.',
	'THEME_DELETED'				=> 'Temaet er blevet slettet.',
	'THEME_DELETED_FS'			=> 'Temaet er slettet fra databasen, men findes stadig i filsystemet.',
	'THEME_DETAILS_UPDATED'		=> 'Informationer om temaet er blevet opdateret.',
	'THEME_EDITOR'				=> 'Temaeditor',
	'THEME_EDITOR_HEIGHT'		=> 'Temahøjdeeditor',
	'THEME_ERR_ARCHIVE'			=> 'Vælg arkiveringsmetode.',
	'THEME_ERR_CLASS_CHARS'		=> 'Kun alfanummeriske tegn og ., :, -, _ samt # kan bruges i klassenavne.',
	'THEME_ERR_COPY_LONG'		=> 'Copyright må ikke være længere end 60 tegn.',
	'THEME_ERR_NAME_CHARS'		=> 'Temanavnet må kun indeholde alfanumeriske tegn, samt -, +, _ og mellemrum.',
	'THEME_ERR_NAME_EXIST'		=> 'Der eksisterer allerede et tema med dette navn.',
	'THEME_ERR_NAME_LONG'		=> 'Temanavnet må ikke være længere end 30 tegn.',
	'THEME_ERR_NOT_THEME'		=> 'Det angivne arkiv indeholder ikke et gyldigt tema.',
	'THEME_ERR_REFRESH_FS'		=> 'Temaet er gemt på filsystemet, så der er ingen grund til at genindlæse det.',
	'THEME_ERR_STYLE_NAME'		=> 'Du skal angive et navn til dette tema.',
	'THEME_FILE'				=> 'Temafil',
	'THEME_EXPORT'				=> 'Eksporter tema',
	'THEME_EXPORT_EXPLAIN'		=> 'Her kan du eksportere et tema som et arkiv. Arkivet vil indeholde alle nødvendige data for at installere temaet på et andet board. Du kan vælge at hente filen direkte, placere den i din lagermappe til senere hentning, eventuelt med FTP.',
	'THEME_EXPORTED'			=> 'Temaet er blevet eksporteret og gemt i %s.',
	'THEME_LOCATION'			=> 'Gem tema i',
	'THEME_LOCATION_EXPLAIN'	=> 'Billeder bliver altid gemt på filsystemet.',
	'THEME_NAME'				=> 'Temanavn',
	'THEME_REFRESHED'			=> 'Temaet er blevet genindlæst.',
	'THEME_UPDATED'				=> 'Temaet er blevet opdateret.',

	'UNDERLINE'				=> 'Understreg',
	'UNINSTALLED_IMAGESET'	=> 'Ikke installerede grafikpakker',
	'UNINSTALLED_STYLE'		=> 'Ikke installerede typografier',
	'UNINSTALLED_TEMPLATE'	=> 'Ikke installerede skabeloner',
	'UNINSTALLED_THEME'		=> 'Ikke installerede temaer',
	'UNSET'					=> 'Ikke defineret',

));

?>