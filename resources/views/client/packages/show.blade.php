@extends('layouts.appweb')
@section('title', 'Ignite | ')
@push('meta')
    <meta
        name="description"
        content="A strategy, creative, and technology agency with offices in London and Accra. We help ambitious businesses grow by combining UK expertise with African market insight."
    >
@endpush
@section('content')

    @if($banner)
        <section class="section-hero package-banner">

            <div class="container-custom">

                <div class="section-hero-sub">
                    <div>
                        <div>
                            @if($banner->label)
                                <div class="header-label">
                                    {{ $banner->label }}
                                </div>
                            @endif

                            <h1>{{ $banner->title }}</h1>

                            @if($banner->description)
                                <div class="subhead">
                                    {!! nl2br(e($banner->description)) !!}
                                </div>
                            @endif


                            @if($banner->button_text && $banner->button_url)
                                <a href="{{ $banner->button_url }}"
                                class="commn-btn btn-primary-custom me-2 mb-3 mb-sm-0">
                                    {{ $banner->button_text }}

                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        width="18"
                                        height="18"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="2"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="lucide lucide-arrow-right ms-2">
                                        <path d="M5 12h14"></path>
                                        <path d="m12 5 7 7-7 7"></path>
                                    </svg>
                                </a>
                            @endif

                            <a href="{{ url('/packages') }}"
                            class="commn-btn btn-transperant">
                                View All Packages
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    @endif

    @if($forIntro || $forCards->isNotEmpty())
        <section class="who-its-for section-md">
            <div class="container-custom">
                <div class="row align-items-center">

                    @if($forIntro)
                        <div class="col-lg-6">
                            <h2>{{ $forIntro->title }}</h2>
                            @if($forIntro->description)
                                @foreach(preg_split('/\r\n|\r|\n/', $forIntro->description) as $paragraph)
                                    @if(trim($paragraph))
                                        <div class="subhead mb-3">
                                            {{ $paragraph }}
                                        </div>
                                    @endif
                                @endforeach
                            @endif
                        </div>
                    @endif

                    @if($forCards->isNotEmpty())
                        <div class="col-lg-6">
                            @foreach($forCards as $card)
                                <div class="package-card">
                                    <h3 class="mb-4">
                                        {{ $card->title }}
                                    </h3>

                                    @if($card->description)
                                        <ul class="list-unstyled mb-0">

                                            @foreach(preg_split('/\r\n|\r|\n/', $card->description) as $item)

                                                @if(trim($item))
                                                    <li class="d-flex align-items-start mb-3">
                                                        <i class="bi bi-check2"></i>
                                                        <span>{{ trim($item) }}</span>
                                                    </li>
                                                @endif

                                            @endforeach

                                        </ul>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </section>
    @endif


    @if($serviceIntro || $serviceCards->isNotEmpty())
        <section class="services-included section-md">
            <div class="container-custom">
                @if($serviceIntro)
                    <h2>{{ $serviceIntro->title }}</h2>

                    @if($serviceIntro->description)
                        <div class="subhead mb-5">
                            {!! nl2br(e($serviceIntro->description)) !!}
                        </div>
                    @endif
                @endif

                @if($serviceCards->isNotEmpty())
                    <div class="row g-4-5">

                        @foreach($serviceCards as $card)
                            <div class="col-md-6">
                                <div class="package-card bg-white">
                                    <h3 class="mb-4">
                                        {{ $card->title }}
                                    </h3>
                                    @if($card->description)
                                        <ul class="list-unstyled mb-0">
                                            @foreach(preg_split('/\r\n|\r|\n/', $card->description) as $item)
                                                @if(trim($item))
                                                    <li class="d-flex align-items-start mb-3">
                                                        <i class="bi bi-check2"></i>
                                                        <span>{{ trim($item) }}</span>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    @endif
                                </div>
                            </div>
                        @endforeach

                    </div>
                @endif
            </div>
        </section>
    @endif

    @if($howWeWorkIntro || $howWeWorkCards->isNotEmpty())
        <section class="how-we-work section-md">
            <div class="container-custom">
                @if($howWeWorkIntro)
                    <h2>{{ $howWeWorkIntro->title }}</h2>

                    @if($howWeWorkIntro->description)
                        <div class="subhead mb-5">
                            {!! nl2br(e($howWeWorkIntro->description)) !!}
                        </div>
                    @endif
                @endif

                @if($howWeWorkCards->isNotEmpty())
                    <div class="row g-4-5">
                        @foreach($howWeWorkCards as $index => $card)
                            <div class="col-md-4">
                                <div class="package-card">
                                    <h3 class="mb-3">
                                        {{ sprintf('%02d', $index + 1) }}
                                    </h3>
                                    <h6 class="mb-3">
                                        {{ $card->title }}
                                    </h6>
                                    @if($card->description)
                                        <p>
                                            {!! nl2br(e($card->description)) !!}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif

            </div>
        </section>
    @endif


    @if($ctaBannerBottom)
        <section class="ready-to section">
            <div class="container-custom">
                <div class="inner-cta-box text-center text-white position-relative z-1">
                    <h2 class="display-5 fw-bold mb-3">{{ $ctaBannerBottom->title }}</h2>
                    @if($ctaBannerBottom->description)
                        <div class="subhead mb-5">
                            {!! nl2br(e($ctaBannerBottom->description)) !!}
                        </div>
                    @endif

                    <div class="row g-4 justify-content-center mb-5">
                        @if($ctaBannerBottom->email)
                            <div class="col-md-4">
                                <a href="mailto:{{ $ctaBannerBottom->email }}"
                                target="_blank">
                                    <div class="icon-circle mx-auto mb-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="lucide lucide-mail text-[#F15A24]"
                                            data-loc="client/src/components/CTASection.tsx:37">
                                            <rect width="20" height="16" x="2" y="4" rx="2"></rect>
                                            <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path>
                                        </svg>
                                    </div>
                                    <span class="cta-link">
                                        {{ $ctaBannerBottom->email }}
                                    </span>
                                </a>
                            </div>
                        @endif
                        @if($ctaBannerBottom->website)
                            <div class="col-md-4">
                                <a href="{{ $ctaBannerBottom->website }}"
                                target="_blank">
                                    <div class="icon-circle mx-auto mb-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="lucide lucide-globe text-[#F15A24]"
                                            data-loc="client/src/components/CTASection.tsx:50">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"></path>
                                            <path d="M2 12h20"></path>
                                        </svg>
                                    </div>
                                    <span class="cta-link">
                                        {{ $ctaBannerBottom->website }}
                                    </span>
                                </a>
                            </div>
                        @endif

                        @if($ctaBannerBottom->linkedin)
                            <div class="col-md-4">
                                <a href="{{ $ctaBannerBottom->linkedin }}"
                                target="_blank">
                                    <div class="icon-circle mx-auto mb-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="lucide lucide-linkedin text-[#F15A24]"
                                            data-loc="client/src/components/CTASection.tsx:63">
                                            <path
                                                d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z">
                                            </path>
                                            <rect width="4" height="12" x="2" y="9"></rect>
                                            <circle cx="4" cy="4" r="2"></circle>
                                        </svg>
                                    </div>
                                    <span class="cta-link">
                                        {{ $ctaBannerBottom->linkedin }}
                                    </span>
                                </a>
                            </div>
                        @endif
                    </div>

                    @if($ctaBannerBottom->button_text)
                        <a href="{{ $ctaBannerBottom->button_url ?? '' }}"
                        class="commn-btn btn-primary-custom py-3">
                            {{ $ctaBannerBottom->button_text }}
                            <svg xmlns="http://www.w3.org/2000/svg"
                                width="18"
                                height="18"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                class="lucide lucide-arrow-right ms-2">
                                <path d="M5 12h14"></path>
                                <path d="m12 5 7 7-7 7"></path>
                            </svg>
                        </a>
                    @endif

                </div>
            </div>
        </section>
    @endif

@endsection
