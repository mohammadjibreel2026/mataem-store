<?php

namespace App\Http\Controllers;

use App\Models\Shipment;
use App\Models\ShippingCompany;
use Illuminate\Http\Request;

class ShipmentController extends Controller
{
    public function index()
    {
        return Shipment::with('order','company')->get();
    }

    public function store(Request $request)
    {
        $shipment = Shipment::create($request->only(['order_id','company_id','tracking_number','status']));
        return response()->json($shipment,201);
    }

    public function update(Request $request,$id)
    {
        $shipment = Shipment::findOrFail($id);
        $shipment->update($request->only(['status','tracking_number']));
        return response()->json($shipment);
    }
}
