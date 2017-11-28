<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>MarketChat</title>

        {{-- Styles --}}
        <link type="text/css" href="{{ asset('css/app.css') }}" rel="stylesheet">

        @yield('styles')
    </head>

    <body>
        <div class="navbar navbar-fixed-top">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <div class="logo">
                            <a href="{{ route('show.index') }}">Website</a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        {{-- Logged in, display links --}}
                        @if (Auth::check())
                            <ul class="nav navbar-nav">
                                <li>
                                    <a href="#">Link</a>
                                </li>
                                <li>
                                    <a href="#">Link2</a>
                                </li>
                            </ul>
                        @endif
                    </div>
                    <div class="col-md-3">
                        {{-- Logged in, display profile --}}
                        @if (Auth::check())
                            {{-- Display user profile stuff --}}
                        @else
                            <ul class="nav navbar-nav right">
                                <li>
                                    <a href="{{ route('show.login') }}">Login</a>
                                </li>
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        {{-- Page content --}}
        <div class="content">
            @yield('content')
        </div>

        {{-- Scripts --}}
        <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>

        <script type="text/javascript">
            $('.form-control').focus(function(){
                $(this).prev().addClass('active');
            }).blur(function(){
                $(this).prev().removeClass('active');
            });

            // Auto heightens element to fix text
            function autoGrow(element) {
                element.style.height = "5px";
                element.style.height = (element.scrollHeight) + "px";
            }
        </script>

        @yield('scripts')
    </body>
</html>
