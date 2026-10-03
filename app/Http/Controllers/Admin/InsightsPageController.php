<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InsightsPage;
use Illuminate\Http\Request;

class InsightsPageController extends Controller
{
    private function getTitle($section)
    {
        return match ((int) $section) {
                        1 => 'Banner',
                        3 => 'Follow on LinkedIn',
                    };
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, $section, $is_card)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($section, $is_card)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $section, $is_card)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($section, $is_card, InsightsPage $insightsPage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($section, $is_card, InsightsPage $insightsPage)
    {
        abort_if(
            $is_card === '0' && $section === '2',
            404
        );

        if (!$is_card) {
            $cardOrIntro = in_array($section, ['1', '3']) ? '' : 'Intro';
        } else {
            $cardOrIntro = 'Card';
        }

        $title = 'Edit ' . $this->getTitle($section) . ' ' . $cardOrIntro; 
 
        return view('admin.insights-page.form', compact(
            'section',
            'is_card',
            'title',
            'insightsPage',
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $section, $is_card, InsightsPage $insightsPage)
    {
        abort_if(
            $is_card === '0' && $section === '2',
            404
        );

        $validated = $request->validate([
            'label' => [!$is_card && $section === '1' ? 'required' : 'nullable', 'string', 'max:255'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'button_text' => ['nullable', 'string'],
            'button_url' => ['nullable', 'url'],
            'published' => ['nullable', 'boolean'],
            'display_order' => [$is_card ? 'required' : 'nullable', 'integer', 'min:0'],
        ]);

        $validated['published'] = $request->boolean('published');
        $validated['section'] = $section;
        $validated['is_card'] = $is_card;
 
        $insightsPage->update($validated);
 
        if(!$is_card) {
            return redirect()
                ->route('admin.insights-page.edit', ['section' => $section, 'is_card' => $is_card, 'insightsPage' => $insightsPage])
                ->with('success', 'Content updated successfully');
        }
        else {
            return redirect()
                ->route('admin.insights-page.index', ['section' => $section, 'is_card' => $is_card])
                ->with('success', 'Content updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($section, $is_card, InsightsPage $insightsPage)
    {
        //
    }

    public function togglePublish($section, $is_card, InsightsPage $insightsPage)
    {
        abort_if(
            $is_card === '0' && $section === '2',
            404
        );
        
        $insightsPage->update(['published' => !$insightsPage->published]);
 
        $message = $insightsPage->published
            ? 'Content published successfully'
            : 'Content unpublished successfully';
 
        return back()->with('success', $message);
    }
}
