@if(array_key_exists('attributs', $table))@foreach($table['attributs'] as $attrName => $attrType)@if($attrType->isDisplayable())@include($attrType->mutator(), ['attrName' => $attrName, 'length' => 40]) @endif
@endforeach @endif

@if(array_key_exists('relations', $table) && !empty($table["relations"]))@foreach($table['relations'] as $relationType)
    @include($relationType->getRelationAccessor(), ["table" => $relationType->getTable(), "otherTable" => $relationType->getOtherTable(), "config" => $config, "tbs" => $tbs])

@endforeach @endif