@extends('layouts.appweb')
@section('title', 'Services | ')
@push('meta')
    <meta
        name="description"
        content="A strategy, creative, and technology agency with offices in London and Accra. We help ambitious businesses grow by combining UK expertise with African market insight."
    >
@endpush
@section('content')

    @if($banner)
        <section class="section-hero service-bnr">

            <div class="container-custom">

                <div class="section-hero-sub">
                    <div>
                        <div>
                            @if($banner->title)
                                <h1>{{ $banner->title }}</h1>
                            @endif
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

    @if($serviceIntro || $serviceCards->isNotEmpty())
        <section class="five-integrated-services section-lg ">

            <div class="container-custom d-flex flex-column">
                @if($serviceIntro)
                    <div class="row">
                        <div class="col-md-12">
                            @if($serviceIntro->title)
                                <h2>{{ $serviceIntro->title }}</h2>
                            @endif
                            @if($serviceIntro->description)
                                <div class="subhead mb-0">
                                    {!! nl2br(e($serviceIntro->description)) !!}
                                </div>
                            @endif
                        </div>
                    </div>
                @endif

                @if($serviceCards->isNotEmpty())
                    <div class="five-integrated-boxes">
                        <section class="cmn-sec-padding row row-cols-1 row-cols-md-3 row-cols-lg-5 g-4 justify-content-center">
                            @foreach($serviceCards as $card)
                                <div class="col {{ $loop->first ? 'service-col' : '' }}">
                                    <div class="service-card  align-items-center text-center" data-title="{{ $card->title }}"
                                        data-description="{{ $card->description }}">
                                        @if($card->image)
                                            <div class="icon-box">
                                                <img src="{{ asset('backend_assets/services-page/' . $card->image) }}"
                                                    alt="{{ $card->title }}"
                                                    width="32"
                                                    height="32">
                                            </div>
                                        @endif
                                        <h6>{{ $card->title }}</h6>
                                    </div>
                                </div>
                            @endforeach

                            <!-- DETAIL BOX -->
                            <!-- DESKTOP DETAIL BOX -->
                            <div class="service-detail-box desktop-detail-box" id="desktopDetailBox">
                                <h3 id="desktopDetailTitle"></h3>
                                <p id="desktopDetailDescription"></p>
                            </div>

                        </section>
                    </div>
                @endif
            </div>
        </section>
    @endif


    <!-- --------------------creative section starts here--------------------------- -->
    @if($howCreateIntro || $howCreateCards->isNotEmpty())
        <section class="creative-overview-section">
            <div class="container-custom">

                <!-- Heading -->
                @if($howCreateIntro)
                <div class="creative-header">
                    @if($howCreateIntro->label)
                        <div class="small-head text-secondary mb-3">
                            {{ $howCreateIntro->label }}
                        </div>
                    @endif

                    @if($howCreateIntro->title)
                        <h2 class="creative-title">
                            {{ $howCreateIntro->title }}
                        </h2>
                    @endif

                    @if($howCreateIntro->description)
                        <p>
                            {!! nl2br(e($howCreateIntro->description)) !!}
                        </p>
                    @endif
                </div>
                @endif

                <!-- Cards -->
                @if($howCreateCards->isNotEmpty())
                <div class="row g-4">
                    @foreach($howCreateCards as $card)
                        @php
                            $expandId = 'expandCreative' . $card->id;
                        @endphp
                        <div class="col-lg-4 col-md-6">
                            <div class="creative-wrapper">

                                <!-- Main Card -->
                                <div class="creative-card">

                                    @if($card->image)
                                        <div class="creative-image">
                                            <img src="{{ asset('backend_assets/services-page/' . $card->image) }}"
                                                alt="{{ $card->title }}">
                                        </div>
                                    @endif

                                    <div class="creative-content">
                                        <h3>{{ $card->title }}</h3>

                                        @if($card->description)
                                            <p>
                                                {!! nl2br(e($card->description)) !!}
                                            </p>
                                        @endif

                                        @if($card->key_services || $card->key_points)
                                            <button class="expand-btn" data-target="#{{ $expandId }}">
                                                <span>Explore</span>
                                                <span class="arrow">
                                                    <i class="bi bi-arrow-right-short"></i>
                                                </span>
                                            </button>
                                        @endif
                                    </div>

                                </div>

                                <!-- Expand Box -->
                                @if($card->key_services || $card->key_points)
                                <div class="expand-box" id="{{ $expandId }}">

                                    <div class="expand-inner">
                                        @if($card->key_services)
                                        <div class="expand-card">
                                            <h4>KEY SERVICES</h4>
                                            <ul>
                                                @foreach(preg_split('/\r\n|\r|\n/', $card->key_services) as $item)
                                                    @if(trim($item))
                                                        <li>{{ trim($item) }}</li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </div>
                                        @endif

                                        @if($card->key_points)
                                            <div class="expand-card">
                                                <h4>{{ $loop->last ? 'KEY POINTS' : 'PROCESS' }}</h4>
                                                <ul>
                                                    @foreach(preg_split('/\r\n|\r|\n/', $card->key_points) as $item)
                                                        @if(trim($item))
                                                            <li>{{ trim($item) }}</li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                @endif

                            </div>
                        </div>
                    @endforeach
                </div>
                @endif
            </div>
        </section>
    @endif
    <!-- --------------------creative section ends here--------------------------- -->


    <!-- =========================IN HOUSE PROJECTS SECTION========================= -->
    @if($projectIntro || $projectCards->isNotEmpty())
        <section class="inhouse-projects-section">
            <div class="container-custom">

                <!-- Header -->
                @if($projectIntro)
                    <div class="projects-header">

                        @if($projectIntro->label)
                            <div class="small-head text-secondary section-label-dark mb-3">
                                {{ $projectIntro->label }}
                            </div>
                        @endif

                        @if($projectIntro->title)
                            <h2 class="projects-title text-white">
                                {{ $projectIntro->title }}
                            </h2>
                        @endif

                        @if($projectIntro->description)
                            <p class="projects-subtitle">
                                {{ $projectIntro->description }}
                            </p>
                        @endif

                    </div>
                @endif

                <!-- Cards -->
                @if($projectCards->isNotEmpty())
                    <div class="row g-4">

                        @foreach($projectCards as $card)
                            <div class="col-lg-4 col-md-6">
                                @if($card->link_url)
                                    <a href="{{ $card->link_url }}"
                                        class="initiative-card-link"
                                        @if(parse_url($card->link_url, PHP_URL_HOST) !== parse_url(config('app.url'), PHP_URL_HOST))
                                            target="_blank"
                                            rel="noopener"
                                        @endif>
                                @endif
                                <div class="initiative-card">
                                    @if($card->image)
                                        <div class="initiative-image">
                                            <img src="{{ asset('backend_assets/services-page/' . $card->image) }}"
                                                    alt="{{ $card->title }}">
                                        </div>
                                    @endif

                                    <div class="initiative-content">

                                        @if($card->title)
                                            <h3>{{ $card->title }}</h3>
                                        @endif

                                        @if($card->description)
                                            <p>
                                                {{ $card->description }}
                                            </p>
                                        @endif

                                        @if($card->link_text)
                                            <span class="button-link small-text mb-0">
                                                {{ $card->link_text }}
                                                <i class="bi bi-arrow-right-short ms-1"></i>
                                            </span>
                                        @endif

                                    </div>

                                </div>
                                @if($card->link_url)
                                    </a>
                                @endif
                            </div>
                        @endforeach

                    </div>
                @endif

            </div>
        </section>
    @endif
    <!-- =========================IN HOUSE PROJECTS SECTION========================= -->


    @if($howDeliverIntro || $howDeliverCards->isNotEmpty())
        <section class="how-we-deliver section-md">
            <div class="container-custom">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        @if($howDeliverIntro)
                            @if($howDeliverIntro->title)
                                <h2 class="h2-36 mb-3">
                                    {{ $howDeliverIntro->title }}
                                </h2>
                            @endif

                            @if($howDeliverIntro->description)
                                <div class="subhead">
                                    {{ $howDeliverIntro->description }}
                                </div>
                            @endif
                        @endif

                        @if($howDeliverCards->isNotEmpty())
                            <div class="how-we-deliver">

                                <div class="row g-4">

                                    @foreach($howDeliverCards as $card)
                                        <div class="col-md-4">
                                            <div class="value-card">
                                                @if($card->title)
                                                    <h3>
                                                        {{ $card->title }}
                                                    </h3>
                                                @endif
                                                @if($card->description)
                                                    <p class="mb-2">
                                                        {{ $card->description }}
                                                    </p>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        @endif
                    </div>
                </div>

            </div>
        </section>
    @endif


    @if($workIntro || $workCards->isNotEmpty())
        <section id="service-wrk" class="featured-work grey-bg-4 section-md">
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
                                    {{ $workIntro->description }}
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
                                <a href="{{ route('works.show', $card->slug) }}" class="button-link small-text mb-0">See More <i
                                        class="bi bi-arrow-right-short ms-1"></i></a>
                            </div>
                        </div>
                        @endforeach

                    </div>
                @endif
            </div>
        </section>
    @endif


    @if($ctaBanner)
        <section class="highlight section">

            <div class="container-custom-2">

                <div class="highlight-content">

                    @if($ctaBanner->title && $ctaBanner->description)
                        <h2 class="h2-30 lh-base">
                            {{ $ctaBanner->title }} {{ $ctaBanner->description }}
                        </h2>
                    @endif

                    @if($ctaBanner->button_text)
                        <a href="{{ $ctaBanner->button_url ?? '' }}"
                        class="commn-btn btn-white">

                            {{ $ctaBanner->button_text }}

                        </a>
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
                                                    aria-expanded="false"
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


    <!-- ============== Exit-intent popup ================ -->
    <div class="exit-intent-overlay" id="exitIntentOverlay">
        <div class="exit-intent-modal">

            <button class="exit-close" id="closeExitIntent">
                &times;
            </button>

            <h3>Not sure which service you need?</h3>

            <p>
                Get in touch and we'll help you find the right
                approach for your business.
            </p>



            <a href="{{ url('/contact') }}" id="intent-btn-black" class="intent-btn-black">
                Start a Conversation
            </a>

            <a href="https://wa.me/447983508359?text=Hi%20Eagle%20London,%20I'd%20like%20to%20schedule%20a%20call.%20Please%20let%20me%20know%20your%20available%20times."
                target="_blank" rel="noopener noreferrer" id="intent-btn-white" class="intent-btn-white">
                <svg data-loc="client/src/components/ExitIntentPopup.tsx:11" width="16" height="16"
                    viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="shrink-0 me-2">
                    <path data-loc="client/src/components/ExitIntentPopup.tsx:12"
                        d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z">
                    </path>
                </svg> Schedule a Call
            </a>

        </div>
    </div>
@endsection
