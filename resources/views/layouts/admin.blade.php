<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- FontAwesome (optional) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Scripts -->
    {{--  @vite(['resources/sass/app.scss', 'resources/js/app.js'])  --}}

    @include('includes.admin.header')
    @include('includes.admin.summernote')

</head>

<body class="bg-light-green">
    <div id="app" class="d-flex h-100">
        <!-- Sidebar -->
        <nav class="text-white bg-dark">
            <!-- Logo -->
            <div class="p-3 mb-4 text-center">
                <a href="{{ route('home') }}" class="text-decoration-none d-flex flex-column align-items-center">
                    {{--  <img src="{{ asset('backend_assets/GH-Vienna-whiteLogo.png') }}" alt="Logo"
                        style="max-width: 120px; height: auto;">  --}}


                    <img class="navbar-brand-logo mb-3 ps-0" src="" alt="Logo"
                        style="max-width: 120px; height: auto;">
                    <span class="mt-2 text-white fw-bold">{{ $contactUsData['mission_name'] ?? 'Embassy' }} |
                        Admin</span>
                </a>
            </div>

            <!-- Menu Items -->
            <ul class="nav flex-column">
                <!-- Dashboard -->
                <li class="nav-item">
                    <a class="text-white nav-link" href="{{ route('home') }}">
                        <i class="fa-solid fa-house"></i>&nbsp;&nbsp;Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <div class="accordion bg-dark text-white" id="sidebarAccordion1">
                        <div class="accordion-item bg-dark border-0">
                            <h2 class="accordion-header" id="headingBlog">
                                <button class="accordion-button collapsed bg-dark text-white" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseBlog"
                                    aria-expanded="false" aria-controls="collapseBlog">
                                    <i class="fa-solid fa-list"></i>&nbsp; Manage Blog
                                </button>
                            </h2>
                            <!-- COLLAPSE -->
                            <div id="collapseBlog" class="accordion-collapse collapse {{ request()->routeIs('admin.blog.*') || request()->routeIs('admin.blog-category.*') ? 'show' : '' }}"
                                aria-labelledby="headingBlog" data-bs-parent="#sidebarAccordion1">

                                <div class="accordion-body bg-dark text-white">
                                    <div>
                                        <a class="nav-anchor text-white {{ request()->routeIs('admin.blog-category.*') ? 'active' : '' }}"
                                            href="{{ route('admin.blog-category.index') }}">
                                            Category
                                        </a>
                                    </div>

                                    <div>
                                        <a class="nav-anchor text-white {{ request()->routeIs('admin.blog.*') ? 'active' : '' }}"
                                            href="{{ route('admin.blog.index') }}">
                                            Blog
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <div class="accordion bg-dark text-white" id="sidebarAccordion2">
                        <div class="accordion-item bg-dark border-0">
                            <h2 class="accordion-header" id="headingWork">
                                <button class="accordion-button collapsed bg-dark text-white" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseWork"
                                    aria-expanded="false" aria-controls="collapseWork">
                                    <i class="fa-solid fa-list"></i>&nbsp; Manage Work
                                </button>
                            </h2>
                            <!-- COLLAPSE -->
                            <div id="collapseWork" class="accordion-collapse collapse {{ request()->routeIs('admin.work.*') || request()->routeIs('admin.work-category.*') ? 'show' : '' }}"
                                aria-labelledby="headingWork" data-bs-parent="#sidebarAccordion2">

                                <div class="accordion-body bg-dark text-white">
                                    <div>
                                        <a class="nav-anchor text-white {{ request()->routeIs('admin.work-category.*') ? 'active' : '' }}"
                                            href="{{ route('admin.work-category.index') }}">
                                            Category
                                        </a>
                                    </div>

                                    <div>
                                        <a class="nav-anchor text-white {{ request()->routeIs('admin.work.*') ? 'active' : '' }}"
                                            href="{{ route('admin.work.index') }}">
                                            Work
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                {{--  @if ($isAdmin)
                    <li class="nav-item">
                        <a class="text-white nav-link" href="{{ route('admin.sessions') }}">
                            <i class="fa-solid fa-house"></i>&nbsp;&nbsp;User Activity Log
                        </a>
                    </li>
                @endif  --}}

                {{--  @if ($isAdmin)
                    <li class="nav-item">
                        <a class="text-white nav-link" href="{{ route('activity.logs') }}">
                            <i class="fa-solid fa-clock-rotate-left"></i>&nbsp;&nbsp;Activity Logs
                        </a>
                    </li>
                @endif  --}}


                {{--  @if ($isUserLevelTwo || $isAdmin)
                    <li class="nav-item">
                        <div class="accordion bg-dark text-white" id="sidebarAccordion">
                            <div class="accordion-item bg-dark border-0">
                                <h2 class="accordion-header" id="headingHome">
                                    <button class="accordion-button collapsed bg-dark text-white" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseHome" aria-expanded="false"
                                        aria-controls="collapseHome">
                                        <i class="fa-solid fa-list"></i>&nbsp; Home Page Management
                                    </button>
                                </h2>
                                <div id="collapseHome" class="accordion-collapse collapse" aria-labelledby="headingHome"
                                    data-bs-parent="#sidebarAccordion">
                                    <div class="accordion-body bg-dark text-white">
                                        <div><a class="nav-anchor text-white"
                                                href="{{ route('homebanner.index') }}">Home Page Banners</a></div>
                                        <div><a class="nav-anchor text-white"
                                                href="{{ route('HomeConsularServices.index') }}">Home Page Service
                                                Icons</a>
                                        </div>
                                        <div><a class="nav-anchor text-white"
                                                href="{{ route('HomeWelcomeSection.index') }}">Home Page Information
                                                Links
                                            </a>
                                        </div>
                                        <div><a class="nav-anchor text-white"
                                                href="{{ route('homepagenotice.index') }}">Home Page Pop Ups</a>
                                        </div>
                                        <div><a class="nav-anchor text-white"
                                                href="{{ route('applynow.index') }}">Passport Pop Up</a>
                                        </div>
                                        <div><a class="nav-anchor text-white" href="{{ route('visa.notice.index') }}">
                                                Visa Pop Up</a>
                                        </div>
                                        <div><a class="nav-anchor text-white"
                                                href="{{ route('applicationprocedurevideo.index') }}">
                                                Application Guide Videos</a>
                                        </div>
                                        @if ($host === 'austria.mfa.gov.gh' || $host === 'austria.emhdemo.com' || ($host === '127.0.0.1' && $port == 8002))
                                            <div><a class="nav-anchor text-white"
                                                    href="{{ route('country-statistics.index') }}">Country Statistics
                                                </a>
                                            </div>
                                        @endif
                                        <div><a class="nav-anchor text-white"
                                                href="{{ route('organization.logo.index') }}">
                                                Government Partners</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                @endif  --}}

                {{--  @if ($isAdmin)
                    <li class="nav-item">
                        <div class="accordion bg-dark text-white" id="sidebarAccordion2">
                            <div class="accordion-item bg-dark border-0">
                                <h2 class="accordion-header" id="headingFooter">
                                    <button class="accordion-button collapsed bg-dark text-white" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseFooter" aria-expanded="false"
                                        aria-controls="collapseFooter">
                                        <i class="fa-solid fa-list"></i>&nbsp; Footer Links
                                    </button>
                                </h2>
                                <div id="collapseFooter" class="accordion-collapse collapse"
                                    aria-labelledby="headingFooter" data-bs-parent="#sidebarAccordion2">
                                    <div class="accordion-body bg-dark text-white">
                                        <div><a class="nav-anchor text-white"
                                                href="{{ route('footer.headings.index') }}">Footer Sections
                                            </a></div>
                                        <div><a class="nav-anchor text-white"
                                                href="{{ route('footer.links.index') }}">Footer Links</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>


                    <li class="nav-item">
                        <div class="accordion bg-dark text-white" id="sidebarAccordion3">
                            <div class="accordion-item bg-dark border-0">
                                <h2 class="accordion-header" id="headingGlance">
                                    <button class="accordion-button collapsed bg-dark text-white" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseGlance"
                                        aria-expanded="false" aria-controls="collapseGlance">
                                        <i class="fa-solid fa-list"></i>&nbsp; Ghana At A Glance
                                    </button>
                                </h2>
                                <!-- COLLAPSE -->
                                <div id="collapseGlance" class="accordion-collapse collapse"
                                    aria-labelledby="headingGlance" data-bs-parent="#sidebarAccordion3">

                                    <div class="accordion-body bg-dark text-white">
                                        <div>
                                            <a class="nav-anchor text-white"
                                                href="{{ route('ghanaataglancebanner.index') }}">
                                                Banners
                                            </a>
                                        </div>

                                        <div>
                                            <a class="nav-anchor text-white"
                                                href="{{ route('ghana-at-a-glance-contents.index') }}">
                                                Contents
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="text-white nav-link" href="{{ route('termsandcondition.index') }}">
                            <i class="fa-solid fa-earth-americas"></i>&nbsp;&nbsp;Visa Application Terms and Conditions
                        </a>
                    </li>
                @endif  --}}
                {{--  @if ($isUserLevelTwo || $isAdmin)
                    <li class="nav-item">
                        <a class="text-white nav-link" href="{{ route('navigation.index') }}">
                            <i class="fa-solid fa-earth-americas"></i>&nbsp;&nbsp;Menus
                        </a>
                    </li>
                    <li class="nav-item"><a class="text-white nav-link" href="{{ route('seo.index') }}">
                            <i class="fa-solid fa-earth-americas"></i>&nbsp; SEO Settings
                        </a></li>
                    <li class="nav-item"><a class="text-white nav-link" href="{{ route('contactus.index') }}">
                            <i class="fa-solid fa-address-book"></i>&nbsp; Contact Us Information</a></li>
                @endif

                <li class="nav-item"><a class="text-white nav-link" href="{{ route('banner.index') }}">
                        <i class="fa-solid fa-earth-americas"></i>&nbsp; Page Banners</a></li>


                <li class="nav-item"><a class="text-white nav-link" href="{{ route('photogallery.index') }}">
                        <i class="fa-solid fa-earth-americas"></i>&nbsp; Photo Gallery</a></li>
                <li class="nav-item"><a class="text-white nav-link" href="{{ route('videogallery.index') }}">
                        <i class="fa-solid fa-earth-americas"></i>&nbsp; Video Gallery</a></li>
                <li class="nav-item"><a class="text-white nav-link" href="{{ route('NewsEvents.index') }}">
                        <i class="fa-solid fa-earth-americas"></i>&nbsp; News & Events</a></li>
                @if ($host === 'austria.mfa.gov.gh' || $host === 'austria.emhdemo.com' || ($host === '127.0.0.1' && $port == 8002))
                    <li class="nav-item"><a class="text-white nav-link" href="{{ route('job.vacancy.index') }}">
                            <i class="fa-solid fa-earth-americas"></i>&nbsp; Jobs & Vacancies</a></li>
                @endif
                @if (!in_array($host, ['geneva.emhdemo.com', 'geneva.mfa.gov.gh', 'berne.emhdemo.com', 'berne.mfa.gov.gh']))
                    <li class="nav-item"><a class="text-white nav-link" href="{{ route('announcements.index') }}">
                            <i class="fa-solid fa-earth-americas"></i>&nbsp;Announcements</a></li>
                @endif

                <li class="nav-item"><a class="text-white nav-link" href="{{ route('websitecontents.index') }}">
                        <i class="fa-solid fa-earth-americas"></i>&nbsp; Page Content Manager</a></li>


                <li class="nav-item">
                    <a class="text-white nav-link" href="{{ route('CommonPageRelatedImages.index') }}">

                        @if ($host === 'london.mfa.gov.gh' || $host === 'london.emhdemo.com' || ($host === '127.0.0.1' && $port == 8002))
                            <i class="fa-solid fa-earth-americas"></i>&nbsp; Section Head Profile Images
                        @elseif ($host === 'newyork.mfa.gov.gh' || $host === 'newyork.emhdemo.com' || ($host === '127.0.0.1' && $port == 8003))
                            <i class="fa-solid fa-earth-americas"></i>&nbsp; The Consul General
                        @else
                            <i class="fa-solid fa-earth-americas"></i>&nbsp; CommonPage Related Images
                        @endif

                    </a>
                </li>  --}}

                {{-- @if ($isUserLevelThree || $isAdmin) --}}
                {{--  <li class="nav-item"><a class="text-white nav-link"
                        href="{{ route('CitizenRegistrationForm.index') }}">
                        <i class="fa-solid fa-earth-americas"></i>&nbsp; Citizen Registration Enquiries</a></li>  --}}
                {{--  <li class="nav-item"><a class="text-white nav-link"
                        href="{{ route('InvestorRegistrationForm.index') }}">
                        <i class="fa-solid fa-earth-americas"></i>&nbsp; Investor Registration Enquiries</a></li>  --}}
                {{--  @if ($host === 'london.mfa.gov.gh' || $host === 'london.emhdemo.com' || ($host === '127.0.0.1' && $port == 8002))
                    <li class="nav-item"><a class="text-white nav-link"
                            href="{{ route('Attestationenquiry-uk.index') }}">
                            <i class="fa-solid fa-table"></i>&nbsp; Attestation Enquiries</a></li>
                @elseif (!in_array($host, ['geneva.emhdemo.com', 'geneva.mfa.gov.gh', 'berne.emhdemo.com', 'berne.mfa.gov.gh']))
                    <li class="nav-item"><a class="text-white nav-link" href="{{ route('Attestationform.index') }}">
                            <i class="fa-solid fa-table"></i>&nbsp; Attestation Form</a></li>
                @endif  --}}

                {{-- @endif --}}


            </ul>
        </nav>

        <style>
            .nav-anchor {
                display: block;
                padding: 6px 10px;
                color: #ffffff !important;
                text-decoration: none;
                transition: background-color 0.2s ease-in-out;
            }

            .nav-anchor:hover {
                background-color: #343a40;
                /* Slightly lighter dark */
                border-radius: 4px;
                text-decoration: none;
            }


            .dropdown-item:hover {
                background-color: #f97316 !important;
                /* Tailwind's orange-500 */
                color: white !important;
            }

            /* Dropdown Submenu Support */
            .dropdown-submenu {
                position: relative;
            }

            .dropdown-submenu>.dropdown-menu {
                top: 0;
                left: 100%;
                margin-top: -1px;
                display: none;
            }

            .dropdown-submenu:hover>.dropdown-menu {
                display: block;
            }

            /* Make accordion dropdown arrow white */
            .accordion-button::after {
                filter: brightness(0) invert(1);
                /* turns it white */
            }

            .bg-dark {
                background-color: #202123 !important;
            }

            .collapse ul {
                list-style: none;
                padding-left: 50px;
            }

            .nav-link {
                padding: 10px 15px;
            }


            /* Make sidebar full height and scrollable */
            nav.bg-dark {
                overflow-y: auto;
                overflow-x: hidden;
            }
        </style>


        <!-- Main Content -->
        <div class="p-4 flex-grow-1">
            <!-- Top Navbar -->
            <nav class="navbar navbar-light bg-light">
                <div class="container-fluid">
                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-flex ms-auto">
                        @csrf
                        <button class="btn btn-danger" type="submit">Logout</button>
                    </form>
                </div>
            </nav>

            <!-- Content Section -->
            <main class="py-4">
                @yield('content')
            </main>
        </div>
    </div>

    {{-- @livewireScripts --}}
    @include('includes.admin.SESSIONMESSAGE')
    @include('includes.admin.footer')

    @stack('scripts')
</body>

</html>
