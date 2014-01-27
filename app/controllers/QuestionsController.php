<?php

class QuestionsController Extends BaseController
{
	public function __construct(CustomStageInterface $stage, Question $question)
	{
		$this->stage = $stage;
		$this->question = $question;
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
			return View::make('questions', array('answer_deadline'=>$this->stage->getStage('answer_deadline'),'questions'=>$questions ) );
		}
	}
}
