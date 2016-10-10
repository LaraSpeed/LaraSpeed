@extends('master')
@section('content')
<h1 class="text-danger">Config add form</h1>
<form action="configs" method="post">
		<br/><div class="form-group-lg">
			<button type="submit" class="btn btn-primary">Submit</button>
			<button type="reset" class="btn btn-primary">Cancel</button>
		</div>
</form>
@endsection