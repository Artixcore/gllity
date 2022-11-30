<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{

    protected $fillable=['shop_name','shop_location','shop_logo','shop_banner','shop_desc','shop_status'];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function services()
    {
        return $this->hasMany(Service::class, 'shop_id');
    }
}
