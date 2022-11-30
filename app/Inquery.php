<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inquery extends Model
{
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
