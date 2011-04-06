<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01 Transitional//EN''http://www.w3.org/TR/html4/loose.dtd'>
<?php
	setcookie('user', '', 1);
	include('headerfooter.php'); 
	$hf = new HeaderFooter();
	$hf->header();
	
	echo "<table align='center'>
			<tr>
				<td><h2>Logout Complete</h2></td>
			</tr>
			<tr>
				<td>Peace, homie.</td>
			</tr>
		</table>";
	
	
	$hf->footer();

?>