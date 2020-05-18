<?php
	$conn = new mysqli("localhost","root","","hcpms") or die(mysqli_error());
	$conn->query("DELETE FROM `appointment` WHERE `appoint_id` = '$_GET[id]'") or die(mysqli_error());
	header("location:app_history.php");
