@extends('master')
@section('content')
<h1>Formulaire d'ajout Acteur</h1>
<form action="acteur" method="post">		
				<div class="form-group-lg">
					<label id="nom">Nom</label>
					<input type="text" name="nom" class="form-control" placeholder="nom"/>
				</div>
		
		 		
				<div class="form-group-lg">
					<label id="age">Age</label>
					<input type="text" name="age" class="form-control" placeholder="age"/>
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