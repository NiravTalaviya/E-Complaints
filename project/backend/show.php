<html>
<head>
<style>

table,td,th{
    border: 1px solid black;
}



</style>
</head>
<body>
<h1><center>Feedbacks</h1>





<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "feedback";
$no=0;
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
if($_GET['err']==1){
	$sql = "SELECT email_id , date , feed_back FROM Feedback";
}elseif($_GET['err']==2){
	$na=$_POST["from"];
	$nb=$_POST["to"];

	$sql = "SELECT email_id , date , feed_back FROM Feedback WHERE `date`>='".$na."' AND `date`<='".$nb."'";
}
else{
	echo "dfffr";
}	
	$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th width='35px'>No.</th><th width='250px'>Email Id</th><th width='100px'>Date</th><th>Feedback</th></tr>";

    while(($row = $result->fetch_assoc()) && $no=$no+1) {
        echo "<tr><td>".$no."</td><td>".$row["email_id"]."</td><td>".$row["date"]."</td><td>".$row["feed_back"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?>
</body>
</html>

