<?php

require 'database.php';
$id = $_GET['id'];
$remove = $_GET['remove'];
if ($remove == 'true') {
	$query = "DELETE FROM `cellar` WHERE `beer_id`=" . $id . ";";
} else {
	$query = "UPDATE `cellar` SET `quantity`=`quantity`-1 WHERE `beer_id`=" . $id . ";";
}

if (($conn->query($query) !== TRUE)) {
	echo 	'<script language="javascript">' .
			'alert(Error: ' . $query . '<br>' . $conn->error . ');' .
			'window.location.href="./../frontpage.html";' .
			'</script>';
}
?>