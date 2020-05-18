<div class="brand clearfix">
<div class = "navbar navbar-default navbar-fixed-top" style="background-color: #4CAF50;">
	<img src = "../images/mosc-logo.png" style = "float:left;" height = "55px" />
    <span class="menu-btn"><i class="fa fa-bars"></i></span>
		<label class = "navbar-brand" style="font-size: 26px;">Marikina Orthopedic 
		<span style="color: #ffce14;">Specialty Clinic</span>
		<p class="logo_w3l_agile_caption">Best Orthopedic Clinic</p>
		</label>
		
		<?php
            $conn = new mysqli("localhost","root","","hcpms") or die(mysqli_error());		
			$q = $conn->query("SELECT * FROM `secretary` WHERE `sec_id` = $_SESSION[sec_id]") or die(mysqli_error());
			$f = $q->fetch_array();
		?>
			<ul class="ts-profile-nav">
		<li class="ts-account">
           <a href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class = "glyphicon glyphicon-user"></span>
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