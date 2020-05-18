<?php
	if(ISSET($_POST['save_patient'])){
		$email = $_POST['email'];
		$password = $_POST['password'];
		$phil_health_no = $_POST['phil_health_no'];
		$firstname = $_POST['firstname'];
		$middlename = $_POST['middlename'];
		$lastname = $_POST['lastname'];
		$birthdate = $_POST['birthdate'];
		$age = $_POST['age'];
        $address = $_POST['address'];
		$contact = $_POST['contact'];
		$civil_status = $_POST['civil_status'];
		$gender = $_POST['gender'];
		$bp = $_POST['bp'];
		$temp = $_POST['temp']."&deg;C";
		$pr = $_POST['pr'];
		$rr = $_POST['rr'];
		$wt= $_POST['wt']."kg";
		$ht = $_POST['ht'];
		$conn = new mysqli("localhost","root","","hcpms") or die(mysqli_error());
		$q1 = $conn->query("SELECT * FROM `itr` WHERE `email` = '$email'") or die(mysqli_error());
		$c1 = $q1->num_rows;
		if($c1 > 0){
				 echo '
                 <div class="card mx-auto">
				<div class="alert alert-warning alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          Your account is not inserted!
        </div> </div>';
		}else{
			$conn->query("INSERT INTO `itr` VALUES(Null,'$email','$password','$phil_health_no','$firstname', '$middlename', '$lastname', '$birthdate','$age', '$address', '$contact', '$civil_status', '$gender', '$bp','$temp', '$pr', '$rr', '$wt', '$ht')") or die(mysqli_error());
			echo '<div class="card mx-auto">
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            Success! Your account is registered successfully.
        </div>

    </div>';	

		
		}
	}

?>
	

