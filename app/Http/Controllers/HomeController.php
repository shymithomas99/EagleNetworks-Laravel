<?php

namespace App\Http\Controllers;

use App\Mail\ContactAdminEnquiry;
use App\Models\Contact;
use App\Models\VideoCategory;
use App\Models\VideoProject;
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

    public function work()
    {
        $categories = VideoCategory::orderBy('display_order')->get();

        $videos = VideoProject::with('category')
            ->orderBy('display_order')
            ->get();

        return view('client.work', compact('categories', 'videos'));
    }




    public function submit(Request $request)
    {
        $data =  $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email',
            'team' => 'required|string',
            'service' => 'required|string',
            'package' => 'required|string',
            'message' => 'required|min:10',
        ]);

        // Save to DB
        $contact = Contact::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'team' => $data['team'],
            'service' => $data['service'],
            'package' =>  $data['package'],
            'message' =>  $data['message'],
        ]);

        // ✅ Admin Emails (same as your code)

        $adminEmails = ["shymicams@gmail.com"];
        Mail::to($adminEmails)->send(new ContactAdminEnquiry($contact));

        // Mail::to($data['email'])->send(new CitizenRegistrationUserEnquiry($contentData));

        return redirect()->back()->with('success', 'Form submitted successfully!');
    }
}
