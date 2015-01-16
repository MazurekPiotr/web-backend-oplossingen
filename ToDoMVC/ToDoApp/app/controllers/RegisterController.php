<?php

class RegisterController extends Controller{
	public function getRegister()
	{
		return View::make('register');
	}

	public function postRegister(){
		$rules = array('e-mail' => 'required|unique', 'password' => 'required|min:8');
		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails())
		{
			return Redirect::route('register')->withErrors($validator);
		}

		$auth = Auth::attempt(array(
			'email' => Input::get('e-mail'), 
			'password' => Input::get('password')
			), false);

		if(!$auth)
		{
			return Redirect::route('register')->withErrors(array(
				'Oeps, je gebruikersnaam en/of paswoord waren niet juist. Probeer opnieuw'
				));
		}
		return Redirect::route('dashboard');
	}
}