@extends('master')
@section('content')
<h1 class="text-danger">Director add form</h1>
    <form action="{{url("/director")}}" method="post">   
	    <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="row">
		    <div class="col-md-2">
			    <label class="text-primary" id="name">Name * : </label>
		    </div>

		    <div class="col-md-7">
			    <input type ="text" class="form-control" name="name" placeholder="Name"  required />
			</div>

		</div> <br/>
		  
	    <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="row">
		    <div class="col-md-2">
			    <label class="text-primary" id="birth"> Birth : </label>
		    </div>

		    <div class="col-md-2">
			    <div class="input-group"><span class="input-group-addon"><i class="fa fa-calendar"></i></span><input class="form-control" id="date" data-plugin-datepicker="" name="birth" placeholder="MM/DD/-YYYY" type="text"/></div>
			</div>

		</div> <br/>
		  
	    <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="row">
		    <div class="col-md-2">
			    <label class="text-primary" id="bio"> Bio : </label>
		    </div>

		    <div class="col-md-7">
			    <textarea name="bio" rows="4" cols="20" class="form-control" required></textarea>
			</div>

		</div> <br/>
		  
	  
		<div class="row">

			<div class="col-md-2">
				<label class="text-danger"> * = Mandatory fields</label>
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