<?php

namespace App\Http\Controllers;

use App\Payment;
use App\Product;
use App\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class ProductController extends Controller
{


    public function getAllProducts()
    {
        $products = Product::all();

        return view('products/all', ['products' => $products]);
    }

    public function getProductDetails($id)
    {
        $product = Product::find($id);
        $all_reviews = Review::where('product_id', $id)->get();
        $average_rating = $all_reviews->avg('rating');
        $reviews = Review::where('product_id', $id)->paginate(5);
        // could store attributes in a table later on
        if ($product->category == 'cup') {
            $colors = ['Black', 'White', 'Silver'];
            $sizes = ['12oz', '16oz', '24oz', '32oz'];
        } else {
            $colors = ['Black', 'Blue', 'Red', 'White', 'Cream', 'Gray'];
            $sizes = ['XS', 'S', 'M', 'L', 'XL', 'XXL'];
        }

        return view('products/show', [
            'product' => $product,
            'colors' => $colors,
            'sizes' => $sizes,
            'average' => $average_rating,
            'all_reviews' => $all_reviews,
            'reviews' => $reviews
        ]);
    }

    public function postReview($id, Request $request)
    {
        $this->validate($request, [
        'reviewTitle' => 'required',
        'reviewContent' => 'required',
        'rating' => 'required'
    ]);

        $review = new Review([
            'product_id' => $id,
            'user_id' => auth()->user()->id,
            'poster' => auth()->user()->username,
            'rating' => $request->input('rating'),
            'comment' => $request->input('reviewContent')
        ]);

        $review->save();
        $all_reviews = Review::where('product_id', $id)->get();
        $average_rating = $all_reviews->avg('rating');
        $reviews = Review::where('product_id', $id)->paginate(5);
        $product = Product::find($id);

        if ($product->category == 'cup') {
            $colors = ['Black', 'White', 'Silver'];
            $sizes = ['12oz', '16oz', '24oz', '32oz'];
        } else {
            $colors = ['Black', 'Blue', 'Red', 'White', 'Cream', 'Gray'];
            $sizes = ['XS', 'S', 'M', 'L', 'XL', 'XXL'];
        }

        return view('products/show', [
            'reviews' => $reviews,
            'all_reviews' => $all_reviews,
            'average' => $average_rating,
            'colors' => $colors,
            'sizes' => $sizes,
            'product' => $product
        ])
            ->with('message', "Thank you, your feedback is appreciated.");
    }

    public function search(Request $request) {

        try
        {
            $q = $request->input('q');
            $results = Product::where('name','LIKE','%'.$q.'%')
                ->orWhere('category','LIKE','%'.$q.'%')
                ->orWhere('description','LIKE','%'.$q.'%')
                ->get();

                return view('products/results', ['results' => $results, 'q' => $q ])
                    ->with('message', 'Results for: '.$q);
        }
        catch (\Illuminate\Database\QueryException $ex)
        {
            return view ('products/all')
             ->with('message', 'No matching results.');
        }

    }
}


