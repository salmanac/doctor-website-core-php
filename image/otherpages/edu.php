    <?php
   $doctor_id=$_SESSION['doctor_id'];
     if (isset($_POST['doctor_edu'])) {
      $doctor_education=htmlspecialchars($_POST['doctor_education']);
      $insert=mysqli_query($connection,"INSERT INTO  doctor_education(doctor_id,doctor_qualification)values('$doctor_id','$doctor_education')");
      if ($insert==true) {
        header('location:profile.php');
      }
     }
    ?> 