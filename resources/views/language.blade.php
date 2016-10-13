@extends('master')
@section('content')
<h1 class="text-danger">Language add form</h1>
<form action="{{url("/language")}}" method="post">   
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="form-group-lg">
			<label id="name">Name : </label>
			<input type ="text" class="form-control" name="name" placeholder="Name" />
		</div>
		    
		<br/><div class="form-group-lg">
			<button type="submit" class="btn btn-primary">Submit</button>
			<button type="reset" class="btn btn-primary">Cancel</button>
		</div>
</form>
@endsection