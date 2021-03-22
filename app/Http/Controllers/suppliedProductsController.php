<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\Product;
use App\Models\Supply_Product;

class suppliedProductsController extends Controller
{
    // fetch supplies
    public function index()
    {
       $supplies = Supply_Product::join('products','products.id', '=', 'supply__products.product_id')
       ->join('suppliers','suppliers.id','=','supply__products.supplier_id')
       ->get(['products.name as product_name', 'suppliers.name as supplier', 'supply__products.id as id']);
       return $supplies;
    }

    // store supplies
    public function store(Request $request)
    {
        $supplier = $request->supplier_id;
        $product = $request->product_id;
        $check = Supply_Product::where('product_id',$product)->where('supplier_id',$supplier)->get();
       if ($check->count() > 0) {
        return response()->json(['status' => false, 'message' => 'The product alread has a supplier!']);
       } else {
        $supply = Supply_Product::create([
            'product_id' => $product,
            'supplier_id' => $supplier,
        ]);
        if ($supply) {
            return response()->json(['status' => true, 'message' => 'Product supply added Successfully!']);
           } else {
            return response()->json(['status' => false, 'message' => 'Failed to add product supply!']);
           }
       }   
    }


    // show supply bi id
    public function show($id){
          $supply = Supply_Product::where('supply__products.id',$id)
          ->join('products','products.id', '=', 'supply__products.product_id')
          ->join('suppliers','suppliers.id','=','supply__products.supplier_id')
          ->first(['products.name as product', 'products.quantity as quantity','products.description as description', 'suppliers.name as name']);

          return $supply;
    }

    public function destroy($id){
        $supply = Supply_Product::findOrFail($id);
        if($supply->delete()){
            return response()->json(['status' => true, 'message' => 'Supply deleted Successfully!']);
           }else{
            return response()->json(['status' => false, 'message' => 'Failed to delete supply!']);
           }
    }
}
