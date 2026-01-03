<?php

namespace App\Http\Controllers;

use App\Models\BrandTranslation;
use Illuminate\Http\Request;

class BrandTranslationController extends Controller
{
    public function index()
    {
        return BrandTranslation::with('brand')->get();
    }

    public function store(Request $request)
    {
        $translation = BrandTranslation::create($request->only(['brand_id','locale','name']));
        return response()->json($translation,201);
    }

    public function update(Request $request,$id)
    {
        $translation = BrandTranslation::findOrFail($id);
        $translation->update($request->only(['locale','name']));
        return response()->json($translation);
    }

    public function destroy($id)
    {
        BrandTranslation::destroy($id);
        return response()->json(['message'=>'Translation deleted']);
    }
}
