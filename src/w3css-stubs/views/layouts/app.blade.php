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

                {{-- App Name --}}
                <a class="w3-bar-item" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>

                {{-- Toggle Nav - Small Screens --}}
                <span class="w3-bar-item w3-right w3-hide-medium w3-hide-large" style="cursor: pointer" onclick="toggleNav()">&#9776</span>

                {{-- MEDIUM and LARGE SCREENS --}}

                {{-- Links --}}
                @auth ()
                    <a href="#" class="w3-bar-item w3-hide-small">Link 1</a>
                    <a href="#" class="w3-bar-item w3-hide-small">Link 2</a>
                @endauth

                {{-- Auth Links --}}
                @guest
                  <a class="w3-hide-small w3-bar-item w3-right" href="{{ route('register') }}">Register</a>
                  <a class="w3-hide-small w3-bar-item w3-right" href="{{ route('login' )}}">Login</a>

                  @else
                    {{-- Toggle Logout --}}
                    <a class="w3-hide-small w3-bar-item w3-right" href="#" onclick="toggleLogout()">
                      {{ Auth::user()->name }}
                      <span>&#9660</span>
                    </a>
                    <br />
                      <ul class="w3-hide w3-border w3-border-white w3-animate-right" id="logout">
                          <li class="w3-right-align w3-margin-right">
                              {{-- Submit Logout --}}
                              <a class="w3-hide-small" href="{{ route('logout') }}"
                                  onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                                  Logout
                              </a>
                              {{-- Hidden Logout Form --}}
                              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                  {{ csrf_field() }}
                              </form>
                          </li>
                      </ul>
                @endguest
            </div>

            {{-- SMALL SCREENS --}}

            <div class="w3-animate-left w3-hide" id="slideIn">

                <ul class="w3-hide-medium w3-hide-large">
                    @guest
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                    @else
                            {{-- Links --}}
                            <li><a href="#">Link 1</a></li>
                            <li><a href="#">Link 2</a></li>
                            {{-- Toggle Logout --}}
                            <li>
                              <a href="#" onclick="toggleLogout2()">
                                  {{ Auth::user()->name }} <span>&#9660</span>
                              </a>
                            </li>
                            <ul class="w3-animate-left w3-hide" id="logout2">
                                <li>
                                  {{-- Submit Logout --}}
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>
                                    {{-- Hidden Logout Form --}}
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
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
            document.getElementById('slideIn').classList.toggle('w3-hide');
            // Hide if exists
            if (document.getElementById('logout2')) {
                document.getElementById('logout2').classList.add('w3-hide');
            }
        }
        function toggleLogout() {
            event.preventDefault();
            document.getElementById('logout').classList.toggle('w3-hide');
        }
        function toggleLogout2() {
            event.preventDefault();
            document.getElementById('logout2').classList.toggle('w3-hide');
          }
    </script>
</body>
</html>
