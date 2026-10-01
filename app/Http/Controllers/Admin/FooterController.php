<?php

namespace App\Http\Controllers\Admin;

use App\Enums\SocialMedia;
use App\Http\Controllers\Controller;
use App\Models\Footer;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class FooterController extends Controller
{
    private function getTitle($section)
    {
        return match ((int) $section) {
                        1 => 'Company Blurb',
                        2 => 'Company',
                        3 => 'London',
                        4 => 'Accra',
                        5 => 'Connect',
                        6 => 'Legal',
                        7 => 'Newsletter',
                        8 => 'Copyright',
                    };
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, $section, $is_link)
    {
        abort_unless($is_link === '1', 404);
        abort_if(
            in_array($section, ['1', '3', '4', '7', '8'], true),
            404
        );
        $title = $this->getTitle($section) . ' Links';
 
        $search = $request->input('search', '');
 
        $collections = Footer::query()
            ->when($search, function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%');
            })
            ->where('section', $section)
            ->where('is_link', 1)
            ->latest('id')
            ->simplePaginate(20)
            ->withQueryString();
 
        return view('admin.footer.index', compact(
            'section',
            'is_link',
            'title',
            'collections',
            'search'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($section, $is_link)
    {
        abort_unless($is_link === '1', 404);
        abort_if(
            in_array($section, ['1', '3', '4', '7', '8'], true),
            404
        );
        $title = 'Add ' . $this->getTitle($section) . ' Link';
 
        $footer = new Footer();
 
        return view('admin.footer.form', compact(
            'section',
            'is_link',
            'title',
            'footer',
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $section, $is_link)
    {
        abort_unless($is_link === '1', 404);
        abort_if(
            in_array($section, ['1', '3', '4', '7', '8'], true),
            404
        );

        $validated = $request->validate([
            'text' => [in_array($section, [1, 2, 6, 7, 8]) ? 'required' : 'nullable', 'string'],
            'company_name' => [in_array($section, [3, 4]) ? 'required' : 'nullable', 'string'],
            'address' => [in_array($section, [3, 4]) ? 'required' : 'nullable', 'string'],
            'phone_1' => [in_array($section, [3, 4]) ? 'required' : 'nullable', 'string'],
            'phone_2' => ['nullable', 'string'],
            'email' => [in_array($section, [3, 4]) ? 'required' : 'nullable', 'email'],
            'social_media' => [$section === '5' ? 'required' : 'nullable', Rule::enum(SocialMedia::class)],
            'link_type' => [$section === '6' ? 'required' : 'nullable', 'string'],
            'url' => [in_array($section, [2, 5]) || ($section === '6' && $request->link_type === '1') ? 'required' : 'nullable', 'url'],
            'description' => [$section === '7' ? 'required' : 'nullable', 'string'],
            'privacy_text' => ['nullable', 'string'],
            'published' => ['nullable', 'boolean'],
            'display_order' => [$is_link ? 'required' : 'nullable', 'integer', 'min:0'],
        ]);

        $validated['published'] = $request->boolean('published');
        $validated['section'] = $section;
        $validated['is_link'] = $is_link;
 
        Footer::create($validated);

        return redirect()
            ->route('admin.footer.index', ['section' => $section, 'is_link' => $is_link])
            ->with('success', 'Content added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($section, $is_link, Footer $footer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($section, $is_link, Footer $footer)
    {
        abort_if(
            $is_link === '1' && in_array($section, ['1', '3', '4', '7', '8'], true),
            404
        );

        if(!$is_link) {
            $cardOrIntro = 'Intro';
        }
        else {
            $cardOrIntro = 'Link';
        }

        $title = 'Edit ' . $this->getTitle($section) . ' ' . $cardOrIntro; 
 
        return view('admin.footer.form', compact(
            'section',
            'is_link',
            'title',
            'footer',
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $section, $is_link, Footer $footer)
    {
        abort_if(
            $is_link === '1' && in_array($section, ['1', '3', '4', '7', '8'], true),
            404
        );

        $validated = $request->validate([
            'text' => [in_array($section, [1, 2, 6, 7, 8]) ? 'required' : 'nullable', 'string'],
            'company_name' => [in_array($section, [3, 4]) ? 'required' : 'nullable', 'string'],
            'address' => [in_array($section, [3, 4]) ? 'required' : 'nullable', 'string'],
            'phone_1' => [in_array($section, [3, 4]) ? 'required' : 'nullable', 'string'],
            'phone_2' => ['nullable', 'string'],
            'email' => [in_array($section, [3, 4]) ? 'required' : 'nullable', 'email'],
            'social_media' => [$section === '5' ? 'required' : 'nullable', Rule::enum(SocialMedia::class)],
            'link_type' => [$section === '6' ? 'required' : 'nullable', 'string'],
            'url' => [in_array($section, [2, 5]) || ($section === '6' && $request->link_type === '1') ? 'required' : 'nullable', 'url'],
            'description' => [$section === '7' ? 'required' : 'nullable', 'string'],
            'privacy_text' => ['nullable', 'string'],
            'published' => ['nullable', 'boolean'],
            'display_order' => [$is_link ? 'required' : 'nullable', 'integer', 'min:0'],
        ]);

        $validated['published'] = $request->boolean('published');
        $validated['section'] = $section;
        $validated['is_link'] = $is_link;
 
        $footer->update($validated);
 
        if(!$is_link) {
            return redirect()
                ->route('admin.footer.edit', ['section' => $section, 'is_link' => $is_link, 'footer' => $footer])
                ->with('success', 'Content updated successfully');
        }
        else {
            return redirect()
                ->route('admin.footer.index', ['section' => $section, 'is_link' => $is_link])
                ->with('success', 'Content updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($section, $is_link, Footer $footer)
    {
        abort_unless($is_link === '1', 404);
        abort_if(
            in_array($section, ['1', '3', '4', '7', '8'], true),
            404
        );

        $footer->delete();
 
        return redirect()
            ->back()
            ->with('success', 'Content deleted successfully');
    }

    public function togglePublish($section, $is_link, Footer $footer)
    {
        abort_if(
            $is_link === '1' && in_array($section, ['1', '3', '4', '7', '8'], true),
            404
        );
        
        $footer->update(['published' => !$footer->published]);
 
        $message = $footer->published
            ? 'Content published successfully'
            : 'Content unpublished successfully';
 
        return back()->with('success', $message);
    }
}
