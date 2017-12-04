<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Form</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">	
</head>
<body>
	<div class="container">
		<form method="post" action="index.php">
			<div class="form-group">
				<label for="id">Id:</label>
				<input name="mountain[]" type="number" class="form-control" id="id">
			</div>
			<div class="form-group">
				<label for="name">Name:</label>
				<input name="mountain[]" name="type="text" class="form-control" id="name">
			</div>
			<div class="form-group">
				<label for="height">Height:</label>
				<input name="mountain[]" type="number" class="form-control" id="height">
			</div>
			<div class="form-group">
				<label for="latitude">Latitude:</label>
				<input name="mountain[]" type="number" class="form-control" id="latitude">
			</div>
			<div class="form-group">
				<label  for="longitude">Longitude:</label>
				<input name="mountain[]" type="number" class="form-control" id="longitude">
			</div>
			<div class="form-group">
				<label for="ascent">Ascent:</label>
				<input name="mountain[]" type="number" class="form-control" id="ascent">
			</div>
			<button type="submit" class="btn btn-default">Submit</button>
		</form>
	</div>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

	
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>
</html>