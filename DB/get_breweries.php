<?php
//header('Content-Type: text/html; charset=utf-8');
require 'database.php';

// Make query
$sql_query = "SELECT id, name FROM breweries;";

// Parse result
$array_result = array();
if ($result = $conn->query($sql_query)) {
	while($row = $result->fetch_array(MYSQL_ASSOC)) {
		$array_result[] = $row;
	}
}
echo json_encode($array_result);

$result->close();
$conn->close();
?>