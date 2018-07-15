


<?php 
	require 'database-config.php';

	$na = $_POST["name"];
	
	$nb = $_POST["email"];
	$nc = $_POST["contact_no"];
	$nd = $_POST["address"];
	$ne = $_POST["password"];
	$nf = $_POST["gender"];
	 

	
	$q = "SELECT * FROM `signup` WHERE `email_id`='$nb'";	
	$query = $dbh->prepare($q);	

	$query->execute(array(':email_id' => $nb));

	
	if($query->rowCount() != 0){
	header('Location: /project4/new_user.php?err=1');

	}else{
		
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "feedback";
		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error) {
    		die("Connection failed: " . $conn->connect_error);
		} 

		$sql = "INSERT INTO signup (name, email_id, contact_no, address, password, gender)
		VALUES ('$na', '$nb', '$nc', '$nd', '$ne', '$nf')";
		if ($conn->query($sql) === TRUE) {
			session_start();
			$_SESSION['name'] = $na;
			$_SESSION['emailid'] = $nb;
			$_SESSION['contactno'] = $nc;
			$_SESSION['address'] = $nd;
			$_SESSION['gender'] = $nf;
    				header('Location: /project4/userhome.php');
		} else {
    		echo "Error: " . $sql . "<br>" . $conn->error;
		}
		
	}


?>
