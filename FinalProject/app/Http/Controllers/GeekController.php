<?php

namespace App\Http\Controllers;

use App\Product;
use App\Customer;
use App\Record;
use http\Message;
use Illuminate\Http\Request;

class GeekController extends Controller
{
    public function getIndex() {
        $product = Product::where('name', 'Geeky Mug')->first();
        return view('index', ['product' => $product]);
    }

    public function getAbout() {
        return view('about');
    }

    public function getBlog() {
        return view('blog');
    }


}
