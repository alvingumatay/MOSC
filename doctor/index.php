<!DOCTYPE html>
<html lang = "eng">
	<head>
		<title>MOSC Patient Record System</title>
		<meta charset = "utf-8" />
		<link rel = "shortcut icon" href = "../images/mosc-logo.png">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel = "stylesheet" type = "text/css" href = "../css/bootstrap.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/customize.css" />
		<link  rel="stylesheet" href="../font-awesome-4.7.0/css/font-awesome.css">
	</head>
<body background="../images/bg1.jpg">
	<div class = "navbar navbar-default navtop" style=" background-color: #4CAF50;">
		<img src = "../images/mosc-logo.png" style = "float:left;" height = "55px" />
		<label class = "navbar-brand" style="font-size: 26px;">Marikina Orthopedic 
		<span style="color: #ffce14;">Specialty Clinic</span>
		<p class="logo_w3l_agile_caption">Best Orthopedic Clinic</p>
		</label>
	</div>
		
		<br/><br/><br/>
         <div id = "sidelogin" class="card mx-auto" style="width: 30rem;">
            <div class="card-body">
             <form action = "login.php" enctype = "multipart/form-data" method = "POST" >
				<label class = "lbllogin"><span class = "glyphicon glyphicon-plus"></span> Doctors Login</label>
				
				<br />
				<hr /style = "border:2px dotted #4CAF50;">
				<br />
				
				<div class = "form-group">
					<label for = "username">Username</label>
					<input class = "form-control" type = "text" name = "username"  required = "required"/>
				</div>
				<br />
				<div class = "form-group">
					<label for = "password">Password</label>
					<input class = "form-control" type = "password" name = "password" required = "required" />
				</div>
				
				<br />
				<br />
				
				<div class = "form-group">
					<button class  = "btn btn-success form-control" type = "submit" name = "login" ><span class = "glyphicon glyphicon-log-in"></span> Login</button>
				</div>
				<div class="card-footer"><a href="verification.php">Forget a Password ? </a></div>
			</form>
		</div>
        </div>
        
				
	<div id = "footer">
		<label class = "footer-title">&copy; Copyright MOSC Patient Record System 2020</label>
	</div>
</body>
<?php
	include("../admin/script.php");
?>
</html>