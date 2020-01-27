<h1>Your Delete Account</h1>
<hr>
<h3 class="text-center">Do you want to delete Account?</h3>
<hr>
<div class="text-center">
<form action="" method="post">
	<input type="submit" name="yes" value="Yes" class="btn btn-primary">
	<input type="submit" name="no" value="No" class="btn btn-primary">	
</form>
</div>
<?php
require "../connection.php";
if (isset($_GET['deleteaccount'])) {
 $doctor_id=$_SESSION['doctor_id'];
 if (isset($_POST['yes'])) {
 	$delete_account=mysqli_query($connection,"DELETE FROM doctor_signup where doctor_id='$doctor_id'");
 	if ($delete_account==true) {
      session_start();
      session_destroy();
      header('location:../index.php');
 	}
 }
 if (isset($_POST['no'])) {
 	header("location:setting.php");
 }
}
else{
	header("location:setting.php");
}

?>