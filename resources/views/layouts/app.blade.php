<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
{{--    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />--}}
{{--    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>--}}
    @livewireStyles
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        @auth
                            @can('manage_log')
                                <li class="nav-item">
                                    <a @class(['nav-link', 'active' => request()->routeIs('logs.*')]) href="{{ route('logs.index') }}">{{ __('general.logs') }}</a>
                                </li>
                            @endcan
                            @can('manage_user')
                                <li class="nav-item">
                                    <a @class(['nav-link', 'active' => request()->routeIs('users.*')]) href="{{ route('users.index') }}">{{ __('general.users') }}</a>
                                </li>
                            @endcan
                            @can('manage_company')
                                <li class="nav-item">
                                    <a @class(['nav-link', 'active' => request()->routeIs('companies.*')]) href="{{ route('companies.index') }}">{{ __('general.companies') }}</a>
                                </li>
                            @endcan
                            @can('manage_flight')
                                <li class="nav-item">
                                    <a @class(['nav-link', 'active' => request()->routeIs('seasons.*')]) href="{{ route('seasons.index') }}">{{ __('general.seasons') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a @class(['nav-link', 'active' => request()->routeIs('scheduled-flights.*')]) href="{{ route('scheduled-flights.index') }}">{{ __('general.scheduled') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a @class(['nav-link', 'active' => request()->routeIs('charters.*')]) href="{{ route('charters.index') }}">{{ __('general.charter') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a @class(['nav-link', 'active' => request()->routeIs('militaries.*')]) href="{{ route('militaries.index') }}">{{ __('general.military_overflight') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a @class(['nav-link', 'active' => request()->routeIs('notams.*')]) href="{{ route('notams.index') }}">{{ __('general.notam') }}</a>
                                </li>
                            @endcan
                        @endauth
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->

                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>

                            @include('partials.notifications')
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
          integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script>

        $(document).ready(function() {
            $('.js-multiple').select2();
        });
    </script>
    @livewireScripts
</body>
</html>
