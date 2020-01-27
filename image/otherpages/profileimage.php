<h1>Delete Profile Image</h1>
<hr>
<h3 class="text-center">Do you want to delete profile picture?</h3>
<hr>
<div class="text-center">
 <form action="" method="post">
 	<input type="submit" name="delete_image" value="Yes" class="btn btn-primary">
 	<input type="submit" name="no_delete" value="No" class="btn btn-primary">
 </form>
 </div>
 <?php
 require "../connection.php";
 $doctor_id=$_SESSION['doctor_id'];
 if (isset($_GET['profileimage'])) {
 if (isset($_POST['delete_image'])) {
 	$default_image=mysqli_query($connection,"UPDATE doctor_signup set profile_img='9.png' where doctor_id='$doctor_id'");
 	if ($default_image==true) {
 		header("location:profile.php");
 	}
 }
 if (isset($_POST['no_delete'])) {
 	header("location:setting.php");
 }
}
else{
	header('location:setting.php');
}
?>