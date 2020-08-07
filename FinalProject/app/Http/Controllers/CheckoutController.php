<?php

namespace App\Http\Controllers;

use App\Payment;
use App\Item;
use App\Cart;
use App\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class CheckoutController extends Controller
{
    public function getCheckout()
    {
        $user_id = Auth::id();
        $cart = Cart::where('user_id', $user_id)->first();
        $items = Item::where('cart_id', $cart->id)->get();

        $count = $items->sum('quantity');
        session()->put($count);
        session()->save();

        $shipping = "";

        $totalPrice = 0;
        foreach ($items as $item) {
            $totalPrice += $item->price * $item->quantity;
        }

        return view('store/checkout', ['total' => $totalPrice, 'shipping' => $shipping, 'items' => $items]);
    }

    public function postBilling(Request $request)
    {
        $user_id = Auth::id();
        $cart = Cart::where('user_id', $user_id)->first();
        $items = Item::where('cart_id', $cart->id)->get();

        $count = $items->sum('quantity');
        session()->put($count);
        session()->save();

        $this->validate($request, [
            'firstName' => 'required',
            'lastName' => 'required',
            'shipping_line1' => 'required',
            'shipping_city' => 'required',
            'shipping_state' => 'required',
            'shipping_zip' => 'required|integer|min:5'
        ]);

        $shipping = [
            'firstName' => $request->input('firstName'),
            'lastName' => $request->input('lastName'),
            'email' => $request->input('email'),
            'line1' => $request->input('shipping_line1'),
            'line2' => $request->input('shipping_line2'),
            'city' => $request->input('shipping_city'),
            'state' => $request->input('shipping_state'),
            'zip' => $request->input('shipping_zip')
        ];

        if ($request->input('billingSame') == true) {
            $billing = [
                'firstName' => $request->input('firstName'),
                'lastName' => $request->input('lastName'),
                'line1' => $request->input('shipping_line1'),
                'line2' => $request->input('shipping_line2'),
                'city' => $request->input('shipping_city'),
                'state' => $request->input('shipping_state'),
                'zip' => $request->input('shipping_zip')
            ];

            return view('store/billing')
                ->with(['shipping' => $shipping, 'billing' => $billing, 'billingSame' => true])
                ->with('message', 'Same');
        }

        return view('store/billing')
            ->with(['shipping' => $shipping, 'billing' => '', 'billingSame' => false])
            ->with('message', 'Not Same');

    }

    public function postReturn()
    {
        return back()->withInput();
    }

    public function postPayment(Request $request)
    {
        $user_id = Auth::id();
        $cart = Cart::where('user_id', $user_id)->first();
        $items = Item::where('cart_id', $cart->id)->get();

        $count = $items->sum('quantity');
        session()->put($count);
        session()->save();

        $this->validate($request, [
            'billingFirstName' => 'required',
            'billingLastName' => 'required',
            'billing_line1' => 'required',
            'billing_city' => 'required',
            'billing_state' => 'required',
            'billing_zip' => 'required|integer|min:5'
        ]);

        $shipping = [
            'firstName' => $request->input('firstName'),
            'lastName' => $request->input('lastName'),
            'email' => $request->input('email'),
            'line1' => $request->input('shipping_line1'),
            'line2' => $request->input('shipping_line2'),
            'city' => $request->input('shipping_city'),
            'state' => $request->input('shipping_state'),
            'zip' => $request->input('shipping_zip')
        ];

        $billing = [
            'firstName' => $request->input('billingFirstName'),
            'lastName' => $request->input('billingLastName'),
            'line1' => $request->input('billing_line1'),
            'line2' => $request->input('billing_line2'),
            'city' => $request->input('billing_city'),
            'state' => $request->input('billing_state'),
            'zip' => $request->input('billing_zip')
        ];

        return view('store/payment', ['shipping' => $shipping, 'billing' => $billing]);

    }

    public function checkoutConfirm(Request $request)
    {
//        $this->validate($request, [
//            'creditCardNumber' => 'required|integer',
//            'creditCardMonth' => 'required|integer',
//            'creditCardYear' => 'required|integer',
//            'creditCardType' => 'required|integer',
//            'creditCardCode' => 'required|integer'
//        ]);

        $user_id = Auth::id();
        $cart = Cart::where('user_id', $user_id)->first();
        $items = Item::where('cart_id', $cart->id)->get();

        $count = $items->sum('quantity');
        session()->put($count);
        session()->save();

        // user checkout
        if (Auth::check()) {
            $user = Auth::user();

            $user->firstName = $request->input('firstName');
            $user->lastName = $request->input('lastName');
            $user->shipping_line1 = $request->input('shipping_line1');
            $user->shipping_line2 = $request->input('shipping_line2');
            $user->shipping_city = $request->input('shipping_city');
            $user->shipping_state = $request->input('shipping_state');
            $user->shipping_zip = $request->input('shipping_zip');
            $user->billingFirstName = $request->input('billingFirstName');
            $user->billingLastName = $request->input('billingLastName');
            $user->billing_line1 = $request->input('billing_line1');
            $user->billing_line2 = $request->input('billing_line2');
            $user->billing_city = $request->input('billing_city');
            $user->billing_state = $request->input('billing_state');
            $user->billing_zip = $request->input('billing_zip');
            $user->save();

            $payment = new Payment();
            $payment->creditCardNumber = '************' . substr($request->input('creditCardNumber'), -4);
            $payment->creditCardType = $request->input('creditCardType');
            $payment->creditCardMonth = $request->input('creditCardMonth');
            $payment->creditCardYear = $request->input('creditCardYear');
            $payment->creditCardCode = $request->input('creditCardCode');
            $user->payments()->save($payment);

            $user_id = Auth::id();
            $cart = Cart::where('user_id', $user_id)->first();
            $items = Item::where('cart_id', $cart->id)->get();
            $totalPrice = 0;
            foreach ($items as $item) {
                $totalPrice += $item->price * $item->quantity;
            }

            session()->forget('shippingOption');

            return view('store/confirm', [
                'items' => $items,
                'totalPrice' => $totalPrice,
                'user' => $user,
                'payment' => $payment]);

        }

        return redirect()->view('user/sign-in')->with('message', 'You must be logged in to do that.');
    }

    public function calcShipping(Request $request)
    {

        $this->validate($request, [
            'shippingOption' => 'required'
        ]);

        $user = Auth::user();
        $user_id = Auth::id();
        $cart = Cart::where('user_id', $user_id)->first();
        $items = Item::where('cart_id', $cart->id)->get();

        $payment = Payment::where('user_id', $user_id)->firstOrFail();

        $shippingOption = $request->input('shippingOption');

        $totalPrice = 0;
        foreach ($items as $item) {
            $totalPrice += $item->price * $item->quantity;
        }
        $costWithShipping = $totalPrice + $shippingOption;

        if ($shippingOption == 4.99) {
            $shippingMethod = "USPS First Class";
            $shippingCost = 4.99;
        } elseif ($shippingOption == 8.99) {
            $shippingMethod = "USPS Priority";
            $shippingCost = 8.99;
        } elseif($shippingOption == 12.99){
            $shippingCost = 12.99;
            $shippingMethod = "Fedex Overnight";
        } else {
            $shippingCost = 12.99;
            $shippingMethod = "idk";
        }
        Session::put('shippingCost', $shippingCost);
        Session::put('shippingMethod', $shippingMethod);
        Session::put('shippingOption', $shippingOption);
        session()->put($costWithShipping);
        session()->put($shippingMethod);
        session()->put($shippingCost);
        session()->save();


        return view('/calculate', [
            'costWithShipping' => $costWithShipping,
            'items' => $items,
            'totalPrice' => $totalPrice,
            'user' => $user,
            'payment' => $payment,
            'shippingOption' => $shippingOption,
            'shippingCost' => $shippingCost])
            ->with('message', 'Shipping cost calculated.');
    }

    public function getReceipt(Request $request)
    {
        $user = Auth::user();
        $user_id = Auth::id();
        $cart = Cart::where('user_id', $user_id)->first();
        $items = Item::where('cart_id', $cart->id)->get();

        $totalPrice = 0;
        foreach ($items as $item) {
            $totalPrice += $item->price * $item->quantity;
        }

        // probably a sum method would work instead
        $itemCount = 0;
        foreach ($items as $item) {
            $itemCount += $item->quantity;
        }

        //items in "cart" should be associated with the user that added them

        $payment = Payment::where('user_id', $user_id)->firstOrFail();

        $shippingCost = session()->get('shippingCost');
        $shippingMethod = session()->get('shippingMethod');
        $shippingOption = session()->get('shippingOption');
//        if ($shippingOption == 4.99) {
//            $shippingMethod = "USPS First Class";
//            $shippingCost = 4.99;
//        } elseif ($shippingOption == 8.99) {
//            $shippingMethod = "USPS Priority";
//            $shippingCost = 8.99;
//        } elseif($shippingOption == 12.99){
//            $shippingCost = 12.99;
//            $shippingMethod = "Fedex Overnight";
//        } else {
//            $shippingCost = 12.99;
//            $shippingMethod = "idk";
//        }

        $count = $items->sum('quantity');
        session()->put($count); // not using now but may later
        session()->save();

//        $shippingCost = (float)$shippingOption;
        // rename, just use total price and subtotal like they actually are
        $realTotal = $totalPrice + $shippingCost;
        $itemCount = 0;
        foreach ($items as $item){
        $itemCount += $item->quantity;
    }
        // save order and associate with user
        $order = new Order([
            'user_id' => $user_id,
            'totalPrice' => $realTotal,
            'subTotal' => $totalPrice,
            'itemCount' => $itemCount,
            'shippingMethod' => $shippingMethod,
            'shippingCost' => $shippingCost,
            'status' => "active"
        ]);

//        foreach ($items as $item){
//            $order->cart()->save($item);
//        }
        // associate purchased items so they can be cleared from "cart" table (items) // should rename to cart



        $order->save();
        $order->user()->associate($user);
        // put this in a db transaction
        $order->paid()->save($payment);
        $user->payments()->save($payment);
        $payment->paid()->save($order);

        $payment->user()->associate($user_id);
        $order->paid()->save($payment);  // work out something better here

//        Auth::user()->cart()->products()->sum('price'); // need better way to handle items/user association
        foreach ($items as $item) {
            $item->delete();
        }

        session()->forget($shippingOption);
        return view('store/receipt', [
            'items' => $items,
            'totalPrice' => $totalPrice,
            'user' => $user,
            'payment' => $payment,
            'shippingMethod' => $shippingMethod,
            'shippingCost' => $shippingCost]);

    }


}
