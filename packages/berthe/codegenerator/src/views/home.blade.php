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
            @foreach($tbs as $tab => $table)@if(!$config->isPivot($tab))
                <div class="isotope-item document col-sm-6 col-md-4 col-lg-3">
                    <div class="thumbnail">
                        <div class="thumb-preview">
                            <a class="thumb-image" href="{!!"{"."{url(\"/".$tab."\")}"."}"!!}">
                                <i class="{{$config->getTableIcon($tab)}} fa-5x" aria-hidden="true"></i>
                            </a>
                        </div>
                        <h5 class="mg-title text-weight-semibold">{{ucfirst($config->getPluralForm($tab))}}</h5>
                        <div class="mg-description">
                            <!--<small class="pull-left text-muted">Design, Websites</small>
                            <small class="pull-right text-muted">07/10/2016</small>-->
                        </div>
                    </div>
                </div>
            @endif @endforeach
            </div>
</section>
<!-- end: page -->