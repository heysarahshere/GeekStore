<?php

namespace App\Http\Controllers;

use App\Cart;
use App\User;
use Session;
use App\Product;
use App\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function getCart()
    {
        $user_id = Auth::id();
        $cart = Cart::where('user_id', $user_id)->first();
        $items = Item::where('cart_id', $cart->id)->get();
        if($items){
            $totalPrice = 0;
            foreach($items as $item){
                $totalPrice += $item->price * $item->quantity;
            }
            $count = $items->sum('quantity');
            session()->put($count);
            session()->save();
            return view('store/cart', ['items' => $items, 'cart' => $cart, 'totalPrice' => $totalPrice]);
        }
        return view('store/cart', ['cart' => $cart, 'totalPrice' => 0.00]);
    }


    public function addToCart(Request $request, $id)
    {
        $user_id = Auth::id();
        $cart = Cart::where('user_id', $user_id)->first();
//        $items = Item::where('cart_id', $cart->id)->get();

        $product = Product::find($id);

        $oldItems = Item::where('cart_id', $cart->id)->get();
        foreach($oldItems as $oldItem){
            if($oldItem->name === $product->name){
                if($oldItem->color === $request->input('color')){
                    if($oldItem->size === $request->input('size')){

                        $oldItem->quantity++;
                        $oldItem->save();

                        $totalPrice = 0;

                        // may have messed some things up,
                        // why is cart->items working???

                        foreach($oldItems as $item){
                            $totalPrice += $item->price * $item->quantity;
                        }
                        $count = $oldItems->sum('quantity');

//                        foreach($cart->items as $item){
//                            $totalPrice += $item->price * $item->quantity;
//                            $totalQty += $item->quantity;
//                        }

                        $cart->fill([
                            'subtotal' => $totalPrice,
                            'totalQuantity' => $count
                        ]);
                        $cart->save();

                        return redirect()
                            ->back()
                            ->with(['totalPrice' => $totalPrice])
                            ->with('message', 'Item updated.');
                    }
                }
            }
        }

        $item = new Item([
            'product_id' => $id,
            'cart_id' => $cart->id,
            'name' => $product->name,
            'color' => $request->input('color'),
            'size' => $request->input('size'),
            'quantity' => '1',
            'price' => $product->price,
            'weight' => $product->weight
        ]);
        $item->save();
        $totalPrice = 0;

        $items = Item::where('cart_id', $cart->id)->get();
        foreach($items as $item){
            $totalPrice += $item->price * $item->quantity;
        }
        $count = $items->sum('quantity');

        $cart->fill([
            'subtotal' => $totalPrice,
            'totalQuantity' => $count
        ]);
        $cart->save();
        session()->put($count);
        session()->save();



        return redirect()->back()->with('message', 'Item added to cart.');
    }


    public function editCart(Request $request, $id){
        $this->validate($request, [
        'newQuantity' => 'required|integer'
        ]);

        $newQuantity = $request->input('newQuantity');
        $item = Item::find($id);

            if($newQuantity <= 0){
                $item->delete();
                $totalPrice = 0;
                $cart = Item::all();
                foreach($cart as $item){
                    $totalPrice += $item->price * $item->quantity;
                }
                return redirect()
                    ->back()
                    ->with(['totalPrice' => $totalPrice, 'newPrice' => $totalPrice])
                    ->with('message', 'Item updated');
            }

        $item->quantity = $newQuantity;
        $item->save();

        $totalPrice = 0;
        $user_id = Auth::id();
        $cart = Cart::where('user_id', $user_id)->first();
        $items = Item::where('cart_id', $cart->id)->get();

        foreach($items as $item){
            $totalPrice += $item->price * $item->quantity;
        }

        $count = $items->sum('quantity');
        session()->put($count);
        session()->put($totalPrice);
        session()->save();

        return redirect()
            ->back()
            ->with(['totalPrice' => $totalPrice, 'newPrice' => $totalPrice])
            ->with('message', 'Item updated');

    }

    public function deleteItem($id)
    {
        $item = Item::find($id);
        $item->delete();

        $user_id = Auth::id();
        $cart = Cart::where('user_id', $user_id)->first();
        $items = Item::where('cart_id', $cart->id)->get();

        $count = $items->sum('quantity');
        session()->put($count);
        session()->save();

        return redirect()
            ->back()
            ->with('message', 'Item deleted');
    }

    public function dumpCart() {
        $user_id = Auth::id();
        $cart = Cart::where('user_id', $user_id)->first();
        $items = Item::where('cart_id', $cart->id)->get();

        $count = $items->sum('quantity');
        session()->put($count);
        session()->save();
        foreach($items as $item) {
            $item->delete();
        }

        return redirect()->back()->with('message', 'Your cart was cleared.');
    }

}
