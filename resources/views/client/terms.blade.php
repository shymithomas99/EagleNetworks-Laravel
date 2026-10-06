@extends('layouts.appweb')

@section('title', ($sections->get(1)?->title ?? 'Terms of Use') . ' | ')

@push('meta')
    <meta name="description"
        content="{{ Str::limit(strip_tags($sections->get(1)?->description ?? 'Terms of Use for Eagle Networks.'), 160) }}">
@endpush

@section('content')

    {{-- =========================================================
        SECTION 1 - BANNER / INTRO
    ========================================================= --}}
    @php
        $banner = $sections->get(1);
        $acceptance = $sections->get(2);
        $useOfWebsite = $sections->get(3);
        $intellectualProperty = $sections->get(4);
        $disclaimer = $sections->get(5);
        $liability = $sections->get(6);
        $externalLinks = $sections->get(7);
        $changes = $sections->get(8);
        $governingLaw = $sections->get(9);
        $cta = $sections->get(10);
    @endphp


    {{-- =========================================================
        BANNER
    ========================================================= --}}
    <section class="section-hero prvcy-policy-bnr">

        <div class="container-custom">

            <div class="section-hero-sub">

                <div>

                    <div>

                        <nav aria-label="breadcrumb" class="custom-breadcrumb-wrapper mb-4">

                            <ol class="breadcrumb mb-0">

                                <li class="breadcrumb-item">
                                    <a href="{{ url('/') }}" class="breadcrumb-link">
                                        Home
                                    </a>
                                </li>

                                <li class="breadcrumb-item active" aria-current="page">
                                    {{ $banner?->title ?? 'Terms of Use' }}
                                </li>

                            </ol>

                        </nav>


                        <div class="pill-group mb-4">

                            @php
                                $labels = collect(explode('|', $banner->label ?? ''))
                                    ->map(function ($label) {
                                        return trim($label);
                                    })
                                    ->filter();
                            @endphp

                            @foreach ($labels as $label)
                                <span class="badge-custom badge-transperant-white">
                                    {{ $label }}
                                </span>
                            @endforeach

                        </div>


                        <h1>
                            {{ $banner?->title ?? 'Terms of Use' }}
                        </h1>


                        @if ($banner?->description)
                            <div class="subhead">
                                {!! nl2br(e($banner->description)) !!}
                            </div>
                        @endif

                    </div>

                </div>

            </div>

        </div>

    </section>


    {{-- =========================================================
        SECTION 2 - ACCEPTANCE OF TERMS
    ========================================================= --}}
    @if ($acceptance)
        <section class="policy-intro section-md">

            <div class="container-custom">

                <div class="row justify-content-center">

                    <div>

                        <h2 class="mb-3 element-2">
                            {{ $acceptance->title }}
                        </h2>

                        @if ($acceptance->description)
                            <div class="subhead">
                                {!! nl2br(e($acceptance->description)) !!}
                            </div>
                        @endif

                        @if ($acceptance->additional_description)
                            <div class="subhead mt-3">
                                {!! nl2br(e($acceptance->additional_description)) !!}
                            </div>
                        @endif

                    </div>

                </div>

            </div>

        </section>
    @endif


    {{-- =========================================================
        SECTION 3 - USE OF THE WEBSITE
    ========================================================= --}}
    @if ($useOfWebsite)
        <section class="section-md lite-blue-bg">

            <div class="container-custom">

                <div class="title-line"></div>

                <h2 class="element-2">
                    {{ $useOfWebsite->title }}
                </h2>

                @if ($useOfWebsite->description)
                    <div class="subhead">
                        {!! nl2br(e($useOfWebsite->description)) !!}
                    </div>
                @endif


                {{-- CARDS --}}
                @foreach ($useOfWebsiteCards as $card)
                    <div class="rights-card bg-white card-white">

                        <div class="rights-header">

                            <span class="rights-dot"></span>

                            <p>
                                {!! nl2br(e($card->description)) !!}
                            </p>

                        </div>

                    </div>
                @endforeach

            </div>

        </section>
    @endif


    {{-- =========================================================
        SECTION 4 - INTELLECTUAL PROPERTY
    ========================================================= --}}
    @if ($intellectualProperty)
        <section class="section-md">

            <div class="container-custom">

                <h2 class="element-2">
                    {{ $intellectualProperty->title }}
                </h2>

                @if ($intellectualProperty->description)
                    <div class="subhead">
                        {!! nl2br(e($intellectualProperty->description)) !!}
                    </div>
                @endif

                @if ($intellectualProperty->additional_description)
                    <div class="subhead mt-3">
                        {!! nl2br(e($intellectualProperty->additional_description)) !!}
                    </div>
                @endif

            </div>

        </section>
    @endif


    {{-- =========================================================
        SECTION 5 - DISCLAIMER
    ========================================================= --}}
    @if ($disclaimer)
        <section class="section-md lite-blue-bg">

            <div class="container-custom">

                <div class="row justify-content-center">

                    <div>

                        <h2 class="mb-3 element-2">
                            {{ $disclaimer->title }}
                        </h2>

                        @if ($disclaimer->description)
                            <div class="subhead">
                                {!! nl2br(e($disclaimer->description)) !!}
                            </div>
                        @endif

                        @if ($disclaimer->additional_description)
                            <div class="subhead mt-3">
                                {!! nl2br(e($disclaimer->additional_description)) !!}
                            </div>
                        @endif

                    </div>

                </div>

            </div>

        </section>
    @endif


    {{-- =========================================================
        SECTION 6 - LIMITATION OF LIABILITY
    ========================================================= --}}
    @if ($liability)
        <section class="section-md">

            <div class="container-custom">

                <div class="row justify-content-center">

                    <div>

                        <h2 class="mb-3 element-2">
                            {{ $liability->title }}
                        </h2>

                        @if ($liability->description)
                            <div class="subhead">
                                {!! nl2br(e($liability->description)) !!}
                            </div>
                        @endif

                    </div>

                </div>


                {{-- IMPORTANT NOTICE --}}
                @if ($liability->additional_description)

                    <div class="complaint-box">

                        <p>

                            @if ($liability->label)
                                <strong>
                                    {{ $liability->label }}
                                </strong>
                            @endif

                            {!! nl2br(e($liability->additional_description)) !!}

                        </p>

                    </div>

                @endif

            </div>

        </section>
    @endif


    {{-- =========================================================
        SECTION 7 - EXTERNAL LINKS
    ========================================================= --}}
    @if ($externalLinks)
        <section class="section-md lite-blue-bg">

            <div class="container-custom">

                <div class="row justify-content-center">

                    <div>

                        <h2 class="mb-3 element-2">
                            {{ $externalLinks->title }}
                        </h2>

                        @if ($externalLinks->description)
                            <div class="subhead">
                                {!! nl2br(e($externalLinks->description)) !!}
                            </div>
                        @endif

                        @if ($externalLinks->additional_description)
                            <div class="subhead mt-3">
                                {!! nl2br(e($externalLinks->additional_description)) !!}
                            </div>
                        @endif

                    </div>

                </div>

            </div>

        </section>
    @endif


    {{-- =========================================================
        SECTION 8 - CHANGES TO THESE TERMS
    ========================================================= --}}
    @if ($changes)
        <section class="section-md">

            <div class="container-custom">

                <div class="row justify-content-center">

                    <div>

                        <h2 class="mb-3 element-2">
                            {{ $changes->title }}
                        </h2>

                        @if ($changes->description)
                            <div class="subhead">
                                {!! nl2br(e($changes->description)) !!}
                            </div>
                        @endif

                        @if ($changes->additional_description)
                            <div class="subhead mt-3">
                                {!! nl2br(e($changes->additional_description)) !!}
                            </div>
                        @endif

                    </div>

                </div>

            </div>

        </section>
    @endif


    {{-- =========================================================
        SECTION 9 - GOVERNING LAW
    ========================================================= --}}
    @if ($governingLaw)
        <section class="section-md lite-blue-bg">

            <div class="container-custom">

                <div class="row justify-content-center">

                    <div>

                        <h2 class="mb-3 element-2">
                            {{ $governingLaw->title }}
                        </h2>

                        @if ($governingLaw->description)
                            <div class="subhead">
                                {!! nl2br(e($governingLaw->description)) !!}
                            </div>
                        @endif

                        @if ($governingLaw->additional_description)
                            <div class="subhead mt-3">
                                {!! nl2br(e($governingLaw->additional_description)) !!}
                            </div>
                        @endif

                    </div>

                </div>


                {{-- CONTACT INFORMATION --}}
                <div class="contact-info-card">

                    @if ($governingLaw->contact_question)
                        <h6>
                            {{ $governingLaw->contact_question }}
                        </h6>
                    @endif


                    @if ($governingLaw->contact_email)
                        <p>

                            Contact us at

                            <a href="mailto:{{ $governingLaw->contact_email }}" class="contact-link text-orange">
                                {{ $governingLaw->contact_email }}
                            </a>

                        </p>
                    @endif


                    @if ($governingLaw->contact_address)
                        <p>
                            {{ $governingLaw->contact_address }}
                        </p>
                    @endif

                </div>

            </div>

        </section>
    @endif


    {{-- =========================================================
        EFFECTIVE DATE / OPERATOR / GOVERNING LAW
    ========================================================= --}}
    <section class="post-details">

        <div class="container-custom">

            <div class="row">

                <div class="col-md-4">

                    <div class="x-small-text mb-2 text-uppercase">
                        Effective Date
                    </div>

                    <p class="mb-0">
                        {{ $governingLaw?->effective_date }}
                    </p>

                </div>


                <div class="col-md-4">

                    <div class="x-small-text mb-2 text-uppercase">
                        Operator
                    </div>

                    <p class="mb-0">
                        {{ $governingLaw?->operator }}
                    </p>

                </div>


                <div class="col-md-4">

                    <div class="x-small-text mb-2 text-uppercase">
                        Governing Law
                    </div>

                    <p class="mb-0">
                        {{ $governingLaw?->governing_law }}
                    </p>

                </div>

            </div>

        </div>

    </section>


    {{-- =========================================================
        INNER BOTTOM MENU
    ========================================================= --}}
    <section class="inner-bottom-menu">

        <div class="container-custom d-flex justify-content-between align-items-center">

            <div class="small-text text-muted mb-0">

                {{ $cta->footer_text ?? '' }}


            </div>


            <ul class="inner-menu list-unstyled d-flex flex-wrap gap-3 mb-0">

                @foreach ($cta->menu_items ?? [] as $item)
                    @if (!empty($item['label']) && !empty($item['url']))
                        <li>
                            <a href="{{ $item['url'] }}"
                                class="small-text fw-semibold {{ !empty($item['active']) ? 'active' : '' }}">

                                {{ $item['label'] }}

                            </a>
                        </li>
                    @endif
                @endforeach

            </ul>

        </div>

    </section>


    {{-- =========================================================
        SECTION 10 - CTA
    ========================================================= --}}
    @if ($cta)

        <section class="ready-to ready-to-v2 section-md">

            <div class="container-custom d-flex flex-column align-items-center text-center position-relative z-3">

                <h2 class="mb-3 text-white">
                    {{ $cta->title }}
                </h2>


                @if ($cta->description)
                    <p class="subhead mb-4 text-white">

                        {!! nl2br(e($cta->description)) !!}

                    </p>
                @endif


                <div class="d-flex flex-column flex-sm-row mb-3">

                    @if ($cta->button_text && $cta->button_url)
                        <a href="{{ $cta->button_url }}" class="commn-btn btn-primary-custom me-0 me-sm-3 mb-3 mb-sm-0">
                            {{ $cta->button_text }}

                            <i class="bi bi-arrow-right ms-2"></i>

                        </a>
                    @endif


                    <a href="{{ $cta->button_url_2 }}" class="commn-btn btn-primary-custom">
                        {{ $cta->button_text_2 }}
                    </a>

                </div>


                <a href="{{ $cta->button_url_2 }}" class="commn-btn btn-primary-custom">
                    {{ $cta->button_text_3 }}
                </a>

            </div>

        </section>

    @endif

@endsection
