<?php
/**
*
* @package phpBB Extension - Default Gravatar
* @copyright (c) 2015 Anders Jenbo
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace ajenbo\defaultgravatar\migrations;

class release_1_0_0 extends \phpbb\db\migration\migration
{
	public function effectively_installed()
	{
		return isset($this->config['default_gravatar_size']);
	}

	static public function depends_on()
	{
		return array('\phpbb\db\migration\data\v310\alpha2');
	}

	public function update_data()
	{
		return array(
			array('config.add', array('default_gravatar_size', 100)),

			array('module.add', array(
				'acp',
				'ACP_CAT_DOT_MODS',
				'ACP_DEFAULT_GRAVATAR_TITLE'
			)),
			array('module.add', array(
				'acp',
				'ACP_DEFAULT_GRAVATAR_TITLE',
				array(
					'module_basename'	=> '\ajenbo\defaultgravatar\acp\main_module',
					'modes'				=> array('settings'),
				),
			)),
		);
	}
}
