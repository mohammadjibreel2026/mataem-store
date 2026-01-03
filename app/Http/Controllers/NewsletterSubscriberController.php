<?php

namespace App\Http\Controllers;

use App\Models\NewsletterSubscriber;
use Illuminate\Http\Request;

class NewsletterSubscriberController extends Controller
{
    public function index()
    {
        return NewsletterSubscriber::all();
    }

    public function store(Request $request)
    {
        $subscriber = NewsletterSubscriber::create($request->only(['email','accepted_privacy']));
        return response()->json($subscriber,201);
    }

    public function destroy($id)
    {
        NewsletterSubscriber::destroy($id);
        return response()->json(['message'=>'Subscriber deleted']);
    }
}
