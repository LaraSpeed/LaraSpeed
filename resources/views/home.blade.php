@extends('master')
@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        <ul>
                            <li>
                                <a href="{{url("/film")}}">Films</a>
                            </li>
                            <li>
                                <a href="{{url("/language")}}">Languages</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection