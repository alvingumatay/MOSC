<?php
	require_once'logincheck.php';
	$conn = new mysqli("localhost","root","","hcpms") or die(mysqli_error());
	$query = $conn->query("SELECT * FROM `user` WHERE `user_id` = '$_SESSION[user_id]'") or die(mysqli_error());
	$fetch = $query->fetch_array();
?>
<!DOCTYPE html>
<html lang = "en">
	<head>	
		<title>MOSC Patient Record System</title>
		<meta charset = "UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel = "shortcut icon" href = "../images/mosc-logo.png" />
		<link rel = "stylesheet" type = "text/css" href = "../css/bootstrap.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/jquery.dataTables.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/customize.css" />
		<link  rel="stylesheet" href="../font-awesome-4.7.0/css/font-awesome.css">
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
	</head>
	<body>
	<?php include('includes/header1.php');?>
    <?php include('includes/leftbar1.php');?>
<br/><br/><br/><br/><br/><br/><br/><br/>
  <div class="ts-main-content">
	<div class = "well">
		<div class = "panel panel-warning">
			<div class = "panel-heading">
				<center><label>HEMATOLOGY</label></center>
			</div>
		</div>	
		
		<br/><br/>
		<a href = "view_hematology_record.php" id = "d_record" style = "float:right; margin-right:10px;" class = "btn btn-danger"><span class = "glyphicon glyphicon-book"></span> HEMATOLOGY RECORD</a>
		<br />
		<br />
		<div class = "panel panel-success">
			<div class = "panel-heading">
				<h4>INDIVIDUAL TREATMENT RECORD</h4>
			</div>
		</div>
		<br />
		<table id = "table" class = "display" cellspacing = "0" >
			<thead>
				<tr>
					<th>Patient No</th>
					<th>Name</th>
					<th>Birthdate</th>
					<th>Age</th>
					<th>Address</th>
					<th>Civil Status</th>
					<th>Gender</th>
					<th><center>Action</center></th>
				</tr>
			</thead>
			
			<tbody>
			<?php
						$conn = new mysqli("localhost","root","","hcpms") or die(mysqli_error());
						$query = $conn->query("SELECT * FROM `itr` ORDER BY `itr_no` DESC") or die(mysqli_error());
						while($fetch = $query->fetch_array()){
						$id = $fetch['itr_no'];
						$q = $conn->query("SELECT COUNT(*) as total FROM `complaints` where `itr_no` = '$id' && `status` = 'Pending'") or die(mysqli_error());
						$f1 = $q->fetch_array();
					?>
				<tr>
					<td><?php echo $fetch['itr_no']?></td>
					<td><?php echo $fetch['firstname']." ".$fetch['lastname'] ?></td>
					<td><?php echo $fetch['birthdate'] ?></td>
					<td><?php echo $fetch['age'] ?></td>
					<td><?php echo $fetch['address'] ?></td>
					<td><?php echo $fetch['civil_status'] ?></td>
					<td><?php echo $fetch['gender'] ?></td>
					<td>
						<center>
							<a href = "view_hematology.php?itr_no=<?php echo $fetch['itr_no']?>"class = "btn btn-sm btn-success">
                                <span class = "badge"> <?php echo $f1['total']?></span>
                                VIEW DETAIL
								<span class = "glyphicon glyphicon-search"></span></a> 
						</center>
					</td>
				</tr>
			<?php
				}
					$conn->close();
			?>	
			</tbody>
		</table>
	</div>
    </div>
	<div id = "footer">
		<label class = "footer-title">&copy; Copyright MOSC Patient Record System 2020</label>
	</div>
	</body>
		<?php require "script.php" ?>
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