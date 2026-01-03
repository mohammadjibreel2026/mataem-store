<?php

namespace App\Http\Controllers;

use App\Models\ShippingCompany;
use Illuminate\Http\Request;

class ShippingCompanyController extends Controller
{
    public function index()
    {
        return ShippingCompany::with('shipments')->get();
    }

    public function store(Request $request)
    {
        $company = ShippingCompany::create($request->only(['name','active']));
        return response()->json($company,201);
    }

    public function update(Request $request,$id)
    {
        $company = ShippingCompany::findOrFail($id);
        $company->update($request->only(['name','active']));
        return response()->json($company);
    }

    public function destroy($id)
    {
        ShippingCompany::destroy($id);
        return response()->json(['message'=>'Shipping company deleted']);
    }
}
