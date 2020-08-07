<?php

namespace App;

use App\Payment;
use App\Item;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password',
        'profile_image',
        'firstName',
        'lastName',
        'email',
        'shipping_line1',
        'shipping_line2',
        'shipping_city',
        'shipping_state',
        'shipping_zip',
        'billingFirstName',
        'billingLastName',
        'billing_line1',
        'billing_line2',
        'billing_city',
        'billing_state',
        'billing_zip',
    ];

    public function getImageAttribute()
    {
        return $this->profile_image;
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function cart() {
        return $this->hasOne('App\Cart');
    }

    public function orders() {
        return $this->hasMany('App\Order')->orderBy('created_at');
    }

    public function payments() {
        return $this->hasMany('App\Payment');
    }
}
