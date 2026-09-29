<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Contact;
use App\Models\VideoProject;
use App\Models\Work;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

        $totalLeads = Contact::count();
        $totalWorks = Work::count();
        $totalBlogs = Blog::count();
        $totalVideos = VideoProject::count();

        return view('admin.dashboard', compact('totalLeads', 'totalWorks', 'totalBlogs', 'totalVideos'));
    }
}