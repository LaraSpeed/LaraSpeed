@extends('simpleMaster')
@section('content')
<!-- start: page -->
<section class="media-gallery">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">Dashboard</div>

                        <div class="panel-body">
                            <h1 class="text-primary">Welcome to your BackOffice</h1>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mg-files" data-sort-destination data-sort-id="media-gallery">
                            @if(\Berthe\Codegenerator\Core\ACLSpecificOperation::canAccessTable(\App\ACLFactory::getACL(), Auth::user()->role, "actor"))
                <div class="isotope-item document col-sm-6 col-md-4 col-lg-4">
                    <div class="thumbnail">
                        <div class="thumb-preview">
                            <a class="thumb-image" href="{{url("/actor")}}">
                                <i class="fa fa-play fa-5x" aria-hidden="true"></i>
                            </a>
                        </div>
                        <h5 class="mg-title text-weight-semibold">Actors</h5>
                        <div class="mg-description">
                            <!--<small class="pull-left text-muted">Design, Websites</small>
                            <small class="pull-right text-muted">07/10/2016</small>-->
                        </div>
                    </div>
                </div>
                 @endif
                             @if(\Berthe\Codegenerator\Core\ACLSpecificOperation::canAccessTable(\App\ACLFactory::getACL(), Auth::user()->role, "film"))
                <div class="isotope-item document col-sm-6 col-md-4 col-lg-4">
                    <div class="thumbnail">
                        <div class="thumb-preview">
                            <a class="thumb-image" href="{{url("/film")}}">
                                <i class="fa fa-film fa-5x" aria-hidden="true"></i>
                            </a>
                        </div>
                        <h5 class="mg-title text-weight-semibold">Films</h5>
                        <div class="mg-description">
                            <!--<small class="pull-left text-muted">Design, Websites</small>
                            <small class="pull-right text-muted">07/10/2016</small>-->
                        </div>
                    </div>
                </div>
                 @endif
                             @if(\Berthe\Codegenerator\Core\ACLSpecificOperation::canAccessTable(\App\ACLFactory::getACL(), Auth::user()->role, "language"))
                <div class="isotope-item document col-sm-6 col-md-4 col-lg-4">
                    <div class="thumbnail">
                        <div class="thumb-preview">
                            <a class="thumb-image" href="{{url("/language")}}">
                                <i class="fa fa-language fa-5x" aria-hidden="true"></i>
                            </a>
                        </div>
                        <h5 class="mg-title text-weight-semibold">Languages</h5>
                        <div class="mg-description">
                            <!--<small class="pull-left text-muted">Design, Websites</small>
                            <small class="pull-right text-muted">07/10/2016</small>-->
                        </div>
                    </div>
                </div>
                 @endif
                             @if(\Berthe\Codegenerator\Core\ACLSpecificOperation::canAccessTable(\App\ACLFactory::getACL(), Auth::user()->role, "category"))
                <div class="isotope-item document col-sm-6 col-md-4 col-lg-4">
                    <div class="thumbnail">
                        <div class="thumb-preview">
                            <a class="thumb-image" href="{{url("/category")}}">
                                <i class="fa fa-tags fa-5x" aria-hidden="true"></i>
                            </a>
                        </div>
                        <h5 class="mg-title text-weight-semibold">Categories</h5>
                        <div class="mg-description">
                            <!--<small class="pull-left text-muted">Design, Websites</small>
                            <small class="pull-right text-muted">07/10/2016</small>-->
                        </div>
                    </div>
                </div>
                 @endif
                             @if(\Berthe\Codegenerator\Core\ACLSpecificOperation::canAccessTable(\App\ACLFactory::getACL(), Auth::user()->role, "customer"))
                <div class="isotope-item document col-sm-6 col-md-4 col-lg-4">
                    <div class="thumbnail">
                        <div class="thumb-preview">
                            <a class="thumb-image" href="{{url("/customer")}}">
                                <i class="fa fa-users fa-5x" aria-hidden="true"></i>
                            </a>
                        </div>
                        <h5 class="mg-title text-weight-semibold">Customers</h5>
                        <div class="mg-description">
                            <!--<small class="pull-left text-muted">Design, Websites</small>
                            <small class="pull-right text-muted">07/10/2016</small>-->
                        </div>
                    </div>
                </div>
                 @endif
                             @if(\Berthe\Codegenerator\Core\ACLSpecificOperation::canAccessTable(\App\ACLFactory::getACL(), Auth::user()->role, "rental"))
                <div class="isotope-item document col-sm-6 col-md-4 col-lg-4">
                    <div class="thumbnail">
                        <div class="thumb-preview">
                            <a class="thumb-image" href="{{url("/rental")}}">
                                <i class="fa fa-industry fa-5x" aria-hidden="true"></i>
                            </a>
                        </div>
                        <h5 class="mg-title text-weight-semibold">Rentals</h5>
                        <div class="mg-description">
                            <!--<small class="pull-left text-muted">Design, Websites</small>
                            <small class="pull-right text-muted">07/10/2016</small>-->
                        </div>
                    </div>
                </div>
                 @endif
                             @if(\Berthe\Codegenerator\Core\ACLSpecificOperation::canAccessTable(\App\ACLFactory::getACL(), Auth::user()->role, "payment"))
                <div class="isotope-item document col-sm-6 col-md-4 col-lg-4">
                    <div class="thumbnail">
                        <div class="thumb-preview">
                            <a class="thumb-image" href="{{url("/payment")}}">
                                <i class="fa fa-paypal fa-5x" aria-hidden="true"></i>
                            </a>
                        </div>
                        <h5 class="mg-title text-weight-semibold">Payments</h5>
                        <div class="mg-description">
                            <!--<small class="pull-left text-muted">Design, Websites</small>
                            <small class="pull-right text-muted">07/10/2016</small>-->
                        </div>
                    </div>
                </div>
                 @endif
                             @if(\Berthe\Codegenerator\Core\ACLSpecificOperation::canAccessTable(\App\ACLFactory::getACL(), Auth::user()->role, "address"))
                <div class="isotope-item document col-sm-6 col-md-4 col-lg-4">
                    <div class="thumbnail">
                        <div class="thumb-preview">
                            <a class="thumb-image" href="{{url("/address")}}">
                                <i class="fa fa-hotel fa-5x" aria-hidden="true"></i>
                            </a>
                        </div>
                        <h5 class="mg-title text-weight-semibold">Addresses</h5>
                        <div class="mg-description">
                            <!--<small class="pull-left text-muted">Design, Websites</small>
                            <small class="pull-right text-muted">07/10/2016</small>-->
                        </div>
                    </div>
                </div>
                 @endif
                             @if(\Berthe\Codegenerator\Core\ACLSpecificOperation::canAccessTable(\App\ACLFactory::getACL(), Auth::user()->role, "city"))
                <div class="isotope-item document col-sm-6 col-md-4 col-lg-4">
                    <div class="thumbnail">
                        <div class="thumb-preview">
                            <a class="thumb-image" href="{{url("/city")}}">
                                <i class="fa fa-home fa-5x" aria-hidden="true"></i>
                            </a>
                        </div>
                        <h5 class="mg-title text-weight-semibold">Cities</h5>
                        <div class="mg-description">
                            <!--<small class="pull-left text-muted">Design, Websites</small>
                            <small class="pull-right text-muted">07/10/2016</small>-->
                        </div>
                    </div>
                </div>
                 @endif
                             @if(\Berthe\Codegenerator\Core\ACLSpecificOperation::canAccessTable(\App\ACLFactory::getACL(), Auth::user()->role, "country"))
                <div class="isotope-item document col-sm-6 col-md-4 col-lg-4">
                    <div class="thumbnail">
                        <div class="thumb-preview">
                            <a class="thumb-image" href="{{url("/country")}}">
                                <i class="fa fa-home fa-5x" aria-hidden="true"></i>
                            </a>
                        </div>
                        <h5 class="mg-title text-weight-semibold">Countries</h5>
                        <div class="mg-description">
                            <!--<small class="pull-left text-muted">Design, Websites</small>
                            <small class="pull-right text-muted">07/10/2016</small>-->
                        </div>
                    </div>
                </div>
                 @endif
                             @if(\Berthe\Codegenerator\Core\ACLSpecificOperation::canAccessTable(\App\ACLFactory::getACL(), Auth::user()->role, "store"))
                <div class="isotope-item document col-sm-6 col-md-4 col-lg-4">
                    <div class="thumbnail">
                        <div class="thumb-preview">
                            <a class="thumb-image" href="{{url("/store")}}">
                                <i class="fa fa-amazon fa-5x" aria-hidden="true"></i>
                            </a>
                        </div>
                        <h5 class="mg-title text-weight-semibold">Stores</h5>
                        <div class="mg-description">
                            <!--<small class="pull-left text-muted">Design, Websites</small>
                            <small class="pull-right text-muted">07/10/2016</small>-->
                        </div>
                    </div>
                </div>
                 @endif
                             @if(\Berthe\Codegenerator\Core\ACLSpecificOperation::canAccessTable(\App\ACLFactory::getACL(), Auth::user()->role, "staff"))
                <div class="isotope-item document col-sm-6 col-md-4 col-lg-4">
                    <div class="thumbnail">
                        <div class="thumb-preview">
                            <a class="thumb-image" href="{{url("/staff")}}">
                                <i class="fa fa-user fa-5x" aria-hidden="true"></i>
                            </a>
                        </div>
                        <h5 class="mg-title text-weight-semibold">Staffs</h5>
                        <div class="mg-description">
                            <!--<small class="pull-left text-muted">Design, Websites</small>
                            <small class="pull-right text-muted">07/10/2016</small>-->
                        </div>
                    </div>
                </div>
                 @endif
                         </div>
</section>
<!-- end: page -->@endsection