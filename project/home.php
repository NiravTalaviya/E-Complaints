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

.im img{
  width:55%;
  height:50%;
  float:left;
}

td img{
  height:65%;
  width:19.5%;
  float:left;
}
.border img:hover{
box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}


.mid{
position:relative;
  width:100%;
  padding-top:24%;
}
.mid_left{
  position:absolute;
  top: 0;
  left: 0;
  width:58%;
  height:100%
  
}

.mid_left img{
  height:100%;
  width:100%;
}


.mid_right{
  position:absolute;
  top: 0;
  left:58%;
  width:42%;
  height:100%;
  background:linear-gradient(rgba(117,216,100,0.94),rgba(186,239,177,0.74));
  overflow:auto;
}

.mid_right .map{
position:absolute;
  top: 1%;
  left: 1%;
  width:25%;
}

.mid_right .gp{
position:absolute;
  top: 20%;
  left: 35%;
  bottom: 0;
  right: 0;
  font-size:2vw;
  float:left;
}

.mid_right .dgp{
position:absolute;
  top: 2%;
  right:1%;
  width:20%;
}

.mid_right .nm{
position:absolute;
  top: 30%;
  right:3%;
  font-size:1vw;
}

.mid_right .discreption{
position:absolute;
  top: 43%;
  left: 2%;
  right:2%;
  font-size:1.3vw;
}


</style>
<script>
  var scrl = " Gujarat Police E-protal";

  function titlebar() {
   scrl = scrl.substring(1, scrl.length) + scrl.substring(0, 1);
   document.title = scrl;
   setTimeout("titlebar()", 150);
   }


          var images = [], x = 0;
          images[0] = "police_1.jpg";
          images[1] = "police_4.jpg";


          function displayImage() {
              
              document.getElementById("img").src = images[x];
              x=x+1;
              if(x>=2)
              {
                x=0;
              }
              setTimeout("displayImage()", 2000);
          }
</script>


</head>

<body onLoad="titlebar();displayImage();">

<header>
  <img src="banner.jpg" alt="Gujarat Police Logo" style="height:22%;overflow:hidden;width:100%;">

  <div class="navbar">
  
    <a href="home.php"   class="active">Home</a>
  <a href="new_complaint.php">New complaint</a>
    <a href="complaint_status.php">Complaint Status</a>
    <a href="FAQ.php">FAQ</a>
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
       echo '<a href="/project4/'.$_SESSION["role"].'" style="float:right;">'.$_SESSION['name'].'</a>';
     
     }
  ?> 

  </div>
</header>
<div class="mid">
<div class="mid_left">
<img id="img" src="police_1.jpg"/>
  
</div>

<div class="mid_right">

  <img class="map" src="map.gif">

  <span class="gp">ગુજરાત પોલીસ</span>

  <img class="dgp" src="dgp.jpg"><br><br><br><br><br><br>
    <p class="nm">Geetha Johri<br>DGP,Gujarat.</p>
    <p class="discreption">
    રાજયની પોલીસનું પ્રાથમિક ધ્‍યેય, ગુજરાતની બહુવિધતા ધ્‍યાને લેતાં તથા બંધારણીય વ્‍યવસ્‍થા અને કાયદાકીય વ્‍યવસ્‍થાની જોગવાઇ મુજબ જાહેર વ્‍યવસ્‍થાની જાળવણી, આંતરિક સલામતી અને ગુનાઓ શોધવાનું તેમ જ અટકાવવાનું છે. આ માટે પોલીસમાં ઉચ્‍ચ સ્‍તરનો વ્‍યાવસાયિક અભિગમ, ફરજ પ્રત્‍યેનું સમર્પણ, યથાર્થ અભિગમનું પ્રદર્શન અને લોકોની અપેક્ષા પ્રત્‍યે સંવેદનશીલતા કેળવવામાં આવી છે.
    <a href="extra.pdf" style="text-decoration:none;float:right;" target="_blank">(વધુ...)</a>
    </p>
    
</div>
</div>
  <table style="border-radius:25px;padding:10px;font-size:18px;border:3.5px solid #4CAF50;width:100%;height:120px;">
  <tr class="border">
    <td>
    <a href="http://www.incometaxindia.gov.in/" target="_blank"><img src="link1.png"></a> 
    <a href="http://india.gov.in/" target="_blank"><img src="link2.png"></a> 
    <a href="http://www.nvsp.in/" target="_blank"><img src="link3.png"></a> 
    <a href="http://www.digitalindia.gov.in/" target="_blank"><img src="link5.png"></a> 
    <a href="http://khoyapaya.gov.in/mpp/home" target="_blank"><img src="link6.png"></a> 
    </td>
  </tr>
</table>
</body>
</html>
<?php

      $_SESSION['recent'] = "home.php";
?>
