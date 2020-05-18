<?php
	session_start();
		if(!ISSET($_SESSION['sec_id']))
			{
				
				header('location:index.php');
			}
?>