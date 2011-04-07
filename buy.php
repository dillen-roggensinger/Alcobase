<?php
	include('headerfooter.php');
	include('Inputer.php');
	include('AccountManager.php');
	$hf = new HeaderFooter();
	$am = new AccountManager();
	$i = new Inputer();
	$hf->header();
	$user = $_COOKIE['user'];
	$location = $_GET['location'];
	$store = $_GET['store'];
	$did = $_GET['did'];
	$quantity = $_GET['quantity'];
	$price = $_GET['price'];
	
	$array = array('username' => $user, 'location' => $location, 'store_name' => $store, 'did' => $did,
			'quantity' => $quantity, 'price' => $price);
	$result = $i->insertBought($array);
	if($result){
		echo "<table align='center'>
				<tr>
					<td>Bought Added!</td>
				</tr>
				<tr>
					<td>We're glad you bought this drink!</td>
				</tr>
			</table>";
	}
	else{
		echo "<table align='center'>
				<tr>
					<td>Bought Failed!</td>
				</tr>
				<tr>
					<td>Hmm...</td>
				</tr>
			</table>";
	}
	$hf->footer();
?>