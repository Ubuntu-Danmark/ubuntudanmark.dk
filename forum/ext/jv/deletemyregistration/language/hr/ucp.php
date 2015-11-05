<?php
/**
*
* @package Delete my registration
* @version $Id: ucp.php 7 2015-09-03 00:33:59Z killbill $
* @author KillBill - killbill@jatek-vilag.com
* @copyright 2010-2014 (c) http://jatek-vilag.com/ - info@jatek-vilag.com
* Croatian translation by Ančica Sečan (http://ancica.sunceko.net)
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
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
// Some characters you may want to copy&paste: ‚ ‘ ’ « » „ “ ” …

$lang = array_merge($lang, array(
	'MY_ACC_DELETE_CONFIRM'			=> 'Izbriši moj korisnički račun',
	'MY_ACC_DELETE_CONFIRM_ERROR'	=> 'Izbrisivanje korisničkog računa nije potvrđeno.',
	'MY_ACC_DELETE_EXPLAIN'			=> 'Izbriši moj korisnički račun<br /><em>Imaj na umu da nema povratne [undo] mogućnosti što će reći da je korisnički račun, zajedno sa svim podatcima, izbrisan bespovratno nakon što ga (jednom) izbrišeš.</em>',
	'MY_ACC_DELETE_FOUNDER_ERROR'	=> 'Osnivači/ce foruma ne mogu izbrisati svoje korisničke račune.',
	'MY_ACC_DELETE_SUCCESS'			=> 'Korisnički račun je izbrisan.',
	'MY_ACC_POST_DELETE'			=> 'Izbriši postove',
	'MY_ACC_POST_DELETE_EXPLAIN'	=> 'Svi tvoji postovi bit će izbrisani prilikom izbrisivanja tvog korisničkog računa.',
));