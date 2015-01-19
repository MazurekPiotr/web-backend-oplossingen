<?php

class RegisterController extends Controller{
	public function getRegister()
	{
		return View::make('register');
	}
	public function postRegister()
	{
		$data =  Input::only('email', 'password');
		$rule  =  array(
                    'email'      => 'required|email|unique:users',
                    'password'   => 'required|min:6',
                ) ;
		$validator = Validator::make($data,$rule);
		if ($validator->fails())
            {
                    return Redirect::to('register')
                            ->withErrors($validator->messages());
            }
            else
            {
                    Register::saveFormData(array("email" => Input::get('email'), "password" => Hash::make(Input::get('password'))));
 
                    return Redirect::to('login')
                            ->with("flash_notice","U bent geregistreerd");
            }
	}
}