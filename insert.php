<?php
	include('headerfooter.php');
	include('Inputer.php');
	$hf = new HeaderFooter();
	$i = new Inputer();
	$hf->header();
	
	if(isset($_POST['name'])){
		$inputAlc = array('name' => $_POST['name'], 'drink' => $_POST['drink'], 'volume' => $_POST['volume'],
			'brand' => $_POST['brand'], 'alcohol_content' => $_POST['alcohol_content'], 'country' => $_POST['country'],
			'calories' => $_POST['calories'], 'type' => $_POST['type'], 'year' => $_POST['year'],
			'flavor' => $_POST['flavor'], 'rating' => $_POST['rating']);
		$result = $i->insertAlcohol($inputAlc);
		if($result){
			echo "<table align='center'>
					<tr>
						<td><h2>Insert Complete</h2></td>
					</tr>
					<tr>
						<td>Thankies.</td>
					</tr>
				</table>";
		}
		else{
			echo "<table align='center'>
					<tr>
						<td><h2>Insert Failed</h2></td>
					</tr>
					<tr>
						<td><a href='add.php'>Retry</a></td>
					</tr>
				</table>";
		}
	}
	else if(isset($_POST['store_name'])){
		$inputSold = array('store_name' => $_POST['store_name'], 'store_type' => $_POST['store_type'],
			'store_hours' => $_POST['store_hours'], 'stree_address' => $_POST['street_address'],
			'zip_code' => $_POST['zip_code'], 'quantity' => $_POST['quantity'], 'price' => $_POST['price'],
			'did' => $_POST['did']);
		$result = $i->insertSold_At($inputSold);
		if($result){
			echo "<table align='center'>
					<tr>
						<td><h2>Insert Complete</h2></td>
					</tr>
					<tr>
						<td>Thankies.</td>
					</tr>
				</table>";
		}
		else{
			echo "<table align='center'>
					<tr>
						<td><h2>Insert Failed</h2></td>
					</tr>
					<tr>
						<td><a href='add.php'>Retry</a></td>
					</tr>
				</table>";
		}
	}
	else if(isset($_POST['admin'])){
		$result = $i->insertSold_At($inputSold);
		if($result){
			echo "<table align='center'>
					<tr>
						<td><h2>Insert Complete</h2></td>
					</tr>
					<tr>
						<td>Thankies.</td>
					</tr>
				</table>";
		}
		else{
			echo "<table align='center'>
					<tr>
						<td><h2>Insert Failed</h2></td>
					</tr>
					<tr>
						<td><a href='add.php'>Retry</a></td>
					</tr>
				</table>";
		}
	}
	else
		echo "<table align='center'>
				<tr>
					<td><h2>Insert Failed</h2></td>
				</tr>
				<tr>
					<td><a href='add.php'>Retry</a></td>
				</tr>
			</table>";
?>