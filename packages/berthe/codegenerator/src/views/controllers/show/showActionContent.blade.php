@if(key_exists("relations", $table) && !empty($table["relations"]))@foreach($table["relations"] as $relation)<?php $tb[] = $relation->getOtherTable() ?>@endforeach
@include($relation->getActionView(), ['tab' => $relation->getTable(), 'otherTable' => $relation->getOtherTable(), 'args' => Berthe\Codegenerator\Utils\Helper::createStringArray($tb)])

@endif
@include("showReturnValController", ['tab' => $table["title"], "type" => "display"])