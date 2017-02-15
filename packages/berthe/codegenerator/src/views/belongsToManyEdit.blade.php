    <label class="text-danger text-md">Associate {{ucfirst($otherTable)}}</label>

        <select multiple data-plugin-selectTwo class="form-control populate" title="Please select at least one {!! $otherTable !!}"  name="{!! $otherTable !!}[]" @if($type == \Berthe\Codegenerator\Utils\Variable::$DISPLAY_VIEW) disabled @endif>
            S3Bforelse({!! "\\App\\".ucfirst($otherTable)."::all()->sortBy('".$config->displayedAttributes($otherTable)."') as "!!} ${!! "$otherTable" !!})
                <option value="S2BOBRACKET${!! "$otherTable->".$tbs[$otherTable]["id"] !!}S2BCBRACKET" S3Bforeach(${!! "$tab->".$otherTable." as "!!} ${!! "$otherTable"."tmp" !!}) S3Bif(${!! "$otherTable"."tmp->".$tbs[$otherTable]['id']." == $"."$otherTable->".$tbs[$otherTable]["id"] !!}) selected = "selected" @if($type == \Berthe\Codegenerator\Utils\Variable::$EDIT_VIEW) disabled @endif S3Bendif S3Bendforeach>
                    S2BOBRACKET${!! "$otherTable->".$config->displayedAttributes($otherTable) !!}S2BCBRACKET
                </option>
            S3Bempty
                <option value="-1">No {{$otherTable}}</option>
            S3Bendforelse

        </select><br/>