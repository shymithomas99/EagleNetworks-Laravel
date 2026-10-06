@extends('layouts.appweb')
@section('title', 'About | ')
@push('meta')
    <meta
        name="description"
        content="A strategy, creative, and technology agency with offices in London and Accra. We help ambitious businesses grow by combining UK expertise with African market insight."
    >
@endpush
@section('content')

    @if($banner)
    <section class="section-hero about-banner">
        <div class="container-custom">
            <div class="section-hero-sub">
                <div>
                    <div>
                        <div class="header-label element-2">{{ $banner->label }}</div>
                        <h1>{{ $banner->title }}</h1>
                        @if($banner->description)
                            <div class="subhead mb-5">
                                {{ $banner->description }}
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

    @if($story)
    <section class="our-story  section-md">

        <div class=" container-custom d-flex flex-column">
            <div class="row mb-5">
                <div class="col-md-6">
                    <span class="tag">{{ $story->label }}</span>
                    <h2 class="element-3 mb-6 text-deeper-orange">{{ $story?->title }}</h2>

                </div>
                <div class="col-md-6">
                    @if($story->founded)
                        <div class="our-story-box">
                            FOUNDED <br>
                            {{ $story->founded }}
                        </div>
                    @endif
                </div>
            </div>

            <div class="row g-5">
                <div class="col-md-6">
                    @if($story->description)
                        @foreach(preg_split('/\r\n|\r|\n/', $story->description) as $paragraph)
                            @if(trim($paragraph))
                                <div class="subhead">
                                    {{ $paragraph }}
                                </div>
                            @endif
                        @endforeach
                    @endif
                </div>
                <div class="col-md-6">
                    @if($story->stat_value || $story->stat_title || $story->stat_description)
                    <div class="stat-card">
                        <div class="card-body p-0">
                            @if($story->stat_value)
                                <h4 class="text-deeper-orange">
                                    {{ $story->stat_value }}
                                </h4>
                            @endif

                            @if($story->stat_title)
                                <p class="fw-bold mb-3 text-dark">
                                    {{ $story->stat_title }}
                                </p>
                            @endif

                            @if($story->stat_description)
                                <p class="text-secondary mb-4">
                                    {{ $story->stat_description }}
                                </p>
                            @endif

                            @if($story->link_text)
                                <a href="{{ $story->link_url ? $story->link_url : '' }}"
                                   class="button-link small-text text-deeper-orange mb-0">
                                    {{ $story->link_text }}
                                    <i class="bi bi-arrow-right-short ms-1"></i>
                                </a>
                            @endif
                        </div>
                    </div>
                    @endif
                </div>
            </div>

        </div>
    </section>
    @endif

    @if($milestoneIntro || $milestones->isNotEmpty())
    <section class="key-milestones section">

        <div class="container-custom d-flex flex-column">
            <div class="row">
                <div class="col-md-12">
                    @if($milestoneIntro)
                        <span class="tag">
                            {{ $milestoneIntro->label }}
                        </span>

                        <h2 class="element-3 mb-6 text-white">
                            {{ $milestoneIntro->title }}
                        </h2>
                    @endif

                    <div class="row g-4 mt-4">
                        @foreach($milestones as $milestone)
                            <div class="col-sm-6 col-lg-3">
                                <div class="value-card">

                                    <h3 class="text-deeper-orange mb-2">
                                        {{ $milestone->title }}
                                    </h3>

                                    <p class="text-deeper-orange mb-0 fw-semibold">
                                        {{ $milestone->description }}
                                    </p>

                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

    @if($valueIntro || $values->isNotEmpty())
    <section class="about-values section">
        <div class="container-custom">
            @if($valueIntro)
                <span class="tag">
                    {{ $valueIntro->label }}
                </span>

                <h2 class="element-3 mb-6">
                    {{ $valueIntro->title }}
                </h2>

                @if($valueIntro->description)
                    <div class="subhead">
                        {{ $valueIntro->description }}
                    </div>
                @endif
            @endif

            @if($values->isNotEmpty())
            <div class="mt-5">
                <div class="row g-4 justify-content-center">
                    @foreach($values as $value)
                        <div class="col-sm-6 col-lg-4">
                            <div class="card-type2">
                                <div class="card-type2-content p-0">

                                    <h3>{{ $value->title }}</h3>

                                    <p>
                                        {{ $value->description }}
                                    </p>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </section>
    @endif

    @if($clientIntro || $clients->isNotEmpty())
    <section class="who-we-serve section">
        <div class="container-custom">
            @if($clientIntro)
                <span class="tag">
                    {{ $clientIntro->label }}
                </span>

                <h2 class="element-3 text-white mb-6">
                    {{ $clientIntro->title }}
                </h2>

                @if($clientIntro->description)
                    <div class="subhead text-white mb-5">
                        {{ $clientIntro->description }}
                    </div>
                @endif
            @endif

            @if($clients->isNotEmpty())
            <div class="row g-6 justify-content-center">

                @foreach($clients as $client)
                    <div class="col-lg-4">

                        <div class="inner-service-card align-items-start">

                            @if($client->label)
                                <span class="tag text-white deeper-orange-bg mb-3">
                                    {{ $client->label }}
                                </span>
                            @endif

                            <h3 class="mb-3">
                                {{ $client->title }}
                            </h3>

                            <p class="text-start">
                                {{ $client->description }}
                            </p>

                        </div>

                    </div>
                @endforeach
            </div>
            @endif
    </section>
    @endif

    @if($officeIntro || $offices->isNotEmpty())
    <section class="our-offices section">
        <div class="container-custom">
            @if($officeIntro)
                <span class="tag">
                    {{ $officeIntro->label }}
                </span>

                <h2 class="element-3 mb-6">
                    {{ $officeIntro->title }}
                </h2>

                @if($officeIntro->description)
                    <div class="subhead mb-5">
                        {{ $officeIntro->description }}
                    </div>
                @endif
            @endif

            @if($offices->isNotEmpty())
            <div class="row g-6">
                @foreach($offices as $office)
                    <div class="col-md-6">
                        <div class="inner-service-card bg-white">
                            @if($office->label)
                                <span class="tag">
                                    {{ $office->label }}
                                </span>
                            @endif
                            <h2 class="h2-30 fw-bold mb-3">
                                {{ $office->title }}
                            </h2>
                            <p class="mb-3">
                                {{ $office->description }}
                            </p>
                            @if($office->link_text)
                                <a href="{{ $office->link_url ?? '' }}"
                                class="button-link text-deeper-orange small-text mb-0">
                                    {{ $office->link_text }}
                                    <i class="bi bi-arrow-right-short ms-1"></i>
                                </a>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
            @endif
        </div>

    </section>
    @endif

    @if($processIntro || $processes->isNotEmpty())
    <section class="how-we-deliver section">
        <div class="container-custom">
            @if($processIntro)
                <span class="tag">
                    {{ $processIntro->label }}
                </span>

                <h2 class="element-3 mb-6">
                    {{ $processIntro->title }}
                </h2>

                @if($processIntro->description)
                    <div class="subhead mb-5">
                        {{ $processIntro->description }}
                    </div>
                @endif
            @endif

            @if($processes->isNotEmpty())
            <div class="row g-4">
                @foreach($processes as $index => $process)
                <div class="col-md-3">
                    <div class="deliver-card">
                        <div class="mini-head mb-2">
                            Step {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                        </div>
                        <h6 class="mb-3">{{ $process->title }}</h6>
                        <p class="small-text mb-0">{{ $process->description }}
                        </p>

                    </div>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </section>
    @endif

    @if($engagementIntro || $engagements->isNotEmpty())
    <section class="engagement section">
        <div class="container-custom">
            @if($engagementIntro)
                <span class="tag">{{ $engagementIntro->label }}</span>
                <h2 class="element-3 mb-6 text-white">{{ $engagementIntro->title }}</h2>
                @if($engagementIntro->description)
                    <div class="subhead text-white mb-5">
                        {{ $engagementIntro->description }}
                    </div>
                @endif
            @endif

            @if($engagements->isNotEmpty())
            <div class="row g-4">
                @foreach($engagements as $engagement)
                    <div class="col-md-3">
                        <div class="inner-service-card bg-white">
                            <h6 class="mb-2">
                                {{ $engagement->title }}
                            </h6>
                            <p class="small-text mb-0">
                                {{ $engagement->description }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
            @endif

        </div>
    </section>
    @endif

    @if($commitmentIntro || $commitments->isNotEmpty())
    <section class="about-commitment section">
        <div class="container-custom">
            @if($commitmentIntro)
                <span class="tag green-trans-bg green-text-2">
                    {{ $commitmentIntro->label }}
                </span>

                <h2 class="element-3 mb-6 text-white">
                    {{ $commitmentIntro->title }}
                </h2>

                @if($commitmentIntro->description)
                    <div class="subhead green-text-2 mb-5">
                        {{ $commitmentIntro->description }}
                    </div>
                @endif
            @endif

            @if($commitments->isNotEmpty())
                @foreach($commitments as $commitment)
                <div class="about-commitment-sub">
                    <h2 class="h2-30 text-white fw-bold">
                        {{ $commitment->title }}
                    </h2>

                    <div class="subhead green-text-2 mb-0">
                        {{ $commitment->description }}
                    </div>
                </div>
                @endforeach
            @endif
        </div>
    </section>
    @endif

    @if($proofSignalIntro || $proofSignals->isNotEmpty())
    <section class="why-work section">
        <div class="container-custom">
            @if($proofSignalIntro)
                <span class="tag">
                    {{ $proofSignalIntro->label }}
                </span>
                <h2 class="element-3 mb-6">
                    {{ $proofSignalIntro->title }}
                </h2>
                @if($proofSignalIntro->description)
                    <div class="subhead mb-5">
                        {{ $proofSignalIntro->description }}
                    </div>
                @endif
            @endif

            @if($proofSignals->isNotEmpty())
            <div class="row g-4">
                @foreach($proofSignals as $proofSignal)
                    <div class="col-md-4">
                        <div class="value-card">
                            <p class="mb-2 fw-bold p-head">
                                {{ $proofSignal->title }}
                            </p>
                            <p class="small-text mb-0">
                                {{ $proofSignal->description }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
            @endif
        </div>
    </section>
    @endif

    @if($ctaBannerBottom)
    <section class="ready-to london-accra-cta section-md  text-center">
        <div class="container-custom">

            <div class="inner-cta-box text-center text-white position-relative z-1">
                <span class="tag orange-bg text-white mb-4">
                    {{ $ctaBannerBottom->label }}
                </span>
                <h2 class="text-white">
                    {{ $ctaBannerBottom->title }}
                </h2>
                @if($ctaBannerBottom->description)
                    <p class="cta-subtext">
                        {{ $ctaBannerBottom->description }}
                    </p>
                @endif
                <div>
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

        </div>
    </section>
    @endif

@endsection
