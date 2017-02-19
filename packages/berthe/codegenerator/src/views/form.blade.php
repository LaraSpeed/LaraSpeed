    <h1 class="text-danger">Add {{ucfirst($table['title'])}}</h1>
    <form action="S2BOBRACKET{!!"url(\"/".$table['title']."\")"!!}S2BCBRACKET" method="post">

		<input type="hidden" name="_token" value="S2BOBRACKET csrf_token() S2BCBRACKET">

		@if( array_key_exists('attributs', $table) )@foreach($table['attributs'] as $attrName => $attrType) @if($attrType->isDisplayable())

        <div class="form-group">
			<label class="text-danger text-md" id="{{$attrName}}">@if($attrType->isRequired()){{str_replace("_", " ", ucfirst($attrName))}} * : @else {{str_replace("_", " ", ucfirst($attrName))}} : @endif</label>
			{!! $attrType->getForm()!!}
		</div> <br/>
		@endif @endforeach @endif

	@if(array_key_exists('relations', $table) && !empty($table["relations"]))@foreach($table['relations'] as $relationType)@if($relationType->isBelongsTo())
		<div class="form-group">
			<label class="text-danger text-md">{{ucfirst($relationType->getOtherTable())}} : </label>

			<select class="form-control" name="{!! $relationType->getOtherTable() !!}">
				S3Bforelse({!!"\\App\\".ucfirst($relationType->getOtherTable())."::all() as "!!} ${!! $relationType->getOtherTable() !!})
					<option value="S2BOBRACKET${!! $relationType->getOtherTable()."->".$tbs[$relationType->getOtherTable()]["id"] !!}S2BCBRACKET" S3Bif(session('defaultSelect', 'none') == ${!! $relationType->getOtherTable()."->".$tbs[$relationType->getOtherTable()]["id"] !!}) S2BOBRACKET{!! "\"selected=\\\"\\\"selected\\\"\"" !!}S2BCBRACKET S3Bendif>
						S2BOBRACKET${!! $relationType->getOtherTable()."->".$config->displayedAttributes($relationType->getOtherTable()) !!}S2BCBRACKET
					</option>
				S3Bempty
					<option value="-1">No {{$relationType->getOtherTable()}}</option>
				S3Bendforelse
			</select>
		</div><br/>

		@elseif($relationType->isBelongsToMany())
		<div class="form-group">
			<label class="text-danger text-md">{{ucfirst($relationType->getOtherTable())}}s : </label>

			<select multiple data-plugin-selectTwo class="form-control populate" title="Please select at least one {!! $relationType->getOtherTable() !!}"  name="{!! $relationType->getOtherTable() !!}[]">
					S3Bforelse({!!"\\App\\".ucfirst($relationType->getOtherTable())."::all() as "!!} ${!! $relationType->getOtherTable() !!})
					    <option value="S2BOBRACKET${!! $relationType->getOtherTable()."->".$tbs[$relationType->getOtherTable()]["id"] !!}S2BCBRACKET" S3Bif(session('defaultSelect', 'none') == ${!! $relationType->getOtherTable()."->".$tbs[$relationType->getOtherTable()]["id"] !!}) S2BOBRACKET{!! "\"selected=\\\"\\\"selected\\\"\"" !!}S2BCBRACKET S3Bendif>
					S2BOBRACKET${!! $relationType->getOtherTable()."->".$config->displayedAttributes($relationType->getOtherTable()) !!}S2BCBRACKET
					    </option>
					S3Bempty
					    <option value="-1">No {{$relationType->getOtherTable()}}</option>
					S3Bendforelse
			</select>
		</div><br/>
	@endif @endforeach @endif

		<div class="row">

			<div class="col-md-3">
				<label class="text-danger text-md"> * = Mandatory fields</label>
			</div>

		</div> <br/>

		<div class="row">
			<div class="col-md-3">
			    <button type="submit" name="carl" class="btn btn-primary">Create and return to list</button>
			</div>

			<div class="col-md-3">
				<button type="submit" name="cas" class="btn btn-primary">Create and Stay</button>
			</div>

			<div class="col-md-3">
			    <button type="reset" onclick="goBack();" class="btn btn-danger">Cancel and return to list</button>
			</div>
		</div>
    </form>


    <!-- Specific Page Vendor -->
    <script src="{{URL::asset("assets/vendor/select2/js/select2.js")}}"></script>
    <script src="{{URL::asset("assets/vendor/jquery-datatables/media/js/jquery.dataTables.js")}}"></script>
    <script src="{{URL::asset("assets/vendor/jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js")}}"></script>
    <script src="{{URL::asset("assets/vendor/jquery-datatables-bs3/assets/js/datatables.js")}}"></script>
