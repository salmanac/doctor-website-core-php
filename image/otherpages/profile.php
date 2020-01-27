<?php
 session_start();
require "../connection.php";
require"edu.php";

//require"insertimage.php";
//Display doctor education  php code is start
    $select=mysqli_query($connection,"SELECT  * FROM  doctor_education where doctor_id=$doctor_id");
    $result=mysqli_fetch_array($select);
//Display doctor education php code is end           
//Display doctor image php code is start
   $default_img=mysqli_query($connection,"SELECT * From  doctor_signup where doctor_id=$doctor_id"  );
   $display_img=mysqli_fetch_array($default_img);
//Display doctor image  php code is start
 //Display doctor Detail For public image php code is start
   $doctor_detail=mysqli_query($connection,"SELECT * From  doctor_detail where doctor_id=$doctor_id"  );
   $display_detail=mysqli_fetch_array($doctor_detail);
//Display doctor Detail For public php code is start  
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
      .textarea{margin-left: 4%;margin-right: 3%}
       .table-css{margin-top: 20px;}
      .footer-css{background: black;margin-top: 200px;padding-top: 10px;padding-left: 20px; border-top: 4px solid orange}
   .icon{color;font-size: 40px; margin-top: 20px}
   h3{color:white ;}
   .footer-css p{color:white;}
   i{color:white;}
   @media only screen and (max-width: 1200px) {
    .footer-css{margin-left: -20px;}
   }
      .header-css{background:white;height:auto;margin-top: 50px;}
    .pic-css{margin-left: 5%;margin-top: 30px;overflow:hidden;height: 360px;}
    .text-css p{color: white;margin-left: 29%;padding-top: 25px;cursor: pointer;}
    .text-css{background: rgba(0,0,0,0.5);width:100%;height: 80px;}
    .pic-css:hover .text-css{transform:translateY(-80px);}
      .button-css{font-size: 20px; width: 180px;height: 40px;padding:5px;border-radius: 5px;display: block;margin-bottom: 10px }
    .button-css {color: white; text-decoration: none;}
    .button-css:hover{color: white;text-decoration: none;}
     #file{display: none;}
     #upload{background: #DCDCDC;border:1px solid #DCDCDC;width: 100%;height: 50px;padding: 15px 220px;border-radius: 15px;}
     #upload:hover{cursor: pointer;box-shadow: 0px 6px gray}
     .hr{margin-top:250px; }
     .table{margin-top: 10px;} 
      .resize{resize: none; margin-top: 10px;}
     .btn{ margin-top: -15px; }
    .message-css{background: lightblue;height:auto;margin-top: 10px;line-height: 40px;padding: 0px 20px;}
     .footer{margin-top: 100px;}
     .editing-edu{resize: none;}
     @media only screen and (max-width: 1200px){
      .pic-css{margin-left: 0px;}
      .pic-css img{width: 60%}
      .textarea{margin-left: -10px;margin-right: -10px}
      .button-css {}
      .text-css{background:#0005;width: 60%;padding-left: 10%;}
     }
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
        <li class="active"><a href="profile.php"><span class="glyphicon glyphicon-home"></span>&nbsp&nbsphome</a></li>
        <li><a href="" data-toggle="modal" data-target="#editing-edu"><span class="glyphicon glyphicon-pencil"></span>&nbsp&nbspEdit Qualifictation</a></li>
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
    <!--detail editing box is start-->
  <!-- Modal -->
<div id="info-editing" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      
      <div class="modal-body">
       <form action="" method="post">
       <div class="form-group">
           <input type="hidden" name="detail_doctor_id" class="form-control" value="<?php echo $display_detail['doctor_id']; ?>">
         </div>
          <div class="form-group">
           Doctor Department
           <input type="text" name="editing_department" class="form-control" value="<?php echo $display_detail['doctor_department']; ?>">
         </div>
          <div class="form-group"> 
           Doctor Clinic Address
           <input type="text" name="editing_clinic_address" class="form-control" value="<?php echo $display_detail['clinic_address']; ?>">
         </div>
          <div class="form-group">
          Doctor Contact
           <input type="text" name="edting_conntact" class="form-control" value="<?php echo $display_detail['contect_number']; ?>">
         </div>
          <div class="form-group">
          Doctor Fee
           <input type="text" name="edting_fee" class="form-control" value="<?php echo $display_detail['doctor_fee']; ?>">
         </div>
          <div class="form-group">
          Doctor city
           <input type="text" name="edting_city" class="form-control" value="<?php echo $display_detail['doctor_city']; ?>">
         </div>
          <div class="form-group">
          Doctor Working Day
           <input type="text" name="edting_wd" class="form-control" value="<?php echo $display_detail['doctor_working_day']; ?>">
         </div>
          <div class="form-group">
          Doctor Day Time
           <input type="text" name="edting_dt" class="form-control" value="<?php echo $display_detail['doctor_day_time']; ?>">
         </div>
          <div class="form-group">
          Doctor Everning Time
           <input type="text" name="edting_et" class="form-control" value="<?php echo $display_detail['doctor_evening_time']; ?>">
         </div>
          <div class="form-group">
          Doctor Country
           <input type="text" name="edting_country" class="form-control" value="<?php echo $display_detail['doctor_country']; ?>">
         </div>
          <div class="form-group">
          <hr>
           <input type="submit" name="editing_detail" value="Save" class="btn btn-primary">
         </div>
       </form>
      </div>
    </div>
  </div>
</div>

     <!-- datail editing box is end-->
     <!--image upload box is start-->

     <!-- Modal -->
<div id="image" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body">
        <form action="" method="post" enctype="multipart/form-data" >
        <input type="hidden" name="image_id" value="<?php  echo  $display_img[0]; ?>">
        <label for="file" id="upload">Upload image</label>
          <input type="file" name="doctor_image" id="file">
        <hr>
         <img src="uploadimage/<?php  echo  $display_img[9]; ?>" width="100%" height="160">  
    <hr class="hr">
    <input type="submit" name="upload_image" value="Save"  class="btn btn-primary">
   
</form>
      </div>  
    </div>
  </div>
</div>
     <!--image upload box is end-->
     <!--editing qulification is start-->
     
     <div id="editing-edu" class="modal fade" role="dialog">
  <div class="modal-dialog">
     <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
      <b>Edit Qualification</b>
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
        <div class="form-group">
        <input type="hidden" name="editing_id" value="<?php  echo $result[1]; ?>">
           <textarea name="editing_edu" cols="30" rows="10" class="form-control editing-edu"><?php  echo $result[2]; ?></textarea> 
          </div>
          <div class="form-group">
          <input type="submit" name="editing-edu" value="Save" class=" btn btn-primary ">
          </div>
    </form>
      </div>    
    </div>
  </div>
</div>
       <!--editing qulification is end-->
    <div class="row header-css">
       <div class="col-xs-12 col-sm-12 col-lg-3 pic-css">
           <img src="uploadimage/<?php echo $display_img[9]; ?>" width="100%" height="360" > 
              <div class="text-css">
              <p data-toggle="modal" data-target="#image">Upload Profile Picture</p>
            </div>
       </div><!--Doctor pic is end--> 
       <div class="col-xs-12 col-sm-12 col-lg-8 table-css ">
             <table class="table table-bordered">
              <tr>
                <th>DR Name</th>
                <td><?php  echo $_SESSION['username'];?></td>
              </tr>
              <tr>
                <th>DR Department</th>
                <td><?php echo $display_detail['doctor_department']; ?></td>
              </tr>
              <tr>
                <th>DR Clinic Address</th>
                <td><?php echo $display_detail['clinic_address']; ?></td>
              </tr>
               <tr>
                 <th>DR Contact Number</th>
                 <td><?php echo $display_detail['contect_number']; ?></td>
              </tr>
              <th>DR Fee</th>
                <td><?php echo $display_detail['doctor_fee']; ?></td>
              </tr>
              <tr>
                <th>Dr City</th>
                <td><?php echo $display_detail['doctor_city']; ?></td>                
              </tr >
              <tr>
                <th>Dr Working Days</th>
                <td><?php echo $display_detail['doctor_working_day']; ?></td>
              </tr>
                <tr>
                  <th>Dr Morning Time</th>
                  <td><?php echo $display_detail['doctor_day_time']; ?></td>
                </tr>
                 <tr>
                  <th>Dr Evering Time</th>
                  <td><?php echo $display_detail['doctor_evening_time']; ?></td>
                </tr>
                 <tr>
                  <th>Dr Country</th>
                  <td><?php echo $display_detail['doctor_country']; ?></td>
                </tr>
              </table>
              <a class="col-xs-12 col-sm-12 col-lg-4 bg-primary text-center button-css" href="" data-toggle="modal" data-target="#info-editing"> Edit Information</a> 
       </div><!--Doctor detail for public is end-->    
    </div><!--header row is end-->    
    <div class="row textarea">

      <div class="col-xs-12 col-sm-12 col-lg-12 >
        <form action="" method="post">
        <div class="form-group">
          <textarea name="doctor_education"  cols="20" rows="6" class="form-control resize" required placeholder="Doctor Write his/her own Qulifictation here"></textarea>
        </div> 
        
        <input type="submit" name="doctor_edu" value="Post" class="btn btn-primary btn-block button-css" style="width: 150px;margin-top: 3px">
        </form>
         <p class="message-css">
           <?php  
              echo  $result[2];
          ?>  
         </p>
      </div><!--textarea col is end-->
    </div><!--text area row  is end-->
   <div class="row footer-css">
  <div class="col-xs-12 col-sm-12 col-lg-6">
    <h3>About Us</h3>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente, numquam, est? Asperiores consectetur beatae quo mollitia, dicta illum! Accusamus, ex, vitae. Deserunt suscipit eaque veritatis quos, in voluptatem, unde eius.</p>
  </div>
  <div class="col-xs-12 col-sm-12 col-lg-3">
    <h3>Contact Us</h3>
    <i class="fa fa-phone">&nbsp&nbsp00000000</i><br>
    <i class="fa ">finddoctor@gmail.com</i>
  </div>
  <div class="col-xs-12 col-sm-12 col-lg-3">
    <h3>Follows Us</h3>
    <a href=""><i class="fa fa-facebook icon"></i></a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <a href=""><i class="fa fa-twitter icon"></i></a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <a href=""><i class="fa fa-google-plus icon"></i></a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <a href=""><i class="fa fa-instagram icon"></i></a>
  
  </div>
  <div class="col-xs-12 col-sm-12 col-lg-12">
    <hr>
    
    <p class="text-center"> copyrights reserved gfhhgfjgkklkjlvhjkjxgfhgfghgfxhhhgfxxgfz </p>
    <br>
  </div>
</div>

 </div>   
 
 <?php

 //editing qualification php coding is start
    if (isset($_POST['editing-edu'])) {
      $editing_id=htmlspecialchars($_POST['editing_id']);
      $editing_edu=htmlspecialchars($_POST['editing_edu']);
      $qualification=mysqli_query($connection,"UPDATE doctor_education set  doctor_qualification='$editing_edu' where doctor_id='$editing_id'");     
}
//editing qualification php coding is end
 ?>
 <?php
 //update image php code is start
   if (isset($_POST['upload_image'])) {
  $image_id=htmlspecialchars($_POST['image_id']);
   $image_name=$_FILES['doctor_image']['name'];
      $image_tmp=$_FILES['doctor_image']['tmp_name'];
      $store_img="uploadimage/".$image_name;
       $image_save=mysqli_query($connection,"UPDATE doctor_signup  set  profile_img='$image_name' where   doctor_id ='$image_id'");
       if ($image_save==true){
      move_uploaded_file($image_tmp,$store_img);
    }
   }
 //update image php code is start
 ?>
 <?php
//doctor detail editing php code is start 
 if (isset($_POST['editing_detail'])) {
  $doctor_id=htmlspecialchars($_POST['detail_doctor_id']);
  $doctor_department=htmlspecialchars($_POST['editing_department']);
  $dca=htmlspecialchars($_POST['editing_clinic_address']);
  $doctor_contant=htmlspecialchars($_POST['edting_conntact']);
  $doctor_fee=htmlspecialchars($_POST['edting_fee']);
  $doctor_city=htmlspecialchars($_POST['edting_city']);
  $doctor_wd=htmlspecialchars($_POST['edting_wd']);
  $doctor_dt=htmlspecialchars($_POST['edting_dt']);
  $doctor_et=htmlspecialchars($_POST['edting_et']);
  $doctor_country=htmlspecialchars($_POST['edting_country']);
  $save=mysqli_query($connection,"UPDATE doctor_detail SET doctor_department='$doctor_department',clinic_address='$dca',contect_number='$doctor_contant',doctor_city='$doctor_city',doctor_fee='$doctor_fee',doctor_working_day='$doctor_wd',doctor_day_time='$doctor_dt',doctor_evening_time='$doctor_et',doctor_country='$doctor_country' where doctor_id='$doctor_id'");
 }
//doctor detail editing php code is end
?>
</body>
</html>