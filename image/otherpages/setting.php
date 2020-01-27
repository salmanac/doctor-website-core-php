<?php
 session_start();
require "../connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
     <script src="../jquery/jquery.min.js"></script>
     <script src="../bootstrap/js/bootstrap.min.js"></script>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>
	   body{background: lightgray;}
		.page-css{background: white;height: auto; margin-top: 60px;}
		.left-navbar{height: 600px;padding-top:30px;}
    .line-css{line-height: 50px }
	</style>
</head>
<body>
 <div class="comtainer-fluid">
 	<div class="row">
 		 <nav class="navbar navbar-inverse navbar-css navbar-fixed-top"> 
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand" href="">
     <?php
     if ($_SESSION['username']==true) {   
      $doctor_id=$_SESSION['doctor_id'];
      echo $_SESSION['username'];
    }
  else {
    header('location:../index.php');
  }
 ?>
   </a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
     <ul class="nav navbar-nav">
        <li><a href="profile.php"><span class="glyphicon glyphicon-home"></span> home</a></li>
        <li><a href="appointment.php"><span class="glyphicon"></span>Appointment</a></li>
        <li><a href="appointmentdone.php"><span class="glyphicon"></span>Confirm Appointment</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="setting.php"><span class="glyphicon glyphicon-user-out"></span>Setting</a></li>
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span>&nbsp&nbspLogout</a></li>
      </ul>
    </div>
  </div>  
</nav>
 	</div><!--navbar row is end-->
 </div><!--navbar container-fluid is end-->
 <div class="container page-css">
 	<div class="row">
 	<div class="col-xs-12 col-sm-12 col-lg-3 left-navbar bg-primary">
 		<ul class="list-group bg-primary">
  <li class="list-group-item active">Actions</li>
  <li class="list-group-item bg-primary"><a href="setting.php?doctorabout">About Doctor</a></li>
  <li class="list-group-item bg-primary"><a href="setting.php?changepassword">Change Password</a></li>
  <li class="list-group-item bg-primary"><a href="setting.php?profileimage">Delete Profile Image</a></li>
  <li class="list-group-item bg-primary"><a href="setting.php?deleteaccount">Delete Doctor Account</a></li>
</ul>
 	</div>
 	<div class="col-xs-12 col-sm-12 col-lg-9">	
 	 <?php
     if (isset($_GET['doctorabout'])) {
       require "doctorabout.php";
     }
      elseif (isset($_GET['changepassword'])) {
      	require "changepassword.php";
      }
       elseif (isset($_GET['profileimage'])) {
        require "profileimage.php";
      }
      elseif(isset($_GET['deleteaccount'])){
        require "deleteaccount.php";
      }
      else{
        ?>
         <h1>Setting Detail</h1>
         <hr>
        <p class="line-css">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo maxime, iure eius tenetur? Molestiae mollitia officiis, voluptatum nulla repudiandae, totam. Dolores dignissimos reprehenderit doloribus omnis et itaque temporibus ipsam culpa.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo maxime, iure eius tenetur? Molestiae mollitia officiis, voluptatum nulla repudiandae, totam. Dolores dignissimos reprehenderit doloribus omnis et itaque temporibus ipsam culpa.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo maxime, iure eius tenetur? Molestiae mollitia officiis, voluptatum nulla repudiandae, totam. Dolores dignissimos reprehenderit doloribus omnis et itaque temporibus ipsam culpa.</p>
        <?php
      }
 	 ?>
 	</div>
  </div><!--page row is end-->
 </div><!--page cantainer is end-->
	
</body>
</html>