@extends('layouts.appweb')
@section('content')
    <section class="section-hero insights-inner-banner ">


        <div class="container-custom">

            <div class="section-hero-sub ">
                <div>
                    <div class="insight-details-main">
                        <div class="custom-breadcrumb-wrapper">
                            <a href="/insights" class="breadcrumb-link small-text d-flex align-items-center mb-4"><i
                                    class="bi bi-arrow-left-short me-1 fs-5 "></i>Back to Insights</a>
                        </div>

                        <div class="insight-detail-tag"><svg xmlns="http://www.w3.org/2000/svg" width="10" height="10"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-tag me-1"
                                data-loc="client/src/pages/Insights.tsx:284">
                                <path
                                    d="M12.586 2.586A2 2 0 0 0 11.172 2H4a2 2 0 0 0-2 2v7.172a2 2 0 0 0 .586 1.414l8.704 8.704a2.426 2.426 0 0 0 3.42 0l6.58-6.58a2.426 2.426 0 0 0 0-3.42z">
                                </path>
                                <circle cx="7.5" cy="7.5" r=".5" fill="currentColor"></circle>
                            </svg>Content Strategy</div>

                        <h2>Reframe content in a different light and produce new posts</h2>

                        <div class="subhead mb-4">
                            Are you really making the most of the content you're capturing? If you're low on budget, your
                            best asset isn't money — it's the content you're not using.
                        </div>

                        <div class="insight-inner-date-author">
                            <div class="insight-inner-date d-flex align-items-center me-3"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="lucide lucide-calendar me-1"
                                    data-loc="client/src/pages/BlogPost.tsx:156">
                                    <path d="M8 2v4"></path>
                                    <path d="M16 2v4"></path>
                                    <rect width="18" height="18" x="3" y="4" rx="2"></rect>
                                    <path d="M3 10h18"></path>
                                </svg>6 July 2026</div>

                            <div class="insight-inner-author">
                                By <span>Charlotte Morcom</span>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="details-insight">
        <div class="container-custom">
            <div class="insight-inner-content">
                <div class="insight-intro-img">
                    <img src="images/reframe-content-featured_74034203.jpg" alt="">
                </div>

                <p>Stop and think...are you really making the most of the content you're capturing?</p>

                <p>If you're low on budget, your best asset isn't money; it's the content you're not using.</p>

                <p>When you film content, A LOT of it will end up on the cutting room floor. You take 5 minutes of footage
                    for a video, and it gets cut down to 30 seconds.</p>

                <p>But these cutting floor clips present a golden opportunity … more content. And more content means more
                    posts, which means more reach, which leads to more exposure. You get the picture?</p>

                <p>This is an important concept in creating content: <b>A good idea should never only be one post</b> 🤯</p>

                <h3 class="mt-5 mb-4">Here are 3 ways you can repurpose unused footage you took of your best-selling product
                </h3>

                <div class="insight-fullsize-img mb-5">
                    <img src="images/reframe-content-featured_74034203.jpg" alt="" class="img-fluid">
                </div>

                <h4>1. Show off your expertise</h4>
                <p>Film yourself with your best seller and share your insights with your audience.</p>

                <h4>2. Provide industry insight</h4>
                <p>Share your everyday challenges. They might seem mundane, but for a customer, you're being vulnerable and
                    honest.</p>

                <h4>3. Be honest about making mistakes</h4>
                <p>Tell a story about a time you messed up. Sharing these mistakes will help to humanise your brand.</p>

                <h4>4. Reflect on your journey</h4>
                <p>Share the nerves you felt when you introduced this product. You had no idea then that it would become the
                    success it is today.</p>

                <!-- ============ share button========== -->

                <div class="share-wrapper">
                    <button class="share-btn" id="shareBtn">
                        Share <i class="bi bi-share-fill ms-2"></i>
                    </button>

                    <a href="https://www.linkedin.com/sharing/share-offsite/?url=https://emhdemo.com/eagle-network/insight-details"
                        target="_blank" rel="noopener" class="share-icon linkedin">
                        <i class="bi bi-linkedin"></i>
                    </a>

                    <a href="https://twitter.com/intent/tweet?url=https://emhdemo.com/eagle-network/insight-details"
                        target="_blank" rel="noopener" class="share-icon twitter">
                        <i class="bi bi-twitter-x"></i>
                    </a>

                    <a href="https://www.facebook.com/sharer/sharer.php?u=https://emhdemo.com/eagle-network/insight-details"
                        target="_blank" rel="noopener" class="share-icon facebook">
                        <i class="bi bi-facebook"></i>
                    </a>
                </div>

                <!-- ============ author section ========== -->

                <div class="author-card-separator">
                    <a href="/authors" class="author-card-link text-decoration-none">

                        <div class="author-card">

                            <span class="author-label">
                                Author Spotlight
                            </span>

                            <div class="row g-4 align-items-start">

                                <!-- Image -->
                                <div class="col-md-2 text-center">
                                    <div class="author-img">
                                        <img src="images/CharlotteBioPicture_4a7fe3f8.jpg" alt="Charlotte Morcom">
                                    </div>
                                </div>

                                <!-- Content -->
                                <div class="col-md-10">

                                    <h2 class="author-name mb-1">
                                        Charlotte Morcom
                                    </h2>

                                    <div class="author-role mb-2">
                                        Sales and Marketing Executive
                                    </div>

                                    <p class="author-desc">
                                        Charlotte Morcom is a Sales and Marketing Executive at Eagle. With 3 years of
                                        experience in B2B marketing, she has practised and mastered many areas of marketing.
                                        Her skills include SEO, AEO, social media, content creation, research and data
                                        analysis. She has helped brands develop their social media, providing strategy
                                        advice and full-service communication plans, giving their platforms a distinctive
                                        look and voice.
                                    </p>

                                    <span class="author-link d-flex align-items-center">
                                        View full profile <i class="bi bi-arrow-right-short fs-6"></i>
                                    </span>

                                </div>

                            </div>

                        </div>

                    </a>
                </div>
                <div class="back-btn">
                    <a href="/insights" class="button-link text-deeper-orange d-flex align-items-center mb-0"><i
                            class="bi bi-arrow-left-short me-1 mt-1"></i>Back to all Insights </a>
                </div>
            </div>
        </div>

    </section>
@endsection
