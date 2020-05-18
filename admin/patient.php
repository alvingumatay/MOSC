<?php require_once'logincheck.php';?>
<!DOCTYPE html>
<html lang = "eng">
	<head>
		<title>MOSC Patient Record System</title>
		<meta charset = "utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel = "shortcut icon" href = "../images/mosc-logo.png" />
		<link rel = "stylesheet" type = "text/css" href = "../css/bootstrap.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/jquery.dataTables.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/customize.css" />
		<link href="../font-awesome-4.7.0/css/font-awesome.css" rel="stylesheet"> 
		<link rel="stylesheet" media="screen" href="../css/jquery-ui.css" />
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
 <br/> <br/> <br/>
 <div class="ts-main-content">
  <?php include('includes/leftbar.php');?>
  <div class="content-wrapper">
  <div class="container-fluid">
  <div class="row">
  <center><p>Touch screen left,right,up,down to see details.</p></center>
	  <div style = "display:none;" id = "add_itr" class = "panel panel-success"> 
      <div class = "panel-heading">
        <label>ADD PATIENT INFORMATION</label>
        <button id = "hide_itr" style = "float:right; margin-top:-4px;" class = "btn btn-sm btn-danger"><span class = "glyphicon glyphicon-remove"></span> CLOSE</button>
      </div>
      <div class = "panel-body">
        <form id = "form_dental" action="add_patient.php" method = "POST" enctype = "multipart/form-data">
          <div style = "float:left;" class = "form-inline">
            <label for = "email">Email:</label>
            <input type="email" class = "form-control"  name = "email" placeholder="(Optional)" /> 
             &nbsp;&nbsp;&nbsp;
            <label for = "password">Password:</label>
            <input type="password" class = "form-control" id="myInput"  name = "password" placeholder="(Optional)" />
            &nbsp;&nbsp;&nbsp;
            <input type="checkbox" onclick="myFunction()">Show Password 
          </div>
          
          <br/>
          <br/>
          <hr />
          <br/>
          <div class = "form-inline">
            <label for = "firstname">Firstname:</label>
            <input class = "form-control" name = "firstname" type = "text" required = "required">
            &nbsp;&nbsp;&nbsp;
            <label for = "middlename">Middle Name:</label>
            <input class = "form-control" name = "middlename" placeholder = "(Optional)" type = "text">
            &nbsp;&nbsp;&nbsp;
            <label for = "lastname">Lastname:</label>
            <input class = "form-control" name = "lastname" type = "text" required = "required">
          </div>
          <br />
          <div class = "form-group">
            <label for = "birthdate" style = "float:left;">Birthdate:</label>
            <br style = "clear:both;" />
             <input type="text" class="form-control"    style = "width:20%;"  name="birthdate"  id="birthdate"> 
			<br />
            <label for = "age">Age:</label>
	        <input  type="text" class="form-control"   style = "width:20%;" name = "age" id="age" readonly/>
		    <br style = "clear:both;"/>
            <br />
            <label for = "phil_health_no">Phil Health no:</label>
            <input name = "phil_health_no" placeholder = "(if any)" class = "form-control" type = "text">
            <br />
            <label for = "address">Address:</label>
            <input class = "form-control" name = "address" type = "text" required = "required">
            <br />
            <label for = "contact">Contact:</label>
            <input class = "form-control" style = "width:20%;" min = "0" max = "999" name = "contact" type = "text" maxlength="11">
            <br/>
            <label for = "civil_status">Civil Status:</label>
            <select style = "width:22%;" class = "form-control" name = "civil_status" required = "required">
              <option value = "">--Please select an option--</option>
              <option value = "Single">Single</option>
              <option value = "Married">Married</option>
            </select>
            <br />
            <label for = "gender">Gender:</label>
            <select style = "width:22%;" class = "form-control" name = "gender" required = "required">
              <option value = "">--Please select an option--</option>
              <option value = "Male">Male</option>
              <option value = "Female">Female</option>
            </select>
            </div>
          <br/>
          <div class = "form-inline">
            <label for = "bp">BP:</label>
            <input class = "form-control" name = "bp" type = "text"  required = "required">
            &nbsp;&nbsp;&nbsp;
            <label for = "temp">TEMP:</label>
            <input class = "form-control" name = "temp" type = "number" max = "999" min = "0" size = "15" required = "required"><label>&deg;C</label>
            &nbsp;&nbsp;&nbsp;
            <label for = "pr">PR:</label>
            <input class = "form-control" name = "pr" type = "text"  required = "required">
            <br />
            <br />
            <label for = "rr">RR:</label>
            <input class = "form-control" name = "rr" type = "text"  required = "required">
            &nbsp;&nbsp;&nbsp;
            <label for = "wt">WT :</label>
            <input class = "form-control" name = "wt" style = "width:10%;" type = "number"  required = "required"><label>kg</label>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <label for = "ht">HT :</label>
            <input class = "form-control" name = "ht" style = "margin-right:10px;" type = "text"  required = "required">
          </div>
          <br/>
          
          <div class = "form-inline">
            <button class = "btn btn-success" name = "save_patient"><span class = "glyphicon glyphicon-save"></span> SAVE</button>
          </div>
           
        </form>
           <?php include"add_patient.php";?>
      </div>  

    </div>

   
    
    <div class = "panel panel-success">
      <div class = "panel-heading">
        <label>PATIENTS LIST</Label>
      </div>
      <div class = "panel-body">
        <button id = "show_itr" class = "btn btn-success"><span class = "glyphicon glyphicon-plus"></span> ADD PATIENT</button>
        <br />
        <br />
        <div class="table-responsive">
        <table id = "table" class = "display" width = "100%" cellspacing = "0">
          <thead>
            <tr>
              <th>Patient No.</th>
              <th>Name</th>
              <th>Birthdate</th>
              <th>Age</th>
              <th>Address</th>
              
              <th><center>Action</center></th>
            </tr>
          </thead>
          <tbody>
          <?php
            $conn = new mysqli("localhost","root","","hcpms") or die(mysqli_error());
            $query = $conn->query("SELECT * FROM `itr` ORDER BY `itr_no` DESC") or die(mysqli_error());
            while($fetch = $query->fetch_array()){
            $id = $fetch['itr_no'];
            $q = $conn->query("SELECT COUNT(*) as total FROM `complaints` where `itr_no` = '$id' && `status` = 'Pending'") or die(mysqli_error());
            $f = $q->fetch_array();
          ?>
            <tr>
              <td><?php echo $fetch['itr_no']?></td>
              <td><?php echo $fetch['firstname']." ".$fetch['lastname']?></td>
              <td><?php echo $fetch['birthdate']?></td>       
              <td><?php echo $fetch['age']?></td>       
              <td><?php echo $fetch['address']?></td>
              <td><center><a href = "complaints.php?id=<?php echo $fetch['itr_no']?>&lastname=<?php echo $fetch['lastname']?>" class = "btn btn-sm btn-info">Process <span class = "badge"><?php echo $f['total']?></span></a>
                <a href = "edit_patient.php?id=<?php echo $fetch['itr_no']?>&lastname=<?php echo $fetch['lastname']?>" class = "btn btn-sm btn-warning"><span class = "glyphicon glyphicon-pencil"></span> Update</a>
             
            </center></td>
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
    
<script type="text/javascript" rel="stylesheet" src="../js/showhide.js"></script>
 <script type = "text/javascript" src="../js/forward.js"></script>
 <?php include("script.php"); ?>
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