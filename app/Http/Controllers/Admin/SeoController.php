<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Seo;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SeoController extends Controller
{
    public function index()
    {
        $seos = Seo::latest()->paginate(15);

        return view('admin.seo.index', compact('seos'));
    }

    public function create()
    {
        return view('admin.seo.form', [
            'seo' => new Seo(),
        ]);
    }



    public function store(Request $request)
    {
        $validated = $request->validate([
            'page_name' => ['required', 'string', 'max:255'],
            'page_url' => [
                'required',
                'string',
                'max:255',
                'regex:/^\/[^\s?#]*$/',
                'unique:seos,page_url',
            ],
            'meta_title' => ['nullable', 'string', 'max:70'],
            'meta_description' => ['nullable', 'string', 'max:170'],
            'meta_keywords' => ['nullable', 'string'],
        ], [
            'page_url.regex' => 'Enter a relative page URL starting with /. Example: /about',
        ]);

        Seo::create($validated);

        return redirect()
            ->route('admin.seo.index')
            ->with('success', 'SEO details added successfully.');
    }

    public function edit(Seo $seo)
    {
        return view('admin.seo.form', compact('seo'));
    }

    public function update(Request $request, Seo $seo)
    {
        $validated = $request->validate([
            'page_name' => ['required', 'string', 'max:255'],
            'page_url' => [
                'required',
                'string',
                'max:255',
                'regex:/^\/[^\s?#]*$/',
                Rule::unique('seos', 'page_url')->ignore($seo->id),
            ],
            'meta_title' => ['nullable', 'string', 'max:70'],
            'meta_description' => ['nullable', 'string', 'max:170'],
            'meta_keywords' => ['nullable', 'string'],
        ], [
            'page_url.regex' => 'Enter a relative page URL starting with /. Example: /about',
        ]);

        $seo->update($validated);

        return redirect()
            ->route('admin.seo.index')
            ->with('success', 'SEO details updated successfully.');
    }

    public function destroy(Seo $seo)
    {
        $seo->delete();

        return redirect()
            ->route('admin.seo.index')
            ->with('success', 'SEO details deleted successfully.');
    }
}