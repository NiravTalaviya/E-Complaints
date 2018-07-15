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

</style>
<script>
	var scrl = " Gujarat Police E-protal";
		
	function titlebar() {
	 scrl = scrl.substring(1, scrl.length) + scrl.substring(0, 1);
	 document.title = scrl;
	 setTimeout("titlebar()", 150);
	 }

   function myFunction(){
    var a=document.getElementById('no').value;
    if(a==null || a=="")
    {
      alert("Please Enter Number of policeman.");
      document.getElementById('no').focus();
      return false;
    }
  }

  function myFunction1(){
    var a=document.getElementById('oldpassword').value;
    if(a==null || a=="")
    {
      alert("Please Enter Password.");
      document.getElementById('oldpassword').focus();
      return false;
    }

    var a=document.getElementById('newpassword').value;
    var c=a.length;
    if(a==null || a=="")
    {
      alert("Please Enter Password.");
      document.getElementById('newpassword').focus();
      return false;
    }
    if(c<6 || c>10)
    {
      alert("Minimum length of password is 6 and maximum 10 is allowed.");
      document.getElementById('newpassword').focus();
      return false;     
    }

    var b=document.getElementById('repassword').value;
    if(a==null || a=="")
    {
      alert("Please Enter Password.");
      document.getElementById('oldpassword').focus();
      return false;
    }

    if(b!=a)
    {
      alert("New password and Re-password doesn't match.");
      document.getElementById('repassword').focus();
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
     //  echo '<a href="/project4/userhome.php"  style="float:right;"  class="active">'.$_SESSION['name'].'</a>';
       echo '<a href="/project4/'.$_SESSION["role"].'" style="float:right;" class="active">'.$_SESSION['name'].'</a>';
     }
  	?>  
 
  </div>
</header>
<div class="w3-container w3-padding-32">
  <div class="w3-container w3-center w3-padding-top-16 w3-margin-top">
      <?php 

                                  $errors = array(
                                      1=>"Password Updated Successfully.",
                                      2=>"Updated Successfully.",
                                      3=>"Old Password is incorrect."
                                    );

                                  $error_id = isset($_GET['err']) ? (int)$_GET['err'] : 0;

                                  if ($error_id == 1) {
                                          echo '<div class="w3-container">
                                            <h1 class="w3-center w3-animate-top done">'.$errors[$error_id].'</h1>
                                        </div>';
                                      }elseif ($error_id == 2) {
                                        echo '<div class="w3-container">
                                            <h1 class="w3-center w3-animate-top done">'.$errors[$error_id].'</h1>
                                        </div>';
                                      }elseif ($error_id == 3) {
                                        echo '<p class="error">'.$errors[$error_id].'</p>';
                                      }
                                 ?>   
    <button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-black w3-large" style="width:218px">Edit Police Station Details</button>
<br><br><button onclick="document.getElementById('id03').style.display='block'" class="w3-button w3-black w3-large" style="width:218px">Show Complaints</button>

  </div>


  <div id="id01" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">

      <div class="w3-center"><br>
        <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
      </div>

      <form class="w3-container" method="POST" action="/project4/backend/addpoliceman.php">
        <div class="w3-section">
          <label><b>District</b></label>
          <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter district" value="<?php echo $_SESSION['name'];?>" id="district" name="district" readonly>
          <label><b>Number of Policeman</b></label>
          <input class="w3-input w3-border w3-margin-bottom" type="number" placeholder="Number of Policeman" id="no" name="no">
          <input class="w3-button w3-block w3-green w3-section w3-padding" value="Update" type="submit"  onclick="return myFunction()">
        </div>
      </form>

      <div class="w3-container w3-center w3-border-top w3-padding-16 w3-light-grey">
        <button onclick="document.getElementById('id01').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>
      </div>

    </div>
  </div>


  <div id="id03" class="w3-modal">
  
  <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
    
    <div class="w3-center"><br>
      <span onclick="document.getElementById('id03').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
    </div>

    <form class="w3-container" method="POST" action="/project4/backend/showcomplaint.php?err=2">
        
    <div class="w3-section">
      <br>
      
      <button class="w3-button w3-hover-black w3-block w3-teal w3-margin-bottom" type="button" onclick="location.href='/project4/backend/showcomplaint.php?err=1';">Show All Complaints</button>
      
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




    <form class="w3-container" method="POST" action="/project4/backend/showcomplaint.php?err=3">
        
    <div class="w3-section">
      <label><b>Search By Subject:</b></label><br><br>
      
      <div class="w3-row-padding">
                <select style="width:100%;padding:3px 0px;" id="subject" name="subject">
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
      </div>
      <input class="w3-button w3-block w3-green w3-section w3-hover-black w3-padding" value="Search" type="submit">
        </div>
    </form>


    <form class="w3-container" method="POST" action="/project4/backend/showcomplaint.php?err=4">
        
    <div class="w3-section">
      <label><b>Search By Reference No.:</b></label><br><br>
      
      <div class="w3-row-padding">
             <input class="w3-input w3-border" type="text" name="ref">           
      </div>
      <input class="w3-button w3-block w3-green w3-section w3-hover-black w3-padding" value="Search" type="submit">
        </div>
    </form>



    <div class="w3-container w3-center w3-border-top w3-padding-16 w3-light-grey">
      <button onclick="document.getElementById('id03').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>

    </div>
  </div>
  </div>
  






<div class="w3-container w3-center w3-margin-top">
  <button onclick="document.getElementById('id02').style.display='block'" class="w3-button w3-black w3-large" style="width:218px">Change Password</button>
  </div>

  <div id="id02" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">

      <div class="w3-center"><br>
        <span onclick="document.getElementById('id02').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
      </div>

      <form class="w3-container" method="POST" action="/project4/backend/pchangepassword.php">
        <div class="w3-section">
          <label><b>District</b></label>
          <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter district" value="<?php echo $_SESSION['name'];?>" id="district" name="district" readonly>
          <label><b>Old Password</b></label>
          <input class="w3-input w3-border w3-margin-bottom" type="password" id="oldpassword" name="oldpassword">
          <label><b>New Password</b></label>
          <input class="w3-input w3-border w3-margin-bottom" type="password" id="newpassword" name="newpassword">
          <label><b>Re-Password</b></label>
          <input class="w3-input w3-border w3-margin-bottom" type="password" id="repassword" name="repassword">
          <input class="w3-button w3-block w3-green w3-section w3-padding" value="Update" type="submit"  onclick="return myFunction1()">
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
