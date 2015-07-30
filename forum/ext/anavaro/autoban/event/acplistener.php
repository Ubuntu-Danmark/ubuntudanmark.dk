<?php

/**
*
* Auto Ban extension - ACP Listener
*
* @copyright (c) 2014 Lucifer <http://www.anavaro.com>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace anavaro\autoban\event;

/**
* Event listener
*/
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class acplistener implements EventSubscriberInterface
{
	static public function getSubscribedEvents()
	{
		return array(
			'core.acp_board_config_edit_add'	=>	'add_options',
		);
	}

	/**
	* Constructor
	* NOTE: The parameters of this method must match in order and type with
	* the dependencies defined in the services.yml file for this service.
	*
	* @param \phpbb\controller\helper		$helper				Controller helper object
	* @param \phpbb\user		$user		User object
	*/
	public function __construct(\phpbb\controller\helper $helper, \phpbb\user $user)
	{
		$this->helper = $helper;
		$this->user = $user;
	}

	public function add_options($event)
	{
		//$this->var_display($event['display_vars']);
		if ($event['mode'] == 'settings')
		{
			// Store display_vars event in a local variable
			$display_vars = $event['display_vars'];

			// Define my new config vars
			$my_config_vars = array(
				'autoban_active' => array('lang' => 'AUTOBAN_ACTIVE', 'validate' => 'bool', 'type' => 'radio:yes_no', 'explain' => true),
				'autoban_count' => array('lang' => 'AUTOBAN_COUNT', 'validate' => 'int:0:99', 'type' => 'number:0:99', 'explain' => true),
				'autoban_duration' => array('lang' => 'AUTOBAN_DURATION', 'validate' => 'int:0:99', 'type' => 'number:0:99', 'explain' => true, 'append' => $this->user->lang['DAYS']),
				'autoban_reason' => array('lang' => 'AUTOBAN_REASON', 'validate' => 'string', 'type' => 'text:40:255', 'explain' => true),
			);

			$display_vars['vars'] = phpbb_insert_config_array($display_vars['vars'], $my_config_vars, array('before' =>'warnings_expire_days'));
			// Update the display_vars  event with the new array
			$event['display_vars'] = array('title' => $display_vars['title'], 'vars' => $display_vars['vars']);
		}

	}
}
