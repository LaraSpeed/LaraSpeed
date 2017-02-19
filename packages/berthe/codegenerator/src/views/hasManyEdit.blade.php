    <label class="text-danger text-md">Add {{ucfirst($otherTable)}}</label>
        <select id="{{$otherTable}}" name="{!! $otherTable !!}[]" multiple="multiple" size="10">
            S3Bforelse({!! "\\App\\".ucfirst($otherTable)."::all()->sortBy('".$config->displayedAttributes($otherTable)."') as "!!} ${!! "$otherTable" !!})
                <option value="S2BOBRACKET${!! "$otherTable->".$tbs[$otherTable]["id"] !!}S2BCBRACKET" S3Bforeach(${!! "$tab->".$otherTable." as "!!} ${!! "$otherTable"."tmp" !!}) S3Bif(${!! "$otherTable"."tmp->".$tbs[$otherTable]['id']." == $"."$otherTable->".$tbs[$otherTable]["id"] !!}) selected = "selected" S3Bendif S3Bendforeach>
                    S2BOBRACKET${!! "$otherTable->".$config->displayedAttributes($otherTable) !!}S2BCBRACKET
                </option>
            S3Bempty
                <option value="-1">No {{$otherTable}}</option>
            S3Bendforelse
        </select><br/>
        <script> $('#{{$otherTable}}').bootstrapDualListbox(
            {
                nonSelectedListLabel: 'Non-selected {{ucfirst($otherTable)}}',
                selectedListLabel: 'Selected {{ucfirst($otherTable)}}',
                moveOnSelect: true,
                nonSelectedFilter: ''
            }
        ); </script>