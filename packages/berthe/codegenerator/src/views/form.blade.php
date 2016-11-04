<h1 class="text-danger">{{ucfirst($table['title'])}} add form</h1>
<form action="S2BOBRACKET{!!"url(\"/".$table['title']."\")"!!}S2BCBRACKET" method="post">@if( array_key_exists('attributs', $table) )@foreach($table['attributs'] as $attrName => $attrType) @if($attrType->isDisplayable())

		<input type="hidden" name="_token" value="S2BOBRACKET csrf_token() S2BCBRACKET">
		<div class="row">
			<div class="col-md-2">
			<label class="text-primary" id="{{$attrName}}">@if($attrType->isRequired()){{str_replace("_", " ", ucfirst($attrName))}} * : @else {{str_replace("_", " ", ucfirst($attrName))}} : @endif</label>
			</div>
			<div class="{!! $attrType->formClass("form") !!}">
			{!! $attrType->getForm()!!}
			</div>
		</div> <br/>
		@endif @endforeach @endif

		<div class="row">
			<div class="col-md-2">
				<label class="text-danger"> * = Mandatory fields</label>
			</div>
		</div> <br/>

		<div class="row">
			<div class="col-md-2">
			<button type="submit" class="btn btn-primary">Create and return to list</button>
			</div>

			<div class="col-md-1 col-md-offset-4">
			<button type="reset" onclick="goBack();" class="btn btn-danger">Cancel and return to list</button>
			</div>
		</div>
</form>
