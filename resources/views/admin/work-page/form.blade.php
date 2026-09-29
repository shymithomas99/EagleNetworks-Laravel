@extends('layouts.admin')
@section('content')
    <div class="container px-5 py-5">
        <div class="card">
            <div class="card-header">
                {{ $title ?? null }}
            </div>
            <div class="card-body">
                <form method="POST" action="{{ $workPage->id ? route('admin.work-page.update', ['section' => $section, 'is_card' => $is_card, 'workPage' => $workPage]) : route('admin.work-page.store', ['section' => $section, 'is_card' => $is_card]) }}"
                    enctype="multipart/form-data">
                    @csrf
                    {{ $workPage->id ? method_field('PUT') : '' }}
                    <div class="row">

                        @if((!$is_card && $section === '1') || ($is_card && $section === '4'))
                        <div class="col-6 my-3">
                            <label for="label">Label *</label>
                            <input type="text" class="form-control" id="label" placeholder=""
                                name="label" value="{{ old('label', $workPage->label ?? '') }}">
                            @error('label')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>
                        @endif

                        <div class="col-6 my-3">
                            <label for="title">Title *</label>
                            <input type="text" class="form-control" id="title" placeholder=""
                                name="title" value="{{ old('title', $workPage->title ?? '') }}">
                            @error('title')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-6 my-3">
                            <label for="description">Description *</label><br>
                            <textarea class="form-control" name="description" id="description" rows="3"
                                placeholder="">{{ old('description', $workPage->description ?? '') }}</textarea>
                            @error('description')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>

                        @if($is_card && $section === '4')
                        <div class="col-6 my-3">
                            <label class="form-label" for="image">Image (760 x 440 px, max 100 KB){{ !$workPage->id ? ' *' : '' }}:</label>
                            <div class="image-upload-wrapper">
                                <input type="file" class="form-control custom-file-input" id="image" name="image"
                                    accept="image/*"
                                    onchange="document.getElementById('uploaded_img').src = window.URL.createObjectURL(this.files[0])"
                                    title="">
                                <img id="uploaded_img" alt="Image" class="uploaded-img"
                                    src="{{ $workPage->image ? asset('backend_assets/work-page/' . $workPage->image) : asset('backend_assets/images/upload_image.png') }}" />
                            </div>    
                            @error('image')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-6 my-3">
                            <label for="link_text">Link Text</label>
                            <input type="text" class="form-control" id="link_text" placeholder=""
                                name="link_text" value="{{ old('link_text', $workPage->link_text ?? '') }}">
                            @error('link_text')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>
                
                        <div class="col-6 my-3">
                            <label for="link_url">Link URL</label>
                            <input type="text" class="form-control" id="link_url" placeholder=""
                                name="link_url" value="{{ old('link_url', $workPage->link_url ?? '') }}">
                            @error('link_url')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>
                        @endif

                        @if(!$is_card && $section === '6')
                        <div class="col-6 my-3">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" placeholder=""
                                name="email" value="{{ old('email', $workPage->email ?? '') }}">
                            @error('email')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-6 my-3">
                            <label for="website">Website</label>
                            <input type="text" class="form-control" id="website" placeholder=""
                                name="website" value="{{ old('website', $workPage->website ?? '') }}">
                            @error('website')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-6 my-3">
                            <label for="linkedin">Linkedin</label>
                            <input type="text" class="form-control" id="linkedin" placeholder=""
                                name="linkedin" value="{{ old('linkedin', $workPage->linkedin ?? '') }}">
                            @error('linkedin')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-6 my-3">
                            <label for="button_text">Button Text</label>
                            <input type="text" class="form-control" id="button_text" placeholder=""
                                name="button_text" value="{{ old('button_text', $workPage->button_text ?? '') }}">
                            @error('button_text')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>
                
                        <div class="col-6 my-3">
                            <label for="button_url">Button URL</label>
                            <input type="text" class="form-control" id="button_url" placeholder=""
                                name="button_url" value="{{ old('button_url', $workPage->button_url ?? '') }}">
                            @error('button_url')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>
                        @endif

                        @if($is_card)
                        <div class="col-3 my-3">
                            <label for="display_order">Display Order</label>
                            <input type="number" id="display_order" class="form-control" name="display_order"
                                value="{{ old('display_order', $workPage->display_order ?? 0) }}">
                            @error('display_order')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>
                        @endif
                
                        <div class="col-3 my-3 d-flex align-items-end">
                            <div>
                                <input type="checkbox" class="form-check-input" id="published" name="published"
                                    value="1" {{ old('published', $workPage->published ?? false) ? 'checked' : '' }}>
                                <label class="form-check-label" for="published">Published</label>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-6 my-3">
                            <button type="submit" class="btn btn-primary">{{ $workPage->id ? 'Update' : 'Save' }}</button>
                            @if($is_card)
                            <a class="btn btn-secondary" href="{{ route('admin.work-page.index', ['section' => $section, 'is_card' => $is_card]) }}">Cancel</a>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
