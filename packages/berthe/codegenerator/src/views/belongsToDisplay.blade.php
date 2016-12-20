<h3 class="text-danger">{{ucfirst($otherTable)}} : </h3>
@foreach($tbs[$otherTable]['attributs'] as $attrName => $attrType)@if($attrType->isDisplayable())
    S2BOBRACKET${!! "$tab->$otherTable->$attrName" !!}S2BCBRACKET
@endif @endforeach