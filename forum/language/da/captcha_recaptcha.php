<?php
/**
*
* captcha_recaptcha [Danish]
*
* @package language
* @version Id: captcha_recaptcha.php 10830 2010-10-25 20:30:20Z git-gate $
* @version $Id: captcha_recaptcha.php 87 2010-10-29 14:08:41Z jan skovsgaard $
* @source file is copyright (c) 2009 phpBB Group
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
	'RECAPTCHA_LANG'				=> 'da',
	'RECAPTCHA_NOT_AVAILABLE'		=> 'For at tage reCaptcha i brug, skal du tilmelde dig på <a href="http://recaptcha.net">reCaptcha.net</a>.',
	'CAPTCHA_RECAPTCHA'				=> 'reCaptcha',
	'RECAPTCHA_INCORRECT'			=> 'Den angivne bekræftelseskode var ikke korrekt',

	'RECAPTCHA_PUBLIC'				=> 'Offentlig reCaptcha-nøgle',
	'RECAPTCHA_PUBLIC_EXPLAIN'		=> 'Din offentlige reCaptcha-nøgle. Nøgler udleveres fra <a href="http://recaptcha.net">reCaptcha.net</a>.',
	'RECAPTCHA_PRIVATE'				=> 'Privat reCaptcha-nøgle',
	'RECAPTCHA_PRIVATE_EXPLAIN'		=> 'Din private reCaptcha-nøgle. Nøgler udleveres fra <a href="http://recaptcha.net">reCaptcha.net</a>.',

	'RECAPTCHA_EXPLAIN'	=> 'Indtast venligst begge ord i teksfeltet umiddelbart herunder.',
));

?>