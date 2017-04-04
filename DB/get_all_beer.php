<?php
require 'database.php';

// Make query
$sql_query = "SELECT
				beer.id AS id,
				beer.name AS name,
				breweries.name AS brewery,
				beer.year AS year,
				beer.alcohol AS abv,
				beer.style AS style
			FROM beer
			INNER JOIN breweries ON beer.brewery_id = breweries.id;";

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