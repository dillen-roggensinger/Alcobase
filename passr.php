<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN""http://www.w3.org/TR/html4/loose.dtd">
<?php
include('headerfooter.php'); 
$hf = new HeaderFooter();
$hf->header();
?>

<form action="Scripts/login.php" method="POST">
<table align="center">
	<tr>
		<td colspan="2"><h2>Reset Password</h2></td>
	</tr>
	<tr>
		<td>Email:</td>
		<td><input type="text" name="email"></td>
	</tr>
</table>
<p align="center"><input type="submit" value=""></p>

</form>
<?php 
$hf->footer();
?>