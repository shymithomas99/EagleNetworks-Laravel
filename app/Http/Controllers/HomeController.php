<?php

namespace App\Http\Controllers;

use App\Mail\ContactAdminEnquiry;
use App\Models\Contact;
use App\Models\NewsletterSubscriber;
use App\Models\VideoCategory;
use App\Models\VideoProject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{

    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index()
    {
        return view('client.home');
    }

    public function work()
    {
        $categories = VideoCategory::orderBy('display_order', 'desc')->get();

        $videos = VideoProject::with('category')
            ->orderBy('display_order', 'desc')
            ->limit(4)
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


    public function media()
    {
        $categories = VideoCategory::orderBy('display_order', 'asc')->get();

        $videos = VideoProject::with('category')
            ->orderBy('display_order', 'asc')
            ->get();

        return view('client.media', compact('categories', 'videos'));
    }




    public function newsletterSubscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:255'
        ]);

        // $exists = NewsletterSubscriber::where('email', $request->email)->first();

        $exists = NewsletterSubscriber::query()
            ->where('email', $request->email)
            ->first();

        if ($exists) {
            return redirect()->back()
                ->with('error', 'This email is already subscribed.');
        }

        NewsletterSubscriber::create([
            'email' => $request->email,
            'status' => 1
        ]);

        return redirect()->back()
            ->with('success', 'Thank you for subscribing to our newsletter.');
    }


    public function insights()
    {


        return view('client.insights');
    }
}
