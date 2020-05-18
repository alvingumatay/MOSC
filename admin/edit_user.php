<?php require_once 'logincheck.php'; ?>
<?php 	include 'edit_query.php'; ?>
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
	    <link rel="stylesheet" href="../css/css1/bootstrap.min.css">
        <!-- Bootstrap Datatables -->
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
    <br/><br/><br/><br/>
  <div class="ts-main-content">
  <?php include('includes/leftbar.php');?>
  <div class="content-wrapper">
  <div class="container-fluid">
  <div class="row">
		<div class = "panel panel-success">	
		<?php
			$conn = new mysqli("localhost","root","","hcpms") or die(mysqli_error());
			$query = $conn->query("SELECT * FROM `user` WHERE `user_id` = '$_GET[id]'") or die(mysqli_error());
			$fetch = $query->fetch_array();
		?>

			<div class = "panel-heading">
				<label>UPDATE DOCTOR</label>
				<a href = "user.php" class = "btn btn-sm btn-info" style = "float:right; margin-top:-5px;"><span class = "glyphicon glyphicon-hand-right"></span> BACK</a>
			</div>
			<div class = "panel-body">
				<form id = "form_user" method = "POST" enctype = "multi-part/form-data">
					<div class = "panel panel-default" style = "width:60%; margin:auto;">
					<div class = "panel-heading">
					</div>
					<div class = "panel-body">
						<div class = "form-group">
							<label for = "username">Username: </label>
							<input class = "form-control" value = "<?php echo $fetch['username']?>" name = "username" type = "text" required = "required">
						</div>
						<div class = "form-group">	
							<label for = "password">Password: </label>
							<input class = "form-control" name = "password" maxlength = "12" value = "<?php echo $fetch['password']?>" type = "password" required = "required">
						</div>
						<div class = "form-group">
							<label for = "firstname">Firstname: </label>							
							<input class = "form-control" type = "text" value = "<?php echo $fetch['firstname']?>" name = "firstname" required = "required">
						</div>
						<div class = "form-group">
							<label for = "middlename">Middlename: </label>
							<input class = "form-control" type = "text" value = "<?php echo $fetch['middlename']?>" name = "middlename" placeholder = "(Optional)">
						</div>
						<div class = "form-group">
							<label for = "lastname">Lastname: </label>
							<input class = "form-control" type = "text" value = "<?php echo $fetch['lastname']?>" name = "lastname" required = "required">
						</div>
						<div class = "form-group">
							<label for = "section">Section: </label>
							<select name = "section" class = "form-control" required = "required">
								<option value = "">--Please select an option--</option>
								<option value = "Xray">Xray</option>
								<option value = "Urinalysis">Urinalysis</option>
								<option value = "Fecalysis">Fecalysis</option>
							    <option value = "Hematology">Hematology</option>
                                <option value = "DoctorApp"> Appointments</option>
                            </select>
						</div>
							<button class = "btn btn-warning" name = "edit_user" ><span class = "glyphicon glyphicon-edit"></span> SAVE</button>
							<br />
					</div>	
				
					</div>
				</form>			
			</div>	
		</div>	
	</div>
   </div>
   </div>
   </div>
	<div id = "footer">
		<label class = "footer-title">&copy; Copyright MOSC Patient Record System 2020</label>
	</div>
<?php include("script.php"); ?>
<script type = "text/javascript" src="../js/confirmdelete.js"></script>
<script type = "text/javascript" src="../js/forward.js"></script>
<script type="text/javascript" src="../js/accept_pending.js"></script>
</body>
<!-- Loading Scripts -->
  <script src="../js/js1/jquery.min.js"></script>
  <script src="../js/js1/bootstrap-select.min.js"></script>
  <script src="../js/js1/bootstrap.min.js"></script>
  <script src="../js/js1/jquery.dataTables.min.js"></script>
  <script src="../js/js1/dataTables.bootstrap.min.js"></script>
  <script src="../js/js1/Chart.min.js"></script>
  <script src="../js/js1/fileinput.js"></script>
  <script src="../js/js1/chartData.js"></script>
  <script src="../js/js1/main.js"></script>
  <script type="text/javascript">
         $(document).ready(function () {          
          setTimeout(function() {
            $('.succWrap').slideUp("slow");
          }, 3000);
          });
  </script>
</html>