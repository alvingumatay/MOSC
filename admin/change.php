<?php
require('./includes/db.php');
$query=mysqli_query($conn, "Update appointment set status='".$_POST['val']."' where itr_no='".$_POST['itr_no']."'");
if($query)
{
	$q=mysqli_query($conn, "Select *from appointment where itr_no='".$_POST['itr_no']."' ");
	$data=mysqli_fetch_assoc($query);
	echo $data['$status'];
}
?>