<!DOCTYPE html>
<html>
    <head>
        <title>
		    Acteur 	    </title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
	<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    </head>
    <body>
        <div class="container">
	        <form action="/acteur" method="post">		
			<div class="form-group">
				<label id="nom">Nom</label>
				<input type="text" name="nom" class="form-group" placeholder="nom"/>
			</div>
							
		 							
		    <div class="form-group">
					<label id="age">Age</label>
					<input type="number" name="age" class="form-group" placeholder="age"/>
			</div>
			  	
			<div class="form-group">
				<label id="film">Film</label>
				<select name="filmselect" class="form-group"></select>
		</div>
	  	
		<div class="form-group">
			<button type="submit" class="btn btn-primary">Soumettre</button>
			<button type="reset" class="btn btn-primary">Annuler</button>
		</div>
	
	</form>
        </div>
    </body>
</html>
