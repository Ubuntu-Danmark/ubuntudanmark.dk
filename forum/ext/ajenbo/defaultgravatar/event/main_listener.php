<?php
/**
*
* @package phpBB Extension - Default Gravatar
* @copyright (c) 2015 Anders Jenbo
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace ajenbo\defaultgravatar\event;

/**
* @ignore
*/
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
* Event listener
*/
class main_listener implements EventSubscriberInterface
{
	static public function getSubscribedEvents()
	{
		return array(
			'core.user_setup'					=> 'load_language_on_setup',
			'core.page_header'					=> 'navbar_replace_avatar',
			'core.viewtopic_post_rowset_data'	=> 'viewtopic_replace_avatar',
			'core.ucp_pm_view_messsage'			=> 'ucp_message_replace_avatar',
		);
	}

	private $user = null;
	private $size = 100;
	private $default_avatar = '';

	/**
	* Constructor
	*
	* @param \phpbb\controller\helper	$helper		Controller helper object
	* @param \phpbb\template			$template	Template object
	*/
	public function __construct(\phpbb\config\config $config,\phpbb\template\template $template, \phpbb\user $user, $root_path)
	{
		$template_path = $template->get_user_style();
		$template_path = $template_path[0];

		$this->user = $user;
		$this->size = (int) $config['default_gravatar_size'] ?: 80;
		$this->default_avatar = $root_path . 'styles/' . $template_path . '/theme/images/no_avatar.gif';
	}

	public function load_language_on_setup($event)
	{
		$lang_set_ext = $event['lang_set_ext'];
		$lang_set_ext[] = array(
			'ext_name' => 'ajenbo/defaultgravatar',
			'lang_set' => 'common',
		);
		$event['lang_set_ext'] = $lang_set_ext;
	}

	/**
	* Overwrites the avatar settings in the navbar
	*
	* @param mixed $event
	*/
	public function navbar_replace_avatar($event_OBJ)
	{
		if (!$this->user->data['user_avatar'])
		{
			$this->user->data['user_avatar'] = $this->get_gravatar_url($this->user->data['user_email']);
			$this->user->data['user_avatar_type'] = 'avatar.driver.remote';
			$this->user->data['user_avatar_width'] = $this->size;
			$this->user->data['user_avatar_height'] = $this->size;
    	}
	}

	/**
	* Overwrites the avatar settings of the poster
	*
	* @param mixed $event
	*/
	public function viewtopic_replace_avatar($event_OBJ)
	{
		if (!$event_OBJ['row']['user_avatar'])
		{
			$row = $event_OBJ['row'];
			$row['user_avatar'] = $this->get_gravatar_url($row['user_email']);
			$row['user_avatar_type'] = 'avatar.driver.remote';
			$row['user_avatar_width'] = $this->size;
			$row['user_avatar_height'] = $this->size;
			$event_OBJ['row'] = $row;
		}
	}

	/**
	* Overwrites the avatar settings of the sender
	*
	* @param mixed $event
	*/
	public function ucp_message_replace_avatar($event_OBJ)
	{
		if (!$event_OBJ['msg_data']['AUTHOR_AVATAR'])
		{
			$msg_data = $event_OBJ['msg_data'];
			$msg_data['AUTHOR_AVATAR'] = '<img src="'
				. htmlspecialchars($this->get_gravatar_url($event_OBJ['message_row']['user_email']))
				. '" width="' . $this->size
				. '" height="' . $this->size . '" />';
			$event_OBJ['msg_data'] = $msg_data;
		}
	}

	/**
	* Build gravatar URL for output on page
	*
	* @param string  $email User email
	* @return string Gravatar URL
	*/
	protected function get_gravatar_url($email)
	{
		if (!trim($email)) {
			return $this->default_avatar;
		}

		//TODO configurable default image
		return '//secure.gravatar.com/avatar/'
			. md5(strtolower(trim($email)))
			. '?d=mm&s=' . $this->size;
	}
}
