<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\Order_detail;

class orderDetailsController extends Controller
{
    // fetch order details
    public function index()
    {
        $details = Order_detail::join('products','products.id', '=', 'order_details.product_id')
        ->join('orders','orders.id','=','order_details.order_id')
        ->get(['products.name as product_name', 'orders.order_number as order_no', 'order_details.id as detail_id']); 
        return $details;
    }

//  store orders details
    public function store(Request $request)
    {
        $order = $request->order_id;
        $product = $request->product_id;
        
        $detail = Order_detail::create([
            'order_id' => $order,
            'product_id' => $product,
        ]);
        if ($detail) {
            return response()->json(['status' => true, 'message' => 'Order detail added Successfully!']);
           } else {
            return response()->json(['status' => false, 'message' => 'Failed to add order detail!']);
           }
       
    }

    // fetch order detail by id
    public function show($id)
    {
        $detail = Order_detail::where('order_details.id',$id)
        ->join('products','products.id', '=', 'order_details.product_id')
        ->join('orders','orders.id','=','order_details.order_id')
        ->first();
        return $detail;
    }

    // delete order detail
    public function destroy($id)
    {
        $detail = Order_detail::findOrFail($id);
        if($detail->delete()){
            return response()->json(['status' => true, 'message' => 'Order detail deleted Successfully!']);
           }else{
            return response()->json(['status' => false, 'message' => 'Failed to delete order detail!']);
           }
    }
}
