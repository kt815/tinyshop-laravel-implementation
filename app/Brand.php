<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = 'brands';
    public $timestamps = false;


    public function items()
    {
        return $this->hasMany('App\Item');
    }

}
