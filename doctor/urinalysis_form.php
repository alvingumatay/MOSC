<?php
	ob_start();
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
				<center><label>URINALYSIS</label></center>
			</div>
		</div>
		
		<div class = "panel panel-default">
			<div class = "panel-heading">
				<label>URINALYSIS RESULT FORM</label>	
				<a style = "float:right; margin-top:-4px;" href = "urinalysis_record.php?itr_no=<?php echo $_GET['itr_no']?>&urinalysis_id=<?php echo $_GET['urinalysis_id']?>" class = "btn btn-success"><span class = "glyphicon glyphicon-hand-right"></span> BACK</a>

				<a style = "margin-right:5px; float:right; margin-top:-4px;" href = "urinalysis_print.php?itr_no=<?php echo $_GET['itr_no']?>&urinalysis_id=<?php echo $_GET['urinalysis_id']?>" class = "btn btn-success"><span class = "glyphicon glyphicon-print"></span> PRINT</a>
			</div>
			<form method = "POST" enctype = "multipart/form-data" action = "add_query.php">
			<?php
				$conn = new mysqli("sql312.byethost.com","b13_24703675","marikina12345","b13_24703675_hcpms") or die(mysqli_error());
				$q = $conn->query("SELECT * FROM `urinalysis` NATURAL JOIN `itr` WHERE `itr_no` = '$_GET[itr_no]' &&`urinalysis_id` = '$_GET[urinalysis_id]'") or die(mysqli_error());
				$f = $q->fetch_array();
			?>
			<div class = "panel-body">
				<div class = "form-inline">
					<div class = "alert alert-success">Basic Information</div>
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
					<div style = "width:40%; float:left;">
						<label style = "font-size:18px;">Address</label>
						<br />
						<label style = "font-size:18px;" class = "text-muted"><?php echo $f['address']?></label>				
					</div>
					<br style = "clear:both;"/>
				<hr style = "border:1px dotted #d3d3d3;" />
				<div class = "form-inline">
					<label style = "font-size:18px;">Date of Request:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['date_of_request']?></label>
				</div>
				<br />
				<h4 style = "color:#3C763D;"><b>PHYSICAL PROPERTIES</b></h4>
				<br />
				<div style = "float:left; width:20%;">	
					<label style = "font-size:18px;">Color:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['color']?></label>
				</div>
				<div style = "float:left; width:20%;">	
					<label style = "font-size:18px;">Transparency:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['transparency']?></label>
				</div>
				<div style = "float:left; width:20%;">	
					<label style = "font-size:18px;">Specific Gravity:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['specific_gravity']?></label>
				</div>
				<br />
				<br style = "clear:both;" />
				<h4 style = "color:#3C763D;"><b>CHEMICAL ANALYSIS</b></h4>
				<br />
				<div style = "float:left; width:20%;">	
					<label style = "font-size:18px;">Ph:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['ph']?></label>
				</div>
				<div style = "float:left; width:20%;">	
					<label style = "font-size:18px;">Sugar:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['sugar']?></label>
				</div>	
				<div style = "float:left; width:20%;">	
					<label style = "font-size:18px;">Protein:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['protein']?></label>
				</div>	
				<br />
				<br style = "clear:both;" />
				<div>
					<div style = "float:left; width:20%;">	
					<label style = "font-size:18px;">Pregnancy Test:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['pregnancy_test']?></label>
				</div>
				<br />
				<br style = "clear:both;" />
				<h4 style = "color:#3C763D;"><b>MICROSCOPE EXAMINATION</b></h4>
				<br />
				<div style = "float:left; width:20%;">	
					<label style = "font-size:18px;">Pus Cells:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['pus_cells']?></label>
				</div>
				<div style = "float:left; width:20%;">	
					<label style = "font-size:18px;">RBC:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['rbc']?></label>
				</div>
				<div style = "float:left; width:20%;">	
					<label style = "font-size:18px;">Cast:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['cast']?></label>
				</div>
				<br />
				<br style = "clear:both;"/>
				<h4 style = "color:#3C763D;"><b>CRYSTAL</b></h4>
				<br />
				<div style = "float:left; width:20%;">	
					<label style = "font-size:18px;">Urates:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['urates']?></label>
				</div>
				<div style = "float:left; width:20%;">	
					<label style = "font-size:18px;">Uric Acid:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['uric_acid']?></label>
				</div>
				<div style = "float:left; width:20%;">	
					<label style = "font-size:18px;">Cal Ox:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['cal_ox']?></label>
				</div>
				<br />
				<br style = "clear:both;"/>
				<h4 style = "color:#3C763D;"><b>OTHERS</b></h4>
				<br />
				<div style = "float:left; width:20%;">	
					<label style = "font-size:18px;">Epith Cells:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['epith_cells']?></label>
				</div>	
				<div style = "float:left; width:20%;">	
					<label style = "font-size:18px;">Mucus Threads:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['mucus_threads']?></label>
				</div>	
				<div style = "float:left; width:20%;">	
					<label style = "font-size:18px;">Others:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['others']?></label>
				</div>
				<br />
				<br style = "clear:both;"/>
				<br style = "clear:both;"/>
				<div style = "float:left; width:30%;">	
					<label style = "font-size:18px;">Pathologist:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['pathologist']?></label>
				</div>
				<div style = "float:left; width:30%;">	
					<label style = "font-size:18px;">Medical Technologist:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['medical_technologist']?></label>
				</div>
				<br />
				<br />
			</div>
			</form>
		</div>
		</div> 
	</div>
	<div id = "footer">
		<label class = "footer-title">&copy; Copyright MOSC Patient Record System 2019</label>
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