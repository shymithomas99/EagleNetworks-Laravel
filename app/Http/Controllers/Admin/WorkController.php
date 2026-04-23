<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Work;
use App\Models\WorkCategory;
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
                'title' => ['required','string'],
                'slug' => ['required','string', 'alpha_dash', 'unique:works,slug'],
                'clientName' => ['required','string'],
                'category_id' => ['required', 'exists:work_categories,id'],
                'projectYear' => ['nullable', 'integer', 'between:1900,' . date('Y')],
            ],
            [
                'clientName.required' => 'The client name field is required.',
                'category_id.required' => 'The category field is required.',
            ]
        );

        $request->merge([ 'published' => $request->boolean('published'), 'featured' => $request->boolean('featured') ]);

        Work::create($request->all());

        return redirect()->route('admin.work.index')->with('success', "Work Added");
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
                'title' => ['required','string'],
                'slug' => ['required','string', 'alpha_dash', Rule::unique('works', 'slug')->ignore($work->id)],
                'clientName' => ['required','string'],
                'category_id' => ['required', 'exists:work_categories,id'],
                'projectYear' => ['nullable', 'integer', 'between:1900,' . date('Y')],
            ],
            [
                'clientName.required' => 'The client name field is required.',
                'category_id.required' => 'The category field is required.',
            ]
        );

        $request->merge([ 'published' => $request->boolean('published'), 'featured' => $request->boolean('featured') ]);

        $work->update($request->all());

        return redirect()->route('admin.work.index')->with('success', "work Updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(work $work)
    {
        $work->delete();
        return redirect()->back()->with('success', "Work Deleted");
    }

    public function unpublish($id)
    {
        Work::where('id', $id)->update(['published' => false]);
        return redirect()->back()->with('success', "Work Unpublished");
    }

    public function publish($id)
    {
        Work::where('id', $id)->update(['published' => true]);
        return redirect()->back()->with('success', "Work Published");
    }
}
