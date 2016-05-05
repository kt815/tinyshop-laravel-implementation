<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use App\OrderedItem;

class Order extends Model
{

	private $_order = array();

    protected $table = 'orders';
    public $timestamps = true;


	  public static function getOrderItems($order_id) {
	  	$items = OrderedItem::where('order_id', $order_id)->get();
	  	return $items;
	  }



}
