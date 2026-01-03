<?php

namespace App\Http\Controllers;

use App\Models\ProductAttributeValue;
use Illuminate\Http\Request;

class ProductAttributeValueController extends Controller
{
    public function index()
    {
        return ProductAttributeValue::with(['product','attribute'])->get();
    }

    public function store(Request $request)
    {
        $value = ProductAttributeValue::create($request->only(['product_id','attribute_id','value']));
        return response()->json($value,201);
    }

    public function destroy($id)
    {
        ProductAttributeValue::destroy($id);
        return response()->json(['message'=>'Attribute value deleted']);
    }
}
