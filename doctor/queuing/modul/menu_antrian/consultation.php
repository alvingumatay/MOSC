<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo header("location:index.php");
}
if ($_SESSION[leveluser]=='admin' OR $_SESSION[leveluser]=='loket consultation' ){
  

$detail = mysql_query("SELECT * FROM
                            loket
                            WHERE
                            nama_loket='CONSULTATION'");
    $r    = mysql_fetch_array($detail);
    $loket=$r[no_loket];
?>

            <div class="sidebar-item"></div>
            <!-- // sidebar item --> 
            <div class="well well-black">
                <hr>
                                <div class="section-title">
                                    <center><h4 style="font-weight:bold; color:gray;"><i class=" fontello-icon-docs"></i> Counter Consultation </h4></center>
                                </div>
                <div class="row-fluid">
                        <div class="span4">
                        <center><h6 style="font-weight:bold; color:gray;">Patient No</h6>    
                            <h1 class="well well-black well-small inline" > <br><span class="counter" style="font-family:SimHei; font-size: 75px; font-weight:bold; color:#FFFF00;"> </span><img id="loader" src="webroot/img/loader/loader.gif" style="display: none"> <br></h1></center>

                            
                        </div>
                        <!-- // Column -->
                        
                        <div class="span3">
                            <center><h6 style="font-weight:bold; color:gray;">Counter</h6>
                                <h1 class="well well-black well-small inline" ><br><span style="margin-top:10px; font-family:SimHei; font-size: 50px; font-weight:bold; color:#FFFF00;"><?php echo "$loket";?></span></h1></center>
                        </div>
                        <!-- // Column --> 
                        <div class="span5">
                            <center><h6 style="font-weight:bold; color:gray;">Menu</h6>    
                                <a id="back" class="btn btn-well btn-glyph btn-black" href="#" style="width:82px"><i class=" fontello-icon-reply-1 f30"></i><span class="block">BACK</span></a>
                                <a id="next" class="btn btn-well btn-glyph btn-black" href="#" style="width:82px"><i class=" fontello-icon-play-2 f30"></i><span class="block">NEXT</span></a>
                                <a class="btn btn-well btn-glyph btn-black" name="play" onclick="mulai();" type="button" style="width:82px"><i class=" fontello-icon-megaphone-1 f30"></i><span class="block">SOUND</span></a>

                                 <a class="btn btn-well btn-glyph btn-black" href="#" style="width:82px" data-toggle="modal" data-target="#confirm-jump"><i class="fontello-icon-rocket f30"></i><span class="block">JUMP</span></a>
                                
                                <a class="btn btn-well btn-glyph btn-yellow" href="#" style="width:82px" data-toggle="modal" data-target="#confirm-restart"><i class=" fontello-icon-arrows-ccw f30"></i><span class="block">RESTART</span></a>
                                
                     </center>


<script>
    $(document).ready(function() {
        $("#loader").hide(),
        $(".counter").load("respon/respon_consultation.php");
       $.ajaxSetup({ cache: false });

        $('#next').click(function(e){
            $(".counter").hide();
            $("#loader").show();
            e.preventDefault();
            e.stopPropagation();
            next();


       });
   function next() {
// AJAX Call Below
// rest of your code
    $.ajax({
         type: "POST",
         url: "content/consultation/counter.php",
         success: function (response) {
             $(".counter").show();
             $("#loader").hide();
             $(".counter").load("respon/respon_consultation.php",1)
         }

     });
}

});

   $('#back').click(function(e){
       $(".counter").hide();
       $("#loader").show();
       e.preventDefault();
        e.stopPropagation();
        back();
   });
   function back() {
// AJAX Call Below
// rest of your code
        $.ajax({
             type: "POST",
             url: "content/consultation/back.php",
             success: function (response) {
                 $(".counter").show();
                 $("#loader").hide();
                 $(".counter").load("respon/respon_consultation.php",350);
                 //alert ("successfully loaded");
             }
         });
}
    $(document).ready(function(){
        $("#play").click(function(){
            document.getElementById('suarabel').play();
        });

    });

</script>                
                     </div>
                    </div>
                           <hr>

                        <script>
                            $('#modal').on('show', function() {
    $('#confirm-delete').on('show.bs.modal', function(e) {
    $(this).find('.danger').attr('href', $(e.relatedTarget).data('href'));
});
                            </script>                           
        <!-- // sidebar -->
<div class="modal fade" id="confirm-restart" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Restart Queue </h4>
            </div>
            <div class="modal-body">
                <center><p>Are You Sure You Want To Repeat This Queue?<br><br> <b>The queue will start from number "1"</b></p></center>
            </div>
            <div class="modal-footer">
                <a href="content/consultation/restart.php" class="btn btn-success">Yes</a>
            </div>
        </div>
    </div>
</div>
                        <script>
                            $('#modal').on('show', function() {
    $('#confirm-delete').on('show.bs.modal', function(e) {
    $(this).find('.danger').attr('href', $(e.relatedTarget).data('href'));
});
                            </script>        
                            

                        <script>
                            $('#modal').on('show', function() {
    $('#confirm-delete').on('show.bs.modal', function(e) {
    $(this).find('.danger').attr('href', $(e.relatedTarget).data('href'));
});

                            </script>                                    
<div class="modal fade" id="confirm-jump" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form  id="formNextAccountSettings" class="form-condensed" action="content/consultation/jump.php" method="POST">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Jump To </h4>
            </div>
            <div class="modal-body">
                                            <fieldset>
                                                <ul class="form-list">
                                                    <center>
                                                            <li class="control-group">
                                                                <label for="accountAddressState" class="control-label">Desired No Queue: <span class="required">fill in the numbers *</span></label>
                                                                <div class="controls">
                                                                    <input class='input-large focused int' name="jump" type='text' required>
                                                                </div>
                                                            </li>
                                                    <!-- // form item -->
                                                   </center> 
                                           </ul>         
                                                                 
                                            </fieldset>
                                          
            </div>
            <div class="modal-footer">
                <button type="submit" class="next finish btn btn-success">Jump Now</button>
            </div>
        </div>
       </form>
    </div>
</div>
                        <script>
                            $('#modal').on('show', function() {
    $('#confirm-delete').on('show.bs.modal', function(e) {
    $(this).find('.danger').attr('href', $(e.relatedTarget).data('href'));
});
                            </script>                                                                




<!-- // sidebar menu -->
<?php }
else { ?>     
<center>
                            <div class="widget widget-simple widget-collapsible bg-yellow-light">
                                <div class="widget-header header-small clickable" data-toggle="collapse" data-target="#demoYellow">
                                    <h4><i class=" fontello-icon-attention-4"></i> <small>Ups!</small></h4>
                                    <div class="widget-tool"><span class="btn btn-glyph btn-link widget-toggle-btn fontello-icon-publish"></span></div>
                                </div>
                                <div id="demoYellow" class="widget-content collapse in">
                                    <div class="widget-body">
                                        <div class="widget-row">
                                            <p>Maaf, anda tidak memiliki hak akses menggunakan menu ini. terimakasih</p>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <!-- // Widget --> 
        
    </center>
<?php }?>
