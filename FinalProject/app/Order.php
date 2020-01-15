<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    // maybe there should be an array of product numbers with their details
    // instead of individual items
    // then i could delete the items but retain a record
    protected $fillable = [
        'payment_id',
        'cart_id',
        'user_id',
        'totalPrice',
        'subTotal',
        'itemCount',
        'shippingMethod',
        'shippingCost',
        'status' ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function cart()
    {
        return $this->hasOne('App\Cart');
    }
    public function paid()
    {
        return $this->hasOne('App\Payment');
    }

}
