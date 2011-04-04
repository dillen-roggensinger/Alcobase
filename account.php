<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN""http://www.w3.org/TR/html4/loose.dtd">
<?php
include('headerfooter.php'); 
$hf = new HeaderFooter();
$hf->header();
//check if user is logged in
?>

<table align="center">
	<tr>
		<td colspan="4"><h2>Your Alcohols</h2></td>
	</tr>
	<tr>
		<td><h3>Name</h3></td>
		<td><h3>Favorite</h3></td>
		<td><h3>Bought</h3></td>
		<td><h3>Rating</h3></td>
	</tr>
	<tr>
		<td colspan="4">Get alcohols</td>
	</tr>
</table>

<?php 
$hf->footer();
?>