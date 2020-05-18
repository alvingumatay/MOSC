<?php
	session_start();
	unset($_SESSION['sec_id']);
	header('location:index.php');