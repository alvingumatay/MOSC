<?php 
//action.php
if(isset($_POST["action"]))
{
	include('./includes/conn1.php');
	if($_POST["action"]=='fetch')
	{
		$output ='';
		$query = "SELECT * FROM  appointment WHERE status = 'pending' ORDER BY tdate DESC;";
		$statement = $connect->prepare($query);
		$statement->execute();
		$result = $statement->fetchAll();
		$output .='
         <table class="table table-bordered table-striped">
         <tr>
            <td>Patient No.</td>
            <td>Patient Name</td>
            <td>Contact</td>
            <td>Services and Ammount</td>
            <td>Date</td>
            <td>Time</td>
            <td>Status</td>
           <td>Action</td> 
         </tr>
        
		';
		foreach ($result as $row) 
		{
		  $status = '';
		  if($row["status"] == 'accepted')
		  {
             $status = '<span class="label label-success">accepted</span>';
		  }	
		  else
		  {
               $status = '<span class="label label-danger">pending</span>';
		  }
		  $output .='
             <tr>
             <td>'.$row["itr_no"].'</td>
             <td>'.$row['firstname']." ".$row['lastname'].'</td>
             <td>'.$row["contact"].'</td>
             <td>'.$row["servtype"].'</td>
             <td>'.$row["tdate"].'</td>
             <td>'.$row["dtime"].'</td> 
             <td>'.$status.'</td>
              <td><button type="button" name="action" class="btn btn-info btn-xs action" data-itr_no="'.$row["itr_no"].'" data-status="'.$row["status"].'">Accept</button></td>
             </tr>
		  ';
		}
		$output .= '</table>';
		echo $output;
	}
	if ($_POST["action"] == 'change_status')
	{
		$status = '';
		if($_POST['status'] == 'accepted')
		{
             $status = 'pending;';
		}
		else
		{
             $status = 'accepted';
		}
		$query =  '
		UPDATE appointment  SET status = :status WHERE itr_no = :itr_no';
		$statement = $connect->prepare($query);
		$statement->execute(

			array(
				':status'          =>  $status,
				':itr_no'              => $_POST['itr_no']

			)
		); 
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo '<div class="alert alert-success">Appointment status has been set to be <strong>'.$status.'</strong></div>';
		}
	}
	}	

?>