<?php
require "../connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script src="../jquery/jquery.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../plugin/jquery/jquery-ui.min.css">
     <script src="../plugin/jquery/jquery-ui.min.js"></script>
	<meta charset="UTF-8">
	<title>Document</title>/
	<script>
		$(document).ready(function(){
			$('.select').SumoSelect();
		});
	</script>
	<style>
	   body{background: url("../image/10.jpg") fixed no-repeat;background-size:cover;)}
      .container{background:rgba(169,169,169,0.6);height: 550px;padding-top: 20px;margin-top: 60px;box-shadow: 6px 10px 6px #0007;}
      .form-group{margin-top: 25px;}
	</style>
</head>
<body>
	<div class="container">
		<div class="row">
		<form action="" method="post">
              <div class="col-xs-12 col-sm-12 col-lg-12 form-group">
				<input type="text" name="doctor_department" required class="form-control" placeholder="Doctor Department">
			</div>			
			<div class="col-xs-12 col-sm-12 col-lg-6 form-group">
				<input type="text" name="clinic_address" required class="form-control" placeholder="Doctor Clinic Address">
			</div>
			<div class="col-xs-12 col-sm-12 col-lg-6 form-group">
				<input type="text" name="connect_number" required class="form-control" placeholder="Doctor Contect Number">
			</div>
			<div class="col-xs-12 col-sm-12 col-lg-6 form-group">
				<input type="text" name="doctor_city" required class="form-control" placeholder="Doctor City">
			</div>
			<div class="col-xs-12 col-sm-12 col-lg-6 form-group">
				<input type="text" name="doctor_fee" required class="form-control" placeholder="Doctor Fee">
			</div>
			<div class="col-xs-12 col-sm-12 col-lg-12 form-group">
		     <input type="text" name="doctor_wd" class="form-control" placeholder="Day">
			</div>
			<div class="col-xs-12 col-sm-12 col-lg-6 form-group">
				<input type="text" name="doctor_dt" required class="form-control" placeholder="Doctor Day time">
			</div>
				<div class="col-xs-12 col-sm-12 col-lg-6 form-group">
				<input type="text" name="doctor_et" required class="form-control" placeholder="Doctor Everning Time">
			</div>			
			<div class="col-xs-12 col-sm-12 col-lg-12 form-group">
				<input type="text" name="doctor_country" required class="form-control" placeholder="Doctor Country">
			</div>
			<div class="col-xs-12 col-sm-12 col-lg-12 form-group">
				<input type="submit" name="account" value="Create Account" class="btn btn-block btn-primary">
			</div>
			
		</form>
		</div>
	</div><!--container is end-->
	<?php
    	session_start();
    	if (isset($_SESSION['doctor_id'])) {
    	       $doctor_id=$_SESSION['doctor_id'];	
    		if (isset($_POST['account'])) {
   	$doctor_department=htmlspecialchars($_POST['doctor_department']);
   	$clinic_address=htmlspecialchars($_POST['clinic_address']);
   	$connect_number=htmlspecialchars($_POST['connect_number']);
   	$doctor_city=htmlspecialchars($_POST['doctor_city']);
   	$doctor_fee=htmlspecialchars($_POST['doctor_fee']);
   	$doctor_wd=	htmlspecialchars($_POST['doctor_wd']);
   	$doctor_dt=htmlspecialchars($_POST['doctor_dt']);
   	$doctor_et=htmlspecialchars($_POST['doctor_et']);
   	$doctor_country=htmlspecialchars($_POST['doctor_country']);
 
    $insert=mysqli_query($connection,"INSERT INTO doctor_detail(doctor_department,clinic_address,contect_number,doctor_city,doctor_fee,doctor_working_day,doctor_day_time,doctor_evening_time,doctor_country,doctor_id)values('$doctor_department','$clinic_address','$connect_number','$doctor_city','$doctor_fee','$doctor_wd','$doctor_dt','$doctor_et','$doctor_country','$doctor_id')");
     if ($insert==true) { 
     	session_destroy();
     	header('location:../index.php');
     }
     else{
     	header('location:next.php');
     }
    }
}
else{
      header('location:signup.php');
}

?>
	<?php
	//login system is start
	   if (!isset($_SESSION['username'])) {
     if (isset($_POST['login'])) {
     if(mysqli_num_rows($login)==1){
      $data=mysqli_fetch_array($login);
      $_SESSION['username'] =$data['1'].$data['2'];
      $_SESSION['doctor_id'] =$data['0'];
      header("location:otherpages/profile.php");
     }
     else  {
        echo "<script>alert('Your email and password is inconnect')</script>";
     }
   }
}
else {
  header("location:profile.php");
}
?>
				
</body>
</html>  		