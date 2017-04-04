<?php
function add_brewery ($name, $country, $conn) {
	// Get new ID
	$get_auto_increment_value = "SELECT `AUTO_INCREMENT` AS id FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'intnet' AND TABLE_NAME = 'breweries';";
	if ($result = $conn->query($get_auto_increment_value)) {
		$row = $result->fetch_array(MYSQL_ASSOC);
		$brewery_id = $row['id'];
	}
	
	$insert_brewery_query = "INSERT INTO `breweries`(`name`, `country`) VALUES ('" . $name . "','" . $country . "');";
	if (($conn->query($insert_brewery_query) !== TRUE)) {
		echo 	'<script language="javascript">' .
				'alert(Error: ' . $insert_brewery_query . '<br>' . $conn->error . ');' .
				'window.location.href="./../frontpage.html";' .
				'</script>';
	}

	return $brewery_id;
}
?>