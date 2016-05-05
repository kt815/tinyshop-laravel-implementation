<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Cookie;
use Auth;
use Session;
use App\Cart;
use App\Order;
use App\OrderedItem;

class CartController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function index() {  
        $cart = request()->cookie('cart');
        if ($cart) {
            $cart = new Cart();
            $items = $cart->getCartArray(); 
            $total = $cart->getSum($items);
        }
        else {
            $items = 0;
            $total = 0;
        }
        return view('cart', [
            'items' => $items,
            'total' => $total
            ]);

    }
    public function addToCart($id) {
        $id = (int)$id;
        $cart = new Cart();
        $cart->addToCart($id);
        return redirect($_SERVER['HTTP_REFERER']);
    }

    public function deleteItemFromCart($id) {
        $id = (int)$id;
        $cart = new Cart();
        $cart->deleteItemFromCart($id);
        return redirect($_SERVER['HTTP_REFERER']);
    }


}