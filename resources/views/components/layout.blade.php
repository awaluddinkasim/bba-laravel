@props(['title' => 'Dashboard'])

<!DOCTYPE html>
<html lang="en" data-sidebar-color="light" data-topbar-color="light" data-sidebar-view="default">

<head>
    <meta charset="utf-8">
    <title>
        @if (isset($title))
            {{ $title }} | {{ config('app.name') }}
        @else
            {{ config('app.name') }}
        @endif
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- App css -->
    <link href="{{ asset('assets/css/theme.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/libs/@iconscout/unicons/css/line.css') }}" type="text/css" rel="stylesheet">
    @stack('styles')

    <!-- Head Js -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="{{ asset('assets/js/head.js') }}"></script>
</head>

<body>

    <div class="app-wrapper">

        <!-- Sidebar Menu Start -->
        <div class="app-menu">

            <!-- Brand Logo -->
            <a href="index.html" class="logo-box">
                <img src="{{ asset('assets/images/logo-light.png') }}" class="logo-light h-6" alt="Light logo">
                <img src="{{ asset('assets/images/logo-dark.png') }}" class="logo-dark h-6" alt="Dark logo">
            </a>

            <x-sidebar />
        </div>
        <!-- Sidebar Menu End  -->

        <!-- Start Page Content here -->
        <div class="app-content">

            <!-- Topbar Start -->
            <header class="app-header flex items-center px-5 gap-4">

                <!-- Brand Logo -->
                <a href="index.html" class="logo-box">
                    <img src="assets/images/logo-sm.png" class="h-6" alt="Small logo">
                </a>

                <!-- Sidenav Menu Toggle Button -->
                <button id="button-toggle-menu" class="nav-link p-2">
                    <span class="sr-only">Menu Toggle Button</span>
                    <span class="flex items-center justify-center h-6 w-6">
                        <i class="uil uil-bars text-2xl"></i>
                    </span>
                </button>

                <!-- Page Title -->
                <h4 class="text-slate-900 text-lg font-medium">{{ $title }}</h4>

                <button id="button-toggle-profile" class="nav-link p-2 ms-auto">
                    <span class="sr-only">Profile Menu Offcanvas Button</span>
                    <span class="flex items-center justify-center h-6 w-6">
                        <i class="uil uil-user-circle text-2xl"></i>
                    </span>
                </button>
            </header>
            <!-- Topbar End -->

            <main class="p-6">

                <!-- start page content here -->
                {{ $slot }}

            </main>

            <!-- Footer Start -->
            <footer class="footer h-16 flex items-center px-6 border-t border-gray-200 mt-auto">
                <div class="flex md:justify-between justify-center w-full gap-4">
                    <div>
                        <p class="text-sm font-medium">
                            2024 © Ahmad Naufal Al Qadri
                        </p>
                    </div>
                    <div class="md:flex hidden gap-2 item-center md:justify-end">
                        <p class="text-sm font-medium">{{ config('app.name') }}</p>
                    </div>
                </div>
            </footer>
            <!-- Footer End -->

        </div>
        <!-- End Page content -->

        <div class="profile-menu">
            <div class="flex flex-col items-center h-full gap-4 py-10 px-3">
                <!-- Profile Link -->
                <a href="#" type="button" class="flex flex-col items-center gap-1">
                    <img src="{{ asset('assets/images/users/avatar.svg') }}" alt="user-image"
                        class="rounded-full h-8 w-8 mb-3">
                    <span class="font-medium text-base">{{ auth()->user()->nama }}</span>
                    <span class="text-sm">Admin</span>
                </a>

                <!-- Profile Edit Button -->
                <div class="flex">
                    <button class="bg-white rounded-full shadow-md p-2"
                        onclick="document.location.href = '{{ route('profile') }}'">
                        <span class="sr-only">Edit Profil</span>
                        <span class="flex items-center justify-center h-6 w-6">
                            <i class="uil uil-user text-2xl"></i>
                        </span>
                    </button>
                </div>

                <!-- Logout Button -->
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <div class="flex">
                        <button class="bg-white rounded-full shadow-md p-2">
                            <span class="sr-only">Logout</span>
                            <span class="flex items-center justify-center h-6 w-6">
                                <i class="uil uil-signout text-2xl"></i>
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>



        <div id="search-modal"
            class="hs-overlay hidden w-full h-full fixed top-0 start-0 z-[60] overflow-x-hidden overflow-y-auto pointer-events-none">
            <div
                class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
                <div class="flex flex-col bg-white shadow-sm rounded-xl pointer-events-auto overflow-hidden">
                    <div class="relative z-[60]">
                        <input type="search" id="search-input" class="form-input ps-10">
                        <span class="absolute start-3 top-1.5">
                            <i class="uil uil-search text-lg"></i>
                        </span>

                        <span class="absolute end-3 top-1.5">
                            <button data-hs-overlay="#search-modal">
                                <i class="uil uil-times text-lg"></i>
                            </button>
                        </span>
                    </div>

                </div>
            </div>
        </div>

    </div>

    <!-- Plugin Js -->
    <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('assets/libs/preline/preline.js') }}"></script>

    <!-- App Js -->
    <script src="{{ asset('assets/js/app.js') }}"></script>

    @stack('scripts')

    <script src="{{ asset('assets/libs/sweetalert2/sweetalert2.all.min.js') }}"></script>
    @if (Session::has('success'))
        <script>
            Swal.fire({
                title: 'Berhasil',
                text: '{{ Session::get('success') }}',
                icon: 'success',
            })
        </script>
    @endif
    @if (Session::has('error'))
        <script>
            Swal.fire({
                title: 'Gagal!',
                text: '{{ Session::get('error') }}',
                icon: 'error',
            })
        </script>
    @endif

</body>

</html>
