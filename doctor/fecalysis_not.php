<?php
	ob_start();
	require_once'logincheck.php';
	$conn = new mysqli("localhost","root","","hcpms") or die(mysqli_error());
	$query = $conn->query("SELECT * FROM `user` WHERE `user_id` = '$_SESSION[user_id]'") or die(mysqli_error());
	$fetch = $query->fetch_array();
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
				<center><label>FECALYSIS</label></center>
			</div>
		</div>
<div class = "panel panel-default">
			<div class = "panel-heading">
				<label>FECALYSIS FORM</label>	
				<a style = "float:right; margin-top:-4px;" href = "fecalysis_pending.php?itr_no=<?php echo $_GET['itr_no']?>" class = "btn btn-success"><span class = "glyphicon glyphicon-hand-right"></span> BACK</a>
			</div>
			<?php
				$q1 = $conn->query("SELECT * FROM `complaints` WHERE `com_id` = '$_GET[comp_id]'") or die(mysqli_error());
				$f1 = $q1->fetch_array();
				$q = $conn->query("SELECT * FROM `itr` WHERE `itr_no` = '$_GET[itr_no]'") or die(mysqli_error());
				$f = $q->fetch_array()
			?>
			<form method = "POST" enctype = "multipart/form-data">
			<div class = "panel-body">
			<div class = "alert alert-success">Basic Information</div>
				<div style = "float:left; width:30%;">
					<label style = "font-size:18px;">Name</label>
					<br />
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['firstname']." ".$f['middlename']." ".$f['lastname']?></label>
				</div>
				<div style = "float:left; width:20%;">
					<label style = "font-size:18px;">Age</label>
					<br />
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['age']?></label>
				</div>
				<div style = "float:left; width:20%;">
					<label style = "font-size:18px;">Gender</label>
					<br />
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['gender']?></label>
				</div>
				<br />
				<br />
				<br />
				<br style = "clear:both;"/>
				<div>	
					<label style = "font-size:18px;">Address</label>
					<br />
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['address']?></label>					
				</div>
				<hr style = "border:1px dotted #d3d3d3;" />
				<div class = "form-inline">
					<label for = "requested_by">Requested By:</label>
					<input class = "form-control" type = "text" size = "60" name = "requested_by" required = "required" />
					<label for = "date_of_request">Date of request: </label>
					<input class = "form-control" value = "<?php echo $f1['date']?>" readonly = "readonly" name = "date_of_request" type = "text" />
				</div>
				<br />
				<div class = "form-inline">
					<h4 style = "color:#3C763D;"><b>PHYSICAL PROPERTIES</b></h4>
					<br />
					<label for = "color">Color:</label>
					<input class = "form-control" type = "text" name = "color" />
					&nbsp;&nbsp;&nbsp;
					<label for = "consistency">Consistency:</label>
					<input class = "form-control" type = "text" name = "consistency" />
				</div>
				<br />
				<div class = "form-inline">
					<h4 style = "color:#3C763D;"><b>CHEMICAL PROPERTIES</b></h4>
					<br />
					<label for = "occult_blood">Occult Blood:</label>
					<input class = "form-control" type = "text" name = "occult_blood" />
					&nbsp;&nbsp;&nbsp;
					<label for = "others_chem">Others:</label>
					<input class = "form-control" placeholder = "(Optional)" type = "text" name = "others_chem" />
				</div>
				<br />
				<div class = "form-inline">
					<h4 style = "color:#3C763D;"><b>MICROSCOPIC FINDINGS</b></h4>
					<br />
					<label for = "pus_cells">Pus cells:</label>
					<input class = "form-control" type = "text" name = "pus_cells" />
					<label style = "color:#f00;">/HPF</label>
					&nbsp;&nbsp;&nbsp;
					<label for = "rbc">RBC:</label>
					<input class = "form-control" type = "text" name = "rbc" />
					<label style = "color:#f00;">/HPF</label>
					&nbsp;&nbsp;&nbsp;
					<label for = "fat_globules">Fat GLobules:</label>
					<input class = "form-control" type = "text" name = "fat_globules" />
					<label style = "color:#f00;">/HPF</label>
				</div>
				<br />
				<div class = "form-inline">
					<h4 style = "color:#3C763D;"><b>HELMINTHS</b></h4>
					<br />
					<label for = "ova">Ova:</label>
					<input class = "form-control" type = "text" name = "ova" />
					&nbsp;&nbsp;&nbsp;
					<label for = "larva">Larva:</label>
					<input class = "form-control" type = "text" name = "larva" />
					&nbsp;&nbsp;&nbsp;
					<label for = "adult_forms">Adult Forms:</label>
					<input class = "form-control" type = "text" name = "adult_forms" />
				</div>
				<br />
				<div class = "form-inline">
					<h4 style = "color:#3C763D;"><b>PROTOZOA</b></h4>
					<br />
					<label for = "cyst">Cyst:</label>
					<input class = "form-control" type = "text" name = "cyst" />
					&nbsp;&nbsp;&nbsp;
					<label for = "trophozoites">Trophozoites:</label>
					<input class = "form-control" type = "text" name = "trophozoites" />
					&nbsp;&nbsp;&nbsp;
					<label for = "others_pro">Others:</label>
					<input class = "form-control" placeholder = "(Optional)" type = "text" name = "others_pro" />
				</div>
				<br />
				<div class = "form-group">
					<h4><b>REMARKS:</b></h4>
					<textarea style = "resize:none;" name = "remarks" class = "form-control"></textarea>
				</div>
				<br />
				<div class = "form-inline">
					<label for = "pathologist">Pathologist</label>
					<input class = "form-control" type = "text" name = "pathologist"  />
					&nbsp;&nbsp;&nbsp;
					<label for = "medical_technoogist">Medical Technologist</label>
					<input class = "form-control" type = "text" name = "medical_technologist"  />
					<input type = "hidden" value = "<?php echo $f['itr_no'] ?>" name = "itr_no" />
					<input type = "hidden" value = "<?php echo $_SESSION['user_id'] ?>" name = "user_id" />
				</div>
				<br />
				<br />
				<div class = "form-inline">
					<button class = "btn btn-success" name = "save_f" ><span class = "glyphicon glyphicon-save"></span> SAVE</button>
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