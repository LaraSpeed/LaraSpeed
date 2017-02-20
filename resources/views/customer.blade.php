@extends('master')
@section('content')
<h1 class="text-danger">Create Customer</h1>
    <form action="{{url("/customer")}}" method="post">

		<input type="hidden" name="_token" value="{{ csrf_token() }}">

		     
        <div class="form-group">
			<label class="text-danger text-md" id="first_name">First name * : </label>
			 <input type ="text" class="form-control" name="first_name" placeholder="First name"  required /> 		</div> <br/>
		  
        <div class="form-group">
			<label class="text-danger text-md" id="last_name">Last name * : </label>
			 <input type ="text" class="form-control" name="last_name" placeholder="Last name"  required /> 		</div> <br/>
		  
        <div class="form-group">
			<label class="text-danger text-md" id="email">Email * : </label>
			 <input type ="text" class="form-control" name="email" placeholder="Email"  required /> 		</div> <br/>
		      
        <div class="form-group">
			<label class="text-danger text-md" id="create_date">Create date * : </label>
			 <div class="input-group"><span class="input-group-addon"><i class="fa fa-calendar"></i></span><input class="form-control" id="date" data-plugin-datepicker="" name="create_date" placeholder="MM/DD/-YYYY" type="text"/></div> 		</div> <br/>
		    
			<div class="form-group">
			<label class="text-danger text-md">Inventories : </label>

			<select multiple data-plugin-selectTwo class="form-control populate" title="Please select at least one inventory"  name="inventory[]">
					@forelse(\App\Inventory::all() as  $inventory)
					    <option value="{{$inventory->inventory_id}}" @if(session('defaultSelect', 'none') == $inventory->inventory_id) {{"selected=\"\"selected\""}} @endif>
					{{$inventory->film_id}}
					    </option>
					@empty
					    <option value="-1">No inventory</option>
					@endforelse
			</select>
		</div><br/>
	  		<div class="form-group">
			<label class="text-danger text-md">Address : </label>

			<select class="form-control" name="address">
				@forelse(\App\Address::all() as  $address)
					<option value="{{$address->address_id}}" @if(session('defaultSelect', 'none') == $address->address_id) {{"selected=\"\"selected\""}} @endif>
						{{$address->address}}
					</option>
				@empty
					<option value="-1">No address</option>
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