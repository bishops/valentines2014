<?php

class LoginController extends \BaseController {

	public function __construct(SSOInterface $sso, User $user)
	{
		$this->sso  = $sso;
		$this->user = $user;
	}
	public function redirectLogin()
	{
		return Redirect::to($this->sso->get_url());
	}
	public function recieveLogin()
	{
		$token = $this->sso->validate_token();
		$user = $this->findOrCreateUser( $token );
		Auth::login($user);
		Redirect::to('/');
	}
	public function logout()
	{
		Auth::logout();
		Redirect::to('/');
	}
	private function findOrCreateUser($token)
	{
		$user = $this->user->findByEmail($token['email']);
		if( ! $user )
		{
			$user = $this->user;
			$user->first_name = $token['firstname'];
			$user->last_name  = $token['lastname'];
			$user->email      = $token['email'];
			$user->save();
		}
		return $user;
	}

}
