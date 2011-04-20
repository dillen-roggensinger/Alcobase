<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01 Transitional//EN''http://www.w3.org/TR/html4/loose.dtd'>
<?php
include('headerfooter.php');
include('AccountManager.php');
include('Retriever.php');
$hf = new HeaderFooter();
$am = new AccountManager();
$ret = new Retriever();
$hf->header();
//check if user is logged in

if(isset($_COOKIE['user'])){
	$user = $_COOKIE['user'];
	echo "<table align='center'><tr><td><h2>".$user."'s Alcohols</h2></td></tr></table></br>
		<table align='center'>
			<tr>
				<td colspan='7'><h3>Favorite</h3></td>
			</tr>
			<tr>
				<td><b>Name</b></td>
				<td><b>Drink</b></td>
				<td><b>Volume</b></td>
				<td><b>Rating</b></td>
				<td><b>Brand</b></td>
				<td><b>Alcohol Content</b></td>
				<td><b>Country</b></td>
			</tr>
			";
	$data = $ret->getFavorite($user);
	$rows=0;
	foreach($data as $r){
		$rows++;
		if($rows%2==0)
			echo "<tr class='d0'>";
		else
			echo "<tr class='d1'>";
		foreach($r as $c){
			echo "<td>".$c."</td>";
		}
		echo "</tr>";
	}	
	echo "</table></br>";
	echo "<table align='center'>
			<tr>
				<td colspan='13'><h3>Bought</h3></td>
			</tr>
			<tr>
				<td><b>Name</b></td>
				<td><b>Drink</b></td>
				<td><b>Volume</b></td>
				<td><b>Rating</b></td>
				<td><b>Brand</b></td>
				<td><b>Alcohol Content</b></td>
				<td><b>Country</b></td>
				<td><b>Quantity</b></td>
				<td><b>Price</b></td>
				<td><b>Store Name</b></td>
				<td><b>Store Type</b></td>
				<td><b>Location</b></td>
				<td><b>Time</b></td>
			</tr>
			";
	$data = $ret->getBought($user);
	$rows=0;
	foreach($data as $r){
		$rows++;
		if($rows%2==0)
			echo "<tr class='d0'>";
		else
			echo "<tr class='d1'>";
		foreach($r as $c){
			echo "<td>".$c."</td>";
		}
		echo "</tr>";
	}
	echo "</table></br>
		<table align='left'>
			<tr>
				<td><a href='passc.php'>Change Password</a></td>
			</tr>
		</table>";
	if($am->isAdmin($user)){
		echo "<table align='left'>
			<tr>
				<td><a href='add.php'>Add to database</a></td>
			</tr>
		</table>";
		
	}
	echo "<table align='left'>
		<tr>
			<td><a href='logout.php'>Logout</a></td>
		</tr>
		</table>";
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