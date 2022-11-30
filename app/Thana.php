<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thana extends Model
{
    function zilla(){
        return $this->belongsTo('App\Zilla','zilla_id');
    }
}
