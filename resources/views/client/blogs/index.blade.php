@extends('layouts.appweb')
@section('title', 'Insights | ')
@push('meta')
    <meta
        name="description"
        content="Ideas, Perspectives & Market Intelligence"
    >
@endpush
@section('content')
    <section class="section-hero home-banner ">

        <div class="container-custom">

            <div class="section-hero-sub">
                <div>
                    <div>
                        <div class="x-small-text text-orange fw-medium text-uppercase mb-4">Insights</div>
                        <h1>Ideas, Perspectives & Market Intelligence</h1>
                        <div class="subhead mb-0">Thoughts on business, strategy, creative, and the markets we operate in —
                            from the Eagle London and Eagle Accra teams.</div>

                    </div>

                </div>
            </div>
        </div>
    </section>


    <section class="insights-main">

        <div class="insights-filter-main">

            <!-- MAIN TABS - ContentTypes-->
            <div class="container-custom ">

                <div class="main-tabs insights-filter">

                    @foreach ($contentTypes as $index => $contentType)
                    <button
                        class="main-tab-btn d-flex align-items-center
                            {{ $index === 0 ? 'active' : '' }}"
                        data-tab="{{ $contentType->value }}"
                    >
                        @if ($contentType === \App\Enums\BlogContentType::LINKEDIN)
                            <i class="bi bi-linkedin me-2"></i>
                        @elseif ($contentType === \App\Enums\BlogContentType::AUTHOR)
                            <i class="bi bi-person-circle me-2"></i>
                        @endif

                        {{ $contentType->label() }}
                    </button>
                    @endforeach

                </div>

            </div>

        </div>

        <!-- ========================= -->
        <!-- LINKEDIN POSTS -->
        <!-- ========================= -->
        @php
            $linkedinBlogs = $blogs->where(
                'content_type',
                \App\Enums\BlogContentType::LINKEDIN->value
            );
        @endphp

        <div
            class="main-tab-content active"
            id="{{ \App\Enums\BlogContentType::LINKEDIN->value }}"
        >

            <!-- SUB FILTERS -->
            <div class="insights-filter-main pt-0">
                <div class="container-custom insights-filter">
                    @if($linkedinBlogs->count())
                    <button
                        class="insights-filter-btn active"
                        data-filter="all">
                        All
                    </button>
                    @endif

                    @foreach ($categories as $category)
                        <button
                            class="insights-filter-btn"
                            data-filter="category-{{ $category->id }}">
                            {{ $category->name }}
                        </button>
                    @endforeach

                </div>
            </div>

            <div class="container-custom">

                <div class="row g-6 insights-grid section">

                    @forelse ($linkedinBlogs as $blog)
                    <div class="col-lg-4 col-md-6 insights-item category-{{ $blog->category->id ?? '' }}">
                        <a href="{{ $blog->url }}" target="_blank"
                            class="card-type2 text-decoration-none">
                            <div class="card-type2-img-container">
                                @if ($blog->coverImage)
                                    <img
                                        src="{{ asset('backend_assets/images/' . $blog->coverImage) }}"
                                        alt="{{ $blog->title }}"
                                    >
                                @endif
                                @if ($blog->category)
                                    <div class="insight-img-tag">
                                        {{ $blog->category->name }}
                                    </div>
                                @endif

                                <div class="linkedin-icon">
                                    <i class="bi bi-linkedin"></i>
                                </div>
                            </div>


                            <div class="card-type2-content">

                                <h3 class="line-clamp-2">
                                    {{ $blog->title }}
                                </h3>

                                <p class="line-clamp-3">
                                    {{ $blog->excerpt }}
                                </p>

                                <div class="d-flex justify-content-between">
                                    <div class="insight-date x-small-text fw-normal"><i class="bi bi-calendar2 me-1"></i>{{ $blog->created_at->format('d M Y') }}</div>
                                    <div class="read-on x-small-text fw-semibold text-orange">Read on LinkedIn <i
                                            class="bi bi-box-arrow-up-right ms-1"></i></div>
                                </div>
                            </div>
                        </a>
                    </div>
                    @empty

                    <div id="noItemsMessage" class="text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-linkedin mx-auto mb-3 text-[#f97316] opacity-40"
                            data-loc="client/src/pages/Insights.tsx:114">
                            <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path>
                            <rect width="4" height="12" x="2" y="9"></rect>
                            <circle cx="4" cy="4" r="2"></circle>
                        </svg>
                        <h6 class="mb-3">
                            No LinkedIn posts available.
                        </h6>
                        <p>Check back soon — we post regularly on LinkedIn.</p>
                    </div>
                    @endforelse

                    <div id="noItemsMessage" class="text-center d-none">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-linkedin mx-auto mb-3 text-[#f97316] opacity-40"
                            data-loc="client/src/pages/Insights.tsx:114">
                            <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path>
                            <rect width="4" height="12" x="2" y="9"></rect>
                            <circle cx="4" cy="4" r="2"></circle>
                        </svg>
                        <h6 class="mb-3">
                            No insights yet in this category.
                        </h6>
                        <p>Check back soon — we post regularly on LinkedIn.</p>
                    </div>


                </div>

            </div>

        </div>


        <!-- ========================= -->
        <!-- ARTICLES -->
        <!-- ========================= -->

        @php
            $articles = $blogs->where(
                'content_type',
                \App\Enums\BlogContentType::ARTICLE->value
            );
        @endphp
        <div class="main-tab-content d-none" id="{{ \App\Enums\BlogContentType::ARTICLE->value }}">

            <div class="container-custom">

                <div class="row g-6 my-4">

                    @forelse ($articles as $blog)
                    <div class="col-lg-4 col-md-6 insights-item ">
                        <a href="{{ route('blogs.show', $blog) }}" class="card-type2 text-decoration-none">
                            <div class="card-type2-img-container">
                                @if ($blog->coverImage)
                                    <img
                                        src="{{ asset('backend_assets/images/' . $blog->coverImage) }}"
                                        alt="{{ $blog->title }}"
                                    >
                                @endif

                                @if ($blog->category)
                                    <div class="insight-img-tag">
                                        {{ $blog->category->name }}
                                    </div>
                                @endif
                            </div>


                            <div class="card-type2-content">

                                <h3 class="line-clamp-2">
                                    {{ $blog->title }}
                                </h3>

                                <p class="line-clamp-3">
                                    {{ $blog->excerpt }}
                                </p>

                                <div class="d-flex justify-content-between">
                                    <div class="insight-date x-small-text fw-normal"><i
                                            class="bi bi-calendar2 me-1"></i>{{ $blog->created_at->format('d M Y') }}</div>
                                    <div class="read-on x-small-text fw-semibold text-orange d-flex align-items-center">
                                        Read article <i class="bi bi-arrow-right-short fs-6"></i></div>
                                </div>
                            </div>
                        </a>
                    </div>
                    @empty

                        <div class="text-center py-5">
                            <h6>No articles available.</h6>
                        </div>
                    @endforelse

                </div>

            </div>

        </div>


        <!-- ========================= -->
        <!-- AUTHOR SPOTLIGHTS -->
        <!-- ========================= -->
        @php
            $authorBlogs = $blogs->where(
                'content_type',
                \App\Enums\BlogContentType::AUTHOR->value
            );
        @endphp
        <div class="main-tab-content d-none" id="{{ \App\Enums\BlogContentType::AUTHOR->value }}">

            <div class="container-custom">

                <div class="row g-6 my-4">
                    @forelse ($authorBlogs as $blog)
                    <div class="col-lg-4 col-md-6 insights-item ">
                        <a href="{{ route('blogs.show', $blog) }}" class="card-type2 text-decoration-none">
                            <div class="card-type2-img-container">
                                @if ($blog->coverImage)
                                    <img
                                        src="{{ asset('backend_assets/images/' . $blog->coverImage) }}"
                                        alt="{{ $blog->title }}"
                                    >
                                @endif
                                 @if ($blog->category)
                                    <div class="insight-img-tag">
                                        {{ $blog->category->name }}
                                    </div>
                                @endif

                                @if ($blog->author)
                                    <div class="author-card-name">

                                        <i class="bi bi-person-circle"></i>

                                        {{ $blog->author->name }}

                                    </div>
                                @endif
                            </div>

                            <div class="card-type2-content">

                                <h3 class="line-clamp-2">
                                    {{ $blog->title }}
                                </h3>

                                <p class="line-clamp-3">
                                    {{ $blog->excerpt }}
                                </p>

                                <div class="d-flex justify-content-between">
                                    <div class="insight-date x-small-text fw-normal"><i
                                            class="bi bi-calendar2 me-1"></i>{{ $blog->created_at->format('d M Y') }}</div>
                                    <div class="read-on x-small-text fw-semibold text-orange d-flex align-items-center">
                                        Read article <i class="bi bi-arrow-right-short fs-6"></i></div>
                                </div>
                            </div>
                        </a>
                    </div>
                    @empty

                        <div class="text-center py-5">
                            <h6>No author spotlights available.</h6>
                        </div>
                    @endforelse


                </div>

            </div>

        </div>

    </section>


    <section class="ready-to section">
        <div class="container-custom">
            <div class="inner-cta-box text-center text-white position-relative z-1">
                <a href="https://www.linkedin.com/company/eagle-london-agency">
                    <div class="getin-linkedin-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-linkedin mb-3"
                            data-loc="client/src/pages/Insights.tsx:207" style="color: rgb(249, 115, 22);">
                            <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path>
                            <rect width="4" height="12" x="2" y="9"></rect>
                            <circle cx="4" cy="4" r="2"></circle>
                        </svg>
                    </div>
                </a>
                <h2 class="h2-30 display-5 fw-bold mb-3">Follow Eagle on LinkedIn</h2>
                <div class="subhead mb-5">Stay up to date with our latest thinking on strategy, creative, and market
                    intelligence.</div>


                <a href="https://www.linkedin.com/company/eagle-london-agency"
                    class="commn-btn btn-primary-custom mb-3 mb-sm-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-linkedin me-2"
                        data-loc="client/src/pages/Insights.tsx:220">
                        <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path>
                        <rect width="4" height="12" x="2" y="9"></rect>
                        <circle cx="4" cy="4" r="2"></circle>
                    </svg> Follow Eagle London <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                        viewBox="0 0 24 24" fill="none" class="ms-2" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-external-link"
                        data-loc="client/src/pages/Insights.tsx:222">
                        <path d="M15 3h6v6"></path>
                        <path d="M10 14 21 3"></path>
                        <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path>
                    </svg>
                </a>

            </div>
        </div>
    </section>

    <!-- ============== Exit-intent popup ================ -->

    <div class="exit-intent-overlay" id="exitIntentOverlay">
        <div class="exit-intent-modal">

            <button class="exit-close" id="closeExitIntent">
                &times;
            </button>

            <h3>Before you go</h3>

            <p>
                Subscribe to receive insights, updates and growth strategies.
            </p>

            <a href="#newsletter" class="intent-btn-black" id="intent-btn-black">
                Subscribe
            </a>


        </div>
    </div>
@endsection
