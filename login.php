<?php
	session_start();
	$email = $_POST['email'];
	$password = $_POST['password'];
	if(ISSET($_POST['login'])){
		$conn = new mysqli("localhost","root","","hcpms") or die(mysqli_error());
		$query = $conn->query("SELECT *FROM `itr` WHERE `email` = '$email' && `password` = '$password'") or die(mysqli_error());
		$fetch = $query->fetch_array();
		$valid = $query->num_rows;
			if($valid > 0){
				$_SESSION['itr_no'] = $fetch['itr_no'];
				header("location:./patient/home.php");
			}else{
				echo "<script>alert('Invalid email or password')</script>";
				echo "<script>window.location = 'index.php'</script>";
			}
		$conn->close();
	}	