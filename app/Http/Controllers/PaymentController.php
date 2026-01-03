<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        return Payment::with('order')->get();
    }

    public function store(Request $request)
    {
        $payment = Payment::create($request->only(['order_id','method','status','amount']));
        return response()->json($payment,201);
    }

    public function update(Request $request,$id)
    {
        $payment = Payment::findOrFail($id);
        $payment->update($request->only(['status']));
        return response()->json($payment);
    }
}
