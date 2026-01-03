<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return Product::with(['translations','images','brand','category','tags','offers','reviews'])->get();
    }

    public function show($id)
    {
        return Product::with(['translations','images','brand','category','tags','offers','reviews'])->findOrFail($id);
    }

    public function store(Request $request)
    {
        $product = Product::create($request->only([
            'category_id','brand_id','country_id','sku','price','sale_price','stock','is_featured','active'
        ]));

        if($request->translations){
            foreach($request->translations as $locale => $data){
                $product->translations()->create([
                    'locale'=>$locale,
                    'name'=>$data['name'],
                    'description'=>$data['description'] ?? null
                ]);
            }
        }

        if($request->images){
            foreach($request->images as $img){
                $product->images()->create([
                    'image_path'=>$img,
                    'is_primary'=>false
                ]);
            }
        }

        return response()->json($product,201);
    }

    public function update(Request $request,$id)
    {
        $product = Product::findOrFail($id);
        $product->update($request->only([
            'category_id','brand_id','country_id','sku','price','sale_price','stock','is_featured','active'
        ]));

        if($request->translations){
            foreach($request->translations as $locale => $data){
                $product->translations()->updateOrCreate(
                    ['locale'=>$locale],
                    ['name'=>$data['name'],'description'=>$data['description'] ?? null]
                );
            }
        }

        return response()->json($product);
    }

    public function destroy($id)
    {
        Product::destroy($id);
        return response()->json(['message'=>'Product deleted']);
    }
}
