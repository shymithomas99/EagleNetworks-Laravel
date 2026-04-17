<?php

namespace App\Http\Controllers;

use App\Mail\ContactAdminEnquiry;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('client.home');
    }



    public function submit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email',
            'message' => 'required|min:10',
        ]);

        // Save to DB
        $contact = Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'team' => $request->team,
            'service' => $request->service,
            'package' => $request->package,
            'message' => $request->message,
        ]);

        // ✅ Admin Emails (same as your code)
        $adminEmails = ["shymicams@gmail.com"];

        Mail::to($adminEmails)->send(
            new ContactAdminEnquiry($contact)
        );

        // OPTIONAL: Send to user
        /*
    Mail::to($contact->email)->send(
        new ContactUserConfirmation($contact)
    );
    */

        return redirect()->back()->with('success', 'Form submitted successfully!');
    }
}