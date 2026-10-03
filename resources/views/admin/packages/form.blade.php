@extends('layouts.admin')
@section('content')
    <div class="container px-5 py-5">

        {{-- Breadcrumb --}}
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"> <a href="{{ route('admin.dashboard') }}"> Dashboard </a> </li>
                <li class="breadcrumb-item"> <a href="{{ route('admin.packages-page.index', [ 'section' => 3, 'is_card' => 1 ]) }}"> Package Cards </a> </li>
                <li class="breadcrumb-item"> <a href="{{ route('admin.packages-page.show', [ 'section' => 3, 'is_card' => 1, 'packagesPage' => $packagesPage ]) }}"> View Package Card (Menu) </a> </li>
                @if($is_card)<li class="breadcrumb-item"> <a href="{{ route('admin.packages.index', [ 'packagesPage' => $packagesPage, 'section' => $section, 'is_card' => $is_card ]) }}"> {{ $prevTitle ?? null }} </a> </li>@endif
                <li class="breadcrumb-item active" aria-current="page"> {{ $title ?? null }}</li>
            </ol>
        </nav>

        <div class="card">
            <div class="card-header">
                {{ $title ?? null }}
            </div>
            <div class="card-body">
                <form method="POST" action="{{ $package->id ? route('admin.packages.update', ['packagesPage' => $packagesPage, 'section' => $section, 'is_card' => $is_card, 'package' => $package]) : route('admin.packages.store', ['packagesPage' => $packagesPage, 'section' => $section, 'is_card' => $is_card]) }}"
                    enctype="multipart/form-data">
                    @csrf
                    {{ $package->id ? method_field('PUT') : '' }}
                    <div class="row">

                        <div class="col-6 my-3">
                            <label for="title">Title *</label>
                            <input type="text" class="form-control" id="title" placeholder=""
                                name="title" value="{{ old('title', $package->title ?? '') }}">
                            @error('title')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>
                
                        <div class="col-6 my-3">
                            <label for="description">Description *</label><br>
                            <textarea class="form-control" name="description" id="description" rows="3"
                                placeholder="">{{ old('description', $package->description ?? '') }}</textarea>
                            @error('description')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>

                        @if($is_card && $section === '2')
                        <div class="col-6 my-3">
                            <label for="additional_title">Additional Title *</label>
                            <input type="text" class="form-control" id="additional_title" placeholder=""
                                name="additional_title" value="{{ old('additional_title', $package->additional_title ?? '') }}">
                            @error('additional_title')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-6 my-3">
                            <label for="key_points">Key Points *</label><br>
                            <textarea class="form-control" name="key_points" id="key_points" rows="4"
                                placeholder="One per line...">{{ old('key_points', $package->key_points ?? '') }}</textarea>
                            @error('key_points')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>
                        @endif

                        @if(!$is_card && $section === '5')
                        <div class="col-6 my-3">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" placeholder=""
                                name="email" value="{{ old('email', $package->email ?? '') }}">
                            @error('email')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-6 my-3">
                            <label for="website">Website</label>
                            <input type="text" class="form-control" id="website" placeholder=""
                                name="website" value="{{ old('website', $package->website ?? '') }}">
                            @error('website')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-6 my-3">
                            <label for="linkedin">LinkedIn</label>
                            <input type="text" class="form-control" id="linkedin" placeholder=""
                                name="linkedin" value="{{ old('linkedin', $package->linkedin ?? '') }}">
                            @error('linkedin')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>
                        @endif

                        @if(!$is_card && $section === '5')
                        <div class="col-6 my-3">
                            <label for="button_text">Button Text</label>
                            <input type="text" class="form-control" id="button_text" placeholder=""
                                name="button_text" value="{{ old('button_text', $package->button_text ?? '') }}">
                            @error('button_text')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>
                
                        <div class="col-6 my-3">
                            <label for="button_url">Button URL</label>
                            <input type="text" class="form-control" id="button_url" placeholder=""
                                name="button_url" value="{{ old('button_url', $package->button_url ?? '') }}">
                            @error('button_url')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>
                        @endif

                        @if(!$is_card && $section === '1' )
                        <div class="col-6 my-3">
                            <label for="button1_text">Button 1 Text</label>
                            <input type="text" class="form-control" id="button1_text" placeholder=""
                                name="button1_text" value="{{ old('button1_text', $package->button1_text ?? '') }}">
                            @error('button1_text')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>
                
                        <div class="col-6 my-3">
                            <label for="button1_url">Button 1 URL</label>
                            <input type="text" class="form-control" id="button1_url" placeholder=""
                                name="button1_url" value="{{ old('button1_url', $package->button1_url ?? '') }}">
                            @error('button1_url')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-6 my-3">
                            <label for="button2_text">Button 2 Text</label>
                            <input type="text" class="form-control" id="button2_text" placeholder=""
                                name="button2_text" value="{{ old('button2_text', $package->button2_text ?? '') }}">
                            @error('button2_text')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>
                
                        <div class="col-6 my-3">
                            <label for="button2_url">Button 2 URL</label>
                            <input type="text" class="form-control" id="button2_url" placeholder=""
                                name="button2_url" value="{{ old('button2_url', $package->button2_url ?? '') }}">
                            @error('button2_url')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>
                        @endif
                        
                        @if($is_card)
                        <div class="col-3 my-3">
                            <label for="display_order">Display Order</label>
                            <input type="number" id="display_order" class="form-control" name="display_order"
                                value="{{ old('display_order', $package->display_order ?? 0) }}">
                            @error('display_order')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>
                        @endif
                
                        <div class="col-3 my-3 d-flex align-items-end">
                            <div>
                                <input type="checkbox" class="form-check-input" id="published" name="published"
                                    value="1" {{ old('published', $package->published ?? false) ? 'checked' : '' }}>
                                <label class="form-check-label" for="published">Published</label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6 my-3">
                            <button type="submit" class="btn btn-primary">{{ $package->id ? 'Update' : 'Save' }}</button>
                            @if($is_card)
                            <a class="btn btn-secondary" href="{{ route('admin.packages.index', ['packagesPage' => $packagesPage, 'section' => $section, 'is_card' => $is_card]) }}">Cancel</a>
                            @else
                            <a href="{{ route('admin.packages-page.show', ['section' => 3, 'is_card' => 1, 'packagesPage' => $packagesPage]) }}" class="btn btn-secondary">Cancel</a>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
