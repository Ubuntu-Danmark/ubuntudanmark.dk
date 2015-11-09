<?php
/**
*
* @package phpBB Extension - Default Gravatar
* @copyright (c) 2015 Anders Jenbo
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace ajenbo\defaultgravatar\acp;

class main_info
{
	function module()
	{
		return array(
			'filename'	=> '\ajenbo\defaultgravatar\acp\main_module',
			'title'		=> 'ACP_DEFAULT_GRAVATAR_TITLE',
			'version'	=> '1.0.0',
			'modes'		=> array(
				'settings'		=> array(
					'title' => 'ACP_DEFAULT_GRAVATAR_TITLE',
					'auth' => 'ext_ajenbo/defaultgravatar && acl_a_board',
					'cat' => array('ACP_DEFAULT_GRAVATAR_TITLE')
				),
			),
		);
	}
}
