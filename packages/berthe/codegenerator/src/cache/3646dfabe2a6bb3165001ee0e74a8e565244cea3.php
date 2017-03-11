<!-- start: page -->
<section class="body-sign">
    <div class="center-sign">
        <a href="/" class="logo pull-left">
            <img src="assets/images/logo.png" height="54" alt="Porto Admin" />
        </a>

        <div class="panel panel-sign">
            <div class="panel-title-sign mt-xl text-right">
                <h2 class="title text-uppercase text-weight-bold m-none"><i class="fa fa-user mr-xs"></i> Sign In</h2>
            </div>
            <div class="panel-body">
                <form method="POST" action="S2BOBRACKET<?php echo "url('/login')"; ?>S2BCBRACKET">

                    S2BOBRACKET<?php echo e("csrf_field()"); ?>S2BCBRACKET

                    <div class="form-group mb-lgS2BOBRACKET$<?php echo "errors->has('email') ? ' has-error' : '' "; ?>S2BCBRACKET">
                        <label for="email">Email</label>
                        <div class="input-group input-group-icon">
                            <input name="email" type="email" class="form-control input-lg" value="S2BOBRACKET<?php echo "old('email')"; ?>S2BCBRACKET" autofocus/>
                            <span class="input-group-addon">
                                <span class="icon icon-lg">
                                    <i class="fa fa-user"></i>
                                </span>
                            </span>
                        </div>
                        S3Bif ($errors->has('email'))
                            <span class="help-block">
                                <strong>S2BOBRACKET$<?php echo "errors->first('email')"; ?>S2BCBRACKET</strong>
                            </span>
                        S3Bendif
                    </div>

                    <div class="form-group mb-lgS2BOBRACKET$<?php echo "errors->has('password') ? ' has-error' : ''"; ?>S2BCBRACKET">
                        <div class="clearfix">
                            <label class="pull-left">Password</label>
                            <a href="S2BOBRACKET<?php echo "url('/password/reset')"; ?>S2BCBRACKET" class="pull-right">Lost Password?</a>
                        </div>
                        <div class="input-group input-group-icon">
                            <input name="password" type="password" class="form-control input-lg" />
                            <span class="input-group-addon">
                                <span class="icon icon-lg">
                                    <i class="fa fa-lock"></i>
                                </span>
                            </span>
                        </div>
                        S3Bif($errors->has('password'))
                            <span class="help-block">
                                <strong>S2BOBRACKET$<?php echo "errors->first('password')"; ?>S2BCBRACKET</strong>
                            </span>
                        S3Bendif
                    </div>

                    <div class="row">
                        <div class="col-sm-8">
                            <div class="checkbox-custom checkbox-default">
                                <input id="remember" name="remember" type="checkbox"/>
                                <label for="remember">Remember Me</label>
                            </div>
                        </div>
                        <div class="col-sm-4 text-right">
                            <button type="submit" class="btn btn-primary hidden-xs">Sign In</button>
                            <button type="submit" class="btn btn-primary btn-block btn-lg visible-xs mt-lg">Sign In</button>
                        </div>
                    </div>

                    <p class="text-center">Don't have an account yet? <a href="S2BOBRACKET<?php echo "url('/')"; ?>S2BCBRACKET">Sign Up!</a></p>

                </form>
            </div>
        </div>

        <p class="text-center text-muted mt-md mb-md">&copy; Copyright 2016. All Rights Reserved.</p>
    </div>
</section>
<!-- end: page -->