<h1 class="text-danger">{{ucfirst($table['title'])}} add form</h1>
<form action="S2BOBRACKET{!!"url(\"/".$table['title']."\")"!!}S2BCBRACKET" method="post">@if( array_key_exists('attributs', $table) )@foreach($table['attributs'] as $attrName => $attrType) @if($attrType->isDisplayable())

		<input type="hidden" name="_token" value="S2BOBRACKET csrf_token() S2BCBRACKET">
		<div class="form-group-lg">
			<label id="{{$attrName}}">{{ucfirst($attrName)}} : </label>
			{!! $attrType->getForm()!!}
		</div>
		@endif @endforeach @endif

		<br/><div class="form-group-lg">
			<button type="submit" class="btn btn-primary">Submit</button>
			<button type="reset" class="btn btn-primary">Cancel</button>
		</div>
</form>
