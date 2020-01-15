<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [
    'uses' => 'GeekController@getIndex',
    'as' => 'index'
]);


// -------------------------------------------------------- products
Route::group(['prefix' => 'products'], function () {

    Route::get('/all', [
        'uses' => 'ProductController@getAllProducts',
        'as' => 'products'
    ]);

    Route::get('/show/{id}', [
        'uses' => 'ProductController@getProductDetails',
        'as' => 'product-details'
    ]);

    Route::post('/show/{id}', [  // hopefully will work if it's a post
        'uses' => 'ProductController@postReview',
        'as' => 'post-review'
    ]);

    Route::any('/results', [
        'uses' => 'ProductController@search',
        'as' => 'search'
    ]);
});


// -------------------------------------------------------- about

Route::get('about', [
    'uses' => 'GeekController@getAbout',
    'as' => 'about'
]);


// -------------------------------------------------------- blog

Route::get('blog', [
    'uses' => 'GeekController@getBlog',
    'as' => 'blog'
]);

// -------------------------------------------------------- store


Route::group(['prefix' => 'store'], function () {
    Route::get('/cart', [
        'uses' => 'CartController@getCart',
        'as' => 'cart'
    ]);

    Route::post('/cart/{id}', [
        'uses' => 'CartController@addToCart',
        'as' => 'cart-add'
    ]);

    Route::put('/cart/{id}', [
        'uses' => 'CartController@editCart',
        'as' => 'cart-edit'
    ]);

    Route::delete('/cart/{id}', [
        'uses' => 'CartController@deleteItem',
        'as' => 'cart-delete'
        ]);

    Route::delete('/empty', [
        'uses' => 'CartController@dumpCart',
        'as' => 'dump-cart'
    ]);

    Route::get('/checkout', [
        'uses' => 'CheckoutController@getCheckout',
        'as' => 'checkout',
        'middleware' => 'auth'
    ]);

    Route::post('/checkout', [
        'uses' => 'CheckoutController@postBilling',
        'as' => 'billing'
    ]);

    Route::post('/shipping', [
        'uses' => 'CheckoutController@postReturn',
        'as' => 'return'
    ]);

    Route::post('/payment', [
        'uses' => 'CheckoutController@postPayment',
        'as' => 'payment-post'
    ]);


    Route::post('/confirm', [
        'uses' => 'CheckoutController@checkoutConfirm',
        'as' => 'checkout-confirm'
    ]);

    Route::get('/receipt', [
        'uses' => 'CheckoutController@getReceipt',
        'as' => 'receipt'
    ]);
});

Route::post('/calculate', [
    'uses' => 'CheckoutController@calcShipping',
    'as' => 'calc-shipping'
]);



// -------------------------------------------------------- user

Route::group(['prefix' => 'user'], function () {
    Route::get('/sign-up', [
        'uses' => 'UserController@getSignUp',
        'as' => 'sign-up'
    ]);
    Route::post('/sign-up', [
        'uses' => 'UserController@postSignUp',
        'as' => 'sign-up-post'
    ]);


    Route::get('/sign-in', [
        'uses' => 'UserController@getSignIn',
        'as' => 'login'
    ]);

    Route::post('/sign-in', [
        'uses' => 'UserController@postSignIn',
        'as' => 'sign-in-post'
    ]);

    Route::post('/sign-out', [
        'uses' => 'UserController@postSignOut',
        'as' => 'sign-out'
    ]);

    Route::get('/profile', [
        'uses' => 'UserController@getProfile',
        'as' => 'profile'
    ]);


    Route::post('/profile/update',
        'UserController@updateProfile'
    )->name('profile-update');

});




