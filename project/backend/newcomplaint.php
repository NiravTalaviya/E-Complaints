<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "feedback";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


$na = $_SESSION["emailid"];
$nb = $_SESSION["name"];
$nc = $_SESSION["gender"];
$nd = $_POST["bday"];
$ne = $_SESSION["address"];
$nf = $_SESSION["contactno"];
$ng = $_POST["subject"];
$nh = $_POST["date_occ"];
$ni = $_POST["place_occ"];
$nj = $_POST["description"];
$nk = $_POST["district"];
$nl = rand(100000000,999999999);
$nm = "pending";
$nn = date("y/m/d"); 

$sql = "INSERT INTO complaint (email_id, name, gender, dateofbirth,  address, contactno, subject, dateofocc, placeofocc, description, district, refno, 	status, date)
VALUES ('$na', '$nb', '$nc', '$nd', '$ne', '$nf', '$ng', '$nh', '$ni', '$nj', '$nk', $nl, '$nm', '$nn')";

if ($conn->query($sql) === TRUE) {
    echo "<script type=\"text/javascript\">
    
    		alert('Your complaint number is ".$nl."');
    		window.open('http://localhost/project4/userhome.php','_self');
    	</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}	

$conn->close();
?>
