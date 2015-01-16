<?php

class AuthController extends Controller{
	public function getLogin()
	{
		return View::make('login');
	}

	public function postLogin(){
		$rules = array('e-mail' => 'required', 'password' => 'required');
		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails())
		{
			return Redirect::route('login')->withErrors($validator);
		}

		$auth = Auth::attempt(array(
			'email' => Input::get('e-mail'), 
			'password' => Input::get('password')
			), false);

		if(!$auth)
		{
			return Redirect::route('login')->withErrors(array(
				'Oeps, je gebruikersnaam en/of paswoord waren niet juist. Probeer opnieuw'
				));
		}
		return Redirect::route('dashboard');
	}
}
