<?php

class QuestionsController Extends BaseController
{
	// protected $allowed_answers = array('a','b','c','d');
	// protected $extra_input = array('gender','grade');
	protected $errors = array();
	protected $qra = array();
	protected $user;

	public function __construct(CustomStageInterface $stage, Question $question)
	{
		$this->stage = $stage;
		$this->question = $question;
		$this->user = Auth::user();
	}

	public function showQuestions()
	{
		$user = Auth::user();

		if($user->completed_questions == 1)
		{
			return View::make('thanks');
		}else
		{
			$questions = $this->question->all();
			return View::make('questions')->with( array('answer_deadline'=>$this->stage->getStage('answer_deadline'),'questions'=>$questions ) );
		}
	}

	// public function storeQuestions()
	// {
	// 	$this->
	// }
	public function generateValidation()
	{
		$validator = array();
		$question_ids = $this->question->getQuestionIds();
		foreach ($question_ids as $key => $value) {
			$validator['question'.$value] = 'required|in:a,b,c,d';
		}
		$validator['gender'] = 'required|in:0,1';
		$validator['grade'] = 'required|integer';
		return $validator;
	}
	private function storeActualQuestions()
	{
		foreach (Input::all() as $key => $value) {
			if(preg_match('/question[0-9]*/', $key))
			{
				$qr = new QuestionResponse();
				$qr->question_id = str_replace('question', '', $key);
				$qr->user_id = Auth::user()->id;
				$qr->answer = $value;
				$qr->save();
			}
		}
	}
	private function storeUserData()
	{
		$user = Auth::user();
		$user->gender = Input::get('gender');
		$user->grad_year = intval(date('Y')) + 12 - intval(Input::get('grade'));
		$user->completed_questions = 1;
		$user->save();
	}
	public function storeQuestions()
	{
		$validator = Validator::make(Input::all(),$this->generateValidation());
		if( $validator->fails())
		{
			// return "erros";
			return Redirect::to('/')->withInput()->withErrors($validator);
		}
		else
		{
			$this->storeActualQuestions();
			$this->storeUserData();
			return Redirect::to('/');
		}

	}
	// private function sortInput()
	// {
	// 	foreach (Input::all() as $key => $value) {
	// 		if( strpos($key,'question') !== false){
	// 			$qr = App::make('QuestionResponseInterface');
	// 			$qr->question_id = intval(str_replace('question', '', $key));$question_id = intval(str_replace('question', '', $key));
	// 			$qr->answer = in_array($value, array('a','b','c','d') ? $value : 'n';
	// 			$qr->user_id = $this->user->id;
	// 			array_push($this->qra, $qr);
	// 		}
	// 		if ( $key == 'gender' ) //Input about gender
	// 		{
	// 			$this->user->gender = intval($value);
	// 		}
	// 		if ( $key == 'grade' ) //Input about grade
	// 		{
	// 			$this->user->grad_year = 12 - intval($value) + date('Y');
	// 		}
	// 	}
	// }



	// public function storeQuestions()
	// {	

	// 	$user = Auth::user();
	// 	foreach (Input::all() as $key => $value) {
	// 		if( strpos($key,'question') !== false){
	// 			$qr = App::make('QuestionResponseInterface');
	// 			$question_id = intval(str_replace('question', '', $key));
	// 			if( in_array($value, array('a','b','c','d') ) )
	// 			{
	// 				$question_response = $value;
	// 			}else
	// 			{
	// 				array_push($this->error, 'Invalid Response');
	// 			}
	// 		}elseif (in_array($key, $extra_input)) {
	// 			if( $key == "gender")
	// 			{
	// 				$user->gender = intval($value);
	// 			}
	// 			if( $key == "grade" && intval($value) < 13)
	// 			{
	// 				$user->grad_year = 12 - intval($value) + 2014;
	// 			}
	// 		}else
	// 		{

	// 		}
	// 	}
	// 	// var_dump(Input::all());
	// }
}
