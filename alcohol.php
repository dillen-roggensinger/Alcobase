<?php
    $did = $_GET['did'];
    include('headerfooter.php'); 
    include('Retriever.php');
    $ret = new Retriever();
	$hf = new HeaderFooter();
	$hf->header();
	if($_GET['drink']=='wine'){
		$attrib1='type';
		$attrib2='year';
	}
	if($_GET['drink']=='beer'){
		$attrib1='calories';
		$attrib2='type';
	}
	if($_GET['drink']=='liquor'){
		$attrib1='type';
		$attrib2='year';
	}
	if($_GET['drink']=='wdrink'){
		$attrib1='calories';
		$attrib2='flavor';
	}
	
	
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
				<td>Location</td>
				<td>Store Name</td>
				<td>Store Type</td>
				<td>Store Hours</td>
				<td>Quantity</td>
				<td>Price</td>
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