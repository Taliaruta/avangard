<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="{{ url('favicon.png') }}">
        
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Styles -->
        @yield('extra_styles')
        <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div id="app">
            <nav class="navbar navbar-default navbar-static-top">
                <div class="fluid-container">
                    <div class="navbar-header">

                        <!-- Collapsed Hamburger -->
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                            <span class="sr-only">Toggle Navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                        <!-- Branding Image -->
                        <a class="navbar-brand" href="{{ url('/') }}">
                            {{ config('app.name', 'Avangard') }}
                        </a>
                    </div>

                    <div class="navbar-collapse" id="app-navbar-collapse">
                        <!-- Left Side Of Navbar -->
                        <ul class="nav navbar-nav">
                            <li>
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">Заказы<span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ route('orders') }}">Все</a></li>
                                    <li><a href="{{ route('orders', ['type' => 'expired']) }}">Просроченные</a></li>
                                    <li><a href="{{ route('orders', ['type' => 'current']) }}">Текущие</a></li>
                                    <li><a href="{{ route('orders', ['type' => 'new']) }}">Новые</a></li>
                                    <li><a href="{{ route('orders', ['type' => 'completed']) }}">Выполненные</a></li>

                                </ul>
                            </li>
                            <li>
                                <a href="{{ route('weather') }}">Погода</a>
                            </li>
                        </ul>

                    </div>
                </div>
            </nav>

            <main role="main" class="container panel panel-default">
                @yield('content')
            </main>
        </div>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
        @yield('extra_js')

    </body>
</html>
