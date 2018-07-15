<?php 
	//complete
	require 'database-config.php';


	// $emailid = "";
	// $feedback = "";
	// $password = "";
	// $date = date("y/m/d");
	 	$refno = $_POST['complaintno'];
	// 	$feedback = $_POST['feedback'];
	// 	$password = $_POST['password'];
	 
	$status = "";
	$q = "SELECT * FROM `complaint` WHERE `refno`='$refno'";	
	$query = $dbh->prepare($q);	

	$query->execute(array(':refno' => $refno, ':status' => $status));


	if($query->rowCount() == 0){
	header('Location: /project4/complaint_status.php?err=1');

	}else{		
		session_start();

			$row = $query->fetch(PDO::FETCH_ASSOC);
			$_SESSION['refno'] = $row['refno'];
			$_SESSION['status'] = $row['status'];
  	// 	if($row['status']=="pending"){
			header('Location: /project4/complaint_status.php?err=2');  			
  	// 	}
  	// 	elseif($row['status']=="in progress"){
			// header('Location: /project4/complaint_status.php?err=3');  			
  	// 	}else{
			// header('Location: /project4/complaint_status.php?err=4');  			
  	// 	}		
	}


?>
