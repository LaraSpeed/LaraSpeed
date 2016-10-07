<h1 class="text-danger">{{ucfirst($table['title'])}} add form</h1>
<form action="{{$table['title'].'s'}}" method="post">@if( array_key_exists('attributs', $table) )@foreach($table['attributs'] as $attrName => $attrType) @if($attrType->isDisplayable())

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
