    <h1 class="text-danger">List of {{ucfirst($config->getPluralForm($table['title']))}}</h1>

    <div class="row">

        <div class="col-md-12 col-sm-12">

            <form action="S2BOBRACKET{!!"url(\"/".$table['title']."/search\")"!!}S2BCBRACKET" method="get">
                <div class="col-md-1 col-sm-1">
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="input-group input-search">
                        <input  type="text" class="form-control" name="keyword" placeholder="S2BOBRACKETsession('keyword', 'Keyword')S2BCBRACKET"/>
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-default">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </div>

                <div class="col-md-1">
                    <button type="submit" class="btn btn-success">Search</button>
                </div>

                <div class="col-md-2">
                    <button type="submit" formmethod="get" formaction="S2BOBRACKET{!!"url(\"/".$table['title']."\")"!!}S2BCBRACKET" class="btn btn-danger">Clear Search</button>
                </div>
            </form>
        </div>
    </div>
    <br/>

    <div class="row">
        <div class="col-md-2 col-sm-2">
            <form action="S2BOBRACKET{!!"url(\"/".$table['title']."/create\")"!!}S2BCBRACKET" method="get">
                <button type="submit" class="btn btn-primary">Add new {{ucfirst($table['title'])}}</button>
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
            <h2 class="panel-title">{{ucfirst($config->getPluralForm($table["title"]))}}</h2>
        </header>

        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped mb-none" id="datatable-default">
                    <thead>
                        <tr>
                        @foreach($table['attributs'] as $attrName => $attrType) @if($attrType->isDisplayable() && $attrType->isDisplayed())
                            <!--class="{$attrType->formClass("table")}}"-->
                            <th class="text-md text-primary" nowrap> <!-- -->
                                {!! ucfirst(str_replace("_", " ", $attrName))!!}
                            </th>@endif @endforeach

                            @if(key_exists("relations", $table) && !empty($table["relations"])) @foreach($table['relations'] as $relation) @if($relation->isBelongsTo())
                                <th class="text-md text-primary">
                                   {{ucfirst($relation->getOtherTable())}}
                                </th>
                            @endif @endforeach @endif

                            @if(key_exists("relations", $table) && !empty($table["relations"]))@foreach($table['relations'] as $relation)@if(!$relation->isBelongsTo() && !$relation->isBelongsToMany())
                                <th class="text-md text-primary">
                                    {!! ucfirst($relation->getOtherTable())  !!}
                                </th>
                            @endif @endforeach @endif

                            <th class="text-md text-primary">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        S3Bforelse(${{$table['title'].'s'}} as ${{$table['title']}})
                            <tr>
                            @foreach($table['attributs'] as $attrName => $attrType) @if($attrType->isDisplayable() && $attrType->isDisplayed())
                                <!--class="{$attrType->formClass("table")}}"-->
                                <td class="text-md">S2BOBRACKET${!! $table['title'].'->'.$attrName !!}S2BCBRACKET {{$attrType->getUnit()}}</td>
                            @endif @endforeach

                                @if(key_exists("relations", $table) && !empty($table["relations"]))@foreach($table['relations'] as $relation) @if($relation->isBelongsTo())
                                    <td class="text-md">
                                        S3Bif({!! "$".$table["title"].'->'.$relation->getOtherTable()!!})
                                            S2BOBRACKET{!! "$".$table["title"].'->'.$relation->getOtherTable().'->'.$config->displayedAttributes($relation->getOtherTable())!!}S2BCBRACKET
                                        S3Belse
                                            S2BOBRACKET "Not specified" S2BCBRACKET
                                        S3Bendif
                                    </td>
                                @endif @endforeach @endif

                                @if(key_exists("relations", $table) && !empty($table["relations"]))@foreach($table['relations'] as $relation)@if(!$relation->isBelongsTo() && !$relation->isBelongsToMany())
                                <td class="text-md">
                                    <form action="S2BOBRACKET{!!"url(\"/".$table['title']."/related/$".$table['title'].'->'.$table['id']."\")"!!}S2BCBRACKET" method="get">
                                        <input type="hidden" name="tab" value="{!! $relation->getOtherTable()  !!}" />
                                        <button type="submit" class="btn btn-link" data-toggle="tooltip" data-placement="top" title="{{$config->getHoverMessage($table['title'].$relation->getOtherTable())}}">{!! ucfirst($config->getPluralForm($relation->getOtherTable()))  !!}</button>
                                    </form>
                                </td>
                            @endif @endforeach @endif

                                <td nowrap>
                                    <a href="S2BOBRACKET{!!"url(\"/".$table['title']."/$".$table['title'].'->'.$table['id']."\")"!!}S2BCBRACKET" data-toggle="tooltip" data-placement="top" title="Display">
                                        <button class="btn-sm btn-success"><i class="fa fa-arrows-alt fa-lg"></i></button>
                                    </a>
                                    <a href="S2BOBRACKET{!!"url(\"/".$table['title']."/$".$table['title'].'->'.$table['id']."\")"!!}S2BCBRACKET/edit" data-toggle="tooltip" data-placement="top" title="Edit">
                                        <button class="btn-sm btn-warning"><i class="fa fa-edit fa-lg"></i></button>
                                    </a>
                                    <a href="" ng-click="showModal('Delete', 'Do you really want to delete S2BOBRACKET ${!! $table['title']. "->".$config->displayedAttributes($table['title'])!!}S2BCBRACKET ?', 'S2BOBRACKET{!!"url(\"/".$table['title']."/$".$table['title'].'->'.$table['id']."\")"!!}S2BCBRACKET')" data-toggle="tooltip" data-placement="top" title="Delete">
                                        <button class="btn-sm btn-danger"><i class="fa fa-trash-o fa-lg"></i></button>
                                    </a>
                                </td>

                            </tr>
                        S3Bempty
                            <tr>
                                <td colspan="{{count($table['attributs'])}}"><label class="text-danger text-md">No {{$table['title']}} matching keyword S2BOBRACKETsession('keyword', 'Keyword')S2BCBRACKET.</label></td>
                            </tr>
                        S3Bendforelse
                    </tbody>
                </table><!--End Table-->
                <div class="col-md-12">
                    S2CBOBRACKET${!! $table['title'].'s'."->links()" !!}S2CBCBRACKET
                </div>
            </div>
        </div>
    </section>