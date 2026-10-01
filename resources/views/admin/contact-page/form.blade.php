@extends('layouts.admin')
@section('content')
    <div class="container px-5 py-5">
        <div class="card">
            <div class="card-header">
                {{ $title ?? null }}
            </div>
            <div class="card-body">
                <form method="POST" action="{{ $contactPage->id ? route('admin.contact-page.update', ['section' => $section, 'is_card' => $is_card, 'contactPage' => $contactPage]) : route('admin.contact-page.store', ['section' => $section, 'is_card' => $is_card]) }}"
                    enctype="multipart/form-data">
                    @csrf
                    {{ $contactPage->id ? method_field('PUT') : '' }}
                    <div class="row">

                        @if($is_card && $section === '3')
                        <div class="col-6 my-3">
                            <label for="label">Label *</label>
                            <input type="text" class="form-control" id="label" placeholder=""
                                name="label" value="{{ old('label', $contactPage->label ?? '') }}">
                            @error('label')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>
                        @endif

                        <div class="col-6 my-3">
                            <label for="title">Title *</label>
                            <input type="text" class="form-control" id="title" placeholder=""
                                name="title" value="{{ old('title', $contactPage->title ?? '') }}">
                            @error('title')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>

                        @if($is_card || (!$is_card && in_array($section, [1, 2, 4, 5])))
                        <div class="col-6 my-3">
                            <label for="description">Description *</label><br>
                            <textarea class="form-control" name="description" id="description" rows="3"
                                placeholder="">{{ old('description', $contactPage->description ?? '') }}</textarea>
                            @error('description')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>
                        @endif

                         @if(!$is_card && $section === '1')
                        <div class="col-6 my-3">
                            <label for="button_text">Button Text</label>
                            <input type="text" class="form-control" id="button_text" placeholder=""
                                name="button_text" value="{{ old('button_text', $contactPage->button_text ?? '') }}">
                            @error('button_text')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>
                
                        <div class="col-6 my-3">
                            <label for="button_url">Button URL</label>
                            <input type="text" class="form-control" id="button_url" placeholder=""
                                name="button_url" value="{{ old('button_url', $contactPage->button_url ?? '') }}">
                            @error('button_url')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>
                        @endif

                        @if($is_card && $section === '3')
                        <div class="col-6 my-3">
                            <label for="tag_1">Tag 1</label>
                            <input type="text" class="form-control" id="tag_1" placeholder=""
                                name="tag_1" value="{{ old('tag_1', $contactPage->tag_1 ?? '') }}">
                            @error('tag_1')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-6 my-3">
                            <label for="tag_2">Tag 2</label>
                            <input type="text" class="form-control" id="tag_2" placeholder=""
                                name="tag_2" value="{{ old('tag_2', $contactPage->tag_2 ?? '') }}">
                            @error('tag_2')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-6 my-3">
                            <label for="tag_3">Tag 3</label>
                            <input type="text" class="form-control" id="tag_3" placeholder=""
                                name="tag_3" value="{{ old('tag_3', $contactPage->tag_3 ?? '') }}">
                            @error('tag_3')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-6 my-3">
                            <label for="location">Location *</label>
                            <input type="text" class="form-control" id="location" placeholder=""
                                name="location" value="{{ old('location', $contactPage->location ?? '') }}">
                            @error('location')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-6 my-3">
                            <label for="company_name">Company Name *</label>
                            <input type="text" class="form-control" id="company_name" placeholder=""
                                name="company_name" value="{{ old('company_name', $contactPage->company_name ?? '') }}">
                            @error('company_name')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-6 my-3">
                            <label for="address">Address *</label><br>
                            <textarea class="form-control" name="address" id="address" rows="3"
                                placeholder="">{{ old('address', $contactPage->address ?? '') }}</textarea>
                            @error('address')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-6 my-3">
                            <label for="phone_1">Phone 1 *</label>
                            <input type="text" class="form-control" id="phone_1" placeholder=""
                                name="phone_1" value="{{ old('phone_1', $contactPage->phone_1 ?? '') }}">
                            @error('phone_1')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-6 my-3">
                            <label for="phone_2">Phone 2</label>
                            <input type="text" class="form-control" id="phone_2" placeholder=""
                                name="phone_2" value="{{ old('phone_2', $contactPage->phone_2 ?? '') }}">
                            @error('phone_2')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-6 my-3">
                            <label for="email">Email *</label>
                            <input type="text" class="form-control" id="email" placeholder=""
                                name="email" value="{{ old('email', $contactPage->email ?? '') }}">
                            @error('email')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-6 my-3">
                            <label for="map_url">Map URL*</label>
                            <input type="text" class="form-control" id="map_url" placeholder=""
                                name="map_url" value="{{ old('map_url', $contactPage->map_url ?? '') }}">
                            @error('map_url')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>
                        @endif
                        

                        @if(!$is_card && $section === '5')
                        <div class="col-6 my-3">
                            <label for="link_url">Instagram</label>
                            <input type="text" class="form-control" id="link_url" placeholder=""
                                name="link_url" value="{{ old('link_url', $contactPage->link_url ?? '') }}">
                            @error('link_url')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-6 my-3">
                            <label for="linkedin">LinkedIn</label>
                            <input type="text" class="form-control" id="linkedin" placeholder=""
                                name="linkedin" value="{{ old('linkedin', $contactPage->linkedin ?? '') }}">
                            @error('linkedin')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-6 my-3">
                            <label for="x">X (formerly Twitter)</label>
                            <input type="text" class="form-control" id="x" placeholder=""
                                name="x" value="{{ old('x', $contactPage->x ?? '') }}">
                            @error('x')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-6 my-3">
                            <label for="tiktok">TikTok</label>
                            <input type="text" class="form-control" id="tiktok" placeholder=""
                                name="tiktok" value="{{ old('tiktok', $contactPage->tiktok ?? '') }}">
                            @error('tiktok')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-6 my-3">
                            <label for="youtube">YouTube</label>
                            <input type="text" class="form-control" id="youtube" placeholder=""
                                name="youtube" value="{{ old('youtube', $contactPage->youtube ?? '') }}">
                            @error('youtube')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>
                        @endif

                        @if($is_card)
                        <div class="col-3 my-3">
                            <label for="display_order">Display Order</label>
                            <input type="number" id="display_order" class="form-control" name="display_order"
                                value="{{ old('display_order', $contactPage->display_order ?? 0) }}">
                            @error('display_order')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>
                        @endif
                
                        <div class="col-3 my-3 d-flex align-items-end">
                            <div>
                                <input type="checkbox" class="form-check-input" id="published" name="published"
                                    value="1" {{ old('published', $contactPage->published ?? false) ? 'checked' : '' }}>
                                <label class="form-check-label" for="published">Published</label>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-6 my-3">
                            <button type="submit" class="btn btn-primary">{{ $contactPage->id ? 'Update' : 'Save' }}</button>
                            @if($is_card)
                            <a class="btn btn-secondary" href="{{ route('admin.contact-page.index', ['section' => $section, 'is_card' => $is_card]) }}">Cancel</a>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
