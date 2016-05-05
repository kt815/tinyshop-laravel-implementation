<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'items';
    public $timestamps = true;

    public static function get_random_items($number) {
		$random = Item::all()->random($number);
		return $random;

    }

    public function brand()
    {
        return $this->belongsTo('App\Brand');
    }


    public function category()
    {
        return $this->belongsTo('App\Brand');
    }

}
