@extends('master')
@section('content')
<h1 class="text-danger">Film add form</h1>
    <form action="{{url("/film")}}" method="post">   
	    <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="row">
		    <div class="col-md-2">
			    <label class="text-primary" id="title">Title * : </label>
		    </div>

		    <div class="col-md-7">
			    <input type ="text" class="form-control" name="title" placeholder="Title"  required />
			</div>

		</div> <br/>
		  
	    <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="row">
		    <div class="col-md-2">
			    <label class="text-primary" id="description"> Description : </label>
		    </div>

		    <div class="col-md-7">
			    <textarea name="description" rows="10" cols="40" class="form-control" required></textarea>
			</div>

		</div> <br/>
		  
	    <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="row">
		    <div class="col-md-2">
			    <label class="text-primary" id="price">Price * : </label>
		    </div>

		    <div class="col-md-3">
			    <input type ="number" class="form-control" name="price"  data-plugin-maxlength="" maxlength="10"placeholder="Price"  required />
			</div>

		</div> <br/>
		  
	    <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="row">
		    <div class="col-md-2">
			    <label class="text-primary" id="famous"> Famous : </label>
		    </div>

		    <div class="col-md-3">
			    <input type ="checkbox" class="form-control" name="famous"  required />
			</div>

		</div> <br/>
		  
			<div class="row">
			<div class="col-md-2">
				<label class="text-primary">Director : </label>
			</div>

			<div class="col-md-5">
				<select class="form-control" name="director">
					@forelse(\App\Director::all() as  $director)
					    <option value="{{$director->id}}" @if(session('defaultSelect', 'none') == $director->id) {{"selected=\"\"selected\""}} @endif>
						    {{$director->name}}
					    </option>
					@empty
					    <option value="-1">No director</option>
					@endforelse
				</select>
			</div>

		</div><br/>

		  
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