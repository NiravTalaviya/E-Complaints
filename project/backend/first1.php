<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "feedback";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

//sql to delete record
/*$sql = "DELETE FROM Feedback WHERE feed_back=''";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}*/

//sql to insert record
$na = $_POST["emailid"];
$nb = $_POST["feedback"];
$sql = "INSERT INTO Feedback (email_id, feed_back)
VALUES ('$na', '$nb')";

if ($conn->query($sql) === TRUE) {
    echo "<script type=\"text/javascript\">
    		window.open('http://localhost/project4/Feedback.html','_self');
    		alert('Feedback submitted successfully');
    	</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}	

$conn->close();
?>
