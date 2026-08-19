<?php

namespace App\Http\Controllers\Admin;

use App\Enums\BlogContentType;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    /**
     * Display a listing of blogs.
     */
    public function index(Request $request)
    {
        $title = 'Blog';

        $search = $request->input('search', '');

        $collections = Blog::query()
            ->with(['category'])
            ->when($search, function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%');
            })
            ->latest('id')
            ->simplePaginate(20)
            ->withQueryString();

        return view('admin.blog.index', compact(
            'title',
            'collections',
            'search'
        ));
    }

    /**
     * Show create form.
     */
    public function create()
    {
        $title = 'Add Blog';

        $blog = new Blog();

        $authors = Author::orderByDesc('id')->get();

        $categories = BlogCategory::where('published', 1)
            ->orderByDesc('id')
            ->get();

        $contentTypes = BlogContentType::cases();

        return view('admin.blog.form', compact(
            'title',
            'blog',
            'authors',
            'categories',
            'contentTypes'
        ));
    }

    /**
     * Store blog.
     */
    public function store(Request $request)
    {
        $validated = $this->validateBlog($request);

        $fileName = null;

        if ($request->hasFile('coverImage')) {
            $file = $request->file('coverImage');

            $fileName = time() . '_' .
                uniqid() . '.' .
                $file->getClientOriginalExtension();

            $file->move(
                public_path('backend_assets/images'),
                $fileName
            );
        }

        $validated['published'] = $request->boolean('published');
        $validated['coverImage'] = $fileName;

        Blog::create($validated);

        return redirect()
            ->route('admin.blog.index')
            ->with('success', 'Blog added successfully');
    }

    /**
     * Display blog.
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show edit form.
     */
    public function edit(Blog $blog)
    {
        $title = 'Edit Blog';

        $authors = Author::orderByDesc('id')->get();

        $categories = BlogCategory::where('published', 1)
            ->orderByDesc('id')
            ->get();

        $contentTypes = BlogContentType::cases();

        return view('admin.blog.form', compact(
            'title',
            'blog',
            'authors',
            'categories',
            'contentTypes'
        ));
    }

    /**
     * Update blog.
     */
    public function update(Request $request, Blog $blog)
    {
        $validated = $this->validateBlog($request, $blog);

        $fileName = $blog->coverImage;

        if ($request->hasFile('coverImage')) {

            $file = $request->file('coverImage');

            $fileName = time() . '_' .
                uniqid() . '.' .
                $file->getClientOriginalExtension();

            $file->move(
                public_path('backend_assets/images'),
                $fileName
            );

            if (
                $blog->coverImage &&
                file_exists(
                    public_path(
                        'backend_assets/images/' . $blog->coverImage
                    )
                )
            ) {
                unlink(
                    public_path(
                        'backend_assets/images/' . $blog->coverImage
                    )
                );
            }
        }

        $validated['published'] = $request->boolean('published');
        $validated['coverImage'] = $fileName;

        $blog->update($validated);

        return redirect()
            ->route('admin.blog.index')
            ->with('success', 'Blog updated successfully');
    }

    /**
     * Delete blog.
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();

        return redirect()
            ->back()
            ->with('success', 'Blog deleted successfully');
    }

    /**
     * Toggle publish status.
     */
    public function togglePublish($id)
    {
        $blog = Blog::findOrFail($id);

        $blog->update([
            'published' => !$blog->published,
        ]);

        $message = $blog->published
            ? 'Blog published successfully'
            : 'Blog moved to draft';

        return back()->with('success', $message);
    }

    /**
     * Validate blog data.
     */
    private function validateBlog(
        Request $request,
        ?Blog $blog = null
    ): array {
        $contentType = $request->input('content_type');

        return $request->validate([
            'title' => [
                'required',
                'string',
                'max:512',
            ],

            'content_type' => [
                'required',
                Rule::enum(BlogContentType::class),
            ],

            'url' => [
                Rule::requiredIf(
                    $contentType === BlogContentType::LINKEDIN->value
                ),
                'nullable',
                'url',
                'max:512',
            ],

            'slug' => [
                Rule::requiredIf(
                    in_array($contentType, [
                        BlogContentType::ARTICLE->value,
                        BlogContentType::AUTHOR->value,
                    ])
                ),
                'nullable',
                'string',
                'alpha_dash',
                'max:512',
                Rule::unique('blogs', 'slug')
                    ->ignore($blog?->id),
            ],

            /*
             * Author is required for Author Spotlights.
             * Optional for other content types.
             */
            'author_id' => [
                Rule::requiredIf(
                    $contentType === BlogContentType::AUTHOR->value
                ),
                'nullable',
                'exists:authors,id',
            ],

            'category_id' => [
                'required',
                'exists:blog_categories,id',
            ],

            'excerpt' => [
                'required',
                'string',
            ],

            'body' => [
                'nullable',
                'string',
            ],

            'coverImage' => [
                $blog?->exists
                    ? 'nullable'
                    : 'required',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'dimensions:width=900,height=1125',
                'max:200',
            ],

            'seoTitle' => [
                'nullable',
                'string',
                'max:512',
            ],

            'seoDescription' => [
                'nullable',
                'string',
            ],
        ], [
            'content_type.required' =>
            'Please select a content type.',

            'author_id.required' =>
            'Please select an author for Author Spotlight.',

            'category_id.required' =>
            'Please select a category.',

            'coverImage.required' =>
            'Please upload a cover image.',
        ]);
    }


    // public function index()
    // {
    //     $search = '';
    //     $title = "Blog";
    //     if (isset($request->search) && !empty($request->search)) {
    //         $search = $request->search;
    //         $collections = Blog::orderBy('id', 'desc')->where('menu', 'like', '%' . $request->search . '%')
    //             ->simplePaginate(20);
    //     } else {
    //         $collections = Blog::orderBy('id', 'desc')->simplePaginate(20);
    //     }
    //     return view('admin.blog.index', compact('title', 'collections', 'search'));
    // }

    // /**
    //  * Show the form for creating a new resource.
    //  */
    // public function create()
    // {
    //     $title = "Add Blog";
    //     $blog = new Blog();
    //     $authors = Author::orderBy('id', 'DESC')->get();
    //     $categories = BlogCategory::orderBy('id', 'DESC')->get();

    //     return view('admin.blog.form', compact('title', 'blog', 'authors', 'categories'));
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  */
    // public function store(Request $request)
    // {
    //     $request->validate(
    //         [
    //             'title' => ['required','string'],
    //             'url' => ['nullable','url'],
    //             'slug' => ['nullable','string', 'alpha_dash', 'unique:blogs,slug'],
    //             'author_id' => ['required', 'exists:authors,id'],
    //             'category_id' => ['required', 'exists:blog_categories,id'],
    //             'body' => ['nullable','string'],
    //             'coverImage' => ['required','image','mimes:jpg,jpeg,png,webp','max:2048'],
    //         ],
    //         [
    //             'author_id.required' => 'Please select an author.',
    //             'category_id.required' => 'Please select a category.',
    //         ]
    //     );

    //     $fileName = null;
    //     if ($request->hasFile('coverImage')) {
    //         $file = $request->file('coverImage');
    //         $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
    //         $file->move(public_path('backend_assets/images'), $fileName);
    //     }

    //     $data = $request->all();

    //     $data['published'] = $request->boolean('published');
    //     $data['coverImage'] = $fileName;

    //     Blog::create($data);

    //     return redirect()->route('admin.blog.index')->with('success', "Blog added successfully");
    // }

    // /**
    //  * Display the specified resource.
    //  */
    // public function show(Blog $blog)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // public function edit(Blog $blog)
    // {
    //     $title = "Edit Blog";
    //     $authors = Author::orderBy('id', 'DESC')->get();
    //     $categories = BlogCategory::orderBy('id', 'DESC')->get();
    //     return view('admin.blog.form', compact('title', 'blog', 'authors', 'categories'));
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, Blog $blog)
    // {
    //     $request->validate(
    //         [
    //             'title' => ['required','string'],
    //             'url' => ['nullable','url'],
    //             'slug' => ['nullable','string', 'alpha_dash', Rule::unique('blogs', 'slug')->ignore($blog->id)],
    //             'author_id' => ['required', 'exists:authors,id'],
    //             'category_id' => ['required', 'exists:blog_categories,id'],
    //             'body' => ['nullable','string'],
    //             'coverImage' => ['nullable','image','mimes:jpg,jpeg,png,webp','max:2048'],
    //         ],
    //         [
    //             'author_id.required' => 'Please select an author.',
    //             'category_id.required' => 'Please select a category.',
    //         ]
    //     );

    //     $fileName = $blog->coverImage;
    //     if ($request->hasFile('coverImage')) {
    //         $file = $request->file('coverImage');
    //         $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
    //         $file->move(public_path('backend_assets/images'), $fileName);

    //         if ($blog->coverImage && file_exists(public_path('backend_assets/images/' . $blog->coverImage))) {
    //             unlink(public_path('backend_assets/images/' . $blog->coverImage));
    //         }
    //     }

    //     $data = $request->all();

    //     $data['published'] = $request->boolean('published');
    //     $data['coverImage'] = $fileName;

    //     $blog->update($data);

    //     return redirect()->route('admin.blog.index')->with('success', "Blog updated successfully");
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(Blog $blog)
    // {
    //     $blog->delete();
    //     return redirect()->back()->with('success', "Blog deleted successfully");
    // }

    // public function togglePublish($id)
    // {
    //     $blog = Blog::findOrFail($id);
    //     $blog->update(['published' => !$blog->published]);

    //     $message = $blog->published
    //     ? 'Blog published successfully'
    //     : 'Blog moved to draft';

    //     return back()->with('success', $message);
    // }
}