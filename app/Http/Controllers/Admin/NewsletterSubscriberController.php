<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsletterSubscriber;
use Illuminate\Http\Request;

class NewsletterSubscriberController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 3); // Default is 5 rows per page
        $subscribers = NewsletterSubscriber::orderBy('id', 'desc')->paginate($perPage);
        return view('admin.newsletter-subscribers', compact('subscribers', 'perPage'));
    }

    public function destroy(NewsletterSubscriber $newsletterSubscriber)
    {
        $newsletterSubscriber->delete();
        return redirect()->back()->with('success', "Content deleted successfully");
    }
}