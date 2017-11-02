<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Market Chat</title>

        {{-- Styles --}}
        <link type="text/css" href="{{ asset('css/app.css') }}" rel="stylesheet">

        @yield('styles')
    </head>

    <body>
        <div class="navbar navbar-fixed-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="logo">
                            <a href="{{ route('index') }}">Market Chat</a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        @if (Auth::check())
                            <ul class="nav navbar-nav">
                                <li>
                                    <a href="#">Link</a>
                                </li>
                            </ul>
                        @endif
                    </div>
                    <div class="col-md-3">
                        @if (!Auth::check())
                            <ul class="nav navbar-nav right">
                                <li>
                                    <a href="">Login</a>
                                </li>
                            </ul>
                        @else
                            {{-- Display user profile stuff --}}
                        @endif
                    </div>
                </div>
            </div>
        </div>

        {{-- Page content --}}
        <div class="content">
            <div class="container">
                @yield('content')
            </div>
        </div>

        {{-- Scripts --}}
        <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>

        @yield('scripts')
    </body>
</html>
