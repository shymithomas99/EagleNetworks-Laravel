@extends('layouts.admin')
@section('content')
    <div class="container px-5 py-5">
        <div class="card">
            <div class="card-header">
                {{ $title ?? null }}
            </div>
            <div class="card-body">
            <form method="POST" action="{{ $author->id ? route('admin.authors.update',$author) : route('admin.authors.store') }}" enctype="multipart/form-data">
                @csrf
                {{ $author->id ? method_field('PUT') : '' }}
                <div class="row">
                    <div class="col-6 my-3">
                        <label for="name">Name*</label>
                        <input type="text" class="form-control" id="name"
                            placeholder="Author name" name="name"
                            value="{{ old('name', $author->name ?? '') }}">
                        @error("name")
                            <p style="color:red">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-6 my-3">
                        <label for="designation">Designation*</label>
                        <input type="text" class="form-control" id="designation"
                            placeholder="Author designation" name="designation"
                            value="{{ old('designation', $author->designation ?? '') }}">
                        @error("designation")
                            <p style="color:red">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-6 my-3">
                        <label for="about">About</label><br>
                        <textarea class="form-control" name="about" id="about" rows="6" 
                            placeholder="Short summary shown in listings...">{{ old('about', $author->about ?? '') }}</textarea>
                    </div>

                    <div class="col-6 my-3">
                        <label class="form-label" for="customFile">Image (500 x 500 px){{ !$author->id ? '*' : '' }} :</label>
                        <input type="file" class="form-control custom-file-input" id="image" name="image" accept="image/*" onchange="document.getElementById('uploaded_img').src = window.URL.createObjectURL(this.files[0])" title="">
                        <img id="uploaded_img" alt="Image" class="mt-1" width="130" height="100" src="{{ $author->image ? asset('backend_assets/authors/'.$author->image) : asset('backend_assets/images/upload_image.png') }}" />
                        @error("image")
                            <p style="color:red">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- <div class="col-6 my-3">
                        <label for="seoTitle">SEO Title</label>
                        <input type="text" class="form-control" id="seoTitle"
                            name="seoTitle"
                            value="{{ old('seoTitle', $author->seoTitle ?? '') }}">
                    </div>

                    <div class="col-6 my-3">
                        <label for="seoDescription">SEO Description</label><br>
                        <textarea class="form-control" name="seoDescription" id="seoDescription">{{ old('seoDescription', $author->seoDescription ?? '') }}</textarea>
                    </div> --}}

                </div>
                <div class="row">
                    <div class="col-6 my-3">
                        <button type="submit" class="btn btn-primary">{{ $author->id ? 'Update' : 'Save' }}</button>
                        <a class="btn btn-secondary" href="{{ route('admin.authors.index') }}">Cancel</a>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
@endsection