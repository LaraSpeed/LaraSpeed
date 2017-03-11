<!DOCTYPE html>
<html class="scroll">
    <head>

        <!-- Basic -->
        <meta charset="UTF-8">

        <title>LaraSpeed</title>
        <meta name="keywords" content="LaraSpeed" />
        <meta name="description" content="Porto Admin - Responsive HTML5 Template">
        <meta name="author" content="Seydou Berthe">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

        <!-- Web Fonts  -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

        <!-- Vendor CSS -->
        <link rel="stylesheet" href="{{URL::asset("assets/vendor/bootstrap/css/bootstrap.css")}}" />

        <link rel="stylesheet" href="{{URL::asset("assets/vendor/font-awesome/css/font-awesome.css")}}" />
        <link rel="stylesheet" href="{{URL::asset("assets/vendor/magnific-popup/magnific-popup.css")}}" />
        <link rel="stylesheet" href="{{URL::asset("assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css")}}" />

        <!-- Theme CSS -->
        <link rel="stylesheet" href="{{URL::asset("assets/stylesheets/theme.css")}}" />

        <!-- Skin CSS -->
        <link rel="stylesheet" href="{{URL::asset("assets/stylesheets/skins/default.css")}}" />

        <!-- Theme Custom CSS -->
        <link rel="stylesheet" href="{{URL::asset("assets/stylesheets/theme-custom.css")}}">

        <!-- Head Libs -->
        <script src="{{URL::asset("assets/vendor/modernizr/modernizr.js")}}"></script>

        <!--Custom Css-->

        <!-- Scripts -->
        <script>
            window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
            ]); ?>
        </script>


    </head>

    <body class="body">

    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    LaraSpeed
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    &nbsp;
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ url('/logout') }}"
                                       onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
        </nav>

        @yield('content')

        <!-- Vendor -->
        <script src="{{URL::asset("assets/vendor/jquery/jquery.js")}}"></script>
        <script src="{{URL::asset("assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js")}}"></script>
        <script src="{{URL::asset("assets/vendor/bootstrap/js/bootstrap.js")}}"></script>
        <script src="{{URL::asset("assets/vendor/nanoscroller/nanoscroller.js")}}"></script>
        <script src="{{URL::asset("assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js")}}"></script>
        <script src="{{URL::asset("assets/vendor/magnific-popup/jquery.magnific-popup.js")}}"></script>
        <script src="{{URL::asset("assets/vendor/jquery-placeholder/jquery-placeholder.js")}}"></script>

        <!-- Theme Base, Components and Settings -->
        <script src="{{URL::asset("assets/javascripts/theme.js")}}"></script>

        <!-- Theme Custom -->
        <script src="{{URL::asset("assets/javascripts/theme.custom.js")}}"></script>

        <!-- Theme Initialization Files -->
        <script src="{{URL::asset("assets/javascripts/theme.init.js")}}"></script>

    </body>
</html>
