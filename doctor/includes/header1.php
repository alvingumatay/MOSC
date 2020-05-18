<link href="../font-awesome-4.7.0/css/font-awesome.css" rel="stylesheet"> 
<div class="brand clearfix">
<div class = "navbar navbar-default navbar-fixed-top" style="background-color: #4CAF50">
		<img src = "../images/mosc-logo.png" style = "float:left;" height = "55px" />
		<span class="menu-btn"><i class="fa fa-bars"></i></span>
		<label class = "navbar-brand" style="font-size: 26px;">Marikina Orthopedic 
		<span style="color: #ffce14;">Specialty Clinic</span>
		<p class="logo_w3l_agile_caption">Best Orthopedic Clinic</p>
		</label>
        <a type="button" style="position:relative; margin-top:8px; margin-left:440px;" class="btn btn-warning" target="_blank" href="http://localhost/MOSC/doctor/queuing/home.php?link=home"><i class="fa fa-external-link"></i></a>    
		
		<?php 
            $conn = new mysqli("localhost","root","","hcpms") or die(mysqli_error());
			$q = $conn->query("SELECT * FROM `user` WHERE `user_id` = $_SESSION[user_id]") or die(mysqli_error());
			$f = $q->fetch_array();
		?>
		<ul class="ts-profile-nav">
		<li class="ts-account">
           <a href="#"><span class = "glyphicon glyphicon-user"></span>
            <?php 
              echo $f['firstname']." ".$f['lastname'];
            ?><i class="fa fa-angle-down hidden-side"></i></a>
				<ul>
				   <li><a href="logout.php">Logout</a></li>
				</ul>
			</li>
		</ul>
	</div>
	</div>