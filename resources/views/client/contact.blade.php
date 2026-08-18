@extends('layouts.appweb')
@section('title', 'Contact | ')
@push('meta')
    <meta
        name="description"
        content="A strategy, creative, and technology agency with offices in London and Accra. We help ambitious businesses grow by combining UK expertise with African market insight."
    >
@endpush
@section('content')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <section class="section-hero contact-banner">
        <div class="container-custom">
            <div class="section-hero-sub">
                <div>
                    <div>

                        <h1>Start a Conversation About Your Project</h1>
                        <div class="subhead">Tell us what you're working on and we'll come back with clear next steps on
                            how we can help. Our team is ready to explore your challenges and develop integrated
                            solutions.</div>
                        <a href="#contactForm" class="commn-btn btn-primary-custom me-2 mb-3 mb-sm-0 mt-2">
                            Get In Touch
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-arrow-right ms-2"
                                data-loc="client/src/pages/Home.tsx:47">
                                <path d="M5 12h14"></path>
                                <path d="m12 5 7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="contactForm" class="contact-form section-md">

        <div class=" container-custom d-flex flex-column">
            <div class="row">
                <div class="col-md-12">
                    <h2>Send Us a Message</h2>
                    <div class="subhead mb-5">
                        Whether you're exploring a new project, scaling your business, or looking for strategic
                        guidance, we're here to help. Fill out the form below and we'll respond within 24 business hours
                        with next steps.
                    </div>
                </div>
            </div>


            <div class="form-section">
                <form id="contactForm" method="POST" action="{{ route('contact.submit') }}">
                    @csrf
                    <!-- Row 1 -->
                    <div class="row g-4">
                        <div class="col-md-6">
                            <label>Name *</label>
                            <input type="text" class="form-control" name="name" placeholder="Your name" required
                                value="{{ old('name') }}">
                            @error('name')
                                <small>{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label>Email *</label>
                            <input type="email" class="form-control" name="email" placeholder="your@email.com"
                                value="{{ old('email') }}" required>
                            @error('email')
                                <small>{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <!-- Who to speak -->

                            <label>Who would you like to speak to? *</label>
                            <select class="form-select" name="team" required>
                                <option selected disabled>Select a team</option>
                                <option>London</option>
                                <option>Accra</option>
                                <option>General</option>
                            </select>

                        </div>
                        <div class="col-md-6">
                            <!-- Service -->
                            <label>What service are you interested in? *</label>
                            <select class="form-select" name="service" required>
                                <option selected disabled>Select a service</option>
                                <option>Creative Production</option>
                                <option>Marketing & Consultancy</option>
                                <option>Tech Solutions</option>
                                <option>Outsourced Customer Service</option>
                                <option>EMTV Portal</option>
                                <option>General Enquiry</option>
                            </select>

                        </div>
                        <div class="col-md-12">

                            <!-- Package -->

                            <label>Which package are you interested in?</label>
                            <select class="form-select" name="package">
                                <option>None</option>
                                <option>Ignite</option>
                                <option>Amplify</option>
                                <option>Connect</option>
                            </select>

                        </div>
                        <div class="col-md-12">
                            <!-- Message -->

                            <label>Message *</label>
                            <textarea class="form-control" name="message"
                                placeholder="Tell us what you're trying to achieve, your timeline, and any key challenges." required>{{ old('message') }}</textarea>

                            @error('message')
                                <small>{{ $message }}</small>
                            @enderror

                        </div>




                        <div class="col-md-12">
                            <button class="commn-btn btn-primary-custom py-2 w-100">Send Message</button>
                        </div>



                        <div
                            class="col-md-12 contact-submit-text x-small-text text-muted fw-normal d-flex justify-content-center">
                            By submitting this form you agree to our&nbsp<a href="/privacy-policy"> Privacy Policy
                            </a>&nbspand&nbsp<a href="/terms"> Terms of Use</a>.
                        </div>
                    </div>
                </form>



            </div>
        </div>
    </section>

    <section class="office-map section-md">

        <div class="container-custom">
            <h2 class="text-white mb-5">Find Our Offices in the following locations</h2>
            <div class="row g-4">

                <!-- LEFT CARD -->
                <div class="col-lg-6">
                    <div class="office-card office-orange">

                        <div class="office-location x-small-text fw-bold text-muted mb-2">BASED IN THE UK</div>
                        <h2 class="location-title text-orange mb-2">eagle<span>london</span></h2>
                        <div class="small-text mb-3">London based team serving clients across the UK and Europe</div>
                        <div class="pill-group mb-3">
                            <span class="badge-custom-2 bg-orange-lite">London</span>
                            <span class="badge-custom-2 bg-grey-lite">UK &amp; Europe</span>
                            <span class="badge-custom-2 bg-grey-lite">One Integrated Team</span>
                        </div>
                        <div class="text-orange x-small-text fw-bold mb-2">LONDON</div>
                        <div class="office-title mb-2">Eagle London Agency</div>

                        <div class="office-text">
                            c/o EMH Global Ltd<br>
                            Old Town Hall Annexe<br>
                            29 Broadway<br>
                            Stratford E15 4BQ
                        </div>

                        <div class="office-contact">
                            <a href="tel:+442039270281">+44 (0)203 927 0281</a>
                            <a href="tel:+447983508359">+44 (0)7983 508 359</a>
                            <a href="mailto:theoffice@theemhglobal.com">theoffice@theemhglobal.com</a>
                        </div>

                        <div class="map-container">
                            <iframe
                                src="https://maps.google.com/maps?q=Stratford%20London&t=&z=13&ie=UTF8&iwloc=&output=embed"></iframe>
                        </div>

                    </div>
                </div>

                <!-- RIGHT CARD -->
                <div class="col-lg-6">
                    <div class="office-card office-green">

                        <div class="office-location x-small-text fw-bold text-muted mb-2">BASED IN GHANA</div>
                        <h2 class="location-title text-green mb-2">eagle<span>accra</span></h2>
                        <div class="small-text mb-3">Accra based team serving clients across Ghana and Africa</div>
                        <div class="pill-group mb-3">
                            <span class="badge-custom-2 bg-green-lite">Accra</span>
                            <span class="badge-custom-2 bg-grey-lite">UK &amp; Europe</span>
                            <span class="badge-custom-2 bg-grey-lite">One Integrated Team</span>
                        </div>
                        <div class="text-green x-small-text fw-bold mb-2">ACCRA</div>
                        <div class="office-title mb-2">EMH Global Ghana Limited</div>

                        <div class="office-text">
                            Eagle House<br>
                            C358/9 Manyo Plange Street<br>
                            Adabraka<br>
                            Accra
                        </div>

                        <div class="office-contact">
                            <a href="tel:+233302237395">+233 (0)302 237 395</a>
                            <a href="tel:+233540381883">+233 (0)540 381 883</a>
                            <a href="mailto:emhghana@theemhglobal.com">emhghana@theemhglobal.com</a>
                        </div>

                        <div class="map-container">
                            <iframe
                                src="https://maps.google.com/maps?q=Accra&t=&z=13&ie=UTF8&iwloc=&output=embed"></iframe>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>


    <section class="faq-section section-md">
        <div class="container-custom-2">
            <div class="d-flex flex-column align-items-center text-center">

                <h2 class="h2-36 mb-5">Frequently Asked Questions</h2>

            </div>

            <div class="faq-section-accordian">

                <div class="accordion accordion-flush custom-faq" id="faqAccordion">

                    <div class="accordion-item mb-3">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne">
                                How quickly will you respond to my enquiry?
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                We aim to respond to all enquiries within 24 business hours. For urgent matters, please
                                call our London office directly on +44(0)203 927 0281.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item mb-3">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo">
                                Which team should I contact — London or Accra?
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                If your project is primarily UK or European-facing, our London team is best placed to
                                help. For West African markets or pan-African strategy, contact our Accra team. For
                                projects spanning both regions, select General and we will route your enquiry to the
                                right people.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item mb-3">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseThree">
                                What information should I include in my message?
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                The more context you can share, the better. Useful details include your business
                                objective, the service you are interested in, your approximate timeline, and any budget
                                parameters. This allows us to prepare a relevant and specific response rather than a
                                generic one.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item mb-3">
                        <h2 class="accordion-header" id="headingFour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFour">
                                Do you work with startups as well as established businesses?
                            </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Yes. We work with early-stage startups, growing SMEs, and established enterprises. Our
                                Ignite
                                package is specifically designed for businesses at the beginning of their growth
                                journey, while
                                Amplify and Connect are built for organisations ready to scale.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item mb-3">
                        <h2 class="accordion-header" id="headingFive">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFive">
                                Can I book a call before committing to a package?
                            </button>
                        </h2>
                        <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Absolutely. We encourage a discovery call before any commitment. Use the contact form
                                above to
                                introduce yourself and we will arrange a no-obligation conversation to explore how we
                                can help.
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>


    <section class="follow-section ready-to">
        <div class="container position-relative z-3">

            <h2 class="h2-30 mb-3">Follow Eagle Networks</h2>

            <p class="follow-subtext">
                Connect with us across our social channels for updates, projects and new content.
            </p>

            <div class="contact-social-icons ">
                <a href="https://www.instagram.com/eagletheagency/"><i class="bi bi-instagram"></i></a>
                <a href="https://uk.linkedin.com/company/eagletheagency"><i class="bi bi-linkedin"></i></a>
                <a href="https://x.com/Eagletheagency"><i class="bi bi-twitter-x"></i></a>
                <a href="https://www.tiktok.com/@eagletheagency"><i class="bi bi-tiktok"></i></a>
                <a href="https://www.youtube.com/channel/UCeQnJm2xSTkK2G9hbl5ySUQ"><i class="bi bi-youtube"></i></a>
            </div>

        </div>
    </section>
@endsection
