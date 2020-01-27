<?php 
require "../connection.php";
$select=mysqli_query($connection,"SELECT *FROM doctor_signup");
$total_record=mysqli_num_rows($select);
$start=0;
$end=20;

if (isset($_GET['id'])) {
   $id=$_GET['id'];
   $start=($id-1)*$end;
}
else{
	$id=1;
}
$page=ceil($total_record/$end);
?>