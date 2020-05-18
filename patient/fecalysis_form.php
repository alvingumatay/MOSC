<?php
	require_once 'logincheck.php';
	$conn = new mysqli("localhost","root","","hcpms") or die(mysqli_error());
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
	</head>
<body>
  <?php include('includes/header.php');?>
<br /><br /><br /><br /><br /><br /><br />  
  <div class="ts-main-content">	
		<br />
		<br />
		<br />
		<?php 
			$conn = new mysqli("localhost","root","","hcpms") or die(mysqli_error());
			$q = $conn->query("SELECT * FROM `fecalisys` NATURAL JOIN `itr` WHERE `itr_no` = '$_GET[itr_no]' && `fecalysis_id` = '$_GET[fecalysis_id]'") or die(mysqli_error());
			$f = $q->fetch_array();
		?>
			
		<div class = "alert alert-success">Basic Information <a class = "btn btn-success" style = "float:right; margin-top:-7px;" href = "fecalysis_record.php?itr_no=<?php echo $_GET['itr_no']?>"><span class = "glyphicon glyphicon-hand-right"></span> Back</a></div>
				<div style = "float:left; width:30%;">
					<label style = "font-size:18px;">Name</label>
					<br />
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['firstname']." ".$f['middlename']." ".$f['lastname']?></label>
				</div>
				<div style = "float:left; width:10%;">
					<label style = "font-size:18px;">Age</label>
					<br />
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['age']?></label>
				</div>
				<div style = "float:left; width:10%;">
					<label style = "font-size:18px;">Gender</label>
					<br />
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['gender']?></label>
				</div>
				<div style = "float:left; width:40%;">	
					<label style = "font-size:18px;">Address</label>
					<br />
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['address']?></label>					
				</div>
				<br style = "clear:both;"/>
				<hr style = "border:1px dotted #d3d3d3;" />
				<div style = "float:left; width:40%;">
					<label style = "font-size:18px;">Requested By:</label>
					<br />
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['requested_by']?></label>
				</div>	
				<div style = "float:left; width:20%;">
					<label style = "font-size:18px;">Date of request: </label>
					<br />
					<label style = "font-size:18px;" class = "text-muted"><?php echo date("m/d/Y", strtotime($f['date_of_request']))?></label>
				</div>
				<br style = "clear:both;" />
				<h4 style = "color:#3C763D;"><b>PHYSICAL PROPERTIES</b></h4>
				<br />
				<div style = "float:left; width:20%;">	
					<label style = "font-size:18px;">Color:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['color']?></label>
				</div>
				<div style = "float:left; width:20%;">
					<label style = "font-size:18px;">Consistency:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['consistency']?></label>
				</div>
				<br />
				<br />
				<h4 style = "color:#3C763D;"><b>CHEMICAL PROPERTIES</b></h4>
				<br />
				<div style = "float:left; width:20%;">	
					<label style = "font-size:18px;">Occult Blood:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['occult_blood']?></label>
				</div>
				<div style = "float:left; width:20%;">
					<label style = "font-size:18px;">Others:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['others_chem']?></label>		
				</div>
				<br />
				<br />
				<h4 style = "color:#3C763D;"><b>MICROSCOPIC FINDINGS</b></h4>
				<br />
				<div style = "float:left; width:20%;">	
					<label style = "font-size:18px;">Pus cells:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['pus_cells']?></label>
					<label style = "color:#f00;">/HPF</label>
				</div>
				<div style = "float:left; width:20%;">
					<label style = "font-size:18px;">RBC:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['RBC']?></label>
					<label style = "color:#f00;">/HPF</label>
				</div>
				<div style = "float:left; width:20%;">
					<label style = "font-size:18px;">Fat GLobules:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['fat_globules']?></label>
					<label style = "color:#f00;">/HPF</label>
				</div>
				<br />
				<br />
				<h4 style = "color:#3C763D;"><b>HELMINTHS</b></h4>
				<br />
				<div style = "float:left; width:20%;">	
					<label style = "font-size:18px;">Ova:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['ova']?></label>
				</div>
				<div style = "float:left; width:20%;">
					<label style = "font-size:18px;">Larva:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['larva']?></label>
				</div>
				<div style = "float:left; width:20%;">
					<label style = "font-size:18px;">Adult Forms:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['adult_forms']?></label>
				</div>
				<br />
				<br />
				<h4 style = "color:#3C763D;"><b>PROTOZOA</b></h4>
				<br />
				<div style = "float:left; width:20%;">
					<label style = "font-size:18px;">Cyst:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['cyst']?></label>
				</div>
				<div style = "float:left; width:20%;">
					<label style = "font-size:18px;">Trophozoites:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['trophozoites']?></label>
				</div>
				<div style = "float:left; width:20%;">
					<label style = "font-size:18px;">Others:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['others_pro']?></label>
				</div>
				<br />
				<br />
				<div class = "form-group">
					<h4><b>REMARKS:</b></h4>
					<div style = "word-wrap:break-word;"><b><?php echo $f['remarks']?></b></div>
				</div>
				<br />
				<div style = "float:left; width:20%;">
					<label style = "font-size:18px;">Date Reported:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo date("m/d/Y", strtotime($f['date_reported']))?></label>
				</div>
				<br style = "clear:both;"/>
				<br />
				<div style = "float:left; width:40%;">
					<label style = "font-size:18px;">Pathologist:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['pathologist']?></label>
				</div>
				<div style = "float:left; width:40%;">
					<label style = "font-size:18px;">Medical Technologist:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['medical_technologist']?></label>
				</div>	
	<br />
	<br />
	<br />
	<br />
	<br />
	</div>	
	<div id = "footer">
		<label class = "footer-title">&copy; Copyright MOSC Patient Record System 2020</label>
	</div>

	<?php 
		require'script3.php';	
	?>
	<script type = "text/javascript">
			$(document).ready(function(){
				$("#table").DataTable({
					"paging": false,
					"info": false
				});
			});
	</script>
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