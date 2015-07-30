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
class autoban_functioning extends autoban_base
{
	public function test_main()
	{
		//add users so we can test medals
		$this->create_user('testuser1');
		$this->add_user_group('NEWLY_REGISTERED', array('testuser1'));

		$this->login();
		$this->add_lang('mcp');
		
		$crawler = self::request('GET', 'mcp.php?i=warn&mode=warn_user&u=' . $this->get_user_id('testuser1') . '&sid=' . $this->sid);
		
		$form = $crawler->selectButton($this->lang('SUBMIT'))->form();
		$form['warning'] = 'Test';
		
		$crawler = self::submit($form);
		
		$this->assertContainsLang('USER_WARNING_ADDED', $crawler->text());
		
		$crawler = self::request('GET', 'mcp.php?i=warn&mode=warn_user&u=' . $this->get_user_id('testuser1') . '&sid=' . $this->sid);
		
		$form = $crawler->selectButton($this->lang('SUBMIT'))->form();
		$form['warning'] = 'Test';
		
		$crawler = self::submit($form);
		
		$this->assertContainsLang('USER_WARNING_ADDED', $crawler->text());
		
		$this->logout();
		
		$this->assertEquals(1, $this->is_banned($this->get_user_id('testuser1')));
	}
	public function test_post_warn()
	{
		$this->create_user('testuser2');
		$this->add_user_group('NEWLY_REGISTERED', array('testuser1'));
		
		$this->login('testuser2');
		
		$post = $this->create_topic(2, 'Test Topic 1', 'This is a test topic posted by the testing framework.');
		$crawler = self::request('GET', "viewtopic.php?t={$post['topic_id']}&sid={$this->sid}");
		
		$post2 = $this->create_post(2, $post['topic_id'], 'Re: Test Topic 1', 'This is a test [b]post[/b] posted by the testing framework.');
		$crawler = self::request('GET', "viewtopic.php?t={$post2['topic_id']}&sid={$this->sid}");
		
		$post3 = $this->create_post(3, $post['topic_id'], 'Re: Test Topic 1', 'This is a test [b]post[/b] posted by the testing framework.');
		$crawler = self::request('GET', "viewtopic.php?t={$post3['topic_id']}&sid={$this->sid}");
		
		
		$this->logout();
		
		$this->login();
		
		$crawler = self::request('GET', 'mcp.php?i=warn&mode=warn_post&p=' . $post2['post_id'] . '&sid=' . $this->sid);
		$form = $crawler->selectButton($this->lang('SUBMIT'))->form();
		$crawler = self::submit($form);
		
		$crawler = self::request('GET', 'mcp.php?i=warn&mode=warn_post&p=' . $post3['post_id'] . '&sid=' . $this->sid);
		$form = $crawler->selectButton($this->lang('SUBMIT'))->form();
		$crawler = self::submit($form);
		
		$this->logout();
		
		$this->assertEquals(1, $this->is_banned($this->get_user_id('testuser2')));
	}
}