<?php

namespace App\Http\Controllers;

use App\Models\ProductComparison;
use Illuminate\Http\Request;

class ProductComparisonController extends Controller
{
    public function index()
    {
        return ProductComparison::with(['user','product1','product2'])->get();
    }

    public function store(Request $request)
    {
        $comp = ProductComparison::create($request->only(['user_id','product_id_1','product_id_2']));
        return response()->json($comp,201);
    }

    public function destroy($id)
    {
        ProductComparison::destroy($id);
        return response()->json(['message'=>'Comparison deleted']);
    }
}
