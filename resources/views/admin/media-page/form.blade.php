@extends('layouts.admin')

@section('content')
    <div class="container px-5 py-5">

        <div class="card">

            <div class="card-header">
                {{ $title }}
            </div>

            <div class="card-body">

                <form method="POST"
                    action="{{ $mediaPage->id ? route('admin.media-page.update', $section) : route('admin.media-page.store', $section) }}">

                    @csrf

                    @if ($mediaPage->id)
                        @method('PUT')
                    @endif

                    <div class="row">

                        {{-- =====================================================
                        LABEL
                    ====================================================== --}}

                        @if ($section == 1)
                            <div class="col-md-12 mb-3">

                                <label for="label">
                                    Label
                                </label>

                                <input type="text" name="label" id="label" class="form-control"
                                    value="{{ old('label', $mediaPage->label) }}">

                                @error('label')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror

                            </div>
                        @endif


                        {{-- =====================================================
                        TITLE
                    ====================================================== --}}

                        <div class="col-md-12 mb-3">

                            <label for="title">
                                Title
                            </label>

                            <input type="text" name="title" id="title" class="form-control"
                                value="{{ old('title', $mediaPage->title) }}">

                            @error('title')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror

                        </div>


                        {{-- =====================================================
                        DESCRIPTION
                    ====================================================== --}}

                        <div class="col-md-12 mb-3">

                            <label for="description">
                                Description
                            </label>

                            <textarea name="description" id="description" rows="5" class="form-control">{{ old('description', $mediaPage->description) }}</textarea>

                            @error('description')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror

                        </div>


                        {{-- =====================================================
                        ADDITIONAL DESCRIPTION
                    ====================================================== --}}

                        @if ($section == 2)
                            <div class="col-md-12 mb-3">

                                <label for="additional_description">
                                    Additional Description
                                </label>

                                <textarea name="additional_description" id="additional_description" rows="5" class="form-control">{{ old('additional_description', $mediaPage->additional_description) }}</textarea>

                                @error('additional_description')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror

                            </div>
                        @endif


                        {{-- =====================================================
                        BUTTON 1
                    ====================================================== --}}

                        @if ($section == 2)
                            <div class="col-md-4 mb-3">

                                <label for="button_text">
                                    Button 1 Text
                                </label>

                                <input type="text" name="button_text" id="button_text" class="form-control"
                                    value="{{ old('button_text', $mediaPage->button_text) }}">

                            </div>

                            <div class="col-md-8 mb-3">

                                <label for="button_url">
                                    Button 1 URL
                                </label>

                                <input type="text" name="button_url" id="button_url" class="form-control"
                                    value="{{ old('button_url', $mediaPage->button_url) }}">

                            </div>


                            {{-- BUTTON 2 --}}

                            <div class="col-md-4 mb-3">

                                <label for="button_text_2">
                                    Button 2 Text
                                </label>

                                <input type="text" name="button_text_2" id="button_text_2" class="form-control"
                                    value="{{ old('button_text_2', $mediaPage->button_text_2) }}">

                            </div>

                            <div class="col-md-8 mb-3">

                                <label for="button_url_2">
                                    Button 2 URL
                                </label>

                                <input type="text" name="button_url_2" id="button_url_2" class="form-control"
                                    value="{{ old('button_url_2', $mediaPage->button_url_2) }}">

                            </div>


                            {{-- BUTTON 3 --}}

                            <div class="col-md-4 mb-3">

                                <label for="button_text_3">
                                    Button 3 Text
                                </label>

                                <input type="text" name="button_text_3" id="button_text_3" class="form-control"
                                    value="{{ old('button_text_3', $mediaPage->button_text_3) }}">

                            </div>

                            <div class="col-md-8 mb-3">

                                <label for="button_url_3">
                                    Button 3 URL
                                </label>

                                <input type="text" name="button_url_3" id="button_url_3" class="form-control"
                                    value="{{ old('button_url_3', $mediaPage->button_url_3) }}">

                            </div>
                        @endif


                        {{-- =====================================================
                        PUBLISHED
                    ====================================================== --}}

                        <div class="col-md-12 mb-4">

                            <div class="form-check">

                                <input type="hidden" name="published" value="0">

                                <input type="checkbox" class="form-check-input" name="published" id="published"
                                    value="1" {{ old('published', $mediaPage->published ?? false) ? 'checked' : '' }}>

                                <label class="form-check-label" for="published">
                                    Published
                                </label>

                            </div>

                        </div>

                    </div>


                    <button type="submit" class="btn btn-primary">

                        {{ $mediaPage->id ? 'Update' : 'Save' }}

                    </button>

                </form>

            </div>

        </div>

    </div>
@endsection
