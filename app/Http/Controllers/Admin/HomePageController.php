<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomePage;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    private function getTitle($section)
    {
        return match ((int) $section) {
                        1 => 'Banner',
                        2 => 'Service',
                        3 => '5 C',
                        4 => 'Work',
                        5 => 'Client',
                        6 => 'CTA Banner',
                        7 => 'Package',
                        8 => 'Testimonial',
                        9 => 'Value',
                        10 => 'CTA Banner (Bottom)'
                    };
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, $section, $is_card)
    {
        abort_unless($is_card === '1', 404);
        abort_if(
            in_array($section, ['1', '10'], true),
            404
        );
        $title = $this->getTitle($section) . ' Cards';
 
        $search = $request->input('search', '');
 
        $collections = HomePage::query()
            ->when($search, function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%');
            })
            ->where('section', $section)
            ->where('is_card', 1)
            ->latest('id')
            ->simplePaginate(20)
            ->withQueryString();
 
        return view('admin.home-page.index', compact(
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
            in_array($section, ['1', '2', '4', '7', '10'], true),
            404
        );
        $title = 'Add ' . $this->getTitle($section) . ' Card';
 
        $homePage = new HomePage();
 
        return view('admin.home-page.form', compact(
            'section',
            'is_card',
            'title',
            'homePage',
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $section, $is_card)
    {
        abort_unless($is_card === '1', 404);
        abort_if(
            in_array($section, ['1', '2', '4', '7', '10'], true),
            404
        );

        $imageRules = [
            $is_card && in_array($section, [3, 5]) ? 'required' : 'nullable',
            'image',
            'mimes:jpg,jpeg,png,webp',
        ];

        if ($is_card && $section == 3) {
            $imageRules[] = 'dimensions:width=84,height=84';
            $imageRules[] = 'max:50';
        } elseif ($is_card && $section == 5) {
            $imageRules[] = 'max:600';
        }

        $validated = $request->validate([
            'label' => [$is_card && $section === '6' ? 'required' : 'nullable', 'string', 'max:255'],
            'image' => $imageRules,
            'title' => ['required', 'string', 'max:255'],
            'description' => [$is_card && in_array($section, [3, 5]) ? 'nullable' : 'required', 'string'],
            'tag_1' => ['nullable', 'string'],
            'tag_2' => ['nullable', 'string'],
            'tag_3' => ['nullable', 'string'],
            'additional_description' => ['nullable', 'string'],
            'rating' => [$is_card && $section === '8' ? 'required' : 'nullable', 'string'],
            'testimonial' => [$is_card && $section === '8' ? 'required' : 'nullable', 'string'],
            'client_name' => [$is_card && $section === '8' ? 'required' : 'nullable', 'string'],
            'cta_title' => ['nullable', 'string'],
            'cta_description' => ['nullable', 'string'],
            'cta_button_text' => ['nullable', 'string'],
            'cta_button_url' => ['nullable', 'url'],
            'button1_text' => ['nullable', 'string'],
            'button1_url' => ['nullable', 'url'],
            'button2_text' => ['nullable', 'string'],
            'button2_url' => ['nullable', 'url'],
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
                public_path('backend_assets/home-page'),
                $fileName
            );
        }
 
        $validated['image'] = $fileName;
        $validated['published'] = $request->boolean('published');
        $validated['section'] = $section;
        $validated['is_card'] = $is_card;
 
        HomePage::create($validated);

        return redirect()
            ->route('admin.home-page.index', ['section' => $section, 'is_card' => $is_card])
            ->with('success', 'Content added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($section, $is_card, HomePage $homePage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($section, $is_card, HomePage $homePage)
    {
        abort_if(
            $is_card === '1' && in_array($section, ['1', '2', '4', '7', '10'], true),
            404
        );

        if(!$is_card) {
            $cardOrIntro = 'Intro';
        }
        else {
            $cardOrIntro = 'Card';
        }

        $title = 'Edit ' . $this->getTitle($section) . ' ' . $cardOrIntro; 
 
        return view('admin.home-page.form', compact(
            'section',
            'is_card',
            'title',
            'homePage',
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $section, $is_card, HomePage $homePage)
    {
        abort_if(
            $is_card === '1' && in_array($section, ['1', '2', '4', '7', '10'], true),
            404
        );

         $imageRules = [
            'nullable',
            'image',
            'mimes:jpg,jpeg,png,webp',
        ];

        if ($is_card && $section == 3) {
            $imageRules[] = 'dimensions:width=84,height=84';
            $imageRules[] = 'max:50';
        } elseif ($is_card && $section == 5) {
            $imageRules[] = 'max:600';
        }

        $validated = $request->validate([
            'label' => [$is_card && $section === '6' ? 'required' : 'nullable', 'string', 'max:255'],
            'image' => $imageRules,
            'title' => ['required', 'string', 'max:255'],
            'description' => [$is_card && in_array($section, [3, 5]) ? 'nullable' : 'required', 'string'],
            'tag_1' => ['nullable', 'string'],
            'tag_2' => ['nullable', 'string'],
            'tag_3' => ['nullable', 'string'],
            'additional_description' => ['nullable', 'string'],
            'rating' => [$is_card && $section === '8' ? 'required' : 'nullable', 'string'],
            'testimonial' => [$is_card && $section === '8' ? 'required' : 'nullable', 'string'],
            'client_name' => [$is_card && $section === '8' ? 'required' : 'nullable', 'string'],
            'cta_title' => ['nullable', 'string'],
            'cta_description' => ['nullable', 'string'],
            'cta_button_text' => ['nullable', 'string'],
            'cta_button_url' => ['nullable', 'url'],
            'button1_text' => ['nullable', 'string'],
            'button1_url' => ['nullable', 'url'],
            'button2_text' => ['nullable', 'string'],
            'button2_url' => ['nullable', 'url'],
            'published' => ['nullable', 'boolean'],
            'display_order' => [$is_card ? 'required' : 'nullable', 'integer', 'min:0'],
        ]);

        $fileName = $homePage->image;
 
        if ($request->hasFile('image')) {
 
            $file = $request->file('image');
 
            $fileName = time() . '_' .
                uniqid() . '.' .
                $file->getClientOriginalExtension();
 
            $file->move(
                public_path('backend_assets/home-page'),
                $fileName
            );
 
            if (
                $homePage->image &&
                file_exists(
                    public_path(
                        'backend_assets/home-page/' . $homePage->image
                    )
                )
            ) {
                unlink(
                    public_path(
                        'backend_assets/home-page/' . $homePage->image
                    )
                );
            }
        }
 
        $validated['image'] = $fileName;
        $validated['published'] = $request->boolean('published');
        $validated['section'] = $section;
        $validated['is_card'] = $is_card;
 
        $homePage->update($validated);
 
        if(!$is_card) {
            return redirect()
                ->route('admin.home-page.edit', ['section' => $section, 'is_card' => $is_card, 'homePage' => $homePage])
                ->with('success', 'Content updated successfully');
        }
        else {
            return redirect()
                ->route('admin.home-page.index', ['section' => $section, 'is_card' => $is_card])
                ->with('success', 'Content updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($section, $is_card, HomePage $homePage)
    {
        abort_unless($is_card === '1', 404);
        abort_if(
            in_array($section, ['1', '2', '4', '7', '10'], true),
            404
        );

        $homePage->delete();
 
        return redirect()
            ->back()
            ->with('success', 'Content deleted successfully');
    }

    public function togglePublish($section, $is_card, HomePage $homePage)
    {
        abort_if(
            $is_card === '1' && in_array($section, ['1', '2', '4', '7', '10'], true),
            404
        );
        
        $homePage->update(['published' => !$homePage->published]);
 
        $message = $homePage->published
            ? 'Content published successfully'
            : 'Content unpublished successfully';
 
        return back()->with('success', $message);
    }
}
