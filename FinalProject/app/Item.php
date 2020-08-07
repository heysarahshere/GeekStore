<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Product;

class Item extends Model
{
    protected $fillable = [
        'product_id',
        'cart_id',
        'name',
        'color',
        'size',
        'quantity',
        'price',
        'weight'
    ];

    public function cart()
    {
        return $this->belongsTo('App\Cart');
    }

    public function product()
    {
        return $this->hasOne('App\Product');
    }
}
