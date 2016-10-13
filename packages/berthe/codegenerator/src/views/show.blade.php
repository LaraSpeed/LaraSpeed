<h1 class="text-danger">List of {{ucfirst($table['title']).'s'}}</h1>

<form action="" method="get">
    <div class="form-group">
        <label>Search : </label>
        <input  type="text" class="form-control" name="filter" placeholder="Search"/>
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-primary" value="Search"/>
    </div>
</form>

<table class="table table-striped">
    <thead>
        <tr>
            @foreach($table['attributs'] as $attrName => $attrType) @if($attrType->isDisplayable())
            <th>
                <a href="{{url($table['title'])}}">{{ucfirst($attrName)}}</a>
            </th>@endif @endforeach

        </tr>
    </thead>

    <tbody>
        S3Bforelse(${{$table['title'].'s'}} as ${{$table['title']}})
            <tr>
    @foreach($table['attributs'] as $attrName => $attrType) @if($attrType->isDisplayable())
        <td>S2BOBRACKET${!! $table['title'].'->'.$attrName !!}S2BCBRACKET</td>
    @endif @endforeach
        <td><a href="{{$table['title'].'/'}}S2BOBRACKET${!! $table['title'].'->'.$table['id'] !!}S2BCBRACKET">View</a></td>
        <td><a href="S2BOBRACKET{!!"url(\"/".$table['title']."/$".$table['title'].'->'.$table['id']."\")"!!}S2BCBRACKET/edit">Edit</a></td>
        @foreach($table['relations'] as $relation)
            <td><a href="#">{!! ucfirst($relation->getOtherTable())  !!}</a></td>
        @endforeach
            </tr>
        S3Bempty
            <tr>
                <td>No {{$table['title']}}.</td>
            </tr>
        S3Bendforelse
    </tbody>
</table>
