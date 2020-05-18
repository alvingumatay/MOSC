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
	</head>
<body>
<?php include('includes/header1.php');?>
<div class="ts-main-content">
<br><br><br>
  <center>
  <div class="card mx-auto" style="width: 26rem;">
  <div class="card-body">
   <div class = "panel panel-success">
			
			<div class = "panel-heading">
				<center><h1 class = "panel-title">Administrator</h1></center>
			</div>

			<div class = "panel-body">
				<form enctype = "multipart/form-data" action = "login.php" role = "form" method = "POST">
					<div class = "form-group">
						<label for = "username">Username</label>
						<input class = "form-control" name = "username" placeholder = "Username" type = "text" required = "required" >
					</div>
					<div class = "form-group">
						<label for = "password">Password</label>
						<input class = "form-control" name = "password" placeholder = "Password" type = "password" required = "required" >
					</div>
					<div class = "form-group">
						<button class = "btn btn-block btn-success"  name = "login"><span class = "glyphicon glyphicon-log-in"></span> Login</button>
					</div>
				</form>
				<div class="card-footer"><a href="verification.php">Forget a Password ? </a></div>
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

<?php
	include("script.php");
?>
<script type = "text/javascript" src="../js/forward.js"></script>
</html>