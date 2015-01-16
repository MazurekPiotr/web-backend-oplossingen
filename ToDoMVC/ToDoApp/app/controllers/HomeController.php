<?php

class HomeController extends BaseController {

	public function getIndex()
	{
		return View::make('home');
	}
    public function getDashboard()
    {
    	return View::make('dashboard');
    }
    public function getLogout()
    {
    	Auth::logout();
        return Redirect::route('home')->with('flash_notice', 'U bent uitgelogd');
    }
}
