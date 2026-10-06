<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MediaPage;
use Illuminate\Http\Request;

class MediaPageController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Section Titles
    |--------------------------------------------------------------------------
    */

    private function getTitle($section)
    {
        return match ((int) $section) {
            1 => 'Banner',
            2 => 'About Eagle Media House',
            default => 'Media Page',
        };
    }


    /*
    |--------------------------------------------------------------------------
    | Validation
    |--------------------------------------------------------------------------
    */

    private function validateSection(Request $request)
    {
        return $request->validate([

            'label' => [
                'nullable',
                'string',
                'max:255'
            ],

            'title' => [
                'required',
                'string',
                'max:255'
            ],

            'description' => [
                'nullable',
                'string'
            ],

            'additional_description' => [
                'nullable',
                'string'
            ],

            'button_text' => [
                'nullable',
                'string',
                'max:255'
            ],

            'button_url' => [
                'nullable',
                'string',
                'max:500'
            ],

            'button_text_2' => [
                'nullable',
                'string',
                'max:255'
            ],

            'button_url_2' => [
                'nullable',
                'string',
                'max:500'
            ],

            'button_text_3' => [
                'nullable',
                'string',
                'max:255'
            ],

            'button_url_3' => [
                'nullable',
                'string',
                'max:500'
            ],

            'published' => [
                'nullable',
                'boolean'
            ],

            'display_order' => [
                'nullable',
                'integer',
                'min:0'
            ],
        ]);
    }


    /*
    |--------------------------------------------------------------------------
    | Get Existing Section
    |--------------------------------------------------------------------------
    */

    private function getSectionPage($section)
    {
        return MediaPage::where('section', $section)
            ->first();
    }


    /*
    |--------------------------------------------------------------------------
    | Edit
    |--------------------------------------------------------------------------
    */

    public function edit($section)
    {
        if (!in_array((int) $section, [1, 2])) {
            abort(404);
        }

        $mediaPage = $this->getSectionPage($section);

        /*
        |--------------------------------------------------------------------------
        | Create Empty Model For First Time
        |--------------------------------------------------------------------------
        */

        if (!$mediaPage) {

            $mediaPage = new MediaPage();

            $mediaPage->section = $section;
            $mediaPage->published = false;
            $mediaPage->display_order = 0;
        }

        $title = 'Edit ' . $this->getTitle($section);

        return view(
            'admin.media-page.form',
            compact(
                'mediaPage',
                'section',
                'title'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Store
    |--------------------------------------------------------------------------
    */

    public function store(Request $request, $section)
    {
        if (!in_array((int) $section, [1, 2])) {
            abort(404);
        }

        /*
        |--------------------------------------------------------------------------
        | Prevent Duplicate Section
        |--------------------------------------------------------------------------
        */

        $existing = $this->getSectionPage($section);

        if ($existing) {

            return redirect()
                ->route('admin.media-page.edit', $section)
                ->with('info', 'This section already exists.');
        }

        $validated = $this->validateSection($request);

        $validated['section'] = (int) $section;

        $validated['published'] = $request->boolean('published');

        if ((int) $section === 1 || (int) $section === 2) {
            $validated['display_order'] = 0;
        }

        MediaPage::create($validated);

        return redirect()
            ->route('admin.media-page.edit', $section)
            ->with('success', $this->getTitle($section) . ' created successfully.');
    }


    /*
    |--------------------------------------------------------------------------
    | Update
    |--------------------------------------------------------------------------
    */

    public function update(Request $request, $section)
    {
        if (!in_array((int) $section, [1, 2])) {
            abort(404);
        }

        $mediaPage = $this->getSectionPage($section);

        /*
        |--------------------------------------------------------------------------
        | If Section Doesn't Exist
        |--------------------------------------------------------------------------
        */

        if (!$mediaPage) {

            $validated = $this->validateSection($request);

            $validated['section'] = (int) $section;
            $validated['published'] = $request->boolean('published');
            $validated['display_order'] = 0;

            MediaPage::create($validated);

            return redirect()
                ->route('admin.media-page.edit', $section)
                ->with('success', $this->getTitle($section) . ' created successfully.');
        }

        $validated = $this->validateSection($request);

        $validated['section'] = (int) $section;
        $validated['published'] = $request->boolean('published');
        $validated['display_order'] = 0;

        $mediaPage->update($validated);

        return redirect()
            ->route('admin.media-page.edit', $section)
            ->with('success', $this->getTitle($section) . ' updated successfully.');
    }


    /*
    |--------------------------------------------------------------------------
    | Toggle Publish
    |--------------------------------------------------------------------------
    */

    public function togglePublish($section)
    {
        $mediaPage = $this->getSectionPage($section);

        if (!$mediaPage) {

            return redirect()
                ->back()
                ->with('error', 'Section not found.');
        }

        $mediaPage->update([
            'published' => !$mediaPage->published,
        ]);

        return redirect()
            ->back()
            ->with('success', 'Publish status updated successfully.');
    }
}