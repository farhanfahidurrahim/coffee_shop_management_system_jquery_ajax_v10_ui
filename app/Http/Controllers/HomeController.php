<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
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
}
