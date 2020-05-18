<?php

 $connect =  mysqli_connect("localhost","root","","hcpms");
 if(isset($_POST['submit'])){
 	$username = $_POST['username'];
 	$check_username=mysqli_query($connect,"SELECT * FROM secretary WHERE username='".$username."'");
 	if(mysqli_num_rows($check_username)==1){
 		header('location:resetpass.php?username='.$username);
 	}else{
 		echo "<script>alert('Wrong UserName.');
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
	</head>
	<body>
		<div class = "navbar navbar-default" style="background-color: #4CAF50;">
	    <img src = "../images/mosc-logo.png" style = "float:left;" height = "55px" />
		<label class = "navbar-brand" style="font-size: 26px;">Marikina Orthopedic 
		<span style="color: #ffce14;">Specialty Clinic</span>
		<p class="logo_w3l_agile_caption">Best Orthopedic Clinic</p>
		</label>
		<br/> &nbsp;
        <a style="text-decoration: none; color:white; class="nav-link" href="index.php"><i class="fa fa-home">&nbsp;</i>Home <span class="sr-only">(current)</span></a>
	   </div>
<br/><br/><br/><br/>
<div class="ts-main-content">
<br><br><br>
  <center>
  <div class="card mx-auto" style="width: 26rem;">
  <div class="card-body">
		<div class = "panel panel-danger">
			
			<div class = "panel-heading">
				<center><h1 class = "panel-title">Verify UserName</h1></center>
			</div>
		<div class = "panel-body">	
		<form method="post">
		<div class = "form-group">	
		<input class = "form-control" type="text"  name="username" placeholder="Enter UserName">
	    </div>
	    <div class = "form-group">
	    <button class = "btn btn-block btn-success"   name="submit">Check</button>
		</div>		
		</form>
	</div>
</div>
</div>
</div>
  </center>
  </div>
<div id = "footer">
		<label class = "footer-title">&copy; Copyright MOSC Patient Record System 2020</label>
	</div>
	</body>
    <!-- Loading Scripts -->
  <script src="../js/js1/jquery.min.js"></script>
  <script src="../js/js1/bootstrap-select.min.js"></script>
  <script src="../js/js1/bootstrap.min.js"></script>
  <script src="../js/js1/jquery.dataTables.min.js"></script>
  <script src="../js/js1/dataTables.bootstrap.min.js"></script>
  <script src="../js/js1/Chart.min.js"></script>
  <script src="../js/js1/fileinput.js"></script>
  <script src="../js/js1/chartData.js"></script>
  <script src="../js/js1/main.js"></script>
  <script type="text/javascript">
         $(document).ready(function () {          
          setTimeout(function() {
            $('.succWrap').slideUp("slow");
          }, 3000);
          });
  </script>
</html>