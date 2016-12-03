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

	@if(array_key_exists('relations', $table))@foreach($table['relations'] as $relationType)@if($relationType->isBelongsTo())
		<div class="row">
			<div class="col-md-2">
				<label class="text-primary">{{ucfirst($relationType->getOtherTable())}} : </label>
			</div>

			<div class="col-md-5">
				<select class="form-control" name="{!! $relationType->getOtherTable() !!}">
					S3Bforelse({!!"\\App\\".ucfirst($relationType->getOtherTable())."::all() as "!!} ${!! $relationType->getOtherTable() !!})
					<option value="S2BOBRACKET${!! $relationType->getOtherTable()."->".$tbs[$relationType->getOtherTable()]["id"] !!}S2BCBRACKET" S3Bif(session('defaultSelect', 'none') == ${!! $relationType->getOtherTable()."->".$tbs[$relationType->getOtherTable()]["id"] !!}) S2BOBRACKET{!! "\"selected=\\\"\\\"selected\\\"\"" !!}S2BCBRACKET S3Bendif>
						S2BOBRACKET${!! $relationType->getOtherTable()."->".$config->displayedAttributes($relationType->getOtherTable()) !!}S2BCBRACKET
					</option>
					S3Bempty
					<option value="-1">No {{$relationType->getOtherTable()}}</option>
					S3Bendforelse
				</select>
			</div>
		</div><br/>
		@elseif($relationType->isBelongsToMany())
		<div class="row">
			<div class="col-md-2">
				<label class="text-primary">{{ucfirst($relationType->getOtherTable())}}s : </label>
			</div>

			<div class="col-md-7">
				<select class="form-control" multiple="multiple" size="10"  name="{!! $relationType->getOtherTable() !!}[]">
					S3Bforelse({!!"\\App\\".ucfirst($relationType->getOtherTable())."::all() as "!!} ${!! $relationType->getOtherTable() !!})
					<option value="S2BOBRACKET${!! $relationType->getOtherTable()."->".$tbs[$relationType->getOtherTable()]["id"] !!}S2BCBRACKET" S3Bif(session('defaultSelect', 'none') == ${!! $relationType->getOtherTable()."->".$tbs[$relationType->getOtherTable()]["id"] !!}) S2BOBRACKET{!! "\"selected=\\\"\\\"selected\\\"\"" !!}S2BCBRACKET S3Bendif>
					S2BOBRACKET${!! $relationType->getOtherTable()."->".$config->displayedAttributes($relationType->getOtherTable()) !!}S2BCBRACKET
					</option>
					S3Bempty
					<option value="-1">No {{$relationType->getOtherTable()}}</option>
					S3Bendforelse
				</select>
			</div>

			<script>
				var demo1 = $('select[name="{{$relationType->getOtherTable()}}[]"]').bootstrapDualListbox(
						{
							nonSelectedListLabel: 'List of {{ucfirst($relationType->getOtherTable())}}',
							selectedListLabel: 'Selected {{ucfirst($relationType->getOtherTable())}}'
						}
				);
			</script>

		</div><br/>
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
