<?php
include './includes/db.php';

$get_id=$_REQUEST['appoint_id'];

$sql = "UPDATE appointment SET status ='done' WHERE appoint_id = '$get_id' ";

$conn->exec($sql);
echo "<script>alert('Successfully  Done a Process!'); window.location='approve_appoint.php'</script>";
?>