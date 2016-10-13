@extends('master')
@section('content')
<h1 class="text-danger">Film add form</h1>
<form action="{{url("/film")}}" method="post">     
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="form-group-lg">
			<label id="title">Title : </label>
			<input type ="text" class="form-control" name="title" placeholder="Title" />
		</div>
		  
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="form-group-lg">
			<label id="description">Description : </label>
			<textarea name="description" rows="4" cols="20" class="form-control"></textarea>
		</div>
		      
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="form-group-lg">
			<label id="rental_duration">Rental_duration : </label>
			<input type ="number" class="form-control" name="rental_duration" placeholder="Rental_duration" />
		</div>
		  
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="form-group-lg">
			<label id="rental_rate">Rental_rate : </label>
			<input type ="number" class="form-control" name="rental_rate" placeholder="Rental_rate" />
		</div>
		    
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="form-group-lg">
			<label id="replacement_cost">Replacement_cost : </label>
			<input type ="number" class="form-control" name="replacement_cost" placeholder="Replacement_cost" />
		</div>
		        
		<br/><div class="form-group-lg">
			<button type="submit" class="btn btn-primary">Submit</button>
			<button type="reset" class="btn btn-primary">Cancel</button>
		</div>
</form>
@endsection