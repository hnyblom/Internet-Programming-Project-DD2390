<?php
require 'database.php';
require 'insert_brewery.php';

$name = $_POST['name'];
$year = $_POST['year'];
$alcohol = $_POST['alcohol'];
$style = $_POST['style'];

if ($_POST['brewery_name'] != '' && $_POST['brewery_country'] != '') { // User wants to add a brewery
	$brewery_id = add_brewery($_POST['brewery_name'], $_POST['brewery_country'], $conn);
} else {
	$brewery_id = $_POST['brewery'];
}

$insert_beer_query = "INSERT INTO `beer`(`name`, `year`, `alcohol`, `style`, `brewery_id`)
		VALUES ('" . $name . "','" . $year . "','" . $alcohol . "','" . $style . "','" . $brewery_id . "')";

if ($conn->query($insert_beer_query) === TRUE) {
	echo 	'<script language="javascript">' .
			'alert("You have successfully added a new beer!");' .
			'window.location.href="./../add_to_cellar.html";' .
			'</script>';
} else {
	echo 	'<script language="javascript">' .
			'alert(Error: ' . $insert_beer_query . '<br>' . $conn->error . ');' .
			'window.location.href="./../add_to_cellar.html";' .
			'</script>';
}
$conn->close();
exit;
?>