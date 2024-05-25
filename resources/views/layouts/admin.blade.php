<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    {{-- fa --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>


<body class="vh-100">

    <div id="app" class="h-100">
        <div class="wrapper d-flex h-100">

            {{-- SIDEBAR --}}
            <aside id="left-sidebar"
                class="w-auto h-100 d-flex flex-column text-white position-relative d-none d-md-flex">
                {{-- title: top --}}
                <div class="side-header px-5 py-2 d-flex justify-content-center align-items-center">
                    PORTFOLIO
                </div>

                {{-- opntions list --}}
                <ul class="navbar-nav mb-auto pt-5">
                    {{-- dashboard --}}
                    <li class="nav-item px-4 ">
                        <a class="nav-link d-flex gap-3 align-items-center" href="{{ url('admin') }}">
                            <i class="fa-solid fa-palette"></i>
                            {{ __('Dashboard') }}
                        </a>
                    </li>
                    {{-- projects --}}
                    <li class="nav-item px-4">
                        <a class="nav-link d-flex gap-3 align-items-center" href="{{ route('admin.projects.index') }}">
                            <i class="fa-solid fa-swatchbook"></i>
                            {{ __('Projects') }}
                        </a>
                    </li>
                    {{-- types --}}
                    <li class="nav-item px-4">
                        <a class="nav-link d-flex gap-3 align-items-center" href="{{ route('admin.types.index') }}">
                            <i class="fa-solid fa-list"></i>
                            {{ __('Types') }}
                        </a>
                    </li>
                </ul>
                <hr>
                {{-- profile list --}}
                <ul class="navbar-nav pb-3">
                    {{-- profile --}}
                    <li class="nav-item px-4 ">
                        <a class="nav-link d-flex gap-3 align-items-center" href="{{ url('profile') }}">
                            <i class="fa-solid fa-circle-user"></i>
                            {{ __('Profile') }}
                        </a>
                    </li>
                    {{-- logout --}}
                    <li class="nav-item px-4">
                        <a class="nav-link d-flex gap-3 align-items-center" href="{{ route('logout') }}">
                            <i class="fa-solid fa-right-from-bracket"></i>
                            {{ __('Logout') }}
                        </a>
                    </li>
                </ul>
            </aside>

            <main class=" main-admin h-100 w-100 overflow-y-hidden">
                {{-- top-bar --}}
                @include('admin.partials.navbar')

                {{-- content --}}
                <div class="content-wrapper px-4 pb-4 h-100 overflow-y-scroll">
                    @yield('content')
                </div>
            </main>




        </div>




    </div>
</body>

</html>
