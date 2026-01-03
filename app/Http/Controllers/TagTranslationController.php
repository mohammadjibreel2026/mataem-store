<?php

namespace App\Http\Controllers;

use App\Models\TagTranslation;
use Illuminate\Http\Request;

class TagTranslationController extends Controller
{
    public function index()
    {
        return TagTranslation::with('tag')->get();
    }

    public function store(Request $request)
    {
        $translation = TagTranslation::create($request->only(['tag_id','locale','name']));
        return response()->json($translation,201);
    }

    public function update(Request $request,$id)
    {
        $translation = TagTranslation::findOrFail($id);
        $translation->update($request->only(['name']));
        return response()->json($translation);
    }

    public function destroy($id)
    {
        TagTranslation::destroy($id);
        return response()->json(['message'=>'Tag translation deleted']);
    }
}
