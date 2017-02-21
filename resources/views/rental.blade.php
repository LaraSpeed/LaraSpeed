@extends('master')
@section('content')
<h1 class="text-danger">Create Rental</h1>
    <form action="{{url("/rental")}}" method="post">

		<input type="hidden" name="_token" value="{{ csrf_token() }}">

		   
        <div class="form-group">
			<label class="text-danger text-md" id="rental_date">Rental date * : </label>
			 <div class="input-group"><span class="input-group-addon"><i class="fa fa-calendar"></i></span><input class="form-control" id="date" data-plugin-datepicker="" name="rental_date" placeholder="MM/DD/-YYYY" type="text"/></div> 		</div> <br/>
		      
        <div class="form-group">
			<label class="text-danger text-md" id="return_date">Return date * : </label>
			 <div class="input-group"><span class="input-group-addon"><i class="fa fa-calendar"></i></span><input class="form-control" id="date" data-plugin-datepicker="" name="return_date" placeholder="MM/DD/-YYYY" type="text"/></div> 		</div> <br/>
		      
	 		<div class="form-group">
			<label class="text-danger text-md">Staff : </label>

			<select class="form-control" name="staff">
				@forelse(\App\Staff::all() as  $staff)
					<option value="{{$staff->staff_id}}" @if(session('defaultSelect', 'none') == $staff->staff_id) {{"selected=\"\"selected\""}} @endif>
						{{$staff->first_name}}
					</option>
				@empty
					<option value="-1">No staff</option>
				@endforelse
			</select>
		</div><br/>

		 		<div class="form-group">
			<label class="text-danger text-md">Customer : </label>

			<select class="form-control" name="customer">
				@forelse(\App\Customer::all() as  $customer)
					<option value="{{$customer->customer_id}}" @if(session('defaultSelect', 'none') == $customer->customer_id) {{"selected=\"\"selected\""}} @endif>
						{{$customer->first_name}}
					</option>
				@empty
					<option value="-1">No customer</option>
				@endforelse
			</select>
		</div><br/>

		 		<div class="form-group">
			<label class="text-danger text-md">Inventory : </label>

			<select class="form-control" name="inventory">
				@forelse(\App\Inventory::all() as  $inventory)
					<option value="{{$inventory->inventory_id}}" @if(session('defaultSelect', 'none') == $inventory->inventory_id) {{"selected=\"\"selected\""}} @endif>
						{{$inventory->store->address->address}}
					</option>
				@empty
					<option value="-1">No inventory</option>
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