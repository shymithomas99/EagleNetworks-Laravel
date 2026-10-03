@extends('layouts.admin')
@section('content')
    <div class="container px-5 py-5">
        <div class="card">
            <div class="card-header">
                {{ $title ?? null }}
            </div>
            <div class="card-body">
                <form method="POST" action="{{ $servicesPage->id ? route('admin.services-page.update', ['section' => $section, 'is_card' => $is_card, 'servicesPage' => $servicesPage]) : route('admin.services-page.store', ['section' => $section, 'is_card' => $is_card]) }}"
                    enctype="multipart/form-data">
                    @csrf
                    {{ $servicesPage->id ? method_field('PUT') : '' }}
                    <div class="row">

                        @if(!$is_card && ($section === '3' || $section === '4' || $section === '8'))
                        <div class="col-6 my-3">
                            <label for="label">Label *</label>
                            <input type="text" class="form-control" id="label" placeholder=""
                                name="label" value="{{ old('label', $servicesPage->label ?? '') }}">
                            @error('label')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>
                        @endif

                        <div class="col-6 my-3">
                            <label for="title">Title *</label>
                            <input type="text" class="form-control" id="title" placeholder=""
                                name="title" value="{{ old('title', $servicesPage->title ?? '') }}">
                            @error('title')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>

                        @if ($is_card && $section === '2')
                        <div class="col-6 my-3">
                            <label for="short_description">Short Description (Home Page)</label><br>
                            <textarea class="form-control" name="short_description" id="short_description" rows="3"
                                placeholder="">{{ old('short_description', $servicesPage->short_description ?? '') }}</textarea>
                            @error('short_description')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>
                        @endif
                
                        <div class="col-6 my-3">
                            <label for="description">Description *</label><br>
                            <textarea class="form-control" name="description" id="description" rows="3"
                                placeholder="">{{ old('description', $servicesPage->description ?? '') }}</textarea>
                            @error('description')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>

                        @if ($is_card && ($section === '2' || $section === '3' || $section === '4'))
                        <div class="col-6 my-3">
                            @php
                            if ($section == 2) {
                                $imgSpec = "32 x 32 px, max 10 KB";
                            }
                            elseif ($section === '3') {
                                $imgSpec = "1432 x 768 px, max 700 KB";
                            }
                            elseif ($section === '4') {
                                $imgSpec = "760 x 440 px, max 100 KB";
                            }
                            @endphp
                            <label class="form-label" for="image">Image ({{$imgSpec}}){{ !$servicesPage->id ? ' *' : '' }}:</label>
                            <div class="image-upload-wrapper">
                                <input type="file" class="form-control custom-file-input" id="image" name="image"
                                    accept="image/*"
                                    onchange="document.getElementById('uploaded_img').src = window.URL.createObjectURL(this.files[0])"
                                    title="">
                                <img id="uploaded_img" alt="Image" class="uploaded-img"
                                    src="{{ $servicesPage->image ? asset('backend_assets/services-page/' . $servicesPage->image) : asset('backend_assets/images/upload_image.png') }}" />
                            </div>    
                            @error('image')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>
                        @endif

                        @if ($is_card && $section === '3')
                        <div class="col-6 my-3">
                            <label for="key_services">Key Services *</label><br>
                            <textarea class="form-control" name="key_services" id="key_services" rows="4"
                                placeholder="One per line...">{{ old('key_services', $servicesPage->key_services ?? '') }}</textarea>
                            @error('key_services')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>
                
                        <div class="col-6 my-3">
                            <label for="key_points">Key Points *</label><br>
                            <textarea class="form-control" name="key_points" id="key_points" rows="4"
                                placeholder="One per line...">{{ old('key_points', $servicesPage->key_points ?? '') }}</textarea>
                            @error('key_points')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>
                        @endif

                        @if ($is_card && $section === '4')
                        <div class="col-6 my-3">
                            <label for="link_text">Link Text *</label>
                            <input type="text" class="form-control" id="link_text" placeholder=""
                                name="link_text" value="{{ old('link_text', $servicesPage->link_text ?? '') }}">
                            @error('link_text')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>
                
                        <div class="col-6 my-3">
                            <label for="link_url">Link URL *</label>
                            <input type="text" class="form-control" id="link_url" placeholder=""
                                name="link_url" value="{{ old('link_url', $servicesPage->link_url ?? '') }}">
                            @error('link_url')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>
                        @endif

                        @if(!$is_card && in_array($section, [1, 7]))
                        <div class="col-6 my-3">
                            <label for="button_text">Button Text</label>
                            <input type="text" class="form-control" id="button_text" placeholder=""
                                name="button_text" value="{{ old('button_text', $servicesPage->button_text ?? '') }}">
                            @error('button_text')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>
                
                        <div class="col-6 my-3">
                            <label for="button_url">Button URL</label>
                            <input type="text" class="form-control" id="button_url" placeholder=""
                                name="button_url" value="{{ old('button_url', $servicesPage->button_url ?? '') }}">
                            @error('button_url')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>
                        @endif

                        @if(!$is_card && $section === '9')
                        <div class="col-6 my-3">
                            <label for="button1_text">Button 1 Text</label>
                            <input type="text" class="form-control" id="button1_text" placeholder=""
                                name="button1_text" value="{{ old('button1_text', $servicesPage->button1_text ?? '') }}">
                            @error('button1_text')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>
                
                        <div class="col-6 my-3">
                            <label for="button1_url">Button 1 URL</label>
                            <input type="text" class="form-control" id="button1_url" placeholder=""
                                name="button1_url" value="{{ old('button1_url', $servicesPage->button1_url ?? '') }}">
                            @error('button1_url')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>
 
                        <div class="col-6 my-3">
                            <label for="button2_text">Button 2 Text</label>
                            <input type="text" class="form-control" id="button2_text" placeholder=""
                                name="button2_text" value="{{ old('button2_text', $servicesPage->button2_text ?? '') }}">
                            @error('button2_text')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>
                
                        <div class="col-6 my-3">
                            <label for="button2_url">Button 2 URL</label>
                            <input type="text" class="form-control" id="button2_url" placeholder=""
                                name="button2_url" value="{{ old('button2_url', $servicesPage->button2_url ?? '') }}">
                            @error('button2_url')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>
                        @endif

                        @if($is_card)
                        <div class="col-3 my-3">
                            <label for="display_order">Display Order</label>
                            <input type="number" id="display_order" class="form-control" name="display_order"
                                value="{{ old('display_order', $servicesPage->display_order ?? 0) }}">
                            @error('display_order')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>
                        @endif
                
                        <div class="col-3 my-3 d-flex align-items-end">
                            <div>
                                <input type="checkbox" class="form-check-input" id="published" name="published"
                                    value="1" {{ old('published', $servicesPage->published ?? false) ? 'checked' : '' }}>
                                <label class="form-check-label" for="published">Published</label>
                            </div>
                        </div>

                        @if($is_card && $section === '2')
                        <div class="col-3 my-3 d-flex align-items-end">
                            <div>
                                <input type="checkbox" class="form-check-input" id="featured" name="featured"
                                    value="1" {{ old('featured', $servicesPage->featured ?? false) ? 'checked' : '' }}>
                                <label class="form-check-label" for="featured">Featured</label>
                            </div>
                        </div>
                        @endif
                    </div>

                    <div class="row">
                        <div class="col-6 my-3">
                            <button type="submit" class="btn btn-primary">{{ $servicesPage->id ? 'Update' : 'Save' }}</button>
                            @if($is_card)
                            <a class="btn btn-secondary" href="{{ route('admin.services-page.index', ['section' => $section, 'is_card' => $is_card]) }}">Cancel</a>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
