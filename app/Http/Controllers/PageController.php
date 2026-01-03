<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return Page::with('translations')->get();
    }

    public function store(Request $request)
    {
        $page = Page::create($request->only(['slug','active']));
        if($request->translations){
            foreach($request->translations as $locale=>$data){
                $page->translations()->create([
                    'locale'=>$locale,
                    'title'=>$data['title'],
                    'content'=>$data['content'] ?? null
                ]);
            }
        }
        return response()->json($page,201);
    }

    public function update(Request $request,$id)
    {
        $page = Page::findOrFail($id);
        $page->update($request->only(['slug','active']));
        return response()->json($page);
    }

    public function destroy($id)
    {
        Page::destroy($id);
        return response()->json(['message'=>'Page deleted']);
    }
}
