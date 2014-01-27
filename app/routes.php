<?php

App::bind('CustomStageInterface','FileCustomStage');
// App::bind('SSOInterface','WH_SSO');
App::bind('SSOInterface', function($app)
{
	$sso_config = array(
		"return_url" => url('/')."/authComplete", // URL that Podium should send the user to
		"sso_url" => "https://bishops.onwhipplehill.com/",	//Podium Url
		"shared_secret"=>"newpassword", //Key from Web Service API - SSO Settings Page
		"timeout" => 60, // How long is token good for
	);
    return new WH_SSO($sso_config);
});

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
Route::group(array('before'=>'guest'),function()
{
	Route::get('/auth','LoginController@redirectLogin');
	Route::get('/authComplete','LoginController@recieveLogin');
});


Route::get('/', function()
{
	if( ! Auth::check() )
	{
		return View::make('landing');
	}
	else
	{
		return App::make('QuestionsController')->showQuestions();
	}
});
Route::group(array('before'=>'auth'), function()
{
	Route::get('results','HomeController@showResults');
	Route::get('logout','LoginController@logout');
});

Route::group(array('before'=>'local','prefix'=>'m'),function(){//Check if we are on the local enviornment
	Route::get('notresults',function(){ return View::make('notresults', array('answer_reveal'=>'2014-02-14 7:30:00'));});
	Route::get('results',function(){ return View::make('results');});
	Route::get('requestpath',function(){ return url('/');});

});


