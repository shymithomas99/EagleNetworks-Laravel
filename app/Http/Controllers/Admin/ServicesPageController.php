<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServicesPage;
use Illuminate\Http\Request;

class ServicesPageController extends Controller
{
    private function getTitle($section)
    {
        return match ((int) $section) {
                        1 => 'Banner',
                        2 => 'Service',
                        3 => 'How We Create',
                        4 => 'Project',
                        5 => 'How We Deliver',
                        7 => 'CTA Banner',
                        8 => 'FAQ',
                        9 => 'CTA Banner (Bottom)'
                    };
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, $section, $is_card)
    {
        abort_unless($is_card === '1', 404);
        abort_if(
            $is_card === '1' && in_array($section, ['1', '7', '9'], true),
            404
        );
        $title = $this->getTitle($section) . ' Cards';
 
        $search = $request->input('search', '');
 
        $collections = ServicesPage::query()
            ->when($search, function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%');
            })
            ->where('section', $section)
            ->where('is_card', 1)
            ->latest('id')
            ->simplePaginate(20)
            ->withQueryString();
 
        return view('admin.services-page.index', compact(
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
            $is_card === '1' && in_array($section, ['1', '7', '9'], true),
            404
        );
        $title = 'Add ' . $this->getTitle($section) . ' Card';
 
        $servicesPage = new ServicesPage();
 
        return view('admin.services-page.form', compact(
            'section',
            'is_card',
            'title',
            'servicesPage',
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $section, $is_card)
    {
        abort_unless($is_card === '1', 404);
        abort_if(
            $is_card === '1' && in_array($section, ['1', '7', '9'], true),
            404
        );

        $imageRules = [
            $is_card && in_array($section, [2, 3, 4]) ? 'required' : 'nullable',
            'image',
            'mimes:jpg,jpeg,png,webp',
        ];

        if ($is_card && $section == 2) {
            $imageRules[] = 'dimensions:width=100,height=100';
            $imageRules[] = 'max:200';
        } elseif ($is_card && $section == 3) {
            $imageRules[] = 'dimensions:width=1432,height=768';
            $imageRules[] = 'max:700';
        } elseif ($is_card && $section == 4) {
            $imageRules[] = 'dimensions:width=760,height=440';
            $imageRules[] = 'max:100';
        }

        $validated = $request->validate([
            'short_title' => [!$is_card && in_array($section, [3, 4, 8]) ? 'required' : 'nullable', 'string', 'max:255'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'image' => $imageRules,
            'button1_text' => ['nullable'],
            'button1_url' => ['nullable', 'url'],
            'button2_text' => ['nullable'],
            'button2_url' => ['nullable', 'url'],
            'link_text' => [$is_card  && $section == 4 ? 'required' : 'nullable'],
            'link_url' => [$is_card  && $section == 4 ? 'required' : 'nullable', 'url'],
            'key_services' => [$is_card  && $section == 3 ? 'required' : 'nullable'],
            'key_points' => [$is_card  && $section == 3 ? 'required' : 'nullable',],
            'published' => ['nullable', 'boolean'],
            'featured' => ['nullable', 'boolean'],
            'display_order' => [$is_card ? 'required' : 'nullable', 'integer', 'min:0'],
        ]);
 
        $fileName = null;
 
        if ($request->hasFile('image')) {
            $file = $request->file('image');
 
            $fileName = time() . '_' .
                uniqid() . '.' .
                $file->getClientOriginalExtension();
 
            $file->move(
                public_path('backend_assets/services-page'),
                $fileName
            );
        }
 
        $validated['image'] = $fileName;
        $validated['published'] = $request->boolean('published');
        $validated['featured'] = $request->boolean('featured');
        $validated['section'] = $section;
        $validated['is_card'] = $is_card;
 
        ServicesPage::create($validated);
 
        return redirect()
            ->route('admin.services-page.index', ['section' => $section, 'is_card' => $is_card])
            ->with('success', 'Content added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($section, $is_card, ServicesPage $servicesPage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($section, $is_card, ServicesPage $servicesPage)
    {
        abort_if(
            $is_card === '1' && in_array($section, ['1', '7', '9'], true),
            404
        );

        if(!$is_card) {
            $cardOrIntro = 'Intro';
        }
        else {
            $cardOrIntro = 'Card';
        }

        $title = 'Edit ' . $this->getTitle($section) . ' ' . $cardOrIntro; 
 
        return view('admin.services-page.form', compact(
            'section',
            'is_card',
            'title',
            'servicesPage',
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $section, $is_card, ServicesPage $servicesPage)
    {
        abort_if(
            $is_card === '1' && in_array($section, ['1', '7', '9'], true),
            404
        );

        $imageRules = [
            'nullable',
            'image',
            'mimes:jpg,jpeg,png,webp',
        ];

        if ($is_card && $section == 2) {
            $imageRules[] = 'dimensions:width=100,height=100';
            $imageRules[] = 'max:200';
        } elseif ($is_card && $section == 3) {
            $imageRules[] = 'dimensions:width=1432,height=768';
            $imageRules[] = 'max:700';
        } elseif ($is_card && $section == 4) {
            $imageRules[] = 'dimensions:width=760,height=440';
            $imageRules[] = 'max:100';
        }

        $validated = $request->validate([
            'short_title' => [!$is_card && in_array($section, [3, 4, 8]) ? 'required' : 'nullable', 'string', 'max:255'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'image' => $imageRules,
            'button1_text' => ['nullable'],
            'button1_url' => ['nullable', 'url'],
            'button2_text' => ['nullable'],
            'button2_url' => ['nullable', 'url'],
            'link_text' => [$is_card  && $section == 4 ? 'required' : 'nullable'],
            'link_url' => [$is_card  && $section == 4 ? 'required' : 'nullable', 'url'],
            'key_services' => [$is_card  && $section == 3 ? 'required' : 'nullable'],
            'key_points' => [$is_card  && $section == 3 ? 'required' : 'nullable',],
            'published' => ['nullable', 'boolean'],
            'featured' => $is_card  && $section == 2 ? ['nullable', 'boolean'] : ['prohibited'],
            'display_order' => [$is_card ? 'required' : 'nullable', 'integer', 'min:0'],
        ]);
 
        $fileName = $servicesPage->image;
 
        if ($request->hasFile('image')) {
 
            $file = $request->file('image');
 
            $fileName = time() . '_' .
                uniqid() . '.' .
                $file->getClientOriginalExtension();
 
            $file->move(
                public_path('backend_assets/services-page'),
                $fileName
            );
 
            if (
                $servicesPage->image &&
                file_exists(
                    public_path(
                        'backend_assets/services-page/' . $servicesPage->image
                    )
                )
            ) {
                unlink(
                    public_path(
                        'backend_assets/services-page/' . $servicesPage->image
                    )
                );
            }
        }
 
        $validated['image'] = $fileName;
        $validated['published'] = $request->boolean('published');
        $validated['featured'] = $request->boolean('featured');
        $validated['section'] = $section;
        $validated['is_card'] = $is_card;
 
        $servicesPage->update($validated);
 
        if(!$is_card) {
            return redirect()
                ->route('admin.services-page.edit', ['section' => $section, 'is_card' => $is_card, 'servicesPage' => $servicesPage])
                ->with('success', 'Content updated successfully');
        }
        else {
            return redirect()
                ->route('admin.services-page.index', ['section' => $section, 'is_card' => $is_card])
                ->with('success', 'Content updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($section, $is_card, ServicesPage $servicesPage)
    {
        abort_unless($is_card === '1', 404);
        abort_if(
            $is_card === '1' && in_array($section, ['1', '7', '9'], true),
            404
        );

        $servicesPage->delete();
 
        return redirect()
            ->back()
            ->with('success', 'Content deleted successfully');
    }

    public function togglePublish($section, $is_card, ServicesPage $servicesPage)
    {
        abort_if(
            $is_card === '1' && in_array($section, ['1', '7', '9'], true),
            404
        );

        $servicesPage->update(['published' => !$servicesPage->published]);
 
        $message = $servicesPage->published
            ? 'Content published successfully'
            : 'Content unpublished successfully';
 
        return back()->with('success', $message);
    }
}
