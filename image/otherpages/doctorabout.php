<h1>About Us</h1>
<?php
 require "../connection.php";
 $doctor_id=$_SESSION['doctor_id'];
 if (isset($_GET['doctorabout'])) {
 $showdata=mysqli_query($connection,"SELECT * from  doctor_signup where doctor_id='$doctor_id'");
 $display=mysqli_fetch_array($showdata);
}
else{
	header("location:setting.php");
}
?>
<table class="table">
	<tr>
		<th>First Name</th>
		<td><?php echo $display['first_name']?></ts>
	</tr>
	<tr>
		<th>Last Name</th>
		<td><?php echo $display['last_name']?></td>
	</tr>
	<tr>
		<th>Email</th>
		<td><?php echo $display['doctor_email']?></td>
	</tr>
	<tr>
		<th>Birthday</th>
		<td><?php echo $display['doctor_birthday']?></td>
	</tr>
	<tr>
	<th>PMDC Number</th>
	<td><?php echo $display['pmdc_registration_no']?></td>
	</tr>
	<tr>
	<th>Gender</th>
	<td><?php echo $display['doctor_gender']?></td>
	</tr>
</table>