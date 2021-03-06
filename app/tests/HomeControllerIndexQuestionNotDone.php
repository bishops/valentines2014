<?php

use \Mockery as m;


class HomeControllerIndexQuestionNotDone extends TestCase
{
	public function setUp()
	{
		parent::setUp()

		$stage = m::mock('CustomStageInterface')
			->shouldReceive('getStage')
			->with('answer_deadline')
			->andReturn('2014-02-11 23:59:00')
			->getMock();

		App::instance('CustomStageInterface',$stage);

		


	}
	public function testIndexShowQuestionNotComplete()
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
