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
         
    .slider-css{margin-top: 60px;margin-left: 24.6%;}
    .button-css{font-size: 25px; background:#F07621;width: 300px;height:50px;padding-left:100px;padding-top: 10px;border:1px solid #F07621;border-radius: 12px;display: block; }
    .button-css a{color:white;text-decoration: none;}
    .line-css{line-height:35px;margin-left: 24.8%; font-family: sans-serif;font-weight: 10px;font-size: 18px;padding-left: 20px}
    .input-group{margin-top:20px;}  
    .form-css{margin-top: -20px;}
    .ads-css{margin-top: 20px;}
    .image-css{margin-top: 10px;}
    .appointment{margin-top: -30px;}
    
    .detail-css{line-height: 25px;margin-top: 20px;}
    @media only screen and (max-width: 1300px) {
     .ads-css{margin-top: 10px;height: 230px;}
}  
 @media only screen and (max-width: 1200px) {
     .search-css{position: static;margin-left:0px;margin-top: 50px;}
     .navbar-css{margin-left:0px}
     .slider-css{margin-left: -5px;margin-top: 10px;}
     .line-css{margin-left:0px }
     .footer-css{margin-left: -15px;  }
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
        <li><a href="" data-toggle="modal" data-target="#login"><span class="glyphicon glyphicon-log-in"></span>&nbsp Login</a></li>
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
      $_SESSION['username'] =$data['1'].''.$data['2'];
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
      <!--slider box is start-->
      <div class="col-xs-12 col-sm-12 col-lg-9 slider-css">
         <div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Wrapper for slides -->
  <div class="carousel-inner">
  <?php
  $active_image=mysqli_query($connection,"SELECT * FROM active_image");
$image=mysqli_fetch_array($active_image);
  ?>
    <div class="item active"> 
      <img src="../admin/image/<?php echo $image[1]; ?>" width="100%">
    </div>
    <?php
       $active_image=mysqli_query($connection,"SELECT * FROM active_image");
  while($other_image=mysqli_fetch_array($active_image)){
    ?>
     <div class="item">
      <img src="image/9.jpg" width="100%">
    </div>
    <?php } ?>
    
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
      </div><!--slider box is end-->
      <div class="col-xs-12 col-sm-9 col-lg-9 line-css">
        <h1>About Us</h1>
         <?php
        $data=mysqli_query($connection,"SELECT * FROM  about_us");
        $display_data=mysqli_fetch_array($data);
      ?>
        <hr>
        <p><?php echo $display_data[1]; ?></p>
      </div><!--text is end-->
    </div><!--body row is end-->
         <?php require "footer.php"; ?>
       
    </div><!--container-fluid-->
</body>
</html> 