<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class productController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return $products;
    }

// Save product to databse
    public function store(Request $request)
    {
        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'quantity' => $request->quantity,
        ]);

        if ($product) {
            return response()->json($product);
            // return response()->json(['status' => true, 'message' => 'Product added Successfully!']);
        } else {
            return response()->json(['status' => false, 'message' => 'Failed to add product!']);
        }
        
    }

// Show product
    public function show($id)
    {
        $product = Product::find($id);
        return $product;
    }

// update product
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        
        $updated_product = $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'quantity' => $request->quantity
        ]);

        if ($updated_product) {
            return response()->json(['status' => true, 'message' => 'Product updated Successfully!']);
        } else {
            return response()->json(['status' => false, 'message' => 'Failed to update product!']);
        }
    }

    // delete product
    public function destroy($id){
        $product = Product::findOrFail($id);
        if($product->delete()){
         return response()->json(['status' => true, 'message' => 'Product deleted Successfully!']);
        }else{
         return response()->json(['status' => false, 'message' => 'Failed to delete product!']);
        }
    }
}
