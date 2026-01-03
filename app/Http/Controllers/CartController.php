<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function show($id)
    {
        return Cart::with('items.product')->findOrFail($id);
    }
}
