<?php

namespace App\Http\Controllers;

use App\Models\MenuItem;
use Illuminate\Http\Request;

class MenuItemController extends Controller
{
    public function index()
    {
        return MenuItem::with('translations','children')->get();
    }

    public function store(Request $request)
    {
        $item = MenuItem::create($request->only(['menu_id','parent_id','type','link','sort_order','active']));
        return response()->json($item,201);
    }

    public function update(Request $request,$id)
    {
        $item = MenuItem::findOrFail($id);
        $item->update($request->only(['type','link','sort_order','active']));
        return response()->json($item);
    }

    public function destroy($id)
    {
        MenuItem::destroy($id);
        return response()->json(['message'=>'Menu item deleted']);
    }
}
