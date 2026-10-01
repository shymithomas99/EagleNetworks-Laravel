@extends('layouts.admin')

@section('content')

    @php
        $section = (string) $section;
        $is_card = (int) $is_card;

        $formTitle = preg_replace('/^(Add|Edit)\s+/i', '', trim($title));

        $contentBlocks = old('content_blocks', $privacyPolicy->content_blocks ?? []);

        if (empty($contentBlocks)) {
            $contentBlocks = [
                [
                    'title' => '',
                    'description' => '',
                ],
            ];
        }

        $menuItems = old('menu_items', $privacyPolicy->menu_items ?? []);

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

    <div class="container-fluid">

        {{-- Page Heading --}}
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">
                {{ $privacyPolicy->id ? 'Edit' : 'Add' }}
                {{ $formTitle }}
            </h1>
        </div>

        <div class="card shadow mb-4">

            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    {{ $formTitle }}
                </h6>
            </div>

            <div class="card-body">

                <form method="POST"
                    action="{{ $privacyPolicy->id
                        ? route('admin.privacy-policy.update', [
                            'section' => $section,
                            'is_card' => $is_card,
                            'privacyPolicy' => $privacyPolicy,
                        ])
                        : route('admin.privacy-policy.store', [
                            'section' => $section,
                            'is_card' => $is_card,
                        ]) }}">

                    @csrf

                    @if ($privacyPolicy->id)
                        @method('PUT')
                    @endif


                    {{-- =====================================================
                    SECTION 1 - BANNER
                ====================================================== --}}
                    @if ($section == '1' && $is_card == 0)

                        <div class="row">

                            <div class="col-md-12 mb-3">
                                <label for="label">
                                    Label
                                </label>

                                <input type="text" name="label" id="label"
                                    class="form-control @error('label') is-invalid @enderror"
                                    value="{{ old('label', $privacyPolicy->label ?? '') }}"
                                    placeholder="Example: Legal | UK GDPR">

                                @error('label')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>


                            <div class="col-md-12 mb-3">
                                <label for="title">
                                    Title
                                </label>

                                <input type="text" name="title" id="title"
                                    class="form-control @error('title') is-invalid @enderror"
                                    value="{{ old('title', $privacyPolicy->title ?? '') }}">

                                @error('title')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>


                            <div class="col-md-12 mb-3">
                                <label for="description">
                                    Description
                                </label>

                                <textarea name="description" id="description" rows="5"
                                    class="form-control @error('description') is-invalid @enderror">{{ old('description', $privacyPolicy->description ?? '') }}</textarea>

                                @error('description')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>


                            <div class="col-md-12 my-3">
                                <label for="meta_description">
                                    Meta Description
                                </label>

                                <textarea class="form-control @error('meta_description') is-invalid @enderror" name="meta_description"
                                    id="meta_description" rows="4" maxlength="500" placeholder="Enter SEO meta description">{{ old('meta_description', $privacyPolicy->meta_description ?? '') }}</textarea>

                                @error('meta_description')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>


                        {{-- =====================================================
                    SECTION 2 - INTRODUCTION
                ====================================================== --}}
                    @elseif($section == '2' && $is_card == 0)
                        <div class="row">

                            <div class="col-md-12 mb-3">
                                <label for="title">
                                    Title
                                </label>

                                <input type="text" name="title" id="title" class="form-control"
                                    value="{{ old('title', $privacyPolicy->title ?? '') }}">
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="description">
                                    Description
                                </label>

                                <textarea name="description" id="description" rows="7" class="form-control">{{ old('description', $privacyPolicy->description ?? '') }}</textarea>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="additional_description">
                                    Additional Description
                                </label>

                                <textarea name="additional_description" id="additional_description" rows="7" class="form-control">{{ old('additional_description', $privacyPolicy->additional_description ?? '') }}</textarea>
                            </div>

                        </div>


                        {{-- =====================================================
                    SECTIONS 3, 5, 8, 9 NORMAL INTRO
                ====================================================== --}}
                    @elseif(in_array($section, ['3', '5', '8', '9']) && $is_card == 0)
                        <div class="row">

                            <div class="col-md-12 mb-3">
                                <label for="title">
                                    Title
                                </label>

                                <input type="text" name="title" id="title" class="form-control"
                                    value="{{ old('title', $privacyPolicy->title ?? '') }}">
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="description">
                                    Description
                                </label>

                                <textarea name="description" id="description" rows="6" class="form-control">{{ old('description', $privacyPolicy->description ?? '') }}</textarea>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="additional_description">
                                    Additional Description
                                </label>

                                <textarea name="additional_description" id="additional_description" rows="6" class="form-control">{{ old('additional_description', $privacyPolicy->additional_description ?? '') }}</textarea>
                            </div>

                        </div>


                        {{-- =====================================================
                    SECTION 4 - WE USE YOUR DATA
                ====================================================== --}}
                    @elseif($section == '4' && $is_card == 0)
                        <div class="row">

                            <div class="col-md-12 mb-3">
                                <label for="title">
                                    Title
                                </label>

                                <input type="text" name="title" id="title" class="form-control"
                                    value="{{ old('title', $privacyPolicy->title ?? '') }}">
                            </div>

                            <div class="col-md-12 mb-4">
                                <label for="description">
                                    Description
                                </label>

                                <textarea name="description" id="description" rows="5" class="form-control">{{ old('description', $privacyPolicy->description ?? '') }}</textarea>
                            </div>

                        </div>

                        <hr>

                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="font-weight-bold mb-0">
                                Content Blocks
                            </h5>

                            <button type="button" class="btn btn-primary" id="add-content-block">
                                + Add Block
                            </button>
                        </div>

                        <div id="content-blocks-wrapper">

                            @foreach ($contentBlocks as $index => $block)
                                <div class="content-block-row border rounded p-3 mb-3">

                                    <div class="row">

                                        <div class="col-md-4 mb-3">
                                            <label>
                                                Block Title
                                            </label>

                                            <input type="text" class="form-control"
                                                name="content_blocks[{{ $index }}][title]"
                                                value="{{ $block['title'] ?? '' }}" placeholder="Example: Communication">
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label>
                                                Block Description
                                            </label>

                                            <textarea class="form-control" name="content_blocks[{{ $index }}][description]" rows="4">{{ $block['description'] ?? '' }}</textarea>
                                        </div>

                                        <div class="col-md-2 d-flex align-items-end mb-3">

                                            <button type="button" class="btn btn-danger remove-content-block w-100">
                                                Remove
                                            </button>

                                        </div>

                                    </div>

                                </div>
                            @endforeach

                        </div>


                        {{-- =====================================================
                    SECTION 6 - DATA SHARING
                ====================================================== --}}
                    @elseif($section == '6' && $is_card == 0)
                        <div class="row">

                            <div class="col-md-12 mb-3">
                                <label for="title">
                                    Title
                                </label>

                                <input type="text" name="title" id="title" class="form-control"
                                    value="{{ old('title', $privacyPolicy->title ?? '') }}">
                            </div>

                            <div class="col-md-12 mb-4">
                                <label for="description">
                                    Description
                                </label>

                                <textarea name="description" id="description" rows="6" class="form-control">{{ old('description', $privacyPolicy->description ?? '') }}</textarea>
                            </div>

                        </div>

                        <hr>

                        <div class="d-flex justify-content-between align-items-center mb-3">

                            <h5 class="font-weight-bold mb-0">
                                Data Sharing Blocks
                            </h5>

                            <button type="button" class="btn btn-primary" id="add-content-block">
                                + Add Block
                            </button>

                        </div>

                        <div id="content-blocks-wrapper">

                            @foreach ($contentBlocks as $index => $block)
                                <div class="content-block-row border rounded p-3 mb-3">

                                    <div class="row">

                                        <div class="col-md-4 mb-3">

                                            <label>
                                                Block Title
                                            </label>

                                            <input type="text" class="form-control"
                                                name="content_blocks[{{ $index }}][title]"
                                                value="{{ $block['title'] ?? '' }}"
                                                placeholder="Example: Hosting providers.">

                                        </div>

                                        <div class="col-md-6 mb-3">

                                            <label>
                                                Block Description
                                            </label>

                                            <textarea class="form-control" name="content_blocks[{{ $index }}][description]" rows="4">{{ $block['description'] ?? '' }}</textarea>

                                        </div>

                                        <div class="col-md-2 d-flex align-items-end mb-3">

                                            <button type="button" class="btn btn-danger remove-content-block w-100">
                                                Remove
                                            </button>

                                        </div>

                                    </div>

                                </div>
                            @endforeach

                        </div>


                        {{-- =====================================================
                    SECTION 7 - DATA RETENTION
                ====================================================== --}}
                    @elseif($section == '7' && $is_card == 0)
                        <div class="row">

                            <div class="col-md-12 mb-3">

                                <label for="title">
                                    Title
                                </label>

                                <input type="text" name="title" id="title" class="form-control"
                                    value="{{ old('title', $privacyPolicy->title ?? '') }}">

                            </div>

                            <div class="col-md-12 mb-3">

                                <label for="description">
                                    Description
                                </label>

                                <textarea name="description" id="description" rows="7" class="form-control">{{ old('description', $privacyPolicy->description ?? '') }}</textarea>

                            </div>

                            <div class="col-md-12 mb-3">

                                <label for="additional_description">
                                    Additional Description
                                </label>

                                <textarea name="additional_description" id="additional_description" rows="6" class="form-control">{{ old('additional_description', $privacyPolicy->additional_description ?? '') }}</textarea>

                            </div>

                        </div>


                        {{-- =====================================================
                    SECTION 10 - CONTACT DETAILS
                ====================================================== --}}
                    @elseif($section == '10' && $is_card == 0)
                        <div class="row">

                            <div class="col-md-12 mb-3">

                                <label for="title">
                                    Title
                                </label>

                                <input type="text" name="title" id="title" class="form-control"
                                    value="{{ old('title', $privacyPolicy->title ?? '') }}">

                            </div>

                            <div class="col-md-12 mb-3">

                                <label for="description">
                                    Description
                                </label>

                                <textarea name="description" id="description" rows="5" class="form-control">{{ old('description', $privacyPolicy->description ?? '') }}</textarea>

                            </div>

                            <div class="col-md-12 mb-3">

                                <label for="label">
                                    Organisation / Company
                                </label>

                                <input type="text" name="label" id="label" class="form-control"
                                    value="{{ old('label', $privacyPolicy->label ?? '') }}">

                            </div>

                            <div class="col-md-12 mb-3">

                                <label for="serving">
                                    Address
                                </label>

                                <input type="text" name="serving" id="serving" class="form-control"
                                    value="{{ old('serving', $privacyPolicy->serving ?? '') }}">

                            </div>

                            <div class="col-md-6 mb-3">

                                <label for="location">
                                    Email
                                </label>

                                <input type="text" name="location" id="location" class="form-control"
                                    value="{{ old('location', $privacyPolicy->location ?? '') }}">

                            </div>

                            <div class="col-md-6 mb-3">

                                <label for="primary_focus">
                                    Telephone
                                </label>

                                <input type="text" name="primary_focus" id="primary_focus" class="form-control"
                                    value="{{ old('primary_focus', $privacyPolicy->primary_focus ?? '') }}">

                            </div>

                            <div class="col-md-12 mb-3">

                                <label for="additional_description">
                                    Response Time
                                </label>

                                <textarea name="additional_description" id="additional_description" rows="4" class="form-control">{{ old('additional_description', $privacyPolicy->additional_description ?? '') }}</textarea>

                            </div>

                        </div>

                        <hr>

                        <h5 class="font-weight-bold mb-4">
                            Post Details
                        </h5>

                        <div class="row">

                            <div class="col-md-4 mb-3">

                                <label for="effective_date">
                                    Effective Date
                                </label>

                                <input type="text" name="effective_date" id="effective_date" class="form-control"
                                    value="{{ old('effective_date', $privacyPolicy->effective_date ?? '') }}"
                                    placeholder="Example: April 2026">

                            </div>

                            <div class="col-md-4 mb-3">

                                <label for="data_controller">
                                    Data Controller
                                </label>

                                <input type="text" name="data_controller" id="data_controller" class="form-control"
                                    value="{{ old('data_controller', $privacyPolicy->data_controller ?? '') }}"
                                    placeholder="Example: EMH Global Ltd">

                            </div>

                            <div class="col-md-4 mb-3">

                                <label for="regulatory_framework">
                                    Regulatory Framework
                                </label>

                                <input type="text" name="regulatory_framework" id="regulatory_framework"
                                    class="form-control"
                                    value="{{ old('regulatory_framework', $privacyPolicy->regulatory_framework ?? '') }}"
                                    placeholder="Example: UK GDPR · Data Protection Act 2018">

                            </div>

                        </div>


                        {{-- =====================================================
                    SECTION 11 - CTA
                ====================================================== --}}
                    @elseif($section == '11' && $is_card == 0)
                        <div class="row">

                            <div class="col-md-12 mb-3">

                                <label for="title">
                                    CTA Title
                                </label>

                                <input type="text" name="title" id="title" class="form-control"
                                    value="{{ old('title', $privacyPolicy->title ?? '') }}">

                            </div>

                            <div class="col-md-12 mb-4">

                                <label for="description">
                                    CTA Description
                                </label>

                                <textarea name="description" id="description" rows="5" class="form-control">{{ old('description', $privacyPolicy->description ?? '') }}</textarea>

                            </div>

                        </div>

                        <hr>

                        <h5 class="font-weight-bold mb-3">
                            CTA Button 1
                        </h5>

                        <div class="row">

                            <div class="col-md-6 mb-3">

                                <label for="button_text">
                                    Button Text
                                </label>

                                <input type="text" name="button_text" id="button_text" class="form-control"
                                    value="{{ old('button_text', $privacyPolicy->button_text ?? '') }}"
                                    placeholder="Example: Start a Conversation">

                            </div>

                            <div class="col-md-6 mb-3">

                                <label for="button_url">
                                    Button URL
                                </label>

                                <input type="text" name="button_url" id="button_url" class="form-control"
                                    value="{{ old('button_url', $privacyPolicy->button_url ?? '') }}"
                                    placeholder="Example: /contact">

                            </div>

                        </div>

                        <hr>

                        <h5 class="font-weight-bold mb-3">
                            CTA Button 2
                        </h5>

                        <div class="row">

                            <div class="col-md-6 mb-3">

                                <label for="button_text_2">
                                    Button Text
                                </label>

                                <input type="text" name="button_text_2" id="button_text_2" class="form-control"
                                    value="{{ old('button_text_2', $privacyPolicy->button_text_2 ?? '') }}"
                                    placeholder="Example: Explore Our Services">

                            </div>

                            <div class="col-md-6 mb-3">

                                <label for="button_url_2">
                                    Button URL
                                </label>

                                <input type="text" name="button_url_2" id="button_url_2" class="form-control"
                                    value="{{ old('button_url_2', $privacyPolicy->button_url_2 ?? '') }}"
                                    placeholder="Example: /services">

                            </div>

                        </div>

                        <hr>

                        <h5 class="font-weight-bold mb-3">
                            CTA Button 3
                        </h5>

                        <div class="row">

                            <div class="col-md-6 mb-3">

                                <label for="button_text_3">
                                    Button Text
                                </label>

                                <input type="text" name="button_text_3" id="button_text_3" class="form-control"
                                    value="{{ old('button_text_3', $privacyPolicy->button_text_3 ?? '') }}"
                                    placeholder="Example: About Eagle Networks">

                            </div>

                            <div class="col-md-6 mb-3">

                                <label for="button_url_3">
                                    Button URL
                                </label>

                                <input type="text" name="button_url_3" id="button_url_3" class="form-control"
                                    value="{{ old('button_url_3', $privacyPolicy->button_url_3 ?? '') }}"
                                    placeholder="Example: /about">

                            </div>

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

                                <textarea name="footer_text" id="footer_text" rows="3" class="form-control">{{ old('footer_text', $privacyPolicy->footer_text ?? '') }}</textarea>

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
                                                value="{{ $item['label'] ?? '' }}" placeholder="Example: Our Services">

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
                    @else
                        {{-- =================================================
                        CARD SECTIONS
                    ================================================== --}}

                        @if ($is_card == 1)
                            <div class="row">

                                @if ($section == '5')
                                    <div class="col-md-12 mb-3">

                                        <label for="label">
                                            Label
                                        </label>

                                        <input type="text" name="label" id="label" class="form-control"
                                            value="{{ old('label', $privacyPolicy->label ?? '') }}"
                                            placeholder="Example: ARTICLE 6(1)(A)">

                                    </div>
                                @endif


                                <div class="col-md-12 mb-3">

                                    <label for="title">
                                        Title
                                    </label>

                                    <input type="text" name="title" id="title" class="form-control"
                                        value="{{ old('title', $privacyPolicy->title ?? '') }}">

                                </div>


                                <div class="col-md-12 mb-3">

                                    <label for="description">
                                        Description
                                    </label>

                                    <textarea name="description" id="description" rows="6" class="form-control">{{ old('description', $privacyPolicy->description ?? '') }}</textarea>

                                </div>


                                <div class="col-md-4 mb-3">

                                    <label for="display_order">
                                        Display Order
                                    </label>

                                    <input type="number" name="display_order" id="display_order" class="form-control"
                                        value="{{ old('display_order', $privacyPolicy->display_order ?? 0) }}"
                                        min="0">

                                </div>

                            </div>
                        @endif

                    @endif


                    {{-- =====================================================
                    PUBLISHED
                ====================================================== --}}
                    <hr>

                    <div class="form-group">

                        <div class="form-check">

                            <input type="hidden" name="published" value="0">

                            <input type="checkbox" class="form-check-input" id="published" name="published"
                                value="1" {{ old('published', $privacyPolicy->published ?? true) ? 'checked' : '' }}>

                            <label class="form-check-label" for="published">
                                Published
                            </label>

                        </div>

                    </div>


                    {{-- =====================================================
                    BUTTONS
                ====================================================== --}}
                    <div class="mt-4">

                        <button type="submit" class="btn btn-primary">
                            {{ $privacyPolicy->id ? 'Update' : 'Save' }}
                        </button>

                        @if ($is_card == 1)
                            <a href="{{ route('admin.privacy-policy.index', [
                                'section' => $section,
                                'is_card' => 1,
                            ]) }}"
                                class="btn btn-secondary">
                                Cancel
                            </a>
                        @else
                            <a href="{{ url()->previous() }}" class="btn btn-secondary">
                                Cancel
                            </a>
                        @endif

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
            | Content Blocks
            |--------------------------------------------------------------------------
            */

            const contentWrapper =
                document.getElementById('content-blocks-wrapper');

            const addContentButton =
                document.getElementById('add-content-block');

            if (contentWrapper && addContentButton) {

                let contentIndex =
                    contentWrapper.querySelectorAll('.content-block-row').length;

                addContentButton.addEventListener('click', function() {

                    const html = `
                <div class="content-block-row border rounded p-3 mb-3">

                    <div class="row">

                        <div class="col-md-4 mb-3">

                            <label>
                                Block Title
                            </label>

                            <input
                                type="text"
                                class="form-control"
                                name="content_blocks[${contentIndex}][title]"
                                placeholder="Block title"
                            >

                        </div>

                        <div class="col-md-6 mb-3">

                            <label>
                                Block Description
                            </label>

                            <textarea
                                class="form-control"
                                name="content_blocks[${contentIndex}][description]"
                                rows="4"
                            ></textarea>

                        </div>

                        <div class="col-md-2 d-flex align-items-end mb-3">

                            <button
                                type="button"
                                class="btn btn-danger remove-content-block w-100">
                                Remove
                            </button>

                        </div>

                    </div>

                </div>
            `;

                    contentWrapper.insertAdjacentHTML(
                        'beforeend',
                        html
                    );

                    contentIndex++;
                });

                contentWrapper.addEventListener('click', function(event) {

                    if (
                        event.target.classList.contains(
                            'remove-content-block'
                        )
                    ) {

                        const rows =
                            contentWrapper.querySelectorAll(
                                '.content-block-row'
                            );

                        if (rows.length > 1) {

                            event.target
                                .closest('.content-block-row')
                                .remove();

                        }

                    }

                });

            }


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
