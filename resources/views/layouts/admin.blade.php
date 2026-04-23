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
                    <img src="{{ asset('backend_assets/eaglenetworks-logo.png') }}" alt="Logo"
                        style="max-width: 120px; height: auto;">

                    <span class="mt-2 text-white fw-bold">Eagle Networks |
                        Admin</span>
                </a>
            </div>

            <!-- Menu Items -->
            <ul class="nav flex-column">
                <!-- Dashboard -->
                <li class="nav-item">
                    <a class="text-white nav-link" href="{{ route('admin.dashboard') }}">
                        <i class="fa-solid fa-house"></i>&nbsp;&nbsp;Dashboard
                    </a>
                </li>

                <li class="nav-item">
                    <a class="text-white nav-link" href="{{ route('admin.leads') }}">
                        <i class="fa-solid fa-house"></i>&nbsp;&nbsp;Leads
                    </a>
                </li>

                <!-- Video Categories -->
                <li class="nav-item">
                    <a class="text-white nav-link" href="{{ route('admin.categories.index') }}">
                        <i class="fa-solid fa-layer-group"></i>&nbsp;&nbsp;Video Categories
                    </a>
                </li>

                <!-- Videos -->
                <li class="nav-item">
                    <a class="text-white nav-link" href="{{ route('admin.videos.index') }}">
                        <i class="fa-solid fa-video"></i>&nbsp;&nbsp;Videos
                    </a>
                </li>

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
