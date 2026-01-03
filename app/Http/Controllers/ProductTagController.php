<?php

namespace App\Http\Controllers;

use App\Models\ProductTag;
use Illuminate\Http\Request;

class ProductTagController extends Controller
{
    public function index()
    {
        return ProductTag::with(['product','tag'])->get();
    }

    public function store(Request $request)
    {
        $pt = ProductTag::firstOrCreate($request->only(['product_id','tag_id']));
        return response()->json($pt,201);
    }

    public function destroy($id)
    {
        ProductTag::destroy($id);
        return response()->json(['message'=>'Product tag removed']);
    }
}
