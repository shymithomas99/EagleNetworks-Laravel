<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WorkPage;
use Illuminate\Http\Request;

class WorkPageController extends Controller
{
    private function getTitle($section)
    {
        return match ((int) $section) {
                        1 => 'Banner',
                        2 => 'Process',
                        3 => 'Work',
                        4 => 'Project',
                        5 => 'Video',
                        6 => 'CTA Banner (Bottom)'
                    };
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, $section, $is_card)
    {
        abort_unless($is_card === '1', 404);
        abort_if(
            in_array($section, ['1', '3', '5'], true),
            404
        );
        $title = $this->getTitle($section) . ' Cards';
 
        $search = $request->input('search', '');
 
        $collections = WorkPage::query()
            ->when($search, function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%');
            })
            ->where('section', $section)
            ->where('is_card', 1)
            ->latest('id')
            ->simplePaginate(20)
            ->withQueryString();
 
        return view('admin.work-page.index', compact(
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
            in_array($section, ['1', '3', '5'], true),
            404
        );
        $title = 'Add ' . $this->getTitle($section) . ' Card';
 
        $workPage = new WorkPage();
 
        return view('admin.work-page.form', compact(
            'section',
            'is_card',
            'title',
            'workPage',
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $section, $is_card)
    {
        abort_unless($is_card === '1', 404);
        abort_if(
            in_array($section, ['1', '3', '5'], true),
            404
        );

        $validated = $request->validate([
            'label' => [(!$is_card && $section === '1') || (!$is_card && $section === '4') ? 'required' : 'nullable', 'string', 'max:255'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'image' => [($is_card && $section === '4') ? 'required' : 'nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'dimensions:width=760,height=440', 'max:100'],
            'link_text' => [$is_card && $section === '4' ? 'required' : 'nullable', 'string'],
            'link_url' => [$is_card && $section === '4' ? 'required' : 'nullable', 'url'],
            'email' => ['nullable', 'email'],
            'website' => ['nullable', 'url'],
            'linkedin' => ['nullable', 'url'],
            'button_text' => ['nullable', 'string'],
            'button_url' => ['nullable', 'url'],
            'published' => ['nullable', 'boolean'],
            'display_order' => [$is_card ? 'required' : 'nullable', 'integer', 'min:0'],
        ]);

        $fileName = null;
 
        if ($request->hasFile('image')) {
            $file = $request->file('image');
 
            $fileName = time() . '_' .
                uniqid() . '.' .
                $file->getClientOriginalExtension();
 
            $file->move(
                public_path('backend_assets/work-page'),
                $fileName
            );
        }
 
        $validated['image'] = $fileName;
        $validated['published'] = $request->boolean('published');
        $validated['section'] = $section;
        $validated['is_card'] = $is_card;
 
        WorkPage::create($validated);

        return redirect()
            ->route('admin.work-page.index', ['section' => $section, 'is_card' => $is_card])
            ->with('success', 'Content added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($section, $is_card, WorkPage $workPage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($section, $is_card, WorkPage $workPage)
    {
        abort_if(
            $is_card === '1' && in_array($section, ['1', '3', '5'], true),
            404
        );

        if(!$is_card) {
            $cardOrIntro = 'Intro';
        }
        else {
            $cardOrIntro = 'Card';
        }

        $title = 'Edit ' . $this->getTitle($section) . ' ' . $cardOrIntro; 
 
        return view('admin.work-page.form', compact(
            'section',
            'is_card',
            'title',
            'workPage',
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $section, $is_card, WorkPage $workPage)
    {
        abort_if(
            $is_card === '1' && in_array($section, ['1', '3', '5'], true),
            404
        );

        $validated = $request->validate([
            'label' => [(!$is_card && $section === '1') || (!$is_card && $section === '4') ? 'required' : 'nullable', 'string', 'max:255'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'dimensions:width=760,height=440', 'max:100'],
            'link_text' => [$is_card && $section === '4' ? 'required' : 'nullable', 'string'],
            'link_url' => [$is_card && $section === '4' ? 'required' : 'nullable', 'url'],
            'email' => ['nullable', 'email'],
            'website' => ['nullable', 'url'],
            'linkedin' => ['nullable', 'url'],
            'button_text' => ['nullable', 'string'],
            'button_url' => ['nullable', 'url'],
            'published' => ['nullable', 'boolean'],
            'display_order' => [$is_card ? 'required' : 'nullable', 'integer', 'min:0'],
        ]);

        $fileName = $workPage->image;
 
        if ($request->hasFile('image')) {
 
            $file = $request->file('image');
 
            $fileName = time() . '_' .
                uniqid() . '.' .
                $file->getClientOriginalExtension();
 
            $file->move(
                public_path('backend_assets/work-page'),
                $fileName
            );
 
            if (
                $workPage->image &&
                file_exists(
                    public_path(
                        'backend_assets/work-page/' . $workPage->image
                    )
                )
            ) {
                unlink(
                    public_path(
                        'backend_assets/work-page/' . $workPage->image
                    )
                );
            }
        }
 
        $validated['image'] = $fileName;
        $validated['published'] = $request->boolean('published');
        $validated['section'] = $section;
        $validated['is_card'] = $is_card;
 
        $workPage->update($validated);
 
        if(!$is_card) {
            return redirect()
                ->route('admin.work-page.edit', ['section' => $section, 'is_card' => $is_card, 'workPage' => $workPage])
                ->with('success', 'Content updated successfully');
        }
        else {
            return redirect()
                ->route('admin.work-page.index', ['section' => $section, 'is_card' => $is_card])
                ->with('success', 'Content updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($section, $is_card, WorkPage $workPage)
    {
        abort_unless($is_card === '1', 404);
        abort_if(
            in_array($section, ['1', '3', '5'], true),
            404
        );

        $workPage->delete();
 
        return redirect()
            ->back()
            ->with('success', 'Content deleted successfully');
    }

    public function togglePublish($section, $is_card, WorkPage $workPage)
    {
        abort_if(
            $is_card === '1' && in_array($section, ['1', '3', '5'], true),
            404
        );
        
        $workPage->update(['published' => !$workPage->published]);
 
        $message = $workPage->published
            ? 'Content published successfully'
            : 'Content unpublished successfully';
 
        return back()->with('success', $message);
    }
}
