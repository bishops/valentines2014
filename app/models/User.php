<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * The attributes included in the model's JSON form.
	 *
	 * @var array
	 */
	protected $fillable = array('grad_year','geneder','first_name','last_name','email','completed_questions');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}
	public function findByEmail($email)
	{	
		return $this->where('email','=',$email)->first();
	}
	public function getReminderEmail()
	{
		return "";
	}
	public function getAuthPassword()
	{
		return "";
	}
	public function questionResponses()
	{
		return $this->hasMany('QuestionResponse','user_id', 'id');
	}

}
