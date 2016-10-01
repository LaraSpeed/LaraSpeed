@extends('master')
@section('content')
<h1>Formulaire d'ajout Film</h1>
<form action="film" method="post">		
				<div class="form-group-lg">
					<label id="titre">Titre</label>
					<input type="text" name="titre" class="form-control" placeholder="titre"/>
				</div>
		
		 		
				<div class="form-group-lg">
					<label id="annee">Annee</label>
					<input type="text" name="annee" class="form-control" placeholder="annee"/>
				</div>
		
		  
				<div class="form-group-lg">
				<label id="acteur">Acteur</label>
				<select name="acteurselect" class="form-control"></select>
			</div>
	  
				<br/><div class="form-group-lg">
					<button type="submit" class="btn btn-primary">Soumettre</button>
					<button type="reset" class="btn btn-primary">Annuler</button>
				</div>
</form>
@endsection