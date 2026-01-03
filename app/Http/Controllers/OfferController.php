<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function index()
    {
        return Offer::with('translations','products')->get();
    }

    public function store(Request $request)
    {
        $offer = Offer::create($request->only(['slug','active','starts_at','ends_at']));
        if($request->products){
            $offer->products()->sync($request->products);
        }
        return response()->json($offer,201);
    }

    public function update(Request $request,$id)
    {
        $offer = Offer::findOrFail($id);
        $offer->update($request->only(['slug','active','starts_at','ends_at']));
        if($request->products){
            $offer->products()->sync($request->products);
        }
        return response()->json($offer);
    }

    public function destroy($id)
    {
        Offer::destroy($id);
        return response()->json(['message'=>'Offer deleted']);
    }
}
