<?php

namespace App\Http\Controllers;

use App\Models\CourierApplication;
use Illuminate\Http\Request;

class CourierApplicationController extends Controller
{
    public function index()
    {
        return CourierApplication::all();
    }

    public function store(Request $request)
    {
        $app = CourierApplication::create($request->only(['name','phone','city','vehicle_type','status']));
        return response()->json($app,201);
    }

    public function update(Request $request,$id)
    {
        $app = CourierApplication::findOrFail($id);
        $app->update($request->only(['status']));
        return response()->json($app);
    }

    public function destroy($id)
    {
        CourierApplication::destroy($id);
        return response()->json(['message'=>'Application deleted']);
    }
}
