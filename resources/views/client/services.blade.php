@extends('layouts.appweb')
@section('content')
    <section class="section-hero service-bnr">

        <div class="container-custom">

            <div class="section-hero-sub">
                <div>
                    <div>
                        <h1>Services We Provide</h1>
                        <div class="subhead">We combine strategy, creative, technology, customer service, and media into
                            tailored solutions for your business. Each service is designed to work together for maximum
                            impact.</div>

                        <a href="packages.php" class="commn-btn btn-primary-custom me-2 mb-3 mb-sm-0">Start a
                            Conversation<i class="bi bi-arrow-right ms-2"></i></a>
                    </div>

                </div>
            </div>
        </div>
    </section>



    <section class="five-integrated-services section-lg ">

        <div class="container-custom d-flex flex-column">
            <div class="row">
                <div class="col-md-12">
                    <h2>Our Five Integrated Services</h2>
                    <div class="subhead mb-0">
                        Five integrated services designed to work together for maximum impact. Each service is built on
                        our core methodology and delivered through our integrated team structure.
                    </div>
                </div>
            </div>
            <div class="five-integrated-boxes">
                <section class="cmn-sec-padding row row-cols-1 row-cols-md-3 row-cols-lg-5 g-4 justify-content-center">

                    <div class="col service-col">
                        <div class="service-card  align-items-center text-center" data-title="Strategy & Consulting"
                            data-description="Turn uncertainty into a clear, executable growth plan. We analyse your market position, define your competitive advantage, and create a roadmap that drives sustainable growth.">

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
                            <h6>Strategy &amp; Consulting</h6>
                        </div>
                    </div>

                    <div class="col">
                        <div class="service-card align-items-center text-center" data-title="Marketing & Communications"
                            data-description="Build brand visibility and connect with the right audience through integrated campaigns, messaging strategies, and digital communication solutions.">
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
                            <h6>Marketing &amp; Communications</h6>
                        </div>
                    </div>

                    <div class="col">
                        <div class="service-card align-items-center text-center" data-title="Creative Production"
                            data-description="Create content that reflects the quality of your brand. Film, photography, design, and editorial — crafted to capture authentic narratives for local and global audiences.">
                            <div class="icon-box">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="lucide lucide-palette w-7 h-7 transition-transform duration-300 group-hover:scale-110"
                                    data-loc="client/src/pages/Services.tsx:192">
                                    <circle cx="13.5" cy="6.5" r=".5" fill="currentColor"></circle>
                                    <circle cx="17.5" cy="10.5" r=".5" fill="currentColor"></circle>
                                    <circle cx="8.5" cy="7.5" r=".5" fill="currentColor"></circle>
                                    <circle cx="6.5" cy="12.5" r=".5" fill="currentColor"></circle>
                                    <path
                                        d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10c.926 0 1.648-.746 1.648-1.688 0-.437-.18-.835-.437-1.125-.29-.289-.438-.652-.438-1.125a1.64 1.64 0 0 1 1.668-1.668h1.996c3.051 0 5.555-2.503 5.555-5.554C21.965 6.012 17.461 2 12 2z">
                                    </path>
                                </svg>
                            </div>
                            <h6>Creative Production</h6>
                        </div>
                    </div>

                    <div class="col">
                        <div class="service-card align-items-center text-center" data-title="Digital Transformation"
                            data-description="Leverage cutting-edge technology to streamline operations, enhance customer experiences, and unlock new revenue streams.">
                            <div class="icon-box">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="lucide lucide-users w-7 h-7 transition-transform duration-300 group-hover:scale-110"
                                    data-loc="client/src/pages/Services.tsx:192">
                                    <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="9" cy="7" r="4"></circle>
                                    <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                </svg>
                            </div>
                            <h6>Customer Support Services</h6>
                        </div>
                    </div>

                    <div class="col">
                        <div class="service-card align-items-center text-center" data-title="Media & Insights"
                            data-description="Reach your audience beyond digital channels. We combine media planning, data insights, and distribution strategy to maximise the reach and impact of every campaign.">
                            <div class="icon-box">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="lucide lucide-zap w-7 h-7 transition-transform duration-300 group-hover:scale-110"
                                    data-loc="client/src/pages/Services.tsx:192">
                                    <path
                                        d="M4 14a1 1 0 0 1-.78-1.63l9.9-10.2a.5.5 0 0 1 .86.46l-1.92 6.02A1 1 0 0 0 13 10h7a1 1 0 0 1 .78 1.63l-9.9 10.2a.5.5 0 0 1-.86-.46l1.92-6.02A1 1 0 0 0 11 14z">
                                    </path>
                                </svg>
                            </div>
                            <h6>Media & Insights</h6>
                        </div>
                    </div>

                    <!-- DETAIL BOX -->
                    <!-- DESKTOP DETAIL BOX -->
                    <div class="service-detail-box desktop-detail-box" id="desktopDetailBox">
                        <h3 id="desktopDetailTitle"></h3>
                        <p id="desktopDetailDescription"></p>
                    </div>


                </section>
            </div>
        </div>
    </section>
    <!-- --------------------creative section starts here--------------------------- -->
    <section class="creative-overview-section">
        <div class="container-custom">

            <!-- Heading -->
            <div class="creative-header">
                <span class="small-head text-secondary mb-2">HOW WE CREATE</span>

                <h2 class="creative-title">
                    Creative Production, Software
                    Solutions and Marketing Overview
                </h2>

                <p>
                    A closer look at how we approach creative production, software solutions and marketing across the
                    agency — from concept through to delivery.
                </p>
            </div>

            <!-- Cards -->
            <div class="row g-4">

                <!-- CARD 1 -->
                <div class="col-lg-4 col-md-6">
                    <div class="creative-wrapper">

                        <!-- Main Card -->
                        <div class="creative-card">

                            <div class="creative-image">
                                <img src="images/card-creative-prod_8f219642_60ec79cc.jpg" alt="">
                            </div>

                            <div class="creative-content">
                                <h3>Creative Production</h3>

                                <p>
                                    High-End Film, Photography, Visual Storytelling and creative design that captures
                                    authentic narratives for local and global audiences
                                </p>

                                <button class="expand-btn" data-target="#expandCreative">
                                    Explore
                                    <span class="arrow">→</span>
                                </button>
                            </div>

                        </div>

                        <!-- Expand Box -->
                        <div class="expand-box" id="expandCreative">

                            <div class="expand-inner">

                                <div class="expand-card">
                                    <h4>KEY SERVICES</h4>

                                    <ul>
                                        <li>TV Commercials</li>
                                        <li>Brand Films</li>
                                        <li>Documentaries</li>
                                        <li>Narrative Shorts</li>
                                        <li>Social Media Content</li>
                                        <li>Vertical Video</li>
                                        <li>Podcast</li>
                                    </ul>
                                </div>

                                <div class="expand-card">
                                    <h4>PROCESS</h4>

                                    <ul>
                                        <li>Initial Consultation</li>
                                        <li>Ideation</li>
                                        <li>Concept Development</li>
                                        <li>Planning & Production</li>
                                        <li>Production</li>
                                        <li>Post Production</li>
                                        <li>Delivery</li>
                                    </ul>
                                </div>

                            </div>

                        </div>

                    </div>
                </div>

                <!-- CARD 2 -->
                <div class="col-lg-4 col-md-6">
                    <div class="creative-wrapper">

                        <!-- Main Card -->
                        <div class="creative-card">

                            <div class="creative-image">
                                <img src="images/card-software-solutions_fccce0fa_7d5d7517.jpg" alt="">
                            </div>

                            <div class="creative-content">
                                <h3>Software Solutions</h3>

                                <p>
                                    Custom software and web development providing strategic solutions that solve
                                    business problems and create lasting value.
                                </p>

                                <button class="expand-btn" data-target="#expandSoftware">
                                    Explore
                                    <span class="arrow">→</span>
                                </button>
                            </div>

                        </div>

                        <!-- Expand Box -->
                        <div class="expand-box" id="expandSoftware">

                            <div class="expand-inner">

                                <div class="expand-card">
                                    <h4>KEY SERVICES</h4>

                                    <ul>
                                        <li>Custom Web Applications</li>
                                        <li>CRM Systems</li>
                                        <li>UI/UX Design</li>
                                        <li>API Integrations</li>
                                        <li>Cloud Infrastructure</li>
                                        <li>Mobile Applications</li>
                                        <li>Support & Maintenance</li>
                                    </ul>
                                </div>

                                <div class="expand-card">
                                    <h4>PROCESS</h4>

                                    <ul>
                                        <li>Discovery</li>
                                        <li>Requirement Analysis</li>
                                        <li>Architecture Planning</li>
                                        <li>Development</li>
                                        <li>Testing</li>
                                        <li>Deployment</li>
                                        <li>Optimization</li>
                                    </ul>
                                </div>

                            </div>

                        </div>

                    </div>
                </div>

                <!-- CARD 3 -->
                <div class="col-lg-4 col-md-6">
                    <div class="creative-wrapper">

                        <!-- Main Card -->
                        <div class="creative-card">

                            <div class="creative-image">
                                <img src="images/card-marketing-strategy_57f57011_e90caa19.jpg" alt="">
                            </div>

                            <div class="creative-content">
                                <h3>Marketing Strategy</h3>

                                <p>
                                    Marketing consultancy, data-driven digital strategy, SEO, social media management
                                    and campaigns that drive measurable growth
                                </p>

                                <button class="expand-btn" data-target="#expandMarketing">
                                    Explore
                                    <span class="arrow">→</span>
                                </button>
                            </div>

                        </div>

                        <!-- Expand Box -->
                        <div class="expand-box" id="expandMarketing">

                            <div class="expand-inner">

                                <div class="expand-card">
                                    <h4>KEY SERVICES</h4>

                                    <ul>
                                        <li>Cultural Competency</li>
                                        <li>Communications Plan</li>
                                        <li>Marketing Strategy</li>
                                        <li>Campaign Management</li>
                                        <li>Media Planning</li>
                                        <li>Content Distribution</li>
                                        <li>Graphic Design</li>
                                        <li>Video</li>
                                    </ul>
                                </div>

                                <div class="expand-card">
                                    <h4>KEY POINTS</h4>

                                    <ul>
                                        <li>Bespoke strategies aligned to objectives</li>
                                        <li>Focus on measurable growth</li>
                                        <li>Focus on measurable growth</li>
                                        <li>Proven brand success</li>
                                    </ul>
                                </div>

                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- --------------------creative section ends here--------------------------- -->

    <!-- =========================
        IN HOUSE PROJECTS SECTION
        ========================= -->

    <section class="inhouse-projects-section">
        <div class="container-custom">

            <!-- Header -->
            <div class="projects-header">

                <span class="small-head text-secondary section-label-dark mb-2">
                    OUR INITIATIVES
                </span>

                <h2 class="projects-title text-white">
                    In House Projects
                </h2>

                <p class="projects-subtitle">
                    A selection of internally developed media and content initiatives that reflect how we think, create
                    and build across the agency.
                </p>

            </div>

            <!-- Cards -->
            <div class="row g-4">

                <!-- CARD 1 -->
                <div class="col-lg-4 col-md-6">
                    <div class="initiative-card">

                        <div class="initiative-image">
                            <img src="images/tone-new_9df01429_a12de706.webp" alt="Tone Project">
                        </div>

                        <div class="initiative-content">

                            <h3>Tone</h3>

                            <p>
                                A media and content platform developed to spotlight stories, perspectives and brand
                                aligned editorial content.
                            </p>

                            <a href="https://shoutabouttone.com/" class="initiative-link">
                                Read More
                                <span>→</span>
                            </a>

                        </div>

                    </div>
                </div>

                <!-- CARD 2 -->
                <div class="col-lg-4 col-md-6">
                    <div class="initiative-card">

                        <div class="initiative-image">
                            <img src="images/eagle-conv-card_4aa7dfad_b29ffb1d.webp" alt="Eagle Conversations">
                        </div>

                        <div class="initiative-content">

                            <h3>Eagle Conversations</h3>

                            <p>
                                A conversation led content format designed to share ideas, insight and audience relevant
                                discussions.
                            </p>

                            <a href="https://www.youtube.com/playlist?list=PLdffCfwJzONULB90pJgxWd7X_f3ceZvsC"
                                class="initiative-link">
                                Be Part of the Conversation
                                <span>→</span>
                            </a>

                        </div>

                    </div>
                </div>

                <!-- CARD 3 -->
                <div class="col-lg-4 col-md-6">
                    <div class="initiative-card">

                        <div class="initiative-image">
                            <img src="images/emh-card-new_04f100bd_cf627976.webp" alt="Eagle Media House">
                        </div>

                        <div class="initiative-content">

                            <h3>Eagle Media House</h3>

                            <p>
                                A branded media initiative focused on content creation, production capability and high
                                quality visual storytelling.
                            </p>

                            <a href="media.php" class="initiative-link">
                                See More
                                <span>→</span>
                            </a>

                        </div>

                    </div>
                </div>

            </div>

        </div>
    </section>
    <!-- =========================
        IN HOUSE PROJECTS SECTION
        ========================= -->

    <section class="how-we-deliver section-md">
        <div class="container-custom">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <h2 class="h2-36 mb-3">How We Deliver</h2>
                    <div class="subhead">We operate across the UK and Africa, delivering integrated strategy, execution,
                        and distribution without fragmentation. Our approach ensures consistency and quality across all
                        services.
                    </div>

                    <div class="how-we-deliver">

                        <div class="row g-4">

                            <div class="col-md-4">
                                <div class="value-card">
                                    <h3>UK & Africa Market Expertise</h3>
                                    <p class="mb-2">We understand how to position and execute across both regions</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="value-card">
                                    <h3>End-to-End Delivery</h3>
                                    <p class="mb-2">Strategy, execution, and delivery handled in one place.</p>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="value-card">
                                    <h3>Execution-Focused Approach</h3>
                                    <p class="mb-2">We prioritise delivery over theory.</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <section class="featured-work grey-bg-4 section-md">
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
                        <a href="details.php" class="button-link">See More <i class="bi bi-arrow-right  ms-2"></i></a>
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
                        <a href="details.php" class="button-link">See More <i class="bi bi-arrow-right  ms-2"></i></a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="work-card">
                        <div class="work-img-container">
                            <img src="images/fw-paul_383eac7e.webp" alt="Digital Transformation" class="img-fluid">
                        </div>
                        <h3>Paul Robinson West Ham TV Ad</h3>
                        <p>Paul Robinson West Ham TV Ad</p>
                        <a href="details.php" class="button-link">See More <i class="bi bi-arrow-right  ms-2"></i></a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="work-card">
                        <div class="work-img-container">
                            <img src="images/fw-toyota_f592b5d6.webp" alt="Digital Transformation" class="img-fluid">
                        </div>
                        <h3>Toyota Ghana</h3>
                        <p>Toyota Ghana</p>
                        <a href="details.php" class="button-link">See More <i class="bi bi-arrow-right  ms-2"></i></a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="highlight section">
        <div class="container-custom-2">
            <div class="highlight-content">
                <h2 class="h2-30 lh-base">Not sure which service is right for you?
                    We'll help you define the right approach.</h2>

                <a href="contact.php" class="commn-btn btn-white">Start a conversation</a>
            </div>
        </div>

    </section>


    <section class="faq-section section">
        <div class="container-custom">
            <div class="faq-main">
                <div class="d-flex flex-column align-items-start text-center">
                    <div class="tag orange-bg text-white mb-3">
                        FAQ
                    </div>
                    <h2 class="h2-36">Services FAQ</h2>
                    <div class="subhead">Common questions about how Eagle London works and what we deliver.
                    </div>
                </div>

                <div class="faq-section-accordian pt-3">

                    <div class="accordion accordion-flush custom-faq" id="faqAccordion">

                        <div class="accordion-item mb-3">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne">
                                    What services does Eagle London offer?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Eagle London offers five integrated services: Strategy & Consulting, Marketing &
                                    Communications, Creative Production, Customer Support Services, and Media & Insights.
                                    All services are delivered by our integrated London and Accra teams.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item mb-3">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo">
                                    How does Eagle London deliver work across the UK and Africa?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    We operate from two offices — London and Accra — as one integrated team. London leads on
                                    UK and European strategy and client management, while Accra provides African market
                                    expertise and creative production. Both teams collaborate on every project
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item mb-3">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree">
                                    What types of organisations does Eagle London work with?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Eagle London works with startups and new ventures, SMEs and non-profits, and corporates
                                    and government organisations. Our client portfolio includes the NHS, King's College
                                    London, Toyota Ghana, and Paul Robinson West Ham.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item mb-3">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFour">
                                    How do I start working with Eagle London?
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    The best starting point is a discovery conversation. Contact us via the form on our
                                    Contact page, by email, or by WhatsApp. We respond within one business day and will
                                    recommend the right service package for your stage and goals
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFive">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFive">
                                    Does Eagle London work on one-off projects or ongoing partnerships?
                                </button>
                            </h2>
                            <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    We work both ways. Our Eagle Ignite package is ideal for defined project scopes. Eagle
                                    Amplify and Eagle Connect are structured as ongoing partnerships. We can also discuss
                                    bespoke arrangements based on your specific needs.
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>



    <section class="ready-to section-md">
        <div class="container-custom d-flex flex-column align-items-center text-center position-relative z-3">
            <h2 class="mb-3 text-white">Ready to Get Started?</h2>
            <p class="subhead mb-4 text-white">Let's have a conversation about your project. Whether you're exploring
                ideas or
                ready to execute, we're here to help you achieve ambitious growth goals. Contact our team today to
                discuss your needs.</p>

            <div class="d-flex flex-column flex-sm-row">
                <a href="contact.php" class=" commn-btn btn-primary-custom me-0 me-sm-3 mb-3 mb-sm-0">Start a
                    Conversation<i class="bi bi-arrow-right ms-2"></i></a>
                <a href="work.php" class="commn-btn btn-primary-custom">View Our Work</a>
            </div>
        </div>

    </section>
@endsection
