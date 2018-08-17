<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
     public function cities()
    {

        return $this->hasMany('App\City', 'area_id','id');
    }
}
