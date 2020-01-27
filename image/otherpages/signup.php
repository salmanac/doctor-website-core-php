<?php
require "../connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script src="../jquery/jquery.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
     <script src="../plugin/jquery/jquery-ui.min.js"></script>
	<meta charset="UTF-8">
	<title>Document</title>
	<script>
		$(document).ready(function(){
			$('#date').datepicker({
				dateFormat:"dd-mm-yy"
			}); 		
		});
	</script>
	<style>
	  body{background: url("../image/10.jpg") fixed no-repeat;background-size:cover;)}
       .p{color: red; font-size: 30px;margin-top: 35px}
       .top{margin-top:-30px; }
	  .header{color: white;}
	  .container{background:rgba(169,169,169,0.6);margin-top:30px; height: 580px;box-shadow: 6px 10px 6px #0007;}
	  .box-css{margin-top: 30px;}
	
	</style>
</head>
<body>
 <?php
    session_start();
    if (isset($_POST['next'])) {
      $first_name=htmlspecialchars($_POST['first_name']);
     $last_name=htmlspecialchars($_POST['last_name']);
     $doctor_email=htmlspecialchars($_POST['doctor_email']);
     $doctor_password=htmlspecialchars($_POST['doctor_password']);
     $confirm_password=htmlspecialchars($_POST['confirm_password']);  
    $pmdc_no=htmlspecialchars($_POST['pmdc_no']);
    $doctor_birthday=htmlspecialchars($_POST['doctor_birthday']);
    $doctor_gender=htmlspecialchars($_POST['gender']);
    if ($doctor_password!= $confirm_password) {
    	$message="Your password is not match eachother";
    }
     $check_email=mysqli_query($connection,"SELECT * FROM doctor_signup where doctor_email='$doctor_email'");
    if(mysqli_num_rows($check_email)==1){
    	?>
    	<script>alert("hello world")</script>
    <?php
    }
    else{
   $insert=mysqli_query($connection,"INSERT INTO doctor_signup(	first_name,last_name,doctor_email,doctor_password,doctor_confirm_password,pmdc_registration_no,doctor_birthday,doctor_gender,profile_img)values('$first_name','$last_name','$doctor_email','$doctor_password','$confirm_password','$pmdc_no','$doctor_birthday','$doctor_gender','9.png')");
   if($insert==true){
     $doctor_id=mysqli_insert_id($connection);
      $_SESSION['doctor_id']=$doctor_id;
      header("location:next.php");
   }
      
 } 
  	}	
	?>			
   <div class="container">	
		<div class="row">
		      <center><p class="p">
		      	<?php
                  if(isset($message)){
                  	echo $message;
                  } 
		      	?>
		      </p></center>
			<div class="col-xs-12 col-sm-12 col-md-12 box-css">
			 <form action="" method="post" class="top">
			  <div class="col-xs-12 col-sm-12 col-lg-6 form-group">
			     <input type="text" name="first_name" required class="form-control box-css" placeholder="First Name">
			  </div>
			  <div class="col-xs-12 col-sm-12 col-lg-6 form-group">
			     <input type="text" name="last_name" required class="form-control box-css" placeholder="Last Name">
			  </div>
			 <div class="col-xs-12 col-sm-12 col-lg-12 form-group">
			     <input type="email" name="doctor_email" required class="form-control box-css" placeholder="Email">
			  </div>
			  <div class="col-xs-12 col-sm-12 col-lg-6 form-group">
			     <input type="password" name="doctor_password" required class="form-control box-css" required placeholder="Password">
			  </div>
			  <div class="col-xs-12 col-sm-12 col-lg-6 form-group">
			     <input type="password" name="confirm_password" required class="form-control box-css" placeholder="Confirm Password">
			  </div>
			   <div class="col-xs-12 col-sm-12 col-lg-12 form-group">
			     <input type="text" name="pmdc_no" required required class="form-control box-css" placeholder="PMDC Registration Number">
			  </div>

			  <div class="col-xs-12 co1-sm- col-lg-12 form-group">
			    <input type="text" name="doctor_birthday" class="form-control box-css" id="date" placeholder="dd-mm-yy">
			  </div>
			  <div class=" col-xs-12 co1-sm- col-lg-12 form-group radio-css">
			     <input type="radio" name="gender"  value="male">Male
			     <input type="radio" name="gender" value="female">Fmale
			  </div>
			  <input type="submit" name="next" value="Next" class="btn btn-block btn-primary">
			 </form>
			</div>
		</div>
	</div>
	<?php
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