@extends('master')
@section('content')
<h1 class="text-danger">Livraison add form</h1>
<form action="{{url("/livraison")}}" method="post">   
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="row">
			<div class="col-md-2">
			<label class="text-primary" id="identifiant">Identifiant * : </label>
			</div>
			<div class="col-md-7">
			<input type ="text" class="form-control" name="identifiant" placeholder="Identifiant"  required />
			</div>

							<div class="col-md-2">
					<span class="text-danger">Mandatory fields</span>
				</div>
			
		</div> <br/>
		  
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="row">
			<div class="col-md-2">
			<label class="text-primary" id="date">Date * : </label>
			</div>
			<div class="col-md-2">
			<input class="form-control" id="date" name="date" placeholder="MM/DD/YYY" type="text"/>
			</div>

							<div class="col-md-2">
					<span class="text-danger">Mandatory fields</span>
				</div>
			
		</div> <br/>
		  
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="row">
			<div class="col-md-2">
			<label class="text-primary" id="articles">Articles * : </label>
			</div>
			<div class="col-md-7">
			<textarea name="articles" rows="10" cols="40" class="form-control" required></textarea>
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