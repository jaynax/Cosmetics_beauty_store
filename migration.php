<?php
	$sqlquery = "CREATE TABLE IF NOT EXISTS Users(id int AUTO_INCREMENT PRIMARY KEY NOT NULL, username VARCHAR(255),address VARCHAR(255), password VARCHAR(100))";


	
	if (!mysqli_query($conn, $sqlquery)) {
		print mysqli_error($conn);
	}
?>