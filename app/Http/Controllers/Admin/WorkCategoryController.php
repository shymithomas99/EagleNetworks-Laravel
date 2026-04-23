<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WorkCategory;
use Illuminate\Http\Request;

class WorkCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $search = '';
        $title = "Work Category";
        if (isset($request->search) && !empty($request->search)) {
            $search = $request->search;
            $collections = WorkCategory::orderBy('id', 'desc')->where('menu', 'like', '%' . $request->search . '%')
                ->simplePaginate(20);
        } else {
            $collections = WorkCategory::orderBy('id', 'desc')->simplePaginate(20);
        }
        return view('admin.work-category.index', compact('title', 'collections', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $workCategory = new WorkCategory();
        $title = "Add Work Category";
        
        return view('admin.work-category.form', compact('workCategory', 'title'));
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

        WorkCategory::create($request->all());

        return redirect()->route('admin.work-category.index')->with('success', "Category Added");
    }

    /**
     * Display the specified resource.
     */
    public function show(WorkCategory $workCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WorkCategory $workCategory)
    {
        $title = "Edit Work Category";
        return view('admin.work-category.form', compact('workCategory', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, WorkCategory $workCategory)
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

        $workCategory->update($request->all());

        return redirect()->route('admin.work-category.index')->with('success', "Category Updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WorkCategory $workCategory)
    {
        if ($workCategory->works()->count() > 0) {
            return redirect()->back()->with('error', "Cannot delete: category has related works");
        }
        $workCategory->delete();
        return redirect()->back()->with('success', "Work Deleted");
    }

    public function unpublish($id)
    {
        WorkCategory::where('id', $id)->update(['published' => false]);
        return redirect()->back()->with('success', "Work Unpublished");
    }

    public function publish($id)
    {
        WorkCategory::where('id', $id)->update(['published' => true]);
        return redirect()->back()->with('success', "Work Published");
    }
}
