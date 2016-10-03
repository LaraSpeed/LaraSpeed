@extends('master')
@section('content')
<h1>Formulaire d'ajout Film_category</h1>
<form action="film_category" method="post">   
		<div class="form-group-lg">
			<label id="category_id">Category_id : </label>
			<input type ="number" class="form-control" name="category_id" placeholder="Category_id" />
		</div>
		    
	 
		<br/><div class="form-group-lg">
			<button type="submit" class="btn btn-primary">Soumettre</button>
			<button type="reset" class="btn btn-primary">Annuler</button>
		</div>
</form>
@endsection