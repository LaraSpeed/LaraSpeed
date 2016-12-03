@extends('master')
@section('content')
<h1 class="text-danger">Category add form</h1>
<form action="{{url("/category")}}" method="post">   
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="row">
			<div class="col-md-2">
			<label class="text-primary" id="name">Name * : </label>
			</div>
			<div class="col-md-7">
			<input type ="text" class="form-control" name="name" placeholder="Name"  required />
			</div>
		</div> <br/>
		    
			<div class="row">
			<div class="col-md-2">
				<label class="text-primary">Films : </label>
			</div>

			<div class="col-md-7">
				<select class="form-control" multiple="multiple" size="10"  name="film[]">
					@forelse(\App\Film::all() as  $film)
					<option value="{{$film->film_id}}" @if(session('defaultSelect', 'none') == $film->film_id) {{"selected=\"\"selected\""}} @endif>
					{{$film->title}}
					</option>
					@empty
					<option value="-1">No film</option>
					@endforelse
				</select>
			</div>

			<script>
				var demo1 = $('select[name="film[]"]').bootstrapDualListbox(
						{
							nonSelectedListLabel: 'List of Film',
							selectedListLabel: 'Selected Film'
						}
				);
			</script>

		</div><br/>
	  
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
@endsection