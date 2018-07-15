<?php 
	//complete
	require 'database-config.php';


	$emailid = "";
	$feedback = "";
	$password = "";
	$date = date("y/m/d");
		$emailid = $_POST['emailid'];
		$feedback = $_POST['feedback'];
		$password = $_POST['password'];
	 
	
	$q = "SELECT * FROM `signup` WHERE `email_id`='$emailid' and `password`='$password'";	
	$query = $dbh->prepare($q);	

	$query->execute(array(':email_id' => $emailid, ':password' => $password));


	if($query->rowCount() == 0){
	header('Location: /project4/Feedback.php?err=1');

	}else{
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "feedback";
		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error) {
    		die("Connection failed: " . $conn->connect_error);
		} 
		$sql = "INSERT INTO Feedback (email_id, date, feed_back) VALUES ('$emailid', '$date', '$feedback')";

		if ($conn->query($sql) === TRUE) {
    				header('Location: /project4/Feedback.php?err=2');
		} else {
    		echo "Error: " . $sql . "<br>" . $conn->error;
		}
		
	}


?>
