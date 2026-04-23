<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $search = '';
        $title = "Blog Category";
        if (isset($request->search) && !empty($request->search)) {
            $search = $request->search;
            $collections = BlogCategory::orderBy('id', 'desc')->where('menu', 'like', '%' . $request->search . '%')
                ->simplePaginate(20);
        } else {
            $collections = BlogCategory::orderBy('id', 'desc')->simplePaginate(20);
        }
        return view('admin.blog-category.index', compact('title', 'collections', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $blogCategory = new BlogCategory();
        $title = "Add Blog Category";
        
        return view('admin.blog-category.form', compact('blogCategory', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => ['required','string'],
            ],
            [],
            [
                //
            ]
        );

        $request->merge([ 'published' => $request->boolean('published') ]);

        BlogCategory::create($request->all());

        return redirect()->route('admin.blog-category.index')->with('success', "Category Added");
    }

    /**
     * Display the specified resource.
     */
    public function show(BlogCategory $blogCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BlogCategory $blogCategory)
    {
        $title = "Edit Blog Category";
        return view('admin.blog-category.form', compact('blogCategory', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BlogCategory $blogCategory)
    {
        $request->validate(
            [
                'name' => ['required','string'],
            ],
            [],
            [
                //
            ]
        );

        $request->merge([ 'published' => $request->boolean('published') ]);

        $blogCategory->update($request->all());

        return redirect()->route('admin.blog-category.index')->with('success', "Category Updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BlogCategory $blogCategory)
    {
        if ($blogCategory->blogs()->count() > 0) {
            return redirect()->back()->with('error', "Cannot delete: category has related blogs");
        }
        $blogCategory->delete();
        return redirect()->back()->with('success', "Category Deleted");
    }

    public function unpublish($id)
    {
        BlogCategory::where('id', $id)->update(['published' => false]);
        return redirect()->back()->with('success', "Category Unpublished");
    }

    public function publish($id)
    {
        BlogCategory::where('id', $id)->update(['published' => true]);
        return redirect()->back()->with('success', "Category Published");
    }
}
