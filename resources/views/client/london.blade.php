@extends('layouts.appweb')
@section('title', 'London | ')
@push('meta')
    <meta
        name="description"
        content="A strategy, creative, and technology agency with offices in London and Accra. We help ambitious businesses grow by combining UK expertise with African market insight."
    >
@endpush
@section('content')
    @if($banner)
        <section class="section-hero london-banner">

            <div class="container-custom">

                <div class="section-hero-sub">
                    <div>
                        <div class="element-bottom">
                            @if($banner->label)
                                <div class="header-label header-label-2">
                                    {{ $banner->label }}
                                </div>
                            @endif
                            @if($banner->title)
                                <h1>{{ $banner->title }}</h1>
                            @endif
                            @if($banner->description)
                                <div class="subhead">
                                    {!! nl2br(e($banner->description)) !!}
                                </div>
                            @endif

                            @if($banner->additional_description)
                                <div class="small-text">
                                    {{ $banner->additional_description }}
                                </div>
                            @endif

                            @if($banner->location || $banner->serving)
                                <div class="subhead">

                                    @if($banner->location)
                                        {{ $banner->location }}
                                    @endif

                                    @if($banner->location && $banner->serving)
                                        <br>
                                    @endif

                                    @if($banner->serving)
                                        {{ $banner->serving }}
                                    @endif

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

    <!---------------------------strategic hub section starts here--------------------->
    @if($strategicHub)
        <section class="eagle-london-section section-lg">
            <div class="container-custom">

                <div class="row align-items-center mb-4">

                    <!-- LEFT CONTENT -->
                    <div class="col-lg-7">

                        @if($strategicHub->label)
                            <span class="tag">
                                {{ $strategicHub->label }}
                            </span>
                        @endif

                        @if($strategicHub->title)
                            <h2 class="element-3 mb-6 text-deeper-orange">
                                {{ $strategicHub->title }}
                            </h2>
                        @endif
                    </div>

                    <!-- RIGHT CONTENT -->
                    @if($strategicHub->primary_focus)
                        <div class="col-lg-5">

                            <div class="focus-box orange-bg">

                                <p class="focus-label">
                                    PRIMARY FOCUS
                                </p>

                                <h6 class="focus-text">
                                    {{ $strategicHub->primary_focus }}
                                </h6>

                            </div>

                        </div>
                    @endif
                </div>

                <div class="row align-items-start">

                    <div class="col-lg-6 pe-lg-5">
                        @if($strategicHub->label)
                        <h3 class="brand-title">

                                <span class="text-deeper-orange">
                                    {{ strtolower(Str::before($strategicHub->label, ' ')) }}
                                </span>{{ strtolower(Str::after($strategicHub->label, ' ')) }}

                            </h3>
                        @endif

                        @if($strategicHub->description)
                            @foreach(preg_split('/\r\n|\r|\n/', $strategicHub->description) as $paragraph)

                                @if(trim($paragraph))
                                    <p class="subhead {{ $loop->first ? 'mb-2' : '' }}">
                                        {{ trim($paragraph) }}
                                    </p>
                                @endif

                            @endforeach
                        @endif
                    </div>

                    @if($strategicHub->key_offerings)
                        <div class="col-lg-6">
                            <div class="offer-box">
                                <div class="offer-inner">
                                    <p class="offer-title">
                                        KEY OFFERINGS
                                    </p>
                                    <ul>
                                        @foreach(preg_split('/\r\n|\r|\n/', $strategicHub->key_offerings) as $offering)

                                            @if(trim($offering))
                                                <li>{{ trim($offering) }}</li>
                                            @endif

                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </section>
    @endif
    <!---===========================================strategic hub section ends here========================-->

    <!---================================== london by the numbers section starts here ===============================-->
    @if($numberIntro || $numberCards->isNotEmpty())
        <section class="london-numbers-section section">
            <div class="container-custom">

                @if($numberIntro)

                    @if($numberIntro->label)
                        <span class="tag">
                            {{ $numberIntro->label }}
                        </span>
                    @endif

                    @if($numberIntro->title)
                        <h2 class="text-deeper-orange">
                            {{ $numberIntro->title }}
                        </h2>
                    @endif

                @endif

                <!-- CARDS -->
                @if($numberCards->isNotEmpty())
                    <div class="row g-6 mt-4">

                        @foreach($numberCards as $number)
                            <div class="col-lg-4 col-md-6">
                                <div class="number-card text-center">
                                    <h3 class="number">
                                        {{ $number->title }}
                                    </h3>
                                    @if($number->description)
                                        <p class="label">
                                            {{ $number->description }}
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

    <!--=====================================london by the numbers section ends here===============================-->
    @if($builtForIntro || $builtForCards->isNotEmpty())
        <section class="target-section section">
            <div class="container-custom">

                @if($builtForIntro)
                    @if($builtForIntro->label)
                        <span class="tag deeper-orange-bg text-white">
                            {{ $builtForIntro->label }}
                        </span>
                    @endif

                    @if($builtForIntro->title)
                        <h2 class="text-white">
                            {{ $builtForIntro->title }}
                        </h2>
                    @endif
                @endif

                <!-- CARDS -->
                @if($builtForCards->isNotEmpty())
                    <div class="row g-6 mt-4">
                        @foreach($builtForCards as $card)
                            <div class="col-lg-4 col-md-6">

                                <div class="target-card">

                                    <h6 class="text-deeper-orange">
                                        {{ $card->title }}
                                    </h6>

                                    @if($card->description)
                                        <p class="card-text">
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

    <!-- ================what we do in london section starts here====================== -->
    @if($whatWeDoIntro || $whatWeDoCards->isNotEmpty())
        <section class="services-section section">
            <div class="container-custom">

                @if($whatWeDoIntro)

                    @if($whatWeDoIntro->label)
                        <span class="tag deeper-orange-bg text-white">
                            {{ $whatWeDoIntro->label }}
                        </span>
                    @endif

                    @if($whatWeDoIntro->title)
                        <h2 class="text-deeper-orange">
                            {{ $whatWeDoIntro->title }}
                        </h2>
                    @endif

                @endif

                <!-- CARDS -->
                @if($whatWeDoCards->isNotEmpty())
                    <div class="row g-6 mt-4">

                        @foreach($whatWeDoCards as $index => $card)
                            <div class="col-lg-4 col-md-6">
                                <div class="service-card-2 {{ $index === 0 ? 'active' : '' }}">
                                    <h4 class="card-title dark">
                                        {{ $card->title }}
                                    </h4>

                                    @if($card->description)
                                        <p class="card-text">
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
    <!-- ================what we do in london section ends here====================== -->

    <!--================market we serve section================-->
    @if($weServeIntro || $weServeCards->isNotEmpty())
        <section class="markets-section section">
            <div class="container-custom">

                @if($weServeIntro)

                    @if($weServeIntro->label)
                        <span class="tag">
                            {{ $weServeIntro->label }}
                        </span>
                    @endif

                    @if($weServeIntro->title)
                        <h2 class="text-deeper-orange">
                            {{ $weServeIntro->title }}
                        </h2>
                    @endif

                @endif

                <!-- GRID -->
                @if($weServeCards->isNotEmpty())
                    <div class="row g-4 mt-4">
                        @foreach($weServeCards as $card)
                            <div class="col-lg-6">
                                <div class="market-card">
                                    <h4 class="card-title">
                                        {{ $card->title }}
                                    </h4>

                                    @if($card->description)
                                        <p class="card-text">
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
    <!--================market we serve section end================-->

    <!--========================services delivered section==================== -->
    @if($servicesDeliveredIntro || $servicesDeliveredCards->isNotEmpty())
        <section class="services-delivered-section section">
            <div class="container-custom">

                @if($servicesDeliveredIntro)

                    @if($servicesDeliveredIntro->label)
                        <span class="tag deeper-orange-bg text-white">
                            {{ $servicesDeliveredIntro->label }}
                        </span>
                    @endif

                    @if($servicesDeliveredIntro->title)
                        <h2 class="text-white">
                            {{ $servicesDeliveredIntro->title }}
                        </h2>
                    @endif
                    
                @endif

                <!-- GRID -->
                @if($servicesDeliveredCards->isNotEmpty())
                    <div class="row g-4 mt-4">

                        @foreach($servicesDeliveredCards as $card)
                            <div class="col-lg-4 col-md-6">
                                <div class="service-list-card">
                                    <h4 class="card-title">
                                        {{ $card->title }}
                                    </h4>

                                    @if($card->description)
                                        <ul class="service-list">
                                            @foreach(preg_split('/\r\n|\r|\n/', $card->description) as $item)
                                                @if(trim($item))
                                                    <li>{{ trim($item) }}</li>
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
    <!--=============================services delivered section end====================-->

    <!--=============================why choose us section start====================-->
    @if($whyUsIntro || $whyUsCards->isNotEmpty())
        <section class="why-choose-section section">
            <div class="container-custom">

                <!-- TITLE -->
                @if($whyUsIntro?->title)
                    <h2 class="text-deeper-orange">
                        {{ $whyUsIntro->title }}
                    </h2>
                @endif

                <!-- CARDS -->
                @if($whyUsCards->isNotEmpty())
                    <div class="row g-4 mt-4 justify-content-center">

                        @foreach($whyUsCards as $card)
                                <div class="col-lg-4 col-md-6">
                                    <div class="why-card">
                                        <h4 class="card-title">
                                            {{ $card->title }}
                                        </h4>

                                        @if($card->description)
                                            <p class="card-text">
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

    <!--=============================Integrated with Eagle Accra section start====================-->
    @if($intgrOrganization)
        <section class="integration-section section">
            <div class="container-custom">

                <div class="row align-items-center g-2">
                    @if($intgrOrganization->title)
                        <div class="col-lg-12">
                            <div class="row">
                                <!-- TITLE -->
                                <h2 class="text-white">{{ $intgrOrganization->title }}</h2>
                            </div>
                        </div>
                    @endif

                    <div class="col-lg-6">

                        <!-- DESCRIPTION -->
                        @if($intgrOrganization->description)
                            <p class="desc mt-3 text-white">
                                {!! nl2br(e($intgrOrganization->description)) !!}
                            </p>
                        @endif

                        @if($intgrOrganization->additional_description)
                            <p class="desc italic text-white">
                                {!! nl2br(e($intgrOrganization->additional_description)) !!}
                            </p>
                        @endif

                        @if($intgrOrganization->key_points)
                            <ul class="check-list">
                                @foreach(preg_split('/\r\n|\r|\n/', $intgrOrganization->key_points) as $point)
                                    @if(trim($point))
                                        <li class="text-white">
                                            {{ trim($point) }}
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        @endif

                    </div>

                    @if($intgrOrganization->quote)
                        <div class="col-lg-6">
                            <div class="quote-box">
                                <p class="quote-text">
                                    {{ $intgrOrganization->quote }}
                                </p>
                                @if($intgrOrganization->quote_author)
                                    <p class="quote-author mb-0">
                                        — {{ $intgrOrganization->quote_author }}
                                    </p>
                                @endif
                            </div>
                        </div>
                    @endif

                </div>

            </div>
        </section>
    @endif

    @if($faqIntro || $faqCards->isNotEmpty())
        <section class="faq-section section">
            <div class="container-custom">
                <div class="faq-main">
                    @if($faqIntro)
                        <div class="d-flex flex-column align-items-start text-center">
                            @if($faqIntro->label)
                                <div class="tag deeper-orange-bg text-white mb-3">
                                    {{ $faqIntro->label }}
                                </div>
                            @endif

                            @if($faqIntro->title)
                                <h2 class="h2-36">
                                    {{ $faqIntro->title }}
                                </h2>
                            @endif

                            @if($faqIntro->description)
                                <div class="subhead">
                                    {!! nl2br(e($faqIntro->description)) !!}
                                </div>
                            @endif
                        </div>
                    @endif

                    @if($faqCards->isNotEmpty())
                        <div class="faq-section-accordian pt-3">
                            <div class="accordion accordion-flush custom-faq" id="faqAccordion">

                                @foreach($faqCards as $faq)
                                    @php
                                        $headingId = 'heading' . $faq->id;
                                        $collapseId = 'collapse' . $faq->id;
                                    @endphp

                                    <div class="accordion-item {{ $loop->last ? '' : 'mb-3'  }}">
                                        <h2 class="accordion-header"
                                            id="{{ $headingId }}">
                                            <button class="accordion-button collapsed"
                                                    type="button"
                                                    data-bs-toggle="collapse"
                                                    data-bs-target="#{{ $collapseId }}"
                                                    aria-controls="{{ $collapseId }}">
                                                {{ $faq->title }}
                                            </button>
                                        </h2>

                                        <div id="{{ $collapseId }}"
                                            class="accordion-collapse collapse"
                                            aria-labelledby="{{ $headingId }}"
                                            data-bs-parent="#faqAccordion">

                                            <div class="accordion-body">
                                                @if($faq->description)
                                                    {!! nl2br(e($faq->description)) !!}
                                                @endif
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

    @if($ctaBottom)
        <section class="ready-to london-accra-cta section-md  text-center">
            <div class="container-custom">

                <div class="inner-cta-box text-center text-white position-relative z-1">

                    <!-- TOP SMALL TEXT -->
                    @if($ctaBottom->intro)
                        <p class="cta-top-text">
                            {!! nl2br(e($ctaBottom->intro)) !!}
                        </p>
                    @endif

                    <!-- TAG -->
                    @if($ctaBottom->label)
                        <span class="tag deeper-orange-bg text-white">
                            {{ $ctaBottom->label }}
                        </span>
                    @endif

                    <!-- TITLE -->
                    @if($ctaBottom->title)
                        <h2 class="text-white">
                            {{ $ctaBottom->title }}
                        </h2>
                    @endif

                    <!-- SUBTEXT -->
                    @if($ctaBottom->description)
                        <p class="cta-subtext">
                            {!! nl2br(e($ctaBottom->description)) !!}
                        </p>
                    @endif

                    <!-- BUTTON -->
                    @if($ctaBottom->button_text)
                        <a href="{{ $ctaBottom->button_url ?? '' }}"
                            class="commn-btn btn-deep-orange"
                            target="_blank"
                            rel="noopener noreferrer">
                                <i class="bi bi-whatsapp me-3"></i>
                                {{ $ctaBottom->button_text }}
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


    <!-- ============== Exit-intent popup ================ -->
    <div class="exit-intent-overlay" id="exitIntentOverlay">
        <div class="exit-intent-modal">

            <button class="exit-close" id="closeExitIntent">
                &times;
            </button>

            <h3>Speak with the London team</h3>

            <p>
                Tell us about your UK or European project and the London team will guide you.
            </p>

            <a href="{{ url('/contact') }}" id="intent-btn-black" class="intent-btn-black">
                Contact London Team
            </a>

            <a href="{{ url('/packages') }}" id="intent-btn-white" class="intent-btn-white">
                View Packages
            </a>

        </div>
    </div>
@endsection
