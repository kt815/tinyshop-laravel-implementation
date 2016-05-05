<?php

if(! function_exists('cart_cout')) {

function cart_cout() {

$cart = request()->cookie('cart');
if ($cart) {
	$var =  unserialize(base64_decode(request()->cookie('cart')));
	unset($var['order_id']);
	$count = array_sum($var);
}
else {
	$count = 0;	
}

return $count;
}

}
