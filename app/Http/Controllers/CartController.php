<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addToCart(Request $request, $id)
    {
        $addCart = Cart::create([
            "product_id" => $request->product_id,
            "name" => $request->name,
            "image" => $request->image,
            "price" => $request->price,
            "user_id" => Auth::user()->id,
        ]);

        return redirect()->route('product.view',$id)->with(['success' => "Product Added Successfully!"]);
    }

    public function cart()
    {
        $cartProducts = Cart::where('user_id', Auth::user()->id)->orderBy('id','desc')->get();
        $totalPrice = Cart::where('user_id', Auth::user()->id)->sum('price');

        return view('cart', compact('cartProducts', 'totalPrice'));
    }

    public function cartDelete($id)
    {
        Cart::where('product_id', $id)->delete();

        return redirect()->route('cart')->with(['success' => "Product Remove Successfully!"]);
    }

    public function checkoutProceed(Request $request)
    {
        $value = $request->price;
        session(['totalPrice' => $value]); // Store value -> session
        //$newPrice = session('totalPrice'); // Retrieve value from session

        return redirect()->route('checkout');
    }

    public function checkout()
    {
        return view('checkout');
    }

    public function order(Request $request)
    {
        //return $request->all();
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'country' => 'required',
            'address' => 'required',
            'city' => 'required',
            'postcode' => 'required',
            'email' => 'required',
        ]);

        $data=$request->all();
        Order::create($data);

        return redirect()->back();
    }
}
