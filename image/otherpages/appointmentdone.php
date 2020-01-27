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
	</div><!--navbar container-fluid is end-->
	<div class="container main-css">
  <form action="" method="get">            
<div class="input-group pull-right">
   <input type="text" name="date" class="form-control" placeholder="DD-MM-YYYY"/>
   <div class="input-group-btn">
        <button class="btn btn-primary" name="search" type="submit">
        <span class="glyphicon glyphicon-search"></span>
        </button>
   </div>
   </div>
</form>
<hr>
	<table class="table table-bordered text-center">
		<tr>
      <th class="text-center">Appointment id</th>
			<th class="text-center">Patient Name</th>
			<th class="text-center">Patient Age</th>
			<th class="text-center">Patient Mobile Number</th>
      <th class="text-center">Appointment Date</th>
      <th class="text-center">Appointment Time</th>
			<th class="text-center">Patient checked</th>
		</tr>
    <?php
      if (isset($_GET['search'])) {
      $data=htmlspecialchars($_GET['date']);
        $select=mysqli_query($connection,"SELECT * FROM appointment_done where doctor_id='$doctor_id' And   Appointment_Date like '%$data%'");
         while($result=mysqli_fetch_array($select)){
          ?>
          <tr>
            <td><?php echo $result['Appointment_id']?></td>
            <td><?php echo $result['Patient_Name']?></td>
            <td><?php echo $result['Patient_Age']?></td>
            <td><?php echo $result['Patient_Mobile_no']?></td>
            <td><?php echo $result['Appointment_Date']?></td>
            <td><?php echo $result['Appointment_Time']?></td>
            <td><a href="">Patient checked</a></to>
          </tr>
          <?php } } ?>
          

	</table>	
 </div>
</body>
</html>
