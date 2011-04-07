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
		$inputSold = array( 'location' => $_POST['location'], 'store_name' => $_POST['store_name'],
			'store_hours' => $_POST['store_hours'], 'store_type' => $_POST['store_type'],
			'did' => $_POST['did'], 'quantity' => $_POST['quantity'], 'price' => $_POST['price']);
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