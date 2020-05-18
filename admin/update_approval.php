<?php
   include'includes/conn1.php';
   if(isset($_POST['action'] == 'change_status') {
		$status = '';
		if($_POST['status'] == 'done') {
             $fetch['status'] = 'accept;';
		} else {
            $fetch['status'] = 'done';
		}
		
		$query =  'UPDATE appointment  SET status = :status WHERE itr_no = :itr_no';
		$statement = $connect->prepare($query);
		$statement->execute(

			array(
				':status'=> $fetch['status'],
				':itr_no'=> $_POST['itr_no']

			)
		); 
?>


