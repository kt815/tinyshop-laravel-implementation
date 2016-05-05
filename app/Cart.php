<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Cookie;
use App\Item;

class Cart
{

	private $_cart = array();

	public function getCookieCart() {
		return $this->_cart = Cookie::get('cart');		
	}

	public function addToCart($id) {
	  
	  	if (null == Cookie::get('cart')) {
			$this->_cart = array('order_id' => uniqid());	
	  	}
	  	else {
	  		$this->_cart = Cookie::get('cart');
	  		$this->_cart = $this->unserializeCart();
	  	}
		
		$value = $this->addIdToArray($id);
		Cookie::queue(Cookie::make('cart', $value, 60));		
	}

	  public function addIdToArray($id, $quantity = 1) {
	   if (array_key_exists($id, $this->_cart)) {
	      $new_quantity = $this->_cart[$id] + $quantity;
	      $this->_cart[$id] = $new_quantity;
	      return $this->serializeCart();
	    } else {
	      $this->_cart[$id] = $quantity;
	      return $this->serializeCart();	      
	    }
	  }

	public function getCartArray() {
		$this->_cart = Cookie::get('cart');
		$cart = $this->unserializeCart();
		$order_id = $cart['order_id'];
		unset($cart['order_id']);
		$cart_items = $cart;
		$keys = array_keys($cart);
		$items = [];
		foreach ($keys as $id) {
			$item = Item::find($id);
			$brand = Item::find($id)->brand;
			$item['brand'] = $brand['brand'];
			$item['quantity'] = $cart_items[$item['id']];
			$items[] = $item;			
		}
		return $items;
	}

	public function getCartOrderId() {
		$this->_cart = Cookie::get('cart');
		$cart = $this->unserializeCart();
		$order_id = $cart['order_id'];		
		return $order_id;
	}

	public function getSum($cart_items) {
	  $sum = 0;
	  foreach ($cart_items as $item) {
	      $sum += $item['price'] * $item['quantity'];	     
	  }
	  return $sum;
	}	

	public function deleteItemFromCart($id) {
	  $this->_cart = Cookie::get('cart');
	  $cart = $this->unserializeCart();
	  if (!array_key_exists($id, $cart)) {
	    return false;
	  }
	  unset($cart[$id]);
	  $this->_cart = $cart;
	  $cart =  $this->serializeCart();
	  Cookie::queue(Cookie::make('cart', $cart, 60));	
	}

	public function cartDelete() {
		Cookie::queue(Cookie::forget('cart'));
	}
	
	public function serializeCart() {	  	  
	  return base64_encode(serialize($this->_cart));
	}

	public function unserializeCart() {	  	  
	  return unserialize(base64_decode($this->_cart)); 
	}

	public function count() {
		$count = 18;
		return $count;	
	}

}