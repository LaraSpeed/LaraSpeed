@extends('master')
@section('content')
<h1 class="text-danger">Create Store</h1>
    <form action="{{url("/store")}}" method="post">

		<input type="hidden" name="_token" value="{{ csrf_token() }}">

		       
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