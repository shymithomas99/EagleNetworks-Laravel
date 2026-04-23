@extends('layouts.admin')

@section('content')
    <div class="container px-5 py-5">
        <div class="card">

            <div class="card-header">
                Edit Video
            </div>

            <div class="card-body">

                <form method="POST" action="{{ route('admin.videos.update', $video->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Title -->
                    <div class="mb-3">
                        <label>Title *</label>
                        <input type="text" name="title" value="{{ $video->title }}" class="form-control">
                    </div>

                    <!-- Video URL -->
                    <div class="mb-3">
                        <label>Video URL *</label>
                        <input type="url" name="video_url" value="{{ $video->video_url }}" class="form-control">
                    </div>

                    <!-- Description -->
                    <div class="mb-3">
                        <label>Description</label>
                        <textarea name="description" class="form-control">{{ $video->description }}</textarea>
                    </div>

                    <!-- Category -->
                    <div class="mb-3">
                        <label>Category</label>
                        <select name="category_id" class="form-control">
                            @foreach ($categories as $cat)
                                <option value="{{ $cat->id }}" {{ $video->category_id == $cat->id ? 'selected' : '' }}>
                                    {{ $cat->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Client -->
                    <div class="mb-3">
                        <label>Client Name</label>
                        <input type="text" name="client_name" value="{{ $video->client_name }}" class="form-control">
                    </div>

                    <!-- Duration -->
                    <div class="mb-3">
                        <label>Duration</label>
                        <input type="text" name="duration" value="{{ $video->duration }}" class="form-control">
                    </div>

                    <!-- Slug -->
                    <div class="mb-3">
                        <label>Slug</label>
                        <input type="text" name="slug" value="{{ $video->slug }}" class="form-control">
                    </div>

                    <!-- Order -->
                    <div class="mb-3">
                        <label>Display Order</label>
                        <input type="number" name="display_order" value="{{ $video->display_order }}"
                            class="form-control">
                    </div>

                    <!-- Thumbnail -->
                    <div class="mb-3">
                        <label>Thumbnail</label>
                        <input type="file" name="thumbnail" class="form-control">

                        @if ($video->thumbnail_url)
                            <img src="{{ $video->thumbnail_url }}" width="120" class="mt-2">
                        @endif
                    </div>

                    <!-- Options -->
                    <div class="mb-3">
                        <label>
                            <input type="checkbox" name="featured" {{ $video->featured ? 'checked' : '' }}>
                            Featured
                        </label>
                    </div>

                    <!-- Buttons -->
                    <button name="action" value="draft" class="btn btn-secondary">Save Draft</button>
                    <button name="action" value="publish" class="btn btn-success">Update & Publish</button>

                </form>

            </div>
        </div>
    </div>
@endsection
