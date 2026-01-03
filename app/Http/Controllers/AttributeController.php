<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    public function index()
    {
        return Attribute::with('translations','values')->get();
    }

    public function show($id)
    {
        return Attribute::with('translations','values')->findOrFail($id);
    }

    public function store(Request $request)
    {
        $attribute = Attribute::create($request->only(['code','active']));
        return response()->json($attribute,201);
    }

    public function update(Request $request,$id)
    {
        $attribute = Attribute::findOrFail($id);
        $attribute->update($request->only(['code','active']));
        return response()->json($attribute);
    }

    public function destroy($id)
    {
        Attribute::destroy($id);
        return response()->json(['message'=>'Attribute deleted']);
    }
}
