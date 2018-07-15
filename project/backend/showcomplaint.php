<html>
<head>
<style>

table,td,th{
    border: 1px solid black;
    padding:7px;
    text-align: center;
}

table{
    border-collapse: collapse;
}

.wrap{
  word-wrap: break-word;
  width :300px;
}
</style>
</head>
<body>
<h1><center>Complaints</h1>





<?php

$errors = array(
                            1=>"OTHERS",
                            2=>"ATTEMPT TO COMMIT CRIME",
                            3=>"CHARGING EXORBITANT INTEREST",
                            4=>"CONSPIRACY",
                            5=>"COUNTERFEITING OF CURRENCY",
                            6=>"CRIMINAL INTIMIDATION",
                            7=>"CRIMINAL TRESPASS",
                            8=>"CYBER CRIMES",
                            9=>"DACOITY",
                            10=>"DOCUMENT MISSING",
                            11=>"EMBEZZLEMENT",
                            12=>"EVE TEASING",
                            13=>"EXTORTION",
                            14=>"FORGERY",
                            15=>"HURT",
                            16=>"IMPERSONATION",
                            17=>"INCITEMENT",
                            18=>"JUVENILE DELINQUENCY",
                            19=>"KIDNAPPING",
                            20=>"LAND GRABBING",
                            21=>"MISAPPROPRIATION",
                            22=>"MISCHIEF",
                            23=>"MISSING PERSONS",
                            24=>"MOBILE MISSING",
                            25=>"MURDER",
                            26=>"NON BANKING FINANCIAL INSTITUTION CASES",
                            27=>"NUISANCE",
                            28=>"OFFENCES AGAINST RELIGION &amp; PUBLIC WORSHIP",
                            29=>"OFFENCES AGAINST STATE",
                            30=>"OFFENCES RELATING TO MARRIAGE",
                            31=>"POLITICAL OFFENCE",
                            32=>"QUARREL / ALTERCATIONS",
                            33=>"RAGGING",
                            34=>"RAPE",
                            35=>"ROBBERY",
                            36=>"STOLEN PROPERTY",
                            37=>"THEFT",
                            38=>"TRAFFIC VIOLATIONS",
                            39=>"VEHICLE MISSING",
                            40=>"WOMEN HARASSMENT",
                            41=>"WRONGFUL CONFINEMENT");


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "feedback";
$conn = new mysqli($servername, $username, $password, $dbname);
session_start(); 
if($_GET['err']==1){
	$sql = "SELECT * FROM complaint WHERE `district`='".$_SESSION['name']."'";
}elseif($_GET['err']==2){
	$na=$_POST["from"];
	$nb=$_POST["to"];

	$sql = "SELECT * FROM complaint WHERE `district`='".$_SESSION['name']."' AND `date`>='".$na."' AND `date`<='".$nb."'";
}elseif($_GET['err']==3){
    $ma=$_POST["subject"];

    $sql = "SELECT * FROM complaint WHERE `district`='".$_SESSION['name']."' AND `subject`='".$ma."'";
}elseif($_GET['err']==4){

    $f=$_POST["ref"];
    $sql = "SELECT * FROM complaint WHERE `district`='".$_SESSION['name']."' AND `refno`='".$f."'";
}
else{
	echo "Error";
}	
	$result = $conn->query($sql);




if ($result->num_rows > 0) {

    echo "<h2><center>District : ".$_SESSION['name']."</center></h2>";
    echo "<table width='100%'>
            <tr>
                <th>Date</th>
                <th>Email Id</th>
                <th>Ref. No.</th>
                <th>Name</th>
                <th>Address</th>
                <th>Contact No</th>
                <th>Subject</th>
                <th>Date of Occurance</th>
                <th>Place of Occurance</th>
                <th>Description</th>
                <th>Status</th>
            </tr>";

    while(($row = $result->fetch_assoc())) {
        echo "<tr>
                <td>".$row["date"]."</td>
                <td>".$row["email_id"]."</td>
                  <td>".$row["refno"]."</td>
                <td>".$row["name"]."</td>
                <td><div class='wrap'>".$row["address"]."</div></td>
                <td>".$row["contactno"]."</td>
                <td>".$errors[$row["subject"]]."</td>
                <td>".$row["dateofocc"]."</td>
                <td><div class='wrap'>".$row["placeofocc"]."</div></td>
                <td><div class='wrap'>".$row["description"]."</div></td>
                <td><div class='wrap'>Current Status:".$row["status"]."<br><br>
                    <form method='POST' action='/project4/backend/update.php?err=".$row['refno']."'>
                    <input type='radio' name='status' value='Pending'>Pending
                    <input type='radio' name='status' value='In progress'>In progress
                    <input type='radio' name='status' value='Solved'>Solved<br><br>
                    <input type='submit' value='Update'>
                    </form>
                </div></td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?>
<br><br><br><center>
<button onclick="location.href='/project4/policehome.php'">Close</button>
</body>
</html>

