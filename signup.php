<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN""http://www.w3.org/TR/html4/loose.dtd">
<?php
include('headerfooter.php'); 
$hf = new HeaderFooter();
$hf->header();
?>

<form action="signupcheck.php" method="POST">
<table align="center">
	<tr>
		<td colspan="13"><h2>Sign Up</h2></td>
	</tr>
	<tr>
		<td></td><td></td><td></td><td></td><td></td><td></td><td></td>
		<td><p>Username:</p></td>
		<td><input type="text" name="id"></td>
		<td></td><td></td><td></td><td></td>
	</tr>
	<tr>
		<td></td><td></td><td></td><td></td><td></td><td></td><td></td>
		<td><p>Password:</p></td>
		<td><input type="password" name="pass"></td>
		<td></td><td></td><td></td><td></td>
	</tr>
	<tr>
		<td></td><td></td><td></td><td></td><td></td><td></td><td></td>
		<td><p>Confirm Password:</p></td>
		<td><input type="password" name="passchk"></td>
		<td></td><td></td><td></td><td></td>
	</tr>
	<tr>
		<td></td><td></td><td></td><td></td><td></td><td></td><td></td>
		<td><p>Email:</p></td>
		<td><input type="text" name="email"></td>
		<td></td><td></td><td></td><td></td>
	</tr>
</table>
<p align="center"><input type="submit" value="Sign Up"></p>
</form>

<?php 
$hf->footer();
?>