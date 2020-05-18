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
<br/><br/><br/><br/><br/><br/><br/><br/>
  <div class="ts-main-content">
	<div class = "well">
		<div class = "panel panel-warning">
			<div class = "panel-heading">
				<center><label>FECALYSIS</label></center>
			</div>
		</div>
		<a style = "float:right; margin-top:-4px;" href = "fecalysis.php" class = "btn btn-success"><span class = "glyphicon glyphicon-hand-right"></span> BACK</a>
		<br />
		<br />
		<div class = "panel panel-success">
			<div class = "panel-heading">
				<h4>FECALYSIS RECORD LIST</h4>
			</div>
		</div>
		<br />
		<table id = "table" cellspacing = "0" class = "display">
			<thead>
				<tr>
					<th>Name</th>
					<th>Age</th>
					<th>Gender</th>
					<th>Address</th>
					<th><center>Action</center></th>
				</tr>
			</thead>
			<tbody>
			<?php 
				$conn = new mysqli("localhost","root","","hcpms") or die(mysqli_error());
				$query = $conn->query("SELECT * FROM `fecalisys` NATURAL JOIN `itr` GROUP BY `itr_no` ORDER BY `fecalysis_id` DESC") or die(mysqli_error());
				while($fetch = $query->fetch_array()){
			?>
				<tr>
					<td><?php echo $fetch['firstname']." ".$fetch['lastname']?></td>
					<td><?php echo $fetch['age']?></td>
					<td><?php echo $fetch['gender']?></td>
					<td><?php echo $fetch['address']?></td>
					<td><center>
							<a href = "fecalysis_record.php?itr_no=<?php echo $fetch['itr_no']?>"class = "btn btn-success"><span class = "glyphicon glyphicon-book"></span> All Record</a> 
						</center></td>
				</tr>
			<?php
				}
			?>	
			</tbody>
		</table>
	</div>
    </div>
	<div id = "footer">
		<label class = "footer-title">&copy; Copyright MOSC Patient Record System 2020</label>
	</div>
	</body>
		
		<script src ="../js/add_dental.js"></script>
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