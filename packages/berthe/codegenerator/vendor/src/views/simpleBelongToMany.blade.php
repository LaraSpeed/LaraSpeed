    <h3 class="text-danger">Associate {{ucfirst($otherTable)}}</h3>
        <select multiple data-plugin-selectTwo class="form-control populate" title="Please select at least one {!! $otherTable !!}"  name="{!! $otherTable !!}[]">
            S3Bforelse({!! "\\App\\".ucfirst($otherTable)."::all() as "!!} ${!! "$otherTable" !!})
                <option value="S2BOBRACKET${!! "$otherTable->".$tbs[$otherTable]["id"] !!}S2BCBRACKET">
                    S2BOBRACKET${!! "$otherTable->".$config->displayedAttributes($otherTable) !!}S2BCBRACKET
                </option>
            S3Bempty
                <option value="-1">No {{$otherTable}}</option>
            S3Bendforelse
        </select><br/>