<?php
App::bind('CustomStageInterface','FileCustomStage');
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/



Route::get('/', function()
{
	if( ! Auth::check() )
	{
		return View::make('landing');
	}
	else
	{
		return App::make('HomeController')->showQuestions();
	}
});
Route::group(array('before'=>'auth'), function()
{
	Route::get('results','HomeController@showResults');

});

Route::group(array('before'=>'local','prefix'=>'m'),function(){//Check if we are on the local enviornment
	Route::get('notresults',function(){ return View::make('notresults', array('answer_reveal'=>'2014-02-14 7:30:00'));});
	Route::get('results',function(){ return View::make('results');});
});


