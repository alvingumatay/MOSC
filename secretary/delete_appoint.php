<?php
	if(ISSET($_GET['id'])){
		require_once 'includes/conn.php';
		$id = $_GET['id'];
		$query = $conn->prepare("DELETE from `appointment` WHERE `itr_no`='$id'");
		$query->execute();
 
		echo "<script>alert('Cancelled Successfully!')</script>";
		echo "<script>window.location='appoint.php'</script>";
	}
?>