@extends('layouts.appweb')
@push('meta')
    <meta
        name="description"
        content="A strategy, creative, and technology agency with offices in London and Accra. We help ambitious businesses grow by combining UK expertise with African market insight."
    >
@endpush
@section('content')
    <!-- ========================= COOKIES BAR ========================= -->

    <div class="cookie-bar" id="cookieBar">
        <div class="container-custom-2">

            <div class="cookie-content">

                <p class="cookie-text">
                    <strong>We use cookies</strong> to understand how visitors use our site and to improve your
                    experience.
                    Essential cookies are always active. Analytics cookies are only loaded with your consent.
                    <a href="/privacy-policy">Privacy Policy</a>
                </p>

                <div class="cookie-actions">

                    <button class="cookie-btn cookie-outline" id="rejectBarBtn">
                        Reject Non-Essential
                    </button>

                    <button class="cookie-btn cookie-outline" id="openCookieModal">
                        Manage Preferences
                    </button>

                    <button class="cookie-btn cookie-fill" id="acceptBarBtn">
                        Accept All
                    </button>

                    <button class="cookie-close" id="closeCookie">
                        <i class="bi bi-x-lg"></i>
                    </button>


                </div>

            </div>

        </div>
    </div>



    <!-- =================homepage content starts here======================== -->
    @if($banner)
        <section class="section-hero home-banner">

            <div class="container-custom-3">

                <div class="section-hero-sub">
                    <div>
                        <div>
                            @if($banner->title)
                                <h1 class="element-2">
                                    {{ $banner->title }}
                                </h1>
                            @endif
                            @if($banner->description)
                                <div class="subhead">
                                    {!! nl2br(e($banner->description)) !!}
                                </div>
                            @endif

                            @if($banner->additional_description)
                                <div class="small-text">
                                    {!! nl2br(e($banner->additional_description)) !!}
                                </div>
                            @endif

                            @if($banner->button1_text)
                                <a href="{{ $banner->button1_url ?? '' }}"
                                class="commn-btn btn-primary-custom me-2 mb-3 mb-sm-0">
                                    {{ $banner->button1_text }}
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

                            @if($banner->button2_text)
                                <a href="{{ $banner->button2_url ?? '' }}"
                                class="commn-btn btn-primary-custom">
                                    {{ $banner->button2_text }}
                                </a>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </section>
    @endif


    @if($serviceIntro || $serviceCards->isNotEmpty())
        <section class="our-services section-lg ">
            @if($serviceIntro)
            <div class="container-custom d-flex flex-column ">
                @if($serviceIntro->title)
                    <h2 class="element-2">
                        {{ $serviceIntro->title }}
                    </h2>
                @endif
                @if($serviceIntro->description)
                    @foreach(preg_split('/\r\n|\r|\n/', $serviceIntro->description) as $paragraph)
                        @if(trim($paragraph))
                            <div class="subhead">
                                {{ trim($paragraph) }}
                            </div>
                        @endif
                    @endforeach
                @endif
            </div>
            @endif

            @if($serviceCards->isNotEmpty())
                <div class="container-custom cmn-sec-padding">

                    <div class="row g-4 g-xl-5 justify-content-center">
                        @foreach($serviceCards as $card)
                            <div class="col-md-6 col-lg-4">
                                <div class="service-card position-relative">
                                    @if($card->image)
                                        <div class="icon-box">
                                            <img src="{{ asset('backend_assets/services-page/' . $card->image) }}"
                                                alt="{{ $card->title }}"
                                                class="img-fluid">
                                        </div>
                                    @endif
                                    @if($card->title)
                                        <h3>{{ $card->title }}</h3>
                                    @endif

                                    @if($card->short_description)
                                        <p>
                                            {{ $card->short_description }}
                                        </p>
                                    @endif

                                </div>
                            </div>
                        @endforeach

                    </div>

                    <div class="mt-5"><a href="{{ url('/services') }}" class="commn-btn btn-primary-custom me-2 mb-3 mb-sm-0">View
                            Services<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-arrow-right ms-2"
                                data-loc="client/src/pages/Home.tsx:47">
                                <path d="M5 12h14"></path>
                                <path d="m12 5 7 7-7 7"></path>
                            </svg> </a></div>

                </div>
            @endif
        </section>
    @endif

    @if($c5Intro || $c5Cards->isNotEmpty())
        <section class="the-5c section-md">
            <div class="container-custom">
                @if($c5Intro)
                    @if($c5Intro->title)
                        <h5>
                            {{ $c5Intro->title }}
                        </h5>
                    @endif

                    @if($c5Intro->description)
                        <div class="subhead">
                            {!! nl2br(e($c5Intro->description)) !!}
                        </div>
                    @endif
                @endif

                
                @if($c5Cards->isNotEmpty())
                    <div class="row row-cols-2 row-cols-sm-3 row-cols-lg-5 g-4 px-lg-5 justify-content-center ">
                        @foreach($c5Cards as $card)
                            <div class="col text-center">
                                <div class="value-item">
                                    @if($card->image)
                                        <div class="the5c-img-container">
                                            <img src="{{ asset('backend_assets/home-page/' . $card->image) }}"
                                                alt="{{ $card->title }}">
                                        </div>
                                    @endif
                                    @if($card->title)
                                        <p class="x-small-text mb-0 mt-4">
                                            {{ $card->title }}
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

    @if($workCards->isNotEmpty())
        <section id="FeaturedWork-Section" class="featured-work section-md">
            <div class="container-custom d-flex flex-column">
                @if($workIntro)
                    <div class="row">
                        <div class="col-md-12">
                            @if($workIntro->title)
                                <h2 class="element-2">
                                    {{ $workIntro->title }}
                                </h2>
                            @endif
                            @if($workIntro->description)
                                <div class="subhead mb-0">
                                    {!! nl2br(e($workIntro->description)) !!}
                                </div>
                            @endif
                        </div>
                    </div>
                @endif

                @if($workCards->isNotEmpty())
                    <div class="row cmn-sec-padding g-5">
                        @foreach($workCards as $card)
                        <div class="col-md-6">
                            <div class="work-card">
                                <div class="work-img-container">
                                    @php
                                        $image = $card->coverImage ?: $card->featuredImage;
                                    @endphp
                                    @if ($image)
                                        <img src="{{ asset('backend_assets/works/cover-images/' . $card->coverImage) }}"
                                            alt="{{ $card->cover_title ?? $card->title }}" class="img-fluid">
                                    @else
                                        <img src="{{ asset('images/default-work.jpg') }}" alt="{{ $card->title }}"
                                            class="img-fluid">
                                    @endif
                                </div>
                                <h3>{{ $card->cover_title ?? $card->title }}</h3>
                                <p>{{ $card->excerpt }}</p>
                                <a href="{{ route('details', $card->slug) }}" class="button-link small-text mb-0">See More <i
                                        class="bi bi-arrow-right-short ms-1"></i></a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </section>
    @endif


    @if($clientIntro || $clientCards->isNotEmpty())
        <section class="client-section section-md">
            <div class="container-custom text-center ">
                @if($clientIntro)
                    <div class="row justify-content-center mb-5">
                        <div class="col-12">
                            @if($clientIntro->title)
                                <h5>
                                    {{ $clientIntro->title }}
                                </h5>
                            @endif
                             @if($clientIntro->description)
                                <div class="subhead">
                                    {!! nl2br(e($clientIntro->description)) !!}
                                </div>
                            @endif
                        </div>
                    </div>
                @endif

                @if($clientCards->isNotEmpty())
                    <div class="row row-cols-2 row-cols-md-4 g-5 align-items-center">
                        @foreach($clientCards as $card)
                            <div class="col">
                                <div class="client-logo-wrapper">
                                    @if($card->image)
                                        <img src="{{ asset('backend_assets/home-page/' . $card->image) }}"
                                            alt="{{ $card->title }}"
                                            class="img-fluid client-logo">
                                    @endif
                                    @if($card->title)
                                        <span class="client-name">
                                            {{ $card->title }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </section>
    @endif

    @if($ctaBannerIntro || $ctaBannerCards->isNotEmpty())
        <section class="two-strategic section-md pb-2">
            <div class=" container-custom d-flex flex-column">

                @if($ctaBannerIntro)
                    <div class="row">
                        <div class="col-md-12">
                            @if($ctaBannerIntro->title)
                                <h2 class="element-2 text-white">
                                    {{ $ctaBannerIntro->title }}
                                </h2>
                            @endif

                            @if($ctaBannerIntro->description)
                                <div class="subhead mb-2 text-white-v2">
                                    {!! nl2br(e($ctaBannerIntro->description)) !!}
                                </div>
                            @endif

                            @if($ctaBannerIntro->additional_description)
                                <p class="subhead text-center sec-padding-2 text-white mb-4">
                                    {{ $ctaBannerIntro->additional_description }}
                                </p>
                            @endif
                        </div>
                    </div>
                @endif

                @if(($ctaBannerCards->isNotEmpty()) || ($ctaBannerIntro && ($ctaBannerIntro->cta_title || $ctaBannerIntro->cta_description || $ctaBannerIntro->cta_button_text || $ctaBannerIntro->cta_button_url)))
                    <div class="location-section ">
                        @if($ctaBannerCards->isNotEmpty())
                            <div class="row g-5 justify-content-center">
                                @foreach($ctaBannerCards as $card)
                                    @php $loopOdd = $loop->odd; @endphp
                                    <div class="col-md-6">
                                        <div class="location-card {{ $loopOdd ? 'london-card' : 'accra-card' }}">
                                            @if($card->label)
                                                <p class="x-small-text text-uppercase grey-color-v2 mb-2 d-block">
                                                    {{ $card->label }}
                                                </p>
                                            @endif
                                            @if($card->title)
                                                <h2 class="location-title text-deeper-orange mb-2">
                                                    {{ Str::before($card->title, ' ') }}
                                                    <span>{{ Str::after($card->title, ' ') }}</span>
                                                </h2>
                                            @endif
                                            @if($card->description)
                                                <p class="small-text mb-3">
                                                    {{ $card->description }}
                                                </p>
                                            @endif

                                            @if($card->tag_1 || $card->tag_2 || $card->tag_3)
                                                <div class="pill-group mb-4">
                                                    @foreach([$card->tag_1, $card->tag_2, $card->tag_3] as $tag)
                                                        @if($tag)
                                                            @php
                                                                $bg = $loopOdd ? 'badge-bg-lite' : 'bg-green-lite';
                                                            @endphp
                                                            <span class="badge-custom {{ $loop->first ? $bg : 'bg-grey-lite' }} fw-semibold">
                                                                {{ $tag }}
                                                            </span>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            @endif

                                            @if($card->additional_description)
                                                <p class="mb-4">
                                                    {!! nl2br(e($card->additional_description)) !!}
                                                </p>
                                            @endif

                                            @if($card->button1_text)
                                                <a href="{{ $card->button1_url ?? '' }}"
                                                class="btn-outline-custom {{ $loopOdd ? 'btn-london' : 'btn-accra' }} me-2 mb-2 mb-xl-0">
                                                    {{ $card->button1_text }}
                                                </a>
                                            @endif

                                            @if($card->button2_text)
                                                <a href="{{ $card->button2_url ?? '' }}"
                                                class="btn-outline-custom {{ $loopOdd ? 'btn-london' : 'btn-accra' }}">
                                                    {{ $card->button2_text }}
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif

                        @if($ctaBannerIntro && ($ctaBannerIntro->cta_title || $ctaBannerIntro->cta_description || $ctaBannerIntro->cta_button_text || $ctaBannerIntro->cta_button_url))
                            <div class="row mt-2">
                                <div class="col-12 text-center choose-market-box py-4">
                                    @if($ctaBannerIntro->cta_title)
                                        <h3 class="text-white">{{ $ctaBannerIntro->cta_title }}</h3>
                                    @endif
                                    @if($ctaBannerIntro->cta_description)
                                        <p class="subhead mb-2 text-white-v2">{{ $ctaBannerIntro->cta_description }}</p>
                                    @endif
                                    @if($ctaBannerIntro->cta_button_text)
                                        <a href="{{ $ctaBannerIntro->cta_button_url ?? '' }}" class="commn-btn btn-primary-custom me-2 mb-3 mb-sm-0 mt-2">Start a
                                            Conversation<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right ms-2"
                                                data-loc="client/src/pages/Home.tsx:47">
                                                <path d="M5 12h14"></path>
                                                <path d="m12 5 7 7-7 7"></path>
                                            </svg> </a>
                                    @endif
                                </div>
                            </div>
                        @endif
                    </div>
                @endif

            </div>
        </section>
    @endif


    @if($packageIntro || $packageCards->isNotEmpty())
        <section class="packages section-md">
            <div class=" container-custom">
                @if($packageIntro)
                    @if($packageIntro->title)
                        <h2 class="element-2">
                            {{ $packageIntro->title }}
                        </h2>
                    @endif
                    @if($packageIntro->description)
                        <div class="subhead">
                            {!! nl2br(e($packageIntro->description)) !!}
                        </div>
                    @endif
                @endif

                @if($packageCards->isNotEmpty())
                    <div class="row g-4 mt-3 justify-content-center">
                        @foreach($packageCards as $card)
                        <div class="col-lg-4 col-md-6">
                            <div class="card-1">
                                @if($card->support_title)
                                    <span class="small-text text-orange fw-semibold d-block mb-2">
                                        {{ $card->support_title }}
                                    </span>
                                @endif
                                @if($card->most_popular)
                                    <span class="badge-popular mb-3">
                                        Most Popular
                                    </span>
                                @endif
                                @if($card->title)
                                    <h3>
                                        {{ $card->title }}
                                    </h3>
                                @endif
                                @if($card->support_description)
                                    <p class="mb-4 fw-semibold">
                                        {{ $card->support_description }}
                                    </p>
                                @endif

                                @if($card->key_services)
                                    <ul class="package-list">
                                        @foreach(preg_split('/\r\n|\r|\n/', $card->key_services) as $service)
                                            @if(trim($service))
                                                <li>
                                                    <i class="bi bi-check2"></i>
                                                    {{ trim($service) }}
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                @endif
                                <a href="{{ route('packages.show', $card->slug) }}" class="button-link mt-auto">Learn
                                        More <i class="bi bi-arrow-right-short ms-1 mt-2px"></i></a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                @endif

            </div>
        </section>
    @endif

    @if($testimonialIntro || $testimonialCards->isNotEmpty())
        <section class="testimonial section-md">
            <div class=" container-custom d-flex flex-column align-items-center text-center">
                @if($testimonialIntro)
                    @if($testimonialIntro->title)
                        <h2 class="element-1">
                            {{ $testimonialIntro->title }}
                        </h2>
                    @endif

                    @if($testimonialIntro->description)
                        <div class="subhead mb-0">
                            {!! nl2br(e($testimonialIntro->description)) !!}
                        </div>
                    @endif
                @endif

                @if($testimonialCards->isNotEmpty())
                    <div class="testimonial-carousal cmn-sec-padding">
                        <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">

                            <div class="carousel-inner testimonial-wrapper mx-auto">
                                @foreach($testimonialCards as $index => $card)
                                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                        <div class="testimonial-card d-flex flex-column align-items-start">
                                            <div class="stars mb-4">
                                                @php
                                                    $rating = (int) $card->rating;
                                                @endphp
                                                @for($i = 1; $i <= $rating; $i++)
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        width="20"
                                                        height="20"
                                                        viewBox="0 0 24 24"
                                                        fill="currentColor"
                                                        stroke="currentColor"
                                                        stroke-width="2"
                                                        class="lucide lucide-star">
                                                        <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                                        </polygon>
                                                    </svg>
                                                @endfor
                                            </div>

                                            @if($card->testimonial)
                                                <h3 class="mb-4">
                                                    "{{ $card->testimonial }}"
                                                </h3>
                                            @endif
                                            @if($card->client_name)
                                                <div class="d-flex align-items-center">
                                                    <h6>
                                                        {{ $card->client_name }}
                                                    </h6>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="controls-container mx-auto">
                                <button class="btn-nav" type="button" data-bs-target="#testimonialCarousel"
                                    data-bs-slide="prev">
                                    <i class="bi bi-chevron-left"></i>
                                </button>

                                <div class="carousel-indicators custom-pills">
                                    @foreach($testimonialCards as $index => $card)
                                        <button type="button"
                                                data-bs-target="#testimonialCarousel"
                                                data-bs-slide-to="{{ $index }}"
                                                class="{{ $index === 0 ? 'active' : '' }}"
                                                {{ $index === 0 ? 'aria-current=true' : '' }}
                                                aria-label="Slide {{ $index + 1 }}">
                                        </button>
                                    @endforeach
                                </div>

                                <button class="btn-nav" type="button" data-bs-target="#testimonialCarousel"
                                    data-bs-slide="next">
                                    <i class="bi bi-chevron-right"></i>
                                </button>
                            </div>

                        </div>
                    </div>
                @endif
            </div>
        </section>
    @endif


    @if($valueIntro || $valueCards->isNotEmpty())
        <section class="company-values section-md">
            <div class="container-custom d-flex flex-column">
                @if($valueIntro)
                    <div class="row">
                        <div class="col-md-12">
                            @if($valueIntro->title)
                                <h2 class="element-2">
                                    {{ $valueIntro->title }}
                                </h2>
                            @endif

                            @if($valueIntro->description)
                                <div class="subhead mb-0">
                                    {!! nl2br(e($valueIntro->description)) !!}
                                </div>
                            @endif
                        </div>
                    </div>
                @endif

                @if($valueCards->isNotEmpty())
                    <div class="cmn-sec-padding">
                        <div class="row g-4">
                            @foreach($valueCards as $card)
                                <div class="col-md-4">
                                    <div class="value-card">
                                        @if($card->image)
                                            <div class="values-img">
                                                <img src="{{ asset('backend_assets/home-page/' . $card->image) }}"
                                                    alt="{{ $card->title }}"
                                                    class="img-fluid">
                                            </div>
                                        @endif
                                        @if($card->title)
                                            <h6 class="my-3">
                                                {{ $card->title }}
                                            </h6>
                                        @endif
                                        @if($card->description)
                                            <p class="small-text text-muted mb-0">
                                                {!! nl2br(e($card->description)) !!}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </section>
    @endif

    @if($ctaBannerBottom)
        <section class="ready-to section-md">
            <div class="container-custom d-flex flex-column align-items-center text-center position-relative z-3">
                @if($ctaBannerBottom->title)
                    <h2 class="mb-3 text-white">
                        {{ $ctaBannerBottom->title }}
                    </h2>
                @endif

                @if($ctaBannerBottom->description)
                    <p class="subhead mb-4">
                        {!! nl2br(e($ctaBannerBottom->description)) !!}
                    </p>
                @endif

                <div class="d-flex flex-column flex-sm-row">
                    @if($ctaBannerBottom->button1_text)
                        <a href="{{ $ctaBannerBottom->button1_url ?? '' }}"
                        class="commn-btn btn-primary-custom me-0 me-sm-3 mb-3 mb-sm-0">
                            {{ $ctaBannerBottom->button1_text }}
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

                    @if($ctaBannerBottom->button2_text)
                        <a href="{{ $ctaBannerBottom->button2_url ?? '' }}"
                        class="commn-btn btn-primary-custom">
                            {{ $ctaBannerBottom->button2_text }}
                        </a>
                    @endif
                </div>
            </div>

        </section>
    @endif

@endsection
