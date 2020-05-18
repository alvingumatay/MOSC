<?php
    require_once 'logincheck.php';
?>

<!DOCTYPE html>   
<html lang = "eng">
<head>
<title>MOSC Patient Record System</title>
<meta charset = "utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel = "shortcut icon" href = "../images/mosc-logo.png"/>
<link rel = "stylesheet" type = "text/css" href = "../css/bootstrap.css" />
<link rel = "stylesheet" type = "text/css" href = "../css/jquery.dataTables.css" />
<link rel = "stylesheet" type = "text/css" href = "../css/customize2.css" />
<link  rel="stylesheet" href="../font-awesome-4.7.0/css/font-awesome.css">
<link rel="stylesheet" href="../css/css1/dataTables.bootstrap.min.css">
<link href="../css/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
<!-- Bootstrap social button library -->
<link rel="stylesheet" href="../css/css1/style.css">
<!-- Admin STyle -->
<link rel="stylesheet" href="../css/input-to-dropdown.css">
<link rel="stylesheet" href="../css/jquery-ui.css">
<script src="../js/input-to-dropdown.js"></script>
<script src="../js/jquery.min.js"></script>
</head>
<body>
	 <?php include('includes/header.php');?>
     <br> <br> <br><br> <br>  
  <div class="ts-main-content">
  <div class="container-fluid">
  <div class="row">
  
    <div class="card mx-auto">
    <br><br> <br><br>  
        <div class="alert alert-warning alert-dismissable" >
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
           Message! Please read information. You cannot change your appointment once you proceed. .
        </div>

    </div>
	
	<div  class = "panel panel-success">	
			<div class = "panel-heading">
				<center><label>CREATE APPOINTMENT</label></center>
				
			</div>
			<div class = "panel-body">
				<form id = "form_appointment" method = "POST" enctype = "multi-part/form-data" >
					<div class = "panel panel-default" style = "width:60%; margin:auto;">
					<div class = "panel-heading">
					</div>
					<?php
				     $conn = new mysqli("localhost","root","","hcpms") or die(mysqli_error());
                     $q = $conn->query("SELECT * FROM `itr` WHERE `itr_no` = '$_SESSION[itr_no]'") or die(mysqli_error());
                     $f = $q->fetch_array();
			       ?>
					<div class = "panel-body" style="height:1600px;">
						<div class = "form-group">
							<input  type="hidden" name="itr_no" value="<?php echo $f['itr_no']?>">
						</div>
						<div class = "form-group">
							
							<input  type="hidden" name="firstname" value="<?php echo $f['firstname']?>">
						</div>
						<div class = "form-group">
							
							<input  type="hidden"  name="lastname" value="<?php echo $f['lastname']?>">
						</div>
                         <div class = "form-group">
							
							<input  type="hidden"  name="contact" value="<?php echo $f['contact']?>">
						</div>
                         <?php
                        require_once 'add_appoint.php';
                           ?>
						<div class = "form-group">
							<label  for = "servtype">Service Type and Price: </label>
							 <div  class="input-group">
                                 <div class="input-group-addon">
                                 <i class="fa fa-folder">
                                </i>
                               </div>
                       <div class="radio-group-1">
                            <div class="item"><label for="val9"><input name="servtype"  value="Fecalysis - Regular: Php 50" type="radio"> Fecalysis - Regular: &#8369 50</label></div>
                            <div class="item"><label for="val10"><input name="servtype"  value="Fecalysis - Senior: Php 35" type="radio"> Fecalysis - Senior: &#8369 35 </label></div>
                            <div class="item"><label for="val11"><input name="servtype"  value="Hematology - Regular: Php 175" type="radio"> Hematology - Regular: &#8369 175</label></div>
                            <div class="item"><label for="val12"><input name="servtype"  value="Hematology - Senior: Php 100" type="radio"> Hematology - Senior: &#8369 100</label></div>
                            <div class="item"><label for="val12"><input name="servtype"  value="Urinalysys - Regular: Php 60" type="radio"> Urinalysys - Regular: &#8369 60</label></div>
                            <div class="item"><label for="val12"><input name="servtype"  value="Urinalysys - Senior: Php 50" type="radio"> Urinalysys - Senior: &#8369 50</label></div>
                            <div class="item"><label for="val12"><input name="servtype"  value="Consultation - Regular: Php 300" type="radio"> Consultation - Regular: &#8369 300</label></div>
                            <div class="item"><label for="val12"><input name="servtype"  value="Consultation - Senior: Php 280" type="radio"> Consultation - Senior: &#8369 280</label></div>
                            <div class="item"><label for="val9"><input name="servtype"  value="Minor Surgery - Regular: Php 300" type="radio"> Minor Surgery - Regular: &#8369 300</label></div>
                            <div class="item"><label for="val9"><input name="servtype"  value="Dislocation Consultation - Regular: Php 300" type="radio"> Dislocation Consultation - Regular: &#8369 300</label></div>
                            <div class="item"><label for="val12"><input name="servtype"  value="Xray Chest - Regular: Php 350" type="radio"> Xray Chest - Regular: &#8369 350</label></div>
                            <div class="item"><label for="val12"><input name="servtype"  value="Xray Chest - Senior: Php 280" type="radio"> Xray Chest - Senior: &#8369 280</label></div>
                            <div class="item"><label for="val12"><input name="servtype"  value="Xray Shoulder - Regular: Php 300" type="radio"> Xray Shoulder - Regular: &#8369 300</label></div>
                            <div class="item"><label for="val12"><input name="servtype"  value="Xray Shoulder - Senior: Php 240" type="radio"> Xray Shoulder - Senior: &#8369 240</label></div>
                            <div class="item"><label for="val12"><input name="servtype"  value="Xray Wrist - Regular: Php 350" type="radio"> Xray Wrist - Regular: &#8369 350</label></div>
                            <div class="item"><label for="val12"><input name="servtype"  value="Xray Wrist - Senior: Php 280" type="radio"> Xray Wrist - Senior: &#8369 280</label></div>
                            <div class="item"><label for="val12"><input name="servtype"  value="Xray Hand - Regular: Php 550" type="radio"> Xray Hand - Regular: &#8369 550</label></div>
                            <div class="item"><label for="val12"><input name="servtype"  value="Xray Hand - Senior: Php 440" type="radio"> Xray Hand - Senior: &#8369 440</label></div>
                            <div class="item"><label for="val12"><input name="servtype"  value="Xray Elbow - Regular: Php 350" type="radio"> Xray Elbow - Regular: &#8369 350</label></div>
                            <div class="item"><label for="val12"><input name="servtype"  value="Xray Elbow - Senior: Php 280" type="radio"> Xray Elbow - Senior: &#8369 280</label></div>
                            <div class="item"><label for="val12"><input name="servtype"  value="Xray Forearm - Regular: Php 500" type="radio"> Xray Forearm - Regular: &#8369 500</label></div>
                            <div class="item"><label for="val12"><input name="servtype"  value="Xray Forearm - Senior: Php 400" type="radio"> Xray Forearm - Senior: &#8369 400</label></div>
                            <div class="item"><label for="val12"><input name="servtype"  value="Xray Humerus - Regular: Php 500" type="radio"> Xray Humerus - Regular: &#8369 500</label></div>
                            <div class="item"><label for="val12"><input name="servtype"  value="Xray Humerus - Senior: Php 400" type="radio"> Xray Humerus - Senior: &#8369 400</label></div>
                            <div class="item"><label for="val12"><input name="servtype"  value="Xray Ankle - Regular: Php 400" type="radio"> Xray Ankle - Regular: &#8369 400</label></div>
                            <div class="item"><label for="val12"><input name="servtype"  value="Xray Ankle - Senior: Php 320" type="radio"> Xray Ankle - Senior: &#8369 320</label></div>
                            <div class="item"><label for="val12"><input name="servtype"  value="Xray Foot - Regular: Php 550" type="radio"> Xray Foot - Regular: &#8369 550</label></div>
                            <div class="item"><label for="val12"><input name="servtype"  value="Xray Foot - Senior: Php 440" type="radio"> Xray Foot - Senior: &#8369 440</label></div>
                            <div class="item"><label for="val12"><input name="seservtype"  value="Xray Both Os calsis - Regular: Php 350" type="radio"> Xray Both Os calsis - Regular: &#8369 350</label></div>
                            <div class="item"><label for="val12"><input name="seservtype"  value="Xray Both Os calsis - Senior: Php 280" type="radio"> Xray Both Os calsis - Senior: &#8369 280</label></div>
                            <div class="item"><label for="val12"><input name="servtype"  value="Xray Leg - Regular: PHP650" type="radio"> Xray Leg - Regular: &#8369 650</label></div>
                            <div class="item"><label for="val12"><input name="servtype"  value="Xray Leg - Senior: PHP520" type="radio"> Xray Leg-Senior: &#8369 520</label></div>
                            <div class="item"><label for="val12"><input name="servtype"  value="Xray Thigh-Regular: PHP650" type="radio"> Xray Thigh - Regular: &#8369 650</label></div>
                            <div class="item"><label for="val12"><input name="servtype"  value="Xray Thigh-Senior: PHP520" type="radio"> Xray Thigh - Senior: &#8369 520</label></div>
                            <div class="item"><label for="val12"><input name="servtype"  value="Xray Knee-Regular: PHP600" type="radio"> Xray Knee - Regular: &#8369 600</label></div>
                             <div class="item"><label for="val12"><input name="servtype"  value="Xray Knee-Senior: PHP480" type="radio"> Xray Knee - Senior: &#8369 480</label></div>
                             <div class="item"><label for="val12"><input name="servtype"  value="Xray Skull-Regular: PHP700" type="radio"> Xray Skull - Regular: &#8369 700</label></div>
                             <div class="item"><label for="val12"><input name="servtype"  value="Xray Skull-Senior: PHP560" type="radio"> Xray Skull - Senior: &#8369 560</label></div>
                             <div class="item"><label for="val12"><input name="servtype"  value="Xray Cervical-Regular: PHP600" type="radio"> Xray Cervical - Regular: &#8369 600</label></div> 
                             <div class="item"><label for="val12"><input name="servtype"  value="Xray Cervical-Senior: PHP480" type="radio"> Xray Cervical - Senior: &#8369 480</label></div> 
                             <div class="item"><label for="val12"><input name="servtype"  value="Xray T-cage-Regular: PHP450" type="radio"> Xray T-cage - Regular: &#8369 450</label></div> 
                             <div class="item"><label for="val12"><input name="servtype"  value="Xray T-cage-Senior: PHP360" type="radio"> Xray T-cage - Senior: &#8369 360</label></div> 
                             <div class="item"><label for="val12"><input name="servtype"  value="Xray Pelvis-Regular: PHP500" type="radio"> Xray Pelvis - Regular: &#8369 500</label></div> 
                             <div class="item"><label for="val12"><input name="servtype"  value="Xray Pelvis-Senior: PHP400" type="radio"> Xray Pelvis - Senior: &#8369 400</label></div> 
                             <div class="item"><label for="val12"><input name="servtype"  value="Xray Thoraco-lumbar-Regular: PHP900" type="radio"> Xray Thoraco - lumbar-Regular: &#8369 900</label></div> 
                             <div class="item"><label for="val12"><input name="servtype"  value="Xray Thoraco-lumbar-Senior: PHP720" type="radio"> Xray Thoraco - lumbar-Senior: Php720</label></div> 
                             <div class="item"><label for="val12"><input name="servtype"  value="Xray Lombo-sacral-Regular: PHP800" type="radio"> Xray Lombo - Sacral-Regular: Php800</label></div> 
                             <div class="item"><label for="val12"><input name="servtype"  value="Xray Lombo-sacral-Senior: PHP640" type="radio"> Xray Lombo - Sacral-Senior: Php640</label></div>              

                        </div>
                        <script>inputsToDropdown('.radio-group-1', 'Select Services Type & Price', 'radio', '.radio-group-1', '');</script>
                            </div>
							</div>
						<div class = "form-group">

							<label for = "tdate">Date: </label>
							 <div class="input-group">
                                    <div class="input-group-addon">
                                     <i class="fa fa-calendar">
                                     </i>
                                    </div>
                                   <input  class="form-control"  id="tdate" name="tdate" value="<?php echo date("Y-m-d")?>" onchange="showUser(this.value)"/>
                                   </div>
						</div>
						<div class = "form-group">
							 <div id="sample1" class="ui-widget-content" style="padding: .5em;">
						<label for = "dtime">Time: </label>
                          <div class="input-group clockpicker"  data-align="top" data-autoclose="true">
                              <div class="input-group-addon">
                                     <i class="fa fa-clock-o">
                                     </i>
                                    </div>
						
                                   <input type="text" id="timepicker1" class="form-control" name="dtime" required="required">
                            </div>
						</div>
					</div>
							<button  class = "btn btn-success" name = "save_appoint" ><span class = "glyphicon glyphicon-save"></span> SAVE</button>
							<br />
					</div>
				</div>
				</form>
			</div>	
		</div>
</div>
</div>
</div>
<div id = "footer">
		<label class = "footer-title">&copy; Copyright MOSC Patient Record System 2020</label>
	</div>

	<?php require'script.php' ?>
	<script src="../js/selectdate.js" type="text/javascript"></script>
<script src="../js/option.js" type="text/javascript"></script>
<script src="../js/bootstrap-timepicker.min.js"></script>
<script src="../js2/jquery-ui.js"></script>
<script src="../js/bootstrap-timepicker.min.js"></script>
 <script type="text/javascript">
            $('#timepicker1').timepicker();
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
</body>
</html>