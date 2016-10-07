@extends('master')
@section('content')
<h1 class="text-danger">Language add form</h1>
<form action="http://localhost/languages" method="post">   
		<div class="form-group-lg">
			<label id="name">Name : </label>
			
		</div>
		    
		<br/><div class="form-group-lg">
			<button type="submit" class="btn btn-primary">Submit</button>
			<button type="reset" class="btn btn-primary">Cancel</button>
		</div>
</form>
@endsection