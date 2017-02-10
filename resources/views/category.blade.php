@extends('master')
@section('content')
<h1 class="text-danger">Category add form</h1>
    <form action="{{url("/category")}}" method="post">   
	    <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="row">
		    <div class="col-md-3">
			    <label class="text-primary text-md" id="name">Name * : </label>
		    </div>

		    <div class="col-md-7">
			    <input type ="text" class="form-control" name="name" placeholder="Name"  required />
			</div>

		</div> <br/>
		    
			<div class="row">

			<div class="col-md-3">
				<label class="text-primary text-md">Films : </label>
			</div>

			<div class="col-md-7">
				<select multiple data-plugin-selectTwo class="form-control populate" title="Please select at least one film"  name="film[]">
					@forelse(\App\Film::all() as  $film)
					    <option value="{{$film->film_id}}" @if(session('defaultSelect', 'none') == $film->film_id) {{"selected=\"\"selected\""}} @endif>
					{{$film->title}}
					    </option>
					@empty
					    <option value="-1">No film</option>
					@endforelse
				</select>
			</div>

		</div><br/>
	  
		<div class="row">

			<div class="col-md-3">
				<label class="text-danger text-md"> * = Mandatory fields</label>
			</div>

		</div> <br/>

		<div class="row">
			<div class="col-md-3">
			    <button type="submit" class="btn btn-primary">Create and return to list</button>
			</div>

			<div class="col-md-3 col-md-offset-4">
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