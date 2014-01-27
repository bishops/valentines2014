<?php

use \Mockery as m;
class HomeControllerIndexTest extends TestCase {

	public function setUp()
	{
		parent::setUp();
	}


	public function testIndexPagenoLogin()
	{
		Auth::shouldReceive('check')->andReturn(false);//Pretends we're not logged in

		$crawler = $this->client->request('GET', '/');
		$this->assertTrue($this->client->getResponse()->isOk());
	}

	public function testIndexShowQuestionComplete()
	{
		Auth::shouldReceive('check')->andReturn(true); //Pretends we're logged in
		
		$user = m::mock('User')
				->shouldReceive('getAttribute')
				->with('completed_questions')
				->andReturn(1)
				->getMock();

		Auth::shouldReceive('user')->andReturn($user);

		$crawler = $this->client->request('GET', '/');
		$this->assertTrue($this->client->getResponse()->isOk());
	}

}
