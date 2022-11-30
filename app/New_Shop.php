<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class New_Shop extends Model
{

    protected $fillable = [
        'shop_name','name','email','password','shop_phone','shop_address','shop_location',
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];
}
