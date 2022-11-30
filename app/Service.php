<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $with = ['users'];

    protected $table = 'services';
    // protected $fillable = ['newsContent', 'newsTitle', 'postedBy'];

    function users(){
        return $this->belongsTo('App\User');
    }

    function service_category(){
        return $this->belongsTo('App\Service_Category');
    }

    function booking(){
        return $this->belongsTo('App\Booking');
    }

}
