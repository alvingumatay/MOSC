<?php
  $connect = mysqli_connect("localhost","root","","hcpms");
  if(isset($_POST['submit'])){
  	$newpass = $_POST['newpass'];
  	$username = $_GET['username'];


  	$changepass=mysqli_query($connect,"UPDATE admin SET password='".$newpass."' WHERE username='".$username."'");
  	if($changepass){
  		echo "<script>alert('Successfully Changed Password.')</script>";
  		echo "<script>window.open('index.php','_self')</script>";
  		
  	}else{
      echo "<script>alert('Error.');
       </script>";
  	}	
  }
?>
<html>
	<head>
		<title>ResetPassword</title>
		<meta charset = "utf-8" />
		<link rel = "shortcut icon" href = "../images/mosc-logo.png">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel = "stylesheet" type = "text/css" href = "../css/bootstrap.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/customize.css" />
		<link  rel="stylesheet" href="../font-awesome-4.7.0/css/font-awesome.css">
		<style>img[alt="www.000webhost.com"]{display:none;}</style>
	</head>
	<body>
		<div class = "navbar navbar-default" style="background-color: #4CAF50;">
	   <img src = "../images/mosc-logo.png" style = "float:left;" height = "55px" />
		<label class = "navbar-brand" style="font-size: 26px;">Marikina Orthopedic 
		<span style="color: #ffce14;">Specialty Clinic</span>
		<p class="logo_w3l_agile_caption">Best Orthopedic Clinic</p>
		</label>
			<br/> &nbsp;
        <a style="text-decoration: none; color:white; class="nav-link" href="verification.php"><i class="fa fa-home">&nbsp;</i>Home <span class="sr-only">(current)</span></a>
	   </div>
	    <br/> <br/> <br/> <br/> <br/> <br/>
		<center>
  <div class="card mx-auto" style="width: 30rem;">
  <div class="card-body">
		<div class = "panel panel-success">
			<div class = "panel-heading">
				<center><h1 class = "panel-title">Change Password</h1></center>
			</div>
		<div class = "panel-body">	
		<form method="post">
		<div class = "form-group">				
		<input class="form-control" type="text"  name="newpass" placeholder="Enter new Pass">
		</div>
		<div class = "form-group">	
		<button class="btn btn-block btn-success" name="submit">Change</button>
		</div>
		</form>
	</div>
    </div>
   </div>
 </div>
	</body>
</html>