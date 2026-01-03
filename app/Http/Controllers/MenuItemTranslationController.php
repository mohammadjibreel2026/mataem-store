<?php

namespace App\Http\Controllers;

use App\Models\MenuItemTranslation;
use Illuminate\Http\Request;

class MenuItemTranslationController extends Controller
{
    public function index()
    {
        return MenuItemTranslation::with('menuItem')->get();
    }

    public function store(Request $request)
    {
        $translation = MenuItemTranslation::create($request->only(['menu_item_id','locale','title']));
        return response()->json($translation,201);
    }

    public function update(Request $request,$id)
    {
        $translation = MenuItemTranslation::findOrFail($id);
        $translation->update($request->only(['title']));
        return response()->json($translation);
    }

    public function destroy($id)
    {
        MenuItemTranslation::destroy($id);
        return response()->json(['message'=>'Translation deleted']);
    }
}
