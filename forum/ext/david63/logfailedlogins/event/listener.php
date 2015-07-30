<?php
/**
*
* @package Log Failed Logins
* @copyright (c) 2015 david63
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace david63\logfailedlogins\event;

/**
* @ignore
*/
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
* Event listener
*/
class listener implements EventSubscriberInterface
{
	/** @var \phpbb\config\config */
	protected $config;

	/** @var \phpbb\log\log */
	protected $log;

	/** @var \phpbb\user */
	protected $user;

	/** @var \phpbb\auth\auth */
	protected $auth;

	/** @var \phpbb\db\driver\driver_interface */
	protected $db;

	/**
	* Constructor for listener
	*
	* @param \phpbb\config\config				$config		phpBB config
	* @param \phpbb\log\log						$log		phpBB log
	* @param \phpbb\user            			$user		User object
	* @param \phpbb\auth\auth 					$auth
	* @param \phpbb\db\driver\driver_interface	$db
	*
	* @access public
	*/
	public function __construct(\phpbb\config\config $config, \phpbb\log\log $log, \phpbb\user $user, \phpbb\auth\auth $auth, \phpbb\db\driver\driver_interface $db)
	{
		$this->config	= $config;
		$this->log		= $log;
		$this->user		= $user;
		$this->auth		= $auth;
		$this->db		= $db;
	}

	/**
	* Assign functions defined in this class to event listeners in the core
	*
	* @return array
	* @static
	* @access public
	*/
	static public function getSubscribedEvents()
	{
		return array(
			'core.login_box_failed' => 'failed_login',
		);
	}

	/**
	* Log failed login attempts
	*
	* @param object $event The event object
	* @return null
	* @access public
	*/
	public function failed_login($event)
	{
		$result		= $event['result'];
		$username	= $event['username'];

		$additional_data = array();
		$additional_data['reportee_id']	= $result['user_row']['user_id'];

		// We want to log Admin fails to the Admin log and User fails to the user log
		$log_type = $this->get_userid_from_username($username);

		switch ($result['status'])
		{
			case LOGIN_ERROR_USERNAME:
				$error_msg			= 'ERROR_LOGIN_USERNAME';
				$log_type			= 'user'; // This can only be user as we have no data to test
				$additional_data[]	= $username;
			break;

			case LOGIN_ERROR_PASSWORD:
				$error_msg	= 'ERROR_LOGIN_PASSWORD';
			break;

			case LOGIN_ERROR_ATTEMPTS:
				$error_msg	= 'ERROR_LOGIN_ATTEMPTS';
			break;

			case LOGIN_ERROR_PASSWORD_CONVERT:
				$error_msg	= 'ERROR_LOGIN_PASSWORD_CONVERT';
			break;

			default: // Let's have a catchall for any other fails
				$error_msg			= 'ERROR_LOGIN_UNKNOWN';
				$log_type			= 'user';
				$additional_data[]	= $result['status'];
				$additional_data[]	= $username;
			break;
		}

		$this->log->add($log_type, $result['user_row']['user_id'], $this->user->ip, $error_msg, time(), $additional_data);
	}

	protected function get_userid_from_username($username)
	{
		$sql = 'SELECT user_id
			FROM ' . USERS_TABLE . '
				WHERE ' . "username_clean = '" . $this->db->sql_escape(utf8_clean_string($username)) . "'";

		$result  = $this->db->sql_query($sql);
		$user_id = (int) $this->db->sql_fetchfield('user_id');
		$this->db->sql_freeresult($result);

		return ($this->auth->acl_raw_data($user_id, 'a_')) ? 'admin' : 'user';
	}
}
