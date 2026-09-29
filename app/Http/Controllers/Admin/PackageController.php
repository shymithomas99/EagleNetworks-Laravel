<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\PackagesPage;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    private function getTitle($section)
    {
        return match ((int) $section) {
                        1 => 'Banner',
                        2 => 'For',
                        3 => 'Service',
                        4 => 'How We Work',
                        5 => 'CTA Banner (Bottom)'
                    };
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, PackagesPage $packagesPage, $section, $is_card)
    {
        abort_unless($packagesPage->section === 3 && $packagesPage->is_card == 1 && $is_card === '1', 404);
        abort_if(
            in_array($section, ['1', '5'], true),
            404
        );

        $title = $this->getTitle($section) . ' Cards';
 
        $search = $request->input('search', '');
 
        $collections = Package::query()
            ->when($search, function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%');
            })
            ->where('packages_page_id', $packagesPage->id)
            ->where('section', $section)
            ->where('is_card', 1)
            ->latest('id')
            ->simplePaginate(20)
            ->withQueryString();
 
        return view('admin.packages.index', compact(
            'packagesPage',
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
    public function create(PackagesPage $packagesPage, $section, $is_card)
    {
        abort_unless($packagesPage->section === 3 && $packagesPage->is_card == 1 && $is_card === '1', 404);
        abort_if(
            in_array($section, ['1', '5'], true),
            404
        );

        $title = 'Add ' . $this->getTitle($section) . ' Card';
 
        $package = new Package();
 
        return view('admin.packages.form', compact(
            'packagesPage',
            'section',
            'is_card',
            'title',
            'package',
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, PackagesPage $packagesPage, $section, $is_card)
    {
        abort_unless($packagesPage->section === 3 && $packagesPage->is_card == 1 && $is_card === '1', 404);
        abort_if(
            in_array($section, ['1', '5'], true),
            404
        );

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'additional_title' => [$is_card  && $section == 2 ? 'required' : 'nullable', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'key_points' => [$is_card  && $section == 2 ? 'required' : 'nullable', 'string'],
            'button1_text' => ['nullable'],
            'button1_url' => ['nullable', 'url'],
            'button2_text' => ['nullable'],
            'button2_url' => ['nullable', 'url'],
            'email' => ['nullable', 'email'],
            'website' => ['nullable', 'url'],
            'linkedin' => ['nullable', 'url'],
            'published' => ['nullable', 'boolean'],
            'display_order' => [$is_card ? 'required' : 'nullable', 'integer', 'min:0'],
        ]);

        $validated['published'] = $request->boolean('published');
        $validated['packages_page_id'] = $packagesPage->id;
        $validated['section'] = $section;
        $validated['is_card'] = $is_card;
 
        Package::create($validated);
 
        return redirect()
            ->route('admin.packages.index', ['packagesPage' => $packagesPage, 'section' => $section, 'is_card' => $is_card])
            ->with('success', 'Content added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(PackagesPage $packagesPage, $section, $is_card, Package $package)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PackagesPage $packagesPage, $section, $is_card, Package $package)
    {
        abort_unless($packagesPage->section === 3 && $packagesPage->is_card == 1, 404);
        abort_if(
            $is_card === '1' && in_array($section, ['1', '5'], true),
            404
        );

        if(!$is_card) {
            $cardOrIntro = 'Intro';
        }
        else {
            $cardOrIntro = 'Card';
        }

        $title = 'Edit ' . $this->getTitle($section) . ' ' . $cardOrIntro;
 
        return view('admin.packages.form', compact(
            'packagesPage',
            'section',
            'is_card',
            'title',
            'package',
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PackagesPage $packagesPage, $section, $is_card, Package $package)
    {
        abort_unless($packagesPage->section === 3 && $packagesPage->is_card == 1, 404);
        abort_if(
            $is_card === '1' && in_array($section, ['1', '5'], true),
            404
        );

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'additional_title' => [$is_card  && $section == 2 ? 'required' : 'nullable', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'key_points' => [$is_card  && $section == 2 ? 'required' : 'nullable', 'string'],
            'button1_text' => ['nullable'],
            'button1_url' => ['nullable', 'url'],
            'button2_text' => ['nullable'],
            'button2_url' => ['nullable', 'url'],
            'email' => ['nullable', 'email'],
            'website' => ['nullable', 'url'],
            'linkedin' => ['nullable', 'url'],
            'published' => ['nullable', 'boolean'],
            'display_order' => [$is_card ? 'required' : 'nullable', 'integer', 'min:0'],
        ]);

        $validated['published'] = $request->boolean('published');
        $validated['packages_page_id'] = $packagesPage->id;
        $validated['section'] = $section;
        $validated['is_card'] = $is_card;

        $package->update($validated);
 
        if(!$is_card) {
            return redirect()
                ->route('admin.packages.edit', ['packagesPage' => $packagesPage, 'section' => $section, 'is_card' => $is_card, 'package' => $package])
                ->with('success', 'Content updated successfully');
        }
        else {
            return redirect()
                ->route('admin.packages.index', ['packagesPage' => $packagesPage, 'section' => $section, 'is_card' => $is_card])
                ->with('success', 'Content updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PackagesPage $packagesPage, $section, $is_card, Package $package)
    {
        abort_unless($packagesPage->section === 3 && $packagesPage->is_card == 1 && $is_card === '1', 404);
        abort_if(
            in_array($section, ['1', '5'], true),
            404
        );

        $package->delete();
 
        return redirect()
            ->back()
            ->with('success', 'Content deleted successfully');
    }

    public function togglePublish(PackagesPage $packagesPage, $section, $is_card, Package $package)
    {
        abort_unless($packagesPage->section === 3 && $packagesPage->is_card == 1 && $is_card === '1', 404);
        abort_if(
            in_array($section, ['1', '5'], true),
            404
        );
        
        $package->update(['published' => !$package->published]);
 
        $message = $package->published
            ? 'Content published successfully'
            : 'Content unpublished successfully';
 
        return back()->with('success', $message);
    }
}
