    <div class="row">
        <div class="col-md-4">
            <h1 class="text-danger">List of {{ucfirst($otherTable).'s'}}</h1>
        </div>

        <div class="col-md-5">
            S2BOBRACKET session(['defaultSelect' => ${!! "$tab->".$tbs[$tab]['id'] !!}]) S2BCBRACKET
            <h4 class="text-danger"><b>{{ucfirst($tab)." : "}}S2BOBRACKET${!! "$tab->".$config->displayedAttributes($tab) !!}S2BCBRACKET</b></h4>
        </div>
    </div>

    <div class="row">

        <div class="col-md-8 col-sm-8">
            <form action="S2BOBRACKET{!!"url(\"/".$tab."/search\")"!!}S2BCBRACKET" method="get">
                <input type="hidden" name="tab" value="S2BOBRACKET$tableS2BCBRACKET" />
                <div class="col-md-2 col-sm-2"></div>

                <div class="col-md-9 col-sm-9">
                    <div class="input-group input-search">
                        <input  type="text" class="form-control" name="keyword" placeholder="S2BOBRACKETsession('keyword', 'Keyword')S2BCBRACKET"/>
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-default">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </div>
            </form>
        </div>

        <div class="col-md-2 col-sm-2">
            <form action="S2BOBRACKET{!!"url(Request::url())"!!}S2BCBRACKET" method="get">
                <input type="hidden" name="cs" />
                <button type="submit" class="btn btn-danger">Clear Search</button>
            </form>
        </div>
    </div>
    <br/>

    <div class="row">
        <div class="col-md-2 col-sm-2">
            <form action="S2BOBRACKET{!!"url(\"/".$otherTable."/create\")"!!}S2BCBRACKET" method="get">
                <button type="submit" class="btn btn-primary">Add new {{ucfirst($otherTable)}}</button>
            </form>
        </div>
    </div>
    <br/>

    <section class="panel">
        <header class="panel-heading">
            <div class="panel-actions">
                <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
            </div>

            <h2 class="panel-title">{{ucfirst($otherTable."s")}}</h2>
        </header>

        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped mb-none" id="datatable-default">
                    <thead>
                        <tr>
                        @foreach($tbs[$otherTable]["attributs"] as $attrName => $attrType) @if($attrType->isDisplayable() && $attrType->isDisplayed())
                        <!--class="{$attrType->formClass("table")}}"-->
                            <th class="text-md text-primary" nowrap>
                              {!! ucfirst(str_replace("_", " ", $attrName))!!}
                            </th>@endif @endforeach
                        @if(key_exists("relations", $tbs[$otherTable]) && !empty($tbs[$otherTable]["relations"]))@foreach($tbs[$otherTable]['relations'] as $relation) @if($relation->getOtherTable() != $tab && $relation->isBelongsTo())
                            <th class="text-md text-primary">
                                {{ucfirst($relation->getOtherTable())}}
                            </th>
                        @endif @endforeach @endif

                            <th class="text-md text-primary" nowrap>Actions</th>

                            @if(key_exists("relations", $tbs[$otherTable]) && !empty($tbs[$otherTable]["relations"]))@foreach($tbs[$otherTable]['relations'] as $relation) @if($relation->getOtherTable() != $tab && !$relation->isBelongsTo() && !$relation->isBelongsToMany())
                                <th class="text-md text-primary">
                                    {!! ucfirst($relation->getOtherTable())  !!}
                                </th>
                            @endif @endforeach @endif

                        </tr>
                    </thead>

                    <tbody>
                        S3Bforelse(${!!"$tab->$otherTable"." as "!!} ${!! "$otherTable" !!})
                            <tr>
                            @foreach($tbs[$otherTable]["attributs"] as $attrName => $attrType) @if($attrType->isDisplayable() && $attrType->isDisplayed())
                            <!-- class="{$attrType->formClass("table")}}" -->
                                <td class="text-md">S2BOBRACKET${!! $otherTable.'->'.$attrName !!}S2BCBRACKET</td>
                                @endif @endforeach

                                @if(key_exists("relations", $tbs[$otherTable]) && !empty($tbs[$otherTable]["relations"]))@foreach($tbs[$otherTable]['relations'] as $relation) @if($relation->getOtherTable() != $tab && $relation->isBelongsTo())
                                    <td class="text-md">
                                        S3Bif(${!! $otherTable.'->'.$relation->getOtherTable() !!})
                                            S2BOBRACKET{!! "$".$otherTable.'->'.$relation->getOtherTable().'->'.$config->displayedAttributes($relation->getOtherTable())!!}S2BCBRACKET
                                        S3Belse
                                            S2BOBRACKET "Not specified" S2BCBRACKET
                                        S3Bendif
                                    </td>
                                @endif @endforeach @endif

                                <td nowrap>
                                    <a href="S2BOBRACKET{!!"url(\"/".$otherTable."/$".$otherTable.'->'.$tbs[$otherTable]['id']."\")"!!}S2BCBRACKET" data-toggle="tooltip" data-placement="top" title="Display"><button class="btn-sm btn-success"><i class="fa fa-arrows-alt fa-lg"></i></button></a>
                                    <a href="S2BOBRACKET{!!"url(\"/".$otherTable."/$".$otherTable.'->'.$tbs[$otherTable]['id']."\")"!!}S2BCBRACKET/edit" data-toggle="tooltip" data-placement="top" title="Edit"><button class="btn-sm btn-warning"><i class="fa fa-edit fa-lg"></i></button></a>
                                    <a href="" ng-click="showModal('Delete', 'Do you really want to delete S2BOBRACKET ${!! $otherTable. "->".$config->displayedAttributes($otherTable)!!}S2BCBRACKET ?', 'S2BOBRACKET{!!"url(\"/".$otherTable."/$".$otherTable.'->'.$tbs[$otherTable]['id']."\")"!!}S2BCBRACKET')" data-toggle="tooltip" data-placement="top" title="Delete"><button class="btn-sm btn-danger"><i class="fa fa-trash-o fa-lg"></i></button></a>
                                </td>

                                @if(key_exists("relations", $tbs[$otherTable]) && !empty($tbs[$otherTable]["relations"]))@foreach($tbs[$otherTable]['relations'] as $relation) @if($relation->getOtherTable() != $tab && !$relation->isBelongsTo() && !$relation->isBelongsToMany())
                                <td class="text-md">
                                    <form action="S2BOBRACKET{!!"url(\"/".$otherTable."/related/$".$otherTable.'->'.$tbs[$otherTable]['id']."\")"!!}S2BCBRACKET" method="get">
                                        <input type="hidden" name="tab" value="{!! $relation->getOtherTable()  !!}" />
                                        <button type="submit" class="btn btn-link">{!! ucfirst($relation->getOtherTable())  !!}</button>
                                    </form>
                                </td>
                            @endif @endforeach @endif
                            </tr>
                        S3Bempty
                            <tr>
                                <td colspan="{{count($tbs[$otherTable]['attributs'])}}"><label class="text-danger text-md">No {{$otherTable}} matching keyword S2BOBRACKETsession('keyword', 'Keyword')S2BCBRACKET.</label></td>
                            </tr>
                        S3Bendforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>