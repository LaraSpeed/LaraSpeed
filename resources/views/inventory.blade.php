@extends('master')
@section('content')
<h1 class="text-danger">Create Inventory</h1>
    <form action="{{url("/inventory")}}" method="post">

		<input type="hidden" name="_token" value="{{ csrf_token() }}">

		         
			<div class="form-group">
			<label class="text-danger text-md">Film : </label>

			<select class="form-control" name="film">
				@forelse(\App\Film::all() as  $film)
					<option value="{{$film->film_id}}" @if(session('defaultSelect', 'none') == $film->film_id) {{"selected=\"\"selected\""}} @endif>
						{{$film->title}}
					</option>
				@empty
					<option value="-1">No film</option>
				@endforelse
			</select>
		</div><br/>

		 		<div class="form-group">
			<label class="text-danger text-md">Customers : </label>

			<select multiple data-plugin-selectTwo class="form-control populate" title="Please select at least one customer"  name="customer[]">
					@forelse(\App\Customer::all() as  $customer)
					    <option value="{{$customer->customer_id}}" @if(session('defaultSelect', 'none') == $customer->customer_id) {{"selected=\"\"selected\""}} @endif>
					{{$customer->first_name}}
					    </option>
					@empty
					    <option value="-1">No customer</option>
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