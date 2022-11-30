<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
// implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','email','password','phone','address',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function setPasswordAttribute($password)
    {
    $this->attributes['password'] = \Hash::make($password);
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */

    function pos(){
        return $this->hasMany(POS::class);
    }

    function cart(){
        return $this->hasMany('App\Cart');
    }

    function inquery(){
        return $this->hasOne(Inquery::class, 'user_id');
    }

    function shop(){
        return $this->hasOne(Shop::class, 'user_id');
    }

    function booking(){
        return $this->hasMany('App\Booking');
    }

    function product(){
        return $this->hasMany('App\Product');
    }

    function order(){
        return $this->hasMany('App\Order');
    }

    function service(){
        return $this->hasMany('App\Service');
    }

    function employee(){
        return $this->belongsTo('App\Employee');
    }

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    function roles(){
        return $this->belongsToMany('App\Role');
    }

    function hasAnyRoles($roles){
        if($this->roles()->whereIn('urole', $roles)->first()){
        return true;
    }
    return false;
    }

    function hasRole($role){
        if($this->roles()->where('urole', $role)->first()){
        return true;
    }
    return false;
    }

}
