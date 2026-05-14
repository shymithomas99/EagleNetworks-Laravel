@extends('layouts.admin')
@section('content')
    <div class="container px-5 py-5">
        <div class="card">
            <div class="card-header">
                {{ $title ?? null }}
            </div>
            <div class="card-body">
            <form method="POST" action="{{ $blog->id ? route('admin.blog.update',$blog) : route('admin.blog.store') }}" enctype="multipart/form-data">
                @csrf
                {{ $blog->id ? method_field('PUT') : '' }}
                <div class="row">
                    <div class="col-6 my-3">
                        <label for="title">Title*</label>
                        <input type="text" class="form-control" id="title"
                            placeholder="Article title..." name="title"
                            value="{{ old('title', $blog->title ?? '') }}">
                        @error("title")
                            <p style="color:red">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-6 my-3">
                        <label for="slug">Slug*</label>
                        <input type="text" class="form-control" id="slug"
                            placeholder="article-slug" name="slug"
                            value="{{ old('slug', $blog->slug ?? '') }}">
                        @error("slug")
                            <p style="color:red">{{ $message }}</p>
                        @enderror
                    </div>      

                    <div class="col-6 my-3">
                        <label for="author">Author*</label>
                        <input type="text" class="form-control" id="author"
                            placeholder="Eagle London" name="author"
                            value="{{ old('author', $blog->author ?? '') }}">
                        @error("author")
                            <p style="color:red">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-6 my-3">
                        <label for="category_id">Category*</label>
                        <select name="category_id" id="category_id" class="form-control">
                            <option value="">-- Select Category --</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category_id', $blog->category_id ?? '') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <p style="color:red">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- <div class="col-6 my-3">
                        <label for="category">Category:</label>
                        <input type="text" class="form-control" id="category"
                            placeholder="e.g., Strategy, Digital, Creative" name="category"
                            value="{{ old('category', $blog->category ?? '') }}">
                    </div> --}}

                    <div class="col-6 my-3">
                        <label for="excerpt">Excerpt</label><br>
                        <textarea class="form-control" name="excerpt" id="excerpt" rows="6" 
                            placeholder="Short summary shown in listings...">{{ old('excerpt', $blog->excerpt ?? '') }}</textarea>
                    </div>

                    <div class="col-6 my-3">
                        <label class="form-label" for="customFile">Cover Image (500 x 500 px){{ !$blog->id ? '*' : '' }} :</label>
                        <input type="file" class="form-control custom-file-input" id="coverImage" name="coverImage" accept="image/*" onchange="document.getElementById('uploaded_img').src = window.URL.createObjectURL(this.files[0])" title="">
                        <img id="uploaded_img" alt="Image" class="mt-1" width="130" height="100" src="{{ $blog->coverImage ? asset('backend_assets/images/'.$blog->coverImage) : asset('backend_assets/images/upload_image.png') }}" />
                        @error("coverImage")
                            <p style="color:red">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-12 my-3">
                        <label>Body*</label>
                        <textarea class="textarea" name="body">{{ old('body', $blog->body ?? '') }}</textarea>
                        @error("body")
                            <p style="color:red">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-6 my-3">
                        <label for="seoTitle">SEO Title</label>
                        <input type="text" class="form-control" id="seoTitle"
                            name="seoTitle"
                            value="{{ old('seoTitle', $blog->seoTitle ?? '') }}">
                    </div>

                    <div class="col-6 my-3">
                        <label for="seoDescription">SEO Description</label><br>
                        <textarea class="form-control" name="seoDescription" id="seoDescription">{{ old('seoDescription', $blog->seoDescription ?? '') }}</textarea>
                    </div>

                    <div class="col-6 my-3">
                        <input type="checkbox" class="form-check-input" id="published"
                            name="published" value="1"
                            {{ old('published', $blog->published ?? false) ? 'checked' : '' }}>
                        <label class="form-check-label" for="published">Published</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 my-3">
                        <button type="submit" class="btn btn-primary">{{ $blog->id ? 'Update' : 'Save' }}</button>
                        <a class="btn btn-secondary" href="{{ route('admin.blog.index') }}">Cancel</a>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
@endsection