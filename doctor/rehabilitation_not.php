<?php
    ob_start();
    require_once 'logincheck.php';
    $conn = new mysqli("localhost","root","","hcpms") or die(mysqli_error());
	$query = $conn->query("SELECT * FROM `user` WHERE `user_id` = '$_SESSION[user_id]'") or die(mysqli_error());
	$fetch = $query->fetch_array();
?>
<?php include'add_query.php';?>
<!DOCTYPE html>
<html lang = "en">
	<head>	
		<title>MOSC Patient Records System</title>
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
				<center><label>CONSULTATION</label></center>
			</div>
		</div>
		<div class = "panel panel-default">
			<div class = "panel-heading">
				<label>CONSULTATION FORM</label>	<a style = "float:right; margin-top:-4px;" href = "rehabilitation_pending.php?itr_no=<?php echo $_GET['itr_no']?>" class = "btn btn-success"><span class = "glyphicon glyphicon-hand-right"></span> BACK</a>
			</div>
			<form method = "POST" enctype = "multipart/form-data">
			<?php
			    $conn = new mysqli("localhost","root","","hcpms") or die(mysqli_error());
				$q = $conn->query("SELECT * FROM `itr` WHERE `itr_no` = '$_GET[itr_no]'") or die(mysqli_error());
				$q1 = $conn->query("SELECT * FROM `complaints` WHERE `com_id` = '$_GET[comp_id]' && `itr_no` = '$_GET[itr_no]' && `section` = 'Rehabilitation'") or die(mysqli_error());
				$f1 = $q1->fetch_array();
				$f = $q->fetch_array();
			?>	
			<div class = "panel-body">
				<div class = "alert alert-success">Basic Information</div>
					<div style = "width:30%; float:left;">
						<label style = "font-size:18px;">Name</label>
						<br />
						<label style = "font-size:18px;" class = "text-muted"><?php echo $f['firstname']." ".substr($f['middlename'], 0,1).". ".$f['lastname']?></label>
					</div>
					<div style = "width:10%; float:left;">
						<label style = "font-size:18px;">Age</label>
						<br />
						<label style = "font-size:18px;" class = "text-muted"><?php echo $f['age']?></label>
					</div>
					<div style = "width:10%; float:left;">
						<label style = "font-size:18px;">Gender</label>
						<br />
						<label style = "font-size:18px;" class = "text-muted"><?php echo $f['gender']?></label>
					</div>
					<div style = "width:15%; float:left;">
						<label style = "font-size:18px;">Birthdate</label>
						<br />
						<label style = "font-size:18px;" class = "text-muted"><?php echo $f['birthdate']?></label>
					</div>
					<div style = "float:left; width:35%;">
						<label style = "font-size:18px;">Address</label>
						<br />
						<label style = "font-size:18px;" class = "text-muted"><?php echo $f['address']?></label>				
					</div>
					<br />
					<br />
					<br />
					<br style = "clear:both;"/>
				<div style = "width:20%; float:left;">
					<label style = "font-size:18px;">BP</label>
					<br />
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['bp']?></label>
				</div>
				<div style = "width:20%; float:left;">
					<label style = "font-size:18px;">Temp:</label>
					<br />
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['temp']?></label>
				</div>
				<div style = "width:20%; float:left;">
					<label style = "font-size:18px;">Pulse</label>
					<br />
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['pr']?></label>
				</div>
				<div style = "width:20%; float:left;">
					<label style = "font-size:18px;">RR</label>
					<br />
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['rr']?></label>
				</div>
				<br style = "clear:both;"/>
				<hr style = "border:1px dotted #d3d3d3;" />
				
				<div class = "form-inline">
					<label>Diagnosis:</label>
					<input type = "text" name = "diagnosis" class = "form-control" required="required" />
					<label style = "margin-left:10px;">Type of Disability:</label>
					<input type = "text" name = "type_of_disability" class = "form-control" required="required" />
				</div>
				
				<div class = "form-inline">
					<center><h3 style = "color:#3C763D;"><u>CONSULTATION NOTES</u></h3></center>
				</div>
				<br />
				
				<div class = "form-group">
					<h4 style = "color:#3C763D;"><b>Initial Evaluation</b></h4>
				</div>
				<br />
				
				<div class = "form-group">
					<label>Assessment:</label>
					<textarea name = "assessment" class = "form-control" style = "resize:none;" required="required" ></textarea>
				</div>
				<br />
				
				<div class = "form-group">
					<label>Plan:</label>
					<textarea name = "plan" class = "form-control" style = "resize:none;" required="required" ></textarea>
					<input type = "hidden" name = "itr_no" value = "<?php echo $f['itr_no']?>" required="required" />
					<input type = "hidden" name = "user_id" value = "<?php echo $_SESSION['user_id']?>" required="required" />
				</div>

                <div class = "form-group">
					<label>Medical Doctor:</label>
					<textarea name = "medical_doctor" class = "form-control" style = "resize:none;" required="required" ></textarea>
					
				</div>
				<br />
				<br />
				
				<div class = "form-inline">
					<button class = "btn btn-success" name = "save_r" ><span class = "glyphicon glyphicon-save"></span> SAVE</button>
				</div>

			</div>

			</form>
            
		</div>	 
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