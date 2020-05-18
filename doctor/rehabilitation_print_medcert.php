<!DOCTYPE html>
<html>
<head>
	<style>
		@media print{
			@page{
				size:letter;
			}
		}
		#print{
			width:850px;
			height:1100px;
			margin:auto;
			border:2px solid #000;
		}
	</style>
</head> 
<body> 
	<?php
			$conn = new mysqli("localhost","root","","hcpms") or die(mysqli_error());
			$q = $conn->query("SELECT * FROM `rehabilitation` NATURAL JOIN `itr` WHERE `itr_no` = '$_GET[itr_no]' && `rehab_id` = '$_GET[rehab_id]'") or die(mysqli_error());
			$f = $q->fetch_array();
	?>		
<button onclick="printContent('print')">Print Content</button>
<button><a style = "text-decoration:none; color:#000;" href = "rehabilitation_form.php?itr_no=<?php echo $f['itr_no']?>&rehab_id=<?php echo $_GET['rehab_id']?>" class = "btn btn-info"><span class = "glyphicon glyphicon-print">Back</a></button>
<br />
<br />
	<div id="print">
		<div style = "margin:10px;">
		<!--	<img src = "images/logo.png" height = "100px" width = "100px" style = "float:left; margin-left:90px; margin-top:-15px;"/> -->
			<div style = "margin-right:0px;">
                 <br/>
                <img src = "../images/mosc-logo.png" style = "float:left; margin-top:-20px;" height = "100px" width = "100px">
				<label><center>MARIKINA ORTHOPEDIC SPECIALTY CLINIC</center></label>
				<label><center>www.facebook.com/marikinaorthopedic</center></label>
				<label><center>peteralbersyson@gmail.com</center></label>
                <label><center>Tel: 941-4888 / 942-4011</center></label>
			</div>
			<br />
			<hr style = "width:100&; border-top:5px solid #000;" />
			<br />
			<label>Name: 
				<?php 
					if(($f['lastname'] == "") && ($f['firstname'] == "")){
						echo "<u>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</u>";
					}else{
						echo "<b>".$f['lastname'].", ".$f['firstname']."</b>";
					}
				?>
            </label>
			<br />
            <label>Date Taken: 
				<?php 
				if($f['date'] == ""){
					echo "<b>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</b>";
				}else{
					echo "<b>".$f['date']."</b>";
				}
			?>
            </label>
			<br />
			<br />
			<br />
			<br />
			<label style = "font-weight:bold; letter-spacing: 2px;"><center>MEDICAL CERTIFICATE</center></label>
			<br />
			<br />
			<br />
			<br />
            <label style = "letter-spacing: 1px;">TO WHOM IT MAY CONCERN</label>
			<br />
			<br />
			<br />
			<br />
            <label style = "letter-spacing: 1px;">This is to certify that the above named patient was seen and
            <br />
             examined because of</label>
			<?php 
				if($f['diagnosis'] == ""){
					echo "<b>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</b>";
				}else{
					echo "<b>".$f['diagnosis']."</b>";
				}
			?>
            <br />
			<br />
			<br />
			<br />
            <label style = "letter-spacing: 1px;">Impression: 
            <br />
			<?php 
				if($f['type_of_disability'] == ""){
					echo "<b>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</b>";
				}else{
					echo "<b>".$f['type_of_disability']."</b>";
				}
			?>
            <br />
			<br />
			<br />
			<br />
            <label style = "letter-spacing: 1px;">Plan and Recommendation</label>
            <br />
			<?php 
				if($f['plan'] == ""){
					echo "<b>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</b>";
				}else{
					echo "<b>".$f['plan']."</b>";
				}
			?>
            <br />
			<br />
			<br />
			<br />
            <label style = "letter-spacing: 1px;">This certificate is being issued upon the request of the patient,
            <br />
             may not be used for MEDICO-LEGAL purpose.</label>
            <br />
			<br />
			<br />
			<br />
			<label style = " margin-bottom:0; float:right;">
			    <?php 
				if($f['medical_doctor'] == ""){
					echo "<b>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</b>";
				}else{
					echo "<b>".$f['medical_doctor']."</b>";
				}
			?>
                <br />
                <label><center>Medical Doctor</center></label>
            </label>
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