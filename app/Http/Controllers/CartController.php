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
use App\User;

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
 
        if(Auth::user()){            
            $name = Auth::user()->name;
            $email = Auth::user()->email;
            $telephone = Auth::user()->telephone;
            $address = Auth::user()->address;
        }
        else {

            $name = "";
            $email = "";
            $telephone = "";
            $address = "";

        }
        $cart = new Cart();
        $items = $cart->getCartArray(); 
        $order_id = $cart->getCartOrderId();
        $total = $cart->getSum($items);

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

        $validator = \Validator::make(\Input::all(), [
            'name' => 'required|string|min:2|max:32'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

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

        $orderId = $order->order_id;

        $total = 100 * $order->sum;
        $token = $request->input('stripeToken');
        $name = $request->input('name');
        $email = $request->input('email');
        $userCheck = User::where('email', $email)->first();
        $stripeIdCheck = User::where('email', $email)->value('stripe_id');

        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));


        if (!isset($stripeIdCheck) || !isset($userCheck)) {

            // Create a new Stripe customer
            try {
                $customer = \Stripe\Customer::create([
                'source' => $token,
                'email' => $email,
                'metadata' => [
                    "Name" => $name
                ]
                ]);
            } catch (\Stripe\Error\Card $e) {
                return redirect()->route('order')
                    ->withErrors($e->getMessage())
                    ->withInput();
            }
        
            $customerID = $customer->id;

            if (isset($userCheck)) {
                 $user = User::where('email', $email)->first();
                 $user->stripe_id = $customer->id;
                 $user->save();
            }

        } else {
            $customerID = User::where('email', $email)->value('stripe_id');
            $user = User::where('email', $email)->first();
        }
        
        // Charging the Customer with the selected amount
        try {
            $charge = \Stripe\Charge::create([
                'amount' => $total,
                'currency' => 'usd',
                'customer' => $customerID,
                'metadata' => [
                    'product_name' => $orderId
                ]
                ]);
        } catch (\Stripe\Error\Card $e) {
            return redirect()->route('order')
                ->withErrors($e->getMessage())
                ->withInput();
        }

        $cart->cartDelete();
        return redirect('cart')
            ->with('success', 'Your purchase was successful! Your order has been paid.');


        // Session::flash('success', 'Your order has been received. Wait for call for confirmation.');
        // return redirect('cart');

    }    
}