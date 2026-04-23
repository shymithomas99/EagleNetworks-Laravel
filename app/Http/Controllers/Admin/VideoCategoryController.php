<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VideoCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class VideoCategoryController extends Controller
{
    public function index()
    {
        $categories = VideoCategory::orderBy('display_order')->get();
        return view('admin.categories.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:video_categories,name',
        ]);

        $slug = Str::slug($request->name);
        $count = VideoCategory::where('slug', 'LIKE', "{$slug}%")->count();

        if ($count) {
            $slug .= '-' . ($count + 1);
        }

        VideoCategory::create([
            'name' => $request->name,
            'slug' => $slug,
            'display_order' => $request->display_order ?? 0,
        ]);

        return back()->with('success', 'Category created successfully!');
    }

    // ✅ ADD THIS
    public function edit($id)
    {
        $category = VideoCategory::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }

    // ✅ ADD THIS
    public function update(Request $request, $id)
    {
        $category = VideoCategory::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255|unique:video_categories,name,' . $id,
        ]);

        $category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'display_order' => $request->display_order ?? 0,
        ]);

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category updated successfully!');
    }

    // ✅ ADD THIS
    public function destroy($id)
    {
        VideoCategory::findOrFail($id)->delete();
        return back()->with('success', 'Category deleted!');
    }
}