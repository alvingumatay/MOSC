<?php
    
	if(ISSET($_POST['save_appoint'])){
	    $itr_no = $_SESSION['itr_no'];
		
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$contact = $_POST['contact'];
		$servtype = $_POST['servtype'];
        $tdate = $_POST['tdate'];
		$dtime = $_POST['dtime'];
		
		$conn = new mysqli("localhost","root","","hcpms") or die(mysqli_error());
		$q1 = $conn->query("SELECT * FROM `appointment` WHERE '$_SESSION[itr_no]' && `dtime`='$dtime' && `servtype`='$servtype' && `tdate`='$tdate'") or die(mysqli_error());
		$c1 = $q1->num_rows;
		if($c1 > 0){
				echo '
                <div class="card mx-auto">
				    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            Oopss Sorry!!!...Your Appointment is not inserted!
                    </div>
                </div>';
		}else{
           $conn->query("INSERT INTO `appointment` VALUES(NULL, '$itr_no', '$firstname', '$lastname', '$contact',
				'$servtype', '$tdate', '$dtime', 'pending')");
			echo '<div class="card mx-auto">
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            Your Appointment is inserted successfully! Wait for Admin approval
                    </div>
                </div>';
               
           }
		$conn->close();
	}