<?php
$detail = mysql_query("SELECT * FROM 
                            users
                            WHERE 
                            USER_ID='$_SESSION[user_id]'");
    $r    = mysql_fetch_array($detail);
?>
            
    <div class="widget widget-simple">
                                <div class="widget-header">
                                    <p> <span class="label label-success"><?php echo "$r[NAMA_LENGKAP]";?> </span></p>
                                </div>
                                <div class="widget-content">
                                    <div class="widget-body">
                                        <nav>
                    
                
                     </nav>
                <nav>
                    <ul class="nav nav-center " style="margin-top: 20px">
                       <li><a class="btn btn-well btn-glyph" href="?link=menu-antrian-transaksi" style="width:82px"><i class="  fontello-icon-edit-2 f30"></i><span class="block">QUEUING XRAY</span></a></li>
                        <li><a class="btn btn-well btn-glyph" href="?link=menu-antrian-consultation" style="width:82px" data-toggle="modal"><i class="fontello-icon-edit-2 f30"></i><span class="block">QUEUING CONSULTATION</span></a></li>
                        
                        
                    </ul>
                <ul class="nav nav-center " style="margin-top: 20px">
                       <li><a class="btn btn-well btn-glyph" href="?link=menu-antrian-administrasi" style="width:82px"><i class=" fontello-icon-edit-2 f30"></i><span class="block">QUEUING FECALYSIS</span></a></li>
                        <li><a class="btn btn-well btn-glyph" href="?link=menu-antrian-hematology" style="width:82px" data-toggle="modal"><i class="fontello-icon-edit-2 f30"></i><span class="block">QUEUING HEMATLOGY</span></a></li>
                        
                        
                    </ul>
                    <ul class="nav nav-center " style="margin-top: 20px">
                       <li><a class="btn btn-well btn-glyph" href="?link=menu-antrian-urinalysis" style="width:82px"><i class=" fontello-icon-edit-2 f30"></i><span class="block">QUEUING URINALYSIS</span></a></li>
                        
                        
                        
                    </ul>
                    <ul class="nav nav-center " style="margin-top: 20px">
                       <li><a class="btn btn-well btn-glyph" href="logout.php" style="width:82px"><i class=" fontello-icon-logout f30"></i><span class="block">EXIT</span></a></li>
                        
                        
                    </ul>
                     </nav>
                                    </div>
                                </div>
                            </div>
         
            <!-- // page content --> 
            

                        
            
            
       