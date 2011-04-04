<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN""http://www.w3.org/TR/html4/loose.dtd">
<?php
include('headerfooter.php'); 
$hf = new HeaderFooter();
$hf->header();
?>

<table align="center">
	<tr>
		<td colspan="10"><h2>Browse</h2></td>
	</tr>
	<tr>
		<td>Name</td>
		<td>Drink</td>
		<td>Volume</td>
		<td>Brand</td>
		<td>Alcohol Content</td>
		<td>Country</td>
		<td>Store Name</td>
		<td>Store Type</td>
		<td>Quantity</td>
		<td>Price</td>
	</tr>
</table>

<?php 
$hf->footer();
?>