    <label class="text-danger text-md">Associate {{ucfirst($config->getPluralForm($otherTable))}}</label>
        <select multiple data-plugin-selectTwo class="form-control populate" title="Please select at least one {!! $otherTable !!}"  name="{!! $otherTable !!}[]">
            S3Bforelse({!! "\\App\\".ucfirst($otherTable)."::all()->sortBy('".$config->displayedAttributes($otherTable)."') as "!!} ${!! "$otherTable" !!})
                <option value="S2BOBRACKET${!! "$otherTable->".$tbs[$otherTable]["id"] !!}S2BCBRACKET">
                    S2BOBRACKET${!! "$otherTable->".$config->displayedAttributes($otherTable) !!}S2BCBRACKET
                </option>
            S3Bempty
                <option value="-1">No {{$otherTable}}</option>
            S3Bendforelse
        </select><br/>