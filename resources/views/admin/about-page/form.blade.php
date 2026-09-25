@extends('layouts.admin')
@section('content')
    <div class="container px-5 py-5">
        <div class="card">
            <div class="card-header">
                {{ $title ?? null }}
            </div>
            <div class="card-body">
                <form method="POST" action="{{ $aboutPage->id ? route('admin.about-page.update', ['section' => $section, 'is_card' => $is_card, 'aboutPage' => $aboutPage]) : route('admin.about-page.store', ['section' => $section, 'is_card' => $is_card]) }}"
                    enctype="multipart/form-data">
                    @csrf
                    {{ $aboutPage->id ? method_field('PUT') : '' }}
                    <div class="row">

                        @if(!$is_card || ($is_card && in_array($section, [5, 6, 7])))
                        <div class="col-6 my-3">
                            <label for="label">Label *</label>
                            <input type="text" class="form-control" id="label" placeholder=""
                                name="label" value="{{ old('label', $aboutPage->label ?? '') }}">
                            @error('label')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>
                        @endif

                        <div class="col-6 my-3">
                            <label for="title">Title *</label>
                            <input type="text" class="form-control" id="title" placeholder=""
                                name="title" value="{{ old('title', $aboutPage->title ?? '') }}">
                            @error('title')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>

                        @if($is_card || (!$is_card && in_array($section, [1, 2, 4, 5, 6, 7, 8, 9, 10, 11])))
                        <div class="col-6 my-3">
                            <label for="description">Description {{ !$is_card && $section === '2' ? '(Enter each paragraph on a new line)' : '' }} *</label><br>
                            <textarea class="form-control" name="description" id="description" rows="3"
                                placeholder="">{{ old('description', $aboutPage->description ?? '') }}</textarea>
                            @error('description')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>
                        @endif

                        @if(!$is_card && $section === '2')
                        <div class="col-6 my-3">
                            <label for="founded">Founded</label>
                            <input type="text" class="form-control" id="founded" placeholder=""
                                name="founded" value="{{ old('founded', $aboutPage->founded ?? '') }}">
                            @error('founded')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-6 my-3">
                            <label for="stat_value">Stat Value</label>
                            <input type="text" class="form-control" id="stat_value" placeholder=""
                                name="stat_value" value="{{ old('stat_value', $aboutPage->stat_value ?? '') }}">
                            @error('stat_value')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-6 my-3">
                            <label for="stat_title">Stat Title</label>
                            <input type="text" class="form-control" id="stat_title" placeholder=""
                                name="stat_title" value="{{ old('stat_title', $aboutPage->stat_title ?? '') }}">
                            @error('stat_title')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-6 my-3">
                            <label for="stat_description">Stat Description</label><br>
                            <textarea class="form-control" name="stat_description" id="stat_description" rows="3"
                                placeholder="">{{ old('stat_description', $aboutPage->stat_description ?? '') }}</textarea>
                            @error('stat_description')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>
                        @endif
                        
                        @if((!$is_card && $section === '2') || ($is_card && $section === '6'))
                        <div class="col-6 my-3">
                            <label for="link_text">Link Text</label>
                            <input type="text" class="form-control" id="link_text" placeholder=""
                                name="link_text" value="{{ old('link_text', $aboutPage->link_text ?? '') }}">
                            @error('link_text')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>
                
                        <div class="col-6 my-3">
                            <label for="link_url">Link URL</label>
                            <input type="text" class="form-control" id="link_url" placeholder=""
                                name="link_url" value="{{ old('link_url', $aboutPage->link_url ?? '') }}">
                            @error('link_url')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>
                        @endif

                        @if(in_array($section, [1, 11]))
                        <div class="col-6 my-3">
                            <label for="button1_text">Button 1 Text</label>
                            <input type="text" class="form-control" id="button1_text" placeholder=""
                                name="button1_text" value="{{ old('button1_text', $aboutPage->button1_text ?? '') }}">
                            @error('button1_text')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>
                
                        <div class="col-6 my-3">
                            <label for="button1_url">Button 1 URL</label>
                            <input type="text" class="form-control" id="button1_url" placeholder=""
                                name="button1_url" value="{{ old('button1_url', $aboutPage->button1_url ?? '') }}">
                            @error('button1_url')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-6 my-3">
                            <label for="button2_text">Button 2 Text</label>
                            <input type="text" class="form-control" id="button2_text" placeholder=""
                                name="button2_text" value="{{ old('button2_text', $aboutPage->button2_text ?? '') }}">
                            @error('button2_text')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>
                
                        <div class="col-6 my-3">
                            <label for="button2_url">Button 2 URL</label>
                            <input type="text" class="form-control" id="button2_url" placeholder=""
                                name="button2_url" value="{{ old('button2_url', $aboutPage->button2_url ?? '') }}">
                            @error('button2_url')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>
                        @endif

                        @if($is_card)
                        <div class="col-3 my-3">
                            <label for="display_order">Display Order</label>
                            <input type="number" id="display_order" class="form-control" name="display_order"
                                value="{{ old('display_order', $aboutPage->display_order ?? 0) }}">
                            @error('display_order')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>
                        @endif
                
                        <div class="col-3 my-3 d-flex align-items-end">
                            <div>
                                <input type="checkbox" class="form-check-input" id="published" name="published"
                                    value="1" {{ old('published', $aboutPage->published ?? false) ? 'checked' : '' }}>
                                <label class="form-check-label" for="published">Published</label>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-6 my-3">
                            <button type="submit" class="btn btn-primary">{{ $aboutPage->id ? 'Update' : 'Save' }}</button>
                            @if($is_card)
                            <a class="btn btn-secondary" href="{{ route('admin.about-page.index', ['section' => $section, 'is_card' => $is_card]) }}">Cancel</a>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
