<?php


class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/
	public function __construct(CustomStageInterface $stage)
	{
		$this->stage = $stage;
	}
	public function showWelcome()
	{
		return View::make('hello');
	}
	public function showResults()
	{
		if( $this->stage->getStage('results_complete') == true )
		{
			return View::make('results');
		}
		else 
		{
			return View::make('notresults', array('answer_reveal'=>$this->stage->getStage('answer_reveal') ) );
		}
	}
	public function showQuestions()
	{
		$user = Auth::user();

		if($user->completed_questions == 1)
		{
			return View::make('thanks');
		}else
		{
			return View::make('questions', array('answer_deadline'=>$this->stage->getStage('answer_deadline') ) );
		}
	}
}
