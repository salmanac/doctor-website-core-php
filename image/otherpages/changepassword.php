<h1>Chang Old Password</h1>
 	 <hr>
<form action="" method="post">
	<div class="form-group">
		Old Password
	    <input type="password" name="old_password" class="form-control" required placeholder="Old Password">
	</div>
	<div class="form-group">
		New Password
	    <input type="password" name="new_password" class="form-control" required placeholder="New Password">
	</div>
	<div class="form-group">
		Confirm New Password
	    <input type="password" name="confirm_password" class="form-control" requird placeholder="New Confirm Password">
	</div>
	<div class="form-group">
	  <input type="submit" name="change_password" class="btn btn-primary" value="Change Password">
	</div>
</form>
<?php
require "../connection.php";
$doctor_id=$_SESSION['doctor_id'];
if (isset($_GET['changepassword'])) {
if (isset($_POST['change_password'])) {
	$old_password=htmlspecialchars($_POST['old_password']);
	$new_password=htmlspecialchars($_POST['new_password']);
    $confirm_password=htmlspecialchars($_POST['confirm_password']);
    $check_old_password=mysqli_query($connection,"SELECT * from doctor_signup where doctor_password='$old_password' AND doctor_id='$doctor_id'");
    if (mysqli_num_rows($check_old_password)==0) {
    ?>
    <script>alert('Your Old Password are wrong')</script>
    <?php
    }
    else if($new_password!=$confirm_password){
    ?>
    <script>alert('Your New Password not Match confirm Password')</script>
    <?php
    }
    else{
    	$new_password_save=mysqli_query($connection,"UPDATE doctor_signup SET doctor_password='$new_password',doctor_confirm_password='$confirm_password' where doctor_id='$doctor_id'");
 session_start();
 session_destroy();
 header('location:../index.php');
    }
}
}
else{
	header("location:setting.php");
}
?>