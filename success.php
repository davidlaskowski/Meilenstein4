<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">	
	<title>Erfolg!</title>
</head>
<body>
	<?php
	include 'csvIo.php';
	$csvIo = new csvIo("data.csv");

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

	// if (isset($_POST["mountain"]) && !empty($_POST["mountain"])) {
	// 	$csvIo->add($_POST['mountain']);
	// 	echo "<h2>Daten wurden erfolgreich hinzugefügt!</h2>";
	// }
		?>
	<a href="index.php" class="btn btn-primary">Home</a>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
	
</body>
</html>