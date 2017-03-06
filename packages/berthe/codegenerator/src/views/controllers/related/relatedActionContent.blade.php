@if(key_exists("relations", $table) && !empty($table["relations"]))@foreach($table["relations"] as $relation)<?php $tb[] = $relation->getOtherTable() ?>@endforeach
@include($relation->getActionView(), ['tab' => $relation->getTable(), 'otherTable' => $relation->getOtherTable(), 'args' => Berthe\Codegenerator\Utils\Helper::createStringArray($tb), 'config' => $config])

{!! "return view('".$relation->getTable()."_related', compact(['".$relation->getTable()."', 'table']));" !!}
@endif