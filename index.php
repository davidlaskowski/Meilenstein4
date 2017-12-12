<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
	<title>Home</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">	
	<style>
		input{
			border:none;
			max-width: 150px;
		}
		tr > *:nth-child(1){
			max-width: 50px;
		}
		tr > *:nth-child(2){
			max-width: 100px;
		}
		tr > *:nth-child(3){
			max-width: 100px;
		}
		tr > *:nth-child(4){
			max-width: 100px;
		}
		tr > *:nth-child(5){
			max-width: 100px;
		}
		tr > *:nth-child(6){
			max-width: 100px;
		}

		input[type="submit"]{
			cursor: pointer;
		}
	</style>
</head>
<body>	
	<div class="container">

		<?php
		include 'csvIo.php';
		$csvIo = new csvIo("data.csv");
if ($_POST) {
		foreach ($_POST as $key => $value) {
		$new = strpos($key, "new");
		$delete = strpos($key , "delete");
		$edit = strpos($key, "edit");

		if ($delete === 0){
			$id = explode("_", $key)[1];
			$csvIo->remove($id);
			echo "<h2>Daten wurden erfolgreich gelöscht!</h2>";
		}	
		if ($edit === 0){
			$id = explode("_", $key)[1];
			$data = array();
			$data[0] = $_POST["values_".$id."_0"];
			$data[1] = $_POST["values_".$id."_1"];
			$data[2] = $_POST["values_".$id."_2"];
			$data[3] = $_POST["values_".$id."_3"];
			$data[4] = $_POST["values_".$id."_4"];
			$data[5] = $_POST["values_".$id."_5"];
			$csvIo->edit($id,$data);
			echo "<h2>Daten wurden erfolgreich editiert!</h2>";
		}

		if($new === 0){
			$csvIo->add($_POST["new"]);
			echo "<h2>Daten wurden erfolgreich hinzugefügt!</h2>";
		}
	}
		header("Location: " . $_SERVER['REQUEST_URI']);
   exit();
}
		$csvIo->printData();
		?>
		
		<a href="form.php" class="btn btn-primary">Form</a>
	</div>
	

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
	


</body>