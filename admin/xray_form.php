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
  <br/><br/><br/>
  <div class="ts-main-content">
  <?php include('includes/leftbar.php');?>
  <div class="content-wrapper">
  <div class="container-fluid">
  <div class="row">
		<?php
				$conn = new mysqli("localhost","root","","hcpms") or die(mysqli_error());
				$q = $conn->query("SELECT * FROM `radiological` NATURAL JOIN `itr` WHERE `itr_no` = '$_GET[itr_no]' &&`rad_id` = '$_GET[rad_id]'") or die(mysqli_error());
				$f = $q->fetch_array();
			?>

			<br />
			<div class = "alert alert-success">Basic Information
				<a class = "btn-sm btn-info" style = "float:right; margin-top:-7px;" href = "xray_record.php?itr_no=<?php echo $f['itr_no']?>">
				<span class = "glyphicon glyphicon-hand-right"></span> Back</a>
			</div>
			<br />
			<br />
			
			<div style = "float:left; width:30%;">	
					<label style = "font-size:15px;">Name of Patient:</label>
					<br />
					<label style = "font-size:15px;" class = "text-muted"><?php echo $f['firstname']." ".$f['middlename']." ".$f['lastname']?></label>		
				</div>
				<div style = "float:left; width:10%;">	
					<label style = "font-size:15px;">Age:</label>
					<br />
					<label style = "font-size:15px;" class = "text-muted"><?php echo $f['age']?></label>		
				</div>
				<div style = "float:left; width:15%;">	
					<label style = "font-size:15px;">Civil Status:</label>
					<br />
					<label style = "font-size:15px;" class = "text-muted"><?php echo $f['civil_status']?></label>		
				</div>
				<div style = "float:left; width:40%;">
					<label style = "font-size:15px;">Address:</label>
					<br />
					<label style = "font-size:15px;" class = "text-muted"><?php echo $f['address']?></label>		
				</div>
				<br style = "clear:both;"/>
				<hr style = "border:1px dotted #d3d3d3;" />
				<div style = "float:left;">
					<label for = "case_no">Case No:</label>
					<br />
					<label class = "text-muted"><?php echo $f['case_no']?></label>
				</div>	
				<br />				
				<br />				
				<br style = "clear:both;"/>
				<div class = "form-inline" style = "width:50%; float:left;">
					<label for = "referred_by">Referred by:ICHC</label>
					<br />
					<label class = "text-muted"><?php echo $f['referred_by']?></label>
					<br />
					<br />
					<label for = "room_bed_no">Room & Bed No:</label>
					<br />
					<label class = "text-muted"><?php echo $f['room_bed_no']?></label>
				</div>
				<div class = "form-inline" style = "float:left; width:50%;">
					<label for = "clinical_impression">Clinical Impression:</label>
					<br />
					<label class = "text-muted"><?php echo $f['clinical_impression']?></label>
					<br />
					<br />
					<label for = "type_of_examination">Type of Examination:</label>
					<br />
					<label class = "text-muted"><?php echo $f['type_of_examination']?></label>
				<br />
				<br />
				</div>
	</div>
    </div>
    </div>
    </div>
    <br/><br/>
	<div id = "footer">
		<label class = "footer-title" >&copy; Copyright MOSC Patient Record System 2020</label>
	</div>

	<?php require'script3.php'?>
	<script type = "text/javascript" src="../js/paging_info.js"></script>
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