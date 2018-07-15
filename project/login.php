<html>
<head>
<title></title>
<link rel="icon" type="image/gif/png" href="logo.png">
<style>
body {margin:0;background:radial-gradient(rgba(11, 146, 146, 0.23), rgb(95, 17, 65));
}

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

.active {
    background-color: #4CAF50;
    color: white;
}

.navbar a:hover{
    background-color: #3C9F40;
}

.blur{
opacity:0.3;
}


.close{
    background: 0 0;
    border: 0;
}

.form{
    position: relative;
    z-index: 1;
    background: #ffffff;
    width: 300px;
    padding:15px 20px 20px 20px;
    box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
    transition: width 1.5s ,margin-left 1.5s,padding 1.5s;
}

.form:hover{
width:400px;
}


.form input{
    background: #f2f2f2;
    width:90%;
    border: 0;
    margin-bottom: 17px;    
    padding: 15px;
    box-sizing: border-box;
    font-size: 15px;
}

#submit{
    outline: 0;
    background: rgba(14, 16, 87, 0.90);
    width: 90%;
    border: 0;
    padding: 15px;
    color: #FFFFFF;
    font-size: 15px;
    cursor: pointer;
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

     function  myFunction(){ 
     b=document.getElementById('emailid').value;
    c=b.length;
    if(b=="")
        {
        alert("Please enter Email Id.");
        document.getElementById('emailid').focus();
        return false;
        }
    }
</script>


</head>

<body onLoad="titlebar()">
<div class="blur">
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
      session_start();
     if(!isset($_SESSION['emailid']))
     {
         
         echo '<a href="login.php" style="float:right;" class="active" >Login</a>';
        echo '<a href="new_user.php"  style="float:right";>New User</a>';
     }else{
       echo '<a href="/project4/backend/logout.php"  style="float:right;" class="active" >Logout</a>';
       echo '<a href="/project4/'.$_SESSION["role"].'" style="float:right;">'.$_SESSION['name'].'</a>';
     }
  ?> 
 
  </div>
</header>
</div>
<center>
    <div class="form">
        <button type="button" class="close" style="float:right;" onclick="window.location.href='<?php echo $_SESSION['recent'];?>'">X</button><br><br>
        
    <div>
        <form method="POST" action="http://localhost/project4/backend/login.php">
        <center>
            <?php 

                                $errors = array(
                                    1=>"Invalid user name or password, Try again.",
                                    2=>"Please Log in first."
                                  );

                                $error_id = isset($_GET['err']) ? (int)$_GET['err'] : 0;

                                if ($error_id == 1) {
                                        echo '<p class="error">'.$errors[$error_id].'</p>';
                                    }elseif ($error_id == 2) {
                                        echo '<p class="error">'.$errors[$error_id].'</p>';
                                    }
            ?> 
        <input type="text" placeholder="Email Id" name="emailid" id="emailid" autocomplete="off">
        <input type="password" placeholder="Password" name="password" id="password" autocomplete="off">
        <input  type="submit" value="Login" id="submit" onclick="return myFunction()">
        <br>
        <p>Not registered? <a href="new_user.php">Create an account</a></p>
        </center>
        </form>
    </div>
    </div>
</center>
    


    
</body>
</html>