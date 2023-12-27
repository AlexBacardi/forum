<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-avatar@latest/dist/avatar.min.css">
    <link rel="stylesheet" href="{{ asset('css/plugins/fontawesome-free/css/all.min.css')}}">
    @stack('css')
    @stack('cssMain')
    <title>@yield('title')</title>
</head>
    <body class="d-flex flex-column min-vh-100">
        <div class="flex-grow-1 mb-5">
            @include('includes.nav')
            @if (Route::is('register') or Route::is('login') or Route::is('password.request'))
            @else
                @include('includes.error')
                @include('includes.search')
            @endif
            @yield('content')
        </div>
        <footer  class="mb-4 bg-body-tertiary">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12 col-md-6 p-4 text-center text-md-start">
                        <a href="#" class="navbar-brand fs-4">{{__('FORUM')}}</a>
                    </div>
                    <div class="col-12 col-md-6 p-4">
                        <p class="text-center text-md-end mb-0">
                            {{__('© 2023 Все права защищены')}}
                        </p>
                    </div>
                </div>
            </div>
        </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
