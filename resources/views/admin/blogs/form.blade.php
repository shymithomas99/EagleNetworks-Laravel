@extends('layouts.admin')
@section('content')
    @use(App\Enums\BlogContentType)
    <div class="container px-5 py-5">
        <div class="card">
            <div class="card-header">
                {{ $title ?? null }}
            </div>
            <div class="card-body">
                <form method="POST" action="{{ $blog->id ? route('admin.blogs.update', $blog) : route('admin.blogs.store') }}"
                    enctype="multipart/form-data">
                    @csrf
                    {{ $blog->id ? method_field('PUT') : '' }}
                    <div class="row">
                        <div class="col-6 my-3">
                            <label for="title">Title*</label>
                            <input type="text" class="form-control" id="title" placeholder="Article title..."
                                name="title" value="{{ old('title', $blog->title ?? '') }}">
                            @error('title')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-6 my-3">
                            <label for="content_type">
                                Content Type*
                            </label>
                            <select name="content_type" id="content_type" class="form-control">
                                @foreach ($contentTypes as $type)
                                    <option value="{{ $type->value }}" @selected(old('content_type', $blog->content_type?->value ?? BlogContentType::ARTICLE->value) === $type->value)>
                                        {{ $type->label() }}
                                    </option>
                                @endforeach
                            </select>
                            @error('content_type')
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

                        <div class="col-6 my-3">
                            <label for="url">URL</label>
                            <input type="text" class="form-control" id="url" placeholder="External URL"
                                name="url" value="{{ old('url', $blog->url ?? '') }}">
                            @error('url')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-6 my-3">
                            <label for="slug">Slug</label>
                            <input type="text" class="form-control" id="slug" placeholder="article-slug"
                                name="slug" value="{{ old('slug', $blog->slug ?? '') }}">
                            @error('slug')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-6 my-3">
                            <label for="author_id">Author</label>
                            <select name="author_id" id="author_id" class="form-control">
                                <option value="">-- Select Author --</option>
                                @foreach ($authors as $author)
                                    <option value="{{ $author->id }}"
                                        {{ old('author_id', $blog->author_id ?? '') == $author->id ? 'selected' : '' }}>
                                        {{ $author->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('author_id')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-6 my-3">
                            <label for="excerpt">Excerpt*</label><br>
                            <textarea class="form-control" name="excerpt" id="excerpt" rows="6"
                                placeholder="Short summary shown in listings...">{{ old('excerpt', $blog->excerpt ?? '') }}</textarea>
                        </div>

                        <div class="col-6 my-3">
                            <label class="form-label" for="customFile">Cover Image (900 x 1125 px, max 200 KB){{ !$blog->id ? '*' : '' }} :</label>
                            <input type="file" class="form-control custom-file-input" id="coverImage" name="coverImage"
                                accept="image/*"
                                onchange="document.getElementById('uploaded_img').src = window.URL.createObjectURL(this.files[0])"
                                title="">
                            <img id="uploaded_img" alt="Image" class="mt-1" width="130" height="100"
                                src="{{ $blog->coverImage ? asset('backend_assets/blogs/' . $blog->coverImage) : asset('backend_assets/images/upload_image.png') }}" />
                            @error('coverImage')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-12 my-3">
                            <label>Body</label>
                            <textarea class="textarea" name="body">{{ old('body', $blog->body ?? '') }}</textarea>
                            @error('body')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-6 my-3">
                            <label for="seoTitle">SEO Title (max 60 characters)</label>

                            <input type="text"
                                class="form-control"
                                id="seoTitle"
                                name="seoTitle"
                                maxlength="60"
                                value="{{ old('seoTitle', $blog->seoTitle ?? '') }}">

                            <small class="text-muted">
                                <span id="seoTitleCount">0</span>/60 characters
                            </small>

                            @error('seoTitle')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-6 my-3">
                            <label for="seoDescription">
                                SEO Description (max 160 characters)
                            </label>

                            <textarea class="form-control"
                                name="seoDescription"
                                id="seoDescription"
                                maxlength="160"
                                rows="3">{{ old('seoDescription', $blog->seoDescription ?? '') }}</textarea>

                            <small class="text-muted">
                                <span id="seoDescriptionCount">0</span>/160 characters
                            </small>

                            @error('seoDescription')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-3 my-3">
                            <label for="publish_date">Publish Date</label>
                            <input type="date"
                                class="form-control"
                                id="publish_date"
                                name="publish_date"
                                value="{{ old('publish_date', $blog->publish_date?->format('Y-m-d')) }}">

                            @error('publish_date')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-3 my-3">
                            <label for="expiry_date">Expiry Date</label>
                            <input type="date"
                                class="form-control"
                                id="expiry_date"
                                name="expiry_date"
                                value="{{ old('expiry_date', $blog->expiry_date?->format('Y-m-d')) }}">

                            @error('expiry_date')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-6 my-3">
                            <input type="hidden" name="published" value="0">
                            <input type="checkbox" class="form-check-input" id="published" name="published"
                                value="1" {{ old('published', $blog->published ?? false) ? 'checked' : '' }}>
                            <label class="form-check-label" for="published">Published</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 my-3">
                            <button type="submit" class="btn btn-primary">{{ $blog->id ? 'Update' : 'Save' }}</button>
                            <a class="btn btn-secondary" href="{{ route('admin.blogs.index') }}">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            function checkPublishDateRange() {

                const publishDate = $('#publish_date').val();
                const expiryDate = $('#expiry_date').val();

                if (!publishDate && !expiryDate) {
                    $('#published').prop('disabled', false);
                    return;
                }

                const today = new Date();
                today.setHours(0, 0, 0, 0);

                const startDate = publishDate ? new Date(publishDate + 'T00:00:00') : null;
                const endDate = expiryDate ? new Date(expiryDate + 'T00:00:00') : null;

                let withinRange = true;

                // If Publish Date exists
                if (startDate && today < startDate) {
                    withinRange = false;
                }

                // If Expiry Date exists
                if (endDate && today > endDate) {
                    withinRange = false;
                }

                if (withinRange) {
                    $('#published')
                        .prop('checked', true)
                        .prop('disabled', true);
                } else {
                    $('#published')
                        .prop('disabled', false);
                }
            }

            $('#publish_date, #expiry_date').on('change', function () {
                checkPublishDateRange();
            });

            // Run when editing an existing Work
            checkPublishDateRange();

        });


        function updateCharacterCount(inputId, countId, maxLength) {
            const input = $('#' + inputId);
            const counter = $('#' + countId);

            function update() {
                const length = input.val().length;

                counter.text(length);

                if (length > maxLength) {
                    counter.css('color', 'red');
                } else if (length >= maxLength - 10) {
                    counter.css('color', 'orange');
                } else {
                    counter.css('color', '');
                }
            }

            input.on('input', update);

            // Set correct count when editing an existing work
            update();
        }

        updateCharacterCount('seoTitle', 'seoTitleCount', 60);
        updateCharacterCount('seoDescription', 'seoDescriptionCount', 160);
    </script>
@endpush
