<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        return Menu::with('items.translations')->get();
    }

    public function store(Request $request)
    {
        $menu = Menu::create($request->only(['position','active']));
        return response()->json($menu,201);
    }

    public function update(Request $request,$id)
    {
        $menu = Menu::findOrFail($id);
        $menu->update($request->only(['position','active']));
        return response()->json($menu);
    }

    public function destroy($id)
    {
        Menu::destroy($id);
        return response()->json(['message'=>'Menu deleted']);
    }
}
