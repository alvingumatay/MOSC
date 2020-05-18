<div id="main-sidebar" class="sidebar sidebar-inverse">
            <!-- // sidebar menu -->
       

            <?php //include"counter.php";?>
            <div class="sidebar-item"></div>
            <!-- // sidebar item --> 
            <div class="well well-black">
              
                                
                <div class="row-fluid">
                
                        <div class="span7">
                        <center><h6 style="font-weight:bold; color:#ffffff;">PATIENT NO.</h6>    
                            <h6 class="well well-black well-small inline" > <br><span id="responsecontainer" style="font-family:SimHei; font-size: 30px; font-weight:bold; color:#FFFF00;"></span><br></h6></center>
                            
                        </div>
                        <!-- // Column -->
                        
                        <div class="span5 pull-right">
                            <center><h6 style="font-weight:bold; color:#ffffff;">SERVICE</h6>
                            <h6 class="well well-black well-small inline" ><br><span id="loket_transaksi" ></span></h6></center>
                        </div>
                        <!-- // Column --> 
                        
                    </div>
                           
                               
                <div class="row-fluid">
                
                        <div class="span7">
                        <center>
                            <h6 class="well well-black well-small inline" > <br><span id="respon_administrasi" style="font-family:SimHei; font-size: 30px; font-weight:bold; color:#FFFF00;"></span></h6></center>
                            
                        </div>
                        <!-- // Column -->
                        
                        <div class="span5 pull-right">
                            <center>
                            <h6 class="well well-black well-small inline" > <br><span id="loket_administrasi" style="font-family:SimHei; font-size: 30px; font-weight:bold; color:#FFFF00;"></span></h6></center>
                        </div>
                        <!-- // Column --> 
                        
                    </div>
                     
                     <div class="row-fluid">
                
                        <div class="span7">
                        <center>  
                            <h6 class="well well-black well-small inline" > <br><span id="respon_consultation" style="font-family:SimHei; font-size: 30px; font-weight:bold; color:#FFFF00;"></span></h6></center>
                            
                        </div>
                        <!-- // Column -->
                        
                        <div class="span5 pull-right">
                            
                            <h6 class="well well-black well-small inline" > <br><span id="loket_consultation" style="font-family:SimHei; font-size: 30px; font-weight:bold; color:#FFFF00;"></span></h6></center>
                        </div>
                        <!-- // Column --> 
                        
                    </div>

                    <div class="row-fluid">
                
                        <div class="span7">
                        <center>  
                            <h6 class="well well-black well-small inline" > <br><span id="respon_hematology" style="font-family:SimHei; font-size: 30px; font-weight:bold; color:#FFFF00;"></span></h6></center>
                            
                        </div>
                        <!-- // Column -->
                        
                        <div class="span5 pull-right">
                            
                            <h6 class="well well-black well-small inline" > <br><span id="loket_hematology" style="font-family:SimHei; font-size: 30px; font-weight:bold; color:#FFFF00;"></span></h6></center>
                        </div>
                        <!-- // Column --> 
                        
                    </div>
                    <div class="row-fluid">
                
                        <div class="span7">
                        <center>  
                            <h6 class="well well-black well-small inline" > <br><span id="respon_urinalysis" style="font-family:SimHei; font-size: 30px; font-weight:bold; color:#FFFF00;"></span></h6></center>
                            
                        </div>
                        <!-- // Column -->
                        
                        <div class="span5 pull-right">
                            
                            <h6 class="well well-black well-small inline" > <br><span id="loket_urinalysis" style="font-family:SimHei; font-size: 30px; font-weight:bold; color:#FFFF00;"></span></h6></center>
                        </div>
                        <!-- // Column --> 
                        
                    </div>
                   

                    <br><br><br>
                            </div>
        </div>
        <!-- // sidebar -->
             
<script>
 $(document).ready(function() {
 	 $("#responsecontainer").load("respon/respon_transaksi.php");
   var refreshId = setInterval(function() {
      $("#responsecontainer").load('respon/respon_transaksi.php');
   }, 2000);
   $.ajaxSetup({ cache: false });
});
</script>
<script>
 $(document).ready(function() {
 	 $("#respon_administrasi").load("respon/respon_administrasi.php");
   var refreshId = setInterval(function() {
      $("#respon_administrasi").load('respon/respon_administrasi.php');
   }, 2000);
   $.ajaxSetup({ cache: false });
});
</script>
<script>
 $(document).ready(function() {
 	 $("#loket_administrasi").load("respon/loket_administrasi.php");
   var refreshId = setInterval(function() {
      $("#loket_administrasi").load('respon/loket_administrasi.php');
   }, 2000);
   $.ajaxSetup({ cache: false });
});
</script>
<script>
 $(document).ready(function() {
 	 $("#loket_transaksi").load("respon/loket_transaksi.php");
   var refreshId = setInterval(function() {
      $("#loket_transaksi").load('respon/loket_transaksi.php');
   }, 2000);
   $.ajaxSetup({ cache: false });
});
</script>
<script>
 $(document).ready(function() {
   $("#respon_consultation").load("respon/respon_consultation.php");
   var refreshId = setInterval(function() {
      $("#respon_consultation").load('respon/respon_consultation.php');
   }, 2000);
   $.ajaxSetup({ cache: false });
});
</script>
<script>
 $(document).ready(function() {
   $("#loket_consultation").load("respon/loket_consultation.php");
   var refreshId = setInterval(function() {
      $("#loket_consultation").load('respon/loket_consultation.php');
   }, 2000);
   $.ajaxSetup({ cache: false });
});
</script>
<script>
 $(document).ready(function() {
   $("#respon_hematology").load("respon/respon_hematology.php");
   var refreshId = setInterval(function() {
      $("#respon_hematology").load('respon/respon_hematology.php');
   }, 2000);
   $.ajaxSetup({ cache: false });
});
</script>
<script>
 $(document).ready(function() {
   $("#loket_hematology").load("respon/loket_hematology.php");
   var refreshId = setInterval(function() {
      $("#loket_hematology").load('respon/loket_hematology.php');
   }, 2000);
   $.ajaxSetup({ cache: false });
});
</script>
<script>
 $(document).ready(function() {
   $("#respon_urinalysis").load("respon/respon_urinalysis.php");
   var refreshId = setInterval(function() {
      $("#respon_urinalysis").load('respon/respon_urinalysis.php');
   }, 2000);
   $.ajaxSetup({ cache: false });
});
</script>
<script>
 $(document).ready(function() {
   $("#loket_urinalysis").load("respon/loket_urinalysis.php");
   var refreshId = setInterval(function() {
      $("#loket_urinalysis").load('respon/loket_urinalysis.php');
   }, 2000);
   $.ajaxSetup({ cache: false });
});
</script>