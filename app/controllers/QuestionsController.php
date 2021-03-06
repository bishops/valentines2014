<?php

class QuestionsController Extends BaseController
{
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
		}elseif(strtotime($this->stage->getStage('answer_deadline')) > time())
		{	
			$questions = $this->question->all();
			return View::make('questions')->with( array('answer_deadline'=>$this->stage->getStage('answer_deadline'),'questions'=>$questions ) );
		}else
		{
			return View::make('late');
		}
	}
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
		// $user->grad_year = intval(date('Y')) + 12 - intval(Input::get('grade'));
		$user->completed_questions = 1;
		$user->save();
	}
	public function storeQuestions()
	{
		$validator = Validator::make(Input::all(),$this->generateValidation());
		if( $validator->fails())
		{
			return Redirect::to('/')->withInput()->withErrors($validator);
		}
		else
		{
			$this->storeActualQuestions();
			$this->storeUserData();
			$this->pushMatchstoQueue();
			return Redirect::to('/');
		}

	}
	public function pushMatchsToQueue()
	{
		Queue::push('MatchProcessor', array('user_id' => Auth::user()->id));
	}
}
