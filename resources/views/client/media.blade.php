@extends('layouts.appweb')
@section('content')
    <section class="section-hero service-bnr">

        <div class="container-custom">

            <div class="section-hero-sub">
                <div>
                    <div>
                        <h1 class="element-2">Eagle Media House</h1>
                        <div class="subhead">A curated selection of films, TV ads, commercials and media projects produced
                            across the agency..</div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="portfolio-section section">
        <div class="container-custom">
            <!-- FILTERS -->
            <div class="portfolio-filter mb-5">

                <button class="filter-btn active" data-filter="all">
                    All
                </button>

                @foreach ($categories as $category)
                    <button class="filter-btn" data-filter="{{ Str::slug($category->name) }}">
                        {{ $category->name }}
                    </button>
                @endforeach

            </div>

            <!-- GRID -->
            <div class="row g-4 portfolio-grid">
                @foreach ($videos as $video)
                    <div class="col-lg-4 col-md-6 portfolio-item {{ Str::slug($video->category->name) }}"
                        data-video="{{ $video->video_url }}" data-title="{{ $video->title }}">

                        <div class="portfolio-card">
                            <div class="portfolio-image">
                                <img src="{{ asset($video->thumbnail_url) }}" alt="{{ $video->title }}">
                                <div class="play-btn">
                                    <i class="bi bi-play-fill"></i>
                                </div>
                            </div>

                            <div class="portfolio-content">
                                <span class="portfolio-tag">
                                    {{ $video->category->name }}
                                </span>

                                <h6>{{ $video->title }}</h6>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Media Modal -->
        <div class="modal fade portfolio-modal" id="portfolioModal" tabindex="-1">
            <div class="modal-dialog modal-xl modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">

                        <div class="video-container">

                            <button type="button" class="modal-close" data-bs-dismiss="modal">
                                <i class="bi bi-x-lg"></i>
                            </button>

                            <div class="video-wrapper">
                                {{--  <iframe id="portfolioVideo" width="100%" height="600" frameborder="0"
                                    allow="autoplay; fullscreen; picture-in-picture; clipboard-write; encrypted-media; web-share"
                                    allowfullscreen src="">
                                </iframe>  --}}


                                <iframe title="vimeo-player" id="portfolioVideo" src="" width="640"
                                    height="360" frameborder="0" referrerpolicy="strict-origin-when-cross-origin"
                                    allow="autoplay; fullscreen; picture-in-picture; clipboard-write; encrypted-media; web-share"
                                    allowfullscreen>
                                </iframe>
                            </div>

                            <h4 class="video-title" id="portfolioTitle"></h4>


                        </div>

                    </div>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {

                const items = document.querySelectorAll('.portfolio-item');
                const iframe = document.getElementById('portfolioVideo');
                const title = document.getElementById('portfolioTitle');

                items.forEach(item => {

                    item.addEventListener('click', function() {

                        let videoUrl = this.dataset.video;

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
                            const videoId = videoUrl.split('vimeo.com/')[1].split('?')[0];
                            videoUrl = 'https://player.vimeo.com/video/' + videoId;
                        }

                        iframe.src = videoUrl;
                        title.innerText = this.dataset.title;

                        new bootstrap.Modal(
                            document.getElementById('portfolioModal')
                        ).show();
                    });

                });

                // Stop video when modal closes
                document.getElementById('portfolioModal')
                    .addEventListener('hidden.bs.modal', function() {
                        iframe.src = '';
                    });

            });
        </script>
    </section>

    <section class="media-about section text-white text-center d-flex justify-content-center">
        <div class="container-custom ">
            <div class="max-768 max-768 d-flex flex-column align-items-center">
                <h2>About Eagle Media House</h2>
                <p>Eagle Media House is the creative production arm of Eagle London, delivering high-quality films,
                    television advertisements, commercials, documentaries, and branded content for organisations across the
                    UK, Europe, and Africa.</p>

                <p>From concept development and scriptwriting through to production, post-production, and distribution
                    strategy, our team brings creative vision and technical precision to every project. We work with
                    startups, SMEs, public sector organisations, and global enterprises to produce content that resonates
                    with audiences and drives measurable outcomes.</p>

                <p>Eagle Media House operates in close collaboration with the wider Eagle London network, combining creative
                    production capabilities with strategic insight, digital expertise, and community knowledge to deliver
                    content that is both authentic and effective.</p>

                <div class="d-flex flex-column flex-sm-row mt-4 pt-2">
                    <a href="/services" class="commn-btn  btn-primary-custom me-0 me-sm-3 mb-3 mb-sm-0">Our Services</a>
                    <a href="/work" class="commn-btn btn-white-outline me-0 me-sm-3 mb-3 mb-sm-0">View Our Work</a>
                    <a href="/contact" class="commn-btn btn-white-outline">Start a Project</a>
                </div>
            </div>
        </div>
    </section>
@endsection
