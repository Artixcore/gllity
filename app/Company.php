<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    function users(){
        return $this->belongsTo('App\User', 'user_id');
    }

    function employee(){
        return $this->hasMany('App\Employee', 'company_id');
    }
}
