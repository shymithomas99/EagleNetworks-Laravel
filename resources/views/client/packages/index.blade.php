@extends('layouts.appweb')
@section('title', 'Packages | ')
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
                            <h1 class="element-2">
                                {{ $banner->title }}
                            </h1>

                            @if($banner->description)
                                <div class="subhead">
                                    {!! nl2br(e($banner->description)) !!}
                                </div>
                            @endif

                            @if($banner->button_text)
                                <a href="{{ $banner->button_url ?? '' }}"
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
                        </div>
                    </div>
                </div>

            </div>
        </section>
    @endif

    @if($guideIntro || $guideCards->isNotEmpty())
        <section class="package-selection section-md">

            <div class=" container-custom d-flex flex-column">
                @if($guideIntro)
                    <div class="row">
                        <div class="col-md-12">

                            @if($guideIntro->title)
                                <h2>{{ $guideIntro->title }}</h2>
                            @endif

                            @if($guideIntro->description)
                                <div class="subhead mb-0">
                                    {!! nl2br(e($guideIntro->description)) !!}
                                </div>
                            @endif

                        </div>
                    </div>
                @endif

                @if($guideCards->isNotEmpty())
                    <div class="five-integrated-boxes">
                        <section class="cmn-sec-padding">
                            <div class="">
                                <div class="row g-4 justify-content-center">
                                    @foreach($guideCards as $index => $guideCard)
                                        @php
                                            $borderClass = match ($index % 3) {
                                                1 => 'green-border',
                                                2 => 'brown-border',
                                                default => '',
                                            };
                                        @endphp

                                        <div class="col-md-6 col-lg-4">
                                            <div class="inner-service-card {{ $borderClass }} bg-white">

                                                <div class="d-flex">
                                                    <h6 class="mb-2 fw-semibold">
                                                        {{ $guideCard->title }}
                                                    </h6>
                                                </div>

                                                @if($guideCard->description)
                                                    <p>
                                                        {!! nl2br(e($guideCard->description)) !!}
                                                    </p>
                                                @endif

                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </section>
                    </div>
                @endif
            </div>
        </section>
    @endif

@if($packageIntro || $packageCards->isNotEmpty())
    <section class="our-service-packages section-md">
        <div class="container-custom">
            @if($packageIntro)
                @if($packageIntro->title)
                    <h2 class="mb-3">
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
                <div class="row g-4 mt-4 justify-content-center">

                    @foreach($packageCards as $packageCard)
                        <div class="col-lg-4 col-md-6">
                            <div class="card-1">
                                @if($packageCard->most_popular)
                                    <span class="badge-popular mb-3">
                                        Most Popular
                                    </span>
                                @endif

                                @if($packageCard->title)
                                    <h3>
                                        {{ $packageCard->title }}
                                    </h3>
                                @endif

                                @if($packageCard->support_title)
                                    <span class="text-deeper-orange fw-semibold mb-3 d-block">
                                        {{ $packageCard->support_title }}
                                    </span>
                                @endif

                                @if($packageCard->description)
                                    <p class="desc">
                                        {!! nl2br(e($packageCard->description)) !!}
                                    </p>
                                @endif

                                @if($packageCard->support_description)
                                    <p class="desc-small">
                                        {!! nl2br(e($packageCard->support_description)) !!}
                                    </p>
                                @endif

                                @if($packageCard->key_services)
                                    <ul class="package-list">

                                        @foreach(preg_split('/\r\n|\r|\n/', $packageCard->key_services) as $service)
                                            @if(trim($service))
                                                <li>
                                                    <i class="bi bi-check2"></i>
                                                    {{ trim($service) }}
                                                </li>
                                            @endif
                                        @endforeach

                                    </ul>
                                @endif

                                @if($packageCard->button_text)
                                <a href="{{ $packageCard->button_url ?? '' }}"
                                    class="commn-btn btn-primary-custom">
                                    {{ $packageCard->button_text }}
                                </a>
                                @endif
                                <a href="{{ route('packages.show', $packageCard->slug) }}" class="button-link button-link-grey text-center mt-3 justify-content-center">Learn
                                    More <i class="bi bi-arrow-right-short ms-1 mt-2px"></i></a>
                            </div>
                        </div>
                    @endforeach

                </div>
            @endif
        </div>
    </section>
@endif


    @if($ctaBanner)
        <section class="highlight highlight-3">
            <div class="highlight-content">

                @if($ctaBanner->title)
                    <h3 class="mb-3 text-white">
                        {{ $ctaBanner->title }}
                    </h3>
                @endif

                @if($ctaBanner->description)
                    <p class="text-white mb-4">
                        {!! nl2br(e($ctaBanner->description)) !!}
                    </p>
                @endif

                @if($ctaBanner->button_text)
                    <a href="{{ $ctaBanner->button_url ?? '' }}"
                    class="commn-btn btn-white">
                        {{ $ctaBanner->button_text }}
                    </a>
                @endif

            </div>
        </section>
    @endif


    @if($whatYouGetIntro || $whatYouGetCards->isNotEmpty())
        <section class="what-you-get section-md">
            <div class="container-custom">

                @if($whatYouGetIntro)
                    @if($whatYouGetIntro->title)
                        <h2 class="text-white mb-3">
                            {{ $whatYouGetIntro->title }}
                        </h2>
                    @endif

                    @if($whatYouGetIntro->description)
                        <div class="subhead text-white-v2">
                            {!! nl2br(e($whatYouGetIntro->description)) !!}
                        </div>
                    @endif
                @endif

                @if($whatYouGetCards->isNotEmpty())
                    <div class="creative-agency-section py-5">
                        <div class="row g-4">

                            @foreach($whatYouGetCards as $whatYouGetCard)
                                <div class="col-md-6">
                                    <div class="feature-item-card">

                                        @if($whatYouGetCard->title)
                                            <h5 class="text-white">
                                                {{ $whatYouGetCard->title }}
                                            </h5>
                                        @endif

                                        @if($whatYouGetCard->description)
                                            <p class="text-white-v2">
                                                {!! nl2br(e($whatYouGetCard->description)) !!}
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


    @if($faqIntro || $faqCards->isNotEmpty())
        <section class="faq-section section">
            <div class="container-custom">

                <div class="faq-main">
                    @if($faqIntro)
                        <div class="d-flex flex-column align-items-start text-center">

                            @if($faqIntro?->label)
                                <div class="tag deeper-orange-bg text-white mb-3">
                                    {{ $faqIntro->label }}
                                </div>
                            @endif

                            @if($faqIntro?->title)
                                <h2 class="h2-36">
                                    {{ $faqIntro->title }}
                                </h2>
                            @endif

                            @if($faqIntro?->description)
                                <div class="subhead">
                                    {!! nl2br(e($faqIntro->description)) !!}
                                </div>
                            @endif

                        </div>
                    @endif

                    @if($faqCards->isNotEmpty())
                        <div class="faq-section-accordian pt-3">
                            <div class="accordion accordion-flush custom-faq"
                                id="faqAccordion">

                                @foreach($faqCards as $index => $faq)
                                    @php
                                        $faqId = 'faq' . $index;
                                    @endphp
                                    <div class="accordion-item mb-3">
                                        <h2 class="accordion-header"
                                            id="heading{{ $faqId }}">
                                            <button class="accordion-button collapsed"
                                                    type="button"
                                                    data-bs-toggle="collapse"
                                                    data-bs-target="#collapse{{ $faqId }}"
                                                    aria-expanded="false"
                                                    aria-controls="collapse{{ $faqId }}">
                                                {{ $faq->title }}
                                            </button>
                                        </h2>
                                        <div id="collapse{{ $faqId }}"
                                            class="accordion-collapse collapse"
                                            aria-labelledby="heading{{ $faqId }}"
                                            data-bs-parent="#faqAccordion">

                                            <div class="accordion-body">
                                                {!! nl2br(e($faq->description)) !!}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </section>
    @endif

    @if($ctaBannerBottom)
        <section class="ready-to section">
            <div class="container-custom">
                <div class="inner-cta-box text-center text-white position-relative z-1">

                    @if($ctaBannerBottom->title)
                        <h2 class="display-5 fw-bold mb-3">
                            {{ $ctaBannerBottom->title }}
                        </h2>
                    @endif

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
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            width="24"
                                            height="24"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            class="lucide lucide-mail text-[#F15A24]">
                                            <rect width="20"
                                                height="16"
                                                x="2"
                                                y="4"
                                                rx="2"></rect>
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
                                target="_blank"
                                rel="noopener">
                                    <div class="icon-circle mx-auto mb-3">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            width="24"
                                            height="24"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            class="lucide lucide-globe text-[#F15A24]">
                                            <circle cx="12"
                                                    cy="12"
                                                    r="10"></circle>
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
                                target="_blank"
                                rel="noopener">
                                    <div class="icon-circle mx-auto mb-3">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            width="24"
                                            height="24"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            class="lucide lucide-linkedin text-[#F15A24]">
                                            <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path>
                                            <rect width="4"
                                                height="12"
                                                x="2"
                                                y="9"></rect>
                                            <circle cx="4"
                                                    cy="4"
                                                    r="2"></circle>
                                        </svg>
                                    </div>
                                    <span class="cta-link">
                                        {{ $ctaBannerBottom->linkedin }}
                                    </span>
                                </a>
                            </div>
                        @endif
                    </div>

                    @if($ctaBannerBottom->button_text && $ctaBannerBottom->button_url)
                        <a href="{{ $ctaBannerBottom->button_url }}"
                        class="commn-btn btn-primary-custom mb-3 mb-sm-0">
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


    <div class="exit-intent-overlay" id="exitIntentOverlay">
        <div class="exit-intent-modal">

            <button class="exit-close" id="closeExitIntent">
                &times;
            </button>

            <h3>Before you choose a package</h3>

            <p>
                Tell us about your project and we will recommend the right package for your business.
            </p>


            <a href="https://wa.me/447983508359?text=Hi%20Eagle%20London,%20I'd%20like%20to%20schedule%20a%20call.%20Please%20let%20me%20know%20your%20available%20times."
                target="_blank" rel="noopener noreferrer" id="intent-btn-black" class="intent-btn-black">
                <svg data-loc="client/src/components/ExitIntentPopup.tsx:11" width="16" height="16"
                    viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="shrink-0 me-2">
                    <path data-loc="client/src/components/ExitIntentPopup.tsx:12"
                        d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z">
                    </path>
                </svg> Schedule a Call
            </a>

            <a href="{{ url('/services') }}" id="intent-btn-white" class="intent-btn-white">
                View Services
            </a>

        </div>
    </div>

@endsection
