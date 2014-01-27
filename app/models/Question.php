<?php

Class Question extends Eloquent
{
	protected $table = 'questions';

	protected $fillable = array('prompt','answera','answerb','answerc','answerd');


}
