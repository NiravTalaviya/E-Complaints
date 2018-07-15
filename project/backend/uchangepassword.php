




<?php 
		session_start();
		$servername = "localhost";
	 	$username = "root";
	 	$password = "";
	 	$dbname = "feedback";
	 	$conn = new mysqli($servername, $username, $password, $dbname);
	$na = $_POST['oldpassword'];
	$nc = $_POST['newpassword'];
	$nd = $_SESSION['emailid'];
	$s = "SELECT * FROM `signup` WHERE `email_id`='$nd' AND `password`='$na'";
		$result = $conn->query($s);
		if ($result->num_rows == 1){

			$r = "UPDATE `signup` SET `password`='$nc' WHERE `email_id`='$nd'";
			if ($conn->query($r) == TRUE) {
    			header('Location: /project4/userhome.php?err=1');
			}

		}else {
	    		header('Location: /project4/userhome.php?err=3');
		}
?>
