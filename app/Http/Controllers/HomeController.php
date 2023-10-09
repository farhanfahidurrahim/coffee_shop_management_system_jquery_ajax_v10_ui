<?php

namespace App\Http\Controllers;

use App\Models\Booktable;
use App\Models\Order;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::select()->orderBy('id', 'desc')->take('4')->get();
        return view('home', compact('products'));
    }

    public function viewProduct($id)
    {
        $product = Product::findOrFail($id);
        $relatedProducts = Product::where('type', $product->type)->where('id', '!=', $id)->take('4')->get();
        return view('view_product', compact('product','relatedProducts'));
    }

    public function menu()
    {
        $desserts = Product::select()->where('type','dessert')->orderBy('id','desc')->take('6')->get();
        $drinks = Product::select()->where('type','drink')->orderBy('id','desc')->take('6')->get();
        return view('menu', compact('desserts','drinks'));
    }

    public function services()
    {
        return view('services');
    }

    public function about()
    {
        return view('about');
    }

    public function myOrder()
    {
        $orders = Order::select()->where('user_id', Auth::user()->id)->orderBy('id','desc')->get();
        return view('my_order', compact('orders'));
    }

    public function myBooking()
    {
        $bookings = Booktable::select()->where('user_id', Auth::user()->id)->orderBy('id','desc')->get();
        // $checkReview = Review::select()->where('user_id', Auth::user()->id)->orderBy('id','desc')->get();
        return view('my_booking', compact('bookings'));
    }

    public function reviewStore(Request $request)
    {
        $request->validate(
            [
                'message' => 'required|unique:reviews',
            ],
            [
                'message.required' => "Hey Review Message is required!",
                'message.unique' => "Review Already Exist!",
            ]
        );

        Review::create([
            'name'=>Auth::user()->name,
            'message'=>$request->message,
        ]);

        return response()->json([
            'status' => 'success',
        ]);
    }
}
