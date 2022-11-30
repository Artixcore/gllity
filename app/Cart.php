<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    function users(){
        return $this->belongsTo('App/User');
    }

    function products(){
        return $this->belongsTo('App/Product');
    }

    function service(){
        return $this->belongsTo('App/Service');
    }

}
