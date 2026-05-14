<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    @include('includes.admin.header')
    @include('includes.admin.summernote')

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

        /* #uploaded_img{
            width: 60px;
            height: 52px;
            border-radius: 10px;
            padding: 10px;
            position: absolute;
            right: 80px;
            z-index: 9;
            top: -7px;
        } */
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

                <!-- Leads -->
                <li class="nav-item py-1">
                    <a href="{{ route('admin.leads') }}"
                        class="nav-link {{ request()->routeIs('admin.leads') ? 'active' : '' }}">
                        <i class="fa-solid fa-user"></i> Leads
                    </a>
                </li>

                <!-- ACCORDION -->
                <li class="nav-item">

                    @php
                        $blogActive = request()->routeIs('admin.blog.*') || request()->routeIs('admin.blog-category.*');
                        $workActive = request()->routeIs('admin.work.*') || request()->routeIs('admin.work-category.*');
                        $videoActive = request()->routeIs('admin.videos.*') || request()->routeIs('admin.categories.*');
                    @endphp

                    <!-- BLOG -->
                    <div class="bg-dark py-1">
                        <button class="accordion-custom {{ $blogActive ? 'active-parent active' : '' }}"
                            data-target="blogMenu">
                            <span><i class="fa fa-list"></i> Manage Blog</span>
                            <i class="fa fa-chevron-down arrow"></i>
                        </button>

                        <div id="blogMenu" class="accordion-content {{ $blogActive ? 'show' : '' }} py-2">
                            <a href="{{ route('admin.blog-category.index') }}"
                                class="nav-anchor {{ request()->routeIs('admin.blog-category.*') ? 'active' : '' }}">
                                Category
                            </a>

                            <a href="{{ route('admin.blog.index') }}"
                                class="nav-anchor {{ request()->routeIs('admin.blog.*') ? 'active' : '' }}">
                                Blog
                            </a>
                        </div>
                    </div>

                    <!-- WORK -->
                    <div class="bg-dark py-1">
                        <button class="accordion-custom {{ $workActive ? 'active-parent active' : '' }}"
                            data-target="workMenu">
                            <span><i class="fa fa-briefcase"></i> Manage Work</span>
                            <i class="fa fa-chevron-down arrow"></i>
                        </button>

                        <div id="workMenu" class="accordion-content {{ $workActive ? 'show' : '' }} py-2">
                            <a href="{{ route('admin.work-category.index') }}"
                                class="nav-anchor {{ request()->routeIs('admin.work-category.*') ? 'active' : '' }}">
                                Category
                            </a>

                            <a href="{{ route('admin.work.index') }}"
                                class="nav-anchor {{ request()->routeIs('admin.work.*') ? 'active' : '' }}">
                                Work
                            </a>
                        </div>
                    </div>

                    <!-- VIDEOS -->
                    <div class="bg-dark py-1">
                        <button class="accordion-custom {{ $videoActive ? 'active-parent active' : '' }}"
                            data-target="videoMenu">
                            <span><i class="fa fa-video"></i> Manage Videos</span>
                            <i class="fa fa-chevron-down arrow"></i>
                        </button>

                        <div id="videoMenu" class="accordion-content {{ $videoActive ? 'show' : '' }} py-2">
                            <a href="{{ route('admin.categories.index') }}"
                                class="nav-anchor {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
                                Category
                            </a>

                            <a href="{{ route('admin.videos.index') }}"
                                class="nav-anchor {{ request()->routeIs('admin.videos.*') ? 'active' : '' }}">
                                Videos
                            </a>
                        </div>
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
