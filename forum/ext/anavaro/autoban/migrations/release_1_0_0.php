<?php
/**
*
* @package migration
* @copyright (c) 2012 phpBB Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License v2
*
*/

namespace anavaro\autoban\migrations;

class release_1_0_0 extends \phpbb\db\migration\migration
{
	public function update_data()
	{
		return array(
			array('config.add', array('autoban_active', false)),
			array('config.add', array('autoban_count', '2')),
			array('config.add', array('autoban_duration', '30')),
			array('config.add', array('autoban_reason', 'Warning limit exceeded')),
		);
	}
}
