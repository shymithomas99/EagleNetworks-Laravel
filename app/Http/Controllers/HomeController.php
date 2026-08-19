<?php

namespace App\Http\Controllers;

use App\Enums\BlogContentType;
use App\Mail\ContactAdminEnquiry;
use App\Models\Author;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Contact;
use App\Models\NewsletterSubscriber;
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

    public function home()
    {
        $works = Work::where('published', 1)
            ->where('featured', 1)
            ->whereHas('category', function ($query) {
                $query->where('published', 1);
            })
            ->orderBy('displayOrder', 'asc')
            ->get();

        return view('client.home', compact(
            'works'
        ));
    }

    public function work()
    {
        $videos = VideoProject::where('published', 1)
            ->whereHas('category', function ($query) {
                $query->where('published', 1);
            })
            ->orderBy('display_order', 'desc')
            ->limit(4)
            ->get();

        $videoCount = VideoProject::where('published', 1)->count();

        $workCategories = WorkCategory::where('published', 1)->get();

        $works = Work::where('published', 1)
            ->whereHas('category', function ($query) {
                $query->where('published', 1);
            })
            ->orderBy('displayOrder', 'asc')
            ->get();

        return view('client.work', compact(
            'videos',
            'videoCount',
            'workCategories',
            'works'
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
            'shymicams@gmail.com',
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
                ->whereHas('blogs', function ($query) {
                    $query
                        ->where('content_type', BlogContentType::LINKEDIN->value)
                        ->where('published', true);
                })
                ->orderByDesc('id')
                ->get();

        $contentTypes = BlogContentType::cases();

        return view('client.blogs.index', compact(
            'blogs',
            'categories',
            'contentTypes'
        ));
    }

    public function showBlog(Blog $blog)
    {
        abort_unless(
            $blog->published &&
            $blog->category()->where('published', true)->exists(),
            404
        );

        $blog->load([
            'author',
            'category',
        ]);

        return view('client.blogs.show', compact('blog'));
    }

    public function showAuthor(Author $author)
    {
        $author->load([
            'blogs' => function ($query) {
                $query
                    ->where('published', true)
                    ->whereHas('category', function ($query) {
                        $query->where('published', true);
                    })
                    ->latest();
            },
        ]);

        return view('client.blogs.author', compact('author'));
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