<?php

namespace App\Http\Controllers;

use App\Models\WishlistItem;
use Illuminate\Http\Request;

class WishlistItemController extends Controller
{
    public function store(Request $request)
    {
        $item = WishlistItem::firstOrCreate($request->only(['wishlist_id','product_id']));
        return response()->json($item,201);
    }

    public function destroy($id)
    {
        WishlistItem::destroy($id);
        return response()->json(['message'=>'Wishlist item deleted']);
    }
}
