<?php
	ob_start();
	require_once'logincheck.php';
?>
<?php include'add_query.php';?>	
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
				<center><label>XRAY</label></center>
			</div>
		</div>
		<div class = "panel panel-default">
			<div class = "panel-heading">
				<label>XRAY FORM</label>	<a style = "float:right; margin-top:-4px;" href = "xray_pending.php?itr_no=<?php echo $_GET['itr_no']?>" class = "btn btn-success"><span class = "glyphicon glyphicon-hand-right"></span> BACK</a>
			</div>
			<form method = "POST" enctype = "multipart/form-data">
			<?php
				$q = $conn->query("SELECT * FROM `itr` WHERE `itr_no` = '$_GET[itr_no]'") or die(mysqli_error());
				$f = $q->fetch_array();
			?>	
		<div class = "panel-body">
				<div class = "alert alert-success">Basic Information</div>		
				<div style = "float:left; width:30%;">	
					<label style = "font-size:15px;">Name of Patient:</label>
					<br />
					<label style = "font-size:15px;" class = "text-muted"><?php echo $f['firstname']." ".substr($f['middlename'], 0,1).". ".$f['lastname']?></label>		
				</div>
				<div style = "float:left; width:10%;">	
					<label style = "font-size:15px;">Age:</label>
					<br />
					<label style = "font-size:15px;" class = "text-muted"><?php echo $f['age']?></label>		
				</div>
				<div style = "float:left; width:20%;">	
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
				<div class = "form-inline">
					<label for = "case_no">Case No:</label>
					<input class = "form-control" name = "case_no" size = "10" required = "required" type = "text" />
					<br />
					<br />
				</div>
				<div class = "form-inline" style = "width:50%; float:left;">
					<label for = "referred_by">Referred by:ICHC</label>
					<input class = "form-control" name = "referred_by" size = "40" type = "text" />
					<br />
					<br />
					<label for = "room_bed_no">Room & Bed No:</label>
					<input class = "form-control" name = "room_bed_no" size = "20" type = "text" />
				</div>
				<div class = "form-inline" style = "float:left; width:50%;">
					<label for = "clinical_impression">Clinical Impression:</label>
					<select name = "clinical_impression" class = "form-control" required = "required">
						<option value = "">--Please select an option--</option>
						<option value = "Chest-PA">Chest-PA</option>
						<option value = "Chest-Bucky">Chest-Bucky</option>
						<option value = "Chest-PA and Lateral">Chest-PA and Lateral</option>
						<option value = "Chest-AP and Lateral">Chest-AP and Lateral</option>
						<option value = "Skull-AP and Lateral">Skull-AP and Lateral</option>
						<option value = "Skull-Towne's View">Skull-Towne's View</option>
						<option value = "Skull-Water's View">Skull-Water's View</option>
						<option value = "Cervical-AP and Lateral">Cervical-AP and Lateral</option>
						<option value = "Mandible-AP and Oblique">Mandible-AP and Oblique</option>
						<option value = "Temporo-Mandibular">Temporo-Mandibular</option>
						<option value = "Nasal Bones">Nasal Bones</option>
						<option value = "Thoraco-Lumbar-AP and Lateral">Thoraco-Lumbar-AP and Lateral</option>
						<option value = "Lumbo-Sacral-AP and Lateral">Lumbo-Sacral-AP and Lateral</option>
						<option value = "Pelvimetry">Pelvimetry</option>
						<option value = "Arm-AP and Lateral">Arm-AP and Lateral</option>
						<option value = "Forearm-AP and Lateral">Forearm-AP and Lateral</option>
						<option value = "Hand-AP and Lateral">Hand-AP and Lateral</option>
						<option value = "Femur-AP and Lateral">Femur-AP and Lateral</option>
						<option value = "Foot-AP and Lateral">Foot-AP and Lateral</option>
						<option value = "Knee-AP and Lateral">Knee-AP and Lateral</option>
						<option value = "Leg-AP and Lateral">Leg-AP and Lateral</option>
						<option value = "Ankle-AP and Lateral">Ankle-AP and Lateral</option>
						<option value = "Scapula-AP and Lateral">Scapula-AP and Lateral</option>
					</select>
					<br />
					<br />
					<label for = "type_of_examination">Type of Examination:</label>
					<input class = "form-control" name = "type_of_examination" size = "40" type = "text" />
				</div>
				<br style = "clear:both;"/>
				<br />
				<div class = "form-inline">
					<label for = "remark">Remark:</label>
					<input class = "form-control" name = "remark" required = "required" type = "text" size="100" />
				</div>
				<br />
				<div class = "form-inline">
					<label for = "radiologist">Radiologist / Sonologist:</label>
					<input class = "form-control" name = "radiologist" required = "required" size = "60" type = "text" />
					<input type = "hidden" name = "itr_no" value = "<?php echo $f['itr_no']?>" />
					<input type = "hidden" name = "user_id" value = "<?php echo $_SESSION['user_id']?>" />
				</div>
				
				<br />
				<br />
				<div class = "form-inline">
					<button class = "btn btn-success" name = "save_x" ><span class = "glyphicon glyphicon-save"></span> SAVE</button>
				
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