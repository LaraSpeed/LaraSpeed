<!DOCTYPE html>
<html>
    <head>
        <title>
		    Film 	    </title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
	<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    </head>
    <body>
        <div class="container">
	        <form action="/film" method="post">		
			<div class="form-group">
				<label id="titre">Titre</label>
				<input type="text" name="titre" class="form-group" placeholder="titre"/>
			</div>
							
		 							
		    <div class="form-group">
					<label id="annee">Annee</label>
					<input type="number" name="annee" class="form-group" placeholder="annee"/>
			</div>
			  	
			<div class="form-group">
			<label id="acteur">Acteur</label>
			<select name="acteurselect" class="form-group"></select>
		</div>
	  	
		<div class="form-group">
			<button type="submit" class="btn btn-primary">Soumettre</button>
			<button type="reset" class="btn btn-primary">Annuler</button>
		</div>
	
	</form>
        </div>
    </body>
</html>
