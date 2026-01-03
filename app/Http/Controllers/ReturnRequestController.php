<?php

namespace App\Http\Controllers;

use App\Models\ReturnRequest;
use Illuminate\Http\Request;

class ReturnRequestController extends Controller
{
    public function index()
    {
        return ReturnRequest::with('order','user','items')->get();
    }

    public function store(Request $request)
    {
        $rr = ReturnRequest::create($request->only(['order_id','user_id','reason','status']));
        return response()->json($rr,201);
    }

    public function update(Request $request,$id)
    {
        $rr = ReturnRequest::findOrFail($id);
        $rr->update($request->only(['status']));
        return response()->json($rr);
    }

    public function destroy($id)
    {
        ReturnRequest::destroy($id);
        return response()->json(['message'=>'Return request deleted']);
    }
}
