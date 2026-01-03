<?php

namespace App\Http\Controllers;

use App\Models\PageTranslation;
use Illuminate\Http\Request;

class PageTranslationController extends Controller
{
    public function index()
    {
        return PageTranslation::with('page')->get();
    }

    public function store(Request $request)
    {
        $translation = PageTranslation::create($request->only(['page_id','locale','title','content']));
        return response()->json($translation,201);
    }

    public function update(Request $request,$id)
    {
        $translation = PageTranslation::findOrFail($id);
        $translation->update($request->only(['title','content']));
        return response()->json($translation);
    }

    public function destroy($id)
    {
        PageTranslation::destroy($id);
        return response()->json(['message'=>'Page translation deleted']);
    }
}
