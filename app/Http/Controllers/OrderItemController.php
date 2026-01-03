<?php

namespace App\Http\Controllers;

use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{
    public function destroy($id)
    {
        OrderItem::destroy($id);
        return response()->json(['message'=>'Order item deleted']);
    }
}
