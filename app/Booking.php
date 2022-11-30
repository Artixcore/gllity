<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    function users(){
        return $this->belongsTo('App\User');
    }

    function service(){
        return $this->hasMany('App\Service');
    }
}
