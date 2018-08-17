<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
   public function area()
    {

        return $this->hasOne('App\Area', 'id', 'area_id');
    }
    
     public function city()
    {

        return $this->hasOne('App\City', 'id', 'city_id');
    }
    
    
}
