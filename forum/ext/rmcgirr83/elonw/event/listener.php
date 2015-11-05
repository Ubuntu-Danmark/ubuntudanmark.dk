<?php
/**
*
* @package External Links Open in New Window
* @copyright (c) 2014 RMcGirr83
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace rmcgirr83\elonw\event;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
* Event listener
*/
class listener implements EventSubscriberInterface
{
	/** @var \phpbb\config\config */
	protected $config;

	/** @var \phpbb\request\request */
	protected $request;

	/** @var \phpbb\template\template */
	protected $template;

	/** @var \phpbb\user */
	protected $user;

	/**
	* Constructor
	*
	* @param \phpbb\config\config $config
	* @param \phpbb\request\request $request
	* @param \phpbb\template\template $template
	* @param \phpbb\user $user
	* @return \rmcgirr83\elonw\event\ucp_listener
	* @access public
	*/
	public function __construct(\phpbb\config\config $config, \phpbb\request\request $request, \phpbb\template\template $template, \phpbb\user $user)
	{
		$this->config = $config;
		$this->request = $request;
		$this->template = $template;
		$this->user = $user;
	}

	static public function getSubscribedEvents()
	{
		return array(
			'core.page_header' => 'main',
			'core.ucp_prefs_personal_data'			=> 'ucp_prefs_get_data',
			'core.ucp_prefs_personal_update_data'	=> 'ucp_prefs_set_data',
		);
	}

	public function main($event)
	{
		// add lang file
		$this->user->add_lang_ext('rmcgirr83/elonw', 'common');
		$this->template->assign_vars(array(
			'S_ELONW'	=>	!empty($this->user->data['user_elonw']) ? true : false,
		));
	}

	/**
	* Get user's option and display it in UCP Prefs View page
	*
	* @param object $event The event object
	* @return null
	* @access public
	*/
	public function ucp_prefs_get_data($event)
	{
		// Request the user option vars and add them to the data array
		$event['data'] = array_merge($event['data'], array(
			'elonw'	=> $this->request->variable('elonw', (int) $this->user->data['user_elonw']),
		));

		// Output the data vars to the template (except on form submit)
		if (!$event['submit'])
		{
			$this->user->add_lang_ext('rmcgirr83/elonw', 'elonw_ucp');
			$this->template->assign_vars(array(
				'S_UCP_ELONW'	=> $event['data']['elonw'],
			));
		}
	}

	/**
	* Add user's elonw option state into the sql_array
	*
	* @param object $event The event object
	* @return null
	* @access public
	*/
	public function ucp_prefs_set_data($event)
	{
		$event['sql_ary'] = array_merge($event['sql_ary'], array(
			'user_elonw' => $event['data']['elonw'],
		));
	}
}
