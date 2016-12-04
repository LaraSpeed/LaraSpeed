<h1 class="text-danger">List of {{ucfirst($table['title']).'s'}}</h1>

<div class="row">

    <div class="col-md-8 col-sm-8">
<form action="S2BOBRACKET{!!"url(\"/".$table['title']."/search\")"!!}S2BCBRACKET" method="get">

    <div class="col-md-2 col-sm-2">
    </div>

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
        <form action="S2BOBRACKET{!!"url(\"/".$table['title']."\")"!!}S2BCBRACKET" method="get">
            <button type="submit" class="btn btn-danger">Clear Search</button>
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

        <h2 class="panel-title">{{ucfirst($table["title"]."s")}}</h2>
    </header>
    <div class="panel-body">

<table class="table table-bordered table-striped mb-none" id="datatable-default">
    <thead>
        <tr>
            @foreach($table['attributs'] as $attrName => $attrType) @if($attrType->isDisplayable())
            <th class="{{$attrType->formClass("table")}}">
                <form action="S2BOBRACKET{!!"url(\"/".$table['title']."/sort\")"!!}S2BCBRACKET" method="get">
                    <input type="hidden" name="{{$attrName}}"/>
                <button class="btn btn-link" type="submit"><p S3Bif(session('{{$attrName}}', 'keyword') != "keyword") ng-style = "{ 'font-weight': 'bold', 'text-decoration' : 'underline' }" S3Bendif >{!! ucfirst(str_replace("_", " ", $attrName))!!} S3Bif(session('{{$attrName}}', 'none') == 'asc') <span class="text-dark"><i class="fa fa-arrow-up"></i></span> S3Belseif(session('{{$attrName}}', 'none') == 'desc') <span class="text-dark"><i class="fa fa-arrow-down"></i></span> S3Belse <span class="text-dark"><i class="fa fa-arrows-v"></i></span> S3Bendif</p></button>
                </form>
            </th>@endif @endforeach

        </tr>
    </thead>

    <tbody>
        S3Bforelse(${{$table['title'].'s'}} as ${{$table['title']}})
            <tr>
    @foreach($table['attributs'] as $attrName => $attrType) @if($attrType->isDisplayable())
        <td class="{{$attrType->formClass("table")}}">S2BOBRACKET${!! $table['title'].'->'.$attrName !!}S2BCBRACKET</td>
    @endif @endforeach
        <td class="defaut"><form action="S2BOBRACKET{!!"url(\"/".$table['title']."/$".$table['title'].'->'.$table['id']."\")"!!}S2BCBRACKET" method="get">
                <button type="submit" class="btn btn-link"><i class="fa fa-arrows-alt"></i></button>
            </form>
        </td>
        <td class="defaut"><form action="S2BOBRACKET{!!"url(\"/".$table['title']."/$".$table['title'].'->'.$table['id']."\")"!!}S2BCBRACKET/edit" method="get">
                <button type="submit" class="btn btn-link"><i class="fa fa-edit"></i></button>
            </form>
        </td>
        <td class="defaut">
            <input type="hidden" name="_token" value="S2BOBRACKET csrf_token() S2BCBRACKET" />
            <button type="submit" class="btn btn-link" ng-click="showModal('Delete', 'Do you really want to delete S2BOBRACKET ${!! $table['title']. "->".$config->displayedAttributes($table['title'])!!}S2BCBRACKET ?', 'S2BOBRACKET{!!"url(\"/".$table['title']."/$".$table['title'].'->'.$table['id']."\")"!!}S2BCBRACKET')"><i class="fa fa-trash-o"></i></button>
        </td>
        @foreach($table['relations'] as $relation)
            <td class="defaut">
                <form action="S2BOBRACKET{!!"url(\"/".$table['title']."/related/$".$table['title'].'->'.$table['id']."\")"!!}S2BCBRACKET" method="get">
                    <input type="hidden" name="tab" value="{!! $relation->getOtherTable()  !!}" />
                    <button type="submit" class="btn btn-link">{!! ucfirst($relation->getOtherTable())  !!}</button>
                </form>
            </td>
        @endforeach
            </tr>
        S3Bempty
            <tr>
                <td colspan="{{count($table['attributs'])}}"><label class="text-danger">No {{$table['title']}} matching keyword S2BOBRACKETsession('keyword', 'Keyword')S2BCBRACKET.</label></td>
            </tr>
        S3Bendforelse
    </tbody>
</table><!--End Table-->

        <div class="row datatables-footer">
            <div class="col-md-6"></div>
            <div class="col-md-6">
                S2CBOBRACKET${!! $table['title']."s->links()" !!}S2CBCBRACKET
            </div>
        </div>
    </div>
</section>