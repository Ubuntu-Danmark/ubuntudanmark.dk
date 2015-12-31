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
* Event listener
*/
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class acplistener implements EventSubscriberInterface
{
	static public function getSubscribedEvents()
	{
		return array(
			'core.user_setup'	=> 'load_language_on_setup',
		);
	}

	private $user = null;

	/**
	* Constructor
	*/
	public function __construct(\phpbb\user $user)
	{
		$this->user = $user;
	}

	public function load_language_on_setup($event)
	{
		$this->user->add_lang_ext('ajenbo/defaultgravatar', 'common');
	}
}
