@extends('controllerMaster')

@section('modelNamespace'){{ucfirst($table['title'])}}@endsection

@section('namespaces')
    @if(key_exists("relations", $table) && !empty($table["relations"]))@foreach($table["relations"] as $relation){!! "use App\\".ucfirst($relation->getOtherTable()).";" !!}

    @endforeach @endif
@endsection

@section('controllerName'){{ucfirst($table['title'])."Controller"}}@endsection

@section('viewName'){{$table['title']}}@endsection

@section('varID'){{$table['title'].'s'}}@endsection

@section('modelCall'){!!ucfirst($table['title']).'::paginate(20)'!!}@endsection

@section('createView'){{$table['title']}}@endsection

@section('storeContent')
${!! "data = request()->all();" !!}

        ${!! $table['title']." = " !!}{!! ucfirst($table['title'])."::create([" !!}
    @foreach($table['attributs'] as $attrName => $attrType)@if($attrType->isDisplayable())@if(!$attrType->isBoolean())
        {!! "\"$attrName\" => $"."data[\"$attrName\"]," !!}
        @else {!! "\"$attrName\" => ($"."data[\"$attrName\"] == 'on' ? 1:0)," !!} @endif
@endif @endforeach
    {!! "]);" !!}

    @if(key_exists("relations", $table) && !empty($table["relations"]))@foreach($table["relations"] as $relation)@if($relation->isBelongsTo())
    {!! "if(request()->exists('".$relation->getOtherTable()."')){" !!}
            ${!! $relation->getOtherTable()." = " !!}{!! ucfirst($relation->getOtherTable())."::find(request()->get('".$relation->getOtherTable()."'));" !!}
            ${!! $table['title']."->".$relation->getOtherTable()."()->associate($".$relation->getOtherTable().")->save();" !!}
         {!! "}" !!}

    @elseif($relation->isBelongsToMany())
    {!! "if(request()->exists('".$relation->getOtherTable()."')){" !!}
            ${!! $table['title']."->".$relation->getOtherTable()."()->attach($"."data[\"".$relation->getOtherTable()."\"]);" !!}
        {!! "}" !!}
    @endif @endforeach @endif
@endsection

@section('store'){!!"redirect('/".$table['title']."');"!!}@endsection

@section('object'){{ucfirst($table['title']).' $'.$table['title']}} @endsection
<?php $tb = array(); ?>
@section('show')@if(key_exists("relations", $table) && !empty($table["relations"]))@foreach($table["relations"] as $relation)<?php $tb[] = $relation->getOtherTable() ?>@endforeach
@include($relation->getActionView(), ['tab' => $relation->getTable(), 'otherTable' => $relation->getOtherTable(), 'args' => Berthe\Codegenerator\Utils\Helper::createStringArray($tb)])

@endif
@include("showReturnValController", ['tab' => $table["title"], "type" => "display"])
@endsection

@section('editParam'){{ucfirst($table['title']).' $'.$table['title']}} @endsection
<?php $tb = array(); ?>
@section('edit')@if(key_exists("relations", $table) && !empty($table["relations"]))@foreach($table["relations"] as $relation)<?php $tb[] = $relation->getOtherTable() ?>@endforeach
@include($relation->getActionView(), ['tab' => $relation->getTable(), 'otherTable' => $relation->getOtherTable(), 'args' => Berthe\Codegenerator\Utils\Helper::createStringArray($tb)])

@endif
@include("showReturnValController", ['tab' => $table["title"], "type" => "edit"])
@endsection

@section('updateParam'){{ucfirst($table['title']).' $'.$table['title']}} @endsection
@section('update')
    ${!! "data = request()->all();" !!}

    ${!! "updateFields = array();" !!}
    @foreach($table['attributs'] as $attrName => $attrType)@if($attrType->isDisplayable())
        ${!! "updateFields["."\"$attrName\"] = $"."data[\"$attrName\"];" !!}
    @endif @endforeach

    ${!! $table['title']."->update($"."updateFields);" !!}

    @if(key_exists("relations", $table) && !empty($table["relations"]))@foreach($table["relations"] as $relation)@if($relation->isBelongsTo())
        {!! "if(request()->exists('".$relation->getOtherTable()."')){" !!}
            ${!! $relation->getOtherTable()." = " !!}{!! "\\App\\".ucfirst($relation->getOtherTable())."::find(request()->get('".$relation->getOtherTable()."'));" !!}
            ${!! $table["title"]."->".$relation->getOtherTable()."()->associate($".$relation->getOtherTable().")->save();" !!}
        {!! "}" !!}

    @elseif($relation->isBelongsToMany())
        {!! "if(request()->exists('".$relation->getOtherTable()."')){" !!}
            ${!! $table["title"]."->".$relation->getOtherTable()."()->sync(request()->get('".$relation->getOtherTable()."'));" !!}
        {!! "}" !!}

    @elseif($relation->isHasMany())
        {!! "if(request()->exists('".$relation->getOtherTable()."')){" !!}

            ${!! "newOnes = \\App\\".ucfirst($relation->getOtherTable())."::find(request()->get('".$relation->getOtherTable()."'));" !!}

            {!! "foreach ($"."newOnes as $"."newOne){" !!}
                ${!! $table["title"]."->".$relation->getOtherTable()."()->save($"."newOne);"!!}
            {!! "}" !!}

        {!! "}" !!}
    @endif @endforeach @endif



@endsection

@section('deleteParam'){{ucfirst($table['title']).' $'.$table['title']}} @endsection
@section('delete')${!! $table['title']."->delete();" !!} @endsection

@section('relatedParam'){{ucfirst($table['title']).' $'.$table['title']}} @endsection
<?php $tb = array(); ?>
@section('related')@if(key_exists("relations", $table) && !empty($table["relations"]))@foreach($table["relations"] as $relation)<?php $tb[] = $relation->getOtherTable() ?>@endforeach
@include($relation->getActionView(), ['tab' => $relation->getTable(), 'otherTable' => $relation->getOtherTable(), 'args' => Berthe\Codegenerator\Utils\Helper::createStringArray($tb), 'config' => $config])

        {!! "return view('".$relation->getTable()."_related', compact(['".$relation->getTable()."', 'table']));" !!}
@endif
@endsection

@section('search')
${!! $table['title'].'s = ' !!}{!! ucfirst($table['title'])."::where('".$table['id']."', 'like', $"."keyword)" !!}
    @foreach($table['attributs'] as $attrName => $attrType)     {!!"->orWhere('$attrName', 'like', $"."keyword)" !!}

    @endforeach
    {!! '->paginate(20);' !!}

        ${!! $table['title']."s->setPath(\"search?keyword=$"."keyword\");"!!}
        {!! "return view('".$table['title']."_show', compact('".$table['title']."s'));" !!}
@endsection

@section('sort')
{!! "request()->session()->forget(\"sortKey\");" !!}
        {!! "request()->session()->forget(\"sortOrder\");" !!}
    {!!"if(!request()->exists('tab')){" !!}
        ${!! $table['title'].'s = ' !!}{!! ucfirst($table['title'])."::query();" !!}
    @foreach($table['attributs'] as $attrName => $attrType)@if($attrType->isDisplayable())
   {!!"if(request()->exists('$attrName')){" !!}
            ${!! $table['title'].'s = ' !!}${!! $table['title']."s->orderBy('$attrName', $"."this->getOrder('$attrName'));" !!}
            ${!! 'path = ' !!}{!! "\"$attrName\";" !!}
        {!! "}else{" !!}
            {!! "request()->session()->forget(\"$attrName\");" !!}
        {!! "}" !!}
    @endif @endforeach
    ${!! $table['title'].'s = ' !!}${!! $table['title'].'s->paginate(20);' !!}
        ${!! $table['title']."s->setPath(\"sort?$"."path\");"!!}
        {!! "return view('".$table['title']."_show', compact('".$table['title']."s'));" !!}

    {!! "}else{" !!}

    @if(key_exists("relations", $table) && !empty($table["relations"]))@foreach($table["relations"] as $relation)  {!!"if(request()->exists('tab') == '".$relation->getOtherTable()."'){" !!}

        @foreach($tbs[$relation->getOtherTable()]['attributs'] as $attrName => $attrType)@if($attrType->isDisplayable())
{!!"if(request()->exists('$attrName')){" !!}
             {!! "session(['sortOrder' => $"."this->getOrder('$attrName')]);" !!}
             {!! "session(['sortKey' => '$attrName']);" !!}
        {!! "}else{" !!}
            {!! "request()->session()->forget(\"$attrName\");" !!}
        {!! "}" !!}

        @endif @endforeach

      {!! "}" !!}
    @endforeach @endif
    {!! "return back();" !!}
    {!! "}" !!}
@endsection

@section('relations')@if(key_exists("relations", $table) && !empty($table["relations"]))@foreach($table["relations"] as $relation)
@include($relation->getAction(), ['tab' => $relation->getTable(), 'otherTable' => $relation->getOtherTable(), 'tbs' => $tbs])

@endforeach @endif
@endsection
