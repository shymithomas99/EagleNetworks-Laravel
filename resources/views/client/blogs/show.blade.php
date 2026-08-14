@extends('layouts.appweb')
@section('content')
    <section class="section-hero insights-inner-banner ">


        <div class="container-custom">

            <div class="section-hero-sub ">
                <div>
                    <div class="insight-details-main">
                        <div class="custom-breadcrumb-wrapper">
                            <a href="{{ route('blog.index') }}" class="breadcrumb-link small-text d-flex align-items-center mb-4"><i
                                    class="bi bi-arrow-left-short me-1 fs-5 "></i>Back to Insights</a>
                        </div>

                        @if ($blog->category)
                        <div class="insight-detail-tag"><svg xmlns="http://www.w3.org/2000/svg" width="10" height="10"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-tag me-1"
                                data-loc="client/src/pages/Insights.tsx:284">
                                <path
                                    d="M12.586 2.586A2 2 0 0 0 11.172 2H4a2 2 0 0 0-2 2v7.172a2 2 0 0 0 .586 1.414l8.704 8.704a2.426 2.426 0 0 0 3.42 0l6.58-6.58a2.426 2.426 0 0 0 0-3.42z">
                                </path>
                                <circle cx="7.5" cy="7.5" r=".5" fill="currentColor"></circle>
                            </svg>{{ $blog->category->name }}
                        </div>

                        <h2>{{ $blog->title }}</h2>

                        @if ($blog->excerpt)
                            <div class="subhead mb-4">
                                {{ $blog->excerpt }}
                            </div>
                        @endif

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
                                </svg>{{ $blog->created_at->format('d F Y') }}
                            </div>
                            @if ($blog->author)
                            <div class="insight-inner-author">
                                By <span>{{ $blog->author->name }}</span>
                            </div>
                            @endif
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="details-insight">
        <div class="container-custom">
            <div class="insight-inner-content">
                @if ($blog->coverImage)
                <div class="insight-intro-img">
                    <img
                        src="{{ asset('backend_assets/images/' . $blog->coverImage) }}"
                        alt="{{ $blog->title }}"
                    >
                </div>
                @endif

                @if ($blog->body)
                    <div class="blog-body">
                        {!! $blog->body !!}
                    </div>
                @endif

                <!-- ============ share button========== -->

                <div class="share-wrapper">
                    <button class="share-btn" id="shareBtn">
                        Share <i class="bi bi-share-fill ms-2"></i>
                    </button>

                    <a
                        href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(url()->current()) }}"
                        target="_blank"
                        rel="noopener"
                        class="share-icon linkedin"
                    >
                        <i class="bi bi-linkedin"></i>
                    </a>


                    <a
                        href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}"
                        target="_blank"
                        rel="noopener"
                        class="share-icon twitter"
                    >
                        <i class="bi bi-twitter-x"></i>
                    </a>

                    <a
                        href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}"
                        target="_blank"
                        rel="noopener"
                        class="share-icon facebook"
                    >
                        <i class="bi bi-facebook"></i>
                    </a>
                </div>

                <!-- ============ author section ========== -->
                @if ($blog->author)
                <div class="author-card-separator">
                    <a href="{{ route('author.show', $blog->author) }}" class="author-card-link text-decoration-none">

                        <div class="author-card">

                            <span class="author-label">
                                Author Spotlight
                            </span>

                            <div class="row g-4 align-items-start">

                                <!-- Image -->
                                <div class="col-md-2 text-center">
                                    <div class="author-img">
                                        @if ($blog->author->image)
                                            <img
                                                src="{{ asset('backend_assets/images/authors/' . $blog->author->image) }}"
                                                alt="{{ $blog->author->name }}"
                                            >
                                        @endif
                                    </div>
                                </div>

                                <!-- Content -->
                                <div class="col-md-10">

                                    <h2 class="author-name mb-1">
                                        {{ $blog->author->name }}
                                    </h2>

                                    @if ($blog->author->designation)
                                        <div class="author-role mb-2">
                                            {{ $blog->author->designation }}
                                        </div>
                                    @endif

                                    @if ($blog->author->description)
                                        <p class="author-desc">
                                            {{ $blog->author->description }}
                                        </p>
                                    @endif

                                    <span class="author-link d-flex align-items-center">
                                        View full profile <i class="bi bi-arrow-right-short fs-6"></i>
                                    </span>

                                </div>

                            </div>

                        </div>
                    </a>
                </div>
                <div class="back-btn">
                    <a href="{{ route('blog.index') }}" class="button-link text-deeper-orange d-flex align-items-center mb-0"><i
                            class="bi bi-arrow-left-short me-1 mt-1"></i>Back to all Insights </a>
                </div>
            </div>
        </div>

    </section>
@endsection
