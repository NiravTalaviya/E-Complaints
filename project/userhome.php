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

table {
    border-collapse: collapse;
    width: 100%;
}

td ,th{
    border-bottom: 1px solid #ddd;
    padding: 10px;
}
th{
  font-size:25px;
}
.wrap{
  word-wrap: break-word;
  width :500px;
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
       echo '<a href="/project4/userhome.php"  style="float:right;"  class="active">'.$_SESSION['name'].'</a>';
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
    <button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-black w3-large" style="width:218px">Profile</button>
    </div>
    <div  id="id01" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="width:600px">
      <table style="width:600px">
        <tr>
          <th colspan="2">Profile</th>
        </tr>
        <tr>
          <td style="width:250px;border">Name</td>
          <td><?php echo $_SESSION['name'];?></td>
        </tr>
        <tr>
          <td>Gender</td>
          <td><?php echo $_SESSION['gender'];?></td>
        </tr>
        <tr>
          <td>Email Id</td>
          <td><?php echo $_SESSION['emailid'];?></td>
        </tr>
        <tr>
          <td>Contact No</td>
          <td><?php echo $_SESSION['contactno'];?></td>
        </tr>
        <tr>
          <td>Address</td>
          <td><div class="wrap"><?php echo $_SESSION['address'];?></div></td>
        </tr>
      </table>
      <div class="w3-container w3-center w3-border-top w3-padding-16 w3-light-grey">
        <button onclick="document.getElementById('id01').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>
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

      <form class="w3-container" method="POST" action="/project4/backend/uchangepassword.php">
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
