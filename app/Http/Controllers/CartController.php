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

    public function checkout() {
 

        if(is_null(Auth::user())){
            $name = "";
            $email = "";
            $telephone = "";
            $address = "";
        }
        else {
            $name = Auth::user()->name;
            $email = Auth::user()->email;
            $telephone = Auth::user()->telephone;
            $address = Auth::user()->address;
        }

        if (is_null(Cookie::get('cart'))) {
            return redirect('cart');
        }
        else {
            $cart = new Cart();
            $items = $cart->getCartArray(); 
            $order_id = $cart->getCartOrderId();
            $total = $cart->getSum($items);
        }

        return view('checkout', [
            'name' => $name,
            'email' => $email,
            'telephone' => $telephone,
            'address' => $address,
            'order' => $order_id,
            'total' => $total
            ]); 

    }

    public function postCheckout(Request $request) {
        $cart = new Cart();
        $cart->getCartOrderId();
        $order = new Order();
        $order->confirmed = 0;
        $order->order_id = $cart->getCartOrderId();
        $order->name = $request->name;
        $order->email = $request->email;
        $order->telephone = $request->telephone;
        $order->address = $request->address;
        $items = $cart->getCartArray(); 
        $order->sum = $cart->getSum($items);
        if(Auth::user()){
            $order->user_id = Auth::user()->id;
        }
        else {
            $order->user_id = 0;
        }
        $order->save(); 
        foreach ($items as $item) {
            $order_items = new OrderedItem();
            $order_items->order_id = $cart->getCartOrderId();;
            $order_items->item_id = $item->id;
            $order_items->old_price = $item->price;
            $order_items->quantity = $item->quantity;
            $order_items->save();        
        }

        $cart->cartDelete();
        Session::flash('success', 'Your order has been received. Wait for call for confirmation.');
        return redirect('cart');

    }    
}