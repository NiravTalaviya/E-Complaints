<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "feedback";
$conn = new mysqli($servername, $username, $password, $dbname);
$na=$_POST['status'];
$ref=$_GET['err'];

$r = "UPDATE `complaint` SET `status`='$na' WHERE `refno`='$ref'";
			if ($conn->query($r) == TRUE) {
    			header('Location: /project4/backend/showcomplaint.php?err=1');
		}else
		{
			echo "dsfdfhjkukiu";
		}
?>