<?php

use \Mockery as m;
class QuestionControllerIndexTest extends TestCase {

	public function setUp()
	{
		parent::setUp();
		App::bind('Question',function($app)
		{
			$mquestion = new Question();
			$mquestion->prompt = "How are you?";
			$mquestion->answera = "fine";
			$mquestion->answerb = "good";
			$mquestion->answerc = "better";
			$mquestion->answerd = "terrible";

			$questions = m::mock('Question')
				->shouldReceive('all')
				->once()
				->andReturn($mquestion)
				->getMock();

			return $questions;
		});
	}

	
	public function testIndexShowQuestionNotComplete()
	{
		Auth::shouldReceive('check')->andReturn(true); //Pretends we're logged in
		
		$user = m::mock('User')
				->shouldReceive('getAttribute')
				->with('completed_questions')
				->andReturn(0)//Not Complete
				->getMock();

		Auth::shouldReceive('user')->andReturn($user);

		$crawler = $this->client->request('GET', '/');
		$this->assertTrue($this->client->getResponse()->isOk());
	}

}
