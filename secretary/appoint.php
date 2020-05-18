<?php require_once 'logincheck.php'; ?>

<!DOCTYPE html>
<html lang = "eng">
	<head>
		<title>MOSC Patient Record System</title>
		<meta charset = "utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel = "shortcut icon" href = "../images/mosc-logo.png" />
		<link rel = "stylesheet" type = "text/css" href = "../css/bootstrap.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/jquery.dataTables.css" />
		<link href="../font-awesome-4.7.0/css/font-awesome.css" rel="stylesheet"> 
		<link rel = "stylesheet" type = "text/css" href = "../css/customize.css" />
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
    </head>
<body>
	 <?php include('includes/header.php');?>
     <br/> <br/> <br/> <br/> <br/>
  <div class="ts-main-content">
  <?php include('includes/leftbar.php');?>
  <div class="content-wrapper">
  <div class="container-fluid">
  <div class="row">
  <center><p>Touch Screen left,right,up,down to see details.</p></center>
	<div class = "panel panel-success">
			<div class = "panel-heading">
				<label>PATIENTS LIST</Label>
			</div>
			 <div class = "panel-body">
				<br />
				<br />
                <div class="table-responsive">
				<table id = "table" class = "display" width = "100%" cellspacing = "0">
					<thead>
						<tr>
							<th>PatientName</th>
							<th>Services</th>
							<th>Time</th>
							<th>Date</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$conn = new mysqli("localhost","root","","hcpms") or die(mysqli_error());
						$query = $conn->query("SELECT * FROM `appointment` WHERE `status` = 'done' ORDER BY `dtime` DESC") or die(mysqli_error());
						while($fetch = $query->fetch_array()){
					    ?>
						<tr>
					        <td><?php echo $fetch['firstname']."   ".$fetch['lastname'] ?></td>
							<td><?php echo $fetch['servtype']?></td>
							<td><?php echo $fetch['dtime']?></td>
							<td><?php echo $fetch['tdate']?></td>
							<td><?php echo $fetch['status'] ?></td>
						<!--	<td> <a class="btn btn-danger" onclick="confirmationDelete(this);return false;"  href="delete_appoint.php?id=<?php echo $fetch['itr_no']?>"><span class="glyphicon glyphicon-trash "></span> Cancel</a></td>
						-->
							</tr>
				     <?php
						}
						$conn->close();
					?>

					</tbody>
					</table>
			</div>
            </div>
		</div>
		</div>
	    </div>
        </div>
        </div>
	<div id = "footer">
		<label class = "footer-title">&copy; Copyright MOSC Patient Record System 2020</label>
	</div>
	<?php require'script.php' ?>
<script type = "text/javascript" src="../js/confirmdelete.js"></script>
<script type = "text/javascript" src="../js/forward.js"></script>
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
</body>
</html>