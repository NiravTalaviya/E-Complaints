<html>
<head>
<title></title>
<link rel="icon" type="image/gif/png" href="logo.png">
<style>
body {margin:0;}
.navbar {
    overflow: hidden;
    background-color: #333;
}

.navbar a {
    float: left;
    font-size: 16px;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

.active{
background-color: #4CAF50;
}


.navbar a:hover{
    background-color: #3C9F40;
}

</style>
<script>
	var scrl = " Gujarat Police E-protal";
		
	function titlebar() {
	 scrl = scrl.substring(1, scrl.length) + scrl.substring(0, 1);
	 document.title = scrl;
	 setTimeout("titlebar()", 150);
	 }
</script>


</head>

<body onLoad="titlebar()">

<header>
  <img src="banner.jpg" alt="Gujarat Police Logo" style="height:22%;overflow:hidden;width:100%;">

  <div class="navbar">
  	<a href="home.php"  >Home</a>
	<a href="new_complaint.php">New complaint</a>
    <a href="complaint_status.php">Complaint Status</a>
    <a href="FAQ.php">FAQ</a>
    <a href="Feedback.php">Feedback</a>
    <a href="aboutus.php" class="active">About Us</a>

    <?php
      session_start();
     if(!isset($_SESSION['emailid']))
     {
         
        echo '<a href="login.php" style="float:right;">Login</a>';
        echo '<a href="new_user.php" style="float:right;">New User</a>';
     }else{
       echo '<a href="/project4/backend/logout/backend/logout.php"  style="float:right;" >Logout</a>';
       echo '<a href="/project4/'.$_SESSION["role"].'" style="float:right;">'.$_SESSION['name'].'</a>';
     }
  ?>
 
  </div>
</header>
<br>
<br>
<center>
<br>
<table style="border-radius: 25px;padding:10px; font-size:18px;border: 3.5px solid #4CAF50; border-collapse: separate; width: 60%;">
	<tr>
		<td><p>CCTNS is a Mission Mode Project (MMP) under the National e-Governance Plan (NeGP) of Government of India. It has been conceptualized and sponsored by the Ministry of Home Affairs (MHA). National Crime Records Bureau (NCRB) is the central nodal agency for managing the nationwide implementation of this project and the respective State Crime Records Bureau (SCRB), the State Nodal Agency for implementation in the State.</p><p><strong>SCOPE</strong></p>
		<p>CCTNS aims at creating a comprehensive and integrated system for enhancing the efficiency and effective policing at all levels and especially at the Police Station level through adoption of principles of e-Governance, and creation of a nationwide networked infrastructure for evolution of IT-enabled state-of-the-art tracking system around “investigation of crime and detection of criminals” in real time/near real time.</p><p><strong>OBJECTIVES</strong></p>
	<ul>
		<li>Make the Police functioning citizen friendly and more transparent by automating the functioning of Police Stations.</li>
		<li>Improve delivery of citizen-centric services through effective usage of Information and Communication Technology.

</li>
		<li>Provide the Investigating Officers of the Civil Police with tools, technology and information to facilitate investigation of crime and detection of criminals.

</li>
		<li>Improve Police functioning in various other areas such as Law & Order, Traffic Management etc.

</li>
		<li>Facilitate Interaction and sharing of Information among Police Stations, Districts, State/UT headquarters and other Police Agencies.</li>
		<li>Assist senior Police Officers in better management of Police Force.</li>
		<li>Keep track of the Progress of Cases, including in Courts.</li>
		<li>Reduce manual and redundant Records keeping.</li>
	</ul>
	<strong>GOVERNING STRUCTURES</strong>
<p>
The Government of Tamil Nadu signed Memorandum of Understanding (MoU) with Ministry of Home Affairs (MHA), GOI on 10.02.2009 and notified the constitution of governing structures such as, State Apex Committee (SAC), State Empowered Committee (SEC), State Mission Team (SMT) and District Mission Team (DMT) as per G.O. Ms.871/Home (Modern)/Dept, dated: 09.10.2009. It also designated ELCOT as State Project Management Consultancy (SPMC) and Tamil Nadu Police Housing Corporation (TNPHC) as State Designated Agency (SDA) for channelizing the receipt of funds from MHA and monitoring the utilization for the same.</p>
<center><img src="graph.png" ></center>
		</td>
	</tr>
</table>
	</center>
</body>
</html>

<?php

      $_SESSION['recent'] = "aboutus.php";
?>
