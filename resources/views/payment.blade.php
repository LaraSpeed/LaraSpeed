@extends('master')
@section('content')
<h1 class="text-danger">Payment add form</h1>
    <form action="{{url("/payment")}}" method="post">

		<input type="hidden" name="_token" value="{{ csrf_token() }}">

		       
        <div class="form-group">
			<label class="text-danger text-md" id="amount">Amount * : </label>
			<input type ="number" class="form-control" name="amount"  data-plugin-maxlength="" maxlength="10"placeholder="Amount"  required />
		</div> <br/>
		    
			<div class="form-group">
			<label class="text-danger text-md">Rental : </label>

			<select class="form-control" name="rental">
				@forelse(\App\Rental::all() as  $rental)
					<option value="{{$rental->rental_id}}" @if(session('defaultSelect', 'none') == $rental->rental_id) {{"selected=\"\"selected\""}} @endif>
						{{$rental->customer_id}}
					</option>
				@empty
					<option value="-1">No rental</option>
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