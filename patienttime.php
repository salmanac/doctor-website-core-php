<?php
  $doctor_id=$_GET['doctor_id'];
if (isset($_POST['appointment'])) {
$patient_name=htmlspecialchars($_POST['patient_name']);
$patient_age=htmlspecialchars($_POST['patient_age']);
$mobile_no=htmlspecialchars($_POST['mobile_no']);
$query=mysqli_query($connection,"INSERT INTO  appointment(doctor_id,Patient_Name,Patient_Age,Patient_Mobile_NO)VALUES('$doctor_id','$patient_name','$patient_age','$mobile_no')");
if ($query==true) {
  ?>
  <script>alert("Your Appointment has been Submited. You will receive a message when appointed is confirmed.");</script>
  <?php
}
else{
  ?>
  <script>alert("Your Appointment has not been Submited.");</script>
  <?php
  header("location:search.php");
}
}


?>