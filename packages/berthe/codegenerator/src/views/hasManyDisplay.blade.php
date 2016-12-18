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
            <div class="col-md-2 col-sm-2">
                <input type="submit" class="btn btn-primary" value="Search"/>
            </div>

            <div class="col-md-10 col-sm-10">
                <input  type="text" class="form-control" name="keyword" placeholder="S2BOBRACKETsession('keyword', 'Keyword')S2BCBRACKET"/>
            </div>


        </form>
    </div>

    <div class="col-md-1 col-sm-1">
        <form action="S2BOBRACKET{!!"url(Request::url())"!!}S2BCBRACKET" method="get">
            <input type="hidden" name="cs" />
            <button type="submit" class="btn btn-primary">Clear Search</button>
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


<table class="table table-striped">
    <thead>
    <tr>
        @foreach($tbs[$otherTable]["attributs"] as $attrName => $attrType) @if($attrType->isDisplayable())
            <th class="{{$attrType->formClass("table")}}">
                <form action="S2BOBRACKET{!!"url(\"/".$tab."/sort\")"!!}S2BCBRACKET" method="get">
                    <input type="hidden" name="{{$attrName}}"/>
                    <input type="hidden" name="tab" value="S2BOBRACKET$tableS2BCBRACKET" />
                    <button class="btn btn-link" type="submit"><p S3Bif(session('{{$attrName}}', 'keyword') != "keyword") ng-style = "{ 'font-weight': 'bold', 'text-decoration' : 'underline' }" S3Bendif >{!! ucfirst(str_replace("_", "<br/>", $attrName))!!} <img src="S2BOBRACKET URL::asset(session('{{$attrName}}', 'none').'.png') S2BCBRACKET" /></p></button>
                </form>
            </th>@endif @endforeach

    </tr>
    </thead>

    <tbody>
    S3Bforelse(${!!"$tab->$otherTable"."_paginated as "!!} ${!! "$otherTable" !!})
    <tr>
        @foreach($tbs[$otherTable]["attributs"] as $attrName => $attrType) @if($attrType->isDisplayable())
            <td class="{{$attrType->formClass("table")}}">S2BOBRACKET${!! $otherTable.'->'.$attrName !!}S2BCBRACKET</td>
        @endif @endforeach
        <td class="defaut"><form action="S2BOBRACKET{!!"url(\"/".$otherTable."/$".$otherTable.'->'.$tbs[$otherTable]['id']."\")"!!}S2BCBRACKET" method="get">
                <button type="submit" class="btn btn-link">View</button>
            </form>
        </td>
        <td class="defaut"><form action="S2BOBRACKET{!!"url(\"/".$otherTable."/$".$otherTable.'->'.$tbs[$otherTable]['id']."\")"!!}S2BCBRACKET/edit" method="get">
                <button type="submit" class="btn btn-link">Edit</button>
            </form>
        </td>
        <td class="defaut">
            <input type="hidden" name="_token" value="S2BOBRACKET csrf_token() S2BCBRACKET" />
            <button type="submit" class="btn btn-link" ng-click="showModal('Delete', 'Do you really want to delete S2BOBRACKET ${!! $otherTable. "->".$config->displayedAttributes($otherTable)!!}S2BCBRACKET ?', 'S2BOBRACKET{!!"url(\"/".$otherTable."/$".$otherTable.'->'.$tbs[$otherTable]['id']."\")"!!}S2BCBRACKET')">Delete</button>
        </td>
        @foreach($tbs[$otherTable]['relations'] as $relation)@if($relation->getOtherTable() != $tab)
            <td class="defaut">
                <form action="S2BOBRACKET{!!"url(\"/".$otherTable."/related/$".$otherTable.'->'.$tbs[$otherTable]['id']."\")"!!}S2BCBRACKET" method="get">
                    <input type="hidden" name="tab" value="{!! $relation->getOtherTable()  !!}" />
                    <button type="submit" class="btn btn-link">{!! ucfirst($relation->getOtherTable())  !!}</button>
                </form>
            </td>
        @endif @endforeach
    </tr>
    S3Bempty
    <tr>
        <td colspan="{{count($tbs[$otherTable]['attributs'])}}"><label class="text-danger">No {{$otherTable}} matching keyword S2BOBRACKETsession('keyword', 'Keyword')S2BCBRACKET.</label></td>
    </tr>
    S3Bendforelse
    </tbody>
</table>
S2CBOBRACKET${!! "$tab->$otherTable"."_paginated->links()" !!}S2CBCBRACKET