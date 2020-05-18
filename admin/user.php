<?php
	ob_start();
	require_once 'logincheck.php';
?>
<!DOCTYPE html>
<html lang = "eng">
	<head>
		<title>MOSC Patient Record System</title>
		<meta charset = "utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel = "shortcut icon" href = "../images/mosc-logo.png" />
		<link rel = "stylesheet" type = "text/css" href = "../css/bootstrap.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/jquery.dataTables.css" />
		<link href="../font-awesome-4.7.0/css/font-awesome.css" rel="stylesheet"> 
		<link rel = "stylesheet" type = "text/css" href = "../css/customize.css" />
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
  <?php include('includes/header.php');?>
  <br/><br/><br/><br/><br/>
  <div class="ts-main-content">
  <?php include('includes/leftbar.php');?>
  <div class="content-wrapper">
  <div class="container-fluid">
  <div class="row">
   <center><p>Touch Screen left,right,up,down to see details.</p></center>
		<div id = "add" class = "panel panel-success">	
			<div class = "panel-heading">
				<label>ADD DOCTOR</label>
				<button id = "hide" class = "btn btn-sm btn-danger" style = "float:right; margin-top:-5px;"><span class = "glyphicon glyphicon-remove"></span> CLOSE</button>
			</div>
			<div class = "panel-body">
				<form id = "form_user" method = "POST" enctype = "multi-part/form-data">
					<div class = "panel panel-default" style = "width:60%; margin:auto;">
					<div class = "panel-heading">
					</div>
					<div class = "panel-body">
						<div class = "form-group">
							<label for = "username">Username: </label>
							<input class = "form-control" name = "username" type = "text" required = "required">
						</div>
						<div class = "form-group">	
							<label for = "password">Password: </label>
							<input class = "form-control" name = "password" maxlength = "12" type = "password" required = "required">
						</div>
						<div class = "form-group">
							<label for = "firstname">Firstname: </label>
							<input class = "form-control" type = "text" name = "firstname" required = "required">
						</div>
						<div class = "form-group">
							<label for = "middlename">Middlename: </label>
							<input class = "form-control" type = "text" name = "middlename" placeholder = "(Optional)">
						</div>
						<div class = "form-group">
							<label for = "lastname">Lastname: </label>
							<input class = "form-control" type = "text" name = "lastname" required = "required">
						</div>
						<div class = "form-group">
							<label for = "section">Section: </label>
							<select name = "section" class = "form-control" required = "required">
								<option value = "">--Please select an option--</option>
								<option value = "Xray">Xray</option>
								<option value = "Fecalysis">Fecalysis</option>
								<option value = "Urinalysis">Urinalysis</option>
								<option value = "Hematology">Hematology</option>
                                <option value = "DoctorApp">Appointments</option>
                                 
							</select>
						</div>
							<button class = "btn btn-success" name = "save_user" ><span class = "glyphicon glyphicon-save"></span> SAVE</button>
							<br />
							<?php include 'add_user.php'; ?>
					</div>	
					
					</div>
				</form>			
			</div>	
		</div>	
		<div class = "panel panel-success">
			<div class = "panel-heading">
				<label>ACCOUNTS / DOCTOR</Label>
			</div>
			<div class = "panel-body">
				<button id = "show" class = "btn btn-success"><span class  = "glyphicon glyphicon-plus"></span> ADD</button>
				<br />
				<br />
                <div class="table-responsive">
				<table id = "table" class = "display" width = "100%" cellspacing = "0">
					<thead>
						<tr>
							<th>Username</th>
							<th>Password</th>
							<th>Name</th>
							<th>Section</th>
							<th><center>Action</center></th>
						</tr>
					</thead>
					<tbody>
					<?php
						$conn = new mysqli("localhost","root","","hcpms") or die(mysqli_error());
						$query = $conn->query("SELECT * FROM `user` ORDER BY `user_id` DESC") or die(mysqli_error());
						while($fetch = $query->fetch_array()){
					?>
						<tr>
							<td><?php echo $fetch['username']?></td>
							<td><?php echo md5($fetch['password'])?></td>
							<td><?php echo $fetch['firstname']." ".$fetch['lastname']?></td>
							<td><?php echo $fetch['section']?></td>
							
							<td><center><a href = "edit_user.php?id=<?php echo $fetch['user_id']?>&lastname=<?php echo $fetch['lastname']?>"class = "btn btn-sm btn-warning"><i class = "glyphicon glyphicon-edit"></i> Update</a> <a onclick = "delete_user(this); return false;"  href = "delete_user.php?id=<?php echo $fetch['user_id']?>&lastname=<?php echo $fetch['lastname']?>" class = "btn btn-sm btn-danger"><i class = "glyphicon glyphicon-remove"></i> Delete</a></center></td>
						</tr>
					<?php
						}
						$conn->close();
					?>

					</tbody>
					</table>
                    </div>
			</div>
		</div>
	</div>
    </div>
    </div>
    </div>
	<div id = "footer">
		<label class = "footer-title">&copy; Copyright MOSC Patient Record System 2020</label>
	</div>

	<script type = "text/javascript">
		function delete_user(that){
			var delete_func = confirm("Are you sure you want to delete this record?")
			if(delete_func){
				window.location = anchor.attr("href");
			}
		}
	</script>
<?php include("script.php"); ?>
<script type = "text/javascript" src="../js/forward.js"></script>
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