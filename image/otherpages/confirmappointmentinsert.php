<?php
require "../connection.php";
if (isset($_POST['comfirm_appointment'])) {
$doctor_id=$_SESSION['doctor_id'];
$patient_id=$_GET['patient_id'];
$patient_name=htmlspecialchars($_POST['patient_name']);
$patient_age=htmlspecialchars($_POST['patient_age']);
$mobile_no=htmlspecialchars($_POST['patient_number']);
$appointent_id=htmlspecialchars($_POST['appointment_id']);
$appointment_date=htmlspecialchars($_POST['appointment_date']);
$appointment_time=htmlspecialchars($_POST['appointment_time']);
$appointment_done=mysqli_query($connection,"INSERT INTO appointment_done(doctor_id,Appointment_id,Patient_Name,Patient_Age,Patient_Mobile_no,Appointment_Date,Appointment_Time)values('$doctor_id','$appointent_id','$patient_name','$patient_age','$mobile_no','$appointment_date','$appointment_time')");
if ($appointment_done==true) {
	$delete=mysqli_query($connection,"DELETE FROM appointment where Sir_no='$patient_id' and doctor_id='$doctor_id'");
	header('location:appointmentdone.php');
}
}
?>