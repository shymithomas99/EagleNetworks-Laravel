@extends('layouts.appweb')
@section('title', $author->name . ' | ')
@push('meta')
    <meta
        name="description"
        content="{{ $author->about }}"
    >
@endpush
@section('content')
    <section class="section-hero home-banner authors-bnr-main">

        <div class="container-custom">

            <div class="section-hero-sub">
                <div>
                    <div class="authors-bnr">

                        <div class="custom-breadcrumb-wrapper">
                            <a href="{{ route('blogs.index') }}" class="breadcrumb-link small-text d-flex align-items-center mb-4"><i
                                    class="bi bi-arrow-left-short me-1 fs-5 "></i>Back to Insights</a>
                        </div>

                        <div class="d-flex align-items-center gap-24">

                            <div class="author-img">
                                @if ($author->image)
                                <img
                                    src="{{ asset('backend_assets/authors/' . $author->image) }}"
                                    alt="{{ $author->name }}"
                                >
                                @endif
                            </div>

                            <div>
                                <div class="x-small-text text-orange fw-medium text-uppercase mb-2">Author</div>
                                <h2 class="h2-36 mb-2">{{ $author->name }}</h2>
                                <div class="subhead mb-0">{{ $author->designation }}</div>
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
                                    {{ $author->about }}
                                </p>

                            </div>

                        </div>


                        <!-- Articles -->
                        <div class="col-lg-8">

                            <h2 class="article-heading">
                                Articles by {{ $author->name }}
                                <span>({{ $author->blogs->count() }})</span>
                            </h2>

                            @forelse ($author->blogs as $blog)
                            <a href="{{ route('blogs.show', $blog->slug) }}" class="article-link text-decoration-none">

                                <div class="article-card">

                                    <div class="row g-3">

                                        <div class="col-auto">
                                            <img
                                                src="{{ asset('backend_assets/images/' . $blog->coverImage) }}"
                                                class="article-img"
                                                alt="{{ $blog->title }}"
                                            >
                                        </div>

                                        <div class="col">
                                            @if ($blog->category)
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

                                                {{ $blog->category->name }}

                                            </div>
                                            @endif
                                            <h3>
                                                {{ $blog->title }}
                                            </h3>

                                            @if ($blog->excerpt)
                                            <p class="line-clamp-2">
                                                {{ $blog->excerpt }}
                                            </p>
                                            @endif

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

                                                {{ $blog->created_at->format('d M Y') }}

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </a>
                            @empty

                            <p>
                                No articles published by {{ $author->name }} yet.
                            </p>
                            @endforelse

                        </div>

                    </div>

                </div>
            </section>
        </div>
    </div>
@endsection
