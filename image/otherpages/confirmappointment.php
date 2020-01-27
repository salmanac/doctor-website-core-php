<?php
 session_start();
require "../connection.php";
require "confirmappointmentinsert.php";
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
    .main-css{background: white;margin-top:70px;height:auto;padding-top: 20px;  }
  </style>
</head>
<body>
  <div class="container-fluid">
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
        <li ><a href="profile.php"><span class="glyphicon glyphicon-home"></span> home</a></li>
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
  <div class="container main-css">
   <div class="row">
   <div class="col-xs-12 col-sm-12 col-lg-12"> 
   <?php
    if (isset($_GET['patient_id'])){ 
 $patient_id=$_GET['patient_id'];
$display=mysqli_query($connection,"SELECT * FROM appointment where  Sir_no ='$patient_id' AND   doctor_id='$doctor_id' ");
$result=mysqli_fetch_array($display);
?>
<form action="" method="post">
  <div class="form-group">
       Patient Name
    <input type="text" name="patient_name" class="form-control" required value="<?php echo $result['Patient_Name'] ;?>">
  </div>
  <div class="form-group">
       Patient Age
    <input type="text" name="patient_age" class="form-control" required  value="<?php echo $result['Patient_Age'] ?>" >
  </div>
  <div class="form-group">
       Patient Mobile Number
    <input type="text" name="patient_number" class="form-control" required  value="<?php echo $result['Patient_Mobile_NO'] ?>">
    </div>
    <div class="form-group">
     Issued Appointment id to Patient
    <input type="text" name="appointment_id" class="form-control" required  placeholder=" Issued Appointment id to Patient">
  </div>
    <div class="form-group">
     Issued date to Patient
    <input type="text" name="appointment_date" class="form-control" required  placeholder="dd-mm-yyyy">
  </div>
    <div class="form-group">
   Issued Time to Patient
    <input type="text" name="appointment_time" class="form-control" required  placeholder="hh:mm:am">
  </div>
   <div class="form-group">
    <input type="submit" name="comfirm_appointment" class="btn btn-primary" value="Confirm Appointment">
  </div>
</form>
   </div>
   </div>
   <?php
      }
   else{
    header("location:appointment.php");
  }
   ?>
 </div>
</body>
</html>
