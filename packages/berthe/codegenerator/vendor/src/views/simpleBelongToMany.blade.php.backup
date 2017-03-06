    <h3 class="text-danger">Associate {{ucfirst($otherTable)}}</h3>
    <form action="S2BOBRACKET{!! "url(\"/".$tab."/add".ucfirst($otherTable)."/$".$tab."->".$tbs[$tab]['id']."\")" !!}S2BCBRACKET" method="post">

        <input type="hidden" name="_token" value="S2BOBRACKET csrf_token() S2BCBRACKET" />

        <select multiple data-plugin-selectTwo class="form-control populate" title="Please select at least one {!! $otherTable !!}"  name="{!! $otherTable !!}[]">
            S3Bforelse({!! "\\App\\".ucfirst($otherTable)."::all() as "!!} ${!! "$otherTable" !!})
                <option value="S2BOBRACKET${!! "$otherTable->".$tbs[$otherTable]["id"] !!}S2BCBRACKET">
                    S2BOBRACKET${!! "$otherTable->".$config->displayedAttributes($otherTable) !!}S2BCBRACKET
                </option>
            S3Bempty
                <option value="-1">No {{$otherTable}}</option>
            S3Bendforelse
        </select><br/>

        <input type="submit"  class="btn btn-primary" value="Associate"/>
    s</form>