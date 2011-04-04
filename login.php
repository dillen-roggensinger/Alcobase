<? 
include('headerfoooter.php'); 
header();
?>

<form action="Scripts/login.php" method="POST">
<table align="center">
	<tr>
		<td colspan="2"><h2>Login</h2></td>
	</tr>
	<tr>
		<td>Username:</td>
		<td><input type="text" name="name"></td>
	</tr>
	<tr>
		<td>Password:</td>
		<td><input type="password" name="pass"></td>
	</tr>
</table>
<p align="center"><input type="submit" value="Log In"></p>

</form>
<?php footer(); ?>