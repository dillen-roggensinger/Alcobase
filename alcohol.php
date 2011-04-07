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
				<td>Drink</td>
				<td>Volume</td>
				<td>Brand</td>
				<td>Alcohol Content</td>
				<td>Country</td>
				<td>".$attrib1."</td>
				<td>".$attrib2."</td>
				<td>Rating</td>
			</tr>";
	
	echo "</table>
		</br>
		<table align='center'>
			<tr>
				<td>Quantity</td>
				<td>Price</td>
				<td>Store Name</td>
				<td>Store Type</td>
				<td>Store Hours</td>
				<td>Street Address</td>
			</tr>";
			
	echo "</table>
		</br>
		<table align='center'>
			<tr>
				<td colspan='2'><h2>Comment</h2></td>
			</tr>";
	
	echo "</table>";

	$hf->footer();
?>