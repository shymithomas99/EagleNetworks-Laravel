@extends('layouts.appweb')
@section('title', 'Ignite | ')
@push('meta')
    <meta
        name="description"
        content="A strategy, creative, and technology agency with offices in London and Accra. We help ambitious businesses grow by combining UK expertise with African market insight."
    >
@endpush
@section('content')
    <section class="section-hero package-banner">

        <div class="container-custom">

            <div class="section-hero-sub">
                <div>
                    <div>
                        <div class="header-label">Eagle Ignite — For Startups & New Ventures</div>
                        <h1>Launch Your Vision</h1>
                        <div class="subhead">Perfect for startups and new ventures looking to launch with a complete brand
                            identity,
                            digital presence, and go-to-market strategy.
                        </div>



                        <a href="/contact" class="commn-btn btn-primary-custom me-2 mb-3 mb-sm-0">Start a
                            Conversation<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right ms-2"
                                data-loc="client/src/pages/Home.tsx:47">
                                <path d="M5 12h14"></path>
                                <path d="m12 5 7 7-7 7"></path>
                            </svg></a>
                        <a href="/packages" class="commn-btn btn-transperant">View All Packages</a>
                    </div>

                </div>
            </div>
        </div>
    </section>



    <!---------------------------strategic hub section starts here--------------------->

    <section class="who-its-for section-md">
        <div class="container-custom">

            <div class="row align-items-center">

                <div class="col-lg-6">

                    <h2> Who It's For </h2>

                    <div class="subhead">Eagle Ignite is designed for startups and new ventures that need a complete brand
                        foundation and market entry strategy. We combine strategic planning, creative design, and digital
                        expertise
                        to help you launch with confidence.</div>
                    <div class="subhead">Whether you're a tech startup, a creative agency, or a service-based business,
                        Eagle
                        Ignite provides the essentials to establish your market presence and acquire your first customers.
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="package-card">
                        <h3 class="mb-4">Best suited for:</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="d-flex align-items-start mb-3">
                                <i class="bi bi-check2"></i>
                                <span>Early-stage startups with a clear vision</span>
                            </li>

                            <li class="d-flex align-items-start mb-3">
                                <i class="bi bi-check2"></i>
                                <span>New ventures entering the market</span>
                            </li>

                            <li class="d-flex align-items-start mb-3">
                                <i class="bi bi-check2"></i>
                                <span>Founders needing brand &amp; launch support</span>
                            </li>

                            <li class="d-flex align-items-start mb-3">
                                <i class="bi bi-check2"></i>
                                <span>Teams with limited marketing resources</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>



        </div>
    </section>

    <section class="services-included section-md">
        <div class="container-custom">
            <h2>Services Included</h2>
            <div class="subhead mb-5">
                Everything you need to establish your brand and enter the market with confidence.
            </div>

            <div class="row g-4-5">
                <div class="col-md-6">
                    <div class="package-card bg-white">
                        <h3 class="mb-4">Brand Strategy</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="d-flex align-items-start mb-3">
                                <i class="bi bi-check2"></i>
                                <span>Brand positioning</span>
                            </li>

                            <li class="d-flex align-items-start mb-3">
                                <i class="bi bi-check2"></i>
                                <span>Visual identity design</span>
                            </li>

                            <li class="d-flex align-items-start mb-3">
                                <i class="bi bi-check2"></i>
                                <span>Brand guidelines</span>
                            </li>

                            <li class="d-flex align-items-start mb-3">
                                <i class="bi bi-check2"></i>
                                <span>Messaging framework</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="package-card bg-white">
                        <h3 class="mb-4">Website Design</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="d-flex align-items-start mb-3">
                                <i class="bi bi-check2"></i>
                                <span>Responsive website design</span>
                            </li>

                            <li class="d-flex align-items-start mb-3">
                                <i class="bi bi-check2"></i>
                                <span>User experience optimisation</span>
                            </li>

                            <li class="d-flex align-items-start mb-3">
                                <i class="bi bi-check2"></i>
                                <span>Content strategy
                                </span>
                            </li>

                            <li class="d-flex align-items-start mb-3">
                                <i class="bi bi-check2"></i>
                                <span>SEO foundation</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="package-card bg-white">
                        <h3 class="mb-4">Social Media Setup</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="d-flex align-items-start mb-3">
                                <i class="bi bi-check2"></i>
                                <span>Platform strategy</span>
                            </li>

                            <li class="d-flex align-items-start mb-3">
                                <i class="bi bi-check2"></i>
                                <span>Profile optimisation</span>
                            </li>

                            <li class="d-flex align-items-start mb-3">
                                <i class="bi bi-check2"></i>
                                <span>Content calendar</span>
                            </li>

                            <li class="d-flex align-items-start mb-3">
                                <i class="bi bi-check2"></i>
                                <span>Initial content creation</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="package-card bg-white">
                        <h3 class="mb-4">Initial Campaign</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="d-flex align-items-start mb-3">
                                <i class="bi bi-check2"></i>
                                <span>Launch campaign planning</span>
                            </li>

                            <li class="d-flex align-items-start mb-3">
                                <i class="bi bi-check2"></i>
                                <span>Ad creative development</span>
                            </li>

                            <li class="d-flex align-items-start mb-3">
                                <i class="bi bi-check2"></i>
                                <span>Campaign setup & optimisation</span>
                            </li>

                            <li class="d-flex align-items-start mb-3">
                                <i class="bi bi-check2"></i>
                                <span>Performance tracking</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="how-we-work section-md">
        <div class="container-custom">
            <h2>How We Work</h2>
            <div class="subhead mb-5">
                Our collaborative approach combines London expertise with Accra innovation.
            </div>

            <div class="row g-4-5">
                <div class="col-md-4">
                    <div class="package-card ">
                        <h3 class="mb-3">01</h3>
                        <h6 class="mb-3">Discovery & Strategy</h6>
                        <p>We dive deep into understanding your vision, market, and target audience to develop a
                            comprehensive
                            launch strategy.</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="package-card ">
                        <h3 class="mb-3">02</h3>
                        <h6 class="mb-3">Creative Execution</h6>
                        <p>Our creative team brings your brand to life through compelling design, content, and digital
                            experiences.
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="package-card ">
                        <h3 class="mb-3">03</h3>
                        <h6 class="mb-3">Launch & Optimise</h6>
                        <p>We launch your brand and campaigns, then continuously monitor and optimise for maximum impact and
                            growth.
                        </p>
                    </div>
                </div>
            </div>


        </div>
    </section>

    <section class="ready-to section">
        <div class="container-custom">
            <div class="inner-cta-box text-center text-white position-relative z-1">
                <h2 class="display-5 fw-bold mb-3">Ready to Launch Your Brand?</h2>
                <div class="subhead mb-5">Partner with us to unlock your brand's full potential in 2026 and
                    beyond.</div>

                <div class="row g-4 justify-content-center mb-5">
                    <div class="col-md-4">
                        <a href="mailto:eaglenetworks@theemhglobal.com" target="_blank">
                            <div class="icon-circle mx-auto mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="lucide lucide-mail text-[#F15A24]"
                                    data-loc="client/src/components/CTASection.tsx:37">
                                    <rect width="20" height="16" x="2" y="4" rx="2"></rect>
                                    <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path>
                                </svg>
                            </div>
                            <span class="cta-link">eaglenetworks@theemhglobal.com</span>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="https://www.eagletheagency.com" target="_blank">
                            <div class="icon-circle mx-auto mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="lucide lucide-globe text-[#F15A24]"
                                    data-loc="client/src/components/CTASection.tsx:50">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"></path>
                                    <path d="M2 12h20"></path>
                                </svg>
                            </div>
                            <span class="cta-link">www.eagletheagency.com</span>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="https://www.linkedin.com/company/eagletheagency" target="_blank">
                            <div class="icon-circle mx-auto mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="lucide lucide-linkedin text-[#F15A24]"
                                    data-loc="client/src/components/CTASection.tsx:63">
                                    <path
                                        d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z">
                                    </path>
                                    <rect width="4" height="12" x="2" y="9"></rect>
                                    <circle cx="4" cy="4" r="2"></circle>
                                </svg>
                            </div>
                            <span class="cta-link">linkedin.com/eagletheagency</span>
                        </a>
                    </div>
                </div>

                <!-- <div class="d-flex justify-content-center align-items-center gap-3 mb-5 flex-wrap">
                                <a href="#" class="commn-btn loc-badge text-white"><span class="text-orange">eagle</span>london</a>
                                <div class="loc-divider d-none d-md-block"></div>
                                <a href="#" class="commn-btn loc-badge text-white"><span class="text-orange">eagle</span>accra</a>
                            </div> -->

                <a href="/contact" class="commn-btn btn-primary-custom py-3">Start a
                    Conversation<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right ms-2"
                        data-loc="client/src/pages/Home.tsx:47">
                        <path d="M5 12h14"></path>
                        <path d="m12 5 7 7-7 7"></path>
                    </svg></a>

            </div>
        </div>
    </section>
@endsection
