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
        $title = "Work";
        if (isset($request->search) && !empty($request->search)) {
            $search = $request->search;
            $collections = Work::orderBy('id', 'desc')->where('menu', 'like', '%' . $request->search . '%')
                ->simplePaginate(20);
        } else {
            $collections = Work::orderBy('id', 'desc')->simplePaginate(20);
        }
        return view('admin.work.index', compact('title', 'collections', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Add Work";
        $work = new Work();
        $categories = WorkCategory::all();

        return view('admin.work.form', compact('title', 'work', 'categories'));
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
                'projectYear' => ['nullable', 'integer', 'between:1900,' . date('Y')],
                'coverImage' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
                'featuredImage' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            ],
            [
                'clientName.required' => 'The client name field is required.',
                'category_id.required' => 'The category field is required.',
            ]
        );

        $fileName = null;
        if ($request->hasFile('coverImage')) {
            $file = $request->file('coverImage');
            $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('backend_assets/work/cover-images'), $fileName);
        }

        $fileName2 = null;
        if ($request->hasFile('featuredImage')) {
            $file = $request->file('featuredImage');
            $fileName2 = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('backend_assets/work/featured-images'), $fileName2);
        }

        $data = $request->all();

        $data['published'] = $request->boolean('published');
        $data['featured'] = $request->boolean('featured');
        $data['coverImage'] = $fileName;
        $data['featuredImage'] = $fileName2;

        $work = Work::create($data);

        return redirect()->route('admin.work.gallery-images-form', $work->id)->with('success', 'Work added successfully');
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
        $title = "Edit Work";
        $categories = WorkCategory::all();
        return view('admin.work.form', compact('title', 'work', 'categories'));
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
                'projectYear' => ['nullable', 'integer', 'between:1900,' . date('Y')],
                'coverImage' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
                'featuredImage' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            ],
            [
                'clientName.required' => 'The client name field is required.',
                'category_id.required' => 'The category field is required.',
            ]
        );

        $fileName = $work->coverImage;
        if ($request->hasFile('coverImage')) {
            $file = $request->file('coverImage');
            $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('backend_assets/work/cover-image'), $fileName);

            if ($work->coverImage && file_exists(public_path('backend_assets/work/cover-images/' . $work->coverImage))) {
                unlink(public_path('backend_assets/work/cover-images/' . $work->coverImage));
            }
        }

        $fileName2 = $work->featuredImage;
        if ($request->hasFile('featuredImage')) {
            $file = $request->file('featuredImage');
            $fileName2 = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('backend_assets/work/featured-images'), $fileName2);

            if ($work->featuredImage && file_exists(public_path('backend_assets/work/featured-images/' . $work->featuredImage))) {
                unlink(public_path('backend_assets/work/featured-images/' . $work->featuredImage));
            }
        }

        $data = $request->all();

        $data['published'] = $request->boolean('published');
        $data['featured'] = $request->boolean('featured');
        $data['coverImage'] = $fileName;
        $data['featuredImage'] = $fileName2;

        $work->update($data);

        return redirect()->route('admin.work.gallery-images-form', $work->id)->with('success', "Work updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(work $work)
    {
        $work->delete();
        return redirect()->back()->with('success', "Work deleted successfully");
    }

    public function togglePublish($id)
    {
        $work = Work::findOrFail($id);
        $work->update(['published' => !$work->published]);

        $message = $work->published
            ? 'Work published successfully'
            : 'Work moved to draft';

        return back()->with('success', $message);
    }

    public function galleryImagesForm(Request $request, $id)
    {
        $work = Work::where('id', $id)->first();

        if (!$work) {
            return abort(404);
        }

        return view('admin.work.gallery-images-form')->with([
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
            $file->move(public_path('backend_assets/work/gallery-images'), $fileName);
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
            'backend_assets/work/gallery-images/' . $workGallery->image
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