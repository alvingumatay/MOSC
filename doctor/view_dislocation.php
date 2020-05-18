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
<br/><br/><br/><br/><br/><br/><br/><br/>
  <div class="ts-main-content">
		<div class = "panel panel-warning">
			<div class = "panel-heading">
				<center><label>DISLOCATION</label></center>
			</div>
		</div>
		<div class = "panel panel-success">	
			<div class = "panel-heading">
			<?php
				$q = $conn->query("SELECT * FROM `itr` WHERE `itr_no` = '$_GET[itr_no]'") or die(mysqli_error());
				$f = $q->fetch_array();
				$q1 = $conn->query("SELECT COUNT(*) as total FROM `complaints` where `status` = 'Pending' && `itr_no` = '$f[itr_no]' && `section` = 'Dislocation'") or die(mysqli_error());
				$f1 = $q1->fetch_array();
			?>
				<label>Patient Information / <label class = "text-warning"><?php echo $f['firstname']." ".substr($f['middlename'], 0,1).". ".$f['lastname']?></label></label>
				
				<a style = "float:right; margin-top:-4px;" href = "dislocation.php" class = "btn-sm btn-info"><span class = "glyphicon glyphicon-hand-right"></span> BACK</a>
				
				<a style = "float:right; margin-top:-4px; margin-right:5px;" href = "dislocation_pending.php?itr_no=<?php echo $f['itr_no']?>" class = "btn-sm btn-info">REQUEST <span class = "badge"> <?php echo $f1['total']?></span></a>
				<label style = "margin-top:5px; margin-right:5px; float:right;">Patient No: <label class = "text-warning"><?php echo $f['itr_no']?></label></label>
			
			</div>
			
			<div class = "panel-body">
					<div style = "float:left; width:15%;">
						<label style = "font-size:18px;">Birthdate</label>
						<br />
						<label style = "font-size:18px;" class = "text-muted"><?php echo $f['birthdate']?></label>
					</div>
					<div style = "float:left; width:10%;">
						<label style = "font-size:18px;">Age</label>
						<br />
						<label style = "font-size:18px;" class = "text-muted"><?php echo $f['age']?></label>
					</div>
					<div style = "float:left; width:15%;">
						<label style = "font-size:18px;">Gender</label>
						<br />
						<label style = "font-size:18px;" class = "text-muted"><?php echo $f['gender']?></label>
					</div>
					<div style = "float:left; width:15%;">
						<label style = "font-size:18px;">Civil Status</label>
						<br />
						<label style = "font-size:18px;" class = "text-muted"><?php echo $f['civil_status']?></label>
					</div>
					<div style = "float:left; width:15%;">	
						<label style = "font-size:18px;" for = "phil_health_no">Phil Health no</label>
						<br />
						<label style = "font-size:18px;" class = "text-muted"><?php echo $f['phil_health_no']?></label>
					</div>
					<div style = "float:left; width:15%;">
						<label style = "font-size:18px;">Address</label>
						<br />
						<label style = "font-size:18px;" class = "text-muted"><?php echo $f['address']?></label>
					</div>	
					<br style = "clear:both;" />
					<hr style = "border:1px dotted #d3d3d3;"/>
					<div class = "form-group" style = "width:15%; float:left;">
						<label style = "font-size:18px;" for = "bp">BP</label>
						<br />
						<label style = "font-size:18px;" class = "text-muted"><?php echo $f['bp']?></label>
					</div>
					<div class = "form-group" style = "width:15%; float:left;">
						<label style = "font-size:18px;" for = "temp">TEMP</label>
						<br />
						<label style = "font-size:18px;" class = "text-muted"><?php echo $f['temp']?></label>
					</div>
					<div class = "form-group" style = "width:15%; float:left;">	
						<label style = "font-size:18px;" for = "pr">PR</label>
						<br />
						<label style = "font-size:18px;" class = "text-muted"><?php echo $f['rr']?></label>
					</div>
					<div class = "form-group" style = "width:15%; float:left;">	
						<label style = "font-size:18px;" for = "rr">RR</label>
						<br />
						<label style = "font-size:18px;" class = "text-muted"><?php echo $f['rr']?></label>
					</div>
					<div class = "form-group" style = "width:15%; float:left;">	
						<label style = "font-size:18px;" for = "wt">WT</label>
						<br />
						<label style = "font-size:18px;" class = "text-muted"><?php echo $f['wt']?></label>
					</div>	
					<div class = "form-group" style = "width:15%; float:left;">	
						<label style = "font-size:18px;" for = "ht">HT</label>
						<br />
						<label style = "font-size:18px;" class = "text-muted"><?php echo $f['ht']?></label>
					</div>
					<br />
			</div>	
		</div>	
		 
	</div>
	<div id = "footer">
		<label class = "footer-title">&copy; Copyright MOSC Patient Record System 2020</label>
	</div>
	</body>
		<?php require "script.php" ?>
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