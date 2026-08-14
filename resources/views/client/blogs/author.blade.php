@extends('layouts.appweb')
@section('content')
    <section class="section-hero home-banner authors-bnr-main">

        <div class="container-custom">

            <div class="section-hero-sub">
                <div>
                    <div class="authors-bnr">

                        <div class="custom-breadcrumb-wrapper">
                            <a href="/insights" class="breadcrumb-link small-text d-flex align-items-center mb-4"><i
                                    class="bi bi-arrow-left-short me-1 fs-5 "></i>Back to Insights</a>
                        </div>

                        <div class="d-flex align-items-center gap-24">

                            <div class="author-img">
                                <img src="images/CharlotteBioPicture_4a7fe3f8.jpg" alt="Charlotte Morcom">
                            </div>

                            <div>
                                <div class="x-small-text text-orange fw-medium text-uppercase mb-2">Author</div>
                                <h2 class="h2-36 mb-2">Charlotte Morcom</h2>
                                <div class="subhead mb-0">Sales and Marketing Executive</div>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>


    <div class="container-custom">
        <div class="authors-content-sec">
            <section class="author-section py-5">
                <div class="container">

                    <div class="row g-5">

                        <!-- About -->
                        <div class="col-lg-4">

                            <div class="autor-about-card">

                                <span class="autor-about-title">
                                    ABOUT
                                </span>

                                <p>
                                    Charlotte Morcom is a Sales and Marketing Executive at Eagle. With 3 years of experience
                                    in B2B marketing, she has practised and mastered many areas of marketing. Her skills
                                    include SEO, AEO, social media, content creation, research and data analysis. She has
                                    helped brands develop their social media, providing strategy advice and full-service
                                    communication plans, giving their platforms a distinctive look and voice.
                                </p>

                            </div>

                        </div>


                        <!-- Articles -->
                        <div class="col-lg-8">

                            <h2 class="article-heading">
                                Articles by Charlotte Morcom
                                <span>(1)</span>
                            </h2>

                            <a href="/insight-details" class="article-link text-decoration-none">

                                <div class="article-card">

                                    <div class="row g-3">

                                        <div class="col-auto">
                                            <img src="images/reframe-content-featured_74034203.jpg" class="article-img"
                                                alt="Article">
                                        </div>

                                        <div class="col">

                                            <div class="autor-category">

                                                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <path
                                                        d="M12.586 2.586A2 2 0 0 0 11.172 2H4a2 2 0 0 0-2 2v7.172a2 2 0 0 0 .586 1.414l8.704 8.704a2.426 2.426 0 0 0 3.42 0l6.58-6.58a2.426 2.426 0 0 0 0-3.42z">
                                                    </path>
                                                    <circle cx="7.5" cy="7.5" r=".5" fill="currentColor">
                                                    </circle>
                                                </svg>

                                                Content Strategy

                                            </div>

                                            <h3>
                                                Reframe content in a different light and produce new posts
                                            </h3>

                                            <p class="line-clamp-2">
                                                Are you really making the most of the content you're capturing? If you're
                                                low on budget, your best asset isn't money — it's the content you're not
                                                using.
                                            </p>

                                            <div class="autor-date">

                                                <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="lucide lucide-calendar"
                                                    data-loc="client/src/pages/AuthorProfile.tsx:211">
                                                    <path d="M8 2v4"></path>
                                                    <path d="M16 2v4"></path>
                                                    <rect width="18" height="18" x="3" y="4" rx="2"></rect>
                                                    <path d="M3 10h18"></path>
                                                </svg>

                                                6 Jul 2026

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </a>

                        </div>

                    </div>

                </div>
            </section>
        </div>
    </div>
@endsection
