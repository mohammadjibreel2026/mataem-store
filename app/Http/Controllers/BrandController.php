<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\BrandTranslation;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        return Brand::with('translations','products')->get();
    }

    public function show($id)
    {
        return Brand::with('translations','products')->findOrFail($id);
    }

    public function store(Request $request)
    {
        $brand = Brand::create($request->only(['slug','logo','active']));
        if($request->translations){
            foreach($request->translations as $locale=>$data){
                BrandTranslation::create([
                    'brand_id'=>$brand->id,
                    'locale'=>$locale,
                    'name'=>$data['name']
                ]);
            }
        }
        return response()->json($brand,201);
    }

    public function update(Request $request, $id)
    {
        $brand = Brand::findOrFail($id);
        $brand->update($request->only(['slug','logo','active']));
        return response()->json($brand);
    }

    public function destroy($id)
    {
        Brand::destroy($id);
        return response()->json(['message'=>'Brand deleted']);
    }
}
