<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    function users(){
        return $this->HasMany('App\User');
    }

    function shop(){
        return $this->belongsTo('App\Shop');
    }
}
