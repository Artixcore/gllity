<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service_Category extends Model
{
    function service(){
        return $this->hasMany('App\Service');
    }
}
