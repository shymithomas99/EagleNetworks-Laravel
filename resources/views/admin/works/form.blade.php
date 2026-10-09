@extends('layouts.admin')
@section('content')
    <div class="container px-5 py-5">
        <div class="card">
            <div class="card-header">
                {{ $title ?? null }}
            </div>
            <div class="card-body">
                <form method="POST"
                    action="{{ $work->id ? route('admin.works.update', $work) : route('admin.works.store') }}"
                    enctype="multipart/form-data">
                    @csrf
                    {{ $work->id ? method_field('PUT') : '' }}
                    <div class="row">
                        <div class="col-6 my-3">
                            <label for="cover_title">Cover Title*</label>
                            <input type="text" class="form-control" id="cover_title" placeholder="" name="cover_title"
                                value="{{ old('cover_title', $work->cover_title ?? '') }}">
                            @error('cover_title')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-6 my-3">
                            <label for="title">Title*</label>
                            <input type="text" class="form-control" id="title" placeholder="" name="title"
                                value="{{ old('title', $work->title ?? '') }}">
                            @error('title')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-6 my-3">
                            <label for="slug">Slug*</label>
                            <input type="text" id="slug" name="slug" class="form-control"
                                value="{{ old('slug', $work->slug ?? '') }}">
                            @error('slug')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-6 my-3">
                            <label for="category_id">Category*</label>
                            <select name="category_id" id="category_id" class="form-control">
                                <option value="">-- Select Category --</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('category_id', $work->category_id ?? '') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-6 my-3">
                            <label for="core_service_1">Core Service 1*</label>
                            <input type="text" class="form-control" id="core_service_1" placeholder=""
                                name="core_service_1" value="{{ old('core_service_1', $work->core_service_1 ?? '') }}">
                            @error('core_service_1')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-6 my-3">
                            <label for="core_service_2">Core Service 2*</label>
                            <input type="text" class="form-control" id="core_service_2" placeholder=""
                                name="core_service_2" value="{{ old('core_service_2', $work->core_service_2 ?? '') }}">
                            @error('core_service_2')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-4 my-3">
                            <label for="clientName">Client Name*</label>
                            <input type="text" id="clientName" name="clientName" class="form-control"
                                value="{{ old('clientName', $work->clientName ?? '') }}">
                            @error('clientName')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-4 my-3">
                            <label for="industry">Service</label>
                            <input type="text" id="industry" class="form-control" name="industry"
                                value="{{ old('industry', $work->industry ?? '') }}">
                        </div>
                        <div class="col-4 my-3">
                            <label for="projectYear">Project Year</label>
                            <input type="text" id="projectYear" class="form-control" name="projectYear"
                                value="{{ old('projectYear', $work->projectYear ?? '') }}">
                        </div>
                        <div class="col-6 my-3">
                            <label for="excerpt">Excerpt*</label>
                            <textarea id="excerpt" class="form-control" name="excerpt">{{ old('excerpt', $work->excerpt ?? '') }}</textarea>
                        </div>
                        <div class="col-6 my-3">
                            <label for="servicesDelivered">Services Delivered</label>
                            <textarea id="servicesDelivered" class="form-control" name="servicesDelivered">{{ old('servicesDelivered', $work->servicesDelivered ?? '') }}</textarea>
                        </div>
                        <div class="col-6 my-3">
                            <label for="brief">Brief</label>
                            <textarea id="brief" class="textarea" name="brief">{{ old('brief', $work->brief ?? '') }}</textarea>
                        </div>
                        <div class="col-6">
                            <div class="col-12 my-3">
                                <label for="briefMediaType" class="form-label">
                                    Brief Media Type
                                </label>
                                <select name="briefMediaType" id="briefMediaType" class="form-select">
                                    <option value="">Select Media Type</option>
                                    <option value="1"
                                        {{ old('briefMediaType', $work->briefMediaType ?? '') == '1' ? 'selected' : '' }}>
                                        Brief Image
                                    </option>

                                    <option value="2"
                                        {{ old('briefMediaType', $work->briefMediaType ?? '') == '2' ? 'selected' : '' }}>
                                        Brief Video URL
                                    </option>
                                </select>
                                @error('briefMediaType')
                                    <p style="color:red">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-12 my-3" id="image-field">
                                <label for="briefImage" class="form-label">
                                    Brief Image (1280 × 780 px, max 1 MB)*
                                </label>
                                <input type="file" name="briefImage" id="briefImage"
                                    class="form-control custom-file-input" accept=".jpg,.jpeg,.png,.webp"
                                    onchange="document.getElementById('uploaded_brief_img').src = window.URL.createObjectURL(this.files[0])">
                                <img id="uploaded_brief_img" alt="Image" class="mt-1" width="130"
                                    height="100"
                                    src="{{ $work->briefImage ? asset('backend_assets/works/brief-images/' . $work->briefImage) : asset('backend_assets/images/upload_image.png') }}" />
                                @error('briefImage')
                                    <p style="color:red">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-12 my-3" id="video-url-field">
                                <label for="briefVideoUrl" class="form-label">
                                    Brief Video URL*
                                </label>
                                <input type="url" name="briefVideoUrl" id="briefVideoUrl"
                                    value="{{ old('briefVideoUrl', $work->briefVideoUrl ?? '') }}" class="form-control"
                                    placeholder="https://player.vimeo.com/video/1028439571?h=2a3474e587">
                                @error('briefVideoUrl')
                                    <p style="color:red">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6 my-3">
                            <label for="keyMetrics">Key Metrics</label>
                            <textarea id="keyMetrics" class="textarea" name="keyMetrics">{{ old('keyMetrics', $work->keyMetrics ?? '') }}</textarea>
                        </div>
                        <div class="col-6 my-3">
                            <label for="approach">Approach</label>
                            <textarea id="approach" class="textarea" name="approach">{{ old('approach', $work->approach ?? '') }}</textarea>
                        </div>
                        <div class="col-6 my-3">
                            <label for="results">Results</label>
                            <textarea id="results" class="textarea" name="results">{{ old('results', $work->results ?? '') }}</textarea>
                        </div>
                        <div class="col-6 my-3">
                            <label for="additionalContent">Additional Content</label>
                            <textarea id="additionalContent" class="textarea" name="additionalContent">{{ old('additionalContent', $work->additionalContent ?? '') }}</textarea>
                        </div>
                        <div class="col-6 my-3">
                            <label for="testimonial">Testimonial</label>
                            <textarea id="testimonial" class="form-control" name="testimonial">{{ old('testimonial', $work->testimonial ?? '') }}</textarea>
                        </div>
                        <div class="col-6 my-3">
                            <label for="testimonialAuthor">Testimonial Author</label>
                            <input type="text" id="testimonialAuthor" class="form-control" name="testimonialAuthor"
                                value="{{ old('testimonialAuthor', $work->testimonialAuthor ?? '') }}">
                        </div>

                        <div class="col-6 my-3">
                            <label for="cta_title">CTA Title</label>
                            <input type="text" id="cta_title" class="form-control" name="cta_title"
                                value="{{ old('cta_title', $work->cta_title ?? 'Ready to Get Started?') }}">
                            @error('cta_title')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-6 my-3">
                            <label for="cta_description">CTA Description</label>
                            <textarea id="cta_description" class="form-control" name="cta_description" rows="4">{{ old('cta_description', $work->cta_description ?? "Let's discuss how Eagle Networks can help you achieve your growth objectives through integrated services and strategic partnership.") }}</textarea>

                            @error('cta_description')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Button 1 --}}
                        <div class="col-6 my-3">
                            <label for="cta_button_text">CTA Button 1 Text</label>
                            <input type="text" id="cta_button_text" class="form-control" name="cta_button_text"
                                value="{{ old('cta_button_text', $work->cta_button_text ?? 'Start a Conversation') }}">

                            @error('cta_button_text')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-6 my-3">
                            <label for="cta_button_url">CTA Button 1 URL</label>
                            <input type="text" id="cta_button_url" class="form-control" name="cta_button_url"
                                value="{{ old('cta_button_url', $work->cta_button_url ?? '/contact') }}">

                            @error('cta_button_url')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Button 2 --}}
                        <div class="col-6 my-3">
                            <label for="cta_button_text_2">CTA Button 2 Text</label>
                            <input type="text" id="cta_button_text_2" class="form-control" name="cta_button_text_2"
                                value="{{ old('cta_button_text_2', $work->cta_button_text_2 ?? 'Explore Our Services') }}">

                            @error('cta_button_text_2')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-6 my-3">
                            <label for="cta_button_url_2">CTA Button 2 URL</label>
                            <input type="text" id="cta_button_url_2" class="form-control" name="cta_button_url_2"
                                value="{{ old('cta_button_url_2', $work->cta_button_url_2 ?? '/services') }}">

                            @error('cta_button_url_2')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Button 3 --}}
                        <div class="col-6 my-3">
                            <label for="cta_button_text_3">CTA Button 3 Text</label>
                            <input type="text" id="cta_button_text_3" class="form-control" name="cta_button_text_3"
                                value="{{ old('cta_button_text_3', $work->cta_button_text_3 ?? 'About Eagle Networks') }}">

                            @error('cta_button_text_3')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-6 my-3">
                            <label for="cta_button_url_3">CTA Button 3 URL</label>
                            <input type="text" id="cta_button_url_3" class="form-control" name="cta_button_url_3"
                                value="{{ old('cta_button_url_3', $work->cta_button_url_3 ?? '/about') }}">

                            @error('cta_button_url_3')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-6 my-3">
                            <label class="form-label" for="customFile">Cover Image (1280 x 780 px, max 1 MB)*</label>
                            <input type="file" class="form-control custom-file-input" id="coverImage"
                                name="coverImage" accept="image/*"
                                onchange="document.getElementById('uploaded_img').src = window.URL.createObjectURL(this.files[0])"
                                title="">
                            <img id="uploaded_img" alt="Image" class="mt-1" width="130" height="100"
                                src="{{ $work->coverImage ? asset('backend_assets/works/cover-images/' . $work->coverImage) : asset('backend_assets/images/upload_image.png') }}" />
                            @error('coverImage')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-6 my-3">
                            <label class="form-label" for="customFile">Featured Image (776 x 417 px, max 1 MB)</label>
                            <input type="file" class="form-control custom-file-input" id="featuredImage"
                                name="featuredImage" accept="image/*"
                                onchange="document.getElementById('uploaded_bg_img').src = window.URL.createObjectURL(this.files[0])"
                                title="">
                            <img id="uploaded_bg_img" alt="Image" class="mt-1" width="130" height="100"
                                src="{{ $work->featuredImage ? asset('backend_assets/works/featured-images/' . $work->featuredImage) : asset('backend_assets/images/upload_image.png') }}" />
                            @error('featuredImage')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-6 my-3">
                            <label for="seoTitle">SEO Title (max 60 characters)</label>
                            <input type="text" id="seoTitle" class="form-control" name="seoTitle"
                                maxlength="60" value="{{ old('seoTitle', $work->seoTitle ?? '') }}">
                            <small class="text-muted">
                                <span id="seoTitleCount">0</span>/60 characters
                            </small>
                            @error('seoTitle')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-6 my-3">
                            <label for="seoDescription">SEO Description (max 160 characters)</label>
                            <textarea id="seoDescription" class="form-control" name="seoDescription" maxlength="160">{{ old('seoDescription', $work->seoDescription ?? '') }}</textarea>
                            <small class="text-muted">
                                <span id="seoDescriptionCount">0</span>/160 characters
                            </small>
                            @error('seoDescription')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-3 my-3">
                            <label for="publish_date">Publish Date</label>
                            <input type="date" id="publish_date" class="form-control" name="publish_date"
                                value="{{ old('publish_date', $work->publish_date ?? '') }}">
                            @error('publish_date')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-3 my-3">
                            <label for="expiry_date">Expiry Date</label>
                            <input type="date" id="expiry_date" class="form-control" name="expiry_date"
                                value="{{ old('expiry_date', $work->expiry_date ?? '') }}">
                            @error('expiry_date')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="col-3 my-3">
                            <input type="hidden" name="published" value="0">
                            <input type="checkbox" class="form-check-input" id="published" name="published"
                                value="1" {{ old('published', $work->published ?? false) ? 'checked' : '' }}>
                            <label class="form-check-label" for="published">Published</label>
                        </div>

                        <div class="col-3 my-3">
                            <input type="checkbox" class="form-check-input" id="featured" name="featured"
                                value="1" {{ old('featured', $work->featured ?? false) ? 'checked' : '' }}>
                            <label class="form-check-label" for="featured">Featured</label>
                        </div>

                        <div class="col-3 my-3">
                            <label for="displayOrder">Display Order</label>
                            <input type="number" id="displayOrder" class="form-control" name="displayOrder"
                                value="{{ old('displayOrder', $work->displayOrder ?? 0) }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 my-3">
                            <button type="submit"
                                class="btn btn-primary">{{ $work->id ? 'Update and Continue' : 'Save and Continue' }}</button>
                            <a class="btn btn-secondary" href="{{ route('admin.works.index') }}">Cancel</a>
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

            const defaultBriefImage = "{{ asset('backend_assets/images/upload_image.png') }}";

            function toggleMediaFields() {
                const mediaType = $('#briefMediaType').val();

                if (mediaType === '1') {
                    $('#image-field').show();
                    $('#video-url-field').hide();

                    $('#briefVideoUrl').val('');
                } else if (mediaType === '2') {
                    $('#image-field').hide();
                    $('#video-url-field').show();

                    $('#briefImage').val('');
                    $('#uploaded_brief_img').attr('src', defaultBriefImage);
                } else {
                    $('#image-field').hide();
                    $('#video-url-field').hide();
                    $('#briefImage').val('');
                    $('#briefVideoUrl').val('');
                    $('#uploaded_brief_img').attr('src', defaultBriefImage);
                }
            }

            $('#briefMediaType').on('change', function() {
                toggleMediaFields();
            });

            // Important for edit form / validation error
            toggleMediaFields();


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
