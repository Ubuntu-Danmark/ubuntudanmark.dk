<?php
/**
*
* Autoban Control
*
* @copyright (c) 2014 Stanislav Atanasov
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace anavaro\autoban\tests\functional;

/**
* @group functional
*/
class autoban_base extends \phpbb_functional_test_case
{
	static protected function setup_extensions()
	{
		return array('anavaro/autoban');
	}

	public function setUp()
	{
		parent::setUp();
	}

	/**
	* Allow birthday (just to be sure) 
	*/
	public function allow_autoban($var = 1)
	{
		$this->get_db();

		$sql = "UPDATE phpbb_config
			SET config_value = $var
			WHERE config_name = 'autoban_active'";

		$this->db->sql_query($sql);

		$this->purge_cache();
	}
	
	public function get_user_id($username)
	{
		$sql = 'SELECT user_id, username
				FROM ' . USERS_TABLE . '
				WHERE username_clean = \''.$this->db->sql_escape(utf8_clean_string($username)).'\'';
		$result = $this->db->sql_query($sql);
		$row = $this->db->sql_fetchrow($result);
		return $row['user_id'];
	}
	
	public function is_banned($user_id)
	{
		$sql = 'SELECT COUNT(ban_id) as count
				FROM ' . BANLIST_TABLE .'
				WHERE ban_userid = ' . $user_id;
		$result = $this->db->sql_query($sql);
		$row = $this->db->sql_fetchrow($result);
		
		return $row['count'];
	}
}