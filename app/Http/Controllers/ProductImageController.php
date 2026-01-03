<?php

namespace App\Http\Controllers;

use App\Models\ProductImage;
use Illuminate\Http\Request;

class ProductImageController extends Controller
{
    public function index()
    {
        return ProductImage::with('product')->get();
    }

    public function store(Request $request)
    {
        $image = ProductImage::create($request->only(['product_id','image_path','is_primary']));
        return response()->json($image,201);
    }

    public function destroy($id)
    {
        ProductImage::destroy($id);
        return response()->json(['message'=>'Product image deleted']);
    }
}
