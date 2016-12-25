<!DOCTYPE html>
<html class="sidebar-left-xs">
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

        <!-- Specific Page Vendor CSS -->
        <link rel="stylesheet" href="{{URL::asset("assets/vendor/select2/css/select2.css")}}" />
        <link rel="stylesheet" href="{{URL::asset("assets/vendor/select2-bootstrap-theme/select2-bootstrap.min.css")}}" />
        <link rel="stylesheet" href="{{URL::asset("assets/vendor/jquery-datatables-bs3/assets/css/datatables.css")}}" />

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
                <div class="logo-container">
                    <a href="../" class="logo">
                        <h4>LaraSpeed</h4>
                    </a>
                    <div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
                        <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
                    </div>
                </div>

                <!-- start: search & user box -->
                <div class="header-right">
                    <!--<form action="" class="search nav-form">
                        <div class="input-group input-search">
                            <input type="text" class="form-control" name="q" id="q" placeholder="Search...">
							<span class="input-group-btn">
								<button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
							</span>
                        </div>
                    </form>-->
                </div>
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
        </script>

    </body>
</html>
