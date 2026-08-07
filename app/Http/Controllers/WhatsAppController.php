<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WhatsAppController extends Controller
{



    public function submit(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'project_summary' => 'required',
        ]);

        $services = '';

        if ($request->has('services_needed')) {
            $services = implode(', ', $request->services_needed);
        }

        $message = "Hello Eagle Networks,\n\n";
        $message .= "I'm interested in speaking with your team.\n\n";
        $message .= "Name: {$request->name}\n";
        $message .= "Company: {$request->company}\n";
        $message .= "Package of Interest: {$request->package_interest}\n";
        $message .= "Services Needed: {$services}\n";
        $message .= "Project Summary: {$request->project_summary}\n\n";
        $message .= "Please let me know the next steps.";

        $whatsappNumber = '';

        return redirect()->away(
            "https://wa.me/{$whatsappNumber}?text=" . urlencode($message)
        );
    }
}
