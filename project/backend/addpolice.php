


<?php 
	require 'database-config.php';

	$na = $_POST["district"];
	
	$nb = $_POST["emailid"];
	$nc = $_POST["password"];
	 

	
	$q = "SELECT * FROM `police` WHERE `district`='$na' OR `email_id`='$nb'" ;	
	$query = $dbh->prepare($q);	

	$query->execute(array(':email_id' => $nb));

	
	if($query->rowCount() != 0){
	header('Location: /project4/adminhome.php?err=1');

	}else{
		
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "feedback";
		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error) {
    		die("Connection failed: " . $conn->connect_error);
		} 

		$sql = "INSERT INTO police (district, email_id, password)
		VALUES ('$na', '$nb', '$nc')";
		if ($conn->query($sql) === TRUE) {
			header('Location: /project4/adminhome.php?err=2');
		} else {
    		echo "Error: " . $sql . "<br>" . $conn->error;
		}
		
	}


?>
