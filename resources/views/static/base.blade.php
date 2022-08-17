<!DOCTYPE HTML>
<html lang="en">
    <head>
        <!-- Head -->
        @include('layouts.head')
    </head>
    <body class="antialiased">
        <!-- Navbar -->
        @include('layouts.navbar')

        <!-- Content -->
        @yield('content')

        <!-- Footer -->
        @include('layouts.footer')

        <!-- Scripts -->
        @include('layouts.scripts')
    </body>
</html>
