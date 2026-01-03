<?php

namespace App\Http\Controllers;

use App\Models\OfferTranslation;
use Illuminate\Http\Request;

class OfferTranslationController extends Controller
{
    public function index()
    {
        return OfferTranslation::with('offer')->get();
    }

    public function store(Request $request)
    {
        $translation = OfferTranslation::create($request->only(['offer_id','locale','title','description']));
        return response()->json($translation,201);
    }

    public function update(Request $request,$id)
    {
        $translation = OfferTranslation::findOrFail($id);
        $translation->update($request->only(['title','description']));
        return response()->json($translation);
    }

    public function destroy($id)
    {
        OfferTranslation::destroy($id);
        return response()->json(['message'=>'Offer translation deleted']);
    }
}
