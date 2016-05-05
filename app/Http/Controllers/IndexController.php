<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use App\Item;
use App\Brand;
use App\Category;
use App\User;
use App\Role;
use Session;

class IndexController extends Controller {

    public function index() {
        
        // $users = User::all();
        // $user = User::find(2);        
        // kd($user->roles);

        // kd(Session::all());

        $random = Item::get_random_items(6);
        return view('content', [
	        	'items' => $random,
        	]);
    }

    public function getItem($id) {
        $brand = Item::find($id)->brand;    
        $item = Item::find($id);
        return view('item', [
            'item' => $item,
            'brand' => $brand
        ]);}

}
