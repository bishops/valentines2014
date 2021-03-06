<?php

Class Question extends Eloquent
{
	protected $table = 'questions';

	protected $fillable = array('prompt','answera','answerb','answerc','answerd');

	public function getQuestionIds()
	{
		return DB::table($this->table)->lists('id');
	}
}
