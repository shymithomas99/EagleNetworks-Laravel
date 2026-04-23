<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

        $totalLeads = Contact::count();
        return view('admin.dashboard', compact('totalLeads'));
    }
}