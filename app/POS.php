<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class POS extends Model
{
    function users(){
        return $this->belongsTo(User::class);
    }
}
