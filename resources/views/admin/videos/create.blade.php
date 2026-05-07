@extends('layouts.admin')

@section('content')
    <div class="container px-5 py-5">
        <div class="card">

            <div class="card-header">
                New Video
            </div>

            <div class="card-body">

                <form method="POST" action="{{ route('admin.videos.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="row">

                        <!-- Title -->
                        <div class="col-6 my-3">
                            <label>Title *</label>
                            <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                            @error('title')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Slug -->
                        <div class="col-6 my-3">
                            <label>Slug</label>
                            <input type="text" name="slug" class="form-control" value="{{ old('slug') }}">
                            @error('slug')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Video URL -->
                        <div class="col-6 my-3">
                            <label>Video URL *</label>
                            <input type="url" name="video_url" class="form-control" value="{{ old('video_url') }}">
                            @error('video_url')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Category -->
                        <div class="col-6 my-3">
                            <label>Category</label>
                            <select name="category_id" class="form-control">
                                <option value="">-- Select Category --</option>
                                @foreach ($categories as $cat)
                                    <option value="{{ $cat->id }}"
                                        {{ old('category_id') == $cat->id ? 'selected' : '' }}>
                                        {{ $cat->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Client Name -->
                        <div class="col-6 my-3">
                            <label>Client Name</label>
                            <input type="text" name="client_name" class="form-control" value="{{ old('client_name') }}">
                        </div>

                        <!-- Duration -->
                        <div class="col-6 my-3">
                            <label>Duration</label>
                            <input type="text" name="duration" class="form-control" placeholder="2:34"
                                value="{{ old('duration') }}">
                        </div>

                        <!-- Description -->
                        <div class="col-12 my-3">
                            <label>Description</label>
                            <textarea name="description" class="form-control">{{ old('description') }}</textarea>
                        </div>

                        <!-- Display Order -->
                        <div class="col-6 my-3">
                            <label>Display Order</label>
                            <input type="number" name="display_order" class="form-control"
                                value="{{ old('display_order', 0) }}">
                        </div>

                        <!-- Thumbnail -->
                        <div class="col-6 my-3">
                            <label>Thumbnail</label>
                            {{--  <input type="file" name="thumbnail" class="form-control">  --}}

                            <input type="file" name="thumbnail" class="form-control" onchange="previewImage(event)">
                            <img id="preview" width="120" class="mt-2" style="display:none;">
                        </div>

                        <!-- Featured -->
                        <div class="col-4 my-3">
                            <input type="checkbox" name="featured" value="1" {{ old('featured') ? 'checked' : '' }}>
                            <label>Featured</label>
                        </div>

                        <!-- Published -->
                        <div class="col-4 my-3">
                            <input type="checkbox" name="published" value="1" {{ old('published') ? 'checked' : '' }}>
                            <label>Published</label>
                        </div>


                    </div>

                    <!-- Buttons -->
                    <div class="mt-3">
                        <button name="action" value="submit" class="btn btn-success">Save</button>
                        <a href="{{ route('admin.videos.index') }}" class="btn btn-light">Cancel</a>
                    </div>

                </form>

            </div>
        </div>
    </div>

    <script>
        function previewImage(event) {
            let reader = new FileReader();
            reader.onload = function() {
                let img = document.getElementById('preview');
                img.src = reader.result;
                img.style.display = 'block';
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
@endsection
