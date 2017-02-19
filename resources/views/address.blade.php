@extends('master')
@section('content')
<h1 class="text-danger">Add Address</h1>
    <form action="{{url("/address")}}" method="post">

		<input type="hidden" name="_token" value="{{ csrf_token() }}">

		   
        <div class="form-group">
			<label class="text-danger text-md" id="address">Address * : </label>
			<input type ="text" class="form-control" name="address" placeholder="Address"  required />
		</div> <br/>
		  
        <div class="form-group">
			<label class="text-danger text-md" id="address2"> Address2 : </label>
			<input type ="text" class="form-control" name="address2" placeholder="Address2"  required />
		</div> <br/>
		  
        <div class="form-group">
			<label class="text-danger text-md" id="district">District * : </label>
			<input type ="text" class="form-control" name="district" placeholder="District"  required />
		</div> <br/>
		    
        <div class="form-group">
			<label class="text-danger text-md" id="postal_code">Postal code * : </label>
			<input type ="text" class="form-control" name="postal_code" placeholder="Postal code"  required />
		</div> <br/>
		  
        <div class="form-group">
			<label class="text-danger text-md" id="phone">Phone * : </label>
			<input type ="text" class="form-control" name="phone" placeholder="Phone"  required />
		</div> <br/>
		    
	  		<div class="form-group">
			<label class="text-danger text-md">City : </label>

			<select class="form-control" name="city">
				@forelse(\App\City::all() as  $city)
					<option value="{{$city->city_id}}" @if(session('defaultSelect', 'none') == $city->city_id) {{"selected=\"\"selected\""}} @endif>
						{{$city->city}}
					</option>
				@empty
					<option value="-1">No city</option>
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