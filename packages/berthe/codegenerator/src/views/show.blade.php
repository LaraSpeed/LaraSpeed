<h1 class="text-danger">List of {{ucfirst($table['title']).'s'}}</h1>

<div class="row">
    <div class="col-md-2 col-sm-2">
        <form action="S2BOBRACKET{!!"url(\"/".$table['title']."\")"!!}S2BCBRACKET" method="get">
            <button type="submit" class="btn btn-primary">Clear Search</button>
        </form>
    </div>

    <div class="col-md-8 col-sm-8">
<form action="S2BOBRACKET{!!"url(\"/".$table['title']."/search\")"!!}S2BCBRACKET" method="get">

    <div class="col-md-10 col-sm-10">
        <input  type="text" class="form-control" name="keyword" placeholder="S2BOBRACKETsession('keyword', 'Keyword')S2BCBRACKET"/>
    </div>

    <div class="col-md-2 col-sm-2">
        <input type="submit" class="btn btn-primary" value="Search"/>
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

<table class="table table-striped">
    <thead>
        <tr>
            @foreach($table['attributs'] as $attrName => $attrType) @if($attrType->isDisplayable())
            <th>
                <a href="S2BOBRACKET{!!"url(\"/".$table['title']."/sort?$attrName\")"!!}S2BCBRACKET">{{ucfirst(str_replace("_", " ", $attrName))}}</a>
            </th>@endif @endforeach

        </tr>
    </thead>

    <tbody>
        S3Bforelse(${{$table['title'].'s'}} as ${{$table['title']}})
            <tr>
    @foreach($table['attributs'] as $attrName => $attrType) @if($attrType->isDisplayable())
        <td>S2BOBRACKET${!! $table['title'].'->'.$attrName !!}S2BCBRACKET</td>
    @endif @endforeach
        <td><form action="S2BOBRACKET{!!"url(\"/".$table['title']."/$".$table['title'].'->'.$table['id']."\")"!!}S2BCBRACKET" method="get">
                <button type="submit" class="btn btn-link">View</button>
            </form>
        </td>
        <td><form action="S2BOBRACKET{!!"url(\"/".$table['title']."/$".$table['title'].'->'.$table['id']."\")"!!}S2BCBRACKET/edit" method="get">
                <button type="submit" class="btn btn-link">Edit</button>
            </form>
        </td>
        <td><form action="S2BOBRACKET{!!"url(\"/".$table['title']."/$".$table['title'].'->'.$table['id']."\")"!!}S2BCBRACKET" method="post">
                {{ method_field('DELETE') }}<input type="hidden" name="_token" value="S2BOBRACKET csrf_token() S2BCBRACKET" /><button type="submit" class="btn btn-link">Delete</button>
            </form>
        </td>
        @foreach($table['relations'] as $relation)
            <td>
                <form action="S2BOBRACKET{!!"url(\"/".$table['title']."/related/$".$table['title'].'->'.$table['id']."\")"!!}S2BCBRACKET" method="get">
                    <button type="submit" class="btn btn-link">{!! ucfirst($relation->getOtherTable())  !!}</button>
                </form>
            </td>
        @endforeach
            </tr>
        S3Bempty
            <tr>
                <td>No {{$table['title']}}.</td>
            </tr>
        S3Bendforelse
    </tbody>
</table>
S2CBOBRACKET${!! $table['title']."s->links()" !!}S2CBCBRACKET