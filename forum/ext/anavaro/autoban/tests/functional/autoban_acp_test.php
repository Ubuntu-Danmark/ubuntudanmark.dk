<?php
/**
*
* Autoban test
*
* @copyright (c) 2014 Stanislav Atanasov
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace anavaro\autoban\tests\functional;

/**
* @group functional
*/
class autoban_acp_test extends autoban_base
{
	public function acp_pages_data()
	{
		return array(
			array('acp_board&mode=settings'), // Load the advanced forum settings ACP page
		);
	}
	/**
	* @dataProvider acp_pages_data
	*/
	public function test_acp_pages($mode)
	{
		$this->login();
		$this->admin_login();

		$this->add_lang_ext('anavaro/autoban', 'info_acp_autoban');

		$crawler = self::request('GET', 'adm/index.php?i=' . $mode . '&sid=' . $this->sid);
		$this->assertContainsLang('AUTOBAN_ACTIVE', $crawler->text());
		$this->assertContainsLang('AUTOBAN_COUNT', $crawler->text());
		$this->assertContainsLang('AUTOBAN_DURATION', $crawler->text());
		$this->assertContainsLang('AUTOBAN_REASON', $crawler->text());
		
		$this->logout();
	}
}