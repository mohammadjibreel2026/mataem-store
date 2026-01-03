<?php

namespace App\Http\Controllers;

use App\Models\ProductTranslation;
use Illuminate\Http\Request;

class ProductTranslationController extends Controller
{
    public function index()
    {
        return ProductTranslation::with('product')->get();
    }

    public function store(Request $request)
    {
        $translation = ProductTranslation::create($request->only(['product_id','locale','name','description']));
        return response()->json($translation,201);
    }

    public function update(Request $request,$id)
    {
        $translation = ProductTranslation::findOrFail($id);
        $translation->update($request->only(['name','description']));
        return response()->json($translation);
    }

    public function destroy($id)
    {
        ProductTranslation::destroy($id);
        return response()->json(['message'=>'Product translation deleted']);
    }
}
