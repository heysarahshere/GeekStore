<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{

    protected $fillable = [
        'creditCardNumber',
        'creditCardType',
        'creditCardExpYear',
        'creditCardExpMonth'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function paid()
    {
        return $this->hasMany('App\Order');
    }

}
