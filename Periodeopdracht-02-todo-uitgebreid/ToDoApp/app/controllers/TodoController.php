<?php

class TodoController extends BaseController {

	public function addTodoView(){
        return View::make('add');
    }

    public function postTodo(){
        $id = Input::get('id');
        $item = Item::findOrFail($id);
        $item->mark();
        return Redirect::route('todos');
    }

    public function addTodo()
    {
        $rules = array('todo' => 'required');
        $validator = Validator::make(Input::all(), $rules);

        if($validator->fails())
        {
            return Redirect::route('add')->withErrors($validator);
        }

        $item = new Item;
        $item->name = Input::get('todo');
        $item->user_id = Auth::user()->id;
        $item->save();
        $items = Auth::user()->items;
        return Redirect::route('todos')->withItems($items)->with("flash_notice", "Todo ".$item->name." toegevoegd.");
    }

    public function deleteTodo($item)
    {
        if($item->user_id == Auth::user()->id){
           $item->delete(); 
        }
        
        return Redirect::route('todos')->with("flash_notice", "Het item ".$item->name. " werd verwijderd.");
    }
}