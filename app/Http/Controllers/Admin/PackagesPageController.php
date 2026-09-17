<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\PackagesPage;
use Illuminate\Http\Request;

class PackagesPageController extends Controller
{
    private function getTitle($section)
    {
        return match ((int) $section) {
                        1 => 'Banner',
                        2 => 'Guide',
                        3 => 'Package',
                        4 => 'CTA Banner',
                        5 => 'What You Get',
                        6 => 'FAQ',
                        7 => 'CTA Banner (Bottom)'
                    };
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, $section, $is_card)
    {
        abort_unless($is_card === '1', 404);
        abort_if(
            $is_card === '1' && in_array($section, ['1', '4', '7'], true),
            404
        );
        $title = $this->getTitle($section) . ' Cards';
 
        $search = $request->input('search', '');
 
        $collections = PackagesPage::query()
            ->when($search, function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%');
            })
            ->where('section', $section)
            ->where('is_card', 1)
            ->latest('id')
            ->simplePaginate(20)
            ->withQueryString();
 
        return view('admin.packages-page.index', compact(
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
            $is_card === '1' && in_array($section, ['1', '4', '7'], true),
            404
        );
        $title = 'Add ' . $this->getTitle($section) . ' Card';
 
        $packagesPage = new PackagesPage();
 
        return view('admin.packages-page.form', compact(
            'section',
            'is_card',
            'title',
            'packagesPage',
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $section, $is_card)
    {
        abort_unless($is_card === '1', 404);
        abort_if(
            $is_card === '1' && in_array($section, ['1', '4', '7'], true),
            404
        );

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'support_title' => ['nullable', 'string', 'max:255'],
            'short_title' => [!$is_card  && $section == 6 ? 'required' : 'nullable', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'support_description' => ['nullable', 'string'],
            'key_services' => [$is_card  && $section == 3 ? 'required' : 'nullable', 'string'],
            'button_text' => ['nullable'],
            'button_url' => ['nullable', 'url'],
            'email' => ['nullable', 'email'],
            'website' => ['nullable', 'url'],
            'linkedin' => ['nullable', 'url'],
            'published' => ['nullable', 'boolean'],
            'featured' => ['nullable', 'boolean'],
            'most_popular' => ['nullable', 'boolean'],
            'display_order' => [$is_card ? 'required' : 'nullable', 'integer', 'min:0'],
        ]);

        $validated['published'] = $request->boolean('published');
        $validated['featured'] = $request->boolean('featured');
        $validated['most_popular'] = $request->boolean('most_popular');
        $validated['section'] = $section;
        $validated['is_card'] = $is_card;
 
        $packagesPage = PackagesPage::create($validated);

        $pkgSectionsCards = [
            [1, 0],
            [2, 0],
            [3, 0],
            [4, 0],
            [5, 0],
        ];

        foreach ($pkgSectionsCards as [$pkgSection, $pkgIsCard]) {
            Package::create([
                'packages_page_id' => $packagesPage->id,
                'section' => $pkgSection,
                'is_card' => $pkgIsCard,
            ]);
        }

        return redirect()
            ->route('admin.packages-page.index', ['section' => $section, 'is_card' => $is_card])
            ->with('success', 'Content added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($section, $is_card, PackagesPage $packagesPage)
    {
        abort_unless($is_card === '1' && $section === '3', 404);

        $title = 'View ' . $this->getTitle($section) . ' Card (Menu)';

        $packages = Package::where('packages_page_id', $packagesPage->id)
                ->where('is_card', 0)
                ->whereIn('section', [1, 2, 3, 4, 5])
                ->get()
                ->keyBy('section');

        return view('admin.packages-page.show', compact(
            'section',
            'is_card',
            'title',
            'packagesPage',
            'packages'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($section, $is_card, PackagesPage $packagesPage)
    {
        abort_if(
            $is_card === '1' && in_array($section, ['1', '4', '7'], true),
            404
        );

        if(!$is_card) {
            $cardOrIntro = 'Intro';
        }
        else {
            $cardOrIntro = 'Card';
        }

        $title = 'Edit ' . $this->getTitle($section) . ' ' . $cardOrIntro; 
 
        return view('admin.packages-page.form', compact(
            'section',
            'is_card',
            'title',
            'packagesPage',
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $section, $is_card, PackagesPage $packagesPage)
    {
        abort_if(
            $is_card === '1' && in_array($section, ['1', '4', '7'], true),
            404
        );

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'support_title' => ['nullable', 'string', 'max:255'],
            'short_title' => [!$is_card  && $section == 6 ? 'required' : 'nullable', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'support_description' => ['nullable', 'string'],
            'key_services' => [$is_card  && $section == 3 ? 'required' : 'nullable', 'string'],
            'button_text' => ['nullable'],
            'button_url' => ['nullable', 'url'],
            'email' => ['nullable', 'email'],
            'website' => ['nullable', 'url'],
            'linkedin' => ['nullable', 'url'],
            'published' => ['nullable', 'boolean'],
            'featured' => ['nullable', 'boolean'],
            'most_popular' => ['nullable', 'boolean'],
            'display_order' => [$is_card ? 'required' : 'nullable', 'integer', 'min:0'],
        ]);

        $validated['published'] = $request->boolean('published');
        $validated['featured'] = $request->boolean('featured');
        $validated['most_popular'] = $request->boolean('most_popular');
        $validated['section'] = $section;
        $validated['is_card'] = $is_card;
 
        $packagesPage->update($validated);
 
        if(!$is_card) {
            return redirect()
                ->route('admin.packages-page.edit', ['section' => $section, 'is_card' => $is_card, 'packagesPage' => $packagesPage])
                ->with('success', 'Content updated successfully');
        }
        else {
            return redirect()
                ->route('admin.packages-page.index', ['section' => $section, 'is_card' => $is_card])
                ->with('success', 'Content updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($section, $is_card, PackagesPage $packagesPage)
    {
        abort_unless($is_card === '1', 404);
        abort_if(
            $is_card === '1' && in_array($section, ['1', '4', '7'], true),
            404
        );

        $packagesPage->packages()->delete();
        $packagesPage->delete();
 
        return redirect()
            ->back()
            ->with('success', 'Content deleted successfully');
    }

    public function togglePublish($section, $is_card, PackagesPage $packagesPage)
    {
        abort_if(
            $is_card === '1' && in_array($section, ['1', '4', '7'], true),
            404
        );
        
        $packagesPage->update(['published' => !$packagesPage->published]);
 
        $message = $packagesPage->published
            ? 'Content published successfully'
            : 'Content unpublished successfully';
 
        return back()->with('success', $message);
    }
}
