




<?php 
		$servername = "localhost";
	 	$username = "root";
	 	$password = "";
	 	$dbname = "feedback";
	 	$conn = new mysqli($servername, $username, $password, $dbname);
	$na = $_POST['oldpassword'];
	$nb = $_POST['district'];
	$nc = $_POST['newpassword'];


	$s = "SELECT * FROM `police` WHERE `district`='$nb' AND `password`='$na'";
		$result = $conn->query($s);
		if ($result->num_rows == 1){

			$r = "UPDATE `police` SET `password`='$nc' WHERE `district`='$nb'";
			if ($conn->query($r) == TRUE) {
    			header('Location: /project4/policehome.php?err=1');
			}

		}else {
	    		header('Location: /project4/policehome.php?err=3');
		}
?>
