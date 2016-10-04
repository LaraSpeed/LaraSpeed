@extends('master')
@section('content')
<h1>Formulaire d'ajout Film</h1>
<form action="film" method="post">   
		<div class="form-group-lg">
			<label id="title">Title : </label>
			<input type ="text" class="form-control" name="title" placeholder="Title" />
		</div>
		  
		<div class="form-group-lg">
			<label id="description">Description : </label>
			<textarea name="description" rows="4" cols="20" class="form-control"></textarea>
		</div>
		  
		<div class="form-group-lg">
			<label id="release_year">Release_year : </label>
			
		</div>
		  
		<div class="form-group-lg">
			<label id="original_language_id">Original_language_id : </label>
			<input type ="number" class="form-control" name="original_language_id" placeholder="Original_language_id" />
		</div>
		  
		<div class="form-group-lg">
			<label id="rental_duration">Rental_duration : </label>
			<input type ="number" class="form-control" name="rental_duration" placeholder="Rental_duration" />
		</div>
		  
		<div class="form-group-lg">
			<label id="rental_rate">Rental_rate : </label>
			<input type ="number" class="form-control" name="rental_rate" placeholder="Rental_rate" />
		</div>
		    
		<div class="form-group-lg">
			<label id="replacement_cost">Replacement_cost : </label>
			<input type ="number" class="form-control" name="replacement_cost" placeholder="Replacement_cost" />
		</div>
		        
			<div class="form-group-lg">
			<label id="language">Language</label>
			<select name="languageselect" class="form-control"></select>
		</div>
	  
		<br/><div class="form-group-lg">
			<button type="submit" class="btn btn-primary">Soumettre</button>
			<button type="reset" class="btn btn-primary">Annuler</button>
		</div>
</form>
@endsection