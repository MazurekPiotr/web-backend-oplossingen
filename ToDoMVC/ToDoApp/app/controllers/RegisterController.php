<?php

class RegisterController extends Controller{
	public function getRegister()
	{
		return View::make('register');
	}
}