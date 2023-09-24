<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
                'image'=>'required',
                'description' => 'required',
                'type' => 'required',
            ],
            [
                'name.required' => "Name is required!",
                'name.unique' => "Product Already Exist!",
                'price.required' => "Price is required!",
                'image.required' => "Image is required!",
                'description.required' => "Description is required!",
                'type.required' => "Type is required!",
            ]
        );

        //Image Upload

        $imageName = '';
        if ($image = $request->file('image')) {
            $imageName = Str::slug($request->name).'-'.time().'.'.$image->getClientOriginalExtension();
            $image->move('uploads/products',$imageName);
        }

        Product::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name,'-'),
            'price' => $request->price,
            'description' => $request->description,
            'type' => $request->type,
            'image' => $imageName,
        ]);

        return response()->json([
            'status'=>'success',
        ]);
    }

    public function updateProduct(Request $request, $id)
    {
        $request->validate(
            [
                'name' => 'required|unique:products,name,' . $id,
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

        $find=Product::findOrFail($id);

        $data = $request->all();
        $find->update($data);

        return response()->json([
            'status'=>'success'
        ]);
    }

    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id);

        $imagePath = public_path('uploads/products/'.$product->image);
        if (file_exists($imagePath)) {
            unlink($imagePath);

            $product->delete();
            return response()->json([
                'status'=>'success'
            ]);
        }
        else{
            $product->delete();
            return response()->json([
                'status'=>'success'
            ]);
        }
    }

    public function paginationProductAjax(Request $request)
    {
        $products=Product::latest()->paginate(10);
        return view('backend.product.pagination_index', compact('products'))->render();
    }
}
