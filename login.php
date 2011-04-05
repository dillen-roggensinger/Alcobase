<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01 Transitional//EN''http://www.w3.org/TR/html4/loose.dtd'>
<?php
include('headerfooter.php'); 
$hf = new HeaderFooter();
$hf->header();

echo "<form action='checklogin.php' method='POST'>
	<table align='center'>
		<tr>
			<td colspan='2'><h2>Login</h2></td>
		</tr>
		<tr>
			<td>Username:</td>
			<td><input type='text' name='id'></td>
		</tr>
		<tr>
			<td>Password:</td>
			<td><input type='password' name='pass'></td>
		</tr>
	</table>
	<p align='center'><input type='submit' value='Log In'></p>
	
	</form>";


$hf->footer();

?>