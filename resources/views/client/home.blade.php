@extends('layouts.appweb')

@section('content')
    <!-- ========================= COOKIES BAR ========================= -->

    <div class="cookie-bar" id="cookieBar">
        <div class="container-custom-2">

            <div class="cookie-content">

                <p class="cookie-text">
                    <strong>We use cookies</strong> to understand how visitors use our site and to improve your
                    experience.
                    Essential cookies are always active. Analytics cookies are only loaded with your consent.
                    <a href="/privacy-policy">Privacy Policy</a>
                </p>

                <div class="cookie-actions">

                    <button class="cookie-btn cookie-outline" id="rejectBarBtn">
                        Reject Non-Essential
                    </button>

                    <button class="cookie-btn cookie-outline" id="openCookieModal">
                        Manage Preferences
                    </button>

                    <button class="cookie-btn cookie-fill" id="acceptBarBtn">
                        Accept All
                    </button>

                    <button class="cookie-close" id="closeCookie">
                        <i class="bi bi-x-lg"></i>
                    </button>


                </div>

            </div>

        </div>
    </div>




    <!-- =================homepage content starts here======================== -->

    <section class="section-hero home-banner">


        <div class="container-custom-3">

            <div class="section-hero-sub">
                <div>
                    <div>
                        <h1 class="element-2">Growth Through Authentic Connection : Strategy, Creative & Digital
                            Solutions</h1>
                        <div class="subhead">Eagle is a Black-owned, full-service marketing and creative agency based in
                            London and Accra, specialising in branding, web and software solutions, and TV and digital
                            campaigns for SMEs and non-profits. With 20+ years of experience, we help purpose-driven
                            organisations grow locally and globally.</div>

                        <div class="small-text">
                            Operating from London and Accra as one integrated team
                        </div>
                        <a href="contact" class="commn-btn btn-primary-custom me-2 mb-3 mb-sm-0">Start a
                            Conversation<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right ms-2"
                                data-loc="client/src/pages/Home.tsx:47">
                                <path d="M5 12h14"></path>
                                <path d="m12 5 7 7-7 7"></path>
                            </svg> </a>
                        <a href="services#service-wrk" class="commn-btn btn-primary-custom">View Our Work</a>
                    </div>

                </div>
            </div>
        </div>
    </section>






    <section class="our-services section-lg ">
        <div class="container-custom d-flex flex-column ">
            <h2 class="element-2">Our Services</h2>
            <div class="subhead">
                Five integrated services designed to work together for maximum impact. We provide strategy,
                creative production, marketing, customer support, and media solutions that drive measurable
                results. Each service is built on our core methodology and delivered through our integrated team
                structure.
            </div>
            <div class="subhead">Our services span creative production, marketing strategy, technology solutions and
                customer engagement.</div>

        </div>

        <div class="container-custom cmn-sec-padding">

            <div class="row g-4 g-xl-5 justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="service-card position-relative">
                        <div class="icon-box">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-lightbulb">
                                <path
                                    d="M15 14c.2-1 .7-1.7 1.5-2.5 1-.9 1.5-2.2 1.5-3.5A6 6 0 0 0 6 8c0 1 .2 2.2 1.5 3.5.7.7 1.3 1.5 1.5 2.5">
                                </path>
                                <path d="M9 18h6"></path>
                                <path d="M10 22h4"></path>
                            </svg>
                        </div>
                        <h3>Strategy & Consulting</h3>
                        <p>Turn uncertainty into a clear, executable growth plan.</p>



                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="service-card">
                        <div class="icon-box">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-rocket w-8 h-8"
                                data-loc="client/src/pages/Home.tsx:76">
                                <path
                                    d="M4.5 16.5c-1.5 1.26-2 5-2 5s3.74-.5 5-2c.71-.84.7-2.13-.09-2.91a2.18 2.18 0 0 0-2.91-.09z">
                                </path>
                                <path
                                    d="m12 15-3-3a22 22 0 0 1 2-3.95A12.88 12.88 0 0 1 22 2c0 2.72-.78 7.5-6 11a22.35 22.35 0 0 1-4 2z">
                                </path>
                                <path d="M9 12H4s.55-3.03 2-4c1.62-1.08 5 0 5 0"></path>
                                <path d="M12 15v5s3.03-.55 4-2c1.08-1.62 0-5 0-5"></path>
                            </svg>
                        </div>
                        <h3>Marketing & Communications</h3>
                        <p>Build visibility, relevance, and demand in the right places.</p>

                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="service-card">
                        <div class="icon-box">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-palette w-8 h-8"
                                data-loc="client/src/pages/Home.tsx:76">
                                <circle cx="13.5" cy="6.5" r=".5" fill="currentColor"></circle>
                                <circle cx="17.5" cy="10.5" r=".5" fill="currentColor"></circle>
                                <circle cx="8.5" cy="7.5" r=".5" fill="currentColor"></circle>
                                <circle cx="6.5" cy="12.5" r=".5" fill="currentColor"></circle>
                                <path
                                    d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10c.926 0 1.648-.746 1.648-1.688 0-.437-.18-.835-.437-1.125-.29-.289-.438-.652-.438-1.125a1.64 1.64 0 0 1 1.668-1.668h1.996c3.051 0 5.555-2.503 5.555-5.554C21.965 6.012 17.461 2 12 2z">
                                </path>
                            </svg>
                        </div>
                        <h3>Creative Production</h3>
                        <p>Create content that reflects the quality of your brand.</p>

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="service-card">
                        <div class="icon-box">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-users w-8 h-8"
                                data-loc="client/src/pages/Home.tsx:95">
                                <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg>
                        </div>
                        <h3>Customer Support Services</h3>
                        <p>Deliver a customer experience that builds loyalty.</p>

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="service-card">
                        <div class="icon-box">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-zap w-8 h-8"
                                data-loc="client/src/pages/Home.tsx:95">
                                <path
                                    d="M4 14a1 1 0 0 1-.78-1.63l9.9-10.2a.5.5 0 0 1 .86.46l-1.92 6.02A1 1 0 0 0 13 10h7a1 1 0 0 1 .78 1.63l-9.9 10.2a.5.5 0 0 1-.86-.46l1.92-6.02A1 1 0 0 0 11 14z">
                                </path>
                            </svg>
                        </div>
                        <h3>Media & Insights</h3>
                        <p>Reach your audience beyond digital channels.</p>

                    </div>
                </div>

            </div>

            <div class="mt-5"><a href="services" class="commn-btn btn-primary-custom me-2 mb-3 mb-sm-0">View
                    Services<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-arrow-right ms-2"
                        data-loc="client/src/pages/Home.tsx:47">
                        <path d="M5 12h14"></path>
                        <path d="m12 5 7 7-7 7"></path>
                    </svg> </a></div>



        </div>
    </section>

    <section class="the-5c section-md">
        <div class="container-custom">
            <h5>THE 5 C'S</h5>
            <p class="subhead">Our approach is built on five core principles that guide every project and
                partnership. These principles ensure consistency, quality, and impact across all our work. Community,
                Communication, Creativity, Client Success, and Cutting-Edge thinking form the foundation of our
                methodology.</p>


            <div class="row row-cols-2 row-cols-sm-3 row-cols-lg-5 g-4 px-lg-5 justify-content-center ">

                <div class="col text-center">
                    <div class="value-item">
                        <div class="the5c-img-container">
                            <img src="images/community.png" alt="">
                        </div>
                        <p class="x-small-text mb-0 mt-4">COMMUNITY</p>
                    </div>
                </div>

                <div class="col text-center">
                    <div class="value-item">
                        <div class="the5c-img-container">
                            <img src="images/communication.png" alt="">
                        </div>
                        <p class="x-small-text mb-0 mt-4">COMMUNICATION</p>
                    </div>
                </div>

                <div class="col text-center">
                    <div class="value-item">
                        <div class="the5c-img-container">
                            <img src="images/creativity.png" alt="">
                        </div>
                        <p class="x-small-text mb-0 mt-4">CREATIVITY</p>
                    </div>
                </div>

                <div class="col text-center">
                    <div class="value-item">
                        <div class="the5c-img-container">
                            <img src="images/client.png" alt="">
                        </div>
                        <p class="x-small-text mb-0 mt-4">CLIENT SUCCESS</p>
                    </div>
                </div>

                <div class="col text-center">
                    <div class="value-item">
                        <div class="the5c-img-container">
                            <img src="images/cuttingedge.png" alt="">
                        </div>
                        <p class="x-small-text mb-0 mt-4">CUTTING-EDGE</p>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <section id="FeaturedWork-Section" class="featured-work section-md">
        <div class="container-custom d-flex flex-column">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="element-2">Featured Work</h2>
                    <div class="subhead mb-0">
                        See how we've helped brands grow. Our portfolio showcases diverse projects across industries and
                        markets, demonstrating our ability to deliver strategic and creative excellence. Each case study
                        represents real results and measurable impact.
                    </div>
                </div>
            </div>

            <div class="row cmn-sec-padding g-5">
                <div class="col-md-6">
                    <div class="work-card">
                        <div class="work-img-container">
                            <img src="images/fw-nhs_80505d74.webp" alt="Digital Transformation" class="img-fluid">
                        </div>
                        <h3>NHS Digital & Outdoor Campaign</h3>
                        <p>NHS Digital & Outdoor Campaign</p>
                        <a href="/details" class="button-link small-text mb-0">See More <i
                                class="bi bi-arrow-right-short ms-1"></i></a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="work-card">
                        <div class="work-img-container">
                            <img src="images/fw-kings-new-opt_7b43530d.webp" alt="Digital Transformation"
                                class="img-fluid">
                        </div>
                        <h3>Kings College London Chronic Kidney Disease Project</h3>
                        <p>Kings College London Chronic Kidney Disease Project</p>
                        <a href="/details" class="button-link small-text mb-0">See More <i
                                class="bi bi-arrow-right-short ms-1"></i></a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="work-card">
                        <div class="work-img-container">
                            <img src="images/fw-paul_383eac7e.webp" alt="Digital Transformation" class="img-fluid">
                        </div>
                        <h3>Paul Robinson West Ham TV Ad</h3>
                        <p>Paul Robinson West Ham TV Ad</p>
                        <a href="/details" class="button-link small-text mb-0">See More <i
                                class="bi bi-arrow-right-short ms-1"></i></a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="work-card">
                        <div class="work-img-container">
                            <img src="images/fw-toyota_f592b5d6.webp" alt="Digital Transformation" class="img-fluid">
                        </div>
                        <h3>Toyota Ghana</h3>
                        <p>Toyota Ghana</p>
                        <a href="/details" class="button-link small-text mb-0">See More <i
                                class="bi bi-arrow-right-short ms-1"></i></a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="client-section section-md">
        <div class="container-custom text-center ">
            <div class="row justify-content-center mb-5">
                <div class="col-12">
                    <h5>COMPANIES WE WORK WITH</h5>
                    <div class="subhead">
                        We've partnered with ambitious brands and organizations across industries and markets. Our
                        clients range from startups to enterprises, all united by their commitment to growth and
                        innovation. These partnerships demonstrate our ability to deliver value across diverse sectors
                        and geographies.
                    </div>
                </div>
            </div>

            <div class="row row-cols-2 row-cols-md-4 g-5 align-items-center">
                <div class="col">
                    <div class="client-logo-wrapper">
                        <img src="images/toyota_f3e42ae7.png" alt="Toyota" class="img-fluid client-logo">
                        <span class="client-name">Toyota</span>
                    </div>
                </div>
                <div class="col">
                    <div class="client-logo-wrapper">
                        <img src="images/acca.png" alt="ACCA" class="img-fluid client-logo">
                        <span class="client-name">ACCA</span>
                    </div>
                </div>
                <div class="col">
                    <div class="client-logo-wrapper">
                        <img src="images/kaleidoscope.jpg" alt="Kaleidoscope" class="img-fluid client-logo">
                        <span class="client-name">Kaleidoscope</span>
                    </div>
                </div>
                <div class="col">
                    <div class="client-logo-wrapper">
                        <img src="images/dentsu.png" alt="Dentsu" class="img-fluid client-logo">
                        <span class="client-name">Dentsu</span>
                    </div>
                </div>
                <div class="col">
                    <div class="client-logo-wrapper">
                        <img src="images/moneygram.png" alt="MoneyGram" class="img-fluid client-logo">
                        <span class="client-name">MoneyGram</span>
                    </div>
                </div>
                <div class="col">
                    <div class="client-logo-wrapper">
                        <img src="images/kings-college-london.png" alt="King's College London"
                            class="img-fluid client-logo">
                        <span class="client-name">King's College London</span>
                    </div>
                </div>
                <div class="col">
                    <div class="client-logo-wrapper">
                        <img src="images/meta_441ed05a.png" alt="Meta" class="img-fluid client-logo">
                        <span class="client-name">Meta</span>
                    </div>
                </div>
                <div class="col">
                    <div class="client-logo-wrapper">
                        <img src="images/nhs.jpg" alt="NHS" class="img-fluid client-logo">
                        <span class="client-name">NHS</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="two-strategic section-md pb-2">
        <div class=" container-custom d-flex flex-column">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="element-2 text-white">Two Strategic Hubs. One Integrated Team.</h2>
                    <div class="subhead mb-2 text-white-v2">
                        Operating from London and Accra, we bridge UK and African markets through integrated operations.
                        Our dual-hub model provides clients with seamless access to strategic expertise, creative
                        talent, and market knowledge across both regions. This unique positioning allows us to serve
                        clients with truly global perspective and local execution.
                    </div>
                </div>

                <p class="subhead text-center sec-padding-2 text-white mb-4">Two locations. One integrated team.</p>
            </div>

            <div class="location-section ">

                <div class="row g-5 justify-content-center">

                    <div class="col-md-6">
                        <div class="location-card london-card">
                            <p class="x-small-text text-uppercase grey-color-v2 mb-2 d-block">Based in the UK</p>
                            <h2 class="location-title text-deeper-orange mb-2">eagle<span>london</span></h2>
                            <p class="small-text mb-3">London based team serving clients across the UK and Europe
                            </p>

                            <div class="pill-group mb-4">
                                <span class="badge-custom badge-bg-lite text-deeper-orange fw-semibold">London</span>
                                <span class="badge-custom bg-grey-lite fw-semibold">UK & Europe</span>
                                <span class="badge-custom bg-grey-lite fw-semibold">One Integrated Team</span>
                            </div>

                            <p class="mb-4">UK core and Africa bridge. Our London office drives strategic vision and
                                creative excellence for UK and European clients while serving as the gateway for
                                brands expanding into African markets.</p>

                            <a href="/london" class="btn-outline-custom btn-london me-2 mb-2 mb-xl-0">Our London
                                Office</a>
                            <a href="/contact" class="btn-outline-custom btn-london">Work With London Team</a>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="location-card accra-card">
                            <p class="x-small-text text-uppercase grey-color-v2 mb-2 d-block">Based in Ghana</p>
                            <h2 class="location-title text-deeper-orange mb-2">eagle<span>accra</span></h2>
                            <p class="small-text mb-3">Accra based team serving clients across Ghana and Africa</p>

                            <div class="pill-group mb-4">
                                <span class="badge-custom bg-green-lite fw-semibold">Accra</span>
                                <span class="badge-custom bg-grey-lite fw-semibold">Ghana & Africa</span>
                                <span class="badge-custom bg-grey-lite fw-semibold">One Integrated Team</span>
                            </div>

                            <p class="mb-4">Ghana core and global bridge. Our Accra office leads the creative
                                revolution in Ghana and connects African brands to UK and European markets through
                                integrated strategy and execution.</p>
                            <a href="/accra" class="btn-outline-custom btn-accra me-2 mb-2 mb-xl-0">Our Accra
                                Office</a>
                            <a href="/contact" class="btn-outline-custom btn-accra">Work With Accra Team</a>
                        </div>
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-12 text-center choose-market-box py-4">
                        <h3 class="text-white">Choose the team closest to your market</h3>
                        <p class="subhead mb-2 text-white-v2">Not sure which team to contact? Tell us your location and
                            we will
                            route you.</p>
                        <a href="/contact" class="commn-btn btn-primary-custom me-2 mb-3 mb-sm-0 mt-2">Start a
                            Conversation<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right ms-2"
                                data-loc="client/src/pages/Home.tsx:47">
                                <path d="M5 12h14"></path>
                                <path d="m12 5 7 7-7 7"></path>
                            </svg> </a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="packages section-md">
        <div class=" container-custom">
            <h2 class="element-2">Packages We Offer</h2>
            <div class="subhead">
                Choose the partnership model that fits your stage of growth. Our three packages—Eagle Ignite, Eagle
                Amplify, and Eagle Connect—are designed to scale with your business. Each package includes strategic
                guidance, creative execution, and measurable results.
            </div>
            <div class="row g-4 mt-3 justify-content-center">

                <div class="col-lg-4 col-md-6">
                    <div class="card-1">
                        <span class="small-text text-orange fw-semibold d-block mb-2">For Startups & New Ventures</span>
                        <h3 class="fw-bolder">Eagle Ignite</h3>
                        <p class="mb-4 fw-semibold">Custom</p>
                        <ul class="package-list">
                            <li><i class="bi bi-check2"></i> Brand strategy</li>
                            <li><i class="bi bi-check2"></i> Website design</li>
                            <li><i class="bi bi-check2"></i> Social media setup</li>
                            <li><i class="bi bi-check2"></i> Initial campaign</li>
                        </ul>
                        <a href="/ignite" class="button-link  mt-auto">Get Started <i
                                class="bi bi-arrow-right-short ms-1 mt-2px"></i></a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="card-1">
                        <span class="badge-popular mb-3">Most Popular</span>
                        <span class="small-text text-orange fw-semibold d-block mb-2">For SMEs & Non-Profits</span>
                        <h3>Eagle Amplify</h3>
                        <p class=" mb-4 fw-semibold">Custom</p>
                        <ul class="package-list ">
                            <li><i class="bi bi-check2"></i> Full marketing strategy</li>
                            <li><i class="bi bi-check2"></i> Campaign execution</li>
                            <li><i class="bi bi-check2"></i> Content production</li>
                            <li><i class="bi bi-check2"></i> Performance tracking</li>
                            <li><i class="bi bi-check2"></i> Monthly optimization</li>
                        </ul>
                        <a href="/amplify" class=" button-link mt-auto">Get Started <i
                                class="bi bi-arrow-right-short ms-1 mt-2px"></i></a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="card-1">
                        <span class="small-text text-orange fw-semibold d-block mb-2">For Enterprises & Government
                            Bodies</span>
                        <h3>Eagle Connect</h3>
                        <p class="mb-4 fw-semibold">Custom</p>
                        <ul class="package-list">
                            <li><i class="bi bi-check2"></i> Dedicated team</li>
                            <li><i class="bi bi-check2"></i> Integrated services</li>
                            <li><i class="bi bi-check2"></i> Custom solutions</li>
                            <li><i class="bi bi-check2"></i> Strategic partnership</li>
                            <li><i class="bi bi-check2"></i> Quarterly reviews</li>
                        </ul>
                        <a href="/connect" class="button-link mt-auto">Get Started <i
                                class="bi bi-arrow-right-short ms-1 mt-2px"></i></a>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <section class="testimonial section-md">
        <div class=" container-custom d-flex flex-column align-items-center text-center">
            <h2 class="element-1">Client Testimonials</h2>
            <div class="subhead mb-0">Hear from the brands and organizations we've worked with. Their success stories
                demonstrate our commitment to delivering measurable results and building lasting partnerships that drive
                growth.
            </div>

            <div class="testimonial-carousal cmn-sec-padding">
                <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">

                    <div class="carousel-inner testimonial-wrapper mx-auto">

                        <div class="carousel-item active">
                            <div class="testimonial-card d-flex flex-column align-items-start">
                                <div class="stars mb-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-star fill-orange-600 text-orange-600"
                                        data-loc="client/src/components/TestimonialsCarousel.tsx:114">
                                        <polygon
                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                        </polygon>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-star fill-orange-600 text-orange-600"
                                        data-loc="client/src/components/TestimonialsCarousel.tsx:114">
                                        <polygon
                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                        </polygon>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-star fill-orange-600 text-orange-600"
                                        data-loc="client/src/components/TestimonialsCarousel.tsx:114">
                                        <polygon
                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                        </polygon>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-star fill-orange-600 text-orange-600"
                                        data-loc="client/src/components/TestimonialsCarousel.tsx:114">
                                        <polygon
                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                        </polygon>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-star fill-orange-600 text-orange-600"
                                        data-loc="client/src/components/TestimonialsCarousel.tsx:114">
                                        <polygon
                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                        </polygon>
                                    </svg>
                                </div>
                                <h3 class="mb-4">"Working with Eagle London Agency to design our website was an
                                    excellent experience. Their team understood our vision, communicated clearly, and
                                    delivered a site that is both beautiful and user-friendly."</h3>
                                <div class="d-flex align-items-center">
                                    <h6>Chioma Chukwu</h6>
                                </div>
                            </div>
                        </div>

                        <div class="carousel-item">
                            <div class="testimonial-card d-flex flex-column align-items-start">
                                <div class="stars mb-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-star fill-orange-600 text-orange-600"
                                        data-loc="client/src/components/TestimonialsCarousel.tsx:114">
                                        <polygon
                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                        </polygon>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-star fill-orange-600 text-orange-600"
                                        data-loc="client/src/components/TestimonialsCarousel.tsx:114">
                                        <polygon
                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                        </polygon>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-star fill-orange-600 text-orange-600"
                                        data-loc="client/src/components/TestimonialsCarousel.tsx:114">
                                        <polygon
                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                        </polygon>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-star fill-orange-600 text-orange-600"
                                        data-loc="client/src/components/TestimonialsCarousel.tsx:114">
                                        <polygon
                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                        </polygon>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-star fill-orange-600 text-orange-600"
                                        data-loc="client/src/components/TestimonialsCarousel.tsx:114">
                                        <polygon
                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                        </polygon>
                                    </svg>
                                </div>
                                <h3 class="mb-4">"It's been an absolute pleasure working with Eagle London Agency. Such
                                    a wonderful creative team - every single one involved in a project was professional,
                                    considerate and committed. I'd highly recommend this agency and would myself love to
                                    work with them again in the future!"</h3>
                                <div class="d-flex align-items-center">
                                    <h6>Anastasia Sheveleva</h6>
                                </div>
                            </div>
                        </div>

                        <div class="carousel-item">
                            <div class="testimonial-card d-flex flex-column align-items-start">
                                <div class="stars mb-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-star fill-orange-600 text-orange-600"
                                        data-loc="client/src/components/TestimonialsCarousel.tsx:114">
                                        <polygon
                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                        </polygon>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-star fill-orange-600 text-orange-600"
                                        data-loc="client/src/components/TestimonialsCarousel.tsx:114">
                                        <polygon
                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                        </polygon>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-star fill-orange-600 text-orange-600"
                                        data-loc="client/src/components/TestimonialsCarousel.tsx:114">
                                        <polygon
                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                        </polygon>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-star fill-orange-600 text-orange-600"
                                        data-loc="client/src/components/TestimonialsCarousel.tsx:114">
                                        <polygon
                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                        </polygon>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-star fill-orange-600 text-orange-600"
                                        data-loc="client/src/components/TestimonialsCarousel.tsx:114">
                                        <polygon
                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                        </polygon>
                                    </svg>
                                </div>
                                <h3 class="mb-4">"It's been great working with Eagle on vaccination campaigns over the
                                    past two years. The team is creative, open to ideas and super responsive with both
                                    creative solutions and on all correspondence too which means we have been able to
                                    work at pace with some great results."</h3>
                                <div class="d-flex align-items-center">
                                    <h6>NHS Kent and Medway</h6>
                                </div>
                            </div>
                        </div>

                        <div class="carousel-item">
                            <div class="testimonial-card d-flex flex-column align-items-start">
                                <div class="stars mb-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-star fill-orange-600 text-orange-600"
                                        data-loc="client/src/components/TestimonialsCarousel.tsx:114">
                                        <polygon
                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                        </polygon>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-star fill-orange-600 text-orange-600"
                                        data-loc="client/src/components/TestimonialsCarousel.tsx:114">
                                        <polygon
                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                        </polygon>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-star fill-orange-600 text-orange-600"
                                        data-loc="client/src/components/TestimonialsCarousel.tsx:114">
                                        <polygon
                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                        </polygon>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-star fill-orange-600 text-orange-600"
                                        data-loc="client/src/components/TestimonialsCarousel.tsx:114">
                                        <polygon
                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                        </polygon>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-star fill-orange-600 text-orange-600"
                                        data-loc="client/src/components/TestimonialsCarousel.tsx:114">
                                        <polygon
                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                        </polygon>
                                    </svg>
                                </div>
                                <h3 class="mb-4">"Eagle London Agency have been fantastic and we love working with them.
                                    They created a brilliant campaign for us and the team were so creative, helpful and
                                    communication was great!"</h3>
                                <div class="d-flex align-items-center">
                                    <h6>Paul Robinson Solicitors</h6>
                                </div>
                            </div>
                        </div>

                        <div class="carousel-item">
                            <div class="testimonial-card d-flex flex-column align-items-start">
                                <div class="stars mb-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-star fill-orange-600 text-orange-600"
                                        data-loc="client/src/components/TestimonialsCarousel.tsx:114">
                                        <polygon
                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                        </polygon>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-star fill-orange-600 text-orange-600"
                                        data-loc="client/src/components/TestimonialsCarousel.tsx:114">
                                        <polygon
                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                        </polygon>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-star fill-orange-600 text-orange-600"
                                        data-loc="client/src/components/TestimonialsCarousel.tsx:114">
                                        <polygon
                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                        </polygon>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-star fill-orange-600 text-orange-600"
                                        data-loc="client/src/components/TestimonialsCarousel.tsx:114">
                                        <polygon
                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                        </polygon>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-star fill-orange-600 text-orange-600"
                                        data-loc="client/src/components/TestimonialsCarousel.tsx:114">
                                        <polygon
                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                        </polygon>
                                    </svg>
                                </div>
                                <h3 class="mb-4">"I am very impressed with Eagle London Agency. I love the 'Time to
                                    Care' video they produced for NHS UK - showing a need for us to be careful about the
                                    precautions we all need to take to prevent the spread of covid."</h3>
                                <div class="d-flex align-items-center">
                                    <h6>Patricia Nayo</h6>
                                </div>
                            </div>
                        </div>

                        <div class="carousel-item">
                            <div class="testimonial-card d-flex flex-column align-items-start">
                                <div class="stars mb-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-star fill-orange-600 text-orange-600"
                                        data-loc="client/src/components/TestimonialsCarousel.tsx:114">
                                        <polygon
                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                        </polygon>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-star fill-orange-600 text-orange-600"
                                        data-loc="client/src/components/TestimonialsCarousel.tsx:114">
                                        <polygon
                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                        </polygon>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-star fill-orange-600 text-orange-600"
                                        data-loc="client/src/components/TestimonialsCarousel.tsx:114">
                                        <polygon
                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                        </polygon>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-star fill-orange-600 text-orange-600"
                                        data-loc="client/src/components/TestimonialsCarousel.tsx:114">
                                        <polygon
                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                        </polygon>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-star fill-orange-600 text-orange-600"
                                        data-loc="client/src/components/TestimonialsCarousel.tsx:114">
                                        <polygon
                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                        </polygon>
                                    </svg>
                                </div>
                                <h3 class="mb-4">"It was seamless working with Eagle London agency. The team was very
                                    professional and lively to work. They produce highly professional and polished
                                    advertisements and I enjoyed working with the team"</h3>
                                <div class="d-flex align-items-center">
                                    <h6>Joseph Abayomi</h6>
                                </div>
                            </div>
                        </div>

                        <div class="carousel-item">
                            <div class="testimonial-card d-flex flex-column align-items-start">
                                <div class="stars mb-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-star fill-orange-600 text-orange-600"
                                        data-loc="client/src/components/TestimonialsCarousel.tsx:114">
                                        <polygon
                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                        </polygon>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-star fill-orange-600 text-orange-600"
                                        data-loc="client/src/components/TestimonialsCarousel.tsx:114">
                                        <polygon
                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                        </polygon>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-star fill-orange-600 text-orange-600"
                                        data-loc="client/src/components/TestimonialsCarousel.tsx:114">
                                        <polygon
                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                        </polygon>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-star fill-orange-600 text-orange-600"
                                        data-loc="client/src/components/TestimonialsCarousel.tsx:114">
                                        <polygon
                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                        </polygon>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-star fill-orange-600 text-orange-600"
                                        data-loc="client/src/components/TestimonialsCarousel.tsx:114">
                                        <polygon
                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                        </polygon>
                                    </svg>
                                </div>
                                <h3 class="mb-4">"Worked with Eagle on an NHS campaign, a lovely team to work for and
                                    film turned out great! Would highly recommend :)"</h3>
                                <div class="d-flex align-items-center">
                                    <h6>Alice Halstead</h6>
                                </div>
                            </div>
                        </div>





                    </div>

                    <div class="controls-container mx-auto">
                        <button class="btn-nav" type="button" data-bs-target="#testimonialCarousel"
                            data-bs-slide="prev">
                            <i class="bi bi-chevron-left"></i>
                        </button>

                        <div class="carousel-indicators custom-pills">
                            <button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="0"
                                class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="1"
                                aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="2"
                                aria-label="Slide 3"></button>
                            <button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="3"
                                aria-label="Slide 3"></button>
                            <button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="4"
                                aria-label="Slide 3"></button>
                            <button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="5"
                                aria-label="Slide 3"></button>
                            <button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="6"
                                aria-label="Slide 3"></button>


                        </div>

                        <button class="btn-nav" type="button" data-bs-target="#testimonialCarousel"
                            data-bs-slide="next">
                            <i class="bi bi-chevron-right"></i>
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </section>


    <section class="company-values section-md">
        <div class="container-custom d-flex flex-column">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="element-2">Company Values</h2>
                    <div class="subhead mb-0">
                        Our values guide every decision we make and every project we undertake. They define our culture,
                        shape our partnerships, and drive our commitment to excellence. These principles are embedded in
                        how we work internally and externally.
                    </div>
                </div>
            </div>

            <div class="cmn-sec-padding">
                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="value-card">
                            <div class="values-img">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                    viewBox="0 0 24 24" fill="none" stroke="#e85d26" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="lucide lucide-users w-8 h-8 text-primary"
                                    data-loc="client/src/pages/Home.tsx:421">
                                    <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="9" cy="7" r="4"></circle>
                                    <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                </svg>
                            </div>
                            <h6 class="my-3">Internally</h6>
                            <p class="small-text text-muted mb-0">Fostering a culture of inclusivity, continuous
                                learning, and employee well-being. We invest in our team because great people create
                                great work.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="value-card">
                            <div class="values-img">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                    viewBox="0 0 24 24" fill="none" stroke="#e85d26" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="lucide lucide-earth w-8 h-8 text-primary"
                                    data-loc="client/src/pages/Home.tsx:421">
                                    <path d="M21.54 15H17a2 2 0 0 0-2 2v4.54"></path>
                                    <path
                                        d="M7 3.34V5a3 3 0 0 0 3 3a2 2 0 0 1 2 2c0 1.1.9 2 2 2a2 2 0 0 0 2-2c0-1.1.9-2 2-2h3.17">
                                    </path>
                                    <path d="M11 21.95V18a2 2 0 0 0-2-2a2 2 0 0 1-2-2v-1a2 2 0 0 0-2-2H2.05"></path>
                                    <circle cx="12" cy="12" r="10"></circle>
                                </svg>
                            </div>
                            <h6 class="my-3">Externally</h6>
                            <p class="small-text text-muted mb-0">Delivering sustainable impact for clients while
                                supporting local communities. We measure success by the positive change we create.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="value-card">
                            <div class="values-img">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                    viewBox="0 0 24 24" fill="none" stroke="#e85d26" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="lucide lucide-leaf w-8 h-8 text-primary"
                                    data-loc="client/src/pages/Home.tsx:421">
                                    <path
                                        d="M11 20A7 7 0 0 1 9.8 6.1C15.5 5 17 4.48 19 2c1 2 2 4.18 2 8 0 5.5-4.78 10-10 10Z">
                                    </path>
                                    <path d="M2 21c0-3 1.85-5.36 5.08-6C9.5 14.52 12 13 13 12"></path>
                                </svg>
                            </div>
                            <h6 class="my-3">Sustainability</h6>
                            <p class="small-text text-muted mb-0">Committing to eco-friendly operations and
                                digital-first
                                workflows. We believe responsible business is good business.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- <section class="home-insights section-md">
                                    <div class="container-custom d-flex flex-column">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h2 class="element-2">Insights</h2>
                                                <div class="subhead mb-0">
                                                    Read our latest thinking on strategy, creativity, technology, and business growth. Our insights
                                                    are grounded in real client work and industry expertise. We share what we learn to help our
                                                    community stay ahead.
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row cmn-sec-padding g-4 mb-5">
                                            <div class="col-md-4">
                                                <div class="card-1">
                                                    <div class="x-small-text insight-date">March 2026</div>
                                                    <h6 class="my-3">The Future of African Tech</h6>
                                                    <p class="small-text text-muted mb-3">Committing to eco-friendly operations and
                                                        digital-first
                                                        workflows. We believe responsible business is good business.</p>
                                                    <a href="#" class="button-link">Read More <i class="bi bi-arrow-right ms-2"></i></a>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="card-1">
                                                    <div class="x-small-text insight-date">February 2026</div>
                                                    <h6 class="my-3">Building Brands for Global Markets</h6>
                                                    <p class="small-text text-muted mb-3">Strategies for scaling brand identity across different
                                                        cultures and geographies.</p>
                                                    <a href="#" class="button-link">Read More <i class="bi bi-arrow-right ms-2"></i></a>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="card-1">
                                                    <div class="x-small-text insight-date">January 2026</div>
                                                    <h6 class="my-3">Digital Transformation for SMEs</h6>
                                                    <p class="small-text text-muted mb-3">Practical approaches to modernizing operations without
                                                        overwhelming your team.</p>
                                                    <a href="#" class="button-link">Read More <i class="bi bi-arrow-right ms-2"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center">
                                            <a href="#" class="button-link">View All Insights <i class="bi bi-arrow-right ms-2"></i></a>
                                        </div>
                                    </div>
                                </section> -->

    <section class="ready-to section-md">
        <div class="container-custom d-flex flex-column align-items-center text-center position-relative z-3">
            <h2 class="mb-3 text-white">Ready to Get Started?</h2>
            <p class="subhead mb-4">Let's have a conversation about your project. Whether you're exploring
                ideas or
                ready to execute, we're here to help you achieve ambitious growth goals. Contact our team today to
                discuss your needs.</p>

            <div class="d-flex flex-column flex-sm-row">
                <a href="/contact" class=" commn-btn btn-primary-custom me-0 me-sm-3 mb-3 mb-sm-0">Start a
                    Conversation<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right ms-2"
                        data-loc="client/src/pages/Home.tsx:47">
                        <path d="M5 12h14"></path>
                        <path d="m12 5 7 7-7 7"></path>
                    </svg> </a>
                <a href="/services" class="commn-btn btn-primary-custom">Explore Services</a>
            </div>
        </div>

    </section>
@endsection
