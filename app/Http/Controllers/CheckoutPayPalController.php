<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use URL;
use Redirect;
use Auth;
use Session;
use App\Cart;
use App\Order;
use App\OrderedItem;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;



class CheckoutPayPalController extends Controller {


    private $_api_context;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // setup PayPal api context
        $paypal_conf = config('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_conf['client_id'], $paypal_conf['secret']));
        $this->_api_context->setConfig($paypal_conf['settings']);
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


// ----------
// ----------

        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $price = $request->total; // 10 € for example

        if($price == 0) { // ensure a price above 0
            return Redirect::to('/');
        }

        // Set Item        
        $item_1 = new Item();
        $item_1->setName('Order number: ' . $request->order)
            ->setCurrency('EUR')
            ->setQuantity(1)
            ->setPrice($price);

        // add item to list
        $item_list = new ItemList();
        $item_list->setItems(array($item_1));

        $amount = new Amount();
        $amount->setCurrency('EUR')
            ->setTotal($price); // price of all items together

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('Fitondo Fitnessplan');

        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::to('/payments/status'))
            ->setCancelUrl(URL::to('/payments/cancel'));

        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));

        try {
            $payment->create($this->_api_context);
        } catch (\PayPal\Exception\PayPalConnectionException $ex) {
            if (config('app.debug')) {
                echo "Exception: " . $ex->getMessage() . PHP_EOL;
                $err_data = json_decode($ex->getData(), true);
                exit;
            } else {
                die('Error.');
            }
        }

        foreach($payment->getLinks() as $link) {
            if($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }

        /* here you could already add a database entry that a person started buying stuff (not finished of course) */

        if(isset($redirect_url)) {
            // redirect to paypal
            return Redirect::away($redirect_url);
        }

        die('Error.');


// ----------
// ----------

    }    


    public function get(Request $request)
    {

        // Get the payment ID before session clear
        $payment_id = $request->paymentId;

        if (empty($request->PayerID) || empty($request->token)) {
           die('error');
        }

        $payment = Payment::get($payment_id, $this->_api_context);

        // PaymentExecution object includes information necessary 
        // to execute a PayPal account payment. 
        // The payer_id is added to the request query parameters
        // when the user is redirected from paypal back to your site
        $execution = new PaymentExecution();
        $execution->setPayerId($request->PayerID);

        //Execute the payment
        $result = $payment->execute($execution, $this->_api_context);

        if ($result->getState() == 'approved') { // payment made

            /* here you should update your db that the payment was succesful */

            return Redirect::to('/payments/success')
                ->with(['success' => 'Payment success']);
        }

        return Redirect::to('/')
            ->with(['error' => 'Payment failed']);
    }


    public function cancel()     
    {

        Session::flash('danger', 'Paypal payment is wrong. Try it again.');
		return redirect('cart');
    }

    public function success()     
    {

        $cart = new Cart();
        $cart->cartDelete();
        Session::flash('success', 'Your payment is success. Administrator will contact you.');

        return redirect('cart');
    }

}