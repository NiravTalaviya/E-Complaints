<?php
session_start();
if(isset($_SESSION['emailid']))
{
	header('Location: /project4/backend/logout.php');
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
padding-bottom: 50px;
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

select{
	height:30px;
	background-color: #ffffff;
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
		var b=document.getElementById('name').value;
		var c=b.length;
		if(b==null || b=="")
		{
			alert("Please Enter Your  Name.");
			document.getElementById('name').focus();
			return false;
		}


		b=document.getElementById('email').value;
		c=b.length;
		
		if(b==null || b=="")
		{
			alert("Please Enter Your  Email Id.");
			document.getElementById('email').focus();
			return false;
		}

		var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		if(!re.test(b)){
			alert("Please Enter appropriate Email Id.");
			document.getElementById("email").focus();
			return false;
		}

		b=document.getElementById('gender').value;
		
		if(b==0)
		{
			alert("Please select gender");
			document.getElementById('gender').focus();
			return false;
		}

		b=document.getElementById('contact_no').value;
		c=b.length;
		
		if(b==null || b=="")
		{
			alert("Please Enter Your Contact No.");
			document.getElementById('contact_no').focus();
			return false;
		}

		if(c!=10 || isNaN(b))
		{
			alert("Please Enter appropriate Contact No.");
			document.getElementById('contact_no').focus();
			return false;
		}

		b=document.getElementById('address').value;
		c=b.length;
		
		if(b==null || b=="")
		{
			alert("Please Enter Your Address.");
			document.getElementById('address').focus();
			return false;
		}

		if(c>70)
		{
			alert("Maximum length of address is 70.");
			document.getElementById('address').focus();
			return false;
		}		
		
		b=document.getElementById('password').value;
		c=b.length;
		d=document.getElementById('re-password').value;


		if(b==null || b=="")
		{
			alert("Please Enter password.");
			document.getElementById('password').focus();
			return false;
		}

		if(c<6 || c>10)
		{
			alert("Minimum length of password is 6 and maximum 10 is allowed.");
			document.getElementById('password').focus();
			return false;			
		}

		if(b!=d)
		{
			alert("Password and Re-password doesn't match.");
			document.getElementById('re-password').focus();
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

<body onLoad="titlebar();security();" oncopy="return false" oncut="return false" onpaste="return false">

<header>
  <img src="banner.jpg" alt="Gujarat Police Logo" style="height:22%;overflow:hidden;width:100%;">

  <div class="navbar">
  
    <a href="home.php" >Home</a>
    
	<a href="new_complaint.php">New complaint</a>
    <a href="complaint_status.php">Complaint Status</a>
    <a href="FAQ.php">FAQ</a>
    <a href="Feedback.php">Feedback</a>
    <a href="aboutus.php">About Us</a>
    <?php
      
     if(!isset($_SESSION['emailid']))
     {
         
         echo '<a href="login.php" style="float:right;">Login</a>';
         echo '<a href="new_user.php" class="active" style="float:right;">New User</a>';
     }else{
       echo '<a href="/project4/backend/logout.php"  style="float:right;" >Logout</a>';
       echo '<a href="/project4/'.$_SESSION["role"].'" style="float:right;">'.$_SESSION['name'].'</a>';
        }
  ?> 
 
  </div>
</header>
<br>
<br>
<form method="POST" action="http://localhost/project4/backend/newuser.php">
<fieldset style="width:80%;border: 3.5px solid #4CAF50;border-radius: 25px;margin-left:9%;">
<legend style="font-size:35px;color:#333;">Sign Up</legend>
<br><br>
	<center>
	<div id="dv">
		<?php 

                                $errors = array(
                                    1=>"Email Id is already registered.",
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
	<td width="22%">Name :   <d>*</d></td>
	<td><input type="text" size="25" placeholder="Name" id="name" name="name" style="padding-left:4px;"/></td>
	</tr>	
	<tr>
	<td>Email :   <d>*</d></td>
	<td><input type="text" size="25" style="padding-left:4px;" placeholder="Email Id" id="email" name="email"/></td>
	</tr>
	<tr>
		<td>Gender :<d>*</d></td>
		<td>
			<select id="gender" background-color="white" name="gender">
							<option value="0">SELECT GENDER</option>
							<option value="male">Male</option>
							<option value="female">Female</option>
							<option value="other">Other</option>
			</select>
		</td>
	</tr>
	<tr>
	<td>Contact No :   <d>*</d></td>
	<td><input type="text" size="25" style="padding-left:4px;" placeholder="Contact No" id="contact_no" name="contact_no"/></td>
	</tr>
	<tr>
	<td valign="top">Address :   <d>*</d></td>
	<td><textarea size="25" placeholder="Address" id="address" name="address" style="padding-left:4px;"></textarea></td>
	</tr>
	<tr>
	<td>Password :   <d>*</d></td>
	<td><input type="password" size="25" style="padding-left:4px;" placeholder="Enter password" id="password" name="password"/></td>
	</tr>
	<tr>
	<td>Re-enter Password :   <d>*</d></td>
	<td><input type="password" size="25" style="padding-left:4px;" placeholder="Enter password" id="re-password"/></td>
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
		<input value="Submit" type="submit"  onclick="return myFunction()">
	</center>
	</div>
	</center>

<d>*</d><aaa>Required field</aaa>
</fieldset>
</form>

</body>
</html>

<?php

      $_SESSION['recent'] = "new_user.php";
?>