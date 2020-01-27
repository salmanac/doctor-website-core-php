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
		.main-css{background: white;margin-top:70px;height:auto;padding-top: 20px; }
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
    <?php
        $select=mysqli_query($connection,"SELECT * FROM appointment where doctor_id='$doctor_id' And Sir_no");
          $result=mysqli_fetch_array($select);
          

      ?>
	</div><!--navbar container-fluid is end-->
	<div class="container main-css">
	<table class="table table-bordered text-center">
		<tr>
			<th class="text-center">Patient Name</th>
			<th class="text-center">Patient Age</th>
			<th class="text-center">Patient Mobile Number</th>
			<th class="text-center">Appointment Confirm</th>
		</tr>
		<?php
        $appointment=mysqli_query($connection,"SELECT * FROM appointment  where doctor_id='$doctor_id'");
        while ($display=mysqli_fetch_array($appointment)) {
        
		?>
		<tr>
      <?php  $display[0] ?>
			<td><?php echo $display['Patient_Name'] ?></td>
			<td><?php echo $display['Patient_Age'] ?></td>
			<td><?php echo $display['Patient_Mobile_NO'] ?></td>
			<td><a href="confirmappointment.php?patient_id=<?php echo $display[0] ; ?>">Done</a></td>
		</tr>
		<?php } ?>
	</table>	
 </div>
</body>
</html>
