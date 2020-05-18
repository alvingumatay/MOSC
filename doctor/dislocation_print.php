<!DOCTYPE html>
<html>
<head>
	<style>
	@media print {  
		@page {
			size:letter;
		}
}
		#print{
			width:850px;
			height:850px;
			overflow:hidden;
			margin:auto;
			border:2px solid #000;
		}
	</style>
</head> 
<body> 
	<?php
			$conn = new mysqli("localhost","root","","hcpms") or die(mysqli_error());
			$q = $conn->query("SELECT * FROM `dislocation` NATURAL JOIN `itr` WHERE `itr_no` = '$_GET[itr_no]' && `dislocation_id` = '$_GET[dislocation_id]'") or die(mysqli_error());
			$f = $q->fetch_array();
	?>		
<button onclick="printContent('print')">Print Content</button>
<button><a style = "text-decoration:none; color:#000;" href = "dislocation_form.php?itr_no=<?php echo $f['itr_no']?>&dislocation_id=<?php echo $_GET['dislocation_id']?>" class = "btn btn-info"><span class = "glyphicon glyphicon-print">Back</a></button>
<br />
<br />
	<div id="print">
		<div style = "margin:10px;">
			<img src = "../images/mosc-logo.png" height = "100px" width = "100px" style = "float:left; position:relative; left:10%;" />
			<div style = "">
                <br/>
                <label><center><b style="letter-spacing: 2px;">MARIKINA ORTHOPEDIC SPECIALTY CLINIC</b></center></label>
				<label><center><i style="letter-spacing: 1px;">"The Best Orthopedic Clinic"</i></center></label>
				<label><center style = "font-size: 18px;">Lungsod ng Marikina</center></label>
				<center><label style = "font-size:12px;">2 E. Manalo Avenue, 1800 Marikina City</label></center>
				
			</div>
			<br style = "clear:both;" />
			<br />
			<label><center><b>MINOR SURGERY AND DISLOCATION CENTER</b></center></label>
			<label style = "font-size:14px;"><center>Center Based and Community Based Rehabilitation Program</center></label>
			<br />
			<label>NAME: <?php echo $f['firstname']." ".$f['lastname']?>
			<label style = "margin-right:48%; float:right;">DIAGNOSIS: <?php echo $f['diagnosis']?></label></label>
			<br />
			<label>AGE: <?php echo $f['age']?>
			<label style = "margin-right:40%; float:right;">TYPE OF DISABILITY: <?php echo $f['diagnosis']?></label></label>
			<br />
			<label>GENDER: <?php echo $f['gender']?></label>
			<br/>
			<label>ADDRESS: <?php echo $f['address']?></label>
			<br />
			<label>DATE OF BIRTH: <?php echo $f['birthdate']?></label>
			<br />
			<br />
			<label>Temp: <u><?php 
			$t = substr($f['TEMP'], 0, 2);
			echo $t; ?></u>&deg;C</label>
			<label>Pulse: <u>&nbsp;<?php echo $f['PR']?>&nbsp;</u></label>
			<label>RR: <u>&nbsp;<?php echo $f['RR']?>&nbsp;</u></label>
			<br />
			<label>BP: <u>&nbsp;<?php echo $f['BP']?>&nbsp;</u></label>
			<br />
			<br />
			<label><center><u><b>DISLOCATION NOTES</b></u></center></label>
			<br />
			<br />
			<label><b>Initial Evaluation</b></label>
			<br />
			<br />
			<label><b>Assessment:</b></label>
			<br />
			<label style = "word-wrap:break-word;"><?php echo $f['assessment']?></label>
			<br />
			<br />
			<label><b>Plan:</b></label>
			<br />
			<label style = "word-wrap:break-word;"><?php echo $f['plan']?></label>
            <br/>
            <label style="float:right;"><b>Medical Doctor</b></label>
			<br />
			<label style = "float:right;"><?php echo $f['medical_doctor']?></label>
		</div>
	</div>
<script>
function printContent(el){
	var restorepage = document.body.innerHTML;
	var printcontent = document.getElementById(el).innerHTML;
	document.body.innerHTML = printcontent;
	window.print();
	document.body.innerHTML = restorepage;
}
</script>
</html>