<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutPage;
use Illuminate\Http\Request;

class AboutPageController extends Controller
{
    private function getTitle($section)
    {
        return match ((int) $section) {
                        1 => 'Banner',
                        2 => 'Story',
                        3 => 'Milestone',
                        4 => 'Value',
                        5 => 'Client',
                        6 => 'Office',
                        7 => 'Process',
                        8 => 'Engagement Model',
                        9 => 'Commitment',
                        10 => 'Proof Signal',
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
            in_array($section, ['1', '2', '11'], true),
            404
        );
        $title = $this->getTitle($section) . ' Cards';
 
        $search = $request->input('search', '');
 
        $collections = AboutPage::query()
            ->when($search, function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%');
            })
            ->where('section', $section)
            ->where('is_card', 1)
            ->latest('id')
            ->simplePaginate(20)
            ->withQueryString();
 
        return view('admin.about-page.index', compact(
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
            in_array($section, ['1', '2', '11'], true),
            404
        );
        $title = 'Add ' . $this->getTitle($section) . ' Card';
 
        $aboutPage = new AboutPage();
 
        return view('admin.about-page.form', compact(
            'section',
            'is_card',
            'title',
            'aboutPage',
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $section, $is_card)
    {
        abort_unless($is_card === '1', 404);
        abort_if(
            in_array($section, ['1', '2', '11'], true),
            404
        );

        $validated = $request->validate([
            'label' => [!$is_card || ($is_card && in_array($section, [5, 6, 7])) ? 'required' : 'nullable', 'string', 'max:255'],
            'title' => ['required', 'string', 'max:255'],
            'description' => [!$is_card && $section === '3' ? 'nullable' : 'required', 'string'],
            'founded' => ['nullable', 'string'],
            'stat_value' => ['nullable', 'string'],
            'stat_title' => ['nullable', 'string'],
            'stat_description' => ['nullable', 'string'],
            'button1_text' => ['nullable', 'string'],
            'button1_url' => ['nullable', 'url'],
            'button2_text' => ['nullable', 'string'],
            'button2_url' => ['nullable', 'url'],
            'published' => ['nullable', 'boolean'],
            'display_order' => [$is_card ? 'required' : 'nullable', 'integer', 'min:0'],
        ]);

        $validated['published'] = $request->boolean('published');
        $validated['section'] = $section;
        $validated['is_card'] = $is_card;
 
        AboutPage::create($validated);

        return redirect()
            ->route('admin.about-page.index', ['section' => $section, 'is_card' => $is_card])
            ->with('success', 'Content added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($section, $is_card, AboutPage $aboutPage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($section, $is_card, AboutPage $aboutPage)
    {
        abort_if(
            $is_card === '1' && in_array($section, ['1', '2', '11'], true),
            404
        );

        if(!$is_card) {
            $cardOrIntro = 'Intro';
        }
        else {
            $cardOrIntro = 'Card';
        }

        $title = 'Edit ' . $this->getTitle($section) . ' ' . $cardOrIntro; 
 
        return view('admin.about-page.form', compact(
            'section',
            'is_card',
            'title',
            'aboutPage',
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $section, $is_card, AboutPage $aboutPage)
    {
        abort_if(
            $is_card === '1' && in_array($section, ['1', '2', '11'], true),
            404
        );

         $validated = $request->validate([
            'label' => [!$is_card || ($is_card && in_array($section, [5, 6, 7])) ? 'required' : 'nullable', 'string', 'max:255'],
            'title' => ['required', 'string', 'max:255'],
            'description' => [!$is_card && $section === '3' ? 'nullable' : 'required', 'string'],
            'founded' => ['nullable', 'string'],
            'stat_value' => ['nullable', 'string'],
            'stat_title' => ['nullable', 'string'],
            'stat_description' => ['nullable', 'string'],
            'button1_text' => ['nullable', 'string'],
            'button1_url' => ['nullable', 'url'],
            'button2_text' => ['nullable', 'string'],
            'button2_url' => ['nullable', 'url'],
            'published' => ['nullable', 'boolean'],
            'display_order' => [$is_card ? 'required' : 'nullable', 'integer', 'min:0'],
        ]);

        $validated['published'] = $request->boolean('published');
        $validated['section'] = $section;
        $validated['is_card'] = $is_card;
 
        $aboutPage->update($validated);
 
        if(!$is_card) {
            return redirect()
                ->route('admin.about-page.edit', ['section' => $section, 'is_card' => $is_card, 'aboutPage' => $aboutPage])
                ->with('success', 'Content updated successfully');
        }
        else {
            return redirect()
                ->route('admin.about-page.index', ['section' => $section, 'is_card' => $is_card])
                ->with('success', 'Content updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($section, $is_card, AboutPage $aboutPage)
    {
        abort_unless($is_card === '1', 404);
        abort_if(
            in_array($section, ['1', '2', '11'], true),
            404
        );

        $aboutPage->delete();
 
        return redirect()
            ->back()
            ->with('success', 'Content deleted successfully');
    }

    public function togglePublish($section, $is_card, AboutPage $aboutPage)
    {
        abort_if(
            $is_card === '1' && in_array($section, ['1', '2', '11'], true),
            404
        );
        
        $aboutPage->update(['published' => !$aboutPage->published]);
 
        $message = $aboutPage->published
            ? 'Content published successfully'
            : 'Content unpublished successfully';
 
        return back()->with('success', $message);
    }
}
