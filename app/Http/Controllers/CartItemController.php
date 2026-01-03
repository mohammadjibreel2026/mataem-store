<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use Illuminate\Http\Request;

class CartItemController extends Controller
{
    public function store(Request $request)
    {
        $item = CartItem::updateOrCreate(
            ['cart_id'=>$request->cart_id,'product_id'=>$request->product_id],
            ['qty'=>$request->qty]
        );
        return response()->json($item,201);
    }

    public function destroy($id)
    {
        CartItem::destroy($id);
        return response()->json(['message'=>'Cart item deleted']);
    }
}
