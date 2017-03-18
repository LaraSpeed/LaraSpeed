@extends('master')
@section('content')
<h1 class="text-danger">Create City</h1>
    <form action="{{url("/city")}}" method="post">

		<input type="hidden" name="_token" value="{{ csrf_token() }}">

		   
        <div class="form-group">
			<label class="text-danger text-md" id="city">City * : </label>
			 <input type ="text" class="form-control" name="city" placeholder="City"  required /> 		</div> <br/>
		      
	 		<div class="form-group">
			<label class="text-danger text-md">Country : </label>

			<select class="form-control" name="country">
				@forelse(\App\Country::all() as  $country)
					<option value="{{$country->country_id}}" @if(session('defaultSelect', 'none') == $country->country_id) {{"selected=\"\"selected\""}} @endif>
						{{$country->country}}
					</option>
				@empty
					<option value="-1">No country</option>
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