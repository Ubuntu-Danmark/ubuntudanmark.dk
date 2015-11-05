<?php
/**
*
* @package Delete my registration
* @version $Id: delete_my_registration_info.php 7 2015-09-03 00:33:59Z killbill $
* @author KillBill - killbill@jatek-vilag.com
* @copyright 2010-2014 (c) http://jatek-vilag.com/ - info@jatek-vilag.com
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace jv\deletemyregistration\ucp;

class delete_my_registration_info
{
	function module()
	{
		return array(
			'filename'	=> '\jv\deletemyregistration\ucp\delete_my_registration_module',
			'title'		=> 'UCP_PROFILE',
			'version'	=> '1.0.0',
			'modes'		=> array(
				'my_acc_delete' => array('title' => 'UCP_PROFILE_MY_ACC_DELETE', 'auth' => 'ext_jv/deletemyregistration', 'cat' => array('UCP_PROFILE'))
			)
		);
	}
}