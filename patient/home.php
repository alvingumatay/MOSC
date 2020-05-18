<?php
	require_once 'logincheck.php';
	
?>
<!DOCTYPE html>
<html lang = "eng">
	<head>
		<title>MOSC Patient Record System</title>
		<meta charset = "utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel = "shortcut icon" href = "../images/mosc-logo.png" />
		<link rel = "stylesheet" type = "text/css" href = "../css/bootstrap.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/customize2.css" />
	    <link  rel="stylesheet" href="../font-awesome-4.7.0/css/font-awesome.css">
		<link rel = "stylesheet" type = "text/css" href = "../css/cont.css" />
	    <link  rel="stylesheet" href="../font-awesome-4.7.0/css/font-awesome.css">
        <link rel="stylesheet" href="../css/css1/dataTables.bootstrap.min.css">
       <!-- Bootstrap social button library -->
       <link rel="stylesheet" href="../css/css1/bootstrap-social.css">
      <!-- Bootstrap select -->
      <link rel="stylesheet" href="../css/css1/bootstrap-select.css">
      <!-- Bootstrap file input -->
     <link rel="stylesheet" href="../css/css1/fileinput.min.css">
    <!-- Awesome Bootstrap checkbox -->
   <link rel="stylesheet" href="../css/css1/awesome-bootstrap-checkbox.css">
   <!-- Admin Stye -->
   <link rel="stylesheet" href="../css/css1/style.css">
        <!-- CSS Just for demo purpose, don't include it in your project -->
        
		<?php require 'script.php'?>
		</head>
<body>

	 <?php include('includes/header.php');?>
     <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
  <div class="ts-main-content">
  
  <br />
	   <div class="dash">
	       <center>
			<a href="app_history.php" style="pointer-events: unset;">
			<label style="background-color: dodgerblue;  cursor: pointer;"><i class="glyphicon glyphicon-refresh"></i>
		        <?php 
	                $qappoint = $conn->query("SELECT COUNT(*) AS total FROM `appointment` NATURAL JOIN `itr`  where `status`= 'pending' && `itr_no`='$_SESSION[itr_no]' ") or die(mysqli_error());
			    	$fappoint = $qappoint->fetch_array();
	    			$num_rows = $fappoint['total'];
					
					echo $num_rows;
				?>
							
		     <span style="font-size: 20px;">Pending Appointments</span>
						<p  style="font-size: 17px;">Full Detail &nbsp; <i class="glyphicon  glyphicon-arrow-right" style="font-size:18px;"></i></p>
						</label>
					</a>
					
					<a href="app_history.php">
						<label style="background-color: dodgerblue; cursor: pointer;"><i class="glyphicon glyphicon-check"></i>
							<?php 
	                            $qappoint = $conn->query("SELECT COUNT(*) AS total FROM `appointment` NATURAL JOIN `itr` WHERE `status`= 'accepted' && `itr_no`='$_SESSION[itr_no]' ") or die(mysqli_error());
								$fappoint = $qappoint->fetch_array();
								$num_rows = $fappoint['total'];
					
								echo $num_rows;
							?>
				
							<span style="font-size: 20px;">Accept Appointment</span>
							<p  style="font-size: 17px;">Full Detail &nbsp; <i class="glyphicon  glyphicon-arrow-right" style="font-size:18px;"></i></p>
						</label>
					</a>
					</center>
				</div>
			<br/>
  <div class = "well">
   <font size="3px">Welcome !!! to Patient Online Appointment. From here you can create an appointment.
             Before you begin please read the terms and conditions.</font>
      <br/><br/><br/>
      <caption><font color="red"><font size="4px">Note:</font></font></caption>
      <br/>
      <font size="3px">
      	1. Carefully  review all fields in the online form and provide complete and accurate information.<br/.> 
      	2. The system appointment is available for 8am to 5pm, for monday to saturday only.
      	<br/>
      	3. Depending on admin or secretary if they will accept your online appointment.
      </font>
      <br/>  <br/>
      <center><h3>TERMS AND CONDITION</h3></center>
      <br/>
      <font size="3px">
      	This appointment and scheduling system allocates message reply before your appointment schedule. this is first come first serve basis. Limited slots are available per date, time and there is no guarantee that slot will always available  for user's first choice for an appointment schedule.
      	<br/><br/>
      	Users. accept the responsibility for supplying, checking verifying the accuracy and correctness of the of information they provide on the system in connection with their application, and consent to the collection and use of their personal information. 
      	<br/>	<br/>
      	Deliberate, multiple attemps to circumvent the system to secure a schedule for the purpose of blocking several dates in advance is demetrial to public serve. Users who are found abused this system will be block in securing an appoinment.
      </font>
      </div>
    </div>
   <div id = "footer">
		<label class = "footer-title">&copy; Copyright MOSC Patient Record System 2020</label>
	</div>
</body>
 <script src="../js/js1/bootstrap-select.min.js"></script>
    <script src="../js/js1/bootstrap.min.js"></script>
     <script src="../js/js1/main.js"></script>
     <script type="text/javascript">
         $(document).ready(function () {          
          setTimeout(function() {
            $('.succWrap').slideUp("slow");
          }, 3000);
          });
  </script>	
</html>