<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public $billingAddress = array([
        'billingFirstName' => '',
        'billingLastName' => '',
        'billing_line1' => '',
        'billing_line2' => '',
        'billing_city' => '',
        'billing_state' => '',
        'billing_zip' => '',
    ]);

    public $shippingAddress = array([
        'firstName' => '',
        'lastName' => '',
        'email' => '',
        'shipping_line1' => '',
        'shipping_line2' => '',
        'shipping_city' => '',
        'shipping_state' => '',
        'shipping_zip' => '',
    ]);


    public function __construct($shippingAddress)
    {

    }
}
