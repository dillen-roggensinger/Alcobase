<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN""http://www.w3.org/TR/html4/loose.dtd">
<?php
include('headerfooter.php'); 
$hf = new HeaderFooter();
$hf->header();
?>
<form action="results.php" method="GET">
<table align="center">
	<tr>
		<td colspan="2"><h2>Search</h2></td>
	</tr>
	<tr>
		<td><input type="text" name="search"></td>
		<td><SELECT NAME="choice">
		<OPTION VALUE="name">Name</OPTION>
		<OPTION VALUE="drink">Drink</OPTION>
		<OPTION VALUE="volume">Volume</OPTION>
		<OPTION VALUE="brand">Brand</OPTION>
		<OPTION VALUE="alcohol_content">Alcohol Content</OPTION>
		<OPTION VALUE="country">Country</OPTION>
		<OPTION VALUE="rating">Rating</OPTION>
		<OPTION VALUE="store_name">Store Name</OPTION>
		<OPTION VALUE="store_type">Store Type</OPTION>
		<OPTION VALUE="location">Location</OPTION>
		
		</SELECT></td>
	</tr>
	<tr>
		<td colspan="2"><input type="submit" value="Search!"></td>
	</tr>
</table>
</form>
<?php 
$hf->footer();
?>