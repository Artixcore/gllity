<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubOrder extends Model
{
    protected $guarded = [];

    public function items()
    {
        return $this->belongsToMany(Service::class, 'sub_order_items', 'sub_order_id', 'service_id')->withPivot('quantity', 'price');
    }

    public function order()
    {

        return $this->belongsTo(Order::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
