<?php
	$id = $_GET['id'];
	$last = $_GET['lastname'];
	if(ISSET($_POST['edit_patient'])){
		$email = $_POST['email'];
		$password = $_POST['password'];
	    $firstname = $_POST['firstname'];
		$middlename = $_POST['middlename'];
		$lastname = $_POST['lastname'];
		$birthdate = $_POST['birthdate'];
		$age = $_POST['age'];
		$phil_health_no = $_POST['phil_health_no'];
		$address = $_POST['address'];
		$contact = $_POST['contact'];
		$civil_status = $_POST['civil_status'];
		$gender = $_POST['gender'];
		$bp = $_POST['bp'];
		$temp = $_POST['temp'];
		$pr = $_POST['pr'];
		$rr = $_POST['rr'];
		$wt= $_POST['wt'];
		$ht = $_POST['ht'];
		$conn = new mysqli("localhost","root","","hcpms") or die(mysqli_error());
		$conn->query("UPDATE `itr` SET  `email` = '$email', `password` = '$password', `phil_health_no` = '$phil_health_no', `firstname` = '$firstname', `middlename` = '$middlename', `lastname` = '$lastname', `birthdate` = '$birthdate', `age` = '$age', `address` = '$address', `contact` = '$contact', `civil_status` = '$civil_status', `gender` = '$gender', `bp` = '$bp', `temp` = '$temp', `pr` = '$pr', `rr` = '$rr', `wt` = '$wt', `ht` = '".addslashes($ht)."' WHERE `itr_no` = '$id' && `lastname` = '$last'") or die(mysqli_error());
		header("location: patient.php");
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	