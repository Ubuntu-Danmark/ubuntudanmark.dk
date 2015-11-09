<?php
/**
*
* @package phpBB Extension - Default Gravatar
* @copyright (c) 2015 Anders Jenbo
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace ajenbo\defaultgravatar\acp;

class main_module
{
	var $u_action;

	function main($id, $mode)
	{
		global $db, $user, $auth, $template, $cache, $request;
		global $config, $phpbb_root_path, $phpbb_admin_path, $phpEx;

		$user->add_lang('acp/common');
		$user->add_lang_ext('ajenbo/defaultgravatar', 'common');
		$this->tpl_name = 'defaultgravatar_body';
		$this->page_title = $user->lang('ACP_DEFAULT_GRAVATAR_TITLE');
		add_form_key('ajenbo/defaultgravatar');

		if ($request->is_set_post('submit'))
		{
			if (!check_form_key('ajenbo/defaultgravatar'))
			{
				trigger_error('FORM_INVALID');
			}

			$size = (int) $request->variable('default_gravatar_size', 100);
			if (0 > $size || 512 < $size) {
				$size = 100;
			}
			$config->set('default_gravatar_size', $size);

			trigger_error($user->lang('ACP_DEFAULT_GRAVATAR_SAVED') . adm_back_link($this->u_action));
		}

		$template->assign_vars(array(
			'U_ACTION'				=> $this->u_action,
			'DEFAULT_GRAVATAR_SIZE' => $config['default_gravatar_size'],
		));
	}
}
