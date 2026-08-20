@extends('layouts.appweb')
@section('title', $work->seoTitle ? $work->seoTitle . ' | ' : $work->title . ' | ')
@push('meta')
    <meta
        name="description"
        content="{{ $work->seoDescription ?: $work->excerpt }}"
    >
@endpush
@section('content')
    <section class="section-hero details-page-banner">
        <div class="details-page-overlay">
            <div class="container-custom">
                <div class="section-hero-sub">
                    {{-- Breadcrumb --}}
                    <nav aria-label="breadcrumb" class="custom-breadcrumb-wrapper mb-4">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="{{ url('/') }}" class="breadcrumb-link">
                                    Home
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('work') }}" class="breadcrumb-link">
                                    Work
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                {{ $work->cover_title ?? $work->title }}
                            </li>
                        </ol>
                    </nav>

                    {{-- Categories / Services --}}
                    <div class="pill-group mb-4">
                        @if ($work->core_service_1)
                            <span class="badge-custom badge-transperant-white">
                                {{ $work->core_service_1 }}
                            </span>
                        @endif

                        @if ($work->core_service_2)
                            <span class="badge-custom badge-transperant-white">
                                {{ $work->core_service_2 }}
                            </span>
                        @endif
                    </div>
                    {{-- Title --}}
                    <h2>
                        {{ $work->title }}
                    </h2>
                </div>
            </div>
        </div>
    </section>

    <section class="post-details">
        <div class="container-custom">
            <div class="row">
                {{-- Client --}}
                <div class="col-md-3">
                    <div class="x-small-text mb-2">
                        CLIENT
                    </div>
                    <p class="mb-0">
                        {{ $work->clientName ?? 'N/A' }}
                    </p>
                </div>
                {{-- Service --}}
                <div class="col-md-3">
                    <div class="x-small-text mb-2">
                        SERVICE
                    </div>
                    <p class="mb-0">
                        {{ $work->industry ?? 'N/A' }}
                    </p>
                </div>
                {{-- Year --}}
                <div class="col-md-3">
                    <div class="x-small-text mb-2">
                        YEAR
                    </div>
                    <p class="mb-0">
                        {{ $work->projectYear ?? 'N/A' }}
                    </p>
                </div>
                {{-- Services --}}
                <div class="col-md-3">
                    <div class="x-small-text mb-2">
                        SERVICES
                    </div>
                    <p class="mb-0">
                        {{ $work->servicesDelivered ?? 'N/A' }}
                    </p>
                </div>
            </div>
        </div>
    </section>



    @if ($work->brief)
        <section class="post-main section">
            <div class="container-custom">
                <div class="row">
                    <div class="col-lg-7">
                        {!! $work->brief !!}
                    </div>

                    {{-- Featured Image --}}
                    <div class="col-lg-5">

                        @if($work->briefMediaType == 1 && $work->briefImage)
                            <div class="post-video-container ratio ratio-16x9">
                                <img
                                    src="{{ asset('backend_assets/work/brief-images/' . $work->briefImage) }}"
                                    alt="{{ $work->title }}"
                                    class="object-fit-cover" style="border-radius: 15px;"
                                >
                            </div>

                        @elseif($work->briefMediaType == 2 && $work->briefVideoUrl)
                            <div class="post-video-container ratio ratio-16x9">
                                <iframe
                                    title="{{ $work->title }}"
                                    src="{{ $work->briefVideoUrl }}"
                                    referrerpolicy="strict-origin-when-cross-origin"
                                    allow="autoplay; fullscreen; picture-in-picture; clipboard-write; encrypted-media; web-share"
                                    allowfullscreen>
                                </iframe>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    @endif


    <section class="post-contents section lite-blue-bg">
        <div class="container-custom">
            {!! $work->keyMetrics !!}
        </div>
    </section>

    @php
        $featuredImage = $work->featuredImage;
    @endphp

    @if ($featuredImage)
        <section class="post-fixed-bg"
            style="background-image: url('{{ asset('backend_assets/work/featured-images/' . $featuredImage) }}');">
        </section>
    @endif

    <section class="post-contents section">
        <div class="container-custom">
            {!! $work->approach !!}

        </div>
    </section>

    <section class="post-contents section lite-blue-bg">
        <div class="container-custom">
            {!! $work->results !!}
        </div>
    </section>


    {{-- Additional Content --}}
    @if (!empty(strip_tags(trim($work->additionalContent ?? ''))))
        <section class="post-contents section">

            <div class="container-custom">

                {!! $work->additionalContent !!}

            </div>

        </section>
    @endif


    @if ($work->galleries->count())
        <section class="post-contents section">

            <div class="container-custom">

                <div class="custom-gallery">

                    @foreach ($work->galleries as $gallery)
                        <div class="gallery-item">

                            <img src="{{ asset('backend_assets/work/gallery-images/' . $gallery->image) }}"
                                alt="{{ $gallery->alt ?? $work->title }}">

                        </div>
                    @endforeach

                </div>

            </div>

        </section>
    @endif

    {{-- Testimonial --}}

    <section class="post-testimonial section lite-blue-bg">

        <div class="container-custom">

            <h2>
                Client Testimonial
            </h2>

            <div class="post-testimonial-content">

                <p>
                    "{{ $work->testimonial }}"
                </p>

                @if ($work->testimonialAuthor)
                    <span>
                        {{ $work->testimonialAuthor }}
                    </span>
                @endif

            </div>

        </div>

    </section>


    <section class="ready-to ready-to-v2 section-md">
        <div class="container-custom d-flex flex-column align-items-center text-center position-relative z-3">
            <h2 class="mb-3 text-white">Ready to Get Started?</h2>
            <p class="subhead mb-4">Let's discuss how Eagle Networks can help you achieve your growth
                objectives through integrated services and strategic partnership.</p>

            <div class="d-flex flex-column flex-sm-row mb-3">

                <a href="{{ url('/contact') }}" class=" commn-btn btn-primary-custom me-0 me-sm-3 mb-3 mb-sm-0">Start a
                    Conversation<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-arrow-right ms-2" data-loc="client/src/pages/Home.tsx:47">
                        <path d="M5 12h14"></path>
                        <path d="m12 5 7 7-7 7"></path>
                    </svg> </a>

                <a href="{{ url('/services') }}" class="commn-btn btn-primary-custom">Explore Our Services</a>
            </div>
            <a href="{{ url('/about') }}" class="commn-btn btn-primary-custom">About Eagle Networks</a>

        </div>

    </section>
@endsection
