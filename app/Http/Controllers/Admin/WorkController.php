<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Work;
use App\Models\WorkCategory;
use App\Models\WorkGallery;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $search = '';
        $title = "Work Cards";
        if (isset($request->search) && !empty($request->search)) {
            $search = $request->search;
            $collections = Work::orderBy('id', 'desc')->where('menu', 'like', '%' . $request->search . '%')
                ->simplePaginate(20);
        } else {
            $collections = Work::orderBy('id', 'desc')->simplePaginate(20);
        }
        return view('admin.works.index', compact('title', 'collections', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Add Work Card";
        $work = new Work();
        $categories = WorkCategory::all();

        return view('admin.works.form', compact('title', 'work', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'cover_title' => ['required', 'string'],
                'core_service_1' => ['required', 'string'],
                'core_service_2' => ['required', 'string'],
                'title' => ['required', 'string'],
                'slug' => ['required', 'string', 'alpha_dash', 'unique:works,slug'],
                'clientName' => ['required', 'string'],
                'category_id' => ['required', 'exists:work_categories,id'],
                'projectYear' => ['nullable'],
                'excerpt' => ['required', 'string'],
                'coverImage' => 'required|image|mimes:jpg,jpeg,png,webp|dimensions:width=1280,height=780|max:1024',
                'featuredImage' => 'nullable|image|mimes:jpg,jpeg,png,webp|dimensions:width=776,height=417|max:1024',
                'briefMediaType' => ['nullable', 'in:1,2'],
                'briefImage' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'dimensions:width=1280,height=780', 'max:1024', Rule::requiredIf($request->briefMediaType == 1)],
                'briefVideoUrl' => ['nullable', 'url', Rule::requiredIf($request->briefMediaType == 2)],
                'cta_title' => ['nullable', 'string', 'max:512'],
                'cta_description' => ['nullable', 'string'],

                'cta_button_text' => ['nullable', 'string', 'max:255'],
                'cta_button_url' => ['nullable', 'string', 'max:512'],

                'cta_button_text_2' => ['nullable', 'string', 'max:255'],
                'cta_button_url_2' => ['nullable', 'string', 'max:512'],

                'cta_button_text_3' => ['nullable', 'string', 'max:255'],
                'cta_button_url_3' => ['nullable', 'string', 'max:512']
            ],
            [
                //
            ],
            [
                'briefMediaType' => 'brief media type',
                'briefImage' => 'brief image',
                'briefVideoUrl' => 'brief video URL',
                'coverImage' => 'cover image',
                'featuredImage' => 'featured image',
                'clientName' => 'client name',
                'category_id' => 'category',
                'projectYear' => 'project year',
                'cover_title' => 'cover title',
                'core_service_1' => 'core service 1',
                'core_service_2' => 'core service 2',
            ]
        );

        $fileName = null;
        if ($request->hasFile('coverImage')) {
            $file = $request->file('coverImage');
            $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('backend_assets/works/cover-images'), $fileName);
        }

        $fileName2 = null;
        if ($request->hasFile('featuredImage')) {
            $file2 = $request->file('featuredImage');
            $fileName2 = time() . '_' . uniqid() . '.' . $file2->getClientOriginalExtension();
            $file2->move(public_path('backend_assets/works/featured-images'), $fileName2);
        }

        $fileName3 = null;
        if ($request->hasFile('briefImage') && $request->briefMediaType == '1') {
            $file3 = $request->file('briefImage');
            $fileName3 = time() . '_' . uniqid() . '.' . $file3->getClientOriginalExtension();
            $file3->move(public_path('backend_assets/works/brief-images'), $fileName3);
        }

        $data = $request->all();

        $data['published'] = $request->boolean('published');
        $data['featured'] = $request->boolean('featured');
        $data['coverImage'] = $fileName;
        $data['featuredImage'] = $fileName2;
        $data['briefImage'] = $fileName3;

        $work = Work::create($data);

        return redirect()->route('admin.works.gallery-images-form', $work->id)->with('success', 'Content added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Work $work)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Work $work)
    {
        $title = "Edit Work Card";
        $categories = WorkCategory::all();
        return view('admin.works.form', compact('title', 'work', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Work $work)
    {
        $request->validate(
            [
                'cover_title' => ['required', 'string'],
                'core_service_1' => ['required', 'string'],
                'core_service_2' => ['required', 'string'],
                'title' => ['required', 'string'],
                'slug' => ['required', 'string', 'alpha_dash', Rule::unique('works', 'slug')->ignore($work->id)],
                'clientName' => ['required', 'string'],
                'category_id' => ['required', 'exists:work_categories,id'],
                'projectYear' => ['nullable'],
                'excerpt' => ['required', 'string'],
                'coverImage' => 'nullable|image|mimes:jpg,jpeg,png,webp|dimensions:width=1280,height=780|max:1024',
                'featuredImage' => 'nullable|image|mimes:jpg,jpeg,png,webp|dimensions:width=776,height=417|max:1024',
                'briefMediaType' => ['nullable', 'in:1,2'],
                // 'briefImage' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'dimensions:width=1280,height=780', 'max:1024', Rule::requiredIf($request->briefMediaType == 1)],
                'briefImage' => [
                    'nullable',
                    'image',
                    'mimes:jpg,jpeg,png,webp',
                    'dimensions:width=1280,height=780',
                    'max:1024',
                    Rule::requiredIf(
                        $request->briefMediaType == 1 && empty($work->briefImage)
                    ),
                ],
                'briefVideoUrl' => ['nullable', 'url', Rule::requiredIf($request->briefMediaType == 2)],
                'cta_title' => ['nullable', 'string', 'max:512'],
                'cta_description' => ['nullable', 'string'],

                'cta_button_text' => ['nullable', 'string', 'max:255'],
                'cta_button_url' => ['nullable', 'string', 'max:512'],

                'cta_button_text_2' => ['nullable', 'string', 'max:255'],
                'cta_button_url_2' => ['nullable', 'string', 'max:512'],

                'cta_button_text_3' => ['nullable', 'string', 'max:255'],
                'cta_button_url_3' => ['nullable', 'string', 'max:512']
            ],
            [
                //
            ],
            [
                'briefMediaType' => 'brief media type',
                'briefImage' => 'brief image',
                'briefVideoUrl' => 'brief video URL',
                'coverImage' => 'cover image',
                'featuredImage' => 'featured image',
                'clientName' => 'client name',
                'category_id' => 'category',
                'projectYear' => 'project year',
                'cover_title' => 'cover title',
                'core_service_1' => 'core service 1',
                'core_service_2' => 'core service 2',
            ]
        );

        $fileName = $work->coverImage;
        if ($request->hasFile('coverImage')) {
            $file = $request->file('coverImage');
            $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('backend_assets/works/cover-images'), $fileName);

            if ($work->coverImage && file_exists(public_path('backend_assets/works/cover-images/' . $work->coverImage))) {
                unlink(public_path('backend_assets/works/cover-images/' . $work->coverImage));
            }
        }

        $fileName2 = $work->featuredImage;
        if ($request->hasFile('featuredImage')) {
            $file2 = $request->file('featuredImage');
            $fileName2 = time() . '_' . uniqid() . '.' . $file2->getClientOriginalExtension();
            $file2->move(public_path('backend_assets/works/featured-images'), $fileName2);

            if ($work->featuredImage && file_exists(public_path('backend_assets/works/featured-images/' . $work->featuredImage))) {
                unlink(public_path('backend_assets/works/featured-images/' . $work->featuredImage));
            }
        }

        // $fileName3 = $work->briefImage;
        // if ($request->hasFile('briefImage') && $request->briefMediaType == '1') {
        //     $file3 = $request->file('briefImage');
        //     $fileName3 = time() . '_' . uniqid() . '.' . $file3->getClientOriginalExtension();
        //     $file3->move(public_path('backend_assets/works/brief-images'), $fileName3);

        //     if ($work->briefImage && file_exists(public_path('backend_assets/works/brief-images/' . $work->briefImage))) {
        //         unlink(public_path('backend_assets/works/brief-images/' . $work->briefImage));
        //     }
        // } else {
        //     $fileName3 = null;
        //     if ($work->briefImage && file_exists(public_path('backend_assets/works/brief-images/' . $work->briefImage))) {
        //         unlink(public_path('backend_assets/works/brief-images/' . $work->briefImage));
        //     }
        // }


        $fileName3 = $work->briefImage;

        if ($request->briefMediaType == '1') {

            // Keep existing image if no new image is uploaded
            if ($request->hasFile('briefImage')) {

                $file3 = $request->file('briefImage');

                $fileName3 = time() . '_' . uniqid() . '.' . $file3->getClientOriginalExtension();

                $file3->move(
                    public_path('backend_assets/works/brief-images'),
                    $fileName3
                );

                // Delete old image only after new image is uploaded
                if (
                    $work->briefImage &&
                    file_exists(
                        public_path('backend_assets/works/brief-images/' . $work->briefImage)
                    )
                ) {
                    unlink(
                        public_path('backend_assets/works/brief-images/' . $work->briefImage)
                    );
                }
            }
        } else {

            // If media type is not Image, remove existing brief image
            $fileName3 = null;

            if (
                $work->briefImage &&
                file_exists(
                    public_path('backend_assets/works/brief-images/' . $work->briefImage)
                )
            ) {
                unlink(
                    public_path('backend_assets/works/brief-images/' . $work->briefImage)
                );
            }
        }

        $data = $request->all();

        $data['published'] = $request->boolean('published');
        $data['featured'] = $request->boolean('featured');
        $data['coverImage'] = $fileName;
        $data['featuredImage'] = $fileName2;
        $data['briefImage'] = $fileName3;

        $work->update($data);

        return redirect()->route('admin.works.gallery-images-form', $work->id)->with('success', "Content updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Work $work)
    {
        $work->delete();
        return redirect()->back()->with('success', "Content deleted successfully");
    }

    public function togglePublish($id)
    {
        $work = Work::findOrFail($id);
        $work->update(['published' => !$work->published]);

        $message = $work->published
            ? 'Content published successfully'
            : 'Content unpublished successfully';

        return back()->with('success', $message);
    }

    public function galleryImagesForm(Request $request, $id)
    {
        $work = Work::where('id', $id)->first();

        if (!$work) {
            return abort(404);
        }

        return view('admin.works.gallery-images-form')->with([
            'work' => $work,
        ]);
    }

    public function uploadImage(Request $request)
    {
        $request->validate([
            'file' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $work = Work::findOrFail($request->id);

        if (!empty($request->file('file'))) {
            $file = $request->file('file');
            $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('backend_assets/works/gallery-images'), $fileName);
            $workGallery = WorkGallery::create([
                'work_id' => $work->id,
                'image'   => $fileName,
            ]);

            return response()->json([
                'success' => true,
                'image_id' => $workGallery->id,
            ]);
        }

        return response()->json(['error' => 'File upload failed']);
    }

    public function deleteImage(Request $request)
    {
        $workGallery = WorkGallery::findOrFail($request->id);

        $path = public_path(
            'backend_assets/works/gallery-images/' . $workGallery->image
        );

        if (file_exists($path)) {
            unlink($path);
        }

        $workGallery->delete();

        return response()->json([
            'success' => true
        ]);
    }
}