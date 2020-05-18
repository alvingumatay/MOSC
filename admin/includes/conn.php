<?php
	$conn = new PDO( 'mysql:host=localhost;dbname=hcpms', 'root', '');
	if(!$conn){
		die("Error: Failed to connect to database!");
	}
?>