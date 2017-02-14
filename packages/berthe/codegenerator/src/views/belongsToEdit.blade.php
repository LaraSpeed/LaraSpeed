<label class="text-danger text-md">Update {{ucfirst($otherTable)}}</label>
    <select class="form-control" name="{{$otherTable}}" @if($type == \Berthe\Codegenerator\Utils\Variable::$DISPLAY_VIEW) disabled @endif>
        S3Bforelse({!!"\\App\\".ucfirst($otherTable)."::all() as "!!} ${!! "$otherTable" !!})
        <option value="S2BOBRACKET${!! "$otherTable->".$tbs[$otherTable]["id"] !!}S2BCBRACKET" S3Bif(${!! "$otherTable->".$tbs[$otherTable]["id"]." == $"."$tab->$otherTable->".$tbs[$otherTable]["id"] !!}) selected = "selected" S3Bendif>
            S2BOBRACKET${!! "$otherTable->".$config->displayedAttributes($otherTable) !!}S2BCBRACKET
        </option>
        S3Bempty
        <option value="-1">No {{$otherTable}}</option>
        S3Bendforelse
    </select><br/>