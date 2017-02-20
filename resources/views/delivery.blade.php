@extends('master')
@section('content')
<h1 class="text-danger">Create Delivery</h1>
    <form action="{{url("/delivery")}}" method="post">

		<input type="hidden" name="_token" value="{{ csrf_token() }}">

		   
        <div class="form-group">
			<label class="text-danger text-md" id="identifiant">Identifiant * : </label>
			<input type ="text" class="form-control" name="identifiant" placeholder="Identifiant"  required />
		</div> <br/>
		  
        <div class="form-group">
			<label class="text-danger text-md" id="date">Date * : </label>
			<div class="input-group"><span class="input-group-addon"><i class="fa fa-calendar"></i></span><input class="form-control" id="date" data-plugin-datepicker="" name="date" placeholder="MM/DD/-YYYY" type="text"/></div>
		</div> <br/>
		  
        <div class="form-group">
			<label class="text-danger text-md" id="articles"> Articles : </label>
			<textarea name="articles" rows="10" cols="40" class="form-control"" required></textarea>
		</div> <br/>
		  
	
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