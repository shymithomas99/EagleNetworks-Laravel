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
        <nav class="navbar navbar-expand-lg custom-navbar fixed-top" id="mainNavbar">
            <div class="container container-custom">

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

                    <?php
                    $current_page = basename($_SERVER['PHP_SELF']);
                    
                    function activeMenu($page)
                    {
                        global $current_page;
                        return $current_page == $page ? 'active' : '';
                    }
                    ?>

                    <!-- Center Menu -->
                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0 mt-4 mt-lg-0">
                        <li class="nav-item">
                            <a class="nav-link <?= activeMenu('/') ?>" href="/">Home</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link <?= activeMenu('/services') ?>" href="/services">Services</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link <?= activeMenu('/packages') ?>" href="/packages">Packages</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link <?= activeMenu('/contact') ?>" href="/contact">Contact</a>
                        </li>
                    </ul>

                    <!-- Mobile Button -->
                    <div class="d-lg-none mt-3">
                        <a href="/contact" class="commn-btn btn-primary-custom w-100 text-center">
                            Start a Conversation
                        </a>
                    </div>
                </div>

                <!-- Desktop Button Right -->
                <div class="d-none d-lg-block">
                    <a href="/contact" class="commn-btn btn-primary-custom">
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

                    <a href="#" class="btn-cta btn-white-cta">
                        <i class="bi bi-whatsapp"></i>
                        <span>Schedule a Call</span>
                    </a>

                    <a href="/contact" class="btn-cta btn-orange-cta">
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

    </header>

    <main class="py-4">
        @yield('content')
    </main>
    {{--  </div>  --}}
</body>
@include('includes.website.footer')

</html>
