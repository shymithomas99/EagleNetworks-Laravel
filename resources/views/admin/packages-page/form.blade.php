@extends('layouts.admin')
@section('content')
    <div class="container px-5 py-5">
        <div class="card">
            <div class="card-header">
                {{ $title ?? null }}
            </div>
            <div class="card-body">
                <form method="POST" action="{{ $packagesPage->id ? route('admin.packages-page.update', ['section' => $section, 'is_card' => $is_card, 'packagesPage' => $packagesPage]) : route('admin.packages-page.store', ['section' => $section, 'is_card' => $is_card]) }}"
                    enctype="multipart/form-data">
                    @csrf
                    {{ $packagesPage->id ? method_field('PUT') : '' }}
                    <div class="row">

                        @if(!$is_card && $section === '6')
                        <div class="col-6 my-3">
                            <label for="short_title">Short Title *</label>
                            <input type="text" class="form-control" id="short_title" placeholder=""
                                name="short_title" value="{{ old('short_title', $packagesPage->short_title ?? '') }}">
                            @error('short_title')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>
                        @endif

                        <div class="col-6 my-3">
                            <label for="title">Title *</label>
                            <input type="text" class="form-control" id="title" placeholder=""
                                name="title" value="{{ old('title', $packagesPage->title ?? '') }}">
                            @error('title')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>

                        @if($is_card && $section === '3')
                        <div class="col-6 my-3">
                            <label for="support_title">Support Title *</label>
                            <input type="text" class="form-control" id="support_title" placeholder=""
                                name="support_title" value="{{ old('support_title', $packagesPage->support_title ?? '') }}">
                            @error('support_title')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>
                        @endif
                
                        <div class="col-6 my-3">
                            <label for="description">Description *</label><br>
                            <textarea class="form-control" name="description" id="description" rows="3"
                                placeholder="">{{ old('description', $packagesPage->description ?? '') }}</textarea>
                            @error('description')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>

                        @if($is_card && $section === '3')
                        <div class="col-6 my-3">
                            <label for="support_description">Support Description *</label><br>
                            <textarea class="form-control" name="support_description" id="support_description" rows="3"
                                placeholder="">{{ old('support_description', $packagesPage->support_description ?? '') }}</textarea>
                            @error('support_description')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-6 my-3">
                            <label for="key_services">Key Services *</label><br>
                            <textarea class="form-control" name="key_services" id="key_services" rows="4"
                                placeholder="One per line...">{{ old('key_services', $packagesPage->key_services ?? '') }}</textarea>
                            @error('key_services')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>
                        @endif

                        @if(!$is_card && $section === '7')
                        <div class="col-6 my-3">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" placeholder=""
                                name="email" value="{{ old('email', $packagesPage->email ?? '') }}">
                            @error('email')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-6 my-3">
                            <label for="website">Website</label>
                            <input type="text" class="form-control" id="website" placeholder=""
                                name="website" value="{{ old('website', $packagesPage->website ?? '') }}">
                            @error('website')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-6 my-3">
                            <label for="linkedin">Linkedin</label>
                            <input type="text" class="form-control" id="linkedin" placeholder=""
                                name="linkedin" value="{{ old('linkedin', $packagesPage->linkedin ?? '') }}">
                            @error('linkedin')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>
                        @endif

                        @if(!$is_card && ($section === '1' || $section === '4' || $section === '7'))
                        <div class="col-6 my-3">
                            <label for="button_text">Button Text</label>
                            <input type="text" class="form-control" id="button_text" placeholder=""
                                name="button_text" value="{{ old('button_text', $packagesPage->button_text ?? '') }}">
                            @error('button_text')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>
                
                        <div class="col-6 my-3">
                            <label for="button_url">Button URL</label>
                            <input type="text" class="form-control" id="button_url" placeholder=""
                                name="button_url" value="{{ old('button_url', $packagesPage->button_url ?? '') }}">
                            @error('button_url')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>
                        @endif
                        
                        @if($is_card)
                        <div class="col-3 my-3">
                            <label for="display_order">Display Order</label>
                            <input type="number" id="display_order" class="form-control" name="display_order"
                                value="{{ old('display_order', $packagesPage->display_order ?? 0) }}">
                            @error('display_order')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>
                        @endif
                
                        <div class="col-3 my-3 d-flex align-items-end">
                            <div>
                                <input type="checkbox" class="form-check-input" id="published" name="published"
                                    value="1" {{ old('published', $packagesPage->published ?? false) ? 'checked' : '' }}>
                                <label class="form-check-label" for="published">Published</label>
                            </div>
                        </div>

                        @if($is_card && $section === '3')
                        <div class="col-3 my-3 d-flex align-items-end">
                            <div>
                                <input type="checkbox" class="form-check-input" id="featured" name="featured"
                                    value="1" {{ old('featured', $packagesPage->featured ?? false) ? 'checked' : '' }}>
                                <label class="form-check-label" for="featured">Featured</label>
                            </div>
                        </div>

                        <div class="col-3 my-3 d-flex align-items-end">
                            <div>
                                <input type="checkbox" class="form-check-input" id="most_popular" name="most_popular"
                                    value="1" {{ old('most_popular', $packagesPage->most_popular ?? false) ? 'checked' : '' }}>
                                <label class="form-check-label" for="most_popular">Most Popular</label>
                            </div>
                        </div>
                        @endif
                    </div>

                    <div class="row">
                        <div class="col-6 my-3">
                            <button type="submit" class="btn btn-primary">{{ $packagesPage->id ? 'Update' : 'Save' }}</button>
                            @if($is_card)
                            <a class="btn btn-secondary" href="{{ route('admin.packages-page.index', ['section' => $section, 'is_card' => $is_card]) }}">Cancel</a>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
