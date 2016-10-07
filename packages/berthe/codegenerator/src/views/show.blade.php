<h1 class="text-danger">List of {{ucfirst($table['title'])}}</h1>
<table class="table table-striped">
    <thead>
        <tr><th>See</th>
            @foreach($table['attributs'] as $attrName => $attrType) @if($attrType->isDisplayable())
            <th>
                <a href="{{url($table['title'])}}">{{ucfirst($attrName)}}</a>
            </th>@endif @endforeach

        </tr>
    </thead>

    <tbody>
        S3Bforelse(${{$table['title'].'s'}} as ${{$table['title']}})
            <tr>
                <td><a href="{{$table['title'].'/'}}S2BOBRACKET${!! $table['title'].'->'.$table['id'] !!}S2BCBRACKET">See</a></td>
    @foreach($table['attributs'] as $attrName => $attrType) @if($attrType->isDisplayable())
        <td>S2BOBRACKET${!! $table['title'].'->'.$attrName !!}S2BCBRACKET</td>
    @endif @endforeach
</tr>
        S3Bempty
            <tr>
                <td>No {{$table['title']}}.</td>
            </tr>
        S3Bendforelse
    </tbody>
</table>
