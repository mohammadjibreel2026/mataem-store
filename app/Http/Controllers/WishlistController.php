<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function show($id)
    {
        return Wishlist::with('items.product')->findOrFail($id);
    }
}
