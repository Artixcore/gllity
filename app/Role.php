<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    function users(){
        return $this->belongsToMany(User::class);
    }
}
