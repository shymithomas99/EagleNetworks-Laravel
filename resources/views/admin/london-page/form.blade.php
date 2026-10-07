@extends('layouts.admin')
@section('content')
    <div class="container px-5 py-5">
        <div class="card">
            <div class="card-header">
                {{ $title ?? null }}
            </div>
            <div class="card-body">
                <form method="POST" action="{{ $londonPage->id ? route('admin.london-page.update', ['section' => $section, 'is_card' => $is_card, 'londonPage' => $londonPage]) : route('admin.london-page.store', ['section' => $section, 'is_card' => $is_card]) }}"
                    enctype="multipart/form-data">
                    @csrf
                    {{ $londonPage->id ? method_field('PUT') : '' }}
                    <div class="row">

                        @if(!$is_card && $section === '11')
                        <div class="col-6 my-3">
                            <label for="intro">Intro</label><br>
                            <textarea class="form-control" name="intro" id="intro" rows="4"
                                placeholder="">{{ old('intro', $londonPage->intro ?? '') }}</textarea>
                            @error('intro')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>
                        @endif

                        @if(!$is_card && in_array($section, [1, 2, 3, 4, 5, 6, 7, 10, 11]))
                        <div class="col-6 my-3">
                            <label for="label">Label *</label>
                            <input type="text" class="form-control" id="label" placeholder=""
                                name="label" value="{{ old('label', $londonPage->label ?? '') }}">
                            @error('label')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>
                        @endif

                        <div class="col-6 my-3">
                            <label for="title">Title *</label>
                            <input type="text" class="form-control" id="title" placeholder=""
                                name="title" value="{{ old('title', $londonPage->title ?? '') }}">
                            @error('title')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>

                        @if($is_card || (!$is_card && in_array($section, [1, 2, 9, 10, 11])))
                        <div class="col-6 my-3">
                            <label for="description">
                                Description {{ !$is_card && $section === '2'
                                    ? '(Enter each para on a new line)'
                                    : ($is_card && $section === '7'
                                        ? '(Enter each point on a new line)'
                                        : '')
                                }} *
                            </label><br>
                            <textarea class="form-control" name="description" id="description" rows="3"
                                placeholder="">{{ old('description', $londonPage->description ?? '') }}</textarea>
                            @error('description')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>
                        @endif

                        @if(!$is_card && ($section === '1' || $section === '9'))
                        <div class="col-6 my-3">
                            <label for="additional_description">Additional Description</label><br>
                            <textarea class="form-control" name="additional_description" id="additional_description" rows="3"
                                placeholder="">{{ old('additional_description', $londonPage->additional_description ?? '') }}</textarea>
                            @error('additional_description')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>
                        @endif

                        @if(!$is_card && $section === '1')
                        <div class="col-6 my-3">
                            <label for="location">Location</label>
                            <input type="text" class="form-control" id="location" placeholder=""
                                name="location" value="{{ old('location', $londonPage->location ?? '') }}">
                            @error('location')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-6 my-3">
                            <label for="serving">Serving</label>
                            <input type="text" class="form-control" id="serving" placeholder=""
                                name="serving" value="{{ old('serving', $londonPage->serving ?? '') }}">
                            @error('serving')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>
                        @endif

                        @if(!$is_card && $section === '2')
                        <div class="col-6 my-3">
                            <label for="primary_focus">Primary Focus</label><br>
                            <textarea class="form-control" name="primary_focus" id="primary_focus" rows="3"
                                placeholder="">{{ old('primary_focus', $londonPage->primary_focus ?? '') }}</textarea>
                            @error('primary_focus')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-6 my-3">
                            <label for="key_offerings">Key Offerings (Enter each point on a new line)</label><br>
                            <textarea class="form-control" name="key_offerings" id="key_offerings" rows="3"
                                placeholder="">{{ old('key_offerings', $londonPage->key_offerings ?? '') }}</textarea>
                            @error('key_offerings')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>
                        @endif

                        @if(!$is_card && $section === '9')
                        <div class="col-6 my-3">
                            <label for="key_points">Key Points (Enter each point on a new line)</label><br>
                            <textarea class="form-control" name="key_points" id="key_points" rows="4"
                                placeholder="">{{ old('key_points', $londonPage->key_points ?? '') }}</textarea>
                            @error('key_points')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-6 my-3">
                            <label for="quote">Quote</label><br>
                            <textarea class="form-control" name="quote" id="quote" rows="3"
                                placeholder="">{{ old('quote', $londonPage->quote ?? '') }}</textarea>
                            @error('quote')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-6 my-3">
                            <label for="quote_author">Quote Author</label>
                            <input type="text" class="form-control" id="quote_author" placeholder=""
                                name="quote_author" value="{{ old('quote_author', $londonPage->quote_author ?? '') }}">
                            @error('quote_author')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>
                        @endif  

                        @if(!$is_card && ($section === '1' || $section === '9' || $section === '11'))
                        <div class="col-6 my-3">
                            <label for="button_text">Button Text</label>
                            <input type="text" class="form-control" id="button_text" placeholder=""
                                name="button_text" value="{{ old('button_text', $londonPage->button_text ?? '') }}">
                            @error('button_text')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>
                
                        <div class="col-6 my-3">
                            <label for="button_url">Button URL</label>
                            <input type="text" class="form-control" id="button_url" placeholder=""
                                name="button_url" value="{{ old('button_url', $londonPage->button_url ?? '') }}">
                            @error('button_url')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>
                        @endif

                        @if($is_card)
                        <div class="col-3 my-3">
                            <label for="display_order">Display Order</label>
                            <input type="number" id="display_order" class="form-control" name="display_order"
                                value="{{ old('display_order', $londonPage->display_order ?? 0) }}">
                            @error('display_order')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>
                        @endif
                
                        <div class="col-3 my-3 d-flex align-items-end">
                            <div>
                                <input type="checkbox" class="form-check-input" id="published" name="published"
                                    value="1" {{ old('published', $londonPage->published ?? false) ? 'checked' : '' }}>
                                <label class="form-check-label" for="published">Published</label>
                            </div>
                        </div>
                        
                    </div>

                    <div class="row">
                        <div class="col-6 my-3">
                            <button type="submit" class="btn btn-primary">{{ $londonPage->id ? 'Update' : 'Save' }}</button>
                            @if($is_card)
                            <a class="btn btn-secondary" href="{{ route('admin.london-page.index', ['section' => $section, 'is_card' => $is_card]) }}">Cancel</a>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
