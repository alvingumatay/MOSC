<?php

 $connect =  mysqli_connect("localhost","root","","hcpms");
 if(isset($_POST['submit'])){
 	$email = $_POST['email'];
 	$check_email=mysqli_query($connect,"SELECT * FROM itr WHERE email='".$email."'");
 	if(mysqli_num_rows($check_email)==1){
 		header('location:resetpass.php?email='.$email);
 	}else{
 		echo "<script>alert('Wrong Email.');
       </script>";
 	}
 }
?>
<html>
	<head>
		<title>MOSC Patient Record System</title>
		<meta charset = "utf-8" />
		<link rel = "shortcut icon" href = "../images/mosc-logo.png">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel = "stylesheet" type = "text/css" href = "../css/bootstrap.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/customize.css" />
		<link  rel="stylesheet" href="../font-awesome-4.7.0/css/font-awesome.css">
	</head>
	<body>
		<div class = "navbar navbar-default" style="background-color: #4CAF50;">
		<img src = "../images/mosc-logo.png" style = "float:left;" height = "55px" />
		<label class = "navbar-brand" style="font-size: 26px;">Marikina Orthopedic 
		<span style="color: #ffce14;">Specialty Clinic</span>
		<p class="logo_w3l_agile_caption">Best Orthopedic Clinic</p>
		</label>
		<br/> &nbsp;
        <a style="text-decoration: none; color:white; class="nav-link" href="../index.php"><i class="fa fa-home">&nbsp;</i>Home <span class="sr-only">(current)</span></a>
	   </div>

		<div id = "top" class = "login">
		<div class = "panel panel-info">
			
			<div class = "panel-heading">
				<center><h1 class = "panel-title">Verify UserName</h1></center>
			</div>
		<div class = "panel-body">	
		<form method="post">
		<div class = "form-group">	
		<input class = "form-control" type="text" id ="email" name="email" placeholder="Enter Email">
	    </div>
	    <div class = "form-group">
	    <button class = "btn btn-block btn-success"   name="submit">Check</button>
		</div>		
		</form>
	</div>
</div>
</div>
<div id = "footer">
		<label class = "footer-title">&copy; Copyright MOSC Patient Record System 2020</label>
	</div>
	</body>
</html>