@extends('layouts.admin')

@section('content')
    <div class="container-fluid">

        <h1 class="h3 mb-4 text-gray-800">
            {{ $seo->exists ? 'Edit SEO' : 'Add SEO' }}
        </h1>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    {{ $seo->exists ? 'Update SEO Details' : 'Add SEO Details' }}
                </h6>
            </div>

            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ $seo->exists ? route('admin.seo.update', $seo->id) : route('admin.seo.store') }}"
                    method="POST">

                    @csrf

                    @if ($seo->exists)
                        @method('PUT')
                    @endif

                    <div class="form-group">
                        <label for="page_name">Page Name <span class="text-danger">*</span></label>

                        <input type="text" name="page_name" id="page_name" class="form-control"
                            value="{{ old('page_name', $seo->page_name) }}" placeholder="Example: Home Page" required>
                    </div>

                    <div class="form-group">
                        <label for="page_url">Page URL <span class="text-danger">*</span></label>

                        <input type="text" name="page_url" id="page_url" class="form-control"
                            value="{{ old('page_url', $seo->page_url) }}" placeholder="Example: /about" required>

                        <small class="form-text text-muted">
                            Enter the frontend path. Use / for the home page.
                        </small>
                    </div>

                    <hr>

                    <h5 class="mb-3">Meta Information</h5>



                    {{-- Meta Title --}}
                    <div class="form-group"> <label for="meta_title">Meta Title</label> <input type="text"
                            name="meta_title" id="meta_title" class="form-control"
                            value="{{ old('meta_title', $seo->meta_title) }}" maxlength="60" placeholder="Enter meta title">
                        <small id="meta_title_counter" class="form-text text-muted"> 0 /
                            60 characters </small>
                    </div>
                    {{-- Meta Description --}}
                    <div class="form-group"> <label for="meta_description">Meta Description</label>
                        <textarea name="meta_description" id="meta_description" class="form-control" rows="4" maxlength="170"
                            placeholder="Enter meta description">{{ old('meta_description', $seo->meta_description) }}</textarea>
                        <small id="meta_description_counter" class="form-text text-muted"> 0 /
                            170 characters </small>
                    </div>

                    <div class="form-group py-2">
                        <label for="meta_keywords">Meta Keywords</label>

                        <textarea name="meta_keywords" id="meta_keywords" class="form-control" rows="3" placeholder="Enter meta keywords">{{ old('meta_keywords', $seo->meta_keywords) }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        {{ $seo->exists ? 'Update SEO' : 'Save SEO' }}
                    </button>

                    <a href="{{ route('admin.seo.index') }}" class="btn btn-secondary">
                        Cancel
                    </a>

                </form>
            </div>
        </div>
    </div>

    {{-- Live SEO Character Counter --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const metaTitle = document.getElementById('meta_title');
            const metaDescription = document.getElementById('meta_description');

            const titleCounter = document.getElementById('meta_title_counter');
            const descriptionCounter = document.getElementById('meta_description_counter');

            function updateCounter(input, counter, min, max, label) {
                const length = input.value.length;

                counter.textContent = `${length} / ${max} characters`;

                counter.classList.remove(
                    'text-muted',
                    'text-success',
                    'text-danger'
                );

                if (length > max) {
                    counter.classList.add('text-danger');
                    counter.textContent += ' — Over recommended limit';
                } else if (label === 'description' && length > 0 && length < min) {
                    counter.classList.add('text-muted');
                    counter.textContent += ' — Recommended: 150–170 characters';
                } else {
                    counter.classList.add('text-success');
                }
            }

            function updateTitleCounter() {
                updateCounter(metaTitle, titleCounter, 0, 60, 'title');
            }

            function updateDescriptionCounter() {
                updateCounter(
                    metaDescription,
                    descriptionCounter,
                    150,
                    170,
                    'description'
                );
            }

            // Update counts while typing
            metaTitle.addEventListener('input', updateTitleCounter);
            metaDescription.addEventListener('input', updateDescriptionCounter);

            // Show counts immediately when adding or editing SEO
            updateTitleCounter();
            updateDescriptionCounter();
        });
    </script>


@endsection
