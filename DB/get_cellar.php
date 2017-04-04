<?php
require 'database.php';

// Make query
$sql_query = "SELECT
				beer.id AS id,
				beer.name AS name,
				breweries.name AS brewery,
				cellar.quantity AS quantity,
				cellar.bottle_date AS bottle_date
			FROM cellar
			LEFT JOIN beer ON cellar.beer_id = beer.id
			LEFT JOIN breweries ON beer.brewery_id = breweries.id;";

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