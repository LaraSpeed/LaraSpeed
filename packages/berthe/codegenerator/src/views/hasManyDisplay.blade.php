<h1 class="text-danger">List of {{ucfirst($otherTable).'s'}}</h1>
<table class="table">
    <thead>
    @foreach($tbs[$otherTable]["attributs"] as $attrName => $attrType)@if($attrType->isDisplayable())
        <th>{!! ucfirst(str_replace("_", " ", $attrName)) !!}</th>
    @endif @endforeach
    </thead>
S3Bforelse(${!!"$tab->$otherTable as "!!} ${!! "$otherTable" !!})
    <tbody>
    @foreach($tbs[$otherTable]["attributs"] as $attrName => $attrType)@if($attrType->isDisplayable())
        <td>S2BOBRACKET${!! "$otherTable->$attrName" !!}S2BCBRACKET</td>
    @endif @endforeach
    </tbody>
S3Bempty
    <td>No {{$otherTable}} for {{$tab}}</td>
S3Bendforelse
</table>