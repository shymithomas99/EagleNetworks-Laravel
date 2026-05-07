<?php

namespace App\Http\Controllers\Admin;

use App\Helper;
use App\Http\Controllers\Controller;
use App\Models\VideoCategory;
use App\Models\VideoProject;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class VideoProjectController extends Controller
{
    // LIST
    public function index()
    {
        $videos = VideoProject::with('category')
            ->orderBy('display_order')
            ->get();

        return view('admin.videos.index', compact('videos'));
    }

    // CREATE PAGE
    public function create()
    {
        $categories = VideoCategory::orderBy('display_order')->get();
        return view('admin.videos.create', compact('categories'));
    }

    // STORE
    // public function store(Request $request)
    // {

    //     $request->validate([
    //         'title' => 'required|string|max:255',
    //         'slug' => 'nullable|string|max:255|unique:video_projects,slug',
    //         'client_name' => 'nullable|string|max:255',
    //         'category_id' => 'required|exists:video_categories,id',

    //         'video_url' => 'required|url|max:500',

    //         'description' => 'nullable|string',
    //         'duration' => 'nullable|string|max:50',

    //         'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

    //         'featured' => 'nullable|boolean',
    //         'display_order' => 'nullable|integer|min:0',
    //     ]);

    //     $thumbnail = null;
    //     $thumbnailKey = null;

    //     if ($request->hasFile('thumbnail')) {
    //         $upload = Helper::uploadToS3($request->file('thumbnail'), 'videos');

    //         $thumbnail = $upload['url'];
    //         $thumbnailKey = $upload['key'];
    //     }

    //     VideoProject::create([
    //         'title' => $request->title,
    //         'slug' => $request->slug ?: Str::slug($request->title),
    //         'client_name' => $request->client_name,
    //         'category_id' => $request->category_id,
    //         'video_url' => $request->video_url,
    //         'description' => $request->description,
    //         'duration' => $request->duration,
    //         'thumbnail_url' => $thumbnail,
    //         'featured' => $request->has('featured'),
    //         // 'published' => $request->action === 'publish',
    //         'published' => $request->has('published'),
    //         'display_order' => $request->display_order ?? 0,
    //     ]);

    //     return redirect()->route('admin.videos.index')->with('success', 'Video added!');
    // }


    //STORE
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:video_projects,slug',
            'client_name' => 'nullable|string|max:255',
            'category_id' => 'required|exists:video_categories,id',
            'video_url' => 'required|url|max:500',
            'description' => 'nullable|string',
            'duration' => 'nullable|string|max:50',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'featured' => 'nullable|boolean',
            'display_order' => 'nullable|integer|min:0',
        ]);

        $thumbnailPath = null;

        if ($request->hasFile('thumbnail')) {

            $file = $request->file('thumbnail');

            // ✅ Safe dimension check
            // $imageInfo = getimagesize($file->getRealPath());
            // if (!$imageInfo || $imageInfo[0] != 466 || $imageInfo[1] != 330) {
            //     return back()->with('error', "Image must be 466x330 pixels");
            // }

            // ✅ Ensure folder exists
            $destinationPath = public_path('backend_assets/images');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            // ✅ Unique filename
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

            // ✅ Move file
            $file->move($destinationPath, $filename);

            // ✅ Save path
            $thumbnailPath = 'backend_assets/images/' . $filename;
        }

        VideoProject::create([
            'title' => $request->title,
            'slug' => $request->slug ?: Str::slug($request->title),
            'client_name' => $request->client_name,
            'category_id' => $request->category_id,
            'video_url' => $request->video_url,
            'description' => $request->description,
            'duration' => $request->duration,
            'thumbnail_url' => $thumbnailPath,
            'featured' => $request->has('featured'),
            'published' => $request->has('published'),
            'display_order' => $request->display_order ?? 0,
        ]);

        return redirect()->route('admin.videos.index')->with('success', 'Video added!');
    }



    //  EDIT PAGE
    public function edit($id)
    {
        $video = VideoProject::findOrFail($id);
        $categories = VideoCategory::all();

        return view('admin.videos.edit', compact('video', 'categories'));
    }




    // //  UPDATE
    // public function update(Request $request, $id)
    // {


    //     // ✅ Validation MUST be inside method
    //     $request->validate([
    //         'title' => 'required|string|max:255',
    //         'slug' => 'nullable|string|max:255|unique:video_projects,slug,' . $id,
    //         'client_name' => 'nullable|string|max:255',
    //         'category_id' => 'required|exists:video_categories,id',

    //         'video_url' => 'required|url|max:500',

    //         'description' => 'nullable|string',
    //         'duration' => 'nullable|string|max:50',

    //         'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

    //         'featured' => 'nullable|boolean',
    //         'display_order' => 'nullable|integer|min:0',
    //     ]);


    //     $video = VideoProject::findOrFail($id);
    //     if ($request->hasFile('thumbnail')) {

    //         // delete old image
    //         if ($video->thumbnail_url && file_exists(public_path($video->thumbnail_url))) {
    //             unlink(public_path($video->thumbnail_url));
    //         }

    //         $file = $request->file('thumbnail');

    //         list($width, $height) = getimagesize($file->getRealPath());
    //         if ($width != 466 || $height != 330) {
    //             return back()->with('error', "Image must be 466x330");
    //         }

    //         $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

    //         $file->move(public_path('backend_assets/images'), $filename);

    //         $video->thumbnail_url = 'backend_assets/images/' . $filename;
    //     }


    //     $video->update([
    //         'title' => $request->title,
    //         'slug' => $request->slug ?: Str::slug($request->title),
    //         'client_name' => $request->client_name,
    //         'category_id' => $request->category_id,
    //         'video_url' => $request->video_url,
    //         'description' => $request->description,
    //         'duration' => $request->duration,
    //         'featured' => $request->has('featured'),
    //         // 'published' => $request->action === 'publish',
    //         'published' => $request->has('published'),
    //         'display_order' => $request->display_order ?? 0,
    //     ]);

    //     return redirect()->route('admin.videos.index')->with('success', 'Updated!');
    // }

    // UPDATE
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:video_projects,slug,' . $id,
            'client_name' => 'nullable|string|max:255',
            'category_id' => 'required|exists:video_categories,id',
            'video_url' => 'required|url|max:500',
            'description' => 'nullable|string',
            'duration' => 'nullable|string|max:50',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'featured' => 'nullable|boolean',
            'display_order' => 'nullable|integer|min:0',
        ]);

        $video = VideoProject::findOrFail($id);

        $thumbnailPath = $video->thumbnail_url;

        if ($request->hasFile('thumbnail')) {

            // ✅ Delete old image
            if ($video->thumbnail_url && file_exists(public_path($video->thumbnail_url))) {
                unlink(public_path($video->thumbnail_url));
            }

            $file = $request->file('thumbnail');

            // ✅ Safe dimension check
            // $imageInfo = getimagesize($file->getRealPath());
            // if (!$imageInfo || $imageInfo[0] != 466 || $imageInfo[1] != 330) {
            //     return back()->with('error', "Image must be 466x330 pixels");
            // }

            // ✅ Ensure folder exists
            $destinationPath = public_path('backend_assets/images');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            // ✅ Unique filename
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

            // ✅ Move file
            $file->move($destinationPath, $filename);

            $thumbnailPath = 'backend_assets/images/' . $filename;
        }

        $video->update([
            'title' => $request->title,
            'slug' => $request->slug ?: Str::slug($request->title),
            'client_name' => $request->client_name,
            'category_id' => $request->category_id,
            'video_url' => $request->video_url,
            'description' => $request->description,
            'duration' => $request->duration,
            'thumbnail_url' => $thumbnailPath, // ✅ FIXED
            'featured' => $request->has('featured'),
            'published' => $request->has('published'),
            'display_order' => $request->display_order ?? 0,
        ]);

        return redirect()->route('admin.videos.index')->with('success', 'Updated!');
    }


    // //  DELETE
    // public function destroy($id)
    // {
    //     VideoProject::findOrFail($id)->delete();
    //     return back()->with('success', 'Deleted!');
    // }

    public function togglePublish($id)
    {
        $video = VideoProject::findOrFail($id);
        $video->update(['published' => !$video->published]);

        $message = $video->published
            ? 'Video published successfully'
            : 'Video moved to draft';

        return back()->with('success', $message);
    }

    public function publish($id)
    {
        $video = VideoProject::findOrFail($id);

        if ($video->published) {
            return back()->with('info', 'Video is already published');
        }

        $video->update(['published' => true]);

        return back()->with('success', 'Video published successfully');
    }

    // public function destroy($id)
    // {
    //     $video = VideoProject::findOrFail($id);

    //     // delete from S3
    //     // Helper::deleteFromS3($video->thumbnail_key);

    //     // $video->delete();

    //     if ($video->thumbnail_url && file_exists(public_path($video->thumbnail_url))) {
    //         unlink(public_path($video->thumbnail_url));
    //     }
    //     $video->delete();

    //     return back()->with('success', 'Deleted!');
    // }


    // DELETE
    public function destroy($id)
    {
        $video = VideoProject::findOrFail($id);

        // ✅ Delete image
        if ($video->thumbnail_url && file_exists(public_path($video->thumbnail_url))) {
            unlink(public_path($video->thumbnail_url));
        }

        $video->delete();

        return back()->with('success', 'Deleted!');
    }
}
