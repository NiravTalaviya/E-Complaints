<?php
session_start();
if(!isset($_SESSION['emailid']))
{
	header('Location: /project4/login.php?err=2');
}
?>
<html>
<head>
<title></title>
<link rel="stylesheet" href="/project4/w3.css">
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

.error{
  color:red;
  font-size: 20px;
}

.done{
  color:green;
  font-size: 25px;
}


th, td {
    border: 1px solid black;
    overflow: auto;
}
table{
  padding:10%;
}

</style>
<script>
	var scrl = " Gujarat Police E-protal";
		
	function titlebar() {
	 scrl = scrl.substring(1, scrl.length) + scrl.substring(0, 1);
	 document.title = scrl;
	 setTimeout("titlebar()", 150);
	 }


   function myFunction(){
    var b=document.getElementById('district').value;
    var c=b.length;
    
    if(b==null || b=="")
    {
      alert("Please Enter District.");
      document.getElementById('district').focus();
      return false;
    }


    b=document.getElementById('emailid').value;
    c=b.length;
    
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
    <a href="FAQ.php">FAQ</a>
    <a href="Feedback.php">Feedback</a>
    <a href="aboutus.php">About Us</a>

    <?php
     if(!isset($_SESSION['emailid']))
     {
         
        echo '<a href="login.php" style="float:right;">Login</a>';
        echo '<a href="new_user.php" style="float:right;">New User</a>';
     }else{
       echo '<a href="/project4/backend/logout.php"  style="float:right;" >Logout</a>';
       
       echo '<a href="/project4/'.$_SESSION["role"].'"   class="active" style="float:right;">'.$_SESSION['name'].'</a>';
     }
    ?>  
 
  </div>
</header>
<div class="w3-container w3-padding-32">
  <div class="w3-container w3-center w3-padding-64 w3-margin-top">
    <?php 

                                $errors = array(
                                    1=>"District or Email Id already added.",
                                    2=>"Added Successfully."
                                  );

                                $error_id = isset($_GET['err']) ? (int)$_GET['err'] : 0;

                                if ($error_id == 1) {
                                        echo '<p class="error">'.$errors[$error_id].'</p>';
                                    }elseif ($error_id == 2) {
                                        echo '<p class="done">'.$errors[$error_id].'</p>';
                                    }
                               ?>   
    <button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-black w3-large" style="width:200px">Add Police Station</button>
<br><br><button onclick="document.getElementById('id02').style.display='block'" class="w3-button w3-black w3-large" style="width:200px">Show Feedbacks</button>

    </div>
  <div id="id01" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">

      <div class="w3-center"><br>
        <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
      </div>

      <form class="w3-container" method="POST" action="/project4/backend/addpolice.php">
        <div class="w3-section">
          <label><b>District</b></label>
          <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter district" id="district" name="district">
          <label><b>Email Id</b></label>
          <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Email id" id="emailid" name="emailid">
          <label><b>Password</b></label>
          <input class="w3-input w3-border w3-margin-bottom" type="password" placeholder="Enter Password" name="password" id="password">
          <label><b>Re-Password</b></label>
          <input class="w3-input w3-border w3-margin-bottom" type="password" placeholder="Enter Password Again " id="re-password">
          <!--<button class="w3-button w3-block w3-green w3-section w3-padding" onclick="return myFunction()" type="submit">Add</button>
          --><input class="w3-button w3-block w3-green w3-section w3-padding" value="Submit" type="submit"  onclick="return myFunction()">
        </div>
      </form>

      <div class="w3-container w3-center w3-border-top w3-padding-16 w3-light-grey">
        <button onclick="document.getElementById('id01').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>

      </div>

    </div>
  </div>
  
  <div id="id02" class="w3-modal">
	
	<div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
		
		<div class="w3-center"><br>
			<span onclick="document.getElementById('id02').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
		</div>

		<form class="w3-container" method="POST" action="/project4/backend/show.php?err=2">
        
		<div class="w3-section">
			<br>
			
			<button class="w3-button w3-hover-black w3-block w3-teal w3-margin-bottom" type="button" onclick="location.href='/project4/backend/show.php?err=1';">Show All Feedbacks</button>
			
			<label><b>Search By Date:</b></label><br><br>
		  
			<div class="w3-row-padding">
			
				<div class="w3-half">
					<label><b>From:</b></label>
					<input class="w3-input w3-animate-input" type="date" name="from" style="width:170px">
				</div>
				
				<div class="w3-half">
					<label><b>To:</b></label>
					<input class="w3-input w3-animate-input" type="date" name="to" style="width:170px">
				</div>
				
			</div>
			<input class="w3-button w3-block w3-green w3-section w3-hover-black w3-padding" value="Search" type="submit">
        </div>
		</form>

		<div class="w3-container w3-center w3-border-top w3-padding-16 w3-light-grey">
			<button onclick="document.getElementById('id02').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>

		</div>
	</div>
  </div>
  
</div>
</body>
</html>
<?php

      $_SESSION['recent'] = "home.php";
?>

 