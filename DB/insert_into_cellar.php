<?php
require 'database.php';

$id = $_POST['id'];
$bought = $_POST['bought'];
$price = $_POST['price'];
$quantity = $_POST['quantity'];
$bought_at = $_POST['bought_at'];
$bottle_date = $_POST['bottle_date'];
$best_before = $_POST['best_before'];

$insert_into_cellar = "INSERT INTO `cellar`(`beer_id`, `bought`, `price`, `quantity`, `bought_at`, `bottle_date`, `best_before`) VALUES (" . $id . ",'" . $bought . "'," . $price . "," . $quantity . ",'" . $bought_at . "','" . $bottle_date . "','" . $best_before . "');";

if ($conn->query($insert_into_cellar) === TRUE) {
	echo 	'<script language="javascript">' .
			'alert("Added to cellar");' .
			'window.location.href="./../cellar.html";' .
			'</script>';
} else {
	echo 	'<script language="javascript">' .
			'alert(Error: ' . $insert_into_cellar . '<br>' . $conn->error . ');' .
			'window.location.href="./../cellar.html";' .
			'</script>';
}
$conn->close();
exit;
?>