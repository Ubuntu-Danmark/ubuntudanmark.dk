<?php
/**
*
* @package acp
* @version $Id: log_failed_login_check_version.php 48 2008-06-13 20:00:00Z xceler8shun $
* @copyright (c) 2005 phpBB Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

/**
* @package Log Failed Login
*/

if (!defined('IN_PHPBB'))
{
	exit;
}

class log_failed_login_check_version
{
	function version()
	{
		return array(
			'author'	=> 'xceler8shun',
			'title'		=> 'Log Failed Login',
			'tag'		=> 'log_failed_login',
			'version'	=> '1.0.1',
			'file'		=> array('nouveauwebdesign.com.au', 'phpbbmods', 'log_failed_login.xml'),
		);
	}
}

?>