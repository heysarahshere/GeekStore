<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Eloquent;

class Product extends Model
{

    /**
     * Post
     *
     * @mixin Eloquent
     */

    protected $fillable = ['name', 'description', 'price', 'weight', 'quantity', 'color', 'size'];


}
