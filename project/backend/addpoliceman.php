


<?php 
		$servername = "localhost";
	 	$username = "root";
	 	$password = "";
	 	$dbname = "feedback";
	 	$conn = new mysqli($servername, $username, $password, $dbname);
	$na = $_POST['no'];
	$nb = $_POST['district'];
	$r = "UPDATE `police` SET `policeman`='$na' WHERE `district`='$nb'";

	if ($conn->query($r) === TRUE) {
    	header('Location: /project4/policehome.php?err=2');
	} else {
	    echo "Error updating record: " . $conn->error;
	}
?>
