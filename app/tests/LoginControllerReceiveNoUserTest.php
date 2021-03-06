<?php

use \Mockery as m;

class LoginControllerReceiveNoUserTest extends TestCase
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

			
		$count  = 0;
		App::bind('User',function($app)
		{
			global $count;
			if( $count == 0)
			{
				return m::mock('User')
			->shouldReceive('findByEmail')
			->once()
			->andReturn(false)
			// ->getMock();
			// $count ++;
			// }else
			// {
			// 	return m::mock('User')
				->shouldReceive('setAttribute')
			->with('first_name','Brian')
			->shouldReceive('setAttribute')
			->with('last_name','Anglin')
			->shouldReceive('setAttribute')
			->with('email','test@test.com')
			->shouldReceive('save')
			->getMock();
			}
		});
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
