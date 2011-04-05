<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN""http://www.w3.org/TR/html4/loose.dtd">
<?php
include('headerfooter.php'); 
$hf = new HeaderFooter();
$hf->header();
?>

<form action="signupcheck.php" method="POST">
<table align="center">
	<tr>
		<td colspan="2"><h2>Sign Up</h2></td>
	</tr>
	<tr>
		<td><p>First Name:</p></td>
		<td><input type="text" name="fname"></td>
	</tr>
	<tr>
		<td><p>Last Name:</p></td>
		<td><input type="text" name="lname"></td>
	</tr>
	<tr>
		<td><p>Username:</p></td>
		<td><input type="text" name="id"></td>
	</tr>
	<tr>
		<td><p>Password:</p></td>
		<td><input type="password" name="pass"></td>
	</tr>
	<tr>
		<td><p>Re-Enter Password:</p></td>
		<td><input type="password" name="passchk"></td>
	</tr>
	<tr>
		<td><p>Email:</p></td>
		<td><input type="text" name="email"></td>
	</tr>
</table>
<p align="center"><input type="submit" value="Sign Up"></p>
</form>

<?php 
$hf->footer();
?>