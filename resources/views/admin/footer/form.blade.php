@extends('layouts.admin')
@section('content')
    <div class="container px-5 py-5">
        <div class="card">
            <div class="card-header">
                {{ $title ?? null }}
            </div>
            <div class="card-body">
                <form method="POST" action="{{ $footer->id ? route('admin.footer.update', ['section' => $section, 'is_link' => $is_link, 'footer' => $footer]) : route('admin.footer.store', ['section' => $section, 'is_link' => $is_link]) }}"
                    enctype="multipart/form-data">
                    @csrf
                    {{ $footer->id ? method_field('PUT') : '' }}
                    <div class="row">

                        @if(in_array($section, [1, 2, 6, 7, 8]))
                        <div class="col-6 my-3">
                            <label for="text">Text *</label><br>
                            @if($section === '8')
                            <div class="d-flex align-items-center border rounded bg-white">
                                <span class="px-2 text-muted text-nowrap">&copy; {{ date('Y') }}</span>
                                <input
                                    type="text"
                                    class="form-control border-0 shadow-none"
                                    name="text"
                                    id="text"
                                    value="{{ old('text', $footer->text ?? '') }}"
                                    placeholder=""
                                >
                            </div>
                            @else
                                <textarea class="form-control" name="text" id="text" rows="{{ $section === '1' ? '3' : '1' }}"
                                placeholder="">{{ old('text', $footer->text ?? '') }}</textarea>
                            @endif
                            @error('text')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>
                        @endif

                        @if(in_array($section, [3,4]))
                        <div class="col-6 my-3">
                            <label for="company_name">Company Name *</label>
                            <input type="text" class="form-control" id="company_name" placeholder=""
                                name="company_name" value="{{ old('company_name', $footer->company_name ?? '') }}">
                            @error('company_name')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-6 my-3">
                            <label for="address">Address *</label><br>
                            <textarea class="form-control" name="address" id="address" rows="3"
                                placeholder="">{{ old('address', $footer->address ?? '') }}</textarea>
                            @error('address')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-6 my-3">
                            <label for="phone_1">Phone 1 *</label>
                            <input type="text" class="form-control" id="phone_1" placeholder=""
                                name="phone_1" value="{{ old('phone_1', $footer->phone_1 ?? '') }}">
                            @error('phone_1')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-6 my-3">
                            <label for="phone_2">Phone 2</label>
                            <input type="text" class="form-control" id="phone_2" placeholder=""
                                name="phone_2" value="{{ old('phone_2', $footer->phone_2 ?? '') }}">
                            @error('phone_2')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-6 my-3">
                            <label for="email">Email *</label>
                            <input type="text" class="form-control" id="email" placeholder=""
                                name="email" value="{{ old('email', $footer->email ?? '') }}">
                            @error('email')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>
                        @endif

                        @if($section === '5')
                        <div class="col-6 my-3">
                            <label for="social_media">Social Media *</label>
                            <select name="social_media" class="form-control">
                                @foreach(\App\Enums\SocialMedia::cases() as $social_media)
                                    <option value="{{ $social_media->value }}"
                                        {{ old('social_media', $footer->social_media?->value) == $social_media->value ? 'selected' : '' }}>
                                        {{ $social_media->label() }}
                                    </option>
                                @endforeach
                            </select>
                            @error('social_media')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>
                        @endif

                        @if($section === '6')
                            <div class="col-3 my-3">
                                <label for="link_type" class="">
                                    Link Type *
                                </label>
                                <select
                                    name="link_type"
                                    id="link_type"
                                    class="form-select"
                                >
                                    <option value="">Select Link Type</option>
                                    <option value="1"
                                        {{ old('link_type', $footer->link_type ?? '') == '1' ? 'selected' : '' }}>
                                        URL
                                    </option>

                                    <option value="2"
                                        {{ old('link_type', $footer->link_type ?? '') == '2' ? 'selected' : '' }}>
                                        Cookie Preferences Modal
                                    </option>
                                </select>
                                @error('link_type')
                                    <p style="color:red">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-3 my-3">
                                <div id="legal-url-field">
                                    <label for="legal-url" class="">
                                        URL*
                                    </label>
                                    <input
                                        type="text"
                                        name="url"
                                        id="legal-url"
                                        value="{{ old('url', $footer->url ?? '') }}"
                                        class="form-control"
                                        placeholder=""
                                    >
                                    @error('url')
                                        <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        @endif

                        @if(in_array($section, [2, 5]))
                        <div class="col-6 my-3">
                            <label for="url">URL *</label>
                            <input type="text" class="form-control" id="url" placeholder=""
                                name="url" value="{{ old('url', $footer->url ?? '') }}">
                            @error('url')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div> 
                        @endif

                        @if($section === '7')
                        <div class="col-6 my-3">
                            <label for="description">Description *</label><br>
                            <textarea class="form-control" name="description" id="description" rows="3"
                                placeholder="">{{ old('description', $footer->description ?? '') }}</textarea>
                            @error('description')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-6 my-3">
                            <label for="privacy_text">Privacy Text</label><br>
                            <textarea class="form-control" name="privacy_text" id="privacy_text" rows="3"
                                placeholder="">{{ old('privacy_text', $footer->privacy_text ?? '') }}</textarea>
                            @error('privacy_text')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>
                        @endif

                        @if($is_link)
                        <div class="col-3 my-3">
                            <label for="display_order">Display Order</label>
                            <input type="number" id="display_order" class="form-control" name="display_order"
                                value="{{ old('display_order', $footer->display_order ?? 0) }}">
                            @error('display_order')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>
                        @endif
                
                        <div class="col-3 my-3 d-flex align-items-end">
                            <div>
                                <input type="checkbox" class="form-check-input" id="published" name="published"
                                    value="1" {{ old('published', $footer->published ?? false) ? 'checked' : '' }}>
                                <label class="form-check-label" for="published">Published</label>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-6 my-3">
                            <button type="submit" class="btn btn-primary">{{ $footer->id ? 'Update' : 'Save' }}</button>
                            @if($is_link)
                            <a class="btn btn-secondary" href="{{ route('admin.footer.index', ['section' => $section, 'is_link' => $is_link]) }}">Cancel</a>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
$(document).ready(function () {

    function toggleMediaFields() {
        const mediaType = $('#link_type').val();

        if (mediaType === '1') {
            $('#legal-url-field').show();
        } else {
            $('#legal-url-field').hide();
        }
    }

    $('#link_type').on('change', function () {
        toggleMediaFields();
    });

    // Important for edit form / validation error
    toggleMediaFields();
});
</script>
@endpush