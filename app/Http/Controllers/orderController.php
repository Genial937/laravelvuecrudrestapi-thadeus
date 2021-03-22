<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class orderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return $orders;
    }

// Save order to databse
    public function store(Request $request)
    {
        $order = Order::create([
            'order_number' => $request->order_no,
        ]);

        if ($order) {
            return response()->json(['status' => true, 'message' => 'Order added Successfully!']);
        } else {
            return response()->json(['status' => false, 'message' => 'Failed to add order!']);
        }
        
    }

// Show order
    public function show($id)
    {
        $order = Order::find($id);
        return $order;
    }

// update order
    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->update([
            'order_number' => $request->order_no,
        ]);

        if ($order) {
            return response()->json(['status' => true, 'message' => 'Order updated Successfully!']);
        } else {
            return response()->json(['status' => false, 'message' => 'Failed to update order!']);
        }
    }

    // delete order
    public function destroy($id){
        $order = Order::findOrFail($id);
        if($order->delete()){
         return response()->json(['status' => true, 'message' => 'Order deleted Successfully!']);
        }else{
         return response()->json(['status' => false, 'message' => 'Failed to delete order!']);
        }
    }
}
