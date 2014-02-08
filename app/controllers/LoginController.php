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
		$user = $this->findUser( $token );
		if ( $user != false )
		{
			Auth::login($user);
			return Redirect::to('/');
		}else 
		{
			Session::put('message', 'It doesn\'t look like you are in the Upper School. Better luck next year!');
			return Redirect::to('/');
		}
	}
	public function logout()
	{
		Auth::logout();
		return Redirect::to('/');
	}
	private function findUser( $token )
	{
		$user = $this->user->findByEmail( $token['email'] );
		return $user;
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
