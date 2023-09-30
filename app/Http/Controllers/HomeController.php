<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

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
}
