<h1>Liste des {{ucfirst($table['title'])}}</h1>
<table class="table table-striped">
    <thead>
        <tr>@foreach($table['attributs'] as $attrName => $attrType)

            <th>
                <a href="{{url('/')}}">{{ucfirst($attrName)}}</a>
            </th>@endforeach

        </tr>
    </thead>

    <tbody>
        S3Bforelse(${{$table['title'].'s'}} as ${{$table['title']}})
            <tr>
    @foreach($table['attributs'] as $attrName => $attrType)
            <td>${!! $table['title'].'->'.$attrName !!}</td>
    @endforeach
        </tr>
        S3Bempty
            <tr>
                <td>No {{$table['title']}}.</td>
            </tr>
        S3Bendforelse
    </tbody>
</table>
