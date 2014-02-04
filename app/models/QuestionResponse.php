<?php

Class QuestionResponse extends Eloquent
{
	protected $table = 'question_response';

	protected $fillable = array('question_id','user_id','answer');


}
