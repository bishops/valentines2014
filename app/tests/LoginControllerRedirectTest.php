<?php

use \Mockery as m;

class LoginControllerRedirectTest extends TestCase
{
	public function setUp()
	{
		parent::setUp();

		$sso = m::mock('SSOInterface')
			->shouldReceive('get_url')
			->once()
			->andReturn('/')
			->getMock();

		App::instance('SSOInterface',$sso);
	}
	public function testNotLoggedIn()
	{
		Redirect::shouldReceive('to')->with('/')->andReturn('');
		Auth::shouldReceive('guest')->andReturn(true);

		$crawler = $this->client->request('GET', '/auth');

		$this->assertTrue($this->client->getResponse()->isOk());
	}
}
