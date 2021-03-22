<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;

class supplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::all();
        return $suppliers;
    }

// Save supplier to databse
    public function store(Request $request)
    {
        $supplier = Supplier::create([
            'name' => $request->name,
        ]);

        if ($supplier) {
            return response()->json(['status' => true, 'message' => 'Supplier added Successfully!']);
        } else {
            return response()->json(['status' => false, 'message' => 'Failed to add supplier!']);
        }
        
    }

// Show supplier
    public function show($id)
    {
        $supplier = Supplier::find($id);
        return $supplier;
    }

// update supplier
    public function update(Request $request, $id)
    {
        $supplier = Supplier::findOrFail($id);
        $supplier->update([
            'name' => $request->name,
        ]);

        if ($supplier) {
            return response()->json(['status' => true, 'message' => 'Supplier updated Successfully!']);
        } else {
            return response()->json(['status' => false, 'message' => 'Failed to update supplier!']);
        }
    }

    // delete supplier
    public function destroy($id){
        $supplier = Supplier::findOrFail($id);
        if($supplier->delete()){
         return response()->json(['status' => true, 'message' => 'Supplier deleted Successfully!']);
        }else{
         return response()->json(['status' => false, 'message' => 'Failed to delete supplier!']);
        }
    }
}
