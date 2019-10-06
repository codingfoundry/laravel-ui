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

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="antialiased bg-gray-200">
    <div id="app">
        <nav class="bg-white shadow-lg p-6">
            <div class="container mx-auto flex justify-between">
                <a class="font-semibold py-2" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <div class="flex justify-end">
                    @guest
                        <a class="mr-6 py-2" href="{{ route('login') }}">{{ __('Login') }}</a>
                        @if (Route::has('register'))
                            <a class="py-2" href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif
                    @else
                        <a id="" class="mr-6 py-2 px-3 bg-gray-200 hover:bg-gray-300 rounded-l-full rounded-r-full" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <div class="py-2" aria-labelledby="navbarDropdown">
                            <a class="py-2" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    @endguest
                </div>
            </div>
        </nav>

        <main class="container mx-auto py-12">
            @yield('content')
        </main>
    </div>
</body>
</html>
