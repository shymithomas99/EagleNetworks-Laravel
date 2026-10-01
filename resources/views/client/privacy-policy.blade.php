@extends('layouts.appweb')

@section('title', ($banner->title ?? 'Privacy Policy') . ' | ')

@push('meta')
    <meta name="description" content="{{ $banner->meta_description ?? '' }}">
@endpush

@section('content')

    <section class="section-hero prvcy-policy-bnr">

        <div class="container-custom">

            <div class="section-hero-sub">
                <div>
                    <div>
                        <nav aria-label="breadcrumb" class="custom-breadcrumb-wrapper mb-4">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="/" class="breadcrumb-link">Home</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    {{ $banner->title ?? 'Privacy Policy' }}
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


                        <h1>{{ $banner->title ?? 'Privacy Policy' }}</h1>

                        <div class="subhead">
                            {{ $banner->description ?? '' }}
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>



    <section class="policy-intro section-md">
        <div class="container-custom">
            <div class="row justify-content-center">
                <div>
                    <h2 class="mb-3 element-2">
                        {{ $introduction->title ?? 'Introduction' }}
                    </h2>

                    <div class="subhead">

                        {!! $introduction->description ?? '' !!}

                        @if (!empty($introduction->additional_description))
                            <br><br>
                            {{ $introduction->additional_description }}
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </section>



    <!-- Data Collection Section -->
    <section class="section-md lite-blue-bg">
        <div class="container-custom">

            <!-- Title -->

            <div class="title-line"></div>

            <h2 class="element-2">
                {{ $dataCollect->title ?? 'Data We Collect' }}
            </h2>


            <!-- Cards -->
            <div class="row g-4">

                @foreach ($dataCollectCards as $card)
                    <div class="col-lg-4 col-md-6">
                        <div class="data-card">
                            <div class="card-line"></div>

                            <h4>{{ $card->title }}</h4>

                            <p>
                                {{ $card->description }}
                            </p>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>



    <section class="section-md we-use-data">
        <div class="container-custom">

            <h2 class="element-2">
                {{ $dataUsage->title ?? 'We Use Your Data' }}
            </h2>

            @foreach ($dataUsage->content_blocks ?? [] as $block)
                <div class="d-flex align-items-center mb-3">
                    <span class="bullets-accent"></span>
                    <div>
                        <h4>{{ $block['title'] ?? '' }}</h4>
                    </div>
                </div>

                <div class="ps-4">
                    <p>
                        {{ $block['description'] ?? '' }}
                    </p>
                </div>
            @endforeach

    </section>



    <section class="section-md lite-blue-bg">
        <div class="container-custom">
            <div class="row justify-content-center">
                <div>

                    <h2 class="mb-3 element-2">
                        {{ $legalBasis->title ?? 'Legal Basis for Processing' }}
                    </h2>

                    <div class="subhead">
                        {{ $legalBasis->description ?? '' }}
                    </div>

                </div>
            </div>

            <div class="row g-4">

                @foreach ($legalBasisCards as $card)
                    <!-- Card -->
                    <div class="col-lg-4 col-md-6">
                        <div class="data-card">

                            @if ($card->label)
                                <div class="x-small-text text-orange text-uppercase mb-3">
                                    {{ $card->label }}
                                </div>
                            @endif

                            <h4>
                                {{ $card->title }}
                            </h4>

                            <p>
                                {{ $card->description }}
                            </p>

                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>



    <section class="section-md">
        <div class="container-custom">
            <div class="row justify-content-center">
                <div>

                    <h2 class="mb-3 element-2">
                        {{ $dataSharing->title ?? 'Data Sharing' }}
                    </h2>

                    <div class="subhead">
                        {{ $dataSharing->description ?? '' }}
                    </div>

                    @foreach ($dataSharing->content_blocks ?? [] as $block)
                        <p>
                            @if (!empty($block['title']))
                                <span class="text-dark-bold">
                                    {{ $block['title'] }}
                                </span>
                            @endif

                            {{ $block['description'] ?? '' }}
                        </p>
                    @endforeach

                </div>
            </div>
        </div>
    </section>



    <section class="section-md lite-blue-bg">
        <div class="container-custom">
            <div class="row justify-content-center">
                <div>

                    <h2 class="mb-3 element-2">
                        {{ $dataRetention->title ?? 'Data Retention' }}
                    </h2>

                    <div class="subhead">
                        {{ $dataRetention->description ?? '' }}

                        @if (!empty($dataRetention->additional_description))
                            <br><br>
                            {{ $dataRetention->additional_description }}
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </section>



    <section class="section-md">
        <div class="container-custom">
            <div class="row justify-content-center">
                <div>

                    <h2 class="mb-3 element-2">
                        {{ $rights->title ?? 'Your Rights' }}
                    </h2>

                    <div class="subhead">
                        {{ $rights->description ?? '' }}
                    </div>

                </div>
            </div>

            <div class="row g-4">

                @foreach ($rightsCards as $card)
                    <!-- Card -->
                    <div class="col-lg-6">
                        <div class="rights-card">

                            <div class="rights-header">

                                <span class="rights-dot"></span>

                                <h6 class="text-dark-bold">
                                    {{ $card->title }}
                                </h6>

                            </div>

                            <p class="rights-text">
                                {{ $card->description }}
                            </p>

                        </div>
                    </div>
                @endforeach

            </div>

            <!-- Complaint Box -->
            <div class="complaint-box">

                <p>
                    <strong>Right to complain.</strong>

                    {{ $rights->additional_description ?? '' }}

                </p>

            </div>

        </div>
    </section>



    <!-- cookies section starts here -->

    <section class="section-md lite-blue-bg">
        <div class="container-custom">

            <!-- Title -->

            <div>
                <h2 class="mb-3 element-2">
                    {{ $cookies->title ?? 'Cookies' }}
                </h2>

                <div class="subhead">
                    {{ $cookies->description ?? '' }}
                </div>

            </div>


            <!-- Cards -->
            <div class="row g-4">

                @foreach ($cookieCards as $card)
                    <!-- Card -->
                    <div class="col-lg-6 col-md-6">
                        <div class="data-card">
                            <div class="card-line"></div>

                            <h4>
                                {{ $card->title }}
                            </h4>

                            <p>
                                {{ $card->description }}
                            </p>

                        </div>
                    </div>
                @endforeach

            </div>

            <p class="pt-4">
                {{ $cookies->additional_description ?? '' }}

                <a href="https://www.aboutcookies.org" target="_blank" class="text-orange">
                    aboutcookies.org.
                </a>
            </p>

        </div>
    </section>



    <section class="section-md">
        <div class="container-custom">
            <div class="row justify-content-center">
                <div>

                    <h2 class="mb-3 element-2">
                        {{ $contact->title ?? 'Contact Details' }}
                    </h2>

                    <div class="subhead">
                        {{ $contact->description ?? '' }}
                    </div>

                </div>
            </div>

            <div class="contact-info-card">

                <h6>
                    {{ $contact->label ?? '' }}
                </h6>

                <p>
                    {{ $contact->serving ?? '' }}
                </p>

                <p>
                    Email:

                    <a href="mailto:{{ $contact->location ?? '' }}" class="contact-link text-orange">

                        {{ $contact->location ?? '' }}

                    </a>
                </p>

                <p>
                    Telephone:

                    <a href="tel:{{ $contact->primary_focus ?? '' }}" class="contact-link text-orange">

                        {{ $contact->primary_focus ?? '' }}

                    </a>
                </p>

                <p>
                    {{ $contact->additional_description ?? '' }}
                </p>

            </div>
        </div>
    </section>



    <section class="post-details">
        <div class="container-custom ">
            <div class="row">

                <div class="col-md-4">
                    <div class="x-small-text mb-2 text-uppercase">
                        Effective Date
                    </div>

                    <p class="mb-0">
                        {{ $contact->effective_date ?? '' }}
                    </p>
                </div>

                <div class="col-md-4">
                    <div class="x-small-text mb-2 text-uppercase">
                        Data Controller
                    </div>

                    <p class="mb-0">
                        {{ $contact->data_controller ?? '' }}
                    </p>
                </div>

                <div class="col-md-4">
                    <div class="x-small-text mb-2 text-uppercase">
                        Regulatory Framework
                    </div>

                    <p class="mb-0">
                        {{ $contact->regulatory_framework ?? '' }}
                    </p>
                </div>

            </div>
        </div>
    </section>



    <section class="inner-bottom-menu">
        <div class="container-custom d-flex justify-content-between align-items-center">

            <div class="small-text text-muted mb-0">
                {{ $cta->footer_text ?? '' }}
            </div>

            <ul class="inner-menu list-unstyled d-flex flex-wrap gap-3 mb-0 ">

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



    <section class="ready-to ready-to-v2 section-md">
        <div class="container-custom d-flex flex-column align-items-center text-center position-relative z-3">

            <h2 class="mb-3 text-white">
                {{ $cta->title ?? 'Ready to Get Started?' }}
            </h2>

            <p class="subhead mb-4 text-white">
                {{ $cta->description ?? '' }}
            </p>


            <div class="d-flex flex-column flex-sm-row mb-3">

                @if ($cta->button_text && $cta->button_url)
                    <a href="{{ $cta->button_url }}" class=" commn-btn btn-third-custom me-0 me-sm-3 mb-3 mb-sm-0">

                        {{ $cta->button_text }}

                        <i class="bi bi-arrow-right ms-2"></i>

                    </a>
                @endif


                @if ($cta->button_text_2 && $cta->button_url_2)
                    <a href="{{ $cta->button_url_2 }}" class="commn-btn btn-white-outline">

                        {{ $cta->button_text_2 }}

                    </a>
                @endif

            </div>


            @if ($cta->button_text_3 && $cta->button_url_3)
                <a href="{{ $cta->button_url_3 }}" class="commn-btn btn-white-outline">

                    {{ $cta->button_text_3 }}

                </a>
            @endif

        </div>

    </section>

@endsection
