<?php
/**
*
* @package Delete my registration
* @version $Id: permission.php 7 2015-09-03 00:33:59Z killbill $
* @author KillBill - killbill@jatek-vilag.com
* @copyright 2010-2014 (c) http://jatek-vilag.com/ - info@jatek-vilag.com
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace jv\deletemyregistration\migrations\v1;

class permission extends \phpbb\db\migration\migration
{
	static public function depends_on()
	{
		return array('\jv\deletemyregistration\migrations\v1\module');
	}

	public function update_data()
	{
		$sql = 'SELECT role_name
				FROM ' . ACL_ROLES_TABLE;
		$result = $this->sql_query($sql);
		$roles = array();
		while ($row = $this->db->sql_fetchrow($result))
		{
			$roles[] = $row['role_name'];
		}
		$this->db->sql_freeresult($result);

		return array(
			// Add permission
			array('permission.add', array('u_my_acc_post_delete', true)),
			// Set permissions
			array('if', array(
				(in_array('ROLE_USER_STANDARD', $roles)),
				array('permission.permission_set', array('ROLE_USER_STANDARD', array('u_my_acc_post_delete')))
			)),
			array('if', array(
				(in_array('ROLE_USER_FULL', $roles)),
				array('permission.permission_set', array('ROLE_USER_FULL', array('u_my_acc_post_delete')))
			)),
			array('if', array(
				(in_array('ROLE_USER_NOPM', $roles)),
				array('permission.permission_set', array('ROLE_USER_NOPM', array('u_my_acc_post_delete')))
			)),
			array('if', array(
				(in_array('ROLE_USER_NOAVATAR', $roles)),
				array('permission.permission_set', array('ROLE_USER_NOAVATAR', array('u_my_acc_post_delete')))
			)),
			array('if', array(
				(in_array('ROLE_USER_NEW_MEMBER', $roles)),
				array('permission.permission_set', array('ROLE_USER_NEW_MEMBER', array('u_my_acc_post_delete')))
			)),
			array('if', array(
				(in_array('ROLE_USER_LIMITED', $roles)),
				array('permission.permission_set', array('ROLE_USER_LIMITED', array('u_my_acc_post_delete')))
			))
		);
	}
}