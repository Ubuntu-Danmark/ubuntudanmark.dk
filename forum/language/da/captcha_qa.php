<?php
/**
*
* captcha_qa [Danish]
*
* @package language
* @version Id: captcha_qa.php 10848 2010-11-07 14:00:05Z git-gate $
* @version $Id: captcha_qa.php 95 2010-11-08 08:28:14Z jan skovsgaard $
* @copyright (c) 2009 phpBB Group
* @modified and translated by Olympus DK Team
* @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
*
* This file is part of the Danish language package for phpBB 3.x.x.
* Copyright (c) 2009 Olympus DK Team
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
	'CAPTCHA_QA'				=> 'Q&amp;A',
	'CONFIRM_QUESTION_EXPLAIN'	=> 'For at hindre automatiserede tilmeldinger og indlæg, bedes du besvare spørgsmålet.',
	'CONFIRM_QUESTION_WRONG'	=> 'Din besvarelse er ikke korrekt.',

	'QUESTION_ANSWERS'			=> 'Svar',
	'ANSWERS_EXPLAIN'			=> 'Den eller de korrekte besvarelser. Skriv et svar pr. linie.',
	'CONFIRM_QUESTION'			=> 'Spørgsmål',

	'ANSWER'					=> 'Svar',
	'EDIT_QUESTION'				=> 'Rediger spørgsmål',
	'QUESTIONS'					=> 'Spørgsmål',
	'QUESTIONS_EXPLAIN'			=> 'I alle de tilfælde hvor Q&amp;A benyttes, stilles brugere et af nedennævnte spørgsmål. For at kunne anvende modulet skal mindst et spørgsmål formuleres på boardets standardsprog. Spørgsmål bør målrettes boardets besøgende, og svar ikke umiddelbart kunne findes med en søgning på Google™. Regelmæssig ændring af spørgsmål vil effektivisere bekæmpelsen af spamtilmeldinger. Forudsætter det rette svar korrekt tegnsætning, stavemåde eller brug af store og små bogstaver, bør absolut kontrol anvendes.',
	'QUESTION_DELETED'			=> 'Spørgsmål slettes',
	'QUESTION_LANG'			=> 'Sprog',
	'QUESTION_LANG_EXPLAIN'		=> 'Det sprog spørgsmål og svar formuleres på.',
	'QUESTION_STRICT'			=> 'Absolut kontrol',
	'QUESTION_STRICT_EXPLAIN'	=> 'Kontrol af mellemrum, og korrekt angivelse af store og små bogstaver udføres.',

	'QUESTION_TEXT'				=> 'Spørgsmål',
	'QUESTION_TEXT_EXPLAIN'		=> 'Spørgsmålet der stilles brugere.',

	'QA_ERROR_MSG'				=> 'Udfyld venligst alle felter og besvar mindst et af spørgsmålene.',
	'QA_LAST_QUESTION'			=> 'Du kan ikke slette alle spørgsmål når modulet er aktivt.',

));

?>