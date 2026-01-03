<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;

class OfferProductController extends Controller
{
    public function updateProducts(Request $request, $offer_id)
    {
        $offer = Offer::findOrFail($offer_id);
        $offer->products()->sync($request->products);
        return response()->json(['message'=>'Products synced with offer']);
    }
}
