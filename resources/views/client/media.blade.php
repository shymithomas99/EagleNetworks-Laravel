@extends('layouts.app')
@section('content')
    <section class="section-hero service-bnr">

        <div class="container-custom">

            <div class="section-hero-sub">
                <div>
                    <div>
                        <h1>Eagle Media House</h1>
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

                <button class="filter-btn" data-filter="films">
                    Films
                </button>

                <button class="filter-btn" data-filter="tvads">
                    TV Ads
                </button>

                <button class="filter-btn" data-filter="documentaries">
                    Documentaries
                </button>

            </div>

            <!-- GRID -->
            <div class="row g-4 portfolio-grid">

                <!-- TV ADS -->
                <div class="col-lg-4 col-md-6 portfolio-item tvads" data-bs-toggle="modal" data-bs-target="#portfolioModal">
                    <div class="portfolio-card">
                        <div class="portfolio-image">
                            <img src="images/media-1.jpg" alt="">
                            <div class="play-btn">
                                <i class="bi bi-play-fill"></i>
                            </div>
                        </div>

                        <div class="portfolio-content">
                            <span class="portfolio-tag">TV ADS</span>
                            <h6>Time to Care – NHS Advert</h6>
                        </div>
                    </div>
                </div>

                <!-- TV ADS -->
                <div class="col-lg-4 col-md-6 portfolio-item tvads" data-bs-toggle="modal" data-bs-target="#portfolioModal">
                    <div class="portfolio-card">
                        <div class="portfolio-image">
                            <img src="images/media-2.jpg" alt="">
                            <div class="play-btn">
                                <i class="bi bi-play-fill"></i>
                            </div>
                        </div>

                        <div class="portfolio-content">
                            <span class="portfolio-tag">TV ADS</span>
                            <h6>Crosswater – TV Advert</h6>
                        </div>
                    </div>
                </div>

                <!-- FILMS -->
                <div class="col-lg-4 col-md-6 portfolio-item films" data-bs-toggle="modal" data-bs-target="#portfolioModal">
                    <div class="portfolio-card">
                        <div class="portfolio-image">
                            <img src="images/media-3.jpg" alt="">
                            <div class="play-btn">
                                <i class="bi bi-play-fill"></i>
                            </div>
                        </div>

                        <div class="portfolio-content">
                            <span class="portfolio-tag">FILMS</span>
                            <h6>There is Life in All Things – Film</h6>
                        </div>
                    </div>
                </div>

                <!-- TV ADS -->
                <div class="col-lg-4 col-md-6 portfolio-item tvads" data-bs-toggle="modal" data-bs-target="#portfolioModal">
                    <div class="portfolio-card">
                        <div class="portfolio-image">
                            <img src="images/media-4.jpg" alt="">
                            <div class="play-btn">
                                <i class="bi bi-play-fill"></i>
                            </div>
                        </div>

                        <div class="portfolio-content">
                            <span class="portfolio-tag">TV ADS</span>
                            <h6>Gift of Protection - NHS Advert</h6>
                        </div>
                    </div>
                </div>

                <!-- FILMS -->
                <div class="col-lg-4 col-md-6 portfolio-item films" data-bs-toggle="modal" data-bs-target="#portfolioModal">
                    <div class="portfolio-card">
                        <div class="portfolio-image">
                            <img src="images/media-5.jpg" alt="">
                            <div class="play-btn">
                                <i class="bi bi-play-fill"></i>
                            </div>
                        </div>

                        <div class="portfolio-content">
                            <span class="portfolio-tag">FILMS</span>
                            <h6>Blue Buttercream - Short Film</h6>
                        </div>
                    </div>
                </div>

                <!-- TV ADS -->
                <div class="col-lg-4 col-md-6 portfolio-item tvads" data-bs-toggle="modal" data-bs-target="#portfolioModal">
                    <div class="portfolio-card">
                        <div class="portfolio-image">
                            <img src="images/media-6.jpg" alt="">
                            <div class="play-btn">
                                <i class="bi bi-play-fill"></i>
                            </div>
                        </div>

                        <div class="portfolio-content">
                            <span class="portfolio-tag">TV ADS</span>
                            <h6>Paul Robinson Solicitors - West Ham TV Advert</h6>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <!-- Media Modal -->

        <div class="modal fade portfolio-modal" id="portfolioModal" tabindex="-1">
            <div class="modal-dialog modal-xl modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="video-container">

                            <!-- Close -->
                            <button type="button" class="modal-close" data-bs-dismiss="modal">
                                <i class="bi bi-x-lg"></i>
                            </button>

                            <!-- Video -->
                            <div class="video-wrapper">

                                <iframe title="vimeo-player" src="https://player.vimeo.com/video/879850541?h=6ff29af9af"
                                    width="640" height="360" frameborder="0"
                                    referrerpolicy="strict-origin-when-cross-origin"
                                    allow="autoplay; fullscreen; picture-in-picture; clipboard-write; encrypted-media; web-share"
                                    allowfullscreen></iframe>

                            </div>

                            <!-- Title -->
                            <h4 class="video-title">
                                Time to Care – NHS Advert
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <section class="media-about section text-white">
        <div class="container-custom">
            <h2>About Eagle Media House</h2>
            <p>Eagle Media House is the creative production arm of Eagle London, delivering high-quality films, television
                advertisements, commercials, documentaries, and branded content for organisations across the UK, Europe, and
                Africa.</p>

            <p>From concept development and scriptwriting through to production, post-production, and distribution strategy,
                our team brings creative vision and technical precision to every project. We work with startups, SMEs,
                public sector organisations, and global enterprises to produce content that resonates with audiences and
                drives measurable outcomes.</p>

            <p>Eagle Media House operates in close collaboration with the wider Eagle London network, combining creative
                production capabilities with strategic insight, digital expertise, and community knowledge to deliver
                content that is both authentic and effective.</p>

            <div class="d-flex flex-column flex-sm-row mb-3">
                <a href="/services" class="commn-btn btn-primary-custom me-0 me-sm-3 mb-3 mb-sm-0">Our Services</a>
                <a href="/our-work" class="commn-btn btn-white-outline me-0 me-sm-3 mb-3 mb-sm-0">View Our Work</a>
                <a href="/contact" class="commn-btn btn-white-outline">Start a Project</a>
            </div>
        </div>
    </section>
@endsection
