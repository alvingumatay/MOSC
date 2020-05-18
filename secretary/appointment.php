<?php
	require_once 'logincheck.php';
?>
<?php include './includes/conn1.php';?>

<?php
require 'includes/conn.php';
    $conn = mysqli_connect("localhost","root","","hcpms");
    $query = "SELECT * FROM appointment WHERE status = 'pending' ORDER BY itr_no desc";
    $sql = mysqli_query($conn, $query);
?>
<?php
    $link=mysqli_connect("sql312.byethost.com","b13_24703675","marikina12345");
    mysqli_select_db($link,"b13_24703675_hcpms");
?>

<!DOCTYPE html> 
<html lang="eng">
	<head>
		<title>MOSC Patient Record System</title>
		<meta charset = "utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel = "shortcut icon" href = "../images/mosc-logo.png" />
		<link rel = "stylesheet" type = "text/css" href = "../css/bootstrap.css" />
	    <link rel = "stylesheet" type = "text/css" href = "../css/customize.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/jquery-ui.css"> 
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
		<script src="../js/jquery.min.js"></script>
       <script src="../js/bootstrap.min.js"></script>
	    <link rel="stylesheet" href="../css/sms.css" />
      </head>
     <body>
  <?php include('includes/header.php');?>
  <div class="ts-main-content">
  <?php include('includes/leftbar.php');?>
  <div class="content-wrapper">
  <div class="container-fluid">
  <div class="row">
 
    <br/><br/>
<?php
        $conn = new mysqli("localhost","root","","hcpms") or die(mysqli_error());
        $q = $conn->query("SELECT * FROM `itr` WHERE `itr_no`") or die(mysqli_error());
        $f = $q->fetch_array();
    ?>

<br/>
<br/>   <br/>
 <center><p>Touch Screen left,right,up,down to see details.</p></center>
  <div class="panel panel-default">
    <div class="panel-heading"><center><font color="green"><b>APPOINTMENT PENDING DETAILS</b></font></center></div>
    <div class="panel-body">
     <span id="message"></span>
     <div class="table-responsive" id="user_data">
      
     </div>
     <script>
     $(document).ready(function(){
      
      load_user_data();
      
      function load_user_data()
      {
       var action = 'fetch';
       $.ajax({
        url:'action.php',
        method:'POST',
        data:{action:action},
        success:function(data)
        {
         $('#user_data').html(data);
        }
       });
      }
      
      $(document).on('click', '.action', function(){
       var itr_no = $(this).data('itr_no');
       var status = $(this).data('status');
       var action = 'change_status';
       $('#message').html('');
       if(confirm("Are you Sure you want to change status of this User?"))
       {
        $.ajax({
         url:'action.php',
         method:'POST',
         data:{itr_no:itr_no, status:status, action:action},
         success:function(data)
         {
          if(data != '')
          {
           load_user_data();
           $('#message').html(data);
          }
         }
        });
       }
       else
       {
        return false;
       }
      });
      
     });
     </script>
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
<?php include("script.php"); ?>
<script src="../js/accept_pending.js"></script>
<script type = "text/javascript" src="../jsforward.js"></script>
<script src="../js/confirmdelete.js"></script>
<script src="../js/contact2.js"></script>
<script src="../js/jquery-ui.js"></script>
<!-- Script -->
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
<script src="../js/cont.js"></script>

