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
    public function store(Request $request)
    {
        // $request->validate([
        //     'title' => 'required',
        //     'video_url' => 'required|url',
        //     'category_id' => 'required',
        // ]);

        // $thumbnail = null;

        // if ($request->hasFile('thumbnail')) {
        //     $path = $request->file('thumbnail')->store('videos', 'public');
        //     $thumbnail = asset('storage/' . $path);
        // }


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

        $thumbnail = null;
        $thumbnailKey = null;

        if ($request->hasFile('thumbnail')) {
            $upload = Helper::uploadToS3($request->file('thumbnail'), 'videos');

            $thumbnail = $upload['url'];
            $thumbnailKey = $upload['key'];
        }

        VideoProject::create([
            'title' => $request->title,
            'slug' => $request->slug ?: Str::slug($request->title),
            'client_name' => $request->client_name,
            'category_id' => $request->category_id,
            'video_url' => $request->video_url,
            'description' => $request->description,
            'duration' => $request->duration,
            'thumbnail_url' => $thumbnail,
            'featured' => $request->has('featured'),
            'published' => $request->action === 'publish',
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

    //  UPDATE
    public function update(Request $request, $id)
    {


        // ✅ Validation MUST be inside method
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

        // if ($request->hasFile('thumbnail')) {
        //     $path = $request->file('thumbnail')->store('videos', 'public');
        //     $video->thumbnail_url = asset('storage/' . $path);
        // }

        if ($request->hasFile('thumbnail')) {

            // delete old image
            Helper::deleteFromS3($video->thumbnail_key);

            // upload new image
            $upload = Helper::uploadToS3($request->file('thumbnail'), 'videos');

            $video->thumbnail_url = $upload['url'];
            $video->thumbnail_key = $upload['key'];
        }

        $video->update([
            'title' => $request->title,
            'slug' => $request->slug ?: Str::slug($request->title),
            'client_name' => $request->client_name,
            'category_id' => $request->category_id,
            'video_url' => $request->video_url,
            'description' => $request->description,
            'duration' => $request->duration,
            'featured' => $request->has('featured'),
            'published' => $request->action === 'publish',
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


    public function destroy($id)
    {
        $video = VideoProject::findOrFail($id);

        // delete from S3
        Helper::deleteFromS3($video->thumbnail_key);

        $video->delete();

        return back()->with('success', 'Deleted!');
    }
}
