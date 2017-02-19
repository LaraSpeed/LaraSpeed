    <label class="text-danger text-md">Associate {{ucfirst($otherTable)}}</label>

        <select id="{{$otherTable}}" name="{!! $otherTable !!}[]" @if($type == \Berthe\Codegenerator\Utils\Variable::$DISPLAY_VIEW) multiple data-plugin-selectTwo class="form-control populate" disabled @else multiple="multiple" size="10" @endif>
            S3Bforelse({!! "\\App\\".ucfirst($otherTable)."::all()->sortBy('".$config->displayedAttributes($otherTable)."') as "!!} ${!! "$otherTable" !!})
                <option value="S2BOBRACKET${!! "$otherTable->".$tbs[$otherTable]["id"] !!}S2BCBRACKET" S3Bforeach(${!! "$tab->".$otherTable." as "!!} ${!! "$otherTable"."tmp" !!}) S3Bif(${!! "$otherTable"."tmp->".$tbs[$otherTable]['id']." == $"."$otherTable->".$tbs[$otherTable]["id"] !!}) selected = "selected" S3Bendif S3Bendforeach>
                    S2BOBRACKET${!! "$otherTable->".$config->displayedAttributes($otherTable) !!}S2BCBRACKET
                </option>
            S3Bempty
                <option value="-1">No {{$otherTable}}</option>
            S3Bendforelse

        </select><br/>

    @if($type == \Berthe\Codegenerator\Utils\Variable::$EDIT_VIEW)
        <script> $('#{{$otherTable}}').bootstrapDualListbox(
                {
                    nonSelectedListLabel: 'Non-selected {{$otherTable}}',
                    selectedListLabel: 'Selected {{$otherTable}}',
                    moveOnSelect: true,
                    nonSelectedFilter: ''
                }
        ); </script>
    @endif