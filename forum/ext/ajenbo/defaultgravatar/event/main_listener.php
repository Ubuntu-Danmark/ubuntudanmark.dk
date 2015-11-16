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
			'core.get_avatar_after' => 'getGravatar',
		);
	}

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

		$this->size = (int) $config['default_gravatar_size'] ?: 80;
		$this->default_avatar = $root_path . 'styles/' . $template_path . '/theme/images/no_avatar.gif';
	}

	/**
	* Overwrites the avatar settings of the sender
	*
	* @param mixed $event
	*/
	public function getGravatar($param)
	{
		if (empty($param['html']) && !empty($param['row']['email'])) {
			$email = $param['row']['email'];

			$url = $this->default_avatar;
			if (trim($email)) {
				//TODO configurable default image
				$url = '//secure.gravatar.com/avatar/'
					. md5(strtolower(trim($email)))
					. '?d=mm&s=' . $this->size;
			}

			$html = '<img src="' . htmlspecialchars($url)
				. '" width="' . $this->size
				. '" height="' . $this->size . '" />';

			$param['html'] = $html;
		}
	}
}
