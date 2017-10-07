<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="w3-bar w3-border-bottom w3-border-light-gray">
            <div class="w3-container">
                <div class="w3-large">
                    {{-- Toggle Nav --}}
                    <span class="w3-bar-item w3-button w3-hover-none w3-right" onclick="toggleNav()">&#9776</span>

                    <a class="w3-bar-item w3-button w3-hover-none" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>
            </div>
                <div class="w3-animate-left w3-hide" id="dropDown">
                <ul>
                    <!-- Authentication Links -->
                    @guest
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                    @else
                        <li>
                            {{-- Toggle Logout --}}
                            <a href="#" onclick="toggleLogout()">
                                {{ Auth::user()->name }} <span>&#9660</span>
                            </a>
                            <ul class="w3-animate-left w3-margin-top w3-hide" id="logout">
                                <li>
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endguest
                </ul>
            </div>
        </nav>
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <script>
        function toggleNav() {
            document.getElementById('dropDown').classList.toggle('w3-hide'); document.getElementById('logout').classList.add('w3-hide');
        }
        function toggleLogout() {
            event.preventDefault();
            document.getElementById('logout').classList.toggle('w3-hide');
        }
    </script>
</body>
</html>
