<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN""http://www.w3.org/TR/html4/loose.dtd">
<?php
include('headerfooter.php'); 
$hf = new HeaderFooter();
$hf->header();
?>

<table align="center">
	<tr>
		<td><h3>Welcome to Alcobase, your one stop source for all your alcoholic--I mean college student needs!</h3></a></td>
	</tr>
	<tr>
		<td><a href="login.php"><h2>Login</h2></a></td>
	</tr>
	<tr>
		<td><a href="browse.php"><h2>Browse</h2></a></td>
	</tr>
	<tr>
		<td><a href="signup.php"><h2>Sign Up</h2></a></td>
	</tr>
</table>
<p align="center"><input type="submit" value="Log In"></p>

<?php 
$hf->footer();
?>