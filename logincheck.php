<?php
	session_start();
		if(!ISSET($_SESSION['itr_no']))
			{
				header('location:index.php');
			}
?>