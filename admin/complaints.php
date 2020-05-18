<?php
	ob_start();
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
    <br/> <br/> <br/> 
  <div class="ts-main-content">
  <?php include('includes/leftbar.php');?>
  <div class="content-wrapper">
  <div class="container-fluid">
  <div class="row">
<div style = "display:none;" id = "com" class = "panel panel-success">	
			<div class = "panel-heading">
				<label>PATIENT / PROCESS</label>
				<button class = "btn-sm btn-danger" id = "hide_com" style = "float:right; margin-top:-5px;"><span class = "glyphicon glyphicon-remove"></span>CLOSE</button>
			</div>
			<div class = "panel-body">
			<?php
				$conn = new mysqli("localhost","root","","hcpms") or die(mysqli_error());
				$q = $conn->query("SELECT * FROM `itr` WHERE `itr_no` = '$_GET[id]' && `lastname` = '$_GET[lastname]'") or die(mysqli_error());
				$f = $q->fetch_array();
			?>
				<form method = "POST" enctype = "multipart/form-data">
					<div style = "float:left;" class = "form-inline">
						<label for = "itr_no">Patient No:</label>
						<input class = "form-control" value = "<?php echo $f['itr_no'] ?>" disabled = "disabled" size = "3" type = "text" name = "itr_no">
					</div>
					<br />
					<br />
					<br />
					<div class = "form-inline">
						<label for = "firstname">Firstname:</label>
						<input class = "form-control" name = "firstname" value = "<?php echo $f['firstname']?>" disabled = "disabled" type = "text" required = "required">
						&nbsp;&nbsp;&nbsp;
						<label for = "middlename">Middle Name:</label>
						<input class = "form-control" name = "middlename" value = "<?php echo $f['middlename']?>" disabled = "disabled" type = "text" required = "required">
						&nbsp;&nbsp;&nbsp;
						<label for = "lastname">Lastname:</label>
						<input class = "form-control" name = "lastname" value = "<?php echo $f['lastname']?>" disabled = "disabled" type = "text" required = "required">
					</div>
					<br />
					<div class = "form-group">
						<label>Complaints:</label>
						<textarea style = "resize:none;" name = "complaints" class = "form-control"></textarea>
						<br />
						<label>Remarks:</label>
						<textarea style = "resize:none;" name = "remarks" class = "form-control"></textarea>
						<br />
						<label>Section:</label>
						<select name = "section" class = "form-control" required = "required">
						        <option value = "Rehabilitation">Consultation</option>
								<option value = "Xray">Xray</option>
								<option value = "Fecalysis">Fecalysis</option>
								<option value = "Urinalysis">Urinalysis</option>
								<option value = "Hematology">Hematology</option>
                                <option value = "MinorSurgery">Minor Surgery</option>
                                <option value = "Dislocation">Dislocation</option>
						</select>
					</div>
					<br />
					<div class = "form-inline">
						<button class = "btn btn-success" name = "save_complaints"><span class = "glyphicon glyphicon-save"></span> SAVE</button>
					</div>
					
				</form>
			</div>	
				<?php include 'add_complaints.php'; ?>
		</div>	
	
		<?php
			$conn = new mysqli("localhost","root","","hcpms") or die(mysqli_error());
			$query = $conn->query("SELECT * FROM `itr` WHERE `itr_no` = '$_GET[id]' && `lastname` = '$_GET[lastname]'") or die(mysqli_error());
			$fetch = $query->fetch_array();
		?>
		<div class = "panel panel-success">
			<div class = "panel-heading">
				<label style = "font-size:16px;">PROCESS / <?php echo $fetch['firstname']." ".$fetch['lastname']?></label>
				<a style = "float:right; margin-top:-5px;" id = "add_complaints" class = "btn-sm btn-info" href = "patient.php"><span class = "glyphicon glyphicon-hand-right"></span> BACK</a>
			</div>
		</div>
		<button class = "btn btn-success" id = "show_com"><i class = "glyphicon glyphicon-plus">ADD</i></button>
		<div class = "panel-body">
			<?php
				$q1 = $conn->query("SELECT * FROM `itr` WHERE `itr_no` = '$_GET[id]'") or die(mysqli_error());
				$f1 = $q1->fetch_array();
				$q = $conn->query("SELECT * FROM `complaints` WHERE `itr_no` = '$_GET[id]' ORDER BY `status` DESC") or die(mysqli_error());	
					while($f = $q->fetch_array()){
						if($f['status'] == "Done"){
							echo "<label style = 'color:#4CAF50;'>".$f['section']."</label>"."<textarea  style = 'resize:none;' disabled = 'disabled' class = 'form-control'>".$f['remark']."</textarea>".$f['date']."<label style = 'float:right; color:red;'>Done</label><br /><br /><hr style = 'border:1px solid #eee;' />";
						}
						if($f['status'] == "Pending"){
							echo "<label style = 'color:#4CAF50;'>".$f['section']."</label>"."<textarea  style = 'resize:none;' disabled = 'disabled' class = 'form-control'>".$f['remark']."</textarea>".$f['date']."<br /><br /><hr style = 'border:1px solid #eee;' />";
						}
					}
				?>
		</div>
	</div>
    </div>
    </div>
    </div>
	<div id = "footer">
		<label class = "footer-title">&copy; Copyright MOSC Patient Record System 2020</label>
	</div>
<?php include("script.php"); ?>
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