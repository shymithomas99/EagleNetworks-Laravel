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

                    <!-- Title -->
                    <div class="mb-3">
                        <label>Title *</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>

                    <!-- Video URL -->
                    <div class="mb-3">
                        <label>Video URL *</label>
                        <input type="url" name="video_url" class="form-control" required>
                    </div>

                    <!-- Description -->
                    <div class="mb-3">
                        <label>Description</label>
                        <textarea name="description" class="form-control"></textarea>
                    </div>

                    <!-- Category -->
                    <div class="mb-3">
                        <label>Category</label>
                        <select name="category_id" class="form-control">
                            @foreach ($categories as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Client -->
                    <div class="mb-3">
                        <label>Client Name</label>
                        <input type="text" name="client_name" class="form-control">
                    </div>

                    <!-- Duration -->
                    <div class="mb-3">
                        <label>Duration</label>
                        <input type="text" name="duration" class="form-control" placeholder="2:34">
                    </div>

                    <!-- Slug -->
                    <div class="mb-3">
                        <label>Slug</label>
                        <input type="text" name="slug" class="form-control">
                    </div>

                    <!-- Display Order -->
                    <div class="mb-3">
                        <label>Display Order</label>
                        <input type="number" name="display_order" class="form-control" value="0">
                    </div>

                    <!-- Thumbnail -->
                    <div class="mb-3">
                        <label>Thumbnail</label>
                        <input type="file" name="thumbnail" class="form-control">
                    </div>

                    <!-- Options -->
                    <div class="mb-3">
                        <label><input type="checkbox" name="featured"> Featured</label>
                    </div>

                    <!-- Buttons -->
                    <button name="action" value="draft" class="btn btn-secondary">Save Draft</button>
                    <button name="action" value="publish" class="btn btn-success">Save & Publish</button>

                </form>

            </div>
        </div>
    </div>
@endsection
