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
	Route::get('results/{id}','HomeController@showResults');
	Route::get('logout','LoginController@logout');
	Route::post('questions','QuestionsController@storeQuestions');

});

Route::group(array('before'=>'local','prefix'=>'m'),function(){//Check if we are on the local enviornment
	Route::get('notresults',function(){ return View::make('notresults', array('answer_reveal'=>'2014-02-14 7:30:00'));});
	Route::get('results',function(){ return View::make('results');});
	Route::get('requestpath',function(){ return url('/');});
	Route::get('testq',function(){return Auth::user()->questionResponses()->get();});
	Route::get('testQueue','QuestionsController@pushMatchsToQueue');
	Route::get('match',function(){
			$match = new Match;
			$match->user_id_1 = 1;
			$match->user_id_2 = 1;
			$match->match_score = .5;
			$match->save();
	});	
	Route::get('authOther',function(){
		$user = User::find(1);
		Auth::login($user);
		return "ek";
	});

});
Route::get('updateStats',function(){
	$pdo = DB::connection()->getPdo();

	$sql = 'SELECT DISTINCT id FROM questions';

	$distinct = $pdo->query($sql);


	$obj = new StdClass;

	for ($i=1; $i <= 24; $i++) { 

		$sql = 'SELECT answer, COUNT(answer) AS co FROM question_response WHERE question_id = '.$i.' GROUP BY answer;';

		$matches = $pdo->query($sql);

		$qr = new StdClass;

		foreach ($matches as $row) {
			$qr->$row['answer'] = $row['co'];
		}
		$obj->$i = $qr;
	}
	file_put_contents(__DIR__.'/custom/stats.json', json_encode($obj));
	// return json_encode($obj);
});
Route::get('renderStats',function(){
	$questions = Question::all();
	return View::make('stats',array('questions'=>$questions,'stats'=>json_decode(file_get_contents(__DIR__.'/custom/stats.json'))));
});
Route::get('maximsspeciallogin',function(){
	$user = new User;
	$user = $user->findByEmail('maxim@maximzaslavsky.com');
	Auth::login($user);
	return Redirect::to('/');
});
Route::get('liamsspeciallogin',function(){
	$user = new User;
	$user = $user->findByEmail('liamarnadecolwill@none.com');
	Auth::login($user);
	return Redirect::to('/');
});
Route::get('queue',function(){
	Queue::push('LogProcessor', array('user_id' => 1,'page_id'=>4));
});

