<?php
	$id = $_GET['id'];
	$last = $_GET['lastname'];
	if(ISSET($_POST['edit_account'])){
		$email = $_POST['email'];
		$password = $_POST['password'];
		$firstname = $_POST['firstname'];
		$middlename = $_POST['middlename'];
		$lastname = $_POST['lastname'];
		$birthdate = $_POST['birthdate'];
		$age = $_POST['age'];
		$address = $_POST['address'];
		$contact = $_POST['contact'];
		$civil_status = $_POST['civil_status'];
		$gender = $_POST['gender'];
		$conn = new mysqli("localhost","root","","hcpms") or die(mysqli_error());
		$conn->query("UPDATE `itr` SET `email` = '$email', `password` = '$password',`firstname` = '$firstname', `middlename` = '$middlename', `lastname` = '$lastname', `birthdate` = '$birthdate', `age` = '$age', `address` = '$address', `contact` = '$contact', `civil_status` = '$civil_status', `gender` = '$gender' ") or die(mysqli_error());
		header("location: account.php");
	}