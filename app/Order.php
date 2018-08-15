<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
   public function state()
    {

        return $this->hasOne('App\State', 'id', 'status_id');
    }
    
     public function store_name()
    {

        return $this->hasOne('App\Store', 'id', 'store');
    }
    
     public function products()
    {

        return $this->hasMany('App\Product', 'order_id', 'id');
    }
}
