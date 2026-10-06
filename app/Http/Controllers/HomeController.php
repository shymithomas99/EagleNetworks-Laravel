<?php

namespace App\Http\Controllers;

use App\Enums\BlogContentType;
use App\Mail\ContactAdminEnquiry;
use App\Models\Author;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Contact;
use App\Models\HomePage;
use App\Models\NewsletterSubscriber;
use App\Models\PackagesPage;
use App\Models\ServicesPage;
use App\Models\VideoCategory;
use App\Models\VideoProject;
use App\Models\Work;
use App\Models\WorkCategory;
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
        $homePageRecords = HomePage::query()
            ->where('published', true)
            ->orderBy('display_order')
            ->get()
            ->groupBy(fn ($item) => $item->section . '_' . (int) $item->is_card);

        $banner = $homePageRecords->get('1_0')?->first();
        $serviceIntro = $homePageRecords->get('2_0')?->first();
        $serviceCards = ServicesPage::where('section', 2)
                            ->where('is_card', 1)
                            ->where('published', 1)
                            ->where('featured', 1)
                            ->orderBy('display_order')
                            ->get();
        $c5Intro = $homePageRecords->get('3_0')?->first();
        $c5Cards = $homePageRecords->get('3_1', collect());
        $workIntro = $homePageRecords->get('4_0')?->first();
        $workCards = Work::where('published', 1)
                        ->where('featured', 1)
                        ->whereHas('category', function ($query) {
                            $query->where('published', 1);
                        })
                        ->orderBy('displayOrder')
                        ->get();
        $clientIntro = $homePageRecords->get('5_0')?->first();
        $clientCards = $homePageRecords->get('5_1', collect());
        $ctaBannerIntro = $homePageRecords->get('6_0')?->first();
        $ctaBannerCards = $homePageRecords->get('6_1', collect());
        $packageIntro = $homePageRecords->get('7_0')?->first();
        $packageCards = PackagesPage::where('section', 3)
                            ->where('is_card', 1)
                            ->where('published', 1)
                            ->where('featured', 1)
                            ->orderBy('display_order')
                            ->get();
        $testimonialIntro = $homePageRecords->get('8_0')?->first();
        $testimonialCards = $homePageRecords->get('8_1', collect());
        $valueIntro = $homePageRecords->get('9_0')?->first();
        $valueCards = $homePageRecords->get('9_1', collect());
        $ctaBannerBottom = $homePageRecords->get('10_0')?->first();

        return view('client.home', compact(
            'banner',
            'serviceIntro',
            'serviceCards',
            'c5Intro',
            'c5Cards',
            'workIntro',
            'workCards',
            'clientIntro',
            'clientCards',
            'ctaBannerIntro',
            'ctaBannerCards',
            'packageIntro',
            'packageCards',
            'testimonialIntro',
            'testimonialCards',
            'valueIntro',
            'valueCards',
            'ctaBannerBottom',
        ));
    }

    public function workDetails($slug)
    {
        // $work = Work::where('slug', $slug)
        //     ->where('published', 1)
        //     ->firstOrFail();

        $work = Work::with('galleries')
            ->where('published', 1)
            ->whereHas('category', function ($query) {
                $query->where('published', 1);
            })
            ->where('slug', $slug)
            ->firstOrFail();

        return view('client.details', compact('work'));
    }




    public function submit(Request $request)
    {
        /*
    |--------------------------------------------------------------------------
    | Honeypot Check
    |--------------------------------------------------------------------------
    */

        if ($request->filled('username')) {

            return response()->json([
                'success' => false,
                'message' => 'Unable to submit your enquiry. Please try again.',
            ], 422);
        }


        /*
    |--------------------------------------------------------------------------
    | Laravel Validation
    |--------------------------------------------------------------------------
    */

        $validator = validator($request->all(), [

            'name' => [
                'required',
                'string',
                'max:100',
            ],

            'email' => [
                'required',
                'email',
                'regex:/^[^@\s]+@[^@\s]+\.[^@\s]+$/',
                'max:255',
            ],

            'team' => [
                'required',
                'in:London,Accra,General',
            ],

            'service' => [
                'required',
                'in:Creative Production,Marketing & Consultancy,Tech Solutions,Outsourced Customer Service,EMTV Portal,General Enquiry',
            ],

            'package' => [
                'nullable',
                'in:None,Ignite,Amplify,Connect',
            ],

            'message' => [
                'required',
                'string',

            ],

        ], [

            'name.required' => 'Please enter your name.',

            'email.required' => 'Please enter your email address.',
            'email.email' => 'Please enter a valid email address.',

            'team.required' => 'Please select a team.',

            'service.required' => 'Please select a service.',

            'message.required' => 'Please enter your message.',
            'message.min' => 'Your message must be at least 10 characters.',

        ]);


        if ($validator->fails()) {

            return response()->json([
                'success' => false,
                'errors' => $validator->errors()->toArray(),
            ], 422);
        }


        /*
    |--------------------------------------------------------------------------
    | Get Validated Data
    |--------------------------------------------------------------------------
    */

        $data = $validator->validated();


        /*
    |--------------------------------------------------------------------------
    | Save Contact
    |--------------------------------------------------------------------------
    */

        $contact = Contact::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'team' => $data['team'],
            'service' => $data['service'],
            'package' => $data['package'] ?? 'None',
            'message' => $data['message'],
        ]);


        /*
    |--------------------------------------------------------------------------
    | Send Admin Email
    |--------------------------------------------------------------------------
    */

        $adminEmails = [
            'shymicams@gmail.com','ama@theemhglobal.com'
        ];

        Mail::to($adminEmails)->send(
            new ContactAdminEnquiry($contact)
        );


        /*
    |--------------------------------------------------------------------------
    | Success Response
    |--------------------------------------------------------------------------
    */

        return response()->json([
            'success' => true,
            'message' => 'Thank you. Your message has been sent successfully.',
        ]);
    }


    public function media()
    {
        $categories = VideoCategory::orderBy('display_order', 'asc')
            ->where('published', 1)
            ->get();

        $videos = VideoProject::where('published', 1)
            ->whereHas('category', function ($query) {
                $query->where('published', 1);
            })
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


    public function blogs()
    {
        $blogs = Blog::with([
                'author'
            ])
            ->where('published', true)
            ->whereHas('category', function ($query) {
                $query->where('published', true);
            })
            ->latest()
            ->get();
        $categories = BlogCategory::where('published', true)
                    ->orderByDesc('id')
                    ->get();

        $contentTypes = BlogContentType::cases();

        return view('client.blogs.index', compact(
            'blogs',
            'categories',
            'contentTypes'
        ));
    }
    
    public function services()
    {
        $works = Work::where('published', 1)
            ->where('featured', 1)
            ->whereHas('category', function ($query) {
                $query->where('published', 1);
            })
            ->orderBy('displayOrder', 'asc')
            ->get();

        return view('client.services', compact(
            'works'
        ));
    }
}