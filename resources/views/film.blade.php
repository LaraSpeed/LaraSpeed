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
			<label class="text-primary" id="description">Description * : </label>
			</div>
			<div class="col-md-7">
			<textarea name="description" rows="4" cols="20" class="form-control" required></textarea>
			</div>
		</div> <br/>
		  
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="row">
			<div class="col-md-2">
			<label class="text-primary" id="release_year">Release year * : </label>
			</div>
			<div class="col-md-3">
			<input type ="number" class="form-control" name="release_year"  max = "9999999999" placeholder="Release year"  required />
			</div>
		</div> <br/>
		    
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="row">
			<div class="col-md-2">
			<label class="text-primary" id="rental_duration">Rental duration * : </label>
			</div>
			<div class="col-md-3">
			<input type ="number" class="form-control" name="rental_duration"  max = "9999999999" placeholder="Rental duration"  required />
			</div>
		</div> <br/>
		  
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="row">
			<div class="col-md-2">
			<label class="text-primary" id="rental_rate">Rental rate * : </label>
			</div>
			<div class="col-md-3">
			<input type ="number" class="form-control" name="rental_rate"  max = "9999999999" placeholder="Rental rate"  required />
			</div>
		</div> <br/>
		  
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="row">
			<div class="col-md-2">
			<label class="text-primary" id="length">Length * : </label>
			</div>
			<div class="col-md-3">
			<input type ="number" class="form-control" name="length"  max = "9999999999" placeholder="Length"  required />
			</div>
		</div> <br/>
		  
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="row">
			<div class="col-md-2">
			<label class="text-primary" id="replacement_cost">Replacement cost * : </label>
			</div>
			<div class="col-md-3">
			<input type ="number" class="form-control" name="replacement_cost"  max = "9999999999" placeholder="Replacement cost"  required />
			</div>
		</div> <br/>
		        
		<div class="row">
			<div class="col-md-2">
				<label class="text-danger"> * = Mandatory fields</label>
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