<?php require_once 'logincheck.php'; ?>
<?php include 'edit_query.php'; ?>
<!DOCTYPE html>
<html lang = "eng">
	<head>
		<title>MOSC Patient Record System</title>
		<meta charset = "utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel = "shortcut icon" href = "../images/mosc-logo.png" />
		<link rel = "stylesheet" type = "text/css" href = "../css/bootstrap.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/jquery.dataTables.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/customize2.css" />
        <link rel="stylesheet" media="screen" href="../css/jquery-ui.css" />
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
	    <?php require 'script.php'?>
		</head>
<body>
	 <?php include('includes/header.php');?>
	<br />	<br />	<br />	<br />	<br /><br /><br />     
  <div class="ts-main-content">
		<br />
		<br />
		<br />
	 <div class = "panel panel-success">	
			<div class = "panel-heading">
				<label>PATIENT INFORMATION / EDIT</label>
				<a style = "float:right; margin-top:-4px;" href = "account.php" class = "btn btn-success"><span class = "glyphicon glyphicon-hand-right"></span> BACK</a>
			</div>
			<div class = "panel-body">
			<?php
				$conn = new mysqli("localhost","root","","hcpms") or die(mysqli_error());
				$q = $conn->query("SELECT * FROM `itr` WHERE `itr_no` = '$_GET[id]' && `lastname` = '$_GET[lastname]'") or die(mysqli_error());
				$f = $q->fetch_array();
			?>
				<form method = "POST" enctype = "multipart/form-data">
					<div style = "float:left;" class = "form-inline">
						<label for = "email">Email:</label>
						<input class = "form-control"  name = "email"  value="<?php echo $f['email']?>"required=
						"required"/> 
						 &nbsp;&nbsp;&nbsp;
						<label for = "password">Password:</label>
						<input type="password" class = "form-control" id="myInput" value="<?php echo $f['password']?>" name = "password" required=
						"required"/>
						&nbsp;&nbsp;&nbsp;
						<input type="checkbox" onclick="myFunction()">Show Password 
					</div>
					<br />
					<br />
					<br />
					<div class = "form-inline">
						<label for = "firstname">Firstname:</label>
						<input class = "form-control" name = "firstname" value = "<?php echo $f['firstname']?>" type = "text" required = "required">
						&nbsp;&nbsp;&nbsp;
						<label for = "middlename">Middle Name:</label>
						<input class = "form-control" name = "middlename" value = "<?php echo $f['middlename']?>" type = "text" required = "required">
						&nbsp;&nbsp;&nbsp;
						<label for = "lastname">Lastname:</label>
						<input class = "form-control" name = "lastname" value = "<?php echo $f['lastname']?>" type = "text" required = "required">
					</div>
					<br />
					<div class = "form-group">
						<label for = "birthdate" style = "float:left;">Birthdate:</label>
						 <br style = "clear:both;" />
                         <input type="text" class="form-control"    style = "width:20%;"  name="birthdate" value = "<?php echo $f['birthdate']?>" id="birthdate"> 
			             <br />
                         <label for = "age">Age:</label>
	                     <input  type="text" class="form-control"   style = "width:20%;" name = "age" id="age" value = "<?php echo $f['age']?>"  readonly/>
		                 <br style = "clear:both;"/>
						<br />
						<br />
						<label for = "address">Address:</label>
						<input class = "form-control" name = "address" type = "text" value = "<?php echo $f['address']?>" required = "required">
						<br />
						<label for = "contact">Mobile No.:</label>
						<input class = "form-control" style = "width:20%;" name = "contact" type = "text" value = "<?php echo $f['contact']?>" required = "required">
						<br />
				        <label for = "civil_status">Civil Status:</label>
						<input class = "form-control" style = "width:20%;" value = "<?php echo $f['civil_status']?>" name = "civil_status" type = "text" required = "required">
						<br />
						<label for = "gender">Gender:</label>
						<select style = "width:22%;" class = "form-control"  name = "gender" required = "required">
							<option value = "">--Please select an option--</option>
							<option value = "Male">Male</option>
							<option value = "Female">Female</option>
						</select>
					</div>
					<br />
					<br />
					<div class = "form-inline">
						<button class = "btn btn-warning" name = "edit_account"><span class = "glyphicon glyphicon-pencil"></span> SAVE</button>
					</div>
					
				</form>
			</div>	
		</div>	
	 
	</div>
	<div id = "footer">
		<label class = "footer-title">&copy; Copyright MOSC Patient Record System 2020</label>
	</div>
		
</body>
<script type="text/javascript" rel="stylesheet" src="../js/showhide.js"></script>	
<script src="../js/jquery-ui.js"></script>
 <script src="../js/jquery.js"></script>
		<script>
				$(function() {
				$( "#datepicker,#datepicker1,#datepicker2,#datepicker3" ).datepicker();
				});
		</script>
 <script type = "text/javascript">
        $(document).ready(function () {
            var age = "";
            $('#birthdate').datepicker({
                onSelect: function (value, ui) {
                    var today = new Date();
                    age = today.getFullYear() - ui.selectedYear;
                    $('#age').val(age);
                },
                changeMonth: true,
                changeYear: true
            })
        })
    </script>
    <script src="../js/js1/bootstrap-select.min.js"></script>
    <script src="../js/js1/bootstrap.min.js"></script>
     <script src="../js/js1/main.js"></script>
     <script type="text/javascript">
         $(document).ready(function () {          
          setTimeout(function() {
            $('.succWrap').slideUp("slow");
          }, 3000);
          });
  </script>	
</html>