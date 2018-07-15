<?php
session_start();
if(!isset($_SESSION['emailid'])){
 header('Location: /project4/login.php?err=2');
}
?>
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

d{
	color:red;
}

aaa{
	font-size:15px;
}

#dv{
	background-color:#d1d1d1;
	height:60%;
	width:80%;
	padding-top:50px;
	border-radius:5px;
}

#padding{
	padding-left:50px;
}

input
{
	border:1px solid black;
	border-radius: 4px;
	height:27px;
}

textarea{
	border:1px solid black;
	border-radius: 4px;
	height:80px;
	width:80%;
}

input[type=date]::-webkit-inner-spin-button {
    -webkit-appearance: none;
    display: none;
}
input[type=number]::-webkit-inner-spin-button {
    -webkit-appearance: none;
    display: none;
}

input,textarea{
	border-radius: 0px;
	paddin:5px;
}
select{
	height:30px;
}

.colour{
	background:#c6f5bd;
}

#subject{
	background: #ffffff;
}
</style>
<script>
	var scrl = " Gujarat Police E-protal";
	var p;
	function titlebar() {
	 scrl = scrl.substring(1, scrl.length) + scrl.substring(0, 1);
	 document.title = scrl;
	 setTimeout("titlebar()", 150);
	 }

	function security() {
	var a=Math.floor(100000 + Math.random() * 900000);
	var b=a.toString();
	p=a.toString();

	b="   " +b+"   ";
	document.getElementById("se_code").innerHTML = b;
	}


	function myFunction(){

		


		b=document.getElementById('district').value;
		if(b=='0')
		{
		alert("Please select District.");
		document.getElementById('district').focus();
		return false;
 		}

 		b=document.getElementById('bday').value;
 		if(b=="")
 		{
 			alert("Please select date of birth.");
 			document.getElementById('bday').focus();
 			return false;
 		}

 		b=document.getElementById('subject').value;
		if(b=='0')
		{
		alert("Please select subject.");
		document.getElementById('subject').focus();
		return false;
 		}


 		


		b=document.getElementById('date_occ').value;
 		if(b=="")
 		{
 			alert("Please select date of occurrence.");
 			document.getElementById('date_occ').focus();
 			return false;
 		}


 		b=document.getElementById('place_occ').value;
 		c=b.length;
		if(b=="")
		{
		alert("Please enter place of occurrence.");
		document.getElementById('place_occ').focus();
		return false;
 		}
 		if(c>200)
 		{
 		alert("Maximu length of place of occurrence is 200.");
		document.getElementById('place_occ').focus();
		return false;	
 		}

 		b=document.getElementById('description').value;
		c=b.length;
		if(b=="")
		{
		alert("Please enter description.");
		document.getElementById('description').focus();
		return false;
 		}

 		if(c>200)
 		{
 		alert("Maximu length of discription is 200.");
		document.getElementById('description').focus();
		return false;	
 		}

 		var d=document.getElementById("code").value;
		if(p!=d)
		{
			alert("Invalid Captcha.");
			security();
			document.getElementById('code').focus();
			document.getElementById('code').value="";
			return false;
		}

	}






</script>


</head>

<body onLoad="titlebar();security();">

<header>
  <img src="banner.jpg" alt="Gujarat Police Logo" style="height:22%;overflow:hidden;width:100%;">

  <div class="navbar">
  
    <a href="home.php">Home</a>
    <a href="new_complaint.php"  class="active">New complaint</a>
    <a href="complaint_status.php">Complaint Status</a>
    <a href="FAQ.php">FAQ</a>
    <a href="Feedback.php">Feedback</a>
    <a href="aboutus.php">About Us</a>
    <?php
      
     if(!isset($_SESSION['emailid']))
     {
         
         echo '<a href="login.php" style="float:right;">Login</a>';
         echo '<a href="new_user.php">New User</a>';
     }else{
       echo '<a href="/project4/backend/logout.php"  style="float:right;" >Logout</a>';
       echo '<a href="/project4/'.$_SESSION["role"].'" style="float:right;">'.$_SESSION['name'].'</a>';
    }
  ?> 
 
 
  </div>
</header>
<form method="POST" action="http://localhost/project4/backend/newcomplaint.php"> 
<center>
<table style="border-radius: 25px;padding:40px;margin-top:55px;font-size:18px;border: 3.5px solid #4CAF50;width: 90%;">
	<tr>
		<td style="text-align:center;padding:4px 0px 4px 0px;border:1px solid #4CAF50;" colspan="2" class="colour">
			District
			<select style="margin-left:5px;" id="district" name="district">
				<option value="0">SELECT DISTRICT</option>
	<!--		
				
Kutch
Ahmedabad
Anand
Chhota Udaipur
Dahod
Kheda
Mahisagar
Panchmahal
Vadodara
Aravalli
Banaskantha
Gandhinagar
Mehsana
Patan
Sabarkantha
Amreli
Bhavnagar
Botad
Devbhoomi Dwarka
Gir Somnath
Jamnagar
Junagadh
Morbi
Porbandar
Rajkot
Surendranagar
Bharuch
Dang
Narmada
Navsari
Surat
Tapi
Valsad
				
				
		-->	


<?php

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "feedback";

	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 

	$sql = "SELECT no , district FROM police ORDER BY district";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			
			echo '<option value="'.$row["district"].'">'.$row["district"].'</option>';
		}
	} else {
		echo '<option value="89">none</option>';;
	}
	$conn->close();
?>	
		</td>
	</tr>
	<tr>
		<td width="50%" style="border:1px solid #4CAF50;">
			<table style="width:100%;">
				<tr>
					<td  valign="top"  colspan="2">
						<center><strong>Details of Complainant</strong></center>
					</td>
				</tr>
				<tr  class="colour">
					<td style="width:35%;">
						Name
					</td>
					<td>
						<input type="text" id="name" value="<?php echo $_SESSION['name'];?>" disabled="disabled" name="name" style="padding-left:4px;width:100%;" readonly/>
					</td>
				</tr>
				<tr>
					<td style="width:35%;">
						Gender
					</td>
					<td>
						<input type="text" id="gender" value="<?php echo $_SESSION['gender'];?>" disabled="disabled" name="gender" style="padding-left:4px;width:30%;"/>
					</td>
				</tr>
				<tr   class="colour">
					<td>
						Date of Birth
					</td>
					<td>
						<input type="date" name="bday" style="padding:5px;" id="bday" max="2007-11-17" min="1960-01-01">
					</td>
				</tr>
				<tr>
					<td valign="top">
						Address
					</td>
					<td>
						<textarea type="textarea" name="address" id="address" placeholder="address" disabled="disabled" style="width:100%;padding:5px;"></textarea>
						<script>
						document.getElementById('address').innerHTML="<?php echo $_SESSION['address'];?>";
						</script>
					</td>
				</tr>
				<tr  class="colour">
					<td>
						Contact No
					</td>
					<td>
						<input type="number" name="number" disabled="disabled" value="<?php echo $_SESSION['contactno'];?>"style="width:50%;padding:5px;" min="1000000000" max="9999999999" readonly>
					</td>
				</tr>
				<tr>
					<td>
						Email Id
					</td>
					<td>
						<input type="email" disabled="disabled" value="<?php echo $_SESSION['emailid'];?>" style="padding:5px;width:50%;" id="email" name="email" >
					</td>
				</tr>
			</table>
		</td>
		<td width="50%" style="border:1px solid #4CAF50;">
			<table style="width:100%;">
				<tr>
					<td colspan="2">
						<center><strong>Details of Complainant</strong></center>
					</td>
				</tr>
				<tr  class="colour">
					<td style="width:35%;">
						Subject
					</td>
					<td >
						<select style="width:100%;" id="subject" name="subject">
							<option value="0">SELECT SUBJECT</option>
							<option value="1">OTHERS</option>
							<option value="2">ATTEMPT TO COMMIT CRIME</option>
							<option value="3">CHARGING EXORBITANT INTEREST</option>
							<option value="4">CONSPIRACY</option>
							<option value="5">COUNTERFEITING OF CURRENCY</option>
							<option value="6">CRIMINAL INTIMIDATION</option>
							<option value="7">CRIMINAL TRESPASS</option>
							<option value="8">CYBER CRIMES</option>
							<option value="9">DACOITY</option>
							<option value="10">DOCUMENT MISSING</option>
							<option value="11">EMBEZZLEMENT</option>
							<option value="12">EVE TEASING</option>
							<option value="13">EXTORTION</option>
							<option value="14">FORGERY</option>
							<option value="15">HURT</option>
							<option value="16">IMPERSONATION</option>
							<option value="17">INCITEMENT</option>
							<option value="18">JUVENILE DELINQUENCY</option>
							<option value="19">KIDNAPPING</option>
							<option value="20">LAND GRABBING</option>
							<option value="21">MISAPPROPRIATION</option>
							<option value="22">MISCHIEF</option>
							<option value="23">MISSING PERSONS</option>
							<option value="24">MOBILE MISSING</option>
							<option value="25">MURDER</option>
							<option value="26">NON BANKING FINANCIAL INSTITUTION CASES</option>
							<option value="27">NUISANCE</option>
							<option value="28">OFFENCES AGAINST RELIGION &amp; PUBLIC WORSHIP</option>
							<option value="29">OFFENCES AGAINST STATE</option>
							<option value="30">OFFENCES RELATING TO MARRIAGE</option>
							<option value="31">POLITICAL OFFENCE</option>
							<option value="32">QUARREL / ALTERCATIONS</option>
							<option value="33">RAGGING</option>
							<option value="34">RAPE</option>
							<option value="35">ROBBERY</option>
							<option value="36">STOLEN PROPERTY</option>
							<option value="37">THEFT</option>
							<option value="38">TRAFFIC VIOLATIONS</option>
							<option value="39">VEHICLE MISSING</option>
							<option value="40">WOMEN HARASSMENT</option>
							<option value="41">WRONGFUL CONFINEMENT</option>
						</select>
					</td>
				</tr>
				<tr>
					<td style="width:35%;">
						Date of Occurrence
					</td>
					<td>
						<input type="date" name="date_occ" id="date_occ" style="padding:5px;"  min="2010-12-31" max="2017-11-23">
					</td>
				</tr>
				<tr   class="colour">
					<td valign="top">
						Place of Occurrence
					</td>
					<td>
						<textarea type="textarea"  name="place_occ" id="place_occ" placeholder="Description(Max. 200 Characters allowed" style="width:100%;padding:5px;"></textarea>
					</td>
				</tr>
				<tr>
					<td valign="top">
						Description
					</td>
					<td height="100px">
						<textarea type="textarea" id="description" name="description" placeholder="Description(Max. 200 Characters allowed" style="width:100%;height:100%;padding:5px;"></textarea>
					</td>
				</tr>
			</table>						
		</td>
	</tr>
	<tr   class="colour">
		<td colspan="2" style="text-align:center;height:50px;border:1px solid #4CAF50;">
			Security Code  

			<d id="se_code" style="background-color:#4CAF50;width:50px;margin-right:6px;padding:4px;color:ffffff;">000000</d>
			<input type="text"  size="25" placeholder="Enter code" id="code"  style="width:15%;padding-left:4px;
			margin-left:5px;"/>
			<img src="Refresh.png" onclick="security()" height="25" align="top">
		</td>
	</tr>
	<tr>
		<td colspan="2" style="text-align:center;">
			<br>
			<input  type="submit" value="Register" onclick="return myFunction()">
		</td>
	</tr>
</table>
</center>
</form>
</body>
</html>

<?php
      if(isset($_SESSION['emailid']))
	{
      $_SESSION['recent'] = "home.php";
  }
?>