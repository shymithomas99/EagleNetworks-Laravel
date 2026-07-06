<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{--  <title>{{ config('app.name', 'Laravel') }}</title>  --}}
    <title>Eagle Agency | Growth Through Authentic Connection</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" type="image/png" sizes="32x32" href="images/emh-fav-32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="images/emh-fav-16.png">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- FontAwesome (optional) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">


</head>

<body>
    <header>
        <nav class="navbar navbar-expand-xl custom-navbar fixed-top" id="mainNavbar">
            <div class="container container-custom-2">

                <!-- Logo Left -->
                <a class="navbar-brand" href="/">
                    <img src="images/LOGOEAGLELONDONACCRA.png" alt="Eagle Networks Logo">
                </a>

                <!-- Hamburger -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">

                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Navbar Content -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">



                    <!-- Center Menu -->
                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0 mt-4 mt-xl-0">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('/') ? 'active' : '' }} ajax-link"
                                href="{{ url('/') }} ">
                                Home
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('services') ? 'active' : '' }} ajax-link"
                                href="{{ url('/services') }}">
                                Services
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('packages') ? 'active' : '' }} ajax-link"
                                href="{{ url('/packages') }}">
                                Packages
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('london') ? 'active' : '' }} ajax-link"
                                href="{{ url('/london') }}">
                                London
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('accra') ? 'active' : '' }} ajax-link"
                                href="{{ url('/accra') }}">
                                Accra
                            </a>
                        </li>

                        <li class="nav-item dropdown custom-dropdown">
                            <a class="nav-link" href="#" id="workDropdown" role="button">
                                Work & Insights
                            </a>

                            <div class="dropdown-menu custom-mega-dropdown">

                                <a href="{{ url('/work') }}" class="dropdown-item-custom">
                                    <div class="dropdown-icon-box">
                                        <i class="bi bi-briefcase"></i>
                                    </div>
                                    <div>
                                        <h6>Our Work</h6>
                                        <p>Case studies, campaigns & projects</p>
                                    </div>
                                </a>

                                <a href="{{ url('/insights') }}" class="dropdown-item-custom">
                                    <div class="dropdown-icon-box">
                                        <i class="bi bi-lightbulb"></i>
                                    </div>
                                    <div>
                                        <h6>Insights</h6>
                                        <p>Business, market & world perspectives</p>
                                    </div>
                                </a>

                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('about') ? 'active' : '' }} ajax-link"
                                href="{{ url('/about') }}">About</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('contact') ? 'active' : '' }} ajax-link"
                                href="{{ url('/contact') }}">Contact</a>
                        </li>

                    </ul>

                    <!-- Mobile Button -->
                    <div class="d-xl-none mt-3">
                        <a href="{{ url('/contact') }}" class="commn-btn btn-primary-custom w-100 text-center">
                            Start a Conversation
                        </a>
                    </div>
                </div>

                <!-- Desktop Button Right -->
                <div class="d-none d-xl-block">
                    <a href="{{ url('/contact') }}" class="commn-btn btn-primary-custom">
                        Start a Conversation
                    </a>
                </div>

            </div>
        </nav>

        <!-- ================= CTA button-starts here ================= -->

        <div class="main-cta-container">
            <div id="expandingCta" class="cta-expanding-box collapsed">
                <!-- Floating Circle Button -->
                <div class="cta-toggle-btn">
                    <div class="icon-open">
                        <i class="bi bi-chat"></i>
                    </div>

                    <div class="icon-close">
                        <i class="bi bi-x-lg"></i>
                    </div>
                </div>

                <!-- Expanded Content -->

                <div class="cta-expanded-content">

                    <a href="#" class="btn-cta btn-white-cta" data-bs-toggle="modal"
                        data-bs-target="#whatsappModal">

                        <i class="bi bi-whatsapp"></i>
                        <span>Schedule a Call</span>

                    </a>

                    <a href="{{ url('/contact') }}" class="btn-cta btn-orange-cta">
                        <span>Start a Conversation</span>
                        <i class="bi bi-arrow-right"></i>
                    </a>

                    <div class="privacy-note">
                        <i class="bi bi-lock-fill"></i>
                        <span>Your information is private and never shared.</span>
                    </div>

                </div>

            </div>

        </div>

        <!-- Scroll To Top Button -->
        <button id="scrollTopBtn" class="scroll-top-btn">
            <i class="bi bi-arrow-up-short"></i>
        </button>



        <!-- ======================= Whatsapp modal ======================= -->

        <div class="modal fade whatsapp-modal" id="whatsappModal" tabindex="-1">

            <div class="modal-dialog modal-dialog-centered">

                <div class="modal-content">

                    <div class="modal-header border-0 pb-0">


                        <h3 class="modal-title">
                            Start a WhatsApp Conversation
                        </h3>

                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                        </button>

                    </div>

                    <div class="modal-body">


                        <p class="modal-subtitle">
                            Tell us a few details so we can route your enquiry properly.
                        </p>


                        <form action="{{ route('whatsapp.submit') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label">
                                    Name <span>*</span>
                                </label>

                                <input type="text" class="form-control" placeholder="Your full name"
                                    name="name" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">
                                    Company / Organisation
                                </label>

                                <input type="text" name="company" class="form-control"
                                    placeholder="Your company name">
                            </div>

                            <div class="mb-3">

                                <label class="form-label">
                                    Package of Interest
                                </label>

                                <select class="form-select" name="package_interest">
                                    <option>Not sure yet</option>
                                    <option>Eagle Ingnite</option>
                                    <option>Eagle Amplify</option>
                                    <option>Eagle connect</option>
                                </select>

                            </div>

                            <div class="mb-3">

                                <label class="form-label">
                                    Services Needed
                                </label>

                                <div class="service-tags">

                                    <input type="checkbox" id="service1" name="services_needed[]"
                                        value="Strategy & Consulting" hidden>

                                    <label for="service1" class="service-tag">
                                        Strategy & Consulting
                                    </label>

                                    <input type="checkbox" id="service2" name="services_needed[]"
                                        value="Marketing & Communications" hidden>

                                    <label for="service2" class="service-tag">
                                        Marketing & Communications
                                    </label>

                                    <input type="checkbox" id="service3" name="services_needed[]"
                                        value="Creative Production" hidden>

                                    <label for="service3" class="service-tag">
                                        Creative Production
                                    </label>

                                    <input type="checkbox" id="service4" name="services_needed[]"
                                        value="Customer Support Services" hidden>

                                    <label for="service4" class="service-tag">
                                        Customer Support Services
                                    </label>

                                    <input type="checkbox" id="service5" name="services_needed[]"
                                        value="Advertising Screens" hidden>

                                    <label for="service5" class="service-tag">
                                        Advertising Screens
                                    </label>

                                    <input type="checkbox" id="service6" name="services_needed[]"
                                        value="Website / Digital Solutions" hidden>

                                    <label for="service6" class="service-tag">
                                        Website / Digital Solutions
                                    </label>

                                    <input type="checkbox" id="service7" name="services_needed[]"
                                        value="Not sure yet" hidden>

                                    <label for="service7" class="service-tag">
                                        Not sure yet
                                    </label>

                                </div>

                            </div>


                            <div class="mb-4">

                                <label class="form-label">
                                    Project Summary <span>*</span>
                                </label>

                                <textarea class="form-control" name="project_summary" rows="4"
                                    placeholder="Briefly tell us what you are looking for"></textarea>

                            </div>

                            <button type="submit" target="_blank" class="btn-whatsapp">

                                Continue to WhatsApp
                                <i class="bi bi-arrow-right"></i>

                            </button>

                            <div class="privacy-note-2">
                                <i class="bi bi-lock-fill"></i>
                                <span>By continuing, your details will be shared with Eagle Networks via
                                    WhatsApp.</span>
                            </div>

                        </form>



                    </div>

                </div>

            </div>

        </div>

    </header>

    <main class="py-4">
        @yield('content')
    </main>

    <script>
        $(document).on('click', '.ajax-link', function(e) {
            e.preventDefault();

            let url = $(this).attr('href');

            $.ajax({
                url: url,
                type: 'GET',
                success: function(response) {

                    let content = $(response).find('#main-content').html();

                    $('#main-content').html(content);

                    history.pushState({}, '', url);
                }
            });
        });

        window.onpopstate = function() {
            location.reload();
        };
    </script>

    @include('includes.website.footer')
</body>


</html>
