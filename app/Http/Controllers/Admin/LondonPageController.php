<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LondonPage;
use Illuminate\Http\Request;

class LondonPageController extends Controller
{
    private function getTitle($section)
    {
        return match ((int) $section) {
                        1 => 'Banner',
                        2 => 'Strategic Hub',
                        3 => 'Number',
                        4 => 'Built For',
                        5 => 'What We Do',
                        6 => 'We Serve',
                        7 => 'Services Delivered',
                        8 => 'Why Choose Us',
                        9 => 'Integrated Organization',
                        10 => 'FAQ',
                        11 => 'CTA Banner (Bottom)'
                    };
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, $section, $is_card)
    {
        abort_unless($is_card === '1', 404);
        abort_if(
            in_array($section, ['1', '2', '9', '11'], true),
            404
        );
        $title = $this->getTitle($section) . ' Cards';
 
        $search = $request->input('search', '');
 
        $collections = LondonPage::query()
            ->when($search, function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%');
            })
            ->where('section', $section)
            ->where('is_card', 1)
            ->latest('id')
            ->simplePaginate(20)
            ->withQueryString();
 
        return view('admin.london-page.index', compact(
            'section',
            'is_card',
            'title',
            'collections',
            'search'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($section, $is_card)
    {
        abort_unless($is_card === '1', 404);
        abort_if(
            in_array($section, ['1', '2', '9', '11'], true),
            404
        );
        $title = 'Add ' . $this->getTitle($section) . ' Card';
 
        $londonPage = new LondonPage();
 
        return view('admin.london-page.form', compact(
            'section',
            'is_card',
            'title',
            'londonPage',
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $section, $is_card)
    {
        abort_unless($is_card === '1', 404);
        abort_if(
            in_array($section, ['1', '2', '9', '11'], true),
            404
        );

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'label' => [!$is_card && in_array($section, [1, 2, 3, 4, 5, 6, 7, 10, 11]) ? 'required' : 'nullable', 'string', 'max:255'],
            'description' => [!$is_card && in_array($section, [3, 4, 5, 6, 7, 8]) ? 'nullable' : 'required', 'string'],
            'additional_description' => ['nullable', 'string'],
            'location' => ['nullable', 'string'],
            'serving' => ['nullable', 'string'],
            'primary_focus' => ['nullable', 'string'],
            'key_offerings' => ['nullable', 'string'],
            'key_points' => ['nullable', 'string'],
            'quote' => ['nullable', 'string'],
            'quote_author' => ['nullable', 'string'],
            'intro' => ['nullable', 'string'],
            'button_text' => ['nullable', 'string'],
            'button_url' => ['nullable', 'url'],
            'published' => ['nullable', 'boolean'],
            'display_order' => [$is_card ? 'required' : 'nullable', 'integer', 'min:0'],
        ]);

        $validated['published'] = $request->boolean('published');
        $validated['section'] = $section;
        $validated['is_card'] = $is_card;
 
        LondonPage::create($validated);

        return redirect()
            ->route('admin.london-page.index', ['section' => $section, 'is_card' => $is_card])
            ->with('success', 'Content added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($section, $is_card, LondonPage $londonPage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($section, $is_card, LondonPage $londonPage)
    {
        abort_if(
            $is_card === '1' && in_array($section, ['1', '2', '9', '11'], true),
            404
        );

        if (!$is_card) {
            $cardOrIntro = in_array($section, ['1', '2', '9', '11']) ? '' : 'Intro';
        } else {
            $cardOrIntro = 'Card';
        }

        $title = 'Edit ' . $this->getTitle($section) . ' ' . $cardOrIntro; 
 
        return view('admin.london-page.form', compact(
            'section',
            'is_card',
            'title',
            'londonPage',
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $section, $is_card, LondonPage $londonPage)
    {
        abort_if(
            $is_card === '1' && in_array($section, ['1', '2', '9', '11'], true),
            404
        );

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'label' => [!$is_card && in_array($section, [1, 2, 3, 4, 5, 6, 7, 10, 11]) ? 'required' : 'nullable', 'string', 'max:255'],
            'description' => [!$is_card && in_array($section, [3, 4, 5, 6, 7, 8]) ? 'nullable' : 'required', 'string'],
            'additional_description' => ['nullable', 'string'],
            'location' => ['nullable', 'string'],
            'serving' => ['nullable', 'string'],
            'primary_focus' => ['nullable', 'string'],
            'key_offerings' => ['nullable', 'string'],
            'key_points' => ['nullable', 'string'],
            'quote' => ['nullable', 'string'],
            'quote_author' => ['nullable', 'string'],
            'intro' => ['nullable', 'string'],
            'button_text' => ['nullable', 'string'],
            'button_url' => ['nullable', 'url'],
            'published' => ['nullable', 'boolean'],
            'display_order' => [$is_card ? 'required' : 'nullable', 'integer', 'min:0'],
        ]);

        $validated['published'] = $request->boolean('published');
        $validated['section'] = $section;
        $validated['is_card'] = $is_card;
 
        $londonPage->update($validated);
 
        if(!$is_card) {
            return redirect()
                ->route('admin.london-page.edit', ['section' => $section, 'is_card' => $is_card, 'londonPage' => $londonPage])
                ->with('success', 'Content updated successfully');
        }
        else {
            return redirect()
                ->route('admin.london-page.index', ['section' => $section, 'is_card' => $is_card])
                ->with('success', 'Content updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($section, $is_card, LondonPage $londonPage)
    {
        abort_unless($is_card === '1', 404);
        abort_if(
            in_array($section, ['1', '2', '9', '11'], true),
            404
        );

        $londonPage->delete();
 
        return redirect()
            ->back()
            ->with('success', 'Content deleted successfully');
    }

    public function togglePublish($section, $is_card, LondonPage $londonPage)
    {
        abort_if(
            $is_card === '1' && in_array($section, ['1', '2', '9', '11'], true),
            404
        );
        
        $londonPage->update(['published' => !$londonPage->published]);
 
        $message = $londonPage->published
            ? 'Content published successfully'
            : 'Content unpublished successfully';
 
        return back()->with('success', $message);
    }
}
