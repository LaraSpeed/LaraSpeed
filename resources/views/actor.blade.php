@extends('master')
@section('content')
<h1 class="text-danger">Create Actor</h1>
    <form action="{{url("/actor")}}" method="post">

		<input type="hidden" name="_token" value="{{ csrf_token() }}">

		   
        <div class="form-group">
			<label class="text-danger text-md" id="first_name">First Name * : </label>
			 <input type ="text" class="form-control" name="first_name" placeholder="First name"  required /> 		</div> <br/>
		  
        <div class="form-group">
			<label class="text-danger text-md" id="last_name">Last Name * : </label>
			 <input type ="text" class="form-control" name="last_name" placeholder="Last name"  required /> 		</div> <br/>
		    
			<div class="form-group">
			<label class="text-danger text-md">Films : </label>

			<select multiple data-plugin-selectTwo class="form-control populate" title="Please select at least one film"  name="film[]">
					@forelse(\App\Film::all() as  $film)
					    <option value="{{$film->film_id}}" @if(session('defaultSelect', 'none') == $film->film_id) {{"selected=\"\"selected\""}} @endif>
					{{$film->title}}
					    </option>
					@empty
					    <option value="-1">No film</option>
					@endforelse
			</select>
		</div><br/>
	  
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
    <script src="http://localhost/assets/vendor/select2/js/select2.js"></script>
    <script src="http://localhost/assets/vendor/jquery-datatables/media/js/jquery.dataTables.js"></script>
    <script src="http://localhost/assets/vendor/jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js"></script>
    <script src="http://localhost/assets/vendor/jquery-datatables-bs3/assets/js/datatables.js"></script>
@endsection