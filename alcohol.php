<?php
    $did = $_GET['did'];
    $name = $_GET['name'];
    include('headerfooter.php'); 
	$hf = new HeaderFooter();
	$hf->header();
	$attrib1='poo';
	$attrib2='poopie';
	
	echo "<table align='center'>
			<tr>
				<td colspan='2'><h2>".$name."</h2></td>
			</tr>
			<tr>
				<td>Name</td>
				<td>Name</td>
			</tr>
			<tr>
				<td>Drink</td>
				<td>Name</td>
			</tr>
			<tr>
				<td>Volume</td>
				<td>Name</td>
			</tr>
			<tr>
				<td>Brand</td>
				<td>Name</td>
			</tr>
			<tr>
				<td>Alcohol Content</td>
				<td>Name</td>
			</tr>
			<tr>
				<td>Country</td>
				<td>Name</td>
			</tr>
			<tr>
				<td>".$attrib1."</td>
				<td>Name</td>
			</tr>
			<tr>
				<td>".$attrib2."</td>
				<td>Name</td>
			</tr>
			<tr>
				<td>Rating</td>
				<td>Name</td>
			</tr>
			<tr>
				<td>Quantity</td>
				<td>Name</td>
			</tr>
			<tr>
				<td>Price</td>
				<td>Name</td>
			</tr>
			<tr>
				<td>Store Name</td>
				<td>Name</td>
			</tr>
			<tr>
				<td>Store Type</td>
				<td>Name</td>
			</tr>
			<tr>
				<td>Store Hours</td>
				<td>Name</td>
			</tr>
			<tr>
				<td>Street Address</td>
				<td>Name</td>
			</tr>
			<tr>
				<td>Zip Code</td>
				<td>Name</td>
			</tr>
		</table>";
	
	
	$hf->footer();
?>