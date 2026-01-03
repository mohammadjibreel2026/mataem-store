<?php

namespace App\Http\Controllers;

use App\Models\CountryTranslation;
use Illuminate\Http\Request;

class CountryTranslationController extends Controller
{
    public function index()
    {
        return CountryTranslation::with('country')->get();
    }

    public function store(Request $request)
    {
        $translation = CountryTranslation::create($request->only(['country_id','locale','name']));
        return response()->json($translation,201);
    }

    public function update(Request $request,$id)
    {
        $translation = CountryTranslation::findOrFail($id);
        $translation->update($request->only(['name']));
        return response()->json($translation);
    }

    public function destroy($id)
    {
        CountryTranslation::destroy($id);
        return response()->json(['message'=>'Translation deleted']);
    }
}
