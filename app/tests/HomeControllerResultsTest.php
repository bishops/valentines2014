<?php

use \Mockery as m;

class HomeControllerResultsTest extends TestCase
{
	public function setUp()
	{
		parent::setUp();

		$stage = m::mock('CustomStageInterface')
			->shouldReceive('getStage')
			->with('results_complete')
			->andReturn(true)
			->getMock();
			
		App::instance('CustomStageInterface', $stage);
	}

	public function testResultsPage()
	{
		Auth::shouldReceive('check')->andReturn(true); //Pretends we're logged in

		$crawler = $this->client->request('GET', '/results');

		$this->assertTrue($this->client->getResponse()->isOk());
	}
}
