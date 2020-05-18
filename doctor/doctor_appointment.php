<?php
	require_once 'logincheck.php';
	$date = date("Y", strtotime("+ 8 HOURS"));
	$conn = new mysqli("localhost","root","","hcpms") or die(mysqli_error());
	
	$qxray = $conn->query("SELECT COUNT(*) as total FROM `radiological` WHERE `year` = '$date' GROUP BY `itr_no`") or die(mysqli_error());
	$fxray = $qxray->fetch_array();


	$qfecalysis = $conn->query("SELECT COUNT(*) as total FROM `fecalisys` WHERE `year` = '$date' GROUP BY `itr_no`") or die(mysqli_error());
	$ffecalysis = $qfecalysis->fetch_array();
	
	$qurinalysis = $conn->query("SELECT COUNT(*) as total FROM `urinalysis` WHERE `year` = '$date' GROUP BY `itr_no`") or die(mysqli_error());
	$furinalysis = $qurinalysis->fetch_array();

	$qhematology = $conn->query("SELECT COUNT(*) as total FROM `hematology` WHERE `year` = '$date' GROUP BY `itr_no`") or die(mysqli_error());
	$fhematology = $qhematology->fetch_array();

	

	$qrehab = $conn->query("SELECT COUNT(*) as total FROM `rehabilitation` WHERE `year` = '$date' GROUP BY `itr_no`") or die(mysqli_error());
	$frehab = $qrehab->fetch_array();
   
    $qmsurgery = $conn->query("SELECT COUNT(*) as total FROM `minor_surgery` WHERE `year` = '$date' GROUP BY `itr_no`") or die(mysqli_error());
	$fmsurgery = $qmsurgery->fetch_array();

    $qdislocation = $conn->query("SELECT COUNT(*) as total FROM `dislocation` WHERE `year` = '$date' GROUP BY `itr_no`") or die(mysqli_error());
	$fdislocation = $qdislocation->fetch_array();

	/* $qmaternity = $conn->query("SELECT COUNT(*) as total FROM `birthing` `prenatal` WHERE `year` = '$date' GROUP BY `itr_no`") or die(mysqli_error());
	$fmaternity = $qmaternity->fetch_array();
	
	$qdental = $conn->query("SELECT COUNT(*) as total FROM `dental` WHERE `year` = '$date' GROUP BY `itr_no`") or die(mysqli_error());
	$fdental = $qdental->fetch_array();
	
	$qsputum = $conn->query("SELECT COUNT(*) as total FROM `sputum` WHERE `year` = '$date' GROUP BY `itr_no`") or die(mysqli_error());
	$fsputum = $qsputum->fetch_array();
	
	*/
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
        <link  rel="stylesheet" href="../font-awesome-4.7.0/css/font-awesome.css">
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
			window.onload = function() { 
				$("#chartContainer").CanvasJSChart({ 
					title: { 
						text: "Total Patient Population <?php echo $date?>",
						fontSize: 24
					}, 
					axisY: { 
						title: "asda" 
					}, 
					legend :{ 
						verticalAlign: "center", 
						horizontalAlign: "left" 
					}, 
					data: [ 
					{ 
						type: "pie", 
						showInLegend: true, 
						toolTipContent: "{label} <br/> {y}", 
						indexLabel: "{y}", 
						dataPoints: [ 
							
							{ label: "Xray",  y: 
								<?php 
									if($fxray == ""){
										echo 0;
									}else{
										echo $fxray['total'];
									}	
								?>, legendText: "Xray"},

							{ label: "Fecalysis",  y: 
								<?php 
									if($ffecalysis == ""){
											echo 0;
									}else{
										echo $ffecalysis['total'];
									}
								?>, legendText: "Fecalysis"}, 
							
							{ label: "Urinalysis",  y: 
								<?php 
									if($furinalysis == ""){
										echo 0;
									}else{
										echo $furinalysis['total'];
									}	
								?>, legendText: "Urinalysis"},

							{ label: "Hematology",  y: 
								<?php 
									if($fhematology == ""){
										echo 0;
									}else{
										echo $fhematology['total'];
									}	
								?>, legendText: "Hematology"},
							
								
							
							{ label: "Consultation",  y: 
								<?php
									if($frehab == ""){
										echo 0;
									}else{
										echo $frehab['total'];
									}	
								?>, legendText: "Consultation"},


                                	{ label: "Minor Surgery",  y: 
								<?php
									if($fmsurgery == ""){
										echo 0;
									}else{
										echo $fmsurgery['total'];
									}	
								?>, legendText: "Minor Surgery"},


                                	{ label: "Dislocation",  y: 
								<?php
									if($fdislocation == ""){
										echo 0;
									}else{
										echo $fdislocation['total'];
									}	
								?>, legendText: "Dislocation"},

							/* { label: "Maternity",  y: 
								<?php 
									if($fmaternity == ""){
										echo 0;
									}else{
										echo $fmaternity['total'];
									}	
								?>, legendText: "Maternity"},	
							
							{ label: "Dental",  y: 
								<?php 
									if($fdental == ""){
										echo 0;
									}else{
									echo $fdental['total'];
									}
								?>, legendText: "Dental"},
							
							{ label: "Sputum",  y: 
								<?php
									if($fsputum == ""){
										echo 0;
									}else{
										echo $fsputum['total'];
									}	
								?>, legendText: "Sputum"} */
							
							
						] 
					} 
					] 
				}); 
			} 
		</script>
	</head>
<body>

<?php include('includes/header.php');?>
<br /><br /><br /><br /><br />
  <div class="ts-main-content">
  <?php include('includes/leftbar.php');?>
  <div class="content-wrapper">
  <div class="container-fluid">
  <div class="row">
		<div class = "panel panel-success">
			<div class = "panel-heading">
				<center><label>D A S H B O A R D</label></center>
			</div>
			<div class = "panel-body">
				<div class="dash">
			     <center>
					<a href="rehabilitation.php" style="pointer-events: unset;">
						<label style="background-color: dodgerblue; cursor: pointer;"><i class="glyphicon glyphicon-plus"></i>
							
							<?php 
	
								$qconsult = $conn->query("SELECT COUNT(rehab_id) AS total FROM `rehabilitation`") or die(mysqli_error());
								$fconsult = $qconsult->fetch_array();
								$num_rows = $fconsult['total'];
					
								echo $num_rows;
							?>
							
						<span style="font-size: 13px;">
								Consultation
							</span>
							<p  style="font-size: 17px;">Full Detail &nbsp; <i class="glyphicon  glyphicon-arrow-right" style="font-size:18px;"></i></p>
						</label>
						</label>
					</a>
					
					<a href="minor_surgery.php">
						<label style="background-color: dodgerblue; cursor: pointer;"><i class="glyphicon glyphicon-plus"></i>
							<?php 
			
								$qmsurgery = $conn->query("SELECT COUNT(surgery_id) AS total FROM `minor_surgery`") or die(mysqli_error());
								$fmsurgery = $qmsurgery->fetch_array();
								$num_rows = $fmsurgery['total'];
					
								echo $num_rows;
							?>
				
							<span style="font-size: 13px;">
								 Minor Surgery
							</span>
							<p  style="font-size: 17px;">Full Detail &nbsp; <i class="glyphicon  glyphicon-arrow-right" style="font-size:18px;"></i></p>
						</label>
						</label>
					</a>

                        <a href="dislocation.php">
						<label style="background-color: dodgerblue; cursor: pointer;"><i class="glyphicon glyphicon-plus"></i>
							<?php 
	
								$qdislocation = $conn->query("SELECT COUNT(dislocation_id) AS total FROM `dislocation`") or die(mysqli_error());
								$fdislocation = $qdislocation->fetch_array();
								$num_rows = $fdislocation['total'];
					
								echo $num_rows;
							?>
							
							<span style="font-size: 13px;">
								 Dislocation
							</span>
							<p  style="font-size: 17px;">Full Detail &nbsp; <i class="glyphicon  glyphicon-arrow-right" style="font-size:18px;"></i></p>
						</label>
						</a>
                        </center>
                    </div>
			</div>
		</div>

	    
		<div class = "well">
			<div id="chartContainer" style="width: 100%; height: 400px"></div> 
		</div>
		<hr />
      
      		<div class = "panel panel-success">
			<div class = "panel-heading">
				<center><label>M O N T H L Y&emsp;&emsp;I N C O M E</label></center>
			</div>
			<div class = "panel-body">
				<div class="dash">

					  	<center><label><i class="fa fa-rouble"></i>
								<?php 

								$date = date("M", strtotime("+ 8 HOURS"));
			
								$qprice = $conn->query("SELECT SUM(price) AS total FROM `radiological` WHERE `month` = '$date'") or die(mysqli_error());
								$fprice = $qprice->fetch_array();
								$num_rows = $fprice['total'];

								if ($num_rows=="") {
									echo "0";
								} else {
								echo $num_rows;
								}
							
							?>
						
							<span style="font-size: 13px;">
								 XRAY 
							</span>
						</label>
					
				
						<label><i class="fa fa-rouble"></i>
							<?php 

								$date = date("M", strtotime("+ 8 HOURS"));
			
								$qprice = $conn->query("SELECT SUM(price) AS total FROM `fecalisys` WHERE `month` = '$date'") or die(mysqli_error());
								$fprice = $qprice->fetch_array();
								$num_rows = $fprice['total'];
					
								echo $num_rows;
							?>
					
							<span style="font-size: 13px;">
								 FECALYSIS 
							</span>
						</label>
					
						<label><i class="fa fa-rouble"></i>
							<?php 

								$date = date("M", strtotime("+ 8 HOURS"));
			
								$qprice = $conn->query("SELECT SUM(price) AS total FROM `urinalysis` WHERE `month` = '$date'") or die(mysqli_error());
								$fprice = $qprice->fetch_array();
								$num_rows = $fprice['total'];
					
								echo $num_rows;
							?>
					
							<span style="font-size: 13px;">
								 URANALYSIS 
							</span>
						</label>
                        </center>
					     <center>
                         <label><i class="fa fa-rouble"></i>
							<?php 

								$date = date("M", strtotime("+ 8 HOURS"));
			
								$qprice = $conn->query("SELECT SUM(price) AS total FROM `hematology` WHERE `month` = '$date'") or die(mysqli_error());
								$fprice = $qprice->fetch_array();
								$num_rows = $fprice['total'];
					
								echo $num_rows;
							?>
		
						
							<span style="font-size: 13px;">
								 HEMATOLOGY 
							</span>

						</label>
						
						
							<label><i class="fa fa-rouble"></i>
								<?php 

								$date = date("M", strtotime("+ 8 HOURS"));
			
								$qprice = $conn->query("SELECT SUM(price) AS total FROM `rehabilitation` WHERE `month` = '$date'") or die(mysqli_error());
								$fprice = $qprice->fetch_array();
								$num_rows = $fprice['total'];

								if ($num_rows=="") {
									echo "0";
								} else {
								echo $num_rows;
								}
							
							?>
						
							<span style="font-size: 13px;">
								 CONSULTATION
							</span>
						</label>
      
                        <label><i class="fa fa-rouble"></i>
								<?php 

								$date = date("M", strtotime("+ 8 HOURS"));
			
								$qprice = $conn->query("SELECT SUM(price) AS total FROM `minor_surgery` WHERE `month` = '$date'") or die(mysqli_error());
								$fprice = $qprice->fetch_array();
								$num_rows = $fprice['total'];

								if ($num_rows=="") {
									echo "0";
								} else {
								echo $num_rows;
								}
							
							?>
						
							<span style="font-size: 13px;">
								MINOR SURGERY
							</span>
						</label>
                           </center>
                         <center><label><i class="fa fa-rouble"></i>
								<?php 

								$date = date("M", strtotime("+ 8 HOURS"));
			
								$qprice = $conn->query("SELECT SUM(price) AS total FROM `dislocation` WHERE `month` = '$date'") or die(mysqli_error());
								$fprice = $qprice->fetch_array();
								$num_rows = $fprice['total'];

								if ($num_rows=="") {
									echo "0";
								} else {
								echo $num_rows;
								}
							
							?>
						
							<span style="font-size: 13px;">
								DISLOCATION
							</span>
						</label>
                        </center>
						
					</div>
				</div>
			</div>
             
	</div>
    </div>
    </div>
    </div>
	<div id = "footer">
		<label class = "footer-title">&copy; Copyright MOSC Patient Record System 2020</label>
	</div>
</body>
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
</html>