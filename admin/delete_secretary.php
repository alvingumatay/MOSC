<?php
	$conn = new mysqli("localhost","root","","hcpms") or die(mysqli_error());
	$conn->query("DELETE FROM `secretary` WHERE `sec_id` = '$_GET[id]'") or die(mysqli_error());
	header("location:secretary.php");
