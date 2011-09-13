<?php
/**
*
* mcp [Danish]
*
* @package language
* @version Id: mcp.php 10455 2010-01-26 14:06:00Z nickvergessen $
* @version $Id: mcp.php 39 2010-03-06 12:43:59Z jan skovsgaard $
* @source file is copyright (c) 2005 phpBB Group,
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
	'ACTION'				=> 'Handling',
	'ACTION_NOTE'			=> 'Handling eller notat',
	'ADD_FEEDBACK'			=> 'Tilføj brugernotat',
	'ADD_FEEDBACK_EXPLAIN'	=> 'Brugernotatet tilføjes i nedenstående felt. Brug kun ren tekst. HTML, BBkode etc. er ikke tilladt.',
	'ADD_WARNING'			=> 'Udsted advarsel',
	'ADD_WARNING_EXPLAIN'	=> 'For at udstede en advarsel til denne bruger skal efterfølgende formular udfyldes. Brug kun ren tekst, HTML, BBkode, etc. er ikke tilladt.',
	'ALL_ENTRIES'			=> 'Alle data',
	'ALL_NOTES_DELETED'		=> 'Alle brugernotater er slettet.',
	'ALL_REPORTS'			=> 'Alle rapporter',
	'ALREADY_REPORTED'		=> 'Dette indlæg er allerede blevet rapporteret.',
	'ALREADY_REPORTED_PM'	=> 'Denne private besked er allerede blevet rapporteret.',
	'ALREADY_WARNED'		=> 'Der er allerede udstedt en advarsel vedrørende dette indlæg.',
	'APPROVE'				=> 'Godkend',
	'APPROVE_POST'			=> 'Godkend indlæg',
	'APPROVE_POST_CONFIRM'	=> 'Er du sikker på at du vil godkende dette indlæg?',
	'APPROVE_POSTS'			=> 'Godkende indlæg',
	'APPROVE_POSTS_CONFIRM'	=> 'Er du sikker på at du vil godkende de valgte indlæg?',

	'CANNOT_MOVE_SAME_FORUM'=> 'Du kan ikke flytte et emne til det forum, hvori det allerede befinder sig.',
	'CANNOT_WARN_ANONYMOUS'	=> 'Du kan ikke udstede en advarsel til en ikke tilmeldt bruger.',
	'CANNOT_WARN_SELF'		=> 'Du kan ikke udstede en advarsel til dig selv.',
	'CAN_LEAVE_BLANK'		=> 'Behøves ikke at blive udfyldt.',
	'CHANGE_POSTER'			=> 'Ændre forfatter',
	'CLOSE_PM_REPORT'		=> 'Luk PB-rapport',
	'CLOSE_PM_REPORT_CONFIRM'	=> 'Er du sikker på at du vil lukke denne PB-rapport?',
	'CLOSE_PM_REPORTS'		=> 'Luk PB-rapporter',
	'CLOSE_PM_REPORTS_CONFIRM'	=> 'Er du sikker på at du vil lukke disse PB-rapporter?',
	'CLOSE_REPORT'			=> 'Luk rapport',
	'CLOSE_REPORT_CONFIRM'	=> 'Er du sikker på at du vil lukke den valgte rapport?',
	'CLOSE_REPORTS'			=> 'Luk rapporter',
	'CLOSE_REPORTS_CONFIRM'	=> 'Er du sikker på at du vil lukke de valgte rapporter?',

	'DELETE_PM_REPORT'			=> 'Slet PB-rapport',
	'DELETE_PM_REPORT_CONFIRM'	=> 'Er du sikker på at du vil slette denne PB-rapport?',
	'DELETE_PM_REPORTS'			=> 'Slet PB-rapporter',
	'DELETE_PM_REPORTS_CONFIRM'	=> 'Er du sikker på at du vil slette disse PB-rapporter?',
	'DELETE_POSTS'			=> 'Slet indlæg',
	'DELETE_POSTS_CONFIRM'	=> 'Er du sikker på at du vil slette disse indlæg?',
	'DELETE_POST_CONFIRM'	=> 'Er du sikker på at du vil slette dette indlæg?',
	'DELETE_REPORT'			=> 'Slet rapport',
	'DELETE_REPORT_CONFIRM'	=> 'Er du sikker på at du vil slette den valgte rapport?',
	'DELETE_REPORTS'		=> 'Slet rapporter',
	'DELETE_REPORTS_CONFIRM'	=> 'Er du sikker på at du vil slette de valgte rapporter?',
	'DELETE_SHADOW_TOPIC'	=> 'Slet skyggeemne',
	'DELETE_TOPICS'			=> 'Slet valgte emner',
	'DELETE_TOPICS_CONFIRM'	=> 'Er du sikker på at du vil slette disse emner?',
	'DELETE_TOPIC_CONFIRM'	=> 'Er du sikker på at du vil slette dette emne?',
	'DISAPPROVE'			=> 'Afvis',
	'DISAPPROVE_REASON'		=> 'Grund til afvisning',
	'DISAPPROVE_POST'		=> 'Afvis indlæg',
	'DISAPPROVE_POST_CONFIRM'	=> 'Er du sikker på at du vil afvise dette indlæg?',
	'DISAPPROVE_POSTS'		=> 'Afvis indlæg',
	'DISAPPROVE_POSTS_CONFIRM'	=> 'Er du sikker på at du vil afvise de valgte indlæg?',
	'DISPLAY_LOG'			=> 'Vis datalog',
	'DISPLAY_OPTIONS'		=> 'Vis muligheder',

	'EMPTY_REPORT'			=> 'Du skal angive en beskrivelse når denne mulighed vælges.',
	'EMPTY_TOPICS_REMOVED_WARNING'	=> 'Bemærk at et eller flere emner er slettet fra databasen, da de enten var eller blev tomme.',

	'FEEDBACK'				=> 'Brugernotater',
	'FORK'					=> 'Kopier',
	'FORK_TOPIC'			=> 'Kopier emne',
	'FORK_TOPIC_CONFIRM'	=> 'Er du sikker på at du vil kopiere dette emne?',
	'FORK_TOPICS'			=> 'Kopier valgte emner',
	'FORK_TOPICS_CONFIRM'	=> 'Er du sikker på du vil kopiere de valgte emner?',
	'FORUM_DESC'			=> 'Beskrivelse',
	'FORUM_NAME'			=> 'Forumnavn',
	'FORUM_NOT_EXIST'		=> 'Det valgte forum eksisterer ikke.',
	'FORUM_NOT_POSTABLE'	=> 'Du kan ikke skrive indlæg i det valgte forum.',
	'FORUM_STATUS'			=> 'Forumstatus',
	'FORUM_STYLE'			=> 'Forumtypografi',

	'GLOBAL_ANNOUNCEMENT'	=> 'Global bekendtgørelse',

	'IP_INFO'				=> 'Information om IP-adresse',
	'IPS_POSTED_FROM'		=> 'IP-adresser denne bruger har skrevet fra',

	'LATEST_LOGS'				=> 'De seneste 5 loggede handlinger',
	'LATEST_REPORTED'			=> 'De seneste 5 rapporter der afventer behandling',
	'LATEST_REPORTED_PMS'		=> 'De seneste 5 rapporter om private beskeder',
	'LATEST_UNAPPROVED'			=> 'De seneste 5 indlæg der afventer godkendelse',
	'LATEST_WARNING_TIME'		=> 'Brugers seneste advarsel',
	'LATEST_WARNINGS'			=> 'De seneste 5 advarsler',
	'LEAVE_SHADOW'				=> 'Efterlad skyggeemne i oprindelige forum',
	'LIST_REPORT'				=> '1 rapport',
	'LIST_REPORTS'				=> '%d rapporter',
	'LOCK'						=> 'Lås',
	'LOCK_POST_POST'			=> 'Lås indlæg',
	'LOCK_POST_POST_CONFIRM'	=> 'Er du sikker på at du vil låse dette indlæg?',
	'LOCK_POST_POSTS'			=> 'Lås valgte indlæg',
	'LOCK_POST_POSTS_CONFIRM'	=> 'Er du sikker på at du vil låse disse indlæg?',
	'LOCK_TOPIC_CONFIRM'		=> 'Er du sikker på at du vil låse dette emne?',
	'LOCK_TOPICS'				=> 'Lås valgte emner',
	'LOCK_TOPICS_CONFIRM'		=> 'Er du sikker på at du vil låse alle de valgte emner?',
	'LOGS_CURRENT_TOPIC'		=> 'I øjeblikket kan logs ikke ses:',
	'LOGIN_EXPLAIN_MCP'			=> 'For at redigere i forummet skal du logge ind.',
	'LOGVIEW_VIEWTOPIC'			=> 'Se emne',
	'LOGVIEW_VIEWLOGS'			=> 'Se emnets log',
	'LOGVIEW_VIEWFORUM'			=> 'Se forum',
	'LOOKUP_ALL'				=> 'Se alle IP-adresser',
	'LOOKUP_IP'					=> 'Se IP-adresse',

	'MARKED_NOTES_DELETED'		=> 'Alle valgte brugernotater er slettet.',

	'MCP_ADD'						=> 'Tilføj en advarsel',

	'MCP_BAN'					=> 'Udelukkelse',
	'MCP_BAN_EMAILS'			=> 'Udeluk emailadresser',
	'MCP_BAN_IPS'				=> 'Udeluk IP-adresser',
	'MCP_BAN_USERNAMES'			=> 'Udeluk brugere',

	'MCP_LOGS'						=> 'Redaktørlog',
	'MCP_LOGS_FRONT'				=> 'Forside',
	'MCP_LOGS_FORUM_VIEW'			=> 'Forumlogs',
	'MCP_LOGS_TOPIC_VIEW'			=> 'Emnelogs',

	'MCP_MAIN'						=> 'Oversigt',
	'MCP_MAIN_FORUM_VIEW'			=> 'Se forum',
	'MCP_MAIN_FRONT'				=> 'Forside',
	'MCP_MAIN_POST_DETAILS'			=> 'Vis information',
	'MCP_MAIN_TOPIC_VIEW'			=> 'Se emne',
	'MCP_MAKE_ANNOUNCEMENT'			=> 'Ændre til "Bekendtgørelse"',
	'MCP_MAKE_ANNOUNCEMENT_CONFIRM'	=> 'Er du sikker på at du vil ændre dette emne til en bekendtgørelse?',
	'MCP_MAKE_ANNOUNCEMENTS'		=> 'Ændre til "Bekendtgørelser"',
	'MCP_MAKE_ANNOUNCEMENTS_CONFIRM'=> 'Er du sikker på at du vil ændre de valgte emner til bekendtgørelser?',
	'MCP_MAKE_GLOBAL'				=> 'Ændre til "Global bekendtgørelse"',
	'MCP_MAKE_GLOBAL_CONFIRM'		=> 'Er du sikker på at du vil ændre dette emne til en global bekendtgørelse?',
	'MCP_MAKE_GLOBALS'				=> 'Ændre til "Globale bekendtgørelser"',
	'MCP_MAKE_GLOBALS_CONFIRM'		=> 'Er du sikker på at du vil ændre de valgte emner til globale bekendtgørelser?',
	'MCP_MAKE_STICKY'				=> 'Ændre til "Opslag"',
	'MCP_MAKE_STICKY_CONFIRM'		=> 'Er du sikker på at du vil ændre dette emne til et opslag?',
	'MCP_MAKE_STICKIES'				=> 'Ændre til "Opslag"',
	'MCP_MAKE_STICKIES_CONFIRM'		=> 'Er du sikker på at du vil ændre de valgte emner til opslag?',
	'MCP_MAKE_NORMAL'				=> 'Ændre til "Standardemne"',
	'MCP_MAKE_NORMAL_CONFIRM'		=> 'Er du sikker på at du vil ændre dette emne til et standardemne?',
	'MCP_MAKE_NORMALS'				=> 'Ændre til "Standardemner"',
	'MCP_MAKE_NORMALS_CONFIRM'		=> 'Er du sikker på at du vil ændre de valgte emner til standardemner?',

	'MCP_NOTES'						=> 'Brugernotater',
	'MCP_NOTES_FRONT'				=> 'Forside',
	'MCP_NOTES_USER'				=> 'Brugerinformation',
	
	'MCP_POST_REPORTS'				=> 'Rapporter med baggrund i dette indlæg',

	'MCP_PM_REPORTS'				=> 'Rapporterede private beskeder',
	'MCP_PM_REPORT_DETAILS'			=> 'PB-rapportens indhold',
	'MCP_PM_REPORTS_CLOSED'			=> 'Lukkede PB-rapporter',
	'MCP_PM_REPORTS_CLOSED_EXPLAIN'	=> 'Alle behandlede rapporter om private beskeder.',
	'MCP_PM_REPORTS_OPEN'			=> 'Åbne PB-rapporter',
	'MCP_PM_REPORTS_OPEN_EXPLAIN'	=> 'Disse PB-rapporter afventer behandling.',

	'MCP_REPORTS'					=> 'Rapporterede meddelelser',
	'MCP_REPORT_DETAILS'			=> 'Indhold af rapport',
	'MCP_REPORTS_CLOSED'			=> 'Lukkede rapporter',
	'MCP_REPORTS_CLOSED_EXPLAIN'	=> 'Alle behandlede rapporter om indlæg.',
	'MCP_REPORTS_OPEN'				=> 'Åbne rapporter',
	'MCP_REPORTS_OPEN_EXPLAIN'		=> 'Disse rapporter afventer behandling.',

	'MCP_QUEUE'								=> 'Godkendelseskø',
	'MCP_QUEUE_APPROVE_DETAILS'				=> 'Godkend indhold',
	'MCP_QUEUE_UNAPPROVED_POSTS'			=> 'Indlæg der afventer godkendelse',
	'MCP_QUEUE_UNAPPROVED_POSTS_EXPLAIN'	=> 'Disse indlæg skal godkendes før de vises på boardet.',
	'MCP_QUEUE_UNAPPROVED_TOPICS'			=> 'Emner der afventer godkendelse',
	'MCP_QUEUE_UNAPPROVED_TOPICS_EXPLAIN'	=> 'Disse emner skal godkendes før de vises på boardet.',

	'MCP_VIEW_USER'			=> 'Vis advarsler til en specifik bruger',

	'MCP_WARN'				=> 'Advarsler',
	'MCP_WARN_FRONT'		=> 'Forside',
	'MCP_WARN_LIST'			=> 'Liste over advarsler',
	'MCP_WARN_POST'			=> 'Advarsler for et specifikt indlæg',
	'MCP_WARN_USER'			=> 'Advar bruger',

	'MERGE_POSTS'			=> 'Sammenlæg indlæg',
	'MERGE_POSTS_CONFIRM'	=> 'Er du sikker på du ønsker at sammenlægge de valgte indlæg?',
	'MERGE_TOPIC_EXPLAIN'	=> 'Ved at bruge nedenstående kan du sammenlægge de valgte indlæg med andet emne. Indlæggene bliver flyttet til nyt emne med uændrede indsendelsesdata og vil se ud som brugerne har skrevet dem i det nye emne.<br />Angiv venligst det emne indlæggene skal sammenlægges med, eller klik på "Vælg emne" knappen for at søge efter det.',
	'MERGE_TOPIC_ID'		=> 'Det modtagende emnes identifikationsnummer',
	'MERGE_TOPICS'			=> 'Sammenlæg emner',
	'MERGE_TOPICS_CONFIRM'	=> 'Er du sikker på du vil sammenlægge de valgte emner?',
	'MODERATE_FORUM'		=> 'Rediger forum',
	'MODERATE_TOPIC'		=> 'Rediger emne',
	'MODERATE_POST'			=> 'Rediger indlæg',
	'MOD_OPTIONS'			=> 'Redigeringsmuligheder',
	'MORE_INFO'				=> 'Yderligere informationer',
	'MOST_WARNINGS'			=> 'Brugere med flest advarsler',
	'MOVE_TOPIC_CONFIRM'	=> 'Er du sikker på du vil flytte emnet til et nyt forum?',
	'MOVE_TOPICS'			=> 'Flyt valgte emner',
	'MOVE_TOPICS_CONFIRM'	=> 'Er du sikker på du vil flytte de valgte emner til et nyt forum?',

	'NOTIFY_POSTER_APPROVAL'=> 'Informer afsender om godkendelse?',
	'NOTIFY_POSTER_DISAPPROVAL' => 'Informer afsender om afvisning?',
	'NOTIFY_USER_WARN'		=> 'Informer bruger om advarsel?',
	'NOT_MODERATOR'			=> 'Du er ikke redaktør i dette forum.',
	'NO_DESTINATION_FORUM'	=> 'Vælg venligst det forum der skal modtage.',
	'NO_DESTINATION_FORUM_FOUND'	=> 'Der er intet modtageforum tilgængeligt.',
	'NO_ENTRIES'			=> 'Der er ingen logs i den periode.',
	'NO_FEEDBACK'			=> 'Der er ingen notater om denne bruger.',
	'NO_FINAL_TOPIC_SELECTED'	=> 'Du skal vælge et emne som skal modtage de indlæg du ønsker at samle.',
	'NO_MATCHES_FOUND'		=> 'Ingen sammenfald fundet.',
	'NO_POST'				=> 'Du skal vælge et indlæg for at advare brugeren om et indlæg.',
	'NO_POST_REPORT'		=> 'Dette indlæg blev ikke rapporteret.',
	'NO_POST_SELECTED'		=> 'Du skal vælge mindst et indlæg for at udføre denne handling.',
	'NO_REASON_DISAPPROVAL'	=> 'Angiv venligst en fornuftig begrundelse for afvisningen.',
	'NO_REPORT'				=> 'Ingen rapport fundet.',
	'NO_REPORTS'			=> 'Ingen rapporter fundet.',
	'NO_REPORT_SELECTED'	=> 'Du skal vælge mindst en rapport for at udføre denne handling.',
	'NO_TOPIC_ICON'			=> 'Ingen',
	'NO_TOPIC_SELECTED'		=> 'Du skal vælge mindst et emne for at udføre denne handling.',
	'NO_TOPICS_QUEUE'		=> 'Ingen emner afventer godkendelse.',

	'ONLY_TOPIC'			=> 'Kun emne "%s"',
	'OTHER_USERS'			=> 'Andre brugere der skriver fra denne IP-adresse',

	'PM_REPORT_CLOSED_SUCCESS'	=> 'Den valgte PB-rapport er nu lukket.',
	'PM_REPORT_DELETED_SUCCESS'	=> 'Den valgte PB-rapport er nu slettet.',
	'PM_REPORTED_SUCCESS'		=> 'Denne private besked er nu rapporteret.',
	'PM_REPORT_TOTAL'			=> '<strong>1</strong> PB-rapport afventer behandling.',
	'PM_REPORTS_CLOSED_SUCCESS'	=> 'De valgte PB-rapporter er nu lukket.',
	'PM_REPORTS_DELETED_SUCCESS'	=> 'De valgte PB-rapporter er nu slettet.',
	'PM_REPORTS_TOTAL'			=> '<strong>%d</strong> PB-rapporter afventer behandling.',
	'PM_REPORTS_ZERO_TOTAL'		=> 'Ingen ubehandlede PB-rapporter.',
	'PM_REPORT_DETAILS'			=> 'PB-rapportens indhold',
	'POSTER'				=> 'Afsender',
	'POSTS_APPROVED_SUCCESS'=> 'De valgte indlæg er nu blevet godkendt.',
	'POSTS_DELETED_SUCCESS'	=> 'De valgte indlæg er nu blevet slettet fra databasen.',
	'POSTS_DISAPPROVED_SUCCESS'=> 'De valgte indlæg er nu blevet afvist.',
	'POSTS_LOCKED_SUCCESS'	=> 'De valgte indlæg er nu blevet låst.',
	'POSTS_MERGED_SUCCESS'	=> 'De valgte indlæg er nu blevet sammenlagt.',
	'POSTS_UNLOCKED_SUCCESS'=> 'De valgte indlæg er nu blevet låst op.',
	'POSTS_PER_PAGE'		=> 'Indlæg pr. side',
	'POSTS_PER_PAGE_EXPLAIN'=> '(Sæt til 0 for at se alle indlæg).',
	'POST_APPROVED_SUCCESS'	=> 'Det valgte indlæg er nu blevet godkendt.',
	'POST_DELETED_SUCCESS'	=> 'De valgte indlæg er nu blevet slettet fra databasen.',
	'POST_DISAPPROVED_SUCCESS'	=> 'Det valgte indlæg er nu blevet afvist.',
	'POST_LOCKED_SUCCESS'	=> 'Indlægget er nu blevet låst.',
	'POST_NOT_EXIST'		=> 'Indlægget eksisterer ikke.',
	'POST_REPORTED_SUCCESS'	=> 'Indlægget er nu blevet rapporteret.',
	'POST_UNLOCKED_SUCCESS'	=> 'Indlægget er nu blevet låst op.',

	'READ_USERNOTES'		=> 'Brugernotater',
	'READ_WARNINGS'			=> 'Brugeradvarsler',
	'REPORTER'				=> 'Rapporterende bruger',
	'REPORTED'				=> 'Rapporteret',
	'REPORTED_BY'			=> 'Rapporteret af',
	'REPORTED_ON_DATE'		=> '',
	'REPORTS_CLOSED_SUCCESS'	=> 'De valgte rapporter er nu blevet lukket.',
	'REPORTS_DELETED_SUCCESS'	=> 'De valgte rapporter er nu slettet.',
	'REPORTS_TOTAL'			=> '<strong>%d</strong> rapporter afventer behandling.',
	'REPORTS_ZERO_TOTAL'	=> 'Ingen ubehandlede rapporter.',
	'REPORT_CLOSED'			=> 'Denne rapport er allerede lukket.',
	'REPORT_CLOSED_SUCCESS'	=> 'Den valgte rapport er nu blevet lukket.',
	'REPORT_DELETED_SUCCESS'	=> 'Den valgte rapport er nu blevet slettet.',
	'REPORT_DETAILS'		=> 'Rapportoplysninger',
	'REPORT_MESSAGE'		=> 'Rapporter denne meddelelse',
	'REPORT_MESSAGE_EXPLAIN'=> 'Brug denne formular for at rapportere valgte private besked. Generelt skal man kun rapportere, hvis beskeder bryder med forummets regler. <strong>Når en privat besked rapporteres bliver indholdet synligt for alle redaktører.</strong>',
	'REPORT_NOTIFY'			=> 'Informer mig',
	'REPORT_NOTIFY_EXPLAIN'	=> 'Du modtager information når din rapport er behandlet.',
	'REPORT_POST_EXPLAIN'	=> 'Brug denne formular for at rapportere det valgte indlæg til boardets administratorer og redaktører. Generelt skal man kun rapportere, hvis indlæg bryder med forummets regler.',
	'REPORT_REASON'			=> 'Begrundelse for rapporten',
	'REPORT_TIME'			=> 'Rapporteret',
	'REPORT_TOTAL'			=> '<strong>1</strong> rapport afventer gennemsyn.',
	'RESYNC'				=> 'Synkroniser',
	'RETURN_MESSAGE'		=> '%sTilbage til meddelelse%s',
	'RETURN_NEW_FORUM'		=> '%sGå til det nye forum%s',
	'RETURN_NEW_TOPIC'		=> '%sGå til det nye emne%s',
	'RETURN_PM'					=> '%sTilbage til den private besked%s',
	'RETURN_POST'			=> '%sTilbage til indlægget%s',
	'RETURN_QUEUE'			=> '%sTilbage til køen%s',
	'RETURN_REPORTS'		=> '%sTilbage til rapporteringerne%s',
	'RETURN_TOPIC_SIMPLE'	=> '%sTilbage til emnet%s',

	'SEARCH_POSTS_BY_USER'	=> 'Vælg indlæg fra',
	'SELECT_ACTION'			=> 'Vælg ønskede handling',
	'SELECT_FORUM_GLOBAL_ANNOUNCEMENT'	=> 'Vælg venligst det forum hvori du ønsker denne globale bekendtgørelse vist.',
	'SELECT_FORUM_GLOBAL_ANNOUNCEMENTS'	=> 'Et eller flere af de valgte emner er globale bekendtgørelser. Vælg venligst det forum hvori du ønsker disse vist.',
	'SELECT_MERGE'			=> 'Vælg til sammenlægning',
	'SELECT_TOPICS_FROM'	=> 'Vælg emne fra',
	'SELECT_TOPIC'			=> 'Vælg emne',
	'SELECT_USER'			=> 'Vælg bruger',
	'SORT_ACTION'			=> 'Loghændelse',
	'SORT_DATE'				=> 'Dato',
	'SORT_IP'				=> 'IP-adresse',
	'SORT_WARNINGS'			=> 'Advarsler',
	'SPLIT_AFTER'			=> 'Del emne fra valgte indlæg og fremefter',
	'SPLIT_FORUM'			=> 'Forum til det nye emne',
	'SPLIT_POSTS'			=> 'Del valgte indlæg',
	'SPLIT_SUBJECT'			=> 'Ny emnetitel',
	'SPLIT_TOPIC_ALL'		=> 'Del emne fra valgte indlæg',
	'SPLIT_TOPIC_ALL_CONFIRM'	=> 'Er du sikker på at du ønsker at dele dette emne?',
	'SPLIT_TOPIC_BEYOND'	=> 'Del emnet ved valgte indlæg',
	'SPLIT_TOPIC_BEYOND_CONFIRM'	=> 'Er du sikker på at du ønsker at dele emnet ved valgte indlæg?',
	'SPLIT_TOPIC_EXPLAIN'	=> 'Ved at bruge nedenstående kan du dele et emne i to, enten ved at vælge indlæggene individuelt eller ved at dele ved et valgt indlæg.',

	'THIS_PM_IP'				=> 'Beskeden er afsendt fra IP-adressen', 
	'THIS_POST_IP'			=> 'Indlægget er indsendt fra IP-adressen',
	'TOPICS_APPROVED_SUCCESS'	=> 'De valgte emner er nu blevet godkendt.',
	'TOPICS_DELETED_SUCCESS'=> 'De valgte emner er nu slettet fra databasen.',
	'TOPICS_DISAPPROVED_SUCCESS'	=> 'De valgte emner er nu blevet afvist.',
	'TOPICS_FORKED_SUCCESS'	=> 'De valgte emner er nu blevet kopieret.',
	'TOPICS_LOCKED_SUCCESS'	=> 'De valgte emner er nu blevet låst.',
	'TOPICS_MOVED_SUCCESS'	=> 'De valgte emner er nu blevet flyttet.',
	'TOPICS_RESYNC_SUCCESS'	=> 'De valgte emner er nu blevet synkroniseret.',
	'TOPICS_TYPE_CHANGED'	=> 'Emnetype er blevet ændret.',
	'TOPICS_UNLOCKED_SUCCESS'	=> 'De valgte emner er nu blevet låst op.',
	'TOPIC_APPROVED_SUCCESS'	=> 'Det valgte emne er nu blevet godkendt.',
	'TOPIC_DELETED_SUCCESS'	=> 'Det valgte emne er nu slettet fra databasen.',
	'TOPIC_DISAPPROVED_SUCCESS'	=> 'Det valgte emne er nu blevet afvist.',
	'TOPIC_FORKED_SUCCESS'	=> 'Det valgte emne er nu blevet kopieret.',
	'TOPIC_LOCKED_SUCCESS'	=> 'Det valgte emne er nu blevet låst.',
	'TOPIC_MOVED_SUCCESS'	=> 'Det valgte emne er nu blevet flyttet.',
	'TOPIC_NOT_EXIST'		=> 'Det valgte emne eksisterer ikke.',
	'TOPIC_RESYNC_SUCCESS'	=> 'Det valgte emne er nu blevet synkroniseret.',
	'TOPIC_SPLIT_SUCCESS'	=> 'Det valgte emner er nu blevet delt.',
	'TOPIC_TIME'			=> 'Emnet\'s tid',
	'TOPIC_TYPE_CHANGED'	=> 'Emnet\'s type er ændret.',
	'TOPIC_UNLOCKED_SUCCESS'=> 'Det valgte emne er nu låst op.',
	'TOTAL_WARNINGS'		=> 'Antal advarsler i alt',

	'UNAPPROVED_POSTS_TOTAL'		=> '<strong>%d</strong> indlæg afventer godkendelse.',
	'UNAPPROVED_POSTS_ZERO_TOTAL'	=> 'Ingen indlæg afventer godkendelse.',
	'UNAPPROVED_POST_TOTAL'			=> '1 indlæg afventer godkendelse.',
	'UNLOCK'						=> 'Lås op',
	'UNLOCK_POST'					=> 'Lås op for indlæg',
	'UNLOCK_POST_EXPLAIN'			=> 'Tillad ændringer',
	'UNLOCK_POST_POST'				=> 'Lås op for indlæg',
	'UNLOCK_POST_POST_CONFIRM'		=> 'Er du sikker på at du vil tillade ændringer i dette indlæg?',
	'UNLOCK_POST_POSTS'				=> 'Lås op for de valgte indlæg',
	'UNLOCK_POST_POSTS_CONFIRM'		=> 'Er du sikker på at du vil tillade ændringer i de valgte indlæg?',
	'UNLOCK_TOPIC'					=> 'Lås op for emne',
	'UNLOCK_TOPIC_CONFIRM'			=> 'Er du sikker på at du vil låse op for dette emne?',
	'UNLOCK_TOPICS'					=> 'Lås op for valgte emner',
	'UNLOCK_TOPICS_CONFIRM'			=> 'Er du sikker på at du vil låse op for de valgte emner?',
	'USER_CANNOT_POST'				=> 'Du kan ikke skrive indlæg i dette forum.',
	'USER_CANNOT_REPORT'			=> 'Du kan ikke rapportere indlæg i dette forum.',
	'USER_FEEDBACK_ADDED'			=> 'Brugernotat er nu tilføjet.',
	'USER_WARNING_ADDED'			=> 'Bruger er nu advaret.',

	'VIEW_DETAILS'			=> 'Vis information',
	'VIEW_PM'				=> 'Vis privat besked',
	'VIEW_POST'					=> 'Vis indlæg',

	'WARNED_USERS'			=> 'Brugere med advarsler',
	'WARNED_USERS_EXPLAIN'	=> 'Endnu ikke udløbne advarsler.',
	'WARNING_PM_BODY'		=> 'Dette er en advarsel udstedt af en administrator eller redaktør på denne side.[quote]%s[/quote]',
	'WARNING_PM_SUBJECT'	=> 'Boardadvarsel udstedt',
	'WARNING_POST_DEFAULT'	=> 'Dette er en advarsel vedrørende det indlæg du har skrevet: %s.',
	'WARNINGS_ZERO_TOTAL'	=> 'Ingen advarsler.',

	'YOU_SELECTED_TOPIC'	=> 'Du valgte emne nummer %d: %s.',

	'report_reasons'		=> array(
		'TITLE'	=> array(
			'WAREZ'		=> 'Warez',
			'SPAM'		=> 'Spam',
			'OFF_TOPIC'	=> 'Off topic',
			'OTHER'		=> 'Andet',
		),
		'DESCRIPTION' => array(
			'WAREZ'		=> 'Meddelelsen indeholder links til illegal eller piratsoftware.',
			'SPAM'		=> 'Meddelelsen har kun til formål at reklamere for en hjemmeside eller et produkt.',
			'OFF_TOPIC'	=> 'Meddelelsen er off topic.',
			'OTHER'		=> 'Meddelelsen kan ikke kategoriseres. Anvend feltet "Yderligere information".'
		)
	),
));

?>