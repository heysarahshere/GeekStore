<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    public function product() {
        return $this->belongsTo('App\Product');
    }

    protected $fillable = [
        'name', 'attribute_id', 'value'
    ];


}
