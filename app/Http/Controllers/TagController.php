<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        return Tag::with('translations','products')->get();
    }

    public function store(Request $request)
    {
        $tag = Tag::create();
        if($request->translations){
            foreach($request->translations as $locale=>$data){
                $tag->translations()->create([
                    'locale'=>$locale,
                    'name'=>$data['name']
                ]);
            }
        }
        return response()->json($tag,201);
    }

    public function destroy($id)
    {
        Tag::destroy($id);
        return response()->json(['message'=>'Tag deleted']);
    }
}
