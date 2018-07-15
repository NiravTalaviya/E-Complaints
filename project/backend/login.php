<?php 
	require 'database-config.php';

	$emailid = $_POST['emailid'];
	$password = $_POST['password'];
	//user query   query1=user
 		$q1 = "SELECT * FROM `signup` WHERE `email_id`='$emailid' and `password`='$password'";	
		$query1 = $dbh->prepare($q1);	

		$query1->execute(array(':email_id' => $emailid, ':password' => $password));
//police query
		$q = "SELECT * FROM `police` WHERE `email_id`='$emailid' and `password`='$password'";	
		$query = $dbh->prepare($q);	

		$query->execute(array(':email_id' => $emailid, ':password' => $password));

	if($emailid=="admin@gmail.com" && $password=="admin123"){
		
		session_start();

		//$row = $query->fetch(PDO::FETCH_ASSOC);
		$_SESSION['name'] = "Admin";
		$_SESSION['emailid'] = "admin@gmail.com";
		$_SESSION['contactno'] = "9876543210";
		$_SESSION['address'] = "SVNIT,Surat,Gujarat";
		$_SESSION['gender'] = "Female";
		$_SESSION['recent'] = "adminhome.php";
		$_SESSION['role'] = "adminhome.php";
		header('Location: /project4/adminhome.php');
	}
	
	
	elseif($query1->rowCount() == 1){

		session_start();

			$row = $query1->fetch(PDO::FETCH_ASSOC);
			$_SESSION['name'] = $row['name'];
			$_SESSION['emailid'] = $row['email_id'];
			$_SESSION['contactno'] = $row['contact_no'];
			$_SESSION['address'] = $row['address'];
			$_SESSION['gender'] = $row['gender'];
			$_SESSION['recent'] = "userhome.php";
			$_SESSION['role'] = "userhome.php";
		header('Location: /project4/userhome.php');

	}
	
	elseif($query->rowCount() == 1){
		session_start();

			$row = $query->fetch(PDO::FETCH_ASSOC);
			$_SESSION['name'] = $row['district'];
			$_SESSION['emailid'] = $row['email_id'];
			$_SESSION['recent'] = "policehome.php";
			$_SESSION['role'] = "policehome.php";
		header('Location: /project4/policehome.php');

	}
	
	else{
		header('Location: /project4/login.php?err=1');
	}
	
?>
