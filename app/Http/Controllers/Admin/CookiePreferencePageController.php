<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CookiePreferencePage;
use Illuminate\Http\Request;

class CookiePreferencePageController extends Controller
{
    public function edit()
    {
        $cookiePage = CookiePreferencePage::first();

        if (!$cookiePage) {
            $cookiePage = new CookiePreferencePage([
                'title' => 'Cookie Preferences',

                'description' => 'Choose which cookies you allow us to use. Essential cookies cannot be disabled as they are required for the site to function.',

                'privacy_policy_text' => 'Privacy Policy',
                'privacy_policy_url' => '/privacy-policy',

                'essential_title' => 'Essential Cookies',
                'essential_badge' => 'Always Active',
                'essential_description' => 'Required for the website to function. Includes session management and security cookies. These cannot be disabled.',

                'analytics_title' => 'Analytics Cookies',
                'analytics_description' => 'Helps us understand how visitors use the site (page views, traffic sources). Data is aggregated and anonymised. Provided by Ahrefs and Umami Analytics.',

                'reject_button_text' => 'Reject All',
                'accept_button_text' => 'Accept All',
                'save_button_text' => 'Save Preferences',

                'published' => true,
            ]);
        }

        return view('admin.cookie-preference-page.edit', compact('cookiePage'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'title' => ['nullable', 'string', 'max:255'],

            'description' => ['nullable', 'string'],
            'privacy_policy_text' => ['nullable', 'string', 'max:255'],
            'privacy_policy_url' => ['nullable', 'string', 'max:500'],

            'essential_title' => ['nullable', 'string', 'max:255'],
            'essential_badge' => ['nullable', 'string', 'max:255'],
            'essential_description' => ['nullable', 'string'],

            'analytics_title' => ['nullable', 'string', 'max:255'],
            'analytics_description' => ['nullable', 'string'],

            'reject_button_text' => ['nullable', 'string', 'max:255'],
            'accept_button_text' => ['nullable', 'string', 'max:255'],
            'save_button_text' => ['nullable', 'string', 'max:255'],

            'published' => ['nullable', 'boolean'],
        ]);

        $validated['published'] = $request->boolean('published');

        $cookiePage = CookiePreferencePage::first();

        if ($cookiePage) {
            $cookiePage->update($validated);
        } else {
            CookiePreferencePage::create($validated);
        }

        return redirect()
            ->route('admin.cookie-preference-page.edit')
            ->with('success', 'Cookie preferences updated successfully.');
    }
}
