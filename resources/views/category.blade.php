@extends('master')
@section('content')
<h1 class="text-danger">Category add form</h1>
<form action="{{url("/category")}}" method="post"> 
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="row">
			<div class="col-md-2">
			<label class="text-primary" id="category_id">Category id * : </label>
			</div>
			<div class="col-md-3">
			<input type ="number" class="form-control" name="category_id"  max = "9999999999" placeholder="Category id"  required />
			</div>

							<div class="col-md-2">
					<span class="text-danger">Mandatory fields</span>
				</div>
			
		</div> <br/>
		  
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="row">
			<div class="col-md-2">
			<label class="text-primary" id="name">Name * : </label>
			</div>
			<div class="col-md-7">
			<input type ="text" class="form-control" name="name" placeholder="Name"  required />
			</div>

							<div class="col-md-2">
					<span class="text-danger">Mandatory fields</span>
				</div>
			
		</div> <br/>
		    
		<div class="row">
			<div class="col-md-2">
			<button type="submit" class="btn btn-primary">Create and return to list</button>
			</div>

			<div class="col-md-1 col-md-offset-4">
			<button type="reset" onclick="goBack();" class="btn btn-danger">Cancel and return to list</button>
			</div>
		</div>
</form>
@endsection