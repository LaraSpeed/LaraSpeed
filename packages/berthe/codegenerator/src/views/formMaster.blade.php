<!DOCTYPE html>
<html class="sidebar-left-xs scroll">
    <head>

        <!-- Basic -->
        <meta charset="UTF-8">

        <title>LaraSpeed</title>
        <meta name="keywords" content="LaraSpeed" />
        <meta name="description" content="Porto Admin - Responsive HTML5 Template">
        <meta name="author" content="okler.net">

        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

        <!-- Web Fonts  -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

        <!-- Vendor CSS -->
        <link rel="stylesheet" href="{{URL::asset("assets/vendor/bootstrap/css/bootstrap.css")}}" />

        <link rel="stylesheet" href="{{URL::asset("assets/vendor/font-awesome/css/font-awesome.css")}}" />
        <link rel="stylesheet" href="{{URL::asset("assets/vendor/magnific-popup/magnific-popup.css")}}" />
        <link rel="stylesheet" href="{{URL::asset("assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css")}}" />

        <!-- Specific Page Vendor CSS -->
        <link rel="stylesheet" href="{{URL::asset("assets/vendor/jquery-ui/jquery-ui.css")}}" />
        <link rel="stylesheet" href="{{URL::asset("assets/vendor/jquery-ui/jquery-ui.theme.css")}}" />
        <link rel="stylesheet" href="{{URL::asset("assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css")}}" />
        <link rel="stylesheet" href="{{URL::asset("assets/vendor/morris.js/morris.css")}}" />

        <link rel="stylesheet" href="{{URL::asset("assets/vendor/select2/css/select2.css")}}" />
        <link rel="stylesheet" href="{{URL::asset("assets/vendor/select2-bootstrap-theme/select2-bootstrap.min.css")}}" />
        <link rel="stylesheet" href="{{URL::asset("assets/vendor/jquery-datatables-bs3/assets/css/datatables.css")}}" />

        <!-- Specific Page Vendor CSS -->
        @yield("spvcss")


        <link rel="stylesheet" href="{{URL::asset("css/bootstrap3.css")}}" />
        <link rel="stylesheet" href="{{URL::asset("css/prettify.min.css")}}" />
        <link rel="stylesheet" href="{{URL::asset("css/bootstrap-duallistbox.css")}}" />

        <script src="{{URL::asset("js/jquery.js")}}"></script>
        <script src="{{URL::asset("js/bootstrap3.js")}}"></script>
        <script src="{{URL::asset("js/prettyfy.min.js")}}"></script>
        <script src="{{URL::asset("js/jquery.bootstrap-duallistbox.js")}}"></script>

        <!-- Theme CSS -->
        <link rel="stylesheet" href="{{URL::asset("assets/stylesheets/theme.css")}}" />

        <!-- Skin CSS -->
        <link rel="stylesheet" href="{{URL::asset("assets/stylesheets/skins/default.css")}}" />

        <!-- Theme Custom CSS -->
        <link rel="stylesheet" href="{{URL::asset("assets/stylesheets/theme-custom.css")}}">

        <!-- Head Libs -->
        <script src="{{URL::asset("assets/vendor/modernizr/modernizr.js")}}"></script>

        <!--Custom Css-->


    </head>

    <body class="body" ng-app="app" ng-controller="appCtrl">

        <section class="body">
            <!-- start: header -->
            <header class="header">
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
                <!-- end: search & user box -->
            </header>
            <!-- end: header -->

            <div class="inner-wrapper">
                <!-- start: sidebar -->
                <aside id="sidebar-left" class="sidebar-left">

                    <div class="sidebar-header">
                        <div class="sidebar-title">
                            Navigation
                        </div>
                        <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
                            <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
                        </div>
                    </div>

                    <div class="nano">
                        <div class="nano-content">
                            <nav id="menu" class="nav-main" role="navigation">
                                @include('sidebar')
                            </nav>
                        </div>
                    </div>
                </aside>
                <!-- end: sidebar -->

                <!--Body Header-->
                <section role="main" class="content-body">
                    <header class="page-header">
                        <h2>LaraSpeed</h2>
                    </header>

                    <!-- start: page -->
                    <div class="row">
                        @yield('content')
                    </div>
                    <!-- end: page -->
                </section>
            </div>

        </section>

        @include("modal")

        <!-- Vendor -->
        <script src="{{URL::asset("assets/vendor/jquery/jquery.js")}}"></script>
        <script src="{{URL::asset("assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js")}}"></script>
        <script src="{{URL::asset("assets/vendor/bootstrap/js/bootstrap.js")}}"></script>
        <script src="{{URL::asset("assets/vendor/nanoscroller/nanoscroller.js")}}"></script>
        <script src="{{URL::asset("assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js")}}"></script>
        <script src="{{URL::asset("assets/vendor/magnific-popup/jquery.magnific-popup.js")}}"></script>
        <script src="{{URL::asset("assets/vendor/jquery-placeholder/jquery-placeholder.js")}}"></script>

        <!-- Specific Page Vendor -->
        <script src="{{URL::asset("assets/vendor/jquery-ui/jquery-ui.js")}}"></script>
        <script src="{{URL::asset("assets/vendor/jqueryui-touch-punch/jqueryui-touch-punch.js")}}"></script>
        <script src="{{URL::asset("assets/vendor/jquery-appear/jquery-appear.js")}}"></script>
        <script src="{{URL::asset("assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js")}}"></script>
        <script src="{{URL::asset("assets/vendor/jquery-sparkline/jquery-sparkline.js")}}"></script>
        <script src="{{URL::asset("assets/vendor/jquery-validation/jquery.validate.js")}}"></script>

        <script src="{{URL::asset("assets/vendor/select2/js/select2.js")}}"></script>
        <script src="{{URL::asset("assets/vendor/jquery-datatables/media/js/jquery.dataTables.js")}}"></script>
        <script src="{{URL::asset("assets/vendor/jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js")}}"></script>
        <script src="{{URL::asset("assets/vendor/jquery-datatables-bs3/assets/js/datatables.js")}}"></script>

        @yield("spvjs")


        <!-- Theme Base, Components and Settings -->
        <script src="{{URL::asset("assets/javascripts/theme.js")}}"></script>

        <!-- Theme Custom -->
        <script src="{{URL::asset("assets/javascripts/theme.custom.js")}}"></script>

        <!-- Theme Initialization Files -->
        <script src="{{URL::asset("assets/javascripts/theme.init.js")}}"></script>

        <!-- Custom Js -->
        <script src="{{URL::asset("js/angular.js")}}"></script>
        <script src="{{URL::asset("js/script.js")}}"></script>

        <!-- Examples -->
        <script src="{!!URL::asset("assets/javascripts/tables/examples.datatables.default.js")!!}"></script>
        <script src="{!!URL::asset("assets/javascripts/tables/examples.datatables.row.with.details.js")!!}"></script>
        <script src="{!!URL::asset("assets/javascripts/tables/examples.datatables.tabletools.js")!!}"></script>


        <script>
            function goBack() {
                window.history.back();
            }

            $(document).ready(function(){
                $('[data-toggle="tooltip"]').tooltip();
            });

            (function( $ ) {

                'use strict';

                var datatableInit = function() {

                    $('#datatable-default').dataTable();

                };

                $(function() {
                    datatableInit();
                });

            }).apply( this, [ jQuery ]);
        </script>

    </body>
</html>
