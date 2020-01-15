<?php

namespace App;
use App\User;
use App\Item;
use App\Order;


use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'order_id',
        'user_id',
        'subtotal',
        'totalQuantity'
    ];

    public function user() // needs this so that it has one owner before it's ever ordered
    {
        return $this->belongsTo('App\User');
    }

    public function order() // after it's transferred to the order, the cart can be deleted
    {
        return $this->belongsTo('App\Order'); // maybe don't need this actually
    }

    public function items() // doesn't need an item id, items just need a cart id
    {
        return $this->hasMany('App\Item');
    }
}
