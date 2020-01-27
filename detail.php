<?php
  require "connection.php";
  require "patienttime.php";
   session_start();
   if (isset($_GET['doctor_id'])) {
   $doctor_id=$_GET['doctor_id'];   
   $select_image=mysqli_query($connection,"SELECT * FROM doctor_signup where doctor_id='$doctor_id'");
   $display_image=mysqli_fetch_array($select_image);
   $select_detail=mysqli_query($connection,"SELECT * FROM doctor_detail where doctor_id='$doctor_id'");
   $display_detail=mysqli_fetch_array($select_detail);
   $select_edu=mysqli_query($connection,"SELECT * FROM  doctor_education where doctor_id='$doctor_id'");
   $display_edu=mysqli_fetch_array($select_edu);
?> 
<?php
         if (isset($_POST['find'])) {
        $department=htmlspecialchars($_POST['department']);
        $city=htmlspecialchars($_POST['city']);
        $country=htmlspecialchars($_POST['country']);
        $from_fee=htmlspecialchars($_POST['from_fee']);
        $to_fee=htmlspecialchars($_POST['to_fee']);
    
    
      header("location:search.php?d=$department && c=$city && country=$country && form_fee=$from_fee && to_fee=$to_fee");
      }

      ?>
<!DOCTYPE html>  
<html lang="en">
<head>
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
      <script src="jquery/jquery.min.js"></script>
      <script src="bootstrap/js/bootstrap.min.js"></script>
  <meta charset="UTF-8">
  <title>Document</title>
  <style>
    *{margin: 0px; padding: 0px}
    .add1-css{margin-top: 60px;margin-left: 24.6%;}
    .table-css{margin-top:20px; }
    .button-css{font-size: 20px; background:#F07621;width: 180px;height: 40px;padding:5px;border:1px solid #F07621;border-radius: 5px;display: block; }
    .button-css {color: white; text-decoration: none;box-shadow: 1px 1px 1px 1px grey}
    .button-css:hover{color: blue;text-decoration: none;}
    .image-css{line-height:35px;margin-left: 24.8%; font-family: sans-serif;font-weight: 10px;font-size: 18px;padding-left: 20px}
    .input-group{margin-top:20px;}  
    .form-css{margin-top: -20px;}
    .ads-css{margin-top: 20px;}
    .image-css{margin-top: 10px;}
    .pic{box-shadow: 2px 2px 2px 2px #888888;}
    .appointment{margin-top: -30px;}
    .detail-css{line-height: 25px;margin-top: 20px;}
    .about-css{margin-left: 24.6%;line-height: 30px}
    @media only screen and (max-width: 1300px) {
     .ads-css{margin-top: 10px;height: 230px;}
}  
 @media only screen and (max-width: 1200px) {
     .navbar-css{margin-left:0px}
     .add1-css{margin-left: -5px;margin-top: 10px; width: 100%}
     .image-css{margin-left:-10px }
     .about-css{margin-left: 0%;line-height: 30px}
}     
  </style>
</head>
<body>
  <div class="container-fluid">
    <div class="row">
       <nav class="navbar navbar-inverse navbar-fixed-top"> 
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand" href="index.php">Find Doctor.com</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="otherpages/signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="" data-toggle="modal" data-target="#login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul> 
    </div>
  </div>
</nav>
    </div><!--navbar row is end-->
    <div id="appointment" class="modal fade" role="dialog">
  <div class="modal-dialog">
     <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h3>&nbspGet your Appointment</h3>
      </div>
      <div class="modal-body">
        <form action="" method="post">
            <div class="form-group">
              <input type="text" name="patient_name" required class="form-control" placeholder="Patient Name">
            </div>  
            <div class="form-group">
              <input type="text" name="patient_age" required class="form-control" placeholder="Patient Age">
            </div> 
            <div class="form-group">
              <input type="text" name="mobile_no" required class="form-control" placeholder="Patient Mobille Number">
            </div>  
            <div class="form-group">
              <input type="submit" name="appointment" class="btn btn-primary" value="Submit Appointment">
         </div>        
        </form>
      </div>

    </div>
 </div>
</div>
    <!--login form is start-->
     <!-- Modal -->
          <?php
          if (!isset($_SESSION['username'])) {
     if (isset($_POST['login'])) {
     $email=htmlspecialchars($_POST['email']);
    $password=htmlspecialchars($_POST['password']);
     $login=mysqli_query($connection,"SELECT *FROM doctor_signup where  doctor_email='$email' AND doctor_password ='$password'" );
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
  header("location:otherpages/profile.php");
}
?>     
<div id="login" class="modal fade" role="dialog">
  <div class="modal-dialog">
     <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h1><center>Login Form</center></h1>
      </div>
      <div class="modal-body">
        <form action="" method="post" class="form-css">
               <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
    <input id="email" type="text" class="form-control" name="email" placeholder="Email">
  </div>
  <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
    <input id="password" type="password" class="form-control" name="password" placeholder="Password">
  </div>
        <div class="input-group">  
          <input type="submit" name="login" value="Login" class="btn btn-primary">        
          </div>
        </form>
      </div>

    </div>
 </div>
</div>
    <!--login form is end-->
    <div class="row">
    <!--search box is start-->
       <?php require "searchbox.php"; ?>
      <!--search box is end-->

      <div class="col-xs-12 col-sm-9 col-lg-9 add1-css ">
        <img src="image/8.jpg" width="100%" height="200" >
      </div>
      <div class="col-xs-12 col-sm-12 col-lg-3 image-css">
        <img class="pic" src="otherpages/uploadimage/<?php echo $display_image['profile_img']; ?>" width="100%" height="450" >
      </div>
      <div class="col-xs-12 col-sm-12 col-lg-6 table-css">
        <table class="table table-bordered">
        <tr>
          <th>Name</th>
          <td><?php echo $display_image['first_name']." ".$display_image['last_name'];?></td>
        </tr>
        <tr>
          <th>Department</th>
          <td><?php echo $display_detail['doctor_department']; ?></td>
        </tr>
        <tr>
          <th>Clinic Address</th>
          <td><?php echo $display_detail['clinic_address']; ?></td>
        </tr
        >
        <tr>
          <th>Contact Number</th>
          <td><?php echo $display_detail['contect_number']; ?></td>
        </tr>
        <tr>
          <th>Fee</th>
          <td><?php echo $display_detail['doctor_fee']; ?></td>
        </tr>
        <tr>
          <th>City</th>
          <td><?php echo $display_detail['doctor_city']; ?></td>
        </tr>
        <tr>  
         <th>Working Days</th>
         <td><?php echo $display_detail['doctor_working_day']; ?></td>
        </tr>
        <tr>
          <th>Doctor Day Timing</th>
          <td><?php echo $display_detail['doctor_day_time']; ?></td>
        </tr>
        <tr>
          <th>Doctor Evering Timing</th>
          <td><?php echo $display_detail['doctor_evening_time']; ?></td>
        </tr>
          <tr>
            <th>Country</th>
            <td><?php echo $display_detail['doctor_country']; ?></td>
          </tr>
        </table>
          <a href="" class="button-css col-xs-12 col-sm-12 col-lg-12 text-center" data-toggle="modal" data-target="#appointment">Appointment</a>
      </div>
      <div class="col-xs-12 col-sm-12 col-lg-9 about-css">
      <h1>About Doctor</h1>
      <hr>
      </div>
      <div class="col-xs-12 col-sm-12 col-lg-9 about-css">
       <p><?php echo $display_edu[2]; ?></p>
      </div>
    </div><!--body row is end-->
         <?php require "footer.php"; ?>
    </div><!--container-fluid-->
    <?php
     }
     else{
      header("location:index.php");
     }
    ?>
</body>
</html> 