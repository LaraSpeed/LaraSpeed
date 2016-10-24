<!DOCTYPE html>
<html>
    <head>
        <title>
		    @yield('title')
	    </title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <link href="{{URL::asset("css/bootstrap3.css")}}" rel="stylesheet" type="text/css">
        <script src="{{URL::asset("js/jquery.js")}}"></script>
        <script src="{{URL::asset("js/bootstrap3.js")}}"></script>
        <script src="{{URL::asset("js/angular.js")}}"></script>
        <script src="{{URL::asset("js/script.js")}}"></script>


    </head>
    <body ng-app="app" ng-controller="appCtrl">

    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">LaraSpeed</a>
            </div>
        </div><!-- /.container-fluid -->
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                @yield('content')
            </div>
        </div>
    </div>

    @include("modal")

    </body>
</html>
