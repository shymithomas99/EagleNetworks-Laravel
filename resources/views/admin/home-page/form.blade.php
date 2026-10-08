@extends('layouts.admin')
@section('content')
    <div class="container px-5 py-5">
        <div class="card">
            <div class="card-header">
                {{ $title ?? null }}
            </div>
            <div class="card-body">
                <form method="POST" action="{{ $homePage->id ? route('admin.home-page.update', ['section' => $section, 'is_card' => $is_card, 'homePage' => $homePage]) : route('admin.home-page.store', ['section' => $section, 'is_card' => $is_card]) }}"
                    enctype="multipart/form-data">
                    @csrf
                    {{ $homePage->id ? method_field('PUT') : '' }}
                    <div class="row">

                        @if($is_card && $section === '6')
                        <div class="col-6 my-3">
                            <label for="label">Label *</label>
                            <input type="text" class="form-control" id="label" placeholder=""
                                name="label" value="{{ old('label', $homePage->label ?? '') }}">
                            @error('label')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>
                        @endif

                        @if($is_card && in_array($section, [3, 5, 9]))
                        @php
                            if ($section === '3') {
                                $imgSpec = "84 x 84 px, max 50 KB";
                            }
                            elseif ($section === '5') {
                                $imgSpec = "max 600 KB";
                            }
                            elseif ($section === '9') {
                                $imgSpec = "32 x 32 px, max 10 KB";
                            }
                        @endphp
                        <div class="col-6 my-3">
                            <label class="form-label" for="image">Image ({{$imgSpec}}){{ !$homePage->id ? ' *' : '' }}</label>
                            <div class="image-upload-wrapper">
                                <input type="file" class="form-control custom-file-input" id="image" name="image"
                                    accept="image/*"
                                    onchange="document.getElementById('uploaded_img').src = window.URL.createObjectURL(this.files[0])"
                                    title="">
                                <img id="uploaded_img" alt="Image" class="uploaded-img"
                                    src="{{ $homePage->image ? asset('backend_assets/home-page/' . $homePage->image) : asset('backend_assets/images/upload_image.png') }}" />
                            </div>    
                            @error('image')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>
                        @endif

                        <div class="col-6 my-3">
                            <label for="title">Title *</label>
                            <input type="text" class="form-control" id="title" placeholder=""
                                name="title" value="{{ old('title', $homePage->title ?? '') }}">
                            @error('title')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>

                        @if((!$is_card) || ($is_card && in_array($section, [6, 9])))
                        <div class="col-6 my-3">
                            <label for="description">Description {{ !$is_card && $section === '2' ? '(Enter each paragraph on a new line)' : '' }} *</label><br>
                            <textarea class="form-control" name="description" id="description" rows="3"
                                placeholder="">{{ old('description', $homePage->description ?? '') }}</textarea>
                            @error('description')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>
                        @endif
                        
                        @if(!$is_card && in_array($section, [1, 6]) || ($is_card && $section === '6'))
                        <div class="col-6 my-3">
                            <label for="additional_description">Additional Description</label><br>
                            <textarea class="form-control" name="additional_description" id="additional_description" rows="3"
                                placeholder="">{{ old('additional_description', $homePage->additional_description ?? '') }}</textarea>
                            @error('additional_description')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>
                        @endif
                        
                        @if(!$is_card && $section === '8')
                        <div class="col-6 my-3">
                            <label for="rating">Star Rating *</label>
                            <input type="number" class="form-control" id="rating" placeholder=""
                                name="rating" value="{{ old('rating', $homePage->rating ?? '') }}">
                            @error('rating')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="col-6 my-3">
                            <label for="testimonial">Testimonial *</label><br>
                            <textarea class="form-control" name="testimonial" id="testimonial" rows="3"
                                placeholder="">{{ old('testimonial', $homePage->testimonial ?? '') }}</textarea>
                            @error('testimonial')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-6 my-3">
                            <label for="client_name">Client Name *</label>
                            <input type="text" class="form-control" id="client_name" placeholder=""
                                name="client_name" value="{{ old('client_name', $homePage->client_name ?? '') }}">
                            @error('client_name')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>
                        @endif

                        @if($section === '6')
                            @if($is_card)
                            <div class="col-6 my-3">
                                <label for="tag_1">Tag 1</label>
                                <input type="text" class="form-control" id="tag_1" placeholder=""
                                    name="tag_1" value="{{ old('tag_1', $homePage->tag_1 ?? '') }}">
                                @error('tag_1')
                                    <p style="color:red">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-6 my-3">
                                <label for="tag_2">Tag 2</label>
                                <input type="text" class="form-control" id="tag_2" placeholder=""
                                    name="tag_2" value="{{ old('tag_2', $homePage->tag_2 ?? '') }}">
                                @error('tag_2')
                                    <p style="color:red">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-6 my-3">
                                <label for="tag_3">Tag 3</label>
                                <input type="text" class="form-control" id="tag_3" placeholder=""
                                    name="tag_3" value="{{ old('tag_3', $homePage->tag_3 ?? '') }}">
                                @error('tag_3')
                                    <p style="color:red">{{ $message }}</p>
                                @enderror
                            </div>
                            @endif

                            @if(!$is_card)
                            <div class="col-6 my-3">
                                <label for="cta_title">CTA Title *</label>
                                <input type="text" class="form-control" id="cta_title" placeholder=""
                                    name="cta_title" value="{{ old('cta_title', $homePage->cta_title ?? '') }}">
                                @error('cta_title')
                                    <p style="color:red">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div class="col-6 my-3">
                                <label for="cta_description">CTA Description *</label><br>
                                <textarea class="form-control" name="cta_description" id="cta_description" rows="3"
                                    placeholder="">{{ old('cta_description', $homePage->cta_description ?? '') }}</textarea>
                                @error('cta_description')
                                    <p style="color:red">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div class="col-6 my-3">
                                <label for="cta_button_text">CTA Button Text</label>
                                <input type="text" class="form-control" id="cta_button_text" placeholder=""
                                    name="cta_button_text" value="{{ old('cta_button_text', $homePage->cta_button_text ?? '') }}">
                                @error('cta_button_text')
                                    <p style="color:red">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-6 my-3">
                                <label for="cta_button_url">CTA Button URL</label>
                                <input type="text" class="form-control" id="cta_button_url" placeholder=""
                                    name="cta_button_url" value="{{ old('cta_button_url', $homePage->cta_button_url ?? '') }}">
                                @error('cta_button_url')
                                    <p style="color:red">{{ $message }}</p>
                                @enderror
                            </div>
                            @endif
                        @endif

                        @if(!$is_card && $section === '2')
                        <div class="col-6 my-3">
                            <label for="button_text">Button Text</label>
                            <input type="text" class="form-control" id="button_text" placeholder=""
                                name="button_text" value="{{ old('button_text', $homePage->button_text ?? '') }}">
                            @error('button_text')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>
                
                        <div class="col-6 my-3">
                            <label for="button_url">Button URL</label>
                            <input type="text" class="form-control" id="button_url" placeholder=""
                                name="button_url" value="{{ old('button_url', $homePage->button_url ?? '') }}">
                            @error('button_url')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>
                        @endif

                        @if(!$is_card && in_array($section, [1, 10]) || ($is_card && $section === '6'))
                        <div class="col-6 my-3">
                            <label for="button1_text">Button 1 Text</label>
                            <input type="text" class="form-control" id="button1_text" placeholder=""
                                name="button1_text" value="{{ old('button1_text', $homePage->button1_text ?? '') }}">
                            @error('button1_text')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>
                
                        <div class="col-6 my-3">
                            <label for="button1_url">Button 1 URL</label>
                            <input type="text" class="form-control" id="button1_url" placeholder=""
                                name="button1_url" value="{{ old('button1_url', $homePage->button1_url ?? '') }}">
                            @error('button1_url')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-6 my-3">
                            <label for="button2_text">Button 2 Text</label>
                            <input type="text" class="form-control" id="button2_text" placeholder=""
                                name="button2_text" value="{{ old('button2_text', $homePage->button2_text ?? '') }}">
                            @error('button2_text')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>
                
                        <div class="col-6 my-3">
                            <label for="button2_url">Button 2 URL</label>
                            <input type="text" class="form-control" id="button2_url" placeholder=""
                                name="button2_url" value="{{ old('button2_url', $homePage->button2_url ?? '') }}">
                            @error('button2_url')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>
                        @endif

                        @if($is_card)
                        <div class="col-3 my-3">
                            <label for="display_order">Display Order</label>
                            <input type="number" id="display_order" class="form-control" name="display_order"
                                value="{{ old('display_order', $homePage->display_order ?? 0) }}">
                            @error('display_order')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>
                        @endif
                
                        <div class="col-3 my-3 d-flex align-items-end">
                            <div>
                                <input type="checkbox" class="form-check-input" id="published" name="published"
                                    value="1" {{ old('published', $homePage->published ?? false) ? 'checked' : '' }}>
                                <label class="form-check-label" for="published">Published</label>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-6 my-3">
                            <button type="submit" class="btn btn-primary">{{ $homePage->id ? 'Update' : 'Save' }}</button>
                            @if($is_card)
                            <a class="btn btn-secondary" href="{{ route('admin.home-page.index', ['section' => $section, 'is_card' => $is_card]) }}">Cancel</a>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
