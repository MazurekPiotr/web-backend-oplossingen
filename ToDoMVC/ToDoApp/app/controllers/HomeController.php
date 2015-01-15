<?php

class HomeController extends BaseController {

	public function getIndex()
	{
		$items = Auth::user()->items;
		//return View::make('todos')->with('items', $items);
		return View::make('home');
	}
	public function postIndex(){

	}
	public function logOut()
    {
        Auth::logout();
    	Session::flush();
        return Redirect::to('/');
    }
}
