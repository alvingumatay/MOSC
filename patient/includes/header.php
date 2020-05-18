<div class="brand clearfix">
<div class = "navbar navbar-default navbar-fixed-top" style="background-color: #4CAF50;">
		<img src = "../images/mosc-logo.png" style = "float:left;" height = "55px" />
		<label class = "navbar-brand" style="font-size: 26px;">Marikina Orthopedic 
		<span style="color: #ffce14;">Specialty Clinic</span>
		<p class="logo_w3l_agile_caption">Best Orthopedic Clinic</p>
		</label>
		 <a href = "home.php"><label class = "navbar-brand"><i class = "glyphicon glyphicon-home"></i> Dashboard</label></a>
		 <ul class = "nav navbar-left">	
				<label class = "navbar-brand"><li class = "dropdown">
					<a class = "user dropdown-toggle" data-toggle = "dropdown" href = "#">
					<i class = "glyphicon glyphicon-calendar"> Appointment </i>
						
						<b class = "caret"></b>
					</a>
				<ul class = "dropdown-menu">
				       <li><a href = "appointment.php"><i class = "glyphicon glyphicon-paperclip"></i> Patient Appointment</a></li>
						<li><a href = "app_history.php"><i class = "glyphicon glyphicon-list"></i>  Appointment History </a></li>
                        <li><a href = "account.php"><i class = "glyphicon glyphicon-cog"></i> Account-Settings </a></li>
                        <li><a href = "logout.php"><i class = "glyphicon glyphicon-log-out"></i> Sign-out </a></li>
				</ul>
				</li>
				</label>
			</ul>
			 <ul class = "nav navbar-left">	
				<label class = "navbar-brand"><li class = "dropdown">
					<a class = "user dropdown-toggle" data-toggle = "dropdown" href = "#">
					<i class = "glyphicon glyphicon-folder-close"> Sections </i>
						
						<b class = "caret"></b>
					</a>
				 <?php
				$conn = new mysqli("localhost","root","","hcpms") or die(mysqli_error());
				$fq = $conn->query("SELECT COUNT(*) as total FROM `fecalisys` WHERE `itr_no` = '$_SESSION[itr_no]'") or die(mysqli_error());
				$ff = $fq->fetch_array();
				
				$cq = $conn->query("SELECT COUNT(*) as total FROM `rehabilitation` WHERE `itr_no` = '$_SESSION[itr_no]'") or die(mysqli_error());
				$cf = $cq->fetch_array();
				
				$xq = $conn->query("SELECT COUNT(*) as total FROM `radiological` WHERE `itr_no` = '$_SESSION[itr_no]'") or die(mysqli_error());
				$xf = $xq->fetch_array();
				
				$uq = $conn->query("SELECT COUNT(*) as total FROM `urinalysis` WHERE `itr_no` = '$_SESSION[itr_no]'") or die(mysqli_error());
				$uf = $uq->fetch_array();
				
				$hq = $conn->query("SELECT COUNT(*) as total FROM `hematology` WHERE `itr_no` = '$_SESSION[itr_no]'") or die(mysqli_error());
				$hf = $hq->fetch_array();

                $msq = $conn->query("SELECT COUNT(*) as total FROM `minor_surgery` WHERE `itr_no` = '$_SESSION[itr_no]'") or die(mysqli_error());
				$msf = $msq->fetch_array();

                $dq = $conn->query("SELECT COUNT(*) as total FROM `dislocation` WHERE `itr_no` = '$_SESSION[itr_no]'") or die(mysqli_error());
				$df = $dq->fetch_array();
			?>
				<ul class = "dropdown-menu">
		<li><a href = "consultation_record.php"><i class = "glyphicon glyphicon-folder-open"></i>&nbsp; Consultation &nbsp;<span class = "badge"><?php echo $cf['total']?></span></a></li>    
			<li><a href = "xray_record.php"><i class = "glyphicon glyphicon-folder-open"></i>&nbsp; Xray &nbsp;<span class = "badge"><?php echo $xf['total']?></span></a></li>
            <li><a href = "fecalysis_record.php"><i class = "glyphicon glyphicon-folder-open"></i>&nbsp; Fecalysis &nbsp;<span class = "badge"><?php echo $ff['total']?></span></a></li>
            <li><a href = "urinalysis_record.php"><i class = "glyphicon glyphicon-folder-open"></i>&nbsp; Urinalysis &nbsp;<span class = "badge"><?php echo $uf['total']?></span></a></li>
            <li><a href = "hematology_record.php"><i class = "glyphicon glyphicon-folder-open"></i>&nbsp; Hematology &nbsp;<span class = "badge"><?php echo $hf['total']?></span></a></li> 
             <li><a href = "minor_surgery_record.php"><i class = "glyphicon glyphicon-folder-open"></i>&nbsp; Minor Surgery &nbsp;<span class = "badge"><?php echo $msf['total']?></span></a></li> 
            <li><a href = "dislocation_record.php"><i class = "glyphicon glyphicon-folder-open"></i>&nbsp; Dislocation &nbsp;<span class = "badge"><?php echo $df['total']?></span></a></li> 
                 </ul>
				</li>
				</label>
			</ul>
		   <?php
				$conn = new mysqli("localhost","root","","hcpms") or die(mysqli_error());
				$q = $conn->query("SELECT * FROM `itr` WHERE `itr_no` = '$_SESSION[itr_no]'") or die(mysqli_error());
				$f = $q->fetch_array();
			?>
	<ul class="ts-profile-nav">
		<li class="ts-account">
           <a href="#"><span class = "glyphicon glyphicon-user"></span>
            <?php 
              echo $f['firstname']." ".$f['lastname'];
            ?><i class="fa fa-angle-down hidden-side"></i></a>
				<ul>
					<li><a href = "account.php?id=<?php echo $f['itr_no']?>&lastname=<?php echo $f['lastname']?>">Change Password</a></li>
					<li><a href="logout.php">Logout</a></li>
				</ul>
			</li>
		</ul>
	</div>
	</div>