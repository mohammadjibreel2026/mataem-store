<?php

namespace App\Http\Controllers;

use App\Models\AttributeTranslation;
use Illuminate\Http\Request;

class AttributeTranslationController extends Controller
{
    public function index()
    {
        return AttributeTranslation::with('attribute')->get();
    }

    public function store(Request $request)
    {
        $translation = AttributeTranslation::create($request->only(['attribute_id','locale','name']));
        return response()->json($translation,201);
    }

    public function update(Request $request, $id)
    {
        $translation = AttributeTranslation::findOrFail($id);
        $translation->update($request->only(['locale','name']));
        return response()->json($translation);
    }

    public function destroy($id)
    {
        AttributeTranslation::destroy($id);
        return response()->json(['message'=>'Translation deleted']);
    }
}
