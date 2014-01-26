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
	// public function __construct(User $user)
	// {
	// 	$this->user = $user;
	// }

	public function showWelcome()
	{
		return View::make('hello');
	}
	public function showResults()
	{
		return View::make('results');
	}
	public function showQuestions()
	{
		// return $this->user->find(0);
		return View::make('questions');
	}
}
