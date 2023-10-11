<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::orderBy('id','desc')->get();
        return view('backend.order.index', compact('orders'));
    }

    public function changeOrderStatus(Request $request)
    {
        $statusChange = Order::find($request->order_id);
        $statusChange->status = $request->status;
        $statusChange->save();

        return response()->json([
            'success' => "Status change successfully!"
        ]);
    }

    public function deleteOrder($id)
    {
        $order = Order::findOrFail($id);

        $order->delete();
        return response()->json([
            'status'=>'success'
        ]);
    }
}
