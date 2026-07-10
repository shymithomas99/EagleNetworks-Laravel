<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $search = '';
        $title = "Author";
        if (isset($request->search) && !empty($request->search)) {
            $search = $request->search;
            $collections = Author::orderBy('id', 'desc')->where('menu', 'like', '%' . $request->search . '%')
                ->simplePaginate(20);
        } else {
            $collections = Author::orderBy('id', 'desc')->simplePaginate(20);
        }
        return view('admin.authors.index', compact('title', 'collections', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Add Author";
        $author = new Author();

        return view('admin.authors.form', compact('title', 'author'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => ['required','string'],
                'designation' => ['required','string'],
                'about' => ['required','string'],
                'image' => ['required','image','mimes:jpg,jpeg,png,webp','max:2048'],
            ]
        );

        $fileName = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('backend_assets/authors'), $fileName);
        }

        $data = $request->all();
        $data['image'] = $fileName;

        Author::create($data);

        return redirect()->route('admin.authors.index')->with('success', "Author added successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author)
    {
        $title = "Edit Author";
        return view('admin.authors.form', compact('title', 'author'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Author $author)
    {
        $request->validate(
            [
                'name' => ['required','string'],
                'designation' => ['required','string'],
                'about' => ['required','string'],
                'image' => ['required','image','mimes:jpg,jpeg,png,webp','max:2048'],
            ]
        );

        $fileName = $author->image;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('backend_assets/authors'), $fileName);
            
            if ($author->image && file_exists(public_path('backend_assets/authors/' . $author->image))) {
                unlink(public_path('backend_assets/authors/' . $author->image));
            }
        }

        $data = $request->all();

        $data['published'] = $request->boolean('published');
        $data['image'] = $fileName;

        $author->update($data);

        return redirect()->route('admin.authors.index')->with('success', "Author updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        $author->delete();
        return redirect()->back()->with('success', "Author deleted successfully");
    }
}
