@extends('layouts.appweb')
@section('title', 'Accra | ')
@push('meta')
    <meta
        name="description"
        content="A strategy, creative, and technology agency with offices in London and Accra. We help ambitious businesses grow by combining UK expertise with African market insight."
    >
@endpush
@section('content')

    @if($banner)
        <section class="section-hero border-btm-green accra-banner">

            <div class="container-custom">

                <div class="section-hero-sub">
                    <div>
                        <div class="accra-element element-bottom">
                            @if($banner->label)
                                <div class="header-label header-label-3">
                                    {{ $banner->label }}
                                </div>
                            @endif
                            <h1>{{ $banner->title }}</h1>
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
                                class="commn-btn btn-green-bg me-2 mb-3 mb-sm-0">
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


    @if($strategicHub)
        <section class="eagle-london-section eagle-accra-section section-lg">
            <div class="container-custom">

                <div class="row align-items-center mb-4">

                    <!-- LEFT CONTENT -->
                    <div class="col-lg-7">

                        @if($strategicHub->label)
                            <span class="tag green-lite-bg green-text">
                                {{ $strategicHub->label }}
                            </span>
                        @endif

                        <h2 class="green-text element-3 mb-6">
                            {{ $strategicHub->title }}
                        </h2>
                    </div>

                    <!-- RIGHT CONTENT -->
                    @if($strategicHub->primary_focus)
                        <div class="col-lg-5">
                            <div class="focus-box primary-bg">
                                <p class="focus-label">PRIMARY FOCUS</p>

                                <h6 class="focus-text">
                                    {{ $strategicHub->primary_focus }}
                                </h6>
                            </div>
                        </div>
                    @endif
                </div>

                <div class="row align-items-start">
                    <div class="col-md-6 pe-lg-5">
                        @if($strategicHub->label)
                        <h3 class="brand-title">
                            <span class="orange green-text">{{ strtolower(Str::before($strategicHub->label, ' ')) }}</span>{{ strtolower(Str::after($strategicHub->label, ' ')) }}
                        </h3>
                        @endif

                        @if($strategicHub->description)
                            @foreach(preg_split('/\r\n|\r|\n/', $strategicHub->description) as $paragraph)
                                @if(trim($paragraph))
                                    <p class="subhead {{ $loop->first() ? 'mb-2' : '' }}">
                                        {{ $paragraph }}
                                    </p>
                                @endif
                            @endforeach
                        @endif
                    </div>

                    @if($strategicHub->key_offerings)
                        <div class="col-md-6">
                            <!-- KEY OFFERINGS -->
                            <div class="offer-box accra-box">
                                <div class="offer-inner">
                                    <p class="offer-title">KEY OFFERINGS</p>
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
    
    @if($numberIntro || $numberCards->isNotEmpty())
        <section class="london-numbers-section accra-numbers-section border-btm-green section-md">
            <div class="container-custom">
                @if($numberIntro)
                    <!-- TAG -->
                    @if($numberIntro->label)
                        <span class="tag green-lite-bg green-text">
                            {{ $numberIntro->label }}
                        </span>
                    @endif

                    <!-- TITLE -->
                    @if($numberIntro->title)
                        <h2 class="green-text">
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
                                    <h3 class="number green-text">
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
    

    @if($builtForIntro || $builtForCards->isNotEmpty())
        <section class="target-section border-btm-green section-md bg-white ">
            <div class="container-custom">
                @if($builtForIntro)
                    <!-- TAG -->
                    @if($builtForIntro->label)
                        <span class="tag green-lite-bg green-text">
                            {{ $builtForIntro->label }}
                        </span>
                    @endif

                    <!-- TITLE -->
                    @if($builtForIntro->title)
                        <h2 class="green-text">
                            {{ $builtForIntro->title }}
                        </h2>
                    @endif
                @endif

                <!-- CARDS -->
                @if($builtForCards->isNotEmpty())
                    <div class="row g-4 mt-4">
                        <!-- CARD 1 -->
                        @foreach($builtForCards as $card)
                            <div class="col-lg-4 col-md-6">
                                <div class="target-card green-lite-bg bordr-lft-green">
                                    <h6 class="orange-head green-text">{{ $card->title }}</h6>
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


    @if($whatWeDoIntro || $whatWeDoCards->isNotEmpty())
        <section class="services-section lite-green-bg section-md">
            <div class="container-custom">

                <!-- TAG -->
                @if($whatWeDoIntro?->label)
                    <span class="tag primary-bg text-white">
                        {{ $whatWeDoIntro->label }}
                    </span>
                @endif

                <!-- TITLE -->
                @if($whatWeDoIntro?->title)
                    <h2 class="dark-teal-text">
                        {{ $whatWeDoIntro->title }}
                    </h2>
                @endif

                <!-- CARDS -->
                @if($whatWeDoCards->isNotEmpty())
                <div class="row g-6 mt-4">
                    @foreach($whatWeDoCards as $index => $card)
                    <div class="col-lg-4 col-md-6">
                        <div class="accra-service-card {{ $index === 0 ? 'active' : '' }}">
                            <h4 class="text-white mb-3">
                                {{ $card->title }}
                            </h4>
                            @if($card->description)
                                <p class="text-white">
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


    @if($weServeIntro || $weServeCards->isNotEmpty())
        <section class="markets-section border-0 section-md">
            <div class="container-custom">

                <!-- TAG -->
                @if($weServeIntro?->label)
                    <span class="tag green-lite-bg green-text">
                        {{ $weServeIntro->label }}
                    </span>
                @endif

                <!-- TITLE -->
                @if($weServeIntro?->title)
                    <h2 class="green-text">
                        {{ $weServeIntro->title }}
                    </h2>
                @endif

                <!-- GRID -->
                @if($weServeCards->isNotEmpty())
                <div class="row g-4 mt-4">

                    @foreach($weServeCards as $card)
                    <div class="col-lg-6">
                        <div class="market-card bordr-lft-green">
                            <h4 class="card-title green-text">
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

    @if($whyUsIntro || $whyUsCards->isNotEmpty())
        <section class="why-choose-section primary-bg border-bottom-0 section-md">
            <div class="container-custom">

                <!-- TITLE -->
                @if($whyUsIntro?->title)
                    <h2 class="text-white">
                        {{ $whyUsIntro->title }}
                    </h2>
                @endif

                <!-- GRID -->
                @if($whyUsCards->isNotEmpty())
                    <div class="row g-4 mt-4">
                        <!-- CARD -->
                        @foreach($whyUsCards as $card)
                        <div class="col-lg-3 col-md-6">
                            <div class="service-list-card bordr-top-green">
                                <h4 class="card-title font-20 green-text">
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

    @if($intgrOrganization)
        <section class="integration-section bg-white section-md">
            <div class="container-custom">

                <div class="row align-items-center g-2">

                    <div class="col-lg-12">
                        <div class="row">
                            <!-- TITLE -->
                            <h2 class="green-text">
                                {{ $intgrOrganization->title }}
                            </h2>
                        </div>
                    </div>
                    <!-- LEFT CONTENT -->
                    <div class="col-lg-6">

                        <!-- DESCRIPTION -->
                        @if($intgrOrganization->description)
                            <p class="desc mt-3">
                                {!! nl2br(e($intgrOrganization->description)) !!}
                            </p>
                        @endif

                        @if($intgrOrganization->additional_description)
                            <p class="desc italic">
                                {!! nl2br(e($intgrOrganization->additional_description)) !!}
                            </p>
                        @endif

                        <!-- LIST -->
                        @if($intgrOrganization->key_points)
                            <ul class="check-list check-list-green">

                                @foreach(preg_split('/\r\n|\r|\n/', $intgrOrganization->key_points) as $point)
                                    @if(trim($point))
                                        <li>{{ trim($point) }}</li>
                                    @endif
                                @endforeach

                            </ul>
                        @endif

                    </div>

                    <!-- RIGHT QUOTE -->
                    @if($intgrOrganization->quote)
                        <div class="col-lg-6">
                            <div class="quote-box box-border-green box-gradient-green">

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

    @if($howDeliverIntro || $howDeliverCards->isNotEmpty())
        <section class="services-delivered-section grey-bg border-0 section-md">
            <div class="container-custom">

                <!-- TITLE -->
                @if($howDeliverIntro?->title)
                    <h2 class="green-text">
                        {{ $howDeliverIntro->title }}
                    </h2>
                @endif

                <!-- GRID -->
                @if($howDeliverCards->isNotEmpty())
                    <div class="row g-4 mt-4">
                        <!-- CARD 1 -->
                        @foreach($howDeliverCards as $card)
                            <div class="col-lg-3 col-md-6">

                                <div class="service-list-card bordr-top-green">

                                    <h4 class="card-title font-20 green-text">
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


    @if($faqIntro || $faqCards->isNotEmpty())
        <section class="faq-section section">
            <div class="container-custom">
                <div class="faq-main">
                    @if($faqIntro)
                        <div class="d-flex flex-column align-items-start text-center">
                            <div class="tag deeper-orange-bg text-white mb-3">
                                {{ $faqIntro->label }}
                            </div>
                            <h2 class="h2-36">{{ $faqIntro->title }}</h2>
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
                                @foreach($faqCards as $index => $faq)
                                    @php
                                        $headingId = 'heading' . $faq->id;
                                        $collapseId = 'collapse' . $faq->id;
                                    @endphp
                                    <div class="accordion-item {{ $loop->last ? '' : 'mb-3'  }}">
                                        <h2 class="accordion-header" id="{{ $headingId }}">
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

    
    @if($ctaBottom)
        <section class="ready-to london-accra-cta accra-cta section-md  text-center">
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
                        <span class="tag green-bg text-white">
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
                        class="commn-btn btn-green-bg"
                        target="_blank">
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


    <div class="exit-intent-overlay" id="exitIntentOverlay">
        <div class="exit-intent-modal">

            <button class="exit-close" id="closeExitIntent">
                &times;
            </button>

            <h3>Speak with the Accra team</h3>

            <p>
                Tell us about your African market project and the Accra team will assist you.
            </p>

            <a href="{{ url('/contact') }}" id="intent-btn-black" class="intent-btn-black">
                Contact Accra Team
            </a>

            <a href="{{ url('/packages') }}" id="intent-btn-white" class="intent-btn-white">
                View Packages
            </a>

        </div>
    </div>

@endsection
