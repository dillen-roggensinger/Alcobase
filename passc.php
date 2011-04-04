<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN""http://www.w3.org/TR/html4/loose.dtd">
<?php
include('headerfooter.php'); 
$hf = new HeaderFooter();
$hf->header();
?>

<form action="Scripts/login.php" method="POST">
<table align="center">
	<tr>
		<td colspan="2"><h2>Change Password</h2></td>
	</tr>
	<tr>
		<td>Username:</td>
		<td><input type="text" name="name"></td>
	</tr>
	<tr>
		<td>Old Password:</td>
		<td><input type="password" name="oldpass"></td>
	</tr>
	<tr>
		<td>New Password:</td>
		<td><input type="password" name="newpass"></td>
	</tr>
	<tr>
		<td>Confirm New Password:</td>
		<td><input type="password" name="newpasscheck"></td>
	</tr>
</table>
<p align="center"><input type="submit" value="Change!"></p>

</form>
<?php 
$hf->footer();
?>