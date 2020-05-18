<?php
	require_once 'logincheck.php';
	$year = date("Y", strtotime("+8 HOURS"));
	$conn = new mysqli("localhost","root","","hcpms") or die(mysqli_error());
	$qjan = $conn->query("SELECT COUNT(*) as total FROM `rehabilitation` WHERE `month` = 'Jan' && `year` = '$year'") or die(mysqli_error());
	$fjan = $qjan->fetch_array();
	$qfeb = $conn->query("SELECT COUNT(*) as total FROM `rehabilitation` WHERE `month` = 'Feb' && `year` = '$year'") or die(mysqli_error());
	$ffeb = $qfeb->fetch_array();
	$qmar = $conn->query("SELECT COUNT(*) as total FROM `rehabilitation` WHERE `month` = 'Mar' && `year` = '$year'") or die(mysqli_error());
	$fmar = $qmar->fetch_array();
	$qapr = $conn->query("SELECT COUNT(*) as total FROM `rehabilitation` WHERE `month` = 'Apr' && `year` = '$year'") or die(mysqli_error());
	$fapr = $qapr->fetch_array();
	$qmay = $conn->query("SELECT COUNT(*) as total FROM `rehabilitation` WHERE `month` = 'May' && `year` = '$year'") or die(mysqli_error());
	$fmay = $qmay->fetch_array();
	$qjun = $conn->query("SELECT COUNT(*) as total FROM `rehabilitation` WHERE `month` = 'Jun' && `year` = '$year'") or die(mysqli_error());
	$fjun = $qjun->fetch_array();
	$qjul = $conn->query("SELECT COUNT(*) as total FROM `rehabilitation` WHERE `month` = 'Jul' && `year` = '$year'") or die(mysqli_error());
	$fjul = $qjul->fetch_array();
	$qaug = $conn->query("SELECT COUNT(*) as total FROM `rehabilitation` WHERE `month` = 'Aug' && `year` = '$year'") or die(mysqli_error());
	$faug = $qaug->fetch_array();
	$qsep = $conn->query("SELECT COUNT(*) as total FROM `rehabilitation` WHERE `month` = 'Sept' && `year` = '$year'") or die(mysqli_error());
	$fsep = $qsep->fetch_array();
	$qoct = $conn->query("SELECT COUNT(*) as total FROM `rehabilitation` WHERE `month` = 'Oct' && `year` = '$year'") or die(mysqli_error());
	$foct = $qoct->fetch_array();
	$qnov = $conn->query("SELECT COUNT(*) as total FROM `rehabilitation` WHERE `month` = 'Nov' && `year` = '$year'") or die(mysqli_error());
	$fnov = $qnov->fetch_array();
	$qdec = $conn->query("SELECT COUNT(*) as total FROM `rehabilitation` WHERE `month` = 'Dec' && `year` = '$year'") or die(mysqli_error());
	$fdec = $qdec->fetch_array();
	$year = date("Y");
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
		<?php require 'script.php'?>
		<script src = "../js/jquery.canvasjs.min.js"></script>
		<script type="text/javascript"> 
		window.onload = function(){ 
			$(".chartContainer").CanvasJSChart({ 
				title: { 
					text: "Monthly Rehabilitation Patient Population <?php echo $year?>" 
				}, 
				axisY: { 
					title: "Total Population", 
					includeZero: false 
				}, 
				data: [ 
				{ 
					type: "column", 
					toolTipContent: "{label}: {y}", 
					dataPoints: [ 
						{ label: "January", y: <?php echo $fjan['total']?> },
						{ label: "Febuary", y: <?php echo $ffeb['total']?> },
						{ label: "March", y: <?php echo $fmar['total']?> },
						{ label: "April", y: <?php echo $fapr['total']?> },
						{ label: "May", y: <?php echo $fmay['total']?> },
						{ label: "June", y: <?php echo $fjun['total']?> },
						{ label: "July", y: <?php echo $fjul['total']?> },
						{ label: "August", y: <?php echo $faug['total']?> },
						{ label: "September", y: <?php echo $fsep['total']?> },
						{ label: "October", y: <?php echo $foct['total']?> },
						{ label: "November", y: <?php echo $fnov['total']?> },
						{ label: "December", y: <?php echo $fdec['total']?> }
					] 
				} 
				] 
			}); 
		}
</script>
	</head>
<body>
  <?php include('includes/header.php');?>
  <div class="ts-main-content">
  <?php include('includes/leftbar.php');?>
  <div class="content-wrapper">
  <div class="container-fluid">
  <div class="row">
		<?php
			$conn = new mysqli("localhost","root","","hcpms") or die(mysqli_error());
			$q1 = $conn->query("SELECT * FROM `itr` WHERE `itr_no` = '$_GET[itr_no]'") or die(mysqli_error());
			$f1 = $q1->fetch_array();
		?>
		<br />
		<div class = "alert alert-success">Rehabilitation Record / <?php echo $f1['firstname']." ".substr($f1['middlename'], 0, 1).". ".$f1['lastname']?>
			<a class = "btn btn-success" style = "float:right; margin-top:-7px;" href = "rehabilitation.php">
			<span class = "glyphicon glyphicon-hand-right"></span> Back</a>
		</div>
		
		<table id = "table" cellspacing = "0" class = "display">
			<thead>
				<tr>
					<th>Date</th>
					<th>Type of Disability</th>
					<th>Diagnosis</th>
					<th><center>Action</center></th>
				</tr>
			</thead>
			<tbody>
			<?php 
				$conn = new mysqli("localhost","root","","hcpms") or die(mysqli_error());
				$q = $conn->query("SELECT * FROM `rehabilitation` NATURAL JOIN `itr` WHERE `itr_no` = '$_GET[itr_no]' ORDER BY `rehab_id` DESC") or die(mysqli_error());
				while($f = $q->fetch_array()){
			?>
				<tr>
					<td><?php echo $f['date']?></td>
					<td><?php echo $f['type_of_disability']?></td>
					<td><?php echo $f['diagnosis']?></td>
					<td><center><a class = "btn btn-success" href = "rehabilitation_form.php?itr_no=<?php echo $f['itr_no']?>&rehab_id=<?php echo $f['rehab_id']?>"><span class = "glyphicon glyphicon-search"></span> View Detail</a><center></td>
				</tr>
			<?php
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
	<script type = "text/javascript" src="../js/target.js"></script>	
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