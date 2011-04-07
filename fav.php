<?php
	include('headerfooter.php');
	include('Inputer.php');
	include('AccountManager.php');
	$user = $_COOKIE['user'];
	$did = $_GET['did'];
	$hf = new HeaderFooter();
	$am = new AccountManager();
	$i = new Inputer();
	$hf->header();
	$array = array('username' => $user, 'did' => $did);
	$result = $i->insertFavorite($array);
	if($result){
		echo "<table align='center'>
				<tr>
					<td>Favorite Added!</td>
				</tr>
				<tr>
					<td>We're glad you liked this drink!</td>
				</tr>
			</table>";
	}
	else{
		echo "<table align='center'>
				<tr>
					<td>Favorite Failed!</td>
				</tr>
				<tr>
					<td>Hmm...</td>
				</tr>
			</table>";
	}
	$hf->footer();
?>