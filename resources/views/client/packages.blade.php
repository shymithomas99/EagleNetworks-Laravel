@extends('layouts.appweb')
@section('content')
    <section class="section-hero package-banner">
        <div class="container-custom">

            <div class="section-hero-sub">
                <div>
                    <div>
                        <h1 class="element-2">Choose Your Growth Path</h1>
                        <div class="subhead">Three tailored packages designed for every business stage, from startups to
                            enterprises. Each package combines strategy, creative excellence, and digital solutions to
                            drive measurable growth and sustainable competitive advantage.</div>
                        <a href="/contact" class="commn-btn btn-primary-custom me-2 mb-3 mb-sm-0">Start a
                            Conversation<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right ms-2"
                                data-loc="client/src/pages/Home.tsx:47">
                                <path d="M5 12h14"></path>
                                <path d="m12 5 7 7-7 7"></path>
                            </svg></a>
                    </div>

                </div>
            </div>
        </div>
    </section>






    <section class="package-selection section-md">

        <div class=" container-custom d-flex flex-column">
            <div class="row">
                <div class="col-md-12">
                    <h2>Package Selection Guide</h2>
                    <div class="subhead mb-0">
                        Not sure which package fits your business stage? Start here. We've designed three distinct
                        packages to match different business needs, growth stages, and organizational complexity. Each
                        package includes dedicated support, structured delivery, and ongoing optimization.
                    </div>
                </div>
            </div>
            <div class="five-integrated-boxes">
                <section class="cmn-sec-padding">
                    <div class="">
                        <div class="row g-4 justify-content-center">
                            <div class="col-md-6 col-lg-4">
                                <div class="inner-service-card bg-white">
                                    <div class="d-flex">

                                        <h6 class="mb-2 fw-semibold">Startups & New Ventures</h6>
                                    </div>
                                    <p>Best for founders and new ventures building their brand, launch strategy, and early
                                        market presence.</p>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-4">
                                <div class="inner-service-card green-border bg-white">
                                    <div class="d-flex">

                                        <h6 class="mb-2 fw-semibold">SMEs & Non-Profits</h6>
                                    </div>
                                    <p>Best for growing SMEs and non-profit organisations that need stronger marketing,
                                        digital transformation, and community engagement support.</p>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-4">
                                <div class="inner-service-card brown-border bg-white">
                                    <div class="d-flex">

                                        <h6 class="mb-2 fw-semibold">Corporates & Government</h6>
                                    </div>
                                    <p>Best for organisations that need strategic consulting, complex delivery, and
                                        long-term partnership.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>

    <section class="our-service-packages section-md">
        <div class="container-custom">
            <h2 class="mb-3">Our Service Packages</h2>
            <div class="subhead">
                Each package is customizable and designed to deliver measurable results. We combine strategy, creative
                excellence, and technology to create integrated solutions that drive business growth.
            </div>
            <div class="row g-4 mt-4 justify-content-center">
                <!-- Card 1 -->
                <div class="col-lg-4 col-md-6">
                    <div class="card-1">
                        <h3>Eagle Ignite</h3>
                        <span class="text-deeper-orange fw-semibold mb-3">For Startups & New Ventures</span>

                        <p class="desc">
                            Launch your vision with complete brand identity, MVP development, and go-to-market strategy.
                        </p>

                        <p class="desc-small">
                            We provide launch support with structured phases and dedicated guidance.
                        </p>
                        <ul class="package-list">
                            <li><i class="bi bi-check2"></i> Brand Identity</li>
                            <li><i class="bi bi-check2"></i> MVP Development</li>
                            <li><i class="bi bi-check2"></i> Go-to-Market Strategy</li>
                            <li><i class="bi bi-check2"></i> Initial Marketing Campaign</li>
                            <li><i class="bi bi-check2"></i> Dedicated Account Manager</li>
                        </ul>


                        <a href="/contact" class="commn-btn btn-primary-custom">Get Started</a>
                        <a href="/ignite" class="button-link button-link-grey text-center mt-3 justify-content-center">Learn
                            More <i class="bi bi-arrow-right-short ms-1 mt-2px"></i></a>
                    </div>
                </div>

                <!-- Card 2 (Featured) -->
                <div class="col-lg-4 col-md-6">
                    <div class="card-1">
                        <span class="badge-popular mb-3">Most Popular</span>
                        <h3>Eagle Amplify</h3>
                        <span class="text-deeper-orange fw-semibold mb-3">For SMEs & Non-Profits</span>

                        <p class="desc ">
                            Scale your business through brand evolution, digital transformation, and growth campaigns.
                        </p>

                        <p class="desc-small ">
                            We partner with you providing ongoing optimization and strategy.
                        </p>
                        <ul class="package-list">
                            <li><i class="bi bi-check2"></i> Brand Refresh</li>
                            <li><i class="bi bi-check2"></i> Digital Transformation</li>
                            <li><i class="bi bi-check2"></i> Marketing Campaigns</li>
                            <li><i class="bi bi-check2"></i> CX Optimization</li>
                            <li><i class="bi bi-check2"></i> Strategy Reviews</li>
                        </ul>

                        <a href="/contact" class="commn-btn btn-primary-custom">Get Started</a>
                        <a href="/amplify"
                            class="button-link button-link-grey text-center mt-3 justify-content-center">Learn More <i
                                class="bi bi-arrow-right-short ms-1 mt-2px"></i></a>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="col-lg-4 col-md-6">
                    <div class="card-1">
                        <h3>Eagle Connect</h3>
                        <span class="text-deeper-orange fw-semibold mb-3">For Enterprises & Government Bodies</span>

                        <p class="desc">
                            Strategic consulting, complex integrations, and dedicated partnership for large-scale
                            initiatives.
                        </p>

                        <p class="desc-small">
                            We become an extension of your leadership team, providing strategic partnership and dedicated
                            support.
                        </p>

                        <ul class="package-list">
                            <li><i class="bi bi-check2"></i> Strategic Consulting</li>
                            <li><i class="bi bi-check2"></i> Complex Integrations</li>
                            <li><i class="bi bi-check2"></i> Dedicated Support Team</li>
                            <li><i class="bi bi-check2"></i> Enterprise-Level SLA</li>
                            <li><i class="bi bi-check2"></i> Custom Solutions</li>
                        </ul>

                        <a href="/contact" class="commn-btn btn-primary-custom">Get Started</a>
                        <a href="/connect"
                            class="button-link button-link-grey text-center mt-3 justify-content-center">Learn More <i
                                class="bi bi-arrow-right-short ms-1 mt-2px"></i></a>
                    </div>
                </div>

            </div>
        </div>
    </section>





    <section class="highlight highlight-3">
        <div class="highlight-content">
            <h3 class="mb-3  text-white">Need Something More Tailored?</h3>
            <p class="text-white mb-4"> If your needs do not fit neatly into one package, we can create a custom engagement
                around your goals, market, and stage of growth. Our team specializes in designing integrated solutions
                that match your specific requirements and budget. </p>

            <a href="/contact" class="commn-btn btn-white">Start a conversation</a>
        </div>
    </section>

    <section class="what-you-get section-md">
        <div class="container-custom">
            <h2 class="text-white mb-3">What You Get Across All Packages</h2>
            <div class="subhead text-white-v2">
                Every Eagle Networks engagement includes core capabilities that ensure success. These foundational
                elements are consistent across all packages, providing structure, support, and measurable outcomes.
            </div>

            <div class="creative-agency-section py-5">




                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="feature-item-card">
                            <h5 class="text-white">Dedicated Account Manager</h5>
                            <p class="text-white-v2">A single point of contact who understands your business, goals, and
                                market context.</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="feature-item-card">
                            <h5 class="text-white">Structured Delivery</h5>
                            <p class="text-white-v2">Clear phases, milestones, and deliverables with defined timelines.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="feature-item-card">
                            <h5 class="text-white">Strategic Reviews</h5>
                            <p class="text-white-v2">Regular check-ins to assess progress, optimize approach, and align
                                on next steps.</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="feature-item-card">
                            <h5 class="text-white">Integrated Solutions</h5>
                            <p class="text-white-v2">Strategy, creative, and technology working together as one cohesive
                                offering.</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="feature-item-card">
                            <h5 class="text-white">Market Expertise</h5>
                            <p class="text-white-v2">Insights from our dual-hub model: UK market knowledge + African
                                market expertise.</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="feature-item-card">
                            <h5 class="text-white">Measurable Results</h5>
                            <p class="text-white-v2">Clear KPIs, regular reporting, and transparent communication on
                                ROI.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section class="faq-section section">
        <div class="container-custom">
            <div class="faq-main">
                <div class="d-flex flex-column align-items-start text-center">
                    <div class="tag deeper-orange-bg text-white mb-3">
                        FAQ
                    </div>
                    <h2 class="h2-36">Packages FAQ</h2>
                    <div class="subhead">Common questions about Eagle London's service packages.
                    </div>
                </div>

                <div class="faq-section-accordian pt-3">

                    <div class="accordion accordion-flush custom-faq" id="faqAccordion">

                        <div class="accordion-item mb-3">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne">
                                    What is the Eagle Ignite package?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Eagle Ignite is designed for startups and new ventures. It provides brand foundation,
                                    digital presence, and go-to-market strategy to help new businesses launch and grow
                                    effectively.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item mb-3">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo">
                                    What is the Eagle Amplify package?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Eagle Amplify is designed for growing SMEs and non-profits. It helps established
                                    organisations scale their reach, strengthen their brand, and accelerate digital
                                    performance.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item mb-3">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree">
                                    What is the Eagle Connect package?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Eagle Connect is a full-service enterprise partnership for corporates and government
                                    organisations. It covers strategy, creative, technology, and community engagement as an
                                    integrated service.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item mb-3">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFour">
                                    How do I choose the right Eagle package?
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Ignite is for startups and new ventures. Amplify is for growing SMEs and non-profits.
                                    Connect is for corporates and government. If you are unsure, contact us and we will
                                    recommend the right package for your stage and goals.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFive">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFive">
                                    Can Eagle London create a bespoke package?
                                </button>
                            </h2>
                            <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Yes. If none of the three standard packages fits your needs exactly, we can discuss a
                                    bespoke arrangement. Contact us to start the conversation.
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="ready-to section">
        <div class="container-custom">
            <div class="inner-cta-box text-center text-white position-relative z-1">
                <h2 class="display-5 fw-bold mb-3">Ready to Grow?</h2>
                <div class="subhead  mb-5">Partner with us to unlock your brand's full potential in 2026 and
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

                <a href="/contact" class="commn-btn btn-primary-custom mb-3 mb-sm-0">
                    Start a Conversation <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right ms-2"
                        data-loc="client/src/pages/Home.tsx:47">
                        <path d="M5 12h14"></path>
                        <path d="m12 5 7 7-7 7"></path>
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

            <h3>Before you choose a package</h3>

            <p>
                Tell us about your project and we will recommend the right package for your business.
            </p>


            <a href="https://wa.me/447983508359?text=Hi%20Eagle%20London,%20I'd%20like%20to%20schedule%20a%20call.%20Please%20let%20me%20know%20your%20available%20times."
                target="_blank" rel="noopener noreferrer" id="intent-btn-black" class="intent-btn-black">
                <svg data-loc="client/src/components/ExitIntentPopup.tsx:11" width="16" height="16"
                    viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="shrink-0 me-2">
                    <path data-loc="client/src/components/ExitIntentPopup.tsx:12"
                        d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z">
                    </path>
                </svg> Schedule a Call
            </a>

            <a href="/services" id="intent-btn-white" class="intent-btn-white">
                View Services
            </a>

        </div>
    </div>
@endsection
