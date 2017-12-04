<!DOCTYPE html>
<html>
<head>
	<title>Kalender</title>

	<link rel="stylesheet" type="text/css" href="style/calendar.css">

	<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">

	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
</head>
<body>
	<?php
	include 'calendar.php';

	$calendar = new Calendar();

	echo $calendar->show();
	?>

</body>
</html>