<?php
	include('headerfooter.php');
	include('Inputer.php');
	include('AccountManager.php');
	$hf = new HeaderFooter();
	$am = new AccountManager();
	$i = new Inputer();
	$hf->header();
	
	if($_POST['name']!=''){
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
	else if($_POST['store_name']!=''){
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
	else if($_POST['admin']!=''){
		$result = $am->makeAdmin($_POST['admin']);
		if($result){
			echo "<table align='center'>
					<tr>
						<td><h2>Change Complete</h2></td>
					</tr>
					<tr>
						<td>Thankies.</td>
					</tr>
				</table>";
		}
		else{
			echo "<table align='center'>
					<tr>
						<td><h2>Change Failed</h2></td>
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