<?php
  require "connection.php";
   session_start();
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
         
    .add1-css{margin-top: 60px;margin-left: 24.6%;}
    .table-css{margin-top: 20px;}
    .button-css{font-size: 20px; background:#F07621;width: 140px;height: 40px;padding:5px;border:1px solid #F07621;border-radius: 5px;display: block; }
    .button-css {color: white; text-decoration: none;box-shadow: 1px 1px 1px 1px #888888;}
    .button-css:hover{color: blue;text-decoration: none;}
    .image-css{margin-left:24.6%; font-family: sans-serif;font-weight: 10px;font-size: 18px;padding-left: 20px}
    .input-group{margin-top:20px;}  
    .form-css{margin-top: -20px;}
    .ads-css{margin-top: 20px;}
    .image-css{margin-top: 10px;}
    .appointment{margin-top: -30px;}
    .detail-css{line-height: 25px;margin-top: 20px;} 
    .hr-css{margin-left: 24.6%;}
      @media only screen and (max-width: 1200px) {
     .search-css{position: static;margin-left:0px;margin-top: 50px;}
     .navbar-css{margin-left:0px}
     .slider-css{margin-left: -5px;margin-top: 10px;}
     .line-css{margin-left:0px }
     .footer-css{margin-left: -15px;  }
     .add1-css{margin-left: 0px;margin-top:10px;}
     .image-css{margin-left: 0px; }
     .hr-css{margin-left:0px;}
     .pic{box-shadow: 2px 2px 2px 2px #888888;}
}     
.pic{box-shadow: 2px 2px 2px 2px #888888;}
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
      
      <div class="col-xs-12 col-sm-12 col-lg-9 add1-css ">
        <img src="image/8.jpg" width="100%" height="200" >
      </div>
      
      <?php
      $department=$_GET['d'];
      $city=$_GET['c'];
      $country=$_GET['country'];
      $from_fee=$_GET['form_fee'];
      $to_fee=$_GET['to_fee'];
      $search=mysqli_query($connection,"doctor_department='$department' AND doctor_city='$city' AND doctor_country='$country' AND doctor_fee='$from_fee' BETWEEN doctor_fee='$to_fee'");
      if ($search==true) {}
       $select_data=mysqli_query($connection,"SELECT * FROM doctor_signup inner join  doctor_detail on doctor_signup.doctor_id=doctor_detail.doctor_id ");
      while ($display=mysqli_fetch_array($select_data)) {
      ?>
      <div class="set-css"> 
      <div class="col-xs-12 col-sm-12 col-lg-3 image-css">
        <img class="pic" src="otherpages/uploadimage/<?php echo $display['profile_img']; ?>" width="100%" height="300" >
      </div>
      <div class="col-xs-12 col-sm-12 col-lg-6 table-css">
        <table class="table table-bordered">
        <tr>
          <th>Name</th>
          <td><?php echo $display['first_name']." ".$display['last_name'];?></td>
        </tr>
        <tr>
          <th>Department</th>
          <td><?php echo $display['doctor_department'] ?></td>
        </tr>
        <tr>
          <th>Clinic Address</th>
          <td><?php echo $display['clinic_address'] ?></td>
        </tr>
         <tr>
          <th>City</th>
          <td><?php echo $display['doctor_city'] ?></td>
        </tr>
        <tr>
          <th>Fee</th>
          <td><?php echo $display['doctor_fee'] ?></td>
        </tr>
          <tr>
            <th>Country</th>
            <td><?php echo $display['doctor_country'] ?></td>
          </tr>
        </table>
          <a class="col-xs-12 col-sm-12 col-lg-12 button-css text-center" href="detail.php?doctor_id=<?php echo $display['doctor_id']; ?>">Detail</a>
       </div>
       </div>
       <div class="col-xs-12 col-sm-12 col-lg-9 hr-css">
         <hr>
       </div>
    <?php } ?>  
    </div><!--body row is end-->
         <?php require "footer.php"; ?>
    </div><!--container-fluid-->
</body>
</html> 
