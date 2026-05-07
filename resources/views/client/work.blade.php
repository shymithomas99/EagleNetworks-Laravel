<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Work</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background: #f5f5f5;
        }

        /* HERO */
        .hero {
            background: linear-gradient(135deg, #0f5132, #1e7c5b);
            color: #fff;
            padding: 80px 10%;
        }

        .hero h1 {
            font-size: 42px;
        }

        .hero p {
            max-width: 600px;
            margin-top: 10px;
        }

        .btn {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 22px;
            background: #ff5a1f;
            color: #fff;
            text-decoration: none;
            border-radius: 6px;
        }

        /* FILTER */
        .filter {
            padding: 30px 10%;
        }

        .filter span {
            margin-right: 10px;
            padding: 6px 14px;
            border-radius: 20px;
            background: #ddd;
            cursor: pointer;
        }

        .filter .active {
            background: #ff5a1f;
            color: #fff;
        }

        /* SECTION TITLE */
        .section {
            padding: 20px 10%;
        }

        .section h2 {
            margin-bottom: 10px;
        }

        /* GRID */
        .grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        /* CARD */
        .card {
            background: #fff;
            border-radius: 10px;
            padding: 15px;
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.08);
        }

        .card img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-radius: 6px;
            background: #ddd;
        }

        .tag {
            display: inline-block;
            margin-top: 10px;
            font-size: 12px;
            padding: 4px 10px;
            border-radius: 12px;
            background: #0f5132;
            color: #fff;
        }

        .card h3 {
            margin: 10px 0 5px;
        }

        .card a {
            color: #ff5a1f;
            text-decoration: none;
            font-size: 14px;
        }

        /* VIDEO SECTION */
        .video-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .video-card {
            background: #fff;
            padding: 10px;
            border-radius: 10px;
        }

        .video-thumb {
            height: 160px;
            background: #ccc;
            border-radius: 6px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .play {
            width: 40px;
            height: 40px;
            background: #fff;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* CTA */
        .cta {
            background: #f3e3d9;
            text-align: center;
            padding: 60px 20px;
        }

        .cta h2 {
            margin-bottom: 10px;
        }

        /* RESPONSIVE */
        @media(max-width: 992px) {

            .grid,
            .video-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media(max-width: 600px) {

            .grid,
            .video-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

    <!-- HERO -->
    <section class="hero">
        <h1>Our Work</h1>
        <p>A selection of projects delivered across strategy, creative, technology, and brand.</p>
        <a href="#" class="btn">Explore Our Services</a>
    </section>

    <!-- FILTER -->
    <div class="filter">
        <span class="active">All</span>
        <span>Strategy</span>
        <span>Creative</span>
        <span>Technology</span>
        <span>Brand</span>
        <span>Campaign</span>
    </div>

    <!-- CASE STUDIES -->
    <section class="section">
        <h2>Featured Projects & Case Studies</h2>

        <div class="grid">

            <!-- CARD -->
            <div class="card">
                <img src="" alt="">
                <span class="tag">Strategy</span>
                <h3>Tech Startup Growth</h3>
                <p>Growth strategy for early-stage startup.</p>
                <a href="#">View Project →</a>
            </div>

            <div class="card">
                <img src="" alt="">
                <span class="tag">Brand</span>
                <h3>Retail Brand Transformation</h3>
                <p>Complete rebranding for retail company.</p>
                <a href="#">View Project →</a>
            </div>

            <div class="card">
                <img src="" alt="">
                <span class="tag">Campaign</span>
                <h3>NGO Impact Campaign</h3>
                <p>Awareness campaign for NGO.</p>
                <a href="#">View Project →</a>
            </div>

            <div class="card">
                <img src="" alt="">
                <span class="tag">Technology</span>
                <h3>Government Platform</h3>
                <p>Digital platform for public services.</p>
                <a href="#">View Project →</a>
            </div>

            <div class="card">
                <img src="" alt="">
                <span class="tag">Technology</span>
                <h3>Fintech App</h3>
                <p>Mobile banking application.</p>
                <a href="#">View Project →</a>
            </div>

            <div class="card">
                <img src="" alt="">
                <span class="tag">Campaign</span>
                <h3>Tourism Marketing</h3>
                <p>Tourism growth campaign.</p>
                <a href="#">View Project →</a>
            </div>

        </div>
    </section>

    <!-- VIDEO SECTION -->


    <section class="section">
        <h2>Films, Commercials and Video Campaigns</h2>


        @foreach ($categories as $category)
            <h4>{{ $category->name }}</h4>

            <div class="video-grid">
                @foreach ($videos->where('category_id', $category->id) as $video)
                    <div class="video-card">
                        <div class="video-thumb">
                            {{-- Thumbnail (optional) --}}
                            @if ($video->thumbnail_url)
                                {{--  <img src="{{ asset('uploads/videos/' . $video->thumbnail) }}" alt="{{ $video->title }}">  --}}
                                <img src="{{ asset($video->thumbnail_url) }}" width="120" alt="{{ $video->title }}">
                            @endif

                            <div class="play">▶</div>
                        </div>

                        <h4>{{ $video->title }}</h4>

                        <span data-loc="client/src/components/VideoCard.tsx:33"
                            class="inline-block px-3 py-1 rounded-full text-xs font-semibold bg-slate-100 text-slate-700">Hosted
                            Video</span>
                    </div>
                @endforeach
            </div>
        @endforeach
    </section>

    <!-- CTA -->
    <section class="cta">
        <h2>Ready to Work With Us?</h2>
        <p>Let’s build something impactful together.</p>
        <a href="#" class="btn">Start a Conversation</a>
    </section>

</body>

</html>
