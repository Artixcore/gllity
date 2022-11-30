<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    function users(){
        return $this->belongsTo('App\User');
    }
}
