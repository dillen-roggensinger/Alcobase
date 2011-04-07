<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01 Transitional//EN''http://www.w3.org/TR/html4/loose.dtd'>
<?php
include('headerfooter.php');
include('AccountManager.php');

$hf = new HeaderFooter();
$am = new AccountManager();
$hf->header();
//check if user is logged in

if(isset($_COOKIE['user'])){
	$user = $_COOKIE['user'];
	echo "<table align='center'>
			<tr>
				<td colspan='4'><h2>".$user."'s Alcohols</h2></td>
			</tr>
			<tr>
				<td><h3>Name</h3></td>
				<td><h3>Favorite</h3></td>
				<td><h3>Bought</h3></td>
				<td><h3>Rating</h3></td>
			</tr>
			<tr>
				<td colspan='4'>Get alcohols</td>
			</tr>
			<tr>
				<td colspan='4' align='right'><a href='passc.php'>Change Password</a></td>
			</tr>";
	if($am->isAdmin($user)){
		echo "<tr>
				<td colspan='4' align='right'><a href='add.php'>Add to database</a></td>
			</tr>";
		
	}
	echo "<tr>
			<td colspan='4' align='right'><a href='logout.php'>Logout</a></td>
		</tr>";
}
else
	echo "<table align='center'>
		<tr>
			<td><h2>Login Fail!</h2></td>
		</tr>
		<tr>
			<td>You gots to <a href='login.php'>login</a> first!</td>
		</tr>";
echo "</table>";
$hf->footer();


?>