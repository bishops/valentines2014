<?php

use \Mockery as m;

class HomeControllerNotResultsTest extends TestCase
{
	public function setUp()
	{
		parent::setUp();

		$stage = m::mock('CustomStageInterface')
			->shouldReceive('getStage')
			->with('results_complete')
			->andReturn(false)
			->shouldReceive('getStage')
			->shouldReceive('answer_reveal')
			->andReturn('2014-02-14 7:30:00')
			->getMock();
			
		App::instance('CustomStageInterface', $stage);
	}

	public function testNotResults()
	{
		Auth::shouldReceive('check')->andReturn(true);//Pretends we're logged in

		$crawler = $this->client->request('GET', '/results');
		$this->assertTrue($this->client->getResponse()->isOk());

	}
}
