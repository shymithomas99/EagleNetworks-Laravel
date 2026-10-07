@extends('layouts.appweb')
@section('title', 'Our Work | ')
@push('meta')
    <meta
        name="description"
        content="A portfolio of projects across strategy, creative, and digital delivery from London and Accra to global markets."
    >
@endpush
@section('content')

    @if($banner || $workCategories->isNotEmpty())
        <section class="section-hero home-banner ">
            <div class="container-custom">

                <div class="section-hero-sub">
                    <div>
                        <div>
                            @if($banner?->label)
                                <div class="x-small-text text-orange fw-medium text-uppercase mb-4">
                                    {{ $banner->label }}
                                </div>
                            @endif
                            @if($banner?->title)
                                <h1>{{ $banner->title }}</h1>
                            @endif

                            @if($banner?->description)
                                <div class="subhead mb-5">
                                    {!! nl2br(e($banner->description)) !!}
                                </div>
                            @endif

                            @if($workCategories->isNotEmpty())
                                <div class="pill-group">
                                    @foreach($workCategories as $category)
                                        <span class="badge-custom badge-transperant-orange">
                                            {{ $category->name }}
                                        </span>
                                    @endforeach
                                </div>
                            @endif

                        </div>

                    </div>
                </div>
            </div>
        </section>
    @endif


    @if($processIntro || $processCards->isNotEmpty())
        <section class="work-deliver section">
            <div class="container-custom">
                @if($processIntro)
                    @if($processIntro->title)
                        <h2 class="element-2">
                            {{ $processIntro->title }}
                        </h2>
                    @endif

                    @if($processIntro->description)
                        <div class="subhead">
                            {!! nl2br(e($processIntro->description)) !!}
                        </div>
                    @endif
                @endif

                @if($processCards->isNotEmpty())
                    <div class="row g-4">
                        @foreach($processCards as $card)
                            <div class="col-md-6 col-lg-3">
                                <div class="value-card">
                                    <div class="x-small-text text-orange fw-bold text-uppercase mb-2">
                                        {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                                    </div>

                                    @if($card->title)
                                        <div class="fw-bold mb-2">
                                            {{ $card->title }}
                                        </div>
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
                @endif
            </div>
        </section>
    @endif


    @if($workIntro || $workCards->isNotEmpty())
        <section class="selected-work section">
            <div class="container-custom">
                @if($workIntro)
                    @if($workIntro->title)
                        <h2 class="element-2">
                            {{ $workIntro->title }}
                        </h2>
                    @endif

                    @if($workIntro->description)
                        <div class="subhead">
                            {!! nl2br(e($workIntro->description)) !!}
                        </div>
                    @endif
                @endif

                @if($workCards->isNotEmpty())
                    <div class="row mt-5 g-6">
                        @foreach($workCards as $card)
                            <div class="col-md-6">
                                <a href="{{ route('details', $card->slug) }}" class="card-type2 text-decoration-none">
                                    <div class="card-type2-img-container green-border-bottom">
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

                                    <div class="card-type2-content">
                                        <span class="tag">
                                            {{--  {{ $card->industry }}  --}}
                                            {{ $card->category->name ?? 'Uncategorized' }}
                                        </span>
                                        <h3>
                                            {{ $card->cover_title ?? $card->title }}
                                        </h3>
                                        <p>
                                            {{ $card->excerpt }}
                                        </p>
                                        <span class="button-link">
                                            See Case Study
                                            <i class="bi bi-arrow-right ms-2"></i>
                                        </span>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </section>
    @endif

    @if($projectIntro || $projectCards->isNotEmpty())
        <section class="work-in-house section">
            <div class="container-custom">
                @if($projectIntro)
                    <h2 class="element-2 text-white">{{ $projectIntro->title }}</h2>
                    @if($projectIntro->description)
                        <div class="subhead">
                            {!! nl2br(e($projectIntro->description)) !!}
                        </div>
                    @endif
                @endif

                @if($projectCards->isNotEmpty())
                    <div class="row mt-5 g-6">
                        @foreach($projectCards as $card)
                            <div class="col-md-4">
                                @if($card->link_url)
                                    <a href="{{ $card->link_url }}"
                                        class="card-type2 text-decoration-none"
                                        @if(parse_url($card->link_url, PHP_URL_HOST) !== parse_url(config('app.url'), PHP_URL_HOST))
                                            target="_blank"
                                            rel="noopener"
                                        @endif>
                                @endif

                                    @if($card->image)
                                        <div class="card-type2-img-container">
                                            <img
                                                src="{{ asset('backend_assets/work-page/' . $card->image) }}"
                                                alt="{{ $card->title }}"
                                            >
                                        </div>
                                    @endif

                                    <div class="card-type2-content">
                                        @if($card->label)
                                            <span class="tag">
                                                {{ $card->label }}
                                            </span>
                                        @endif

                                        @if($card->title)
                                            <h3>
                                                {{ $card->title }}
                                            </h3>
                                        @endif

                                        @if($card->description)
                                            <p>
                                                {!! nl2br(e($card->description)) !!}
                                            </p>
                                        @endif

                                        @if($card->link_text)
                                            <span class="button-link">
                                                {{ $card->link_text }}
                                                <i class="bi bi-arrow-right ms-2"></i>
                                            </span>
                                        @endif
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

    @if($videoIntro || $videoCards->isNotEmpty())
        <section class="work-media section">
            <div class="container-custom">
                @if($videoIntro)
                    @if($videoIntro->title)
                        <h2 class="element-2">
                            {{ $videoIntro->title }}
                        </h2>
                    @endif

                    @if($videoIntro->description)
                        <div class="subhead">
                            {!! nl2br(e($videoIntro->description)) !!}
                        </div>
                    @endif
                @endif

                @if($videoCards->isNotEmpty())
                    <div class="row g-4 portfolio-grid mt-4">

                        @foreach ($videoCards as $card)
                            <div class="col-lg-3 col-md-6">

                                <div class="portfolio-card" data-bs-toggle="modal" data-bs-target="#portfolioModal"
                                    data-title="{{ $card->title }}" data-video="{{ $card->video_url }}">

                                    <div class="portfolio-image">

                                        <img src="{{ asset($card->thumbnail_url) }}" alt="{{ $card->title }}">

                                        <div class="play-btn">
                                            <i class="bi bi-play-fill"></i>
                                        </div>

                                    </div>

                                    <div class="portfolio-content">

                                        <span class="portfolio-tag">
                                            {{ $card->category->name ?? '' }}
                                        </span>

                                        <h6>{{ $card->title }}</h6>

                                    </div>

                                </div>

                            </div>
                        @endforeach

                    </div>

                    <div class="d-flex flex-column align-items-center mt-5">

                        <a href="{{ url('/media') }}" class="commn-btn btn-primary-custom mb-3 mb-sm-0">
                            View All Productions
                            <i class="bi bi-arrow-right ms-2"></i>
                        </a>

                        <p class="count-note x-small-text fw-normal text-center mt-3">
                            <span>{{ $videoCount }}</span>
                            productions in total — films, TV ads & documentaries
                        </p>

                    </div>
                @endif

            </div>
        </section>
    @endif

    <!-- Modal -->
    <div class="modal fade portfolio-modal" id="portfolioModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-body">
                    <div class="video-container">

                        <button type="button" class="modal-close" data-bs-dismiss="modal">
                            <i class="bi bi-x-lg"></i>
                        </button>

                        <div class="video-wrapper">

                            {{--  <iframe id="portfolioVideo" src="" width="100%" height="600" frameborder="0"
                            allow="autoplay; fullscreen; picture-in-picture; clipboard-write; encrypted-media; web-share"
                            allowfullscreen>
                        </iframe>  --}}

                            <iframe title="vimeo-player" id="portfolioVideo" src="" width="640"
                                height="360" frameborder="0" referrerpolicy="strict-origin-when-cross-origin"
                                allow="autoplay; fullscreen; picture-in-picture; clipboard-write; encrypted-media; web-share"
                                allowfullscreen>
                            </iframe>

                        </div>

                        <h4 class="video-title mt-4" id="portfolioTitle"></h4>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const modal = document.getElementById('portfolioModal');
            const iframe = document.getElementById('portfolioVideo');
            const title = document.getElementById('portfolioTitle');

            modal.addEventListener('show.bs.modal', function(event) {

                const card = event.relatedTarget;

                let videoUrl = card.getAttribute('data-video');
                const videoTitle = card.getAttribute('data-title');

                if (!videoUrl) {
                    iframe.src = '';
                    title.innerText = '';
                    return;
                }

                // YouTube watch URL
                if (videoUrl.includes('youtube.com/watch?v=')) {
                    const videoId = new URL(videoUrl).searchParams.get('v');
                    videoUrl = 'https://www.youtube.com/embed/' + videoId;
                }

                // Short YouTube URL
                else if (videoUrl.includes('youtu.be/')) {
                    const videoId = videoUrl.split('youtu.be/')[1].split('?')[0];
                    videoUrl = 'https://www.youtube.com/embed/' + videoId;
                }

                // Vimeo URL
                else if (
                    videoUrl.includes('vimeo.com/') &&
                    !videoUrl.includes('player.vimeo.com/video/')
                ) {
                    const videoId = videoUrl.match(/vimeo\.com\/(\d+)/);

                    if (videoId) {
                        videoUrl = 'https://player.vimeo.com/video/' + videoId[1];
                    }
                }

                iframe.src = videoUrl;
                title.innerText = videoTitle;
            });

            modal.addEventListener('hidden.bs.modal', function() {

                iframe.src = '';
                title.innerText = '';

            });

        });
    </script>


    @if($ctaBannerBottom)
        <section class="ready-to section">
            <div class="container-custom">
                <div class="inner-cta-box text-center text-white position-relative z-1">
                    <h2 class="display-5 fw-bold mb-3">{{ $ctaBannerBottom->title }}</h2>
                    @if($ctaBannerBottom->description)
                        <div class="subhead mb-5">
                            {{ $ctaBannerBottom->description }}
                        </div>
                    @endif

                    @if($ctaBannerBottom->email || $ctaBannerBottom->website || $ctaBannerBottom->linkedin)
                        <div class="row g-4 justify-content-center mb-5">
                            @if($ctaBannerBottom->email)
                                <div class="col-md-4">
                                    <a href="mailto:{{ $ctaBannerBottom->email }}">
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


                            {{-- Website --}}
                            @if($ctaBannerBottom->website)
                                <div class="col-md-4">
                                    <a href="https://{{ $ctaBannerBottom->website }}"
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


                            {{-- LinkedIn --}}
                            @if($ctaBannerBottom->linkedin)
                                <div class="col-md-4">
                                    <a href="https://{{ $ctaBannerBottom->linkedin }}"
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
                    @endif
                    <!-- <div class="d-flex justify-content-center align-items-center gap-3 mb-5 flex-wrap">
                                                                                                    <a href="#" class="commn-btn loc-badge text-white"><span class="text-orange">eagle</span>london</a>
                                                                                                    <div class="loc-divider d-none d-md-block"></div>
                                                                                                    <a href="#" class="commn-btn loc-badge text-white"><span class="text-orange">eagle</span>accra</a>
                                                                                                </div> -->
            
                    @if($ctaBannerBottom->button_text)
                        <a href="{{ $ctaBannerBottom->button_url ?? '' }}" class="commn-btn btn-primary-custom mb-3 mb-sm-0">
                            {{ $ctaBannerBottom->button_text }} <i class="bi bi-arrow-right ms-2"></i>
                        </a>
                    @endif

                </div>
            </div>
        </section>
    @endif

@endsection
