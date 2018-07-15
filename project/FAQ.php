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
	
	function ans(x){
		var a=document.getElementById(x);
		if(a.style.display=="none")
		{
			a.style.display="block";
		}else{
			a.style.display="none";
		}	
	}
</script>


</head>

<body onLoad="titlebar()">

<header>
  <img src="banner.jpg" alt="Gujarat Police Logo" style="height:22%;overflow:hidden;width:100%;">

  <div class="navbar">
    <a href="home.php">Home</a>
    <a href="new_complaint.php">New complaint</a>
    <a href="complaint_status.php">Complaint Status</a>
    <a href="FAQ.php" class="active">FAQ</a>
    <a href="Feedback.php">Feedback</a>
    <a href="aboutus.php">About Us</a>

    <?php
      session_start();
     if(!isset($_SESSION['emailid']))
     {
         
        echo '<a href="login.php" style="float:right;">Login</a>';
        echo '<a href="new_user.php" style="float:right;">New User</a>';
     }else{
       echo '<a href="/project4/backend/logout.php"  style="float:right;" >Logout</a>';
       echo '<a href="/project4/'.$_SESSION["role"].'" style="float:right;">'.$_SESSION['name'].'</a>';}
  	?>  
 
  </div>
</header>
<br>
<br>
<center>
<br>
<table style="border-radius: 25px;padding:10px;font-size:18px;border: 3.5px solid #4CAF50; border-collapse: separate; width: 63%;">
	<tr>
		<td>


<p id="q1" onclick="ans('a1')">Q1.What is First Information Report (FIR) ?</p>
<p id="a1" style="display:none;color:blue;padding-left:27px;">
		Report pertaining to occurrence of a cognizable offence, received at the Police Station is called First Information Report, 			popularly known as FIR. Since it is the first information about the cognizable offence, it is called First Information report. On 			receipt of this information police registers the report in a FIR Register and begins the investigation of the crime.

		<br><br>If your complaint does not disclose any offence or your complaint discloses only non-cognizable offence, then FIR cannot 			be registered. In such cases where only non-cognizable offence is made out, Police officer will enter the substance of information 			in the general diary of Police Station and give copy of same to complainant. Another copy of complaint is sent to the concerned 		judicial magistrate for further action. Police does not have powers to investigate a non-cognizable offence without the orders of 			the magistrate

</p>



<p id="q2" onclick="ans('a2')">Q2.How do I lodge F.I.R ?</p>
<p id="a2" style="display:none;color:blue;padding-left:27px;">
	The informant/ complainant should go to the police station having jurisdiction over the area (where the offence is committed) and report 		to officer in-charge/ station house officer about commission of a cognizable offence. In case information is given on telephone, the 		informant / complainant should subsequently go to the police station for registration of F.I.R.
</p>




<p id="q3" onclick="ans('a3')">Q3.What is a cognizable case or what is cognizable offence ?</p>
<p id="a3" style="display:none;color:blue;padding-left:27px;">
	A cognizable case means a case in which a police officer may, in accordance with the First Schedule of Cr.P.C. (1973), or under any other 		law for the time being in force, arrest without warrant.

	<br><br>In Cr. PC, the offences are divided into two categories; one Cognizable and the other Non-cognizable. Police is empowered to register the FIR and investigate only the cognizable offences. Police can arrest an accused involved in cognizable crime without the warrant from the Court.
</p>





<p id="q4" onclick="ans('a4')">Q4.What are cognizable and non-cognizable offences ?</p>
<p id="a4" style="display:none;color:blue;padding-left:27px;">
	Cognizable offence :- An offence for which a police officer has the powers to arrest without a warrant is defined as a cognizable offence. 		Offences like murder, rape ,kidnapping , theft , robbery , fraud etc. are classified as cognizable. To get detailed list of cognizable 		offence kindly refer to first schedule of Criminal Procedure Code.

	<br><br>Non cognizable offence :- An offence for which a police officer does not have the power to arrest the accused without warrant. To get 		detailed list of non-cognizable offences please refer to first schedule of Criminal Procedure Code
</p>


<p id="q5" onclick="ans('a5')">Q5.In case of emergency, what should I do ?</p>
<p id="a5" style="display:none;color:blue;padding-left:27px;">
	Intimate to the nearest police station or control room [100].
</p>





<p id="q6" onclick="ans('a6')">Q6.What shall I do in case of loss/theft of documents like license, passport, certificates and credit/debit cards ?</p>
<p id="a6" style="display:none;color:blue;padding-left:27px;">
Give a complaint in the jurisdictional police station.Get acknowledgement in form of CSR.

<br><br>If the missing/stolen document is not traced within a week, a non traceable certificate can be obtained from the police station on request.
</p>




<p id="q7" onclick="ans('a7')">Q7.If I come to witness an accident, how should I react? Will there be any legal complications from the police department ?</p>
<p id="a7" style="display:none;color:blue;padding-left:27px;">
Immediately call 108/any ambulance services.
<br><br>Doctors in any hospital are bound to give first aid.
<br><br>Person who informs will not be forced against his/her wishes to give a complaint/appear as witness.

</p>





<p id="q8" onclick="ans('a8')">Q8.Can a common citizen meet the DGP of TN/COPs ?</p>
<p id="a8" style="display:none;color:blue;padding-left:27px;">
Yes. Any common man meet the DGP, Tamil Nadu during visiting hours.
</p>



<p id="q9" onclick="ans('a9')">Q9.Can I report a crime online ?</p>
<p id="a9" style="display:none;color:blue;padding-left:27px;">
Yes, you can. Link is <a href="home.php"> Gujarat Police E-protal.</a>
</p>


<p id="q10" onclick="ans('a10')">Q10.How can I volunteer my services to the City Police ?</p>
<p id="a10" style="display:none;color:blue;padding-left:27px;">During exigencies, natural calamites, traffic jams, fair and festivals, etc. You can approach the Senior officers on duty with proper identity card to officer your service to the society. Then, you will be treated as Special Police officer for such service and you can exercise this power of police officers with some limitation.
</p>

<p id="q11" onclick="ans('a11')">Q11.How can I register a complaint ?</p>
<p id="a11" style="display:none;color:blue;padding-left:27px;">Complaint about any offense can be given in writing / orally to the nearby police station. The officer in charge will register a case and give a copy of the FIR/CSR free of cost. Also,there is provision to log complaints online(with contact details). If required, you will be called to the police for a written complaint and further action(eservices.tnpolice.gov.in).</p>


<p id="q12" onclick="ans('a12')">Q12.Can the police say 'no' to register a crime case ?</p>
<p id="a12" style="display:none;color:blue;padding-left:27px;">No, all crime cases will be registered. In case of any exceptional cases, the district level officers can be approached.


<p id="q13" onclick="ans('a13')">Q13.Whether I have to sign the FIR for a crime case to be registered ?</p>
<p id="a13" style="display:none;color:blue;padding-left:27px;">Based on written complaint, police will register an FIR. You have to sign both in your complaint as well as in the FIR in the place of signature of informant. If your information is reduced into writing by a police officer, then, complainant have to sign the same after going through/hearing the contents.The signature in the FIR is acknowledgement for getting a copy of the FIR.</p>


<p id="q14" onclick="ans('a14')">Q14.Whether other than FIR, I have to put signature in a statement recorded by the police during investigation of the case ?</p>
<p id="a14" style="display:none;color:blue;padding-left:27px;">Police will not demand your signature in your statement if recorded by police in case of investigation emanated from an FIR.</p>


<p id="q15" onclick="ans('a15')">Q15.Whether I will get a copy of the FIR, registered on my complaint free of cost ?</p>
<p id="a15" style="display:none;color:blue;padding-left:27px;">Yes. It is a mandate for the police to give a copy of FIR to the informant only at free of cost, not otherwise. If it is not given, it is a deviation to the procedure established by law.</p>


<p id="q16" onclick="ans('a16')">Q16.Whether a police officer can search a person / place without a search warrant ?</p>
<p id="a16" style="display:none;color:blue;padding-left:27px;">Yes, Police officer is empowered to search a person without order from a magistrate or without a warrant with advance intimation to the jurisdictional courts. Whereas to search a place, advance intimation to the jurisdiction court is sufficient.</p>


		</td>
	</tr>
</table>
	</center>
</body>
</html>
<?php

      $_SESSION['recent'] = "FAQ.php";
?>
