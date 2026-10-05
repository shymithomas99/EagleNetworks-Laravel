<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title') Admin | Eagle Agency | Growth Through Authentic Connection</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/emh-fav-32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/emh-fav-16.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/apple-touch-icon.png') }}">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    @include('includes.admin.header')
    @include('includes.admin.summernote')
    @stack('styles')

    <style>
        body {
            margin: 0;
            background: #f8fafc;
        }

        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            background: #202123;
            overflow-y: auto;
            padding-top: 10px;
        }

        a {
            text-decoration: none !important;
        }


        .main-content {
            margin-left: 250px;
            width: calc(100% - 250px);
        }

        .nav-link {
            color: #fff !important;
            padding: 10px 15px;
            border-radius: 6px;
        }

        .nav-link:hover {
            background: #343a40;
        }

        .nav-link.active {
            background: #f97316 !important;
        }

        .accordion-custom {
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #202123;
            color: #fff;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
        }

        .accordion-custom:hover {
            background: #343a40;
        }

        .accordion-custom.active-parent {
            background: #f97316;
        }

        .accordion-custom .arrow {
            transition: 0.3s;
        }

        /* rotate arrow when open */
        .accordion-custom.active .arrow {
            transform: rotate(180deg);
        }

        .accordion-content {
            display: none;
            padding-left: 15px;
        }

        .accordion-content.show {
            display: block;
        }

        .accordion-button {
            background: #202123;
            color: #fff;
            padding: 10px 15px;
            box-shadow: none;
        }

        .accordion-button.collapsed {
            background: #202123;
        }

        .accordion-button.active-parent {
            background: #f97316 !important;
            color: #fff !important;
        }

        .accordion-button::after {
            filter: brightness(0) invert(1);
        }

        .accordion-body {
            padding-left: 20px;
        }

        .nav-anchor {
            display: block;
            padding: 6px 10px;
            color: #fff;
            border-radius: 4px;
        }

        .nav-anchor:hover {
            background: #343a40;
        }

        .nav-anchor.active {
            background: #f97316;
        }

        .image-upload-wrapper {
            position: relative;
            width: 100%;
        }

        .uploaded-img {
            width: 60px;
            height: 50px;
            border-radius: 10px;
            padding: 10px;
            position: absolute;
            right: -7px;
            z-index: 9;
            top: 50%;
            transform: translateY(-50%);
            pointer-events: none;
        }

        .accordion-custom.sub-accordion .menu-title {
            font-size: 15px;
            font-weight: 400;
            white-space: nowrap;
            display: flex;
            align-items: center;
            gap: 7px;
        }

        .accordion-custom.sub-accordion {
            padding: 10px 12px;
        }

        .sidebar-custom-link {
            display: block;
            color: #fff !important;
            padding: 10px 15px;
            border-radius: 6px;
            text-decoration: none !important;
            background: #202123;
        }

        .sidebar-custom-link:hover {
            background: #343a40;
            color: #fff !important;
        }

        .sidebar-custom-link.active {
            background: #f97316 !important;
            color: #fff !important;
        }

        .sidebar-custom-link i {
            color: #fff !important;
        }
    </style>
</head>

<body>

    <div class="d-flex">

        <!-- SIDEBAR -->
        <nav class="sidebar">

            <div class="text-center mb-4">
                <a href="{{ route('admin.dashboard') }}">
                    <img src="{{ asset('backend_assets/eaglenetworks-logo.png') }}" style="max-width:120px;">
                    <div class="text-white mt-2 fw-bold">Admin Panel</div>
                </a>
            </div>

            <ul class="nav flex-column">

                <!-- Dashboard -->
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}"
                        class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <i class="fa-solid fa-house"></i> Dashboard
                    </a>
                </li>

                <!-- ACCORDION -->
                <li class="nav-item">

                    @php
                        $workActive =
                            request()->routeIs('admin.works.*') || request()->routeIs('admin.work-category.*');
                    @endphp

                    <!-- Home Page -->
                    <div class="bg-dark py-1">
                        <button
                            class="accordion-custom {{ request()->is('admin/home-page*') || request()->is('admin/leads*') ? 'active-parent active' : '' }}"
                            data-target="homePageMenu">
                            <span><i class="fas fa-home"></i> Home Page</span>
                            <i class="fa fa-chevron-down arrow"></i>
                        </button>

                        <div id="homePageMenu"
                            class="accordion-content {{ request()->is('admin/home-page*') || request()->is('admin/leads*') ? 'show' : '' }} py-2">
                            <a href="{{ route('admin.home-page.edit', ['section' => 1, 'is_card' => 0, 'homePage' => 1]) }}"
                                class="nav-anchor {{ request()->is('admin/home-page/1/0*') ? 'active' : '' }}">
                                Banner Intro
                            </a>

                            <button
                                class="accordion-custom sub-accordion {{ request()->is('admin/home-page/2*') ? 'active-parent active' : '' }}"
                                data-target="manageHomePageServiceMenu">Service
                                <i class="fa fa-chevron-down arrow"></i>
                            </button>
                            <div id="manageHomePageServiceMenu"
                                class="accordion-content sub-menu {{ request()->is('admin/home-page/2*') ? 'show' : '' }}">
                                <a href="{{ route('admin.home-page.edit', ['section' => 2, 'is_card' => 0, 'homePage' => 2]) }}"
                                    class="nav-anchor {{ request()->is('admin/home-page/2/0*') ? 'active' : '' }}">
                                    Intro
                                </a>
                                <a href="{{ route('admin.home-page.index', ['section' => 2, 'is_card' => 1]) }}"
                                    class="nav-anchor {{ request()->is('admin/home-page/2/1*') ? 'active' : '' }}">
                                    Cards
                                </a>
                            </div>

                            <button
                                class="accordion-custom sub-accordion {{ request()->is('admin/home-page/3*') ? 'active-parent active' : '' }}"
                                data-target="manageHomePage5CMenu">5 C
                                <i class="fa fa-chevron-down arrow"></i>
                            </button>
                            <div id="manageHomePage5CMenu"
                                class="accordion-content sub-menu {{ request()->is('admin/home-page/3*') ? 'show' : '' }}">
                                <a href="{{ route('admin.home-page.edit', ['section' => 3, 'is_card' => 0, 'homePage' => 3]) }}"
                                    class="nav-anchor {{ request()->is('admin/home-page/3/0*') ? 'active' : '' }}">
                                    Intro
                                </a>
                                <a href="{{ route('admin.home-page.index', ['section' => 3, 'is_card' => 1]) }}"
                                    class="nav-anchor {{ request()->is('admin/home-page/3/1*') ? 'active' : '' }}">
                                    Cards
                                </a>
                            </div>

                            <button
                                class="accordion-custom sub-accordion {{ request()->is('admin/home-page/4*') ? 'active-parent active' : '' }}"
                                data-target="manageHomePageWorkMenu">Work
                                <i class="fa fa-chevron-down arrow"></i>
                            </button>
                            <div id="manageHomePageWorkMenu"
                                class="accordion-content sub-menu {{ request()->is('admin/home-page/4*') ? 'show' : '' }}">
                                <a href="{{ route('admin.home-page.edit', ['section' => 4, 'is_card' => 0, 'homePage' => 4]) }}"
                                    class="nav-anchor {{ request()->is('admin/home-page/4/0*') ? 'active' : '' }}">
                                    Intro
                                </a>
                            </div>

                            <button
                                class="accordion-custom sub-accordion {{ request()->is('admin/home-page/5*') ? 'active-parent active' : '' }}"
                                data-target="manageHomePageClientMenu">Client
                                <i class="fa fa-chevron-down arrow"></i>
                            </button>
                            <div id="manageHomePageClientMenu"
                                class="accordion-content sub-menu {{ request()->is('admin/home-page/5*') ? 'show' : '' }}">
                                <a href="{{ route('admin.home-page.edit', ['section' => 5, 'is_card' => 0, 'homePage' => 5]) }}"
                                    class="nav-anchor {{ request()->is('admin/home-page/5/0*') ? 'active' : '' }}">
                                    Intro
                                </a>
                                <a href="{{ route('admin.home-page.index', ['section' => 5, 'is_card' => 1]) }}"
                                    class="nav-anchor {{ request()->is('admin/home-page/5/1*') ? 'active' : '' }}">
                                    Cards
                                </a>
                            </div>

                            <button
                                class="accordion-custom sub-accordion {{ request()->is('admin/home-page/6*') ? 'active-parent active' : '' }}"
                                data-target="manageHomePageCTAMenu">CTA Banner
                                <i class="fa fa-chevron-down arrow"></i>
                            </button>
                            <div id="manageHomePageCTAMenu"
                                class="accordion-content sub-menu {{ request()->is('admin/home-page/6*') ? 'show' : '' }}">
                                <a href="{{ route('admin.home-page.edit', ['section' => 6, 'is_card' => 0, 'homePage' => 6]) }}"
                                    class="nav-anchor {{ request()->is('admin/home-page/6/0*') ? 'active' : '' }}">
                                    Intro
                                </a>
                                <a href="{{ route('admin.home-page.index', ['section' => 6, 'is_card' => 1]) }}"
                                    class="nav-anchor {{ request()->is('admin/home-page/6/1*') ? 'active' : '' }}">
                                    Cards
                                </a>
                            </div>

                            <button
                                class="accordion-custom sub-accordion {{ request()->is('admin/home-page/7*') ? 'active-parent active' : '' }}"
                                data-target="manageHomePagePackageMenu">Package
                                <i class="fa fa-chevron-down arrow"></i>
                            </button>
                            <div id="manageHomePagePackageMenu"
                                class="accordion-content sub-menu {{ request()->is('admin/home-page/7*') ? 'show' : '' }}">
                                <a href="{{ route('admin.home-page.edit', ['section' => 7, 'is_card' => 0, 'homePage' => 7]) }}"
                                    class="nav-anchor {{ request()->is('admin/home-page/7/0*') ? 'active' : '' }}">
                                    Intro
                                </a>
                            </div>

                            <button
                                class="accordion-custom sub-accordion {{ request()->is('admin/home-page/8*') ? 'active-parent active' : '' }}"
                                data-target="manageHomePageTestimonialMenu">Testimonial
                                <i class="fa fa-chevron-down arrow"></i>
                            </button>
                            <div id="manageHomePageTestimonialMenu"
                                class="accordion-content sub-menu {{ request()->is('admin/home-page/8*') ? 'show' : '' }}">
                                <a href="{{ route('admin.home-page.edit', ['section' => 8, 'is_card' => 0, 'homePage' => 8]) }}"
                                    class="nav-anchor {{ request()->is('admin/home-page/8/0*') ? 'active' : '' }}">
                                    Intro
                                </a>
                                <a href="{{ route('admin.home-page.index', ['section' => 8, 'is_card' => 1]) }}"
                                    class="nav-anchor {{ request()->is('admin/home-page/8/1*') ? 'active' : '' }}">
                                    Cards
                                </a>
                            </div>

                            <button
                                class="accordion-custom sub-accordion {{ request()->is('admin/home-page/9*') ? 'active-parent active' : '' }}"
                                data-target="manageHomePageValueMenu">Value
                                <i class="fa fa-chevron-down arrow"></i>
                            </button>
                            <div id="manageHomePageValueMenu"
                                class="accordion-content sub-menu {{ request()->is('admin/home-page/9*') ? 'show' : '' }}">
                                <a href="{{ route('admin.home-page.edit', ['section' => 9, 'is_card' => 0, 'homePage' => 9]) }}"
                                    class="nav-anchor {{ request()->is('admin/home-page/9/0*') ? 'active' : '' }}">
                                    Intro
                                </a>
                                <a href="{{ route('admin.home-page.index', ['section' => 9, 'is_card' => 1]) }}"
                                    class="nav-anchor {{ request()->is('admin/home-page/9/1*') ? 'active' : '' }}">
                                    Cards
                                </a>
                            </div>

                            <a href="{{ route('admin.home-page.edit', ['section' => 10, 'is_card' => 0, 'homePage' => 10]) }}"
                                class="nav-anchor {{ request()->is('admin/home-page/10/0*') ? 'active' : '' }}">
                                CTA Banner (Bottom) Intro
                            </a>

                        </div>
                    </div>

                    <!-- Services Page -->
                    <div class="bg-dark py-1">
                        <button
                            class="accordion-custom {{ request()->is('admin/services-page*') ? 'active-parent active' : '' }}"
                            data-target="servicesPageMenu">
                            <span><i class="fas fa-tools"></i> Services Page</span>
                            <i class="fa fa-chevron-down arrow"></i>
                        </button>

                        <div id="servicesPageMenu"
                            class="accordion-content {{ request()->is('admin/services-page*') ? 'show' : '' }} py-2">
                            <a href="{{ route('admin.services-page.edit', ['section' => 1, 'is_card' => 0, 'servicesPage' => 1]) }}"
                                class="nav-anchor {{ request()->is('admin/services-page/1/0*') ? 'active' : '' }}">
                                Banner Intro
                            </a>

                            <button
                                class="accordion-custom sub-accordion {{ request()->is('admin/services-page/2*') ? 'active-parent active' : '' }}"
                                data-target="manageServicesMenu">Services
                                <i class="fa fa-chevron-down arrow"></i>
                            </button>
                            <div id="manageServicesMenu"
                                class="accordion-content sub-menu {{ request()->is('admin/services-page/2*') ? 'show' : '' }}">
                                <a href="{{ route('admin.services-page.edit', ['section' => 2, 'is_card' => 0, 'servicesPage' => 2]) }}"
                                    class="nav-anchor {{ request()->is('admin/services-page/2/0*') ? 'active' : '' }}">
                                    Intro
                                </a>
                                <a href="{{ route('admin.services-page.index', ['section' => 2, 'is_card' => 1]) }}"
                                    class="nav-anchor {{ request()->is('admin/services-page/2/1*') ? 'active' : '' }}">
                                    Cards
                                </a>
                            </div>

                            <button
                                class="accordion-custom sub-accordion {{ request()->is('admin/services-page/3*') ? 'active-parent active' : '' }}"
                                data-target="manageHowWeCreateMenu">How We Create
                                <i class="fa fa-chevron-down arrow"></i>
                            </button>
                            <div id="manageHowWeCreateMenu"
                                class="accordion-content sub-menu {{ request()->is('admin/services-page/3*') ? 'show' : '' }}">
                                <a href="{{ route('admin.services-page.edit', ['section' => 3, 'is_card' => 0, 'servicesPage' => 3]) }}"
                                    class="nav-anchor {{ request()->is('admin/services-page/3/0*') ? 'active' : '' }}">
                                    Intro
                                </a>
                                <a href="{{ route('admin.services-page.index', ['section' => 3, 'is_card' => 1]) }}"
                                    class="nav-anchor {{ request()->is('admin/services-page/3/1*') ? 'active' : '' }}">
                                    Cards
                                </a>
                            </div>

                            <button
                                class="accordion-custom sub-accordion {{ request()->is('admin/services-page/4*') ? 'active-parent active' : '' }}"
                                data-target="manageInitiativesMenu">Projects
                                <i class="fa fa-chevron-down arrow"></i>
                            </button>
                            <div id="manageInitiativesMenu"
                                class="accordion-content sub-menu {{ request()->is('admin/services-page/4*') ? 'show' : '' }}">
                                <a href="{{ route('admin.services-page.edit', ['section' => 4, 'is_card' => 0, 'servicesPage' => 4]) }}"
                                    class="nav-anchor {{ request()->is('admin/services-page/4/0*') ? 'active' : '' }}">
                                    Intro
                                </a>
                                <a href="{{ route('admin.services-page.index', ['section' => 4, 'is_card' => 1]) }}"
                                    class="nav-anchor {{ request()->is('admin/services-page/4/1*') ? 'active' : '' }}">
                                    Cards
                                </a>
                            </div>

                            <button
                                class="accordion-custom sub-accordion {{ request()->is('admin/services-page/5*') ? 'active-parent active' : '' }}"
                                data-target="manageHowWeDeliverMenu">How We Deliver
                                <i class="fa fa-chevron-down arrow"></i>
                            </button>
                            <div id="manageHowWeDeliverMenu"
                                class="accordion-content sub-menu {{ request()->is('admin/services-page/5*') ? 'show' : '' }}">
                                <a href="{{ route('admin.services-page.edit', ['section' => 5, 'is_card' => 0, 'servicesPage' => 5]) }}"
                                    class="nav-anchor {{ request()->is('admin/services-page/5/0*') ? 'active' : '' }}">
                                    Intro
                                </a>
                                <a href="{{ route('admin.services-page.index', ['section' => 5, 'is_card' => 1]) }}"
                                    class="nav-anchor {{ request()->is('admin/services-page/5/1*') ? 'active' : '' }}">
                                    Cards
                                </a>
                            </div>

                            <a href="{{ route('admin.services-page.edit', ['section' => 7, 'is_card' => 0, 'servicesPage' => 6]) }}"
                                class="nav-anchor {{ request()->is('admin/services-page/7/0*') ? 'active' : '' }}">
                                CTA Banner Intro
                            </a>

                            <button
                                class="accordion-custom sub-accordion {{ request()->is('admin/services/8*') ? 'active-parent active' : '' }}"
                                data-target="manageServiceFAQMenu">FAQ
                                <i class="fa fa-chevron-down arrow"></i>
                            </button>
                            <div id="manageServiceFAQMenu"
                                class="accordion-content sub-menu {{ request()->is('admin/services-page/8*') ? 'show' : '' }}">
                                <a href="{{ route('admin.services-page.edit', ['section' => 8, 'is_card' => 0, 'servicesPage' => 7]) }}"
                                    class="nav-anchor {{ request()->is('admin/services-page/8/0*') ? 'active' : '' }}">
                                    Intro
                                </a>
                                <a href="{{ route('admin.services-page.index', ['section' => 8, 'is_card' => 1]) }}"
                                    class="nav-anchor {{ request()->is('admin/services-page/8/1*') ? 'active' : '' }}">
                                    Cards
                                </a>
                            </div>

                            <a href="{{ route('admin.services-page.edit', ['section' => 9, 'is_card' => 0, 'servicesPage' => 8]) }}"
                                class="nav-anchor {{ request()->is('admin/services-page/9/0*') ? 'active' : '' }}">
                                CTA Banner (Bottom) Intro
                            </a>

                        </div>
                    </div>

                    <!-- Packages Page -->
                    <div class="bg-dark py-1">
                        <button
                            class="accordion-custom {{ request()->is('admin/packages-page*') || request()->is('admin/packages*') ? 'active-parent active' : '' }}"
                            data-target="packagesPageMenu">
                            <span><i class="fas fa-boxes"></i> Packages Page</span>
                            <i class="fa fa-chevron-down arrow"></i>
                        </button>

                        <div id="packagesPageMenu"
                            class="accordion-content {{ request()->is('admin/packages-page*') || request()->is('admin/packages*') ? 'show' : '' }} py-2">
                            <a href="{{ route('admin.packages-page.edit', ['section' => 1, 'is_card' => 0, 'packagesPage' => 1]) }}"
                                class="nav-anchor {{ request()->is('admin/packages-page/1/0*') ? 'active' : '' }}">
                                Banner Intro
                            </a>

                            <button
                                class="accordion-custom sub-accordion {{ request()->is('admin/packages-page/2*') ? 'active-parent active' : '' }}"
                                data-target="manageGuideMenu">Guide
                                <i class="fa fa-chevron-down arrow"></i>
                            </button>
                            <div id="manageGuideMenu"
                                class="accordion-content sub-menu {{ request()->is('admin/packages-page/2*') ? 'show' : '' }}">
                                <a href="{{ route('admin.packages-page.edit', ['section' => 2, 'is_card' => 0, 'packagesPage' => 2]) }}"
                                    class="nav-anchor {{ request()->is('admin/packages-page/2/0*') ? 'active' : '' }}">
                                    Intro
                                </a>
                                <a href="{{ route('admin.packages-page.index', ['section' => 2, 'is_card' => 1]) }}"
                                    class="nav-anchor {{ request()->is('admin/packages-page/2/1*') ? 'active' : '' }}">
                                    Cards
                                </a>
                            </div>

                            <button
                                class="accordion-custom sub-accordion {{ request()->is('admin/packages-page/3*') || request()->is('admin/packages*') ? 'active-parent active' : '' }}"
                                data-target="managePackagesMenu">Packages
                                <i class="fa fa-chevron-down arrow"></i>
                            </button>
                            <div id="managePackagesMenu"
                                class="accordion-content sub-menu {{ request()->is('admin/packages-page/3*') || request()->is('admin/packages*') ? 'show' : '' }}">
                                <a href="{{ route('admin.packages-page.edit', ['section' => 3, 'is_card' => 0, 'packagesPage' => 3]) }}"
                                    class="nav-anchor {{ request()->is('admin/packages-page/3/0*') ? 'active' : '' }}">
                                    Intro
                                </a>
                                <a href="{{ route('admin.packages-page.index', ['section' => 3, 'is_card' => 1]) }}"
                                    class="nav-anchor {{ request()->is('admin/packages-page/3/1*') || request()->is('admin/packages*') ? 'active' : '' }}">
                                    Cards
                                </a>
                            </div>

                            <a href="{{ route('admin.packages-page.edit', ['section' => 4, 'is_card' => 0, 'packagesPage' => 4]) }}"
                                class="nav-anchor {{ request()->is('admin/packages-page/4/0*') ? 'active' : '' }}">
                                CTA Banner Intro
                            </a>

                            <button
                                class="accordion-custom sub-accordion {{ request()->is('admin/packages-page/5*') ? 'active-parent active' : '' }}"
                                data-target="manageWhatYouGetMenu">What You Get
                                <i class="fa fa-chevron-down arrow"></i>
                            </button>
                            <div id="manageWhatYouGetMenu"
                                class="accordion-content sub-menu {{ request()->is('admin/packages-page/5*') ? 'show' : '' }}">
                                <a href="{{ route('admin.packages-page.edit', ['section' => 5, 'is_card' => 0, 'packagesPage' => 5]) }}"
                                    class="nav-anchor {{ request()->is('admin/packages-page/5/0*') ? 'active' : '' }}">
                                    Intro
                                </a>
                                <a href="{{ route('admin.packages-page.index', ['section' => 5, 'is_card' => 1]) }}"
                                    class="nav-anchor {{ request()->is('admin/packages-page/5/1*') ? 'active' : '' }}">
                                    Cards
                                </a>
                            </div>

                            <button
                                class="accordion-custom sub-accordion {{ request()->is('admin/packages-page/6*') ? 'active-parent active' : '' }}"
                                data-target="managePackageFAQMenu">FAQ
                                <i class="fa fa-chevron-down arrow"></i>
                            </button>
                            <div id="managePackageFAQMenu"
                                class="accordion-content sub-menu {{ request()->is('admin/packages-page/6*') ? 'show' : '' }}">
                                <a href="{{ route('admin.packages-page.edit', ['section' => 6, 'is_card' => 0, 'packagesPage' => 6]) }}"
                                    class="nav-anchor {{ request()->is('admin/packages-page/6/0*') ? 'active' : '' }}">
                                    Intro
                                </a>
                                <a href="{{ route('admin.packages-page.index', ['section' => 6, 'is_card' => 1]) }}"
                                    class="nav-anchor {{ request()->is('admin/packages-page/6/1*') ? 'active' : '' }}">
                                    Cards
                                </a>
                            </div>

                            <a href="{{ route('admin.packages-page.edit', ['section' => 7, 'is_card' => 0, 'packagesPage' => 7]) }}"
                                class="nav-anchor {{ request()->is('admin/packages-page/7/0*') ? 'active' : '' }}">
                                CTA Banner (Bottom) Intro
                            </a>

                        </div>
                    </div>

                    <!-- London Page -->
                    <div class="bg-dark py-1">
                        <button
                            class="accordion-custom {{ request()->is('admin/london-page*') ? 'active-parent active' : '' }}"
                            data-target="londonPageMenu">
                            <span><i class="fas fa-location"></i> London Page</span>
                            <i class="fa fa-chevron-down arrow"></i>
                        </button>

                        <div id="londonPageMenu"
                            class="accordion-content {{ request()->is('admin/london-page*') ? 'show' : '' }} py-2">
                            <a href="{{ route('admin.london-page.edit', ['section' => 1, 'is_card' => 0, 'londonPage' => 1]) }}"
                                class="nav-anchor {{ request()->is('admin/london-page/1/0*') ? 'active' : '' }}">
                                Banner Intro
                            </a>
                            <a href="{{ route('admin.london-page.edit', ['section' => 2, 'is_card' => 0, 'londonPage' => 2]) }}"
                                class="nav-anchor {{ request()->is('admin/london-page/2/0*') ? 'active' : '' }}">
                                Strategic Hub Intro
                            </a>


                            <button
                                class="accordion-custom sub-accordion {{ request()->is('admin/london-page/3*') ? 'active-parent active' : '' }}"
                                data-target="manageNumbersMenu">Numbers
                                <i class="fa fa-chevron-down arrow"></i>
                            </button>
                            <div id="manageNumbersMenu"
                                class="accordion-content sub-menu {{ request()->is('admin/london-page/3*') ? 'show' : '' }}">
                                <a href="{{ route('admin.london-page.edit', ['section' => 3, 'is_card' => 0, 'londonPage' => 3]) }}"
                                    class="nav-anchor {{ request()->is('admin/london-page/3/0*') ? 'active' : '' }}">
                                    Intro
                                </a>
                                <a href="{{ route('admin.london-page.index', ['section' => 3, 'is_card' => 1]) }}"
                                    class="nav-anchor {{ request()->is('admin/london-page/3/1*') ? 'active' : '' }}">
                                    Cards
                                </a>
                            </div>

                            <button
                                class="accordion-custom sub-accordion {{ request()->is('admin/london-page/4*') ? 'active-parent active' : '' }}"
                                data-target="manageBuiltFor">Built For
                                <i class="fa fa-chevron-down arrow"></i>
                            </button>
                            <div id="manageBuiltFor"
                                class="accordion-content sub-menu {{ request()->is('admin/london-page/4*') ? 'show' : '' }}">
                                <a href="{{ route('admin.london-page.edit', ['section' => 4, 'is_card' => 0, 'londonPage' => 4]) }}"
                                    class="nav-anchor {{ request()->is('admin/london-page/4/0*') ? 'active' : '' }}">
                                    Intro
                                </a>
                                <a href="{{ route('admin.london-page.index', ['section' => 4, 'is_card' => 1]) }}"
                                    class="nav-anchor {{ request()->is('admin/london-page/4/1*') ? 'active' : '' }}">
                                    Cards
                                </a>
                            </div>

                            <button
                                class="accordion-custom sub-accordion {{ request()->is('admin/london-page/5*') ? 'active-parent active' : '' }}"
                                data-target="manageWhatWeDoMenu">What We Do
                                <i class="fa fa-chevron-down arrow"></i>
                            </button>
                            <div id="manageWhatWeDoMenu"
                                class="accordion-content sub-menu {{ request()->is('admin/london-page/5*') ? 'show' : '' }}">
                                <a href="{{ route('admin.london-page.edit', ['section' => 5, 'is_card' => 0, 'londonPage' => 5]) }}"
                                    class="nav-anchor {{ request()->is('admin/london-page/5/0*') ? 'active' : '' }}">
                                    Intro
                                </a>
                                <a href="{{ route('admin.london-page.index', ['section' => 5, 'is_card' => 1]) }}"
                                    class="nav-anchor {{ request()->is('admin/london-page/5/1*') ? 'active' : '' }}">
                                    Cards
                                </a>
                            </div>

                            <button
                                class="accordion-custom sub-accordion {{ request()->is('admin/london-page/6*') ? 'active-parent active' : '' }}"
                                data-target="manageWeServeMenu">We Serve
                                <i class="fa fa-chevron-down arrow"></i>
                            </button>
                            <div id="manageWeServeMenu"
                                class="accordion-content sub-menu {{ request()->is('admin/london-page/6*') ? 'show' : '' }}">
                                <a href="{{ route('admin.london-page.edit', ['section' => 6, 'is_card' => 0, 'londonPage' => 6]) }}"
                                    class="nav-anchor {{ request()->is('admin/london-page/6/0*') ? 'active' : '' }}">
                                    Intro
                                </a>
                                <a href="{{ route('admin.london-page.index', ['section' => 6, 'is_card' => 1]) }}"
                                    class="nav-anchor {{ request()->is('admin/london-page/6/1*') ? 'active' : '' }}">
                                    Cards
                                </a>
                            </div>

                            <button
                                class="accordion-custom sub-accordion {{ request()->is('admin/london-page/7*') ? 'active-parent active' : '' }}"
                                data-target="manageServicesDeliveredMenu">Services Delivered
                                <i class="fa fa-chevron-down arrow"></i>
                            </button>
                            <div id="manageServicesDeliveredMenu"
                                class="accordion-content sub-menu {{ request()->is('admin/london-page/7*') ? 'show' : '' }}">
                                <a href="{{ route('admin.london-page.edit', ['section' => 7, 'is_card' => 0, 'londonPage' => 7]) }}"
                                    class="nav-anchor {{ request()->is('admin/london-page/7/0*') ? 'active' : '' }}">
                                    Intro
                                </a>
                                <a href="{{ route('admin.london-page.index', ['section' => 7, 'is_card' => 1]) }}"
                                    class="nav-anchor {{ request()->is('admin/london-page/7/1*') ? 'active' : '' }}">
                                    Cards
                                </a>
                            </div>

                            <button
                                class="accordion-custom sub-accordion {{ request()->is('admin/london-page/8*') ? 'active-parent active' : '' }}"
                                data-target="manageWhyChooseUsMenu">Why Choose Us
                                <i class="fa fa-chevron-down arrow"></i>
                            </button>
                            <div id="manageWhyChooseUsMenu"
                                class="accordion-content sub-menu {{ request()->is('admin/london-page/8*') ? 'show' : '' }}">
                                <a href="{{ route('admin.london-page.edit', ['section' => 8, 'is_card' => 0, 'londonPage' => 8]) }}"
                                    class="nav-anchor {{ request()->is('admin/london-page/8/0*') ? 'active' : '' }}">
                                    Intro
                                </a>
                                <a href="{{ route('admin.london-page.index', ['section' => 8, 'is_card' => 1]) }}"
                                    class="nav-anchor {{ request()->is('admin/london-page/8/1*') ? 'active' : '' }}">
                                    Cards
                                </a>
                            </div>

                            <a href="{{ route('admin.london-page.edit', ['section' => 9, 'is_card' => 0, 'londonPage' => 9]) }}"
                                class="nav-anchor {{ request()->is('admin/london-page/9/0*') ? 'active' : '' }}">
                                Integrated Organization Intro
                            </a>

                            <button
                                class="accordion-custom sub-accordion {{ request()->is('admin/london/10*') ? 'active-parent active' : '' }}"
                                data-target="manageLondonPageFAQMenu">FAQ
                                <i class="fa fa-chevron-down arrow"></i>
                            </button>
                            <div id="manageLondonPageFAQMenu"
                                class="accordion-content sub-menu {{ request()->is('admin/london-page/10*') ? 'show' : '' }}">
                                <a href="{{ route('admin.london-page.edit', ['section' => 10, 'is_card' => 0, 'londonPage' => 10]) }}"
                                    class="nav-anchor {{ request()->is('admin/london-page/10/0*') ? 'active' : '' }}">
                                    Intro
                                </a>
                                <a href="{{ route('admin.london-page.index', ['section' => 10, 'is_card' => 1]) }}"
                                    class="nav-anchor {{ request()->is('admin/london-page/10/1*') ? 'active' : '' }}">
                                    Cards
                                </a>
                            </div>

                            <a href="{{ route('admin.london-page.edit', ['section' => 11, 'is_card' => 0, 'londonPage' => 11]) }}"
                                class="nav-anchor {{ request()->is('admin/london-page/11/0*') ? 'active' : '' }}">
                                CTA Banner (Bottom) Intro
                            </a>

                        </div>
                    </div>

                    <!-- Accra Page -->
                    <div class="bg-dark py-1">
                        <button
                            class="accordion-custom {{ request()->is('admin/accra-page*') ? 'active-parent active' : '' }}"
                            data-target="accraPageMenu">
                            <span><i class="fas fa-location"></i> Accra Page</span>
                            <i class="fa fa-chevron-down arrow"></i>
                        </button>

                        <div id="accraPageMenu"
                            class="accordion-content {{ request()->is('admin/accra-page*') ? 'show' : '' }} py-2">
                            <a href="{{ route('admin.accra-page.edit', ['section' => 1, 'is_card' => 0, 'accraPage' => 1]) }}"
                                class="nav-anchor {{ request()->is('admin/accra-page/1/0*') ? 'active' : '' }}">
                                Banner Intro
                            </a>
                            <a href="{{ route('admin.accra-page.edit', ['section' => 2, 'is_card' => 0, 'accraPage' => 2]) }}"
                                class="nav-anchor {{ request()->is('admin/accra-page/2/0*') ? 'active' : '' }}">
                                Strategic Hub Intro
                            </a>


                            <button
                                class="accordion-custom sub-accordion {{ request()->is('admin/accra-page/3*') ? 'active-parent active' : '' }}"
                                data-target="manageNumbersMenu">Numbers
                                <i class="fa fa-chevron-down arrow"></i>
                            </button>
                            <div id="manageNumbersMenu"
                                class="accordion-content sub-menu {{ request()->is('admin/accra-page/3*') ? 'show' : '' }}">
                                <a href="{{ route('admin.accra-page.edit', ['section' => 3, 'is_card' => 0, 'accraPage' => 3]) }}"
                                    class="nav-anchor {{ request()->is('admin/accra-page/3/0*') ? 'active' : '' }}">
                                    Intro
                                </a>
                                <a href="{{ route('admin.accra-page.index', ['section' => 3, 'is_card' => 1]) }}"
                                    class="nav-anchor {{ request()->is('admin/accra-page/3/1*') ? 'active' : '' }}">
                                    Cards
                                </a>
                            </div>

                            <button
                                class="accordion-custom sub-accordion {{ request()->is('admin/accra-page/4*') ? 'active-parent active' : '' }}"
                                data-target="manageBuiltFor">Built For
                                <i class="fa fa-chevron-down arrow"></i>
                            </button>
                            <div id="manageBuiltFor"
                                class="accordion-content sub-menu {{ request()->is('admin/accra-page/4*') ? 'show' : '' }}">
                                <a href="{{ route('admin.accra-page.edit', ['section' => 4, 'is_card' => 0, 'accraPage' => 4]) }}"
                                    class="nav-anchor {{ request()->is('admin/accra-page/4/0*') ? 'active' : '' }}">
                                    Intro
                                </a>
                                <a href="{{ route('admin.accra-page.index', ['section' => 4, 'is_card' => 1]) }}"
                                    class="nav-anchor {{ request()->is('admin/accra-page/4/1*') ? 'active' : '' }}">
                                    Cards
                                </a>
                            </div>

                            <button
                                class="accordion-custom sub-accordion {{ request()->is('admin/accra-page/5*') ? 'active-parent active' : '' }}"
                                data-target="manageWhatWeDoMenu">What We Do
                                <i class="fa fa-chevron-down arrow"></i>
                            </button>
                            <div id="manageWhatWeDoMenu"
                                class="accordion-content sub-menu {{ request()->is('admin/accra-page/5*') ? 'show' : '' }}">
                                <a href="{{ route('admin.accra-page.edit', ['section' => 5, 'is_card' => 0, 'accraPage' => 5]) }}"
                                    class="nav-anchor {{ request()->is('admin/accra-page/5/0*') ? 'active' : '' }}">
                                    Intro
                                </a>
                                <a href="{{ route('admin.accra-page.index', ['section' => 5, 'is_card' => 1]) }}"
                                    class="nav-anchor {{ request()->is('admin/accra-page/5/1*') ? 'active' : '' }}">
                                    Cards
                                </a>
                            </div>

                            <button
                                class="accordion-custom sub-accordion {{ request()->is('admin/accra-page/6*') ? 'active-parent active' : '' }}"
                                data-target="manageWeServeMenu">We Serve
                                <i class="fa fa-chevron-down arrow"></i>
                            </button>
                            <div id="manageWeServeMenu"
                                class="accordion-content sub-menu {{ request()->is('admin/accra-page/6*') ? 'show' : '' }}">
                                <a href="{{ route('admin.accra-page.edit', ['section' => 6, 'is_card' => 0, 'accraPage' => 6]) }}"
                                    class="nav-anchor {{ request()->is('admin/accra-page/6/0*') ? 'active' : '' }}">
                                    Intro
                                </a>
                                <a href="{{ route('admin.accra-page.index', ['section' => 6, 'is_card' => 1]) }}"
                                    class="nav-anchor {{ request()->is('admin/accra-page/6/1*') ? 'active' : '' }}">
                                    Cards
                                </a>
                            </div>

                            <button
                                class="accordion-custom sub-accordion {{ request()->is('admin/accra-page/7*') ? 'active-parent active' : '' }}"
                                data-target="manageServicesDeliveredMenu">Services Delivered
                                <i class="fa fa-chevron-down arrow"></i>
                            </button>
                            <div id="manageServicesDeliveredMenu"
                                class="accordion-content sub-menu {{ request()->is('admin/accra-page/7*') ? 'show' : '' }}">
                                <a href="{{ route('admin.accra-page.edit', ['section' => 7, 'is_card' => 0, 'accraPage' => 7]) }}"
                                    class="nav-anchor {{ request()->is('admin/accra-page/7/0*') ? 'active' : '' }}">
                                    Intro
                                </a>
                                <a href="{{ route('admin.accra-page.index', ['section' => 7, 'is_card' => 1]) }}"
                                    class="nav-anchor {{ request()->is('admin/accra-page/7/1*') ? 'active' : '' }}">
                                    Cards
                                </a>
                            </div>

                            <button
                                class="accordion-custom sub-accordion {{ request()->is('admin/accra-page/8*') ? 'active-parent active' : '' }}"
                                data-target="manageWhyChooseUsMenu">Why Choose Us
                                <i class="fa fa-chevron-down arrow"></i>
                            </button>
                            <div id="manageWhyChooseUsMenu"
                                class="accordion-content sub-menu {{ request()->is('admin/accra-page/8*') ? 'show' : '' }}">
                                <a href="{{ route('admin.accra-page.edit', ['section' => 8, 'is_card' => 0, 'accraPage' => 8]) }}"
                                    class="nav-anchor {{ request()->is('admin/accra-page/8/0*') ? 'active' : '' }}">
                                    Intro
                                </a>
                                <a href="{{ route('admin.accra-page.index', ['section' => 8, 'is_card' => 1]) }}"
                                    class="nav-anchor {{ request()->is('admin/accra-page/8/1*') ? 'active' : '' }}">
                                    Cards
                                </a>
                            </div>

                            <a href="{{ route('admin.accra-page.edit', ['section' => 9, 'is_card' => 0, 'accraPage' => 9]) }}"
                                class="nav-anchor {{ request()->is('admin/accra-page/9/0*') ? 'active' : '' }}">
                                Integrated Organization Intro
                            </a>

                            <button
                                class="accordion-custom sub-accordion {{ request()->is('admin/accra/10*') ? 'active-parent active' : '' }}"
                                data-target="manageAccraPageFAQMenu">FAQ
                                <i class="fa fa-chevron-down arrow"></i>
                            </button>
                            <div id="manageAccraPageFAQMenu"
                                class="accordion-content sub-menu {{ request()->is('admin/accra-page/10*') ? 'show' : '' }}">
                                <a href="{{ route('admin.accra-page.edit', ['section' => 10, 'is_card' => 0, 'accraPage' => 10]) }}"
                                    class="nav-anchor {{ request()->is('admin/accra-page/10/0*') ? 'active' : '' }}">
                                    Intro
                                </a>
                                <a href="{{ route('admin.accra-page.index', ['section' => 10, 'is_card' => 1]) }}"
                                    class="nav-anchor {{ request()->is('admin/accra-page/10/1*') ? 'active' : '' }}">
                                    Cards
                                </a>
                            </div>

                            <a href="{{ route('admin.accra-page.edit', ['section' => 11, 'is_card' => 0, 'accraPage' => 11]) }}"
                                class="nav-anchor {{ request()->is('admin/accra-page/11/0*') ? 'active' : '' }}">
                                CTA Banner (Bottom) Intro
                            </a>

                        </div>
                    </div>

                    <!-- WORK -->
                    {{-- <div class="bg-dark py-1">
                        <button class="accordion-custom {{ $workActive ? 'active-parent active' : '' }}"
                            data-target="workMenu">
                            <span><i class="fas fa-briefcase"></i> Manage Work</span>
                            <i class="fa fa-chevron-down arrow"></i>
                        </button>

                        <div id="workMenu" class="accordion-content {{ $workActive ? 'show' : '' }} py-2">
                            <a href="{{ route('admin.work-category.index') }}"
                                class="nav-anchor {{ request()->routeIs('admin.work-category.*') ? 'active' : '' }}">
                                Category
                            </a>

                            <a href="{{ route('admin.works.index') }}"
                                class="nav-anchor {{ request()->routeIs('admin.works.*') ? 'active' : '' }}">
                                Work
                            </a>
                        </div>
                    </div> --}}

                    <!-- Work Page -->
                    <div class="bg-dark py-1">
                        <button
                            class="accordion-custom {{ request()->is('admin/work-page*') || request()->is('admin/works*') || request()->is('admin/work-category*') || request()->is('admin/videos*') || request()->is('admin/categories*') ? 'active-parent active' : '' }}"
                            data-target="workPageMenu">
                            <span><i class="fas fa-briefcase"></i> Work Page</span>
                            <i class="fa fa-chevron-down arrow"></i>
                        </button>

                        <div id="workPageMenu"
                            class="accordion-content {{ request()->is('admin/work-page*') || request()->is('admin/works*') || request()->is('admin/work-category*') || request()->is('admin/videos*') || request()->is('admin/categories*') ? 'show' : '' }} py-2">
                            <a href="{{ route('admin.work-page.edit', ['section' => 1, 'is_card' => 0, 'workPage' => 1]) }}"
                                class="nav-anchor {{ request()->is('admin/work-page/1/0*') ? 'active' : '' }}">
                                Banner Intro
                            </a>
                            <a href="{{ route('admin.work-category.index') }}"
                                class="nav-anchor {{ request()->is('admin/work-category*') ? 'active' : '' }}">
                                Work Categories
                            </a>
                            <button
                                class="accordion-custom sub-accordion {{ request()->is('admin/work-page/2*') ? 'active-parent active' : '' }}"
                                data-target="manageWorkPageProcessMenu">Process
                                <i class="fa fa-chevron-down arrow"></i>
                            </button>
                            <div id="manageWorkPageProcessMenu"
                                class="accordion-content sub-menu {{ request()->is('admin/work-page/2*') ? 'show' : '' }}">
                                <a href="{{ route('admin.work-page.edit', ['section' => 2, 'is_card' => 0, 'workPage' => 2]) }}"
                                    class="nav-anchor {{ request()->is('admin/work-page/2/0*') ? 'active' : '' }}">
                                    Intro
                                </a>
                                <a href="{{ route('admin.work-page.index', ['section' => 2, 'is_card' => 1]) }}"
                                    class="nav-anchor {{ request()->is('admin/work-page/2/1*') ? 'active' : '' }}">
                                    Cards
                                </a>
                            </div>
                            <button
                                class="accordion-custom sub-accordion {{ request()->is('admin/work-page/3*') || request()->is('admin/works*') ? 'active-parent active' : '' }}"
                                data-target="manageWorkPageWorkMenu">Work
                                <i class="fa fa-chevron-down arrow"></i>
                            </button>
                            <div id="manageWorkPageWorkMenu"
                                class="accordion-content sub-menu {{ request()->is('admin/work-page/3*') || request()->is('admin/works*') ? 'show' : '' }}">
                                <a href="{{ route('admin.work-page.edit', ['section' => 3, 'is_card' => 0, 'workPage' => 3]) }}"
                                    class="nav-anchor {{ request()->is('admin/work-page/3/0*') ? 'active' : '' }}">
                                    Intro
                                </a>
                                <a href="{{ route('admin.works.index') }}"
                                    class="nav-anchor {{ request()->is('admin/works*') ? 'active' : '' }}">
                                    Cards
                                </a>
                            </div>

                            <button
                                class="accordion-custom sub-accordion {{ request()->is('admin/work-page/4*') ? 'active-parent active' : '' }}"
                                data-target="manageWorkPageProjectMenu">Project
                                <i class="fa fa-chevron-down arrow"></i>
                            </button>
                            <div id="manageWorkPageProjectMenu"
                                class="accordion-content sub-menu {{ request()->is('admin/work-page/4*') ? 'show' : '' }}">
                                <a href="{{ route('admin.work-page.edit', ['section' => 4, 'is_card' => 0, 'workPage' => 4]) }}"
                                    class="nav-anchor {{ request()->is('admin/work-page/4/0*') ? 'active' : '' }}">
                                    Intro
                                </a>
                                <a href="{{ route('admin.work-page.index', ['section' => 4, 'is_card' => 1]) }}"
                                    class="nav-anchor {{ request()->is('admin/work-page/4/1*') ? 'active' : '' }}">
                                    Cards
                                </a>
                            </div>

                            <button
                                class="accordion-custom sub-accordion {{ request()->is('admin/work-page/5*') || request()->is('admin/videos*') || request()->is('admin/categories*') ? 'active-parent active' : '' }}"
                                data-target="manageWorkPageVideoMenu">Video
                                <i class="fa fa-chevron-down arrow"></i>
                            </button>
                            <div id="manageWorkPageVideoMenu"
                                class="accordion-content sub-menu {{ request()->is('admin/work-page/5*') || request()->is('admin/videos*') || request()->is('admin/categories*') ? 'show' : '' }}">
                                <a href="{{ route('admin.work-page.edit', ['section' => 5, 'is_card' => 0, 'workPage' => 5]) }}"
                                    class="nav-anchor {{ request()->is('admin/work-page/5/0*') ? 'active' : '' }}">
                                    Intro
                                </a>
                                <a href="{{ route('admin.categories.index') }}"
                                    class="nav-anchor {{ request()->is('admin/categories*') ? 'active' : '' }}">
                                    Categories
                                </a>
                                <a href="{{ route('admin.videos.index') }}"
                                    class="nav-anchor {{ request()->is('admin/videos*') ? 'active' : '' }}">
                                    Cards
                                </a>
                            </div>

                            <a href="{{ route('admin.work-page.edit', ['section' => 6, 'is_card' => 0, 'workPage' => 6]) }}"
                                class="nav-anchor {{ request()->is('admin/work-page/6/0*') ? 'active' : '' }}">
                                CTA Banner (Bottom) Intro
                            </a>

                        </div>
                    </div>

                    <!-- Insights Page -->
                    <div class="bg-dark py-1">
                        <button
                            class="accordion-custom {{ request()->is('admin/insights-page*') || request()->is('admin/blogs*') || request()->is('admin/blog-category*') ? 'active-parent active' : '' }}"
                            data-target="insightsPageMenu">
                            <span><i class="fas fa-blog"></i> Insights Page</span>
                            <i class="fa fa-chevron-down arrow"></i>
                        </button>

                        <div id="insightsPageMenu"
                            class="accordion-content {{ request()->is('admin/insights-page*') || request()->is('admin/blogs*') || request()->is('admin/blog-category*') ? 'show' : '' }} py-2">
                            <a href="{{ route('admin.insights-page.edit', ['section' => 1, 'is_card' => 0, 'insightsPage' => 1]) }}"
                                class="nav-anchor {{ request()->is('admin/insights-page/1/0*') ? 'active' : '' }}">
                                Banner Intro
                            </a>
                            <button
                                class="accordion-custom sub-accordion {{ request()->is('admin/blogs*') || request()->is('admin/blog-category*') ? 'active-parent active' : '' }}"
                                data-target="manageInsightsPageBlogMenu">Blog
                                <i class="fa fa-chevron-down arrow"></i>
                            </button>
                            <div id="manageInsightsPageBlogMenu"
                                class="accordion-content sub-menu {{ request()->is('admin/blogs*') || request()->is('admin/blog-category*') ? 'show' : '' }}">
                                <a href="{{ route('admin.blog-category.index') }}"
                                    class="nav-anchor {{ request()->is('admin/blog-category*') ? 'active' : '' }}">
                                    Category
                                </a>
                                <a href="{{ route('admin.blogs.index') }}"
                                    class="nav-anchor {{ request()->is('admin/blogs*') ? 'active' : '' }}">
                                    Cards
                                </a>
                            </div>
                            <a href="{{ route('admin.insights-page.edit', ['section' => 3, 'is_card' => 0, 'insightsPage' => 2]) }}"
                                class="nav-anchor {{ request()->is('admin/insights-page/3/0*') ? 'active' : '' }}">
                                Follow on LinkedIn
                            </a>

                        </div>
                    </div>

                    <!-- About Page -->
                    <div class="bg-dark py-1">
                        <button
                            class="accordion-custom {{ request()->is('admin/about-page*') ? 'active-parent active' : '' }}"
                            data-target="aboutPageMenu">
                            <span><i class="fas fa-info-circle"></i> About Page</span>
                            <i class="fa fa-chevron-down arrow"></i>
                        </button>

                        <div id="aboutPageMenu"
                            class="accordion-content {{ request()->is('admin/about-page*') ? 'show' : '' }} py-2">
                            <a href="{{ route('admin.about-page.edit', ['section' => 1, 'is_card' => 0, 'aboutPage' => 1]) }}"
                                class="nav-anchor {{ request()->is('admin/about-page/1/0*') ? 'active' : '' }}">
                                Banner Intro
                            </a>
                            <a href="{{ route('admin.about-page.edit', ['section' => 2, 'is_card' => 0, 'aboutPage' => 2]) }}"
                                class="nav-anchor {{ request()->is('admin/about-page/2/0*') ? 'active' : '' }}">
                                Story Intro
                            </a>

                            <button
                                class="accordion-custom sub-accordion {{ request()->is('admin/about-page/3*') ? 'active-parent active' : '' }}"
                                data-target="manageMilestoneMenu">Milestone
                                <i class="fa fa-chevron-down arrow"></i>
                            </button>
                            <div id="manageMilestoneMenu"
                                class="accordion-content sub-menu {{ request()->is('admin/about-page/3*') ? 'show' : '' }}">
                                <a href="{{ route('admin.about-page.edit', ['section' => 3, 'is_card' => 0, 'aboutPage' => 3]) }}"
                                    class="nav-anchor {{ request()->is('admin/about-page/3/0*') ? 'active' : '' }}">
                                    Intro
                                </a>
                                <a href="{{ route('admin.about-page.index', ['section' => 3, 'is_card' => 1]) }}"
                                    class="nav-anchor {{ request()->is('admin/about-page/3/1*') ? 'active' : '' }}">
                                    Cards
                                </a>
                            </div>

                            <button
                                class="accordion-custom sub-accordion {{ request()->is('admin/about-page/4*') ? 'active-parent active' : '' }}"
                                data-target="manageValueMenu">Value
                                <i class="fa fa-chevron-down arrow"></i>
                            </button>
                            <div id="manageValueMenu"
                                class="accordion-content sub-menu {{ request()->is('admin/about-page/4*') ? 'show' : '' }}">
                                <a href="{{ route('admin.about-page.edit', ['section' => 4, 'is_card' => 0, 'aboutPage' => 4]) }}"
                                    class="nav-anchor {{ request()->is('admin/about-page/4/0*') ? 'active' : '' }}">
                                    Intro
                                </a>
                                <a href="{{ route('admin.about-page.index', ['section' => 4, 'is_card' => 1]) }}"
                                    class="nav-anchor {{ request()->is('admin/about-page/4/1*') ? 'active' : '' }}">
                                    Cards
                                </a>
                            </div>

                            <button
                                class="accordion-custom sub-accordion {{ request()->is('admin/about-page/5*') ? 'active-parent active' : '' }}"
                                data-target="manageClientMenu">Client
                                <i class="fa fa-chevron-down arrow"></i>
                            </button>
                            <div id="manageClientMenu"
                                class="accordion-content sub-menu {{ request()->is('admin/about-page/5*') ? 'show' : '' }}">
                                <a href="{{ route('admin.about-page.edit', ['section' => 5, 'is_card' => 0, 'aboutPage' => 5]) }}"
                                    class="nav-anchor {{ request()->is('admin/about-page/5/0*') ? 'active' : '' }}">
                                    Intro
                                </a>
                                <a href="{{ route('admin.about-page.index', ['section' => 5, 'is_card' => 1]) }}"
                                    class="nav-anchor {{ request()->is('admin/about-page/5/1*') ? 'active' : '' }}">
                                    Cards
                                </a>
                            </div>

                            <button
                                class="accordion-custom sub-accordion {{ request()->is('admin/about-page/6*') ? 'active-parent active' : '' }}"
                                data-target="manageOfficeMenu">Office
                                <i class="fa fa-chevron-down arrow"></i>
                            </button>
                            <div id="manageOfficeMenu"
                                class="accordion-content sub-menu {{ request()->is('admin/about-page/6*') ? 'show' : '' }}">
                                <a href="{{ route('admin.about-page.edit', ['section' => 6, 'is_card' => 0, 'aboutPage' => 6]) }}"
                                    class="nav-anchor {{ request()->is('admin/about-page/6/0*') ? 'active' : '' }}">
                                    Intro
                                </a>
                                <a href="{{ route('admin.about-page.index', ['section' => 6, 'is_card' => 1]) }}"
                                    class="nav-anchor {{ request()->is('admin/about-page/6/1*') ? 'active' : '' }}">
                                    Cards
                                </a>
                            </div>

                            <button
                                class="accordion-custom sub-accordion {{ request()->is('admin/about-page/7*') ? 'active-parent active' : '' }}"
                                data-target="manageProcessMenu">Process
                                <i class="fa fa-chevron-down arrow"></i>
                            </button>
                            <div id="manageProcessMenu"
                                class="accordion-content sub-menu {{ request()->is('admin/about-page/7*') ? 'show' : '' }}">
                                <a href="{{ route('admin.about-page.edit', ['section' => 7, 'is_card' => 0, 'aboutPage' => 7]) }}"
                                    class="nav-anchor {{ request()->is('admin/about-page/7/0*') ? 'active' : '' }}">
                                    Intro
                                </a>
                                <a href="{{ route('admin.about-page.index', ['section' => 7, 'is_card' => 1]) }}"
                                    class="nav-anchor {{ request()->is('admin/about-page/7/1*') ? 'active' : '' }}">
                                    Cards
                                </a>
                            </div>

                            <button
                                class="accordion-custom sub-accordion {{ request()->is('admin/about-page/8*') ? 'active-parent active' : '' }}"
                                data-target="manageEngagementModelMenu">Engagement Model
                                <i class="fa fa-chevron-down arrow"></i>
                            </button>
                            <div id="manageEngagementModelMenu"
                                class="accordion-content sub-menu {{ request()->is('admin/about-page/8*') ? 'show' : '' }}">
                                <a href="{{ route('admin.about-page.edit', ['section' => 8, 'is_card' => 0, 'aboutPage' => 8]) }}"
                                    class="nav-anchor {{ request()->is('admin/about-page/8/0*') ? 'active' : '' }}">
                                    Intro
                                </a>
                                <a href="{{ route('admin.about-page.index', ['section' => 8, 'is_card' => 1]) }}"
                                    class="nav-anchor {{ request()->is('admin/about-page/8/1*') ? 'active' : '' }}">
                                    Cards
                                </a>
                            </div>

                            <button
                                class="accordion-custom sub-accordion {{ request()->is('admin/about-page/9*') ? 'active-parent active' : '' }}"
                                data-target="manageCommitmentMenu">Commitment
                                <i class="fa fa-chevron-down arrow"></i>
                            </button>
                            <div id="manageCommitmentMenu"
                                class="accordion-content sub-menu {{ request()->is('admin/about-page/9*') ? 'show' : '' }}">
                                <a href="{{ route('admin.about-page.edit', ['section' => 9, 'is_card' => 0, 'aboutPage' => 9]) }}"
                                    class="nav-anchor {{ request()->is('admin/about-page/9/0*') ? 'active' : '' }}">
                                    Intro
                                </a>
                                <a href="{{ route('admin.about-page.index', ['section' => 9, 'is_card' => 1]) }}"
                                    class="nav-anchor {{ request()->is('admin/about-page/9/1*') ? 'active' : '' }}">
                                    Cards
                                </a>
                            </div>

                            <button
                                class="accordion-custom sub-accordion {{ request()->is('admin/about/10*') ? 'active-parent active' : '' }}"
                                data-target="manageProofSignalMenu">Proof Signal
                                <i class="fa fa-chevron-down arrow"></i>
                            </button>
                            <div id="manageProofSignalMenu"
                                class="accordion-content sub-menu {{ request()->is('admin/about-page/10*') ? 'show' : '' }}">
                                <a href="{{ route('admin.about-page.edit', ['section' => 10, 'is_card' => 0, 'aboutPage' => 10]) }}"
                                    class="nav-anchor {{ request()->is('admin/about-page/10/0*') ? 'active' : '' }}">
                                    Intro
                                </a>
                                <a href="{{ route('admin.about-page.index', ['section' => 10, 'is_card' => 1]) }}"
                                    class="nav-anchor {{ request()->is('admin/about-page/10/1*') ? 'active' : '' }}">
                                    Cards
                                </a>
                            </div>

                            <a href="{{ route('admin.about-page.edit', ['section' => 11, 'is_card' => 0, 'aboutPage' => 11]) }}"
                                class="nav-anchor {{ request()->is('admin/about-page/11/0*') ? 'active' : '' }}">
                                CTA Banner (Bottom) Intro
                            </a>

                        </div>
                    </div>

                    <!-- Contact Page -->
                    <div class="bg-dark py-1">
                        <button
                            class="accordion-custom {{ request()->is('admin/contact-page*') || request()->is('admin/leads*') ? 'active-parent active' : '' }}"
                            data-target="contactPageMenu">
                            <span><i class="fas fa-envelope"></i> Contact Page</span>
                            <i class="fa fa-chevron-down arrow"></i>
                        </button>

                        <div id="contactPageMenu"
                            class="accordion-content {{ request()->is('admin/contact-page*') || request()->is('admin/leads*') ? 'show' : '' }} py-2">
                            <a href="{{ route('admin.contact-page.edit', ['section' => 1, 'is_card' => 0, 'contactPage' => 1]) }}"
                                class="nav-anchor {{ request()->is('admin/contact-page/1/0*') ? 'active' : '' }}">
                                Banner Intro
                            </a>
                            <button
                                class="accordion-custom sub-accordion {{ request()->is('admin/contact-page/2*') || request()->is('admin/leads*') ? 'active-parent active' : '' }}"
                                data-target="manageContactPageFormMenu">Form
                                <i class="fa fa-chevron-down arrow"></i>
                            </button>
                            <div id="manageContactPageFormMenu"
                                class="accordion-content sub-menu {{ request()->is('admin/contact-page/2*') || request()->is('admin/leads*') ? 'show' : '' }}">
                                <a href="{{ route('admin.contact-page.edit', ['section' => 2, 'is_card' => 0, 'contactPage' => 2]) }}"
                                    class="nav-anchor {{ request()->is('admin/contact-page/2/0*') ? 'active' : '' }}">
                                    Intro
                                </a>
                                <a href="{{ route('admin.leads') }}"
                                    class="nav-anchor {{ request()->is('admin/leads*') ? 'active' : '' }}">
                                    Leads
                                </a>
                            </div>

                            <button
                                class="accordion-custom sub-accordion {{ request()->is('admin/contact-page/3*') ? 'active-parent active' : '' }}"
                                data-target="manageContactPageOfficeMenu">Office
                                <i class="fa fa-chevron-down arrow"></i>
                            </button>
                            <div id="manageContactPageOfficeMenu"
                                class="accordion-content sub-menu {{ request()->is('admin/contact-page/3*') ? 'show' : '' }}">
                                <a href="{{ route('admin.contact-page.edit', ['section' => 3, 'is_card' => 0, 'contactPage' => 3]) }}"
                                    class="nav-anchor {{ request()->is('admin/contact-page/3/0*') ? 'active' : '' }}">
                                    Intro
                                </a>
                                <a href="{{ route('admin.contact-page.index', ['section' => 3, 'is_card' => 1]) }}"
                                    class="nav-anchor {{ request()->is('admin/contact-page/3/1*') ? 'active' : '' }}">
                                    Cards
                                </a>
                            </div>

                            <button
                                class="accordion-custom sub-accordion {{ request()->is('admin/contact-page/4*') ? 'active-parent active' : '' }}"
                                data-target="manageContactPageFAQMenu">FAQ
                                <i class="fa fa-chevron-down arrow"></i>
                            </button>
                            <div id="manageContactPageFAQMenu"
                                class="accordion-content sub-menu {{ request()->is('admin/contact-page/4*') ? 'show' : '' }}">
                                <a href="{{ route('admin.contact-page.edit', ['section' => 4, 'is_card' => 0, 'contactPage' => 4]) }}"
                                    class="nav-anchor {{ request()->is('admin/contact-page/4/0*') ? 'active' : '' }}">
                                    Intro
                                </a>
                                <a href="{{ route('admin.contact-page.index', ['section' => 4, 'is_card' => 1]) }}"
                                    class="nav-anchor {{ request()->is('admin/contact-page/4/1*') ? 'active' : '' }}">
                                    Cards
                                </a>
                            </div>

                            <a href="{{ route('admin.contact-page.edit', ['section' => 5, 'is_card' => 0, 'contactPage' => 5]) }}"
                                class="nav-anchor {{ request()->is('admin/contact-page/5/0*') ? 'active' : '' }}">
                                Follow Intro
                            </a>

                        </div>
                    </div>

                    {{-- =========================================================
                        TERMS OF USE
                    ========================================================= --}}
                    <div class="bg-dark py-1">

                        <button
                            class="accordion-custom {{ request()->is('admin/terms-page*') ? 'active-parent active' : '' }}"
                            data-target="termsPageMenu">

                            <span>
                                <i class="fas fa-file-contract"></i> Terms of Use
                            </span>

                            <i class="fa fa-chevron-down arrow"></i>
                        </button>


                        <div id="termsPageMenu"
                            class="accordion-content {{ request()->is('admin/terms-page*') ? 'show' : '' }} py-2">


                            {{-- =====================================================
                                BANNER
                            ====================================================== --}}
                            <a href="{{ route('admin.terms-page.edit', [
                                'section' => 1,
                                'is_card' => 0,
                                'termsPage' => 1,
                            ]) }}"
                                class="nav-anchor {{ request()->is('admin/terms-page/1/0*') ? 'active' : '' }}">

                                Banner Intro
                            </a>


                            {{-- =====================================================
                                ACCEPTANCE OF TERMS
                            ====================================================== --}}
                            <a href="{{ route('admin.terms-page.edit', [
                                'section' => 2,
                                'is_card' => 0,
                                'termsPage' => 2,
                            ]) }}"
                                class="nav-anchor {{ request()->is('admin/terms-page/2/0*') ? 'active' : '' }}">

                                Acceptance of Terms
                            </a>


                            {{-- =====================================================
                            USE OF THE WEBSITE
                        ====================================================== --}}
                            <button
                                class="accordion-custom sub-accordion {{ request()->is('admin/terms-page/3*') ? 'active-parent active' : '' }}"
                                data-target="termsUseWebsiteMenu">

                                Use of the Website

                                <i class="fa fa-chevron-down arrow"></i>
                            </button>

                            <div id="termsUseWebsiteMenu"
                                class="accordion-content sub-menu {{ request()->is('admin/terms-page/3*') ? 'show' : '' }}">

                                <a href="{{ route('admin.terms-page.edit', [
                                    'section' => 3,
                                    'is_card' => 0,
                                    'termsPage' => 3,
                                ]) }}"
                                    class="nav-anchor {{ request()->is('admin/terms-page/3/0*') ? 'active' : '' }}">

                                    Intro
                                </a>

                                <a href="{{ route('admin.terms-page.index', [
                                    'section' => 3,
                                    'is_card' => 1,
                                ]) }}"
                                    class="nav-anchor {{ request()->is('admin/terms-page/3/1*') ? 'active' : '' }}">

                                    Cards
                                </a>

                            </div>


                            {{-- =====================================================
                                INTELLECTUAL PROPERTY
                            ====================================================== --}}
                            <a href="{{ route('admin.terms-page.edit', [
                                'section' => 4,
                                'is_card' => 0,
                                'termsPage' => 4,
                            ]) }}"
                                class="nav-anchor {{ request()->is('admin/terms-page/4/0*') ? 'active' : '' }}">

                                Intellectual Property
                            </a>


                            {{-- =====================================================
                                DISCLAIMER
                            ====================================================== --}}
                            <a href="{{ route('admin.terms-page.edit', [
                                'section' => 5,
                                'is_card' => 0,
                                'termsPage' => 5,
                            ]) }}"
                                class="nav-anchor {{ request()->is('admin/terms-page/5/0*') ? 'active' : '' }}">

                                Disclaimer
                            </a>


                            {{-- =====================================================
                                    LIMITATION OF LIABILITY
                                ====================================================== --}}
                            <a href="{{ route('admin.terms-page.edit', [
                                'section' => 6,
                                'is_card' => 0,
                                'termsPage' => 6,
                            ]) }}"
                                class="nav-anchor {{ request()->is('admin/terms-page/6/0*') ? 'active' : '' }}">

                                Limitation of Liability
                            </a>


                            {{-- =====================================================
                                EXTERNAL LINKS
                            ====================================================== --}}
                            <a href="{{ route('admin.terms-page.edit', [
                                'section' => 7,
                                'is_card' => 0,
                                'termsPage' => 7,
                            ]) }}"
                                class="nav-anchor {{ request()->is('admin/terms-page/7/0*') ? 'active' : '' }}">

                                External Links
                            </a>


                            {{-- =====================================================
                                CHANGES TO TERMS
                            ====================================================== --}}
                            <a href="{{ route('admin.terms-page.edit', [
                                'section' => 8,
                                'is_card' => 0,
                                'termsPage' => 8,
                            ]) }}"
                                class="nav-anchor {{ request()->is('admin/terms-page/8/0*') ? 'active' : '' }}">

                                Changes to These Terms
                            </a>


                            {{-- =====================================================
                            GOVERNING LAW
                        ====================================================== --}}
                            <a href="{{ route('admin.terms-page.edit', [
                                'section' => 9,
                                'is_card' => 0,
                                'termsPage' => 9,
                            ]) }}"
                                class="nav-anchor {{ request()->is('admin/terms-page/9/0*') ? 'active' : '' }}">

                                Governing Law
                            </a>


                            {{-- =====================================================
                                CTA
                            ====================================================== --}}
                            <a href="{{ route('admin.terms-page.edit', [
                                'section' => 10,
                                'is_card' => 0,
                                'termsPage' => 10,
                            ]) }}"
                                class="nav-anchor {{ request()->is('admin/terms-page/10/0*') ? 'active' : '' }}">

                                CTA Banner (Bottom)
                            </a>

                        </div>
                    </div>


                    {{-- =========================================================
                        PRIVACY POLICY
                    ========================================================= --}}
                    <div class="bg-dark py-1">

                        <button
                            class="accordion-custom {{ request()->is('admin/privacy-policy*') ? 'active-parent active' : '' }}"
                            data-target="privacyPolicyMenu">

                            <span>
                                <i class="fas fa-user-shield"></i> Privacy Policy
                            </span>

                            <i class="fa fa-chevron-down arrow"></i>
                        </button>


                        <div id="privacyPolicyMenu"
                            class="accordion-content {{ request()->is('admin/privacy-policy*') ? 'show' : '' }} py-2">


                            {{-- =====================================================
                                    BANNER
                                ====================================================== --}}
                            <a href="{{ route('admin.privacy-policy.edit', [
                                'section' => 1,
                                'is_card' => 0,
                                'privacyPolicy' => 1,
                            ]) }}"
                                class="nav-anchor {{ request()->is('admin/privacy-policy/1/0*') ? 'active' : '' }}">

                                Banner Intro
                            </a>


                            {{-- =====================================================
                                INTRODUCTION
                            ====================================================== --}}
                            <a href="{{ route('admin.privacy-policy.edit', [
                                'section' => 2,
                                'is_card' => 0,
                                'privacyPolicy' => 2,
                            ]) }}"
                                class="nav-anchor {{ request()->is('admin/privacy-policy/2/0*') ? 'active' : '' }}">

                                Introduction
                            </a>


                            {{-- =====================================================
                                DATA WE COLLECT
                            ====================================================== --}}
                            <button
                                class="accordion-custom sub-accordion {{ request()->is('admin/privacy-policy/3*') ? 'active-parent active' : '' }}"
                                data-target="privacyDataCollectMenu">

                                Data We Collect

                                <i class="fa fa-chevron-down arrow"></i>
                            </button>

                            <div id="privacyDataCollectMenu"
                                class="accordion-content sub-menu {{ request()->is('admin/privacy-policy/3*') ? 'show' : '' }}">

                                <a href="{{ route('admin.privacy-policy.edit', [
                                    'section' => 3,
                                    'is_card' => 0,
                                    'privacyPolicy' => 3,
                                ]) }}"
                                    class="nav-anchor {{ request()->is('admin/privacy-policy/3/0*') ? 'active' : '' }}">

                                    Intro
                                </a>

                                <a href="{{ route('admin.privacy-policy.index', [
                                    'section' => 3,
                                    'is_card' => 1,
                                ]) }}"
                                    class="nav-anchor {{ request()->is('admin/privacy-policy/3/1*') ? 'active' : '' }}">

                                    Cards
                                </a>

                            </div>


                            {{-- =====================================================
                                    WE USE YOUR DATA
                                ====================================================== --}}
                            <a href="{{ route('admin.privacy-policy.edit', [
                                'section' => 4,
                                'is_card' => 0,
                                'privacyPolicy' => 4,
                            ]) }}"
                                class="nav-anchor {{ request()->is('admin/privacy-policy/4/0*') ? 'active' : '' }}">

                                We Use Your Data
                            </a>


                            {{-- =====================================================
                                LEGAL BASIS
                            ====================================================== --}}
                            {{--  <button
                                class="accordion-custom sub-accordion {{ request()->is('admin/privacy-policy/5*') ? 'active-parent active' : '' }}"
                                data-target="privacyLegalBasisMenu">

                                Legal Basis for Processing

                                <i class="fa fa-chevron-down arrow"></i>
                            </button>  --}}

                            <button
                                class="accordion-custom sub-accordion {{ request()->is('admin/privacy-policy/5*') ? 'active-parent active' : '' }}"
                                data-target="privacyLegalBasisMenu">

                                <span class="menu-title">

                                    Legal Basis for Processing
                                </span>

                                <i class="fa fa-chevron-down arrow"></i>
                            </button>

                            <div id="privacyLegalBasisMenu"
                                class="accordion-content sub-menu {{ request()->is('admin/privacy-policy/5*') ? 'show' : '' }}">

                                <a href="{{ route('admin.privacy-policy.edit', [
                                    'section' => 5,
                                    'is_card' => 0,
                                    'privacyPolicy' => 5,
                                ]) }}"
                                    class="nav-anchor {{ request()->is('admin/privacy-policy/5/0*') ? 'active' : '' }}">

                                    Intro
                                </a>

                                <a href="{{ route('admin.privacy-policy.index', [
                                    'section' => 5,
                                    'is_card' => 1,
                                ]) }}"
                                    class="nav-anchor {{ request()->is('admin/privacy-policy/5/1*') ? 'active' : '' }}">

                                    Cards
                                </a>

                            </div>


                            {{-- =====================================================
                                    DATA SHARING
                                ====================================================== --}}
                            <a href="{{ route('admin.privacy-policy.edit', [
                                'section' => 6,
                                'is_card' => 0,
                                'privacyPolicy' => 6,
                            ]) }}"
                                class="nav-anchor {{ request()->is('admin/privacy-policy/6/0*') ? 'active' : '' }}">

                                Data Sharing
                            </a>


                            {{-- =====================================================
                                    DATA RETENTION
                                ====================================================== --}}
                            <a href="{{ route('admin.privacy-policy.edit', [
                                'section' => 7,
                                'is_card' => 0,
                                'privacyPolicy' => 7,
                            ]) }}"
                                class="nav-anchor {{ request()->is('admin/privacy-policy/7/0*') ? 'active' : '' }}">

                                Data Retention
                            </a>


                            {{-- =====================================================
                                YOUR RIGHTS
                            ====================================================== --}}
                            <button
                                class="accordion-custom sub-accordion {{ request()->is('admin/privacy-policy/8*') ? 'active-parent active' : '' }}"
                                data-target="privacyRightsMenu">

                                Your Rights

                                <i class="fa fa-chevron-down arrow"></i>
                            </button>

                            <div id="privacyRightsMenu"
                                class="accordion-content sub-menu {{ request()->is('admin/privacy-policy/8*') ? 'show' : '' }}">

                                <a href="{{ route('admin.privacy-policy.edit', [
                                    'section' => 8,
                                    'is_card' => 0,
                                    'privacyPolicy' => 8,
                                ]) }}"
                                    class="nav-anchor {{ request()->is('admin/privacy-policy/8/0*') ? 'active' : '' }}">

                                    Intro
                                </a>

                                <a href="{{ route('admin.privacy-policy.index', [
                                    'section' => 8,
                                    'is_card' => 1,
                                ]) }}"
                                    class="nav-anchor {{ request()->is('admin/privacy-policy/8/1*') ? 'active' : '' }}">

                                    Cards
                                </a>

                            </div>


                            {{-- =====================================================
                                    COOKIES
                                ====================================================== --}}
                            <button
                                class="accordion-custom sub-accordion {{ request()->is('admin/privacy-policy/9*') ? 'active-parent active' : '' }}"
                                data-target="privacyCookiesMenu">

                                Cookies

                                <i class="fa fa-chevron-down arrow"></i>
                            </button>

                            <div id="privacyCookiesMenu"
                                class="accordion-content sub-menu {{ request()->is('admin/privacy-policy/9*') ? 'show' : '' }}">

                                <a href="{{ route('admin.privacy-policy.edit', [
                                    'section' => 9,
                                    'is_card' => 0,
                                    'privacyPolicy' => 9,
                                ]) }}"
                                    class="nav-anchor {{ request()->is('admin/privacy-policy/9/0*') ? 'active' : '' }}">

                                    Intro
                                </a>

                                <a href="{{ route('admin.privacy-policy.index', [
                                    'section' => 9,
                                    'is_card' => 1,
                                ]) }}"
                                    class="nav-anchor {{ request()->is('admin/privacy-policy/9/1*') ? 'active' : '' }}">

                                    Cards
                                </a>

                            </div>


                            {{-- =====================================================
                                    CONTACT DETAILS
                                ====================================================== --}}
                            <a href="{{ route('admin.privacy-policy.edit', [
                                'section' => 10,
                                'is_card' => 0,
                                'privacyPolicy' => 10,
                            ]) }}"
                                class="nav-anchor {{ request()->is('admin/privacy-policy/10/0*') ? 'active' : '' }}">

                                Contact Details
                            </a>


                            {{-- =====================================================
                                CTA
                            ====================================================== --}}
                            <a href="{{ route('admin.privacy-policy.edit', [
                                'section' => 11,
                                'is_card' => 0,
                                'privacyPolicy' => 11,
                            ]) }}"
                                class="nav-anchor {{ request()->is('admin/privacy-policy/11/0*') ? 'active' : '' }}">

                                CTA Banner (Bottom)
                            </a>

                        </div>
                    </div>


                    <!-- =========================
                        COOKIE PREFERENCES
                    ========================= -->

                    <div class="bg-dark py-1">

                        <a href="{{ route('admin.cookie-preference-page.edit') }}"
                            class="sidebar-custom-link {{ request()->routeIs('admin.cookie-preference-page.*') ? 'active' : '' }}">

                            <span>
                                <i class="fas fa-cookie-bite"></i>
                                Cookie Preferences
                            </span>

                        </a>

                    </div>



                </li>

            </ul>
        </nav>

        <!-- MAIN -->
        <div class="main-content p-4">

            <nav class="navbar bg-light mb-3">
                <form method="POST" action="{{ route('admin.logout') }}" class="ms-auto">
                    @csrf
                    <button class="btn btn-danger">Logout</button>
                </form>
            </nav>

            @yield('content')
        </div>

    </div>

    <!-- ✅ FIX SCRIPT -->
    <script>
        document.querySelectorAll('.accordion-custom').forEach(btn => {
            btn.addEventListener('click', function() {

                const target = document.getElementById(this.dataset.target);

                // toggle current
                target.classList.toggle('show');
                this.classList.toggle('active');

            });
        });
    </script>

    @include('includes.admin.SESSIONMESSAGE')
    @include('includes.admin.footer')

    @stack('scripts')

</body>

</html>
