@extends('simpleMaster')
@section('content')
<section class="body-sign">
    <div class="center-sign">
        <a href="/" class="logo pull-left">
            <h2 class="text-primary">LaraSpeed</h2>
        </a>

        <div class="panel panel-sign">
            <div class="panel-title-sign mt-xl text-right">
                <h2 class="title text-uppercase text-weight-bold m-none"><i class="fa fa-user mr-xs"></i> Sign Up</h2>
            </div>
            <div class="panel-body">
                <form method="POST" action="{{url('/register')}}">

                    {{csrf_field()}}

                    <div class="form-group mb-lg{{$errors->has('name') ? ' has-error' : ''}}">
                        <label for="name">Name</label>
                        <input name="name" type="text" class="form-control input-lg" value="{{old('name')}}" autofocus/>
                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{$errors->first('name')}}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group mb-lg {{$errors->has('email') ? ' has-error' : ''}}">
                        <label for="email">E-mail Address</label>
                        <input name="email" type="email" class="form-control input-lg"  value="{{old('email')}}"/>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{$errors->first('email')}}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group mb-none">
                        <div class="row">
                            <div class="col-sm-6 mb-lg{{$errors->has('password') ? ' has-error' : ''}}">
                                <label for="password">Password</label>
                                <input name="password" type="password" class="form-control input-lg" />
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{$errors->first('password')}}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-sm-6 mb-lg{{$errors->has('password_confirmation') ? ' has-error' : ''}}">
                                <label>Password Confirmation</label>
                                <input name="password-confirm" type="password" class="form-control input-lg" />
                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{$errors->first('password_confirmation')}}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-8">
                            <div class="checkbox-custom checkbox-default">
                                <input id="AgreeTerms" name="agreeterms" type="checkbox"/>
                                <label for="AgreeTerms">I agree with <a href="#">terms of use</a></label>
                            </div>
                        </div>
                        <div class="col-sm-4 text-right">
                            <button type="submit" class="btn btn-primary hidden-xs">Sign Up</button>
                            <button type="submit" class="btn btn-primary btn-block btn-lg visible-xs mt-lg">Sign Up</button>
                        </div>
                    </div>

                    <p class="text-center">Already have an account? <a href=" {{url('/login')}}">Sign In!</a></p>

                </form>
            </div>
        </div>

        <p class="text-center text-muted mt-md mb-md">&copy; Copyright 2016. All Rights Reserved.</p>
    </div>
</section>@endsection