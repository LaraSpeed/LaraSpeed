@extends('master')
@section('content')
<h1>Formulaire d'ajout Language</h1>
<form action="language" method="post">   
		<div class="form-group-lg">
			<label id="name">Name : </label>
			
		</div>
		    
			<div class="form-group-lg">
				<label id="film">Film</label>
				<select name="filmselect" class="form-control"></select>
			</div>
	  
		<br/><div class="form-group-lg">
			<button type="submit" class="btn btn-primary">Soumettre</button>
			<button type="reset" class="btn btn-primary">Annuler</button>
		</div>
</form>
@endsection