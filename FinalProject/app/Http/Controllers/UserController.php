<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Payment;
use App\Order;
use App\Item;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class UserController extends Controller
{
    public function getSignUp()
    {
        return view('user/sign-up');
    }

    public function postSignUp(Request $request)
    {

        $this->validate($request, [
            'username' => 'required|unique:users',
            'email' => 'email|required|unique:users',
            'password' => 'required|min:6'
        ]);

        $user = new User([
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password'))
        ]);
        $user->save();
        $user_id = $user->id;

         $cart = new Cart([
             'user_id' => $user_id,
             'subtotal' => 0.00,
             'totalQuantity' => 0
         ]);
        $cart->save();

        Auth::login($user);
        if (Session::has('oldUrl')) {
            $oldUrl = Session::get('oldUrl');
            Session::forget('oldUrl');

            return redirect()->to($oldUrl)
                ->with('message', "You've been signed in.");
        }

        return view('index')
            ->with('message', "You've been signed in.");
    }

    public function getSignIn()
    {
        return view('user/sign-in');
    }

    public function postSignIn(Request $request)
    {

        $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt([
            'username' => $request->input('username'),
            'password' => $request->input('password')
        ])) {


            $user = Auth::user();
            $user_id = Auth::id();
            Auth::login($user);
            if (Session::has('oldUrl')) {
                $oldUrl = Session::get('oldUrl');
                Session::forget('oldUrl');
                return redirect()->to($oldUrl);
            }

            // $user = User::firstOrCreate(['email' => $email]);
            // can use first or create here!
            if(Cart::where('user_id', $user_id)->count() > 0){
                $cart = Cart::where('user_id', $user_id)->first();
                $items = Item::where('cart_id', $cart->id)->get();
            } else {
                $cart = new Cart([
                    'user_id' => Auth::id(),
                    'subtotal' => 0.00,
                    'totalQuantity' => 0
                ]);
                $cart->save();
            }

            return view('index')
                ->with('message', "You're signed in.");
        }
        return redirect()
            ->back()
            ->with('message', 'Incorrect username or password.');
    }

    public function postSignOut(Request $request)
    {
            Auth::logout();
            return view('index')
                ->with('message', "You've been signed out.");
    }

    public function getProfile()
    {
        $user = Auth::user();
        $user_id = auth()->user()->id;
        $orders = Order::where('user_id', $user_id)->get();
        $payment = Payment::where('user_id', $user_id)->first();

        return view('user/profile')
            ->with([
                'orders' => $orders,
                'user' => $user,
                'payment' => $payment
            ]);
    }

//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

//    public function index()
//    {
//        $user_id = auth()->user()->id;
//        $orders = Orders::where('user_id', $user_id);
//
//        return view('auth.profile')
//            ->with([
//                'orders' => $orders
//            ]);
//    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name'              =>  'required',
            'profile_image'     =>  'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $user = User::findOrFail(auth()->user()->id);
        $user->name = $request->input('name');

        if ($request->has('profile_image')) {
            $image = $request->file('profile_image');
            $name = Str::slug($request->input('name')).'_'.time();
            $folder = '/uploads/images/';
            $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
            $this->uploadOne($image, $folder, 'public', $name);
            $user->profile_image = $filePath;
        }
        $user->save();

        return redirect()->back()->with(['status' => 'Profile updated successfully.']);
    }
}
