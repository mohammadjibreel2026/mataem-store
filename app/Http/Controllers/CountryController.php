<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index()
    {
        return Country::with('translations')->get();
    }

    public function show($id)
    {
        return Country::with('translations','products')->findOrFail($id);
    }

    public function store(Request $request)
    {
        $country = Country::create($request->only(['code','active']));
        return response()->json($country,201);
    }

    public function update(Request $request,$id)
    {
        $country = Country::findOrFail($id);
        $country->update($request->only(['code','active']));
        return response()->json($country);
    }

    public function destroy($id)
    {
        Country::destroy($id);
        return response()->json(['message'=>'Country deleted']);
    }
}
