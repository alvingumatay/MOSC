<?php
    $contact = $contactErr = "";
    $message = $messageErr = "";
if(isset($_POST["btnSMS"])){

  if(empty($_POST["contact"])){
         $contactErr ="Required!";
}else{
          $contact = $_POST["contact"];
}

if($contact){

$check_digits = strlen($contact);

if($check_digits < 11){
        $contactErr =  "Mobile number must 11 charracter.";

}else{
  
if(empty($_POST["message"])){
   $messageErr ="Required!";
}else{
      $message = $_POST["message"];
}
        
function itexmo($contact,$message,$apicode){
$url = 'https://www.itexmo.com/php_api/api.php';

$apicode = "TR-ASILA216995_TSYVC";

$itexmo = array('1' => $contact, '2' => $message, '3' => $apicode);
$param = array(
        'http' => array(	
         'header' => "Content-type: application/x-www-form-urlencoded\r\n",
          'method' => 'POST',
          'content' => http_build_query($itexmo),
          		),
              );

$context = stream_context_create($param);
return file_get_contents($url, false, $context);
          
 }
      
$result = itexmo("$contact","$message","API_CODE");
      if($result == ""){
      
      	echo "Message not  Sent";
      
      }else{

      	 if($result == 0){
      			
      		 echo "Message Sent";
         }else{

                // "1" = Invalid Number.
      			// "2" = Number prefix not supported. Please contact us so we  can add.
         	    // "3" = Invalid ApiCode.
         	    // "4" = Maximum Message per day reached. This will be reset every 12MN.
         	    // "5" = Maximum allowed characters for message reached.
         	    // "6" = System OFFLINE.
         	    // "7" = Expired ApiCode.
         	    // "8" = iTextMo Error. Please try again later.
         	    // "9" = Invalid Function Parameters.
         	    // "10" = Recipient's number is blocked due to FLOODING, message was ignored.
                // "11" = Recipient's number is blocked temporarily due to HARD sending (after 3 retries of sending and message
                //   still failed to send) and the message was ignored. Try again after one hour.
         	    // "12" = Invalid request. You can't set message priorities on non corporate apicodes.
         	    // "13" = Invalid or Not Registered Custom Sender ID.
         	    // "0" = Success! Message is now on queue and will be sent soon.

              echo $result;
      		}
          }
      }
  }
}
?>
<?php require_once 'logincheck.php'; ?>

<!DOCTYPE html>
<html lang = "eng">
	<head>
		<title>MOSC Patient Record System</title>
		<meta charset = "utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel = "shortcut icon" href = "../images/mosc-logo.png" />
		<link rel = "stylesheet" type = "text/css" href = "../css/bootstrap.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/jquery.dataTables.css" />
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
	   <link rel = "stylesheet" type = "text/css" href = "../css/customize.css" />
	   <script src="../js/jquery.min.js"></script>
       <script src="../js/bootstrap.min.js"></script>
    </head>
<body>
  <?php include('includes/header.php');?>
  <br/> <br/> <br/> <br/>
  <div class="ts-main-content">
  <?php include('includes/leftbar.php');?>
  <div class="content-wrapper">
  <div class="container-fluid">
  <div class="row">
  <center><p>Touch Screen left,right,up,down to see details.</p></center>
	<div class = "panel panel-success">
			<div class = "panel-heading">
				<label>PATIENTS LIST</Label>
			</div>
			 <div class = "panel-body">
				<br />
				<br />
                <div class="table-responsive">
				<table id = "table" class = "display" width = "100%" cellspacing = "0">
					<thead>
						<tr>
                           
                            <th>Time</th>
							<th>Date</th>
							<th>PatientName</th>
							<th>Contact</th>
							<th>Services</th>
							<th>Status</th>
							<th>action</th>
							
						</tr>
					</thead>
				<?php
		         require_once('includes/db.php');
		         $result = $conn->prepare("SELECT * FROM appointment where status = 'accepted' ORDER BY appoint_id DESC");
		         $result->execute();
		        for($i=0; $row = $result->fetch(); $i++){
		        $id=$row['appoint_id'];
		        $servtype=$row['servtype'];
	            ?>
						<tr>
                             
                            <td><?php echo $row['dtime'];?></td>
							<td><?php echo $row['tdate'];?></td>
					        <td><?php echo $row['firstname']."   ".$row['lastname'];?></td>
					        <td><?php echo $row['contact'];?></td>
							<td><?php echo $row['servtype'];?></td>
						    <td><?php echo $row['status'];?></td>
						    <td>
                        <button type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#myModal">SMS</button>
                    <a href="done.php<?php echo '?appoint_id='.$id; ?>" onclick="return confirm('Want a process done  ( <?php echo $servtype ?> ) ? ');">
					<button type="submit" class="btn btn-info">
						DONE
					</button>
				</a>
                                
                            </td>
							</tr>
				     <?php
						}
						
					?>

					</tbody>
					</table>
			</div>
            </div>
		</div>
		
	
<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Notify Patient</h4>
        </div>
        <div class="modal-body">
    <form method="POST">
   &nbsp;
   <input class="form-control" type="text"  id ="contact" name="contact"  placeholder="Enter Contact No." maxlength="11">
  <span class="error"><?php echo $contactErr; ?></span> 
   &nbsp; 
    <textarea class="form-control" id="empty"  type="text" name="message" rows="10" cols="37" value="" placeholder="Enter a Message">
    

    </textarea>

    <!-- <p id="text">Hello World!</p>
	
	<p id="secondParagraph">Javascript is ....</p>
	
	<p id="empty"></p>-->

  <span class="error"><?php echo $messageErr; ?></span> 
  &nbsp; 
   
  <br/>
    <input type="button" id="myButton" value="Doctor Availability"></input>
    <input type="button" id="secondButton" value="Message Notification"></input>
    
    <input type="submit" class="btn btn-warning pull-right" name="btnSMS" value="SMS SEND">
 &nbsp; &nbsp;
 </form>
 </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
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
	<?php require'script.php' ?>
<script src="../js/contact2.js"></script>
<script type = "text/javascript" src="../js/confirmdelete.js"></script>
<script type = "text/javascript" src="../js/forward.js"></script>
	
    <script type="text/javascript">
		document.getElementById("myButton").onclick = function() {
		document.getElementById('text').innerHTML = 'Code is life';
		//	alert("Button Clicked!");
		}
		document.getElementById("secondButton").onclick = function() {
		document.getElementById('secondParagraph').innerHTML = 'I think ' + document.getElementById('secondParagraph').innerHTML + 'Code is life';

		}
		document.getElementById("secondButton").onclick = function() {
		document.getElementById('empty').innerHTML = 'Good day! You have an appointment on this day';
	}
        document.getElementById("myButton").onclick = function() {
		document.getElementById('empty').innerHTML = 'Good day! Sorry for the inconvinience, There is no available doctor that`s responsible in taking charge for your appoint services';
	}
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
