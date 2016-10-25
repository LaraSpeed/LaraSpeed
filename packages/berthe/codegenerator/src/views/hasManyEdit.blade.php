<h3>Add {{ucfirst($otherTable)}}</h3>
<form action="S2BOBRACKET{!! "url(\"/".$tab."/add".ucfirst($otherTable)."/$".$tab."->".$tbs[$tab]['id']."\")" !!}S2BCBRACKET" method="post">
    <input type="hidden" name="_token" value="S2BOBRACKET csrf_token() S2BCBRACKET" />
    <select class="form-control" name="{{$otherTable}}">
        S3Bforelse({!!"\\App\\".ucfirst($otherTable)."::all() as "!!} ${!! "$otherTable" !!})
        <option value="S2BOBRACKET${!! "$otherTable->".$tbs[$otherTable]["id"] !!}S2BCBRACKET">
        @foreach($tbs[$otherTable]["attributs"] as $attrName => $attrType)@if($attrType->isDisplayable())
            S2BOBRACKET${!! "$otherTable->$attrName" !!}S2BCBRACKET
        @endif @endforeach
        </option>
        S3Bempty
        <option value="-1">No {{$otherTable}}</option>
        S3Bendforelse
    </select>

    <input type="submit"  class="btn btn-primary" value="Add"/>
</form>