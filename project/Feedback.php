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

.error{
	color:red;
	margin-left: -8%;
}

.done{
	color:green;
}

</style>
<script>
	var scrl = " Gujarat Police E-protal";
	
	function titlebar() {
		 scrl = scrl.substring(1, scrl.length) + scrl.substring(0, 1);
		 document.title = scrl;
		 setTimeout("titlebar()", 150);
	 }


	var p;
	function security() {
		var a=Math.floor(100000 + Math.random() * 900000);
		var b=a.toString();
		p=a.toString();
		b="   " +b+"   ";
		document.getElementById("se_code").innerHTML = b;
	}




	function myFunction(){
		var b=document.getElementById('emailid').value;
		var c=b.length;
		
		if(b==null || b=="")
		{
			alert("Please Enter Your  Email Id.");
			document.getElementById('emailid').focus();
			return false;
		}

		var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		if(!re.test(b)){
			alert("Please Enter appropriate Email Id.");
			document.getElementById("emailid").focus();
			return false;
		}
		
		
		b=document.getElementById('feedback').value;
		c=b.length;
		if(b==null || b=="" || !isNaN(b))
		{
			alert("Please Enter Feedback.");
			document.getElementById('feedback').focus();
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
    <a href="new_complaint.php">New complaint</a>
    <a href="complaint_status.php">Complaint Status</a>
    <a href="FAQ.php">FAQ</a>
    <a href="Feedback.php" class="active">Feedback</a>
    <a href="aboutus.php">About Us</a>

    <?php
      session_start();
     if(!isset($_SESSION['emailid']))
     {
         
        echo '<a href="login.php" style="float:right;">Login</a>';
        echo '<a href="new_user.php" style="float:right;">New User</a>';
     }else{
       echo '<a href="/project4/backend/logout.php"  style="float:right;" >Logout</a>';
       echo '<a href="/project4/'.$_SESSION["role"].'" style="float:right;">'.$_SESSION['name'].'</a>';
     }
  	?>  
  
  </div>
</header>
<br>
<br>
<form method="POST" action="http://localhost/project4/backend/feedback.php" name="fr">
<fieldset style="width:80%;border: 3.5px solid #4CAF50;border-radius: 25px;margin-left:9%;">
<legend style="font-size:35px;color:#333;">Feedback-Form</legend>
<br><br>
	<center>
	<div id="dv">
		<?php 

                                $errors = array(
                                    1=>"Invalid user name or password, Try again.",
                                    2=>"Submitted Successfully."
                                  );

                                $error_id = isset($_GET['err']) ? (int)$_GET['err'] : 0;

                                if ($error_id == 1) {
                                        echo '<p class="error">'.$errors[$error_id].'</p>';
                                    }elseif ($error_id == 2) {
                                        echo '<p class="done">'.$errors[$error_id].'</p>';
                                    }
                               ?>   
	<table width="80%" style="border-spacing: 10px;margin-left:10%;color:#000000;">
		
	<tr>
	<td width="22%">Email ID :   <d>*</d></td>
	<td><input type="text" size="25" placeholder="Email ID" name="emailid" id="emailid" style="padding-left:4px;"/></td>
	</tr>
	<tr>
	<td>Password :   <d>*</d></td>
	<td><input type="password" size="25" style="padding-left:4px;" name="password" placeholder="Enter password" id="password"/></td>
	</tr>
	<tr>
	<td valign="top">Feedback :   <d>*</d></td>
	<td><textarea size="25" placeholder="Feedback" name="feedback" id="feedback" style="padding-left:4px;"></textarea></td>
	</tr>
	<tr>
	<td>Enter Secure code :   <d>*</d></td>
	<td valign="middle">
	<div id="se_code" style="float:left;background-color:#4CAF50;margin-right:6px;padding:4px;color:ffffff;">000000</div>
	<input type="text"  size="25" placeholder="Enter code" id="code"  style="width:25%;padding-left:4px;"/>
	<img src="Refresh.png" onclick="security()" height="25" align="top">
	</td>
	</tr>
	
	</table><br><br>
	<center>
		<input  type="submit" value="Submit" onclick="return myFunction()">
	</center>
	</div>
	</center>

<d>*</d><aaa>Required field</aaa>
</fieldset>
</form>

</body>
</html>
<?php

      $_SESSION['recent'] = "Feedback.php";
?>

