<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactPage;
use Illuminate\Http\Request;

class ContactPageController extends Controller
{
    private function getTitle($section)
    {
        return match ((int) $section) {
                        1 => 'Banner',
                        2 => 'Form',
                        3 => 'Office',
                        4 => 'FAQ',
                        5 => 'Follow',
                    };
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, $section, $is_card)
    {
        abort_unless($is_card === '1', 404);
        abort_if(
            in_array($section, ['1', '2', '5'], true),
            404
        );
        $title = $this->getTitle($section) . ' Cards';
 
        $search = $request->input('search', '');
 
        $collections = ContactPage::query()
            ->when($search, function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%');
            })
            ->where('section', $section)
            ->where('is_card', 1)
            ->latest('id')
            ->simplePaginate(20)
            ->withQueryString();
 
        return view('admin.contact-page.index', compact(
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
            in_array($section, ['1', '2', '5'], true),
            404
        );
        $title = 'Add ' . $this->getTitle($section) . ' Card';
 
        $contactPage = new ContactPage();
 
        return view('admin.contact-page.form', compact(
            'section',
            'is_card',
            'title',
            'contactPage',
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $section, $is_card)
    {
        abort_unless($is_card === '1', 404);
        abort_if(
            in_array($section, ['1', '2', '5'], true),
            404
        );

        $validated = $request->validate([
            'label' => [$is_card && $section === '3' ? 'required' : 'nullable', 'string', 'max:255'],
            'title' => ['required', 'string', 'max:255'],
            'description' => [!$is_card && in_array($section, [3, 4]) ? 'nullable' : 'required', 'string'],
            'tag_1' => ['nullable', 'string'],
            'tag_2' => ['nullable', 'string'],
            'tag_3' => ['nullable', 'string'],
            'location' => [$is_card && $section === '3' ? 'required' : 'nullable', 'string'],
            'company_name' => [$is_card && $section === '3' ? 'required' : 'nullable', 'string'],
            'address' => [$is_card && $section === '3' ? 'required' : 'nullable', 'string'],
            'phone_1' => [$is_card && $section === '3' ? 'required' : 'nullable', 'string'],
            'phone_2' => ['nullable', 'string'],
            'email' => [$is_card && $section === '3' ? 'required' : 'nullable', 'email'],
            'map_url' => [$is_card && $section === '3' ? 'required' : 'nullable', 'url'],
            'button_text' => ['nullable', 'string'],
            'button_url' => ['nullable', 'string'],
            'instagram' => ['nullable', 'string'],
            'linkedin' => ['nullable', 'string'],
            'twitter' => ['nullable', 'string'],
            'tiktok' => ['nullable', 'string'],
            'youtube' => ['nullable', 'string'],
            'published' => ['nullable', 'boolean'],
            'display_order' => [$is_card ? 'required' : 'nullable', 'integer', 'min:0'],
        ]);

        $validated['published'] = $request->boolean('published');
        $validated['section'] = $section;
        $validated['is_card'] = $is_card;
 
        ContactPage::create($validated);

        return redirect()
            ->route('admin.contact-page.index', ['section' => $section, 'is_card' => $is_card])
            ->with('success', 'Content added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($section, $is_card, ContactPage $contactPage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($section, $is_card, ContactPage $contactPage)
    {
        abort_if(
            $is_card === '1' && in_array($section, ['1', '2', '5'], true),
            404
        );

        if(!$is_card) {
            $cardOrIntro = 'Intro';
        }
        else {
            $cardOrIntro = 'Card';
        }

        $title = 'Edit ' . $this->getTitle($section) . ' ' . $cardOrIntro; 
 
        return view('admin.contact-page.form', compact(
            'section',
            'is_card',
            'title',
            'contactPage',
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $section, $is_card, ContactPage $contactPage)
    {
        abort_if(
            $is_card === '1' && in_array($section, ['1', '2', '5'], true),
            404
        );

        $validated = $request->validate([
            'label' => [$is_card && $section === '3' ? 'required' : 'nullable', 'string', 'max:255'],
            'title' => ['required', 'string', 'max:255'],
            'description' => [!$is_card && in_array($section, [3, 4]) ? 'nullable' : 'required', 'string'],
            'tag_1' => ['nullable', 'string'],
            'tag_2' => ['nullable', 'string'],
            'tag_3' => ['nullable', 'string'],
            'location' => [$is_card && $section === '3' ? 'required' : 'nullable', 'string'],
            'company_name' => [$is_card && $section === '3' ? 'required' : 'nullable', 'string'],
            'address' => [$is_card && $section === '3' ? 'required' : 'nullable', 'string'],
            'phone_1' => [$is_card && $section === '3' ? 'required' : 'nullable', 'string'],
            'phone_2' => ['nullable', 'string'],
            'email' => [$is_card && $section === '3' ? 'required' : 'nullable', 'email'],
            'map_url' => [$is_card && $section === '3' ? 'required' : 'nullable', 'url'],
            'button_text' => ['nullable', 'string'],
            'button_url' => ['nullable', 'string'],
            'instagram' => ['nullable', 'string'],
            'linkedin' => ['nullable', 'string'],
            'x' => ['nullable', 'string'],
            'tiktok' => ['nullable', 'string'],
            'youtube' => ['nullable', 'string'],
            'published' => ['nullable', 'boolean'],
            'display_order' => [$is_card ? 'required' : 'nullable', 'integer', 'min:0'],
        ]);

        $validated['published'] = $request->boolean('published');
        $validated['section'] = $section;
        $validated['is_card'] = $is_card;
 
        $contactPage->update($validated);
 
        if(!$is_card) {
            return redirect()
                ->route('admin.contact-page.edit', ['section' => $section, 'is_card' => $is_card, 'contactPage' => $contactPage])
                ->with('success', 'Content updated successfully');
        }
        else {
            return redirect()
                ->route('admin.contact-page.index', ['section' => $section, 'is_card' => $is_card])
                ->with('success', 'Content updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($section, $is_card, ContactPage $contactPage)
    {
        abort_unless($is_card === '1', 404);
        abort_if(
            in_array($section, ['1', '2', '5'], true),
            404
        );

        $contactPage->delete();
 
        return redirect()
            ->back()
            ->with('success', 'Content deleted successfully');
    }

    public function togglePublish($section, $is_card, ContactPage $contactPage)
    {
        abort_if(
            $is_card === '1' && in_array($section, ['1', '2', '5'], true),
            404
        );
        
        $contactPage->update(['published' => !$contactPage->published]);
 
        $message = $contactPage->published
            ? 'Content published successfully'
            : 'Content unpublished successfully';
 
        return back()->with('success', $message);
    }
}
