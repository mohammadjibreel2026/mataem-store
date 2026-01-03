<?php

namespace App\Http\Controllers;

use App\Models\ProductReview;
use Illuminate\Http\Request;

class ProductReviewController extends Controller
{
    public function index()
    {
        return ProductReview::with(['product','user'])->get();
    }

    public function store(Request $request)
    {
        $review = ProductReview::create($request->only(['product_id','user_id','rating','comment']));
        return response()->json($review,201);
    }

    public function destroy($id)
    {
        ProductReview::destroy($id);
        return response()->json(['message'=>'Review deleted']);
    }
}
