<h1>Liste des {{ucfirst($table['title'])}}</h1>
<table class="table table-striped">
    <thead>
        <tr>@foreach($table['attributs'] as $attrName => $attrType) @if($attrType->isDisplayable())
            <th>
                <a href="{{url($table['title'])}}">{{ucfirst($attrName)}}</a>
            </th>@endif @endforeach

        </tr>
    </thead>

    <tbody>
        S3Bforelse(${{$table['title'].'s'}} as ${{$table['title']}})
            <tr>
    @foreach($table['attributs'] as $attrName => $attrType) @if($attrType->isDisplayable())
        <td><a href="{{$table['title'].'/'}}S2BOBRACKET${!! $table['title'].'->'.$table['id'] !!}S2BCBRACKET">S2BOBRACKET${!! $table['title'].'->'.$attrName !!}S2BCBRACKET</a></td>
    @endif @endforeach
</tr>
        S3Bempty
            <tr>
                <td>No {{$table['title']}}.</td>
            </tr>
        S3Bendforelse
    </tbody>
</table>
