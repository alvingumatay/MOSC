<?php
	require_once 'logincheck.php';
?>
<?php
require 'includes/conn.php';
$conn = mysqli_connect("localhost","root","","hcpms");
$query = "SELECT * FROM appointment itr_no WHERE `itr_no` = '$_SESSION[itr_no]'";
$sql = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang = "eng">
	<head>
		<title>MOSC Patient Record System</title>
		<meta charset = "utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel = "shortcut icon" href = "../images/mosc-logo.png" />
		<link rel = "stylesheet" type = "text/css" href = "../css/bootstrap.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/jquery.dataTables.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/customize2.css" />
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
<br /><br /><br /><br /><br /><br /><br /><br />
  <div class="ts-main-content">
		<br />
		<br />
		<br />
			<center><p>Touch Screen left,right,up,down to see details.</p></center>
		<div class = "panel panel-success">
			<div class = "panel-heading">
				<label>APPOINTMENT STATUS LOG</Label>
				<a style = "float:right; margin-top:-4px;" href = "appointment.php" class = "btn btn-success"><span class = "glyphicon glyphicon-hand-right"></span> BACK</a>	
			</div>
			<div class = "panel-body">
				
				<br />
				<br />
				 <?php
						$conn = new mysqli("localhost","root","","hcpms") or die(mysqli_error());
						$query = $conn->query("SELECT * FROM `itr` WHERE `itr_no`='$_SESSION[itr_no]'") or die(mysqli_error());
						while($fetch = $query->fetch_array()){
					?>
                <div class="table-responsive">
			    <table id = "table" class = "display" width = "100%" cellspacing = "0">
					<thead>
						<tr>
						    <th>Patient Name</th>
							<th>Contact</th>
							<th>Service Type Amount</th>
							<th>Date</th>
							<th>Time</th>
							<th>Status</th>
                            <th>Action</th>
						</tr>
					</thead>
					<tbody>
				 <?php
               
                 while($row= mysqli_fetch_array($sql))
                 {
                 ?>
                 <tr>
                 	<td><?php echo $fetch['firstname']." ".$fetch['lastname'] ?></td>
                    <td><?php echo $row['contact']; ?></td> 
                    <td><?php echo $row["servtype"]; ?></td>  
                    <td><?php echo $row["tdate"]; ?></td>  
                    <td><?php echo $row["dtime"]; ?></td>
					 <td><?php echo $row["status"];?></td>
             <td><a class="btn btn-danger" onclick="confirmationDelete(this);return false;" href="delete_appoint.php?id=<?php echo $row['appoint_id']?>">
             <span class="glyphicon glyphicon-trash "></span> Cancel</a></td> 	
				</tr>
					<?php
						}
						$conn->close();
					}
					?>
					</tbody>
					</table>
			</div>
            </div>
		</div>

	</div>
	<div id = "footer">
		<label class = "footer-title">&copy; Copyright MOSC Patient Record System 2020</label>
	</div>
	<script type = "text/javascript" src="../js/confirmdelete.js"></script>
	
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