<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return Order::with(['items.product','user','payment','shipment'])->get();
    }

    public function store(Request $request)
    {
        $order = Order::create($request->only(['user_id','status','total','shipping_address']));
        if($request->items){
            foreach($request->items as $item){
                $order->items()->create($item);
            }
        }
        return response()->json($order,201);
    }

    public function update(Request $request,$id)
    {
        $order = Order::findOrFail($id);
        $order->update($request->only(['status','total','shipping_address']));
        return response()->json($order);
    }

    public function destroy($id)
    {
        Order::destroy($id);
        return response()->json(['message'=>'Order deleted']);
    }
}
