<?php

use \Mockery as m;

class LoginControllerLogoutTest extends TestCase
{
	public function setUp()
	{
		parent::setUp();

	}
	public function testLoginControllerLogout()
	{
		Auth::shouldReceive('logout')->andReturn(true); 
		
		Redirect::shouldReceive('to')->with('/')->andReturn(true);

		$crawler = $this->client->request('GET', '/logout');

		$this->assertTrue($this->client->getResponse()->isOk());
	}
}
