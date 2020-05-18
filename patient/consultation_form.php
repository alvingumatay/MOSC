<!DOCTYPE html>
<?php
	ob_start();
	require_once 'logincheck.php';
?>
<html lang = "eng">
	<head>
		<title>MOSC Patient Record System</title>
		<meta charset = "utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel = "shortcut icon" href = "../images/mosc-logo.png" />
		<link rel = "stylesheet" type = "text/css" href = "../css/bootstrap.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/jquery.dataTables.css" />
		<link href="../font-awesome-4.7.0/css/font-awesome.css" rel="stylesheet"> 
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
	</head>
<body>
	<?php include('includes/header.php');?>
    <br/> <br/> <br/> <br/> <br/>
  <div class="ts-main-content">
		<?php
			$conn = new mysqli("localhost","root","","hcpms") or die(mysqli_error());
			$q = $conn->query("SELECT * FROM `rehabilitation` NATURAL JOIN `itr` WHERE `rehab_id` = '$_GET[rehab_id]' && `itr_no` = '$_GET[itr_no]'") or die(mysqli_error());
			$f = $q->fetch_array();
		?>
		<br />
		<div class = "alert alert-success">Basic Information 
			<a class = "btn btn-success" style = "float:right; margin-top:-7px;" href =" consultation_record.php?itr_no=<?php echo $f['itr_no']?> ">
			<span class = "glyphicon glyphicon-hand-right"></span> Back</a>
		</div>
		<br />
		<br />
					<div style = "width:30%; float:left;">
						<label style = "font-size:18px;">Name</label>
						<br />
						<label style = "font-size:18px;" class = "text-muted"><?php echo $f['firstname']." ".$f['middlename']." ".$f['lastname']?></label>
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
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['BP']?></label>
				</div>
				<div style = "width:20%; float:left;">
					<label style = "font-size:18px;">Temp:</label>
					<br />
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['TEMP']?></label>
				</div>
				<div style = "width:20%; float:left;">
					<label style = "font-size:18px;">Pulse</label>
					<br />
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['PR']?></label>
				</div>
				<div style = "width:20%; float:left;">
					<label style = "font-size:18px;">RR</label>
					<br />
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['RR']?></label>
				</div>
				<br style = "clear:both;"/>
				<hr style = "border:1px dotted #d3d3d3;" />
				<div class = "form-inline">
					<center><h3 style = "color:#3C763D;"><u>CONSULTATION NOTES</u></h3></center>
				</div>
				<br />
				<div class = "form-group">
					<h4 style = "color:#3C763D;"><b>Initial Evaluation</b></h4>
				</div>
				<br />
				
				<br />
				<div class = "form-group">
					<label>Assessment:</label>
					<div style = "word-wrap:break-word;"><?php echo $f['assessment']?></div>
				</div>
				<br />
				<div class = "form-group">
					<label>Plan:</label>
					<div style = "word-wrap:break-word;"><?php echo $f['plan']?></div>
				</div>
				<br />
				<br />
	</div>
	<div id = "footer">
		<label class = "footer-title">&copy; Copyright MOSC Patient Record System 2020</label>
	</div>

<?php include("script.php"); ?>
<script type = "text/javascript" src="../js/forward.js"></script>
<!-- Loading Scripts -->
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
</body>
</html>