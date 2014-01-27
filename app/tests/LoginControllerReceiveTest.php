<?php

use \Mockery as m;

class LoginControllerReceiveTest extends TestCase
{
	public function setUp()
	{
		parent::setUp();

		$sso = m::mock('SSOInterface')
			->shouldReceive('validate_token')
			->once()
			->andReturn(array('email'=>'test@test.com','firstname'=>'Brian','lastname'=>'Anglin'))
			->getMock();

		App::instance('SSOInterface',$sso);

		$user2 = m::mock('User');
				

		$user = m::mock('User')
			->shouldReceive('findByEmail')
			->once()
			->andReturn($user2)
			->getMock();

		App::instance('User',$user);
	}
	public function testNotLoggedIn()
	{
		Redirect::shouldReceive('to')->with('/')->andReturn('');
		Auth::shouldReceive('guest')->andReturn(true);

		Auth::shouldReceive('login')->andReturn(true);

		$crawler = $this->client->request('GET', '/authComplete');

		$this->assertTrue($this->client->getResponse()->isOk());
	}
}
