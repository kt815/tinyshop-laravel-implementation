<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use App\Order;

class OrderedItem extends Model
{

	private $_order = array();

    protected $table = 'ordered_items';
    public $timestamps = false;


	public function index() {}



}
