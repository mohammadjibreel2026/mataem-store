<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    public function index()
    {
        return ContactMessage::all();
    }

    public function store(Request $request)
    {
        $msg = ContactMessage::create($request->only(['name','email','phone','message']));
        return response()->json($msg,201);
    }

    public function destroy($id)
    {
        ContactMessage::destroy($id);
        return response()->json(['message'=>'Message deleted']);
    }
}
