@extends('layouts.admin')

@section('content')
    @php

        $menuItems = old('menu_items', $termsPage->menu_items ?? []);

        if (empty($menuItems)) {
            $menuItems = [
                [
                    'label' => '',
                    'url' => '',
                    'active' => false,
                ],
            ];
        }
    @endphp
    <div class="container px-5 py-5">

        <div class="card">

            <div class="card-header">
                {{ $title }}
            </div>

            <div class="card-body">

                <form method="POST"
                    action="{{ $termsPage->id
                        ? route('admin.terms-page.update', [
                            'section' => $section,
                            'is_card' => $is_card,
                            'termsPage' => $termsPage,
                        ])
                        : route('admin.terms-page.store', [
                            'section' => $section,
                            'is_card' => $is_card,
                        ]) }}">

                    @csrf

                    @if ($termsPage->id)
                        @method('PUT')
                    @endif

                    <div class="row">

                        {{-- INTRO --}}
                        {{--  @if (!$is_card)
                            <div class="col-md-12 my-3">

                                <label for="intro">
                                    Intro
                                </label>

                                <textarea class="form-control" name="intro" id="intro" rows="4">{{ old('intro', $termsPage->intro ?? '') }}</textarea>

                                @error('intro')
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                @enderror

                            </div>
                        @endif  --}}


                        {{-- LABEL --}}
                        @if (!$is_card)
                            <div class="col-md-6 my-3">

                                <label for="label">
                                    Label
                                </label>

                                <input type="text" class="form-control" id="label" name="label"
                                    value="{{ old('label', $termsPage->label ?? '') }}">

                                @error('label')
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                @enderror

                            </div>
                        @endif


                        {{-- TITLE --}}
                        <div class="col-md-6 my-3">

                            <label for="title">
                                Title *
                            </label>

                            <input type="text" class="form-control" id="title" name="title"
                                value="{{ old('title', $termsPage->title ?? '') }}">

                            @error('title')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>


                        {{-- DESCRIPTION --}}
                        <div class="col-md-12 my-3">

                            <label for="description">
                                Description *
                            </label>

                            <textarea class="form-control" name="description" id="description" rows="6">{{ old('description', $termsPage->description ?? '') }}</textarea>

                            @error('description')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>


                        {{-- ADDITIONAL DESCRIPTION --}}
                        @if (!$is_card)
                            <div class="col-md-12 my-3">

                                <label for="additional_description">
                                    Additional Description
                                </label>

                                <textarea class="form-control" name="additional_description" id="additional_description" rows="5">{{ old('additional_description', $termsPage->additional_description ?? '') }}</textarea>

                            </div>
                        @endif


                        {{-- LIMITATION OF LIABILITY NOTICE --}}
                        @if (!$is_card && $section === '6')
                            <div class="col-md-6 my-3">

                                <label for="label">
                                    Notice / Highlight Label
                                </label>

                                <input type="text" class="form-control" name="label"
                                    value="{{ old('label', $termsPage->label ?? '') }}">

                            </div>

                            <div class="col-md-6 my-3">

                                <label for="additional_description">
                                    Notice Content
                                </label>

                                <textarea class="form-control" name="additional_description" rows="4">{{ old('additional_description', $termsPage->additional_description ?? '') }}</textarea>

                            </div>
                        @endif


                        {{-- GOVERNING LAW CONTACT --}}
                        {{-- GOVERNING LAW --}}
                        @if (!$is_card && $section === '9')
                            <div class="col-md-6 my-3">

                                <label for="contact_question">
                                    Contact Question
                                </label>

                                <input type="text" class="form-control" id="contact_question" name="contact_question"
                                    value="{{ old('contact_question', $termsPage->contact_question ?? '') }}">

                                @error('contact_question')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror

                            </div>


                            <div class="col-md-6 my-3">

                                <label for="contact_email">
                                    Contact Email
                                </label>

                                <input type="email" class="form-control" id="contact_email" name="contact_email"
                                    value="{{ old('contact_email', $termsPage->contact_email ?? '') }}">

                                @error('contact_email')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror

                            </div>


                            <div class="col-md-12 my-3">

                                <label for="contact_address">
                                    Contact Address
                                </label>

                                <textarea class="form-control" id="contact_address" name="contact_address" rows="3">{{ old('contact_address', $termsPage->contact_address ?? '') }}</textarea>

                                @error('contact_address')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror

                            </div>


                            <div class="col-md-6 my-3">

                                <label for="effective_date">
                                    Effective Date
                                </label>

                                <input type="text" class="form-control" id="effective_date" name="effective_date"
                                    value="{{ old('effective_date', $termsPage->effective_date ?? '') }}">

                                @error('effective_date')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror

                            </div>


                            <div class="col-md-6 my-3">

                                <label for="operator">
                                    Operator
                                </label>

                                <input type="text" class="form-control" id="operator" name="operator"
                                    value="{{ old('operator', $termsPage->operator ?? '') }}">

                                @error('operator')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror

                            </div>


                            <div class="col-md-12 my-3">

                                <label for="governing_law">
                                    Governing Law
                                </label>

                                <textarea class="form-control" id="governing_law" name="governing_law" rows="4">{{ old('governing_law', $termsPage->governing_law ?? '') }}</textarea>

                                @error('governing_law')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror

                            </div>
                        @endif


                        {{-- CTA --}}
                        @if (!$is_card && in_array($section, ['1']))
                            <div class="col-md-6 my-3">

                                <label>
                                    Button Text
                                </label>

                                <input type="text" class="form-control" name="button_text"
                                    value="{{ old('button_text', $termsPage->button_text ?? '') }}">

                            </div>

                            <div class="col-md-6 my-3">

                                <label>
                                    Button URL
                                </label>

                                <input type="text" class="form-control" name="button_url"
                                    value="{{ old('button_url', $termsPage->button_url ?? '') }}">

                            </div>
                        @endif

                        {{-- CTA BANNER --}}
                        @if (!$is_card && $section === '10')
                            {{-- BUTTON 1 --}}
                            <div class="col-md-6 my-3">

                                <label for="button_text">
                                    Button 1 Text
                                </label>

                                <input type="text" class="form-control" id="button_text" name="button_text"
                                    value="{{ old('button_text', $termsPage->button_text ?? '') }}">

                                @error('button_text')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror

                            </div>


                            <div class="col-md-6 my-3">

                                <label for="button_url">
                                    Button 1 URL
                                </label>

                                <input type="text" class="form-control" id="button_url" name="button_url"
                                    value="{{ old('button_url', $termsPage->button_url ?? '') }}">

                                @error('button_url')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror

                            </div>


                            {{-- BUTTON 2 --}}
                            <div class="col-md-6 my-3">

                                <label for="button_text_2">
                                    Button 2 Text
                                </label>

                                <input type="text" class="form-control" id="button_text_2" name="button_text_2"
                                    value="{{ old('button_text_2', $termsPage->button_text_2 ?? '') }}">

                                @error('button_text_2')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror

                            </div>


                            <div class="col-md-6 my-3">

                                <label for="button_url_2">
                                    Button 2 URL
                                </label>

                                <input type="text" class="form-control" id="button_url_2" name="button_url_2"
                                    value="{{ old('button_url_2', $termsPage->button_url_2 ?? '') }}">

                                @error('button_url_2')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror

                            </div>


                            {{-- BUTTON 3 --}}
                            <div class="col-md-6 my-3">

                                <label for="button_text_3">
                                    Button 3 Text
                                </label>

                                <input type="text" class="form-control" id="button_text_3" name="button_text_3"
                                    value="{{ old('button_text_3', $termsPage->button_text_3 ?? '') }}">

                                @error('button_text_3')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror

                            </div>


                            <div class="col-md-6 my-3">

                                <label for="button_url_3">
                                    Button 3 URL
                                </label>

                                <input type="text" class="form-control" id="button_url_3" name="button_url_3"
                                    value="{{ old('button_url_3', $termsPage->button_url_3 ?? '') }}">

                                @error('button_url_3')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror

                            </div>

                            <hr>

                            <h5 class="font-weight-bold mb-3">
                                Inner Bottom Menu
                            </h5>

                            <div class="row">

                                <div class="col-md-12 mb-3">

                                    <label for="footer_text">
                                        Footer Text
                                    </label>

                                    <textarea name="footer_text" id="footer_text" rows="3" class="form-control">{{ old('footer_text', $termsPage->footer_text ?? '') }}</textarea>

                                </div>

                            </div>

                            <div class="d-flex justify-content-between align-items-center mb-3">

                                <h6 class="font-weight-bold mb-0">
                                    Menu Items
                                </h6>

                                <button type="button" class="btn btn-primary" id="add-menu-item">
                                    + Add Menu Item
                                </button>

                            </div>

                            <div id="menu-items-wrapper">

                                @foreach ($menuItems as $index => $item)
                                    <div class="menu-item-row border rounded p-3 mb-3">

                                        <div class="row">

                                            <div class="col-md-4">

                                                <label>
                                                    Menu Label
                                                </label>

                                                <input type="text" class="form-control"
                                                    name="menu_items[{{ $index }}][label]"
                                                    value="{{ $item['label'] ?? '' }}"
                                                    placeholder="Example: Our Services">

                                            </div>

                                            <div class="col-md-4">

                                                <label>
                                                    Menu URL
                                                </label>

                                                <input type="text" class="form-control"
                                                    name="menu_items[{{ $index }}][url]"
                                                    value="{{ $item['url'] ?? '' }}" placeholder="Example: /services">

                                            </div>

                                            <div class="col-md-2">

                                                <label>
                                                    Active
                                                </label>

                                                <div class="form-check mt-2">

                                                    <input type="hidden" name="menu_items[{{ $index }}][active]"
                                                        value="0">

                                                    <input type="checkbox" class="form-check-input"
                                                        name="menu_items[{{ $index }}][active]" value="1"
                                                        {{ !empty($item['active']) ? 'checked' : '' }}>

                                                </div>

                                            </div>

                                            <div class="col-md-2 d-flex align-items-end">

                                                <button type="button" class="btn btn-danger remove-menu-item w-100">
                                                    Remove
                                                </button>

                                            </div>

                                        </div>

                                    </div>
                                @endforeach

                            </div>
                        @endif


                        {{-- DISPLAY ORDER --}}
                        @if ($is_card)
                            <div class="col-md-3 my-3">

                                <label>
                                    Display Order
                                </label>

                                <input type="number" class="form-control" name="display_order"
                                    value="{{ old('display_order', $termsPage->display_order ?? 0) }}">

                            </div>
                        @endif


                        {{-- PUBLISHED --}}
                        <div class="col-md-3 my-3 d-flex align-items-end">

                            <div>

                                <input type="checkbox" class="form-check-input" id="published" name="published"
                                    value="1"
                                    {{ old('published', $termsPage->published ?? false) ? 'checked' : '' }}>

                                <label class="form-check-label" for="published">
                                    Published
                                </label>

                            </div>

                        </div>

                    </div>


                    <div class="row">

                        <div class="col-md-6 my-3">

                            <button type="submit" class="btn btn-primary">
                                {{ $termsPage->id ? 'Update' : 'Save' }}
                            </button>

                            @if ($is_card)
                                <a class="btn btn-secondary"
                                    href="{{ route('admin.terms-page.index', [
                                        'section' => $section,
                                        'is_card' => $is_card,
                                    ]) }}">
                                    Cancel
                                </a>
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
        document.addEventListener('DOMContentLoaded', function() {




            /*
            |--------------------------------------------------------------------------
            | Menu Items
            |--------------------------------------------------------------------------
            */

            const menuWrapper =
                document.getElementById('menu-items-wrapper');

            const addMenuButton =
                document.getElementById('add-menu-item');

            if (menuWrapper && addMenuButton) {

                let menuIndex =
                    menuWrapper.querySelectorAll('.menu-item-row').length;

                addMenuButton.addEventListener('click', function() {

                    const html = `
                <div class="menu-item-row border rounded p-3 mb-3">

                    <div class="row">

                        <div class="col-md-4">

                            <label>
                                Menu Label
                            </label>

                            <input
                                type="text"
                                class="form-control"
                                name="menu_items[${menuIndex}][label]"
                                placeholder="Example: Our Services"
                            >

                        </div>

                        <div class="col-md-4">

                            <label>
                                Menu URL
                            </label>

                            <input
                                type="text"
                                class="form-control"
                                name="menu_items[${menuIndex}][url]"
                                placeholder="Example: /services"
                            >

                        </div>

                        <div class="col-md-2">

                            <label>
                                Active
                            </label>

                            <div class="form-check mt-2">

                                <input
                                    type="hidden"
                                    name="menu_items[${menuIndex}][active]"
                                    value="0"
                                >

                                <input
                                    type="checkbox"
                                    class="form-check-input"
                                    name="menu_items[${menuIndex}][active]"
                                    value="1"
                                >

                            </div>

                        </div>

                        <div class="col-md-2 d-flex align-items-end">

                            <button
                                type="button"
                                class="btn btn-danger remove-menu-item w-100">
                                Remove
                            </button>

                        </div>

                    </div>

                </div>
            `;

                    menuWrapper.insertAdjacentHTML(
                        'beforeend',
                        html
                    );

                    menuIndex++;
                });

                menuWrapper.addEventListener('click', function(event) {

                    if (
                        event.target.classList.contains(
                            'remove-menu-item'
                        )
                    ) {

                        const rows =
                            menuWrapper.querySelectorAll(
                                '.menu-item-row'
                            );

                        if (rows.length > 1) {

                            event.target
                                .closest('.menu-item-row')
                                .remove();

                        }

                    }

                });

            }

        });
    </script>
@endpush
