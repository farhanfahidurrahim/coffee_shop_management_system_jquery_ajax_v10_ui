<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products=Product::latest()->paginate(10);
        return view('backend.product.index', compact('products'));
    }

    public function storeProduct(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|unique:products',
                'price' => 'required',
                'description' => 'required',
                'type' => 'required',
            ],
            [
                'name.required' => "Name is required!",
                'name.unique' => "Product Already Exist!",
                'price.required' => "Price is required!",
                'description.required' => "Description is required!",
                'type.required' => "Type is required!",
            ]
        );

        $data=$request->all();
        Product::create($data);

        return response()->json([
            'status'=>'success',
        ]);
    }
}
