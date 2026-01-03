<?php

namespace App\Http\Controllers;

use App\Models\CategoryTranslation;
use Illuminate\Http\Request;

class CategoryTranslationController extends Controller
{
    public function index()
    {
        return CategoryTranslation::with('category')->get();
    }

    public function store(Request $request)
    {
        $translation = CategoryTranslation::create($request->only(['category_id','locale','name','description']));
        return response()->json($translation,201);
    }

    public function update(Request $request,$id)
    {
        $translation = CategoryTranslation::findOrFail($id);
        $translation->update($request->only(['name','description']));
        return response()->json($translation);
    }

    public function destroy($id)
    {
        CategoryTranslation::destroy($id);
        return response()->json(['message'=>'Category translation deleted']);
    }
}
