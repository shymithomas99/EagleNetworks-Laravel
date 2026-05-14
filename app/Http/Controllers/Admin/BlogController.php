<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $search = '';
        $title = "Blog";
        if (isset($request->search) && !empty($request->search)) {
            $search = $request->search;
            $collections = Blog::orderBy('id', 'desc')->where('menu', 'like', '%' . $request->search . '%')
                ->simplePaginate(20);
        } else {
            $collections = Blog::orderBy('id', 'desc')->simplePaginate(20);
        }
        return view('admin.blog.index', compact('title', 'collections', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Add Blog";
        $blog = new Blog();
        $categories = BlogCategory::all();

        return view('admin.blog.form', compact('title', 'blog', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'title' => ['required','string'],
                'slug' => ['required','string', 'alpha_dash', 'unique:blogs,slug'],
                'author' => ['required','string'],
                'category_id' => ['required', 'exists:blog_categories,id'],
                'body' => ['required','string'],
                'coverImage' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            ],
            [
                'category_id.required' => 'Please select a category.',
            ]
        );

        $fileName = null;
        if ($request->hasFile('coverImage')) {
            $file = $request->file('coverImage');
            $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('backend_assets/images'), $fileName);
        }

        $data = $request->all();

        $data['published'] = $request->boolean('published');
        $data['coverImage'] = $fileName;

        Blog::create($data);

        return redirect()->route('admin.blog.index')->with('success', "Blog added successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        $title = "Edit Blog";
        $categories = BlogCategory::all();
        return view('admin.blog.form', compact('title', 'blog', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        $request->validate(
            [
                'title' => ['required','string'],
                'slug' => ['required','string', 'alpha_dash', Rule::unique('blogs', 'slug')->ignore($blog->id)],
                'author' => ['required','string'],
                'category_id' => ['required', 'exists:blog_categories,id'],
                'body' => ['required','string'],
                'coverImage' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            ],
            [
                'category_id.required' => 'Please select a category.',
            ]
        );

        $fileName = $blog->coverImage;
        if ($request->hasFile('coverImage')) {
            $file = $request->file('coverImage');
            $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('backend_assets/images'), $fileName);
            
            if ($blog->coverImage && file_exists(public_path('backend_assets/images/' . $blog->coverImage))) {
                unlink(public_path('backend_assets/images/' . $blog->coverImage));
            }
        }

        $data = $request->all();

        $data['published'] = $request->boolean('published');
        $data['coverImage'] = $fileName;

        $blog->update($data);

        return redirect()->route('admin.blog.index')->with('success', "Blog updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()->back()->with('success', "Blog deleted successfully");
    }

    public function togglePublish($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->update(['published' => !$blog->published]);

        $message = $blog->published
        ? 'Blog published successfully'
        : 'Blog moved to draft';

        return back()->with('success', $message);
    }
}
