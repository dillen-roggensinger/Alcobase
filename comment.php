<?php
	include('headerfooter.php');
	include('Inputer.php');
	include('AccountManager.php');
	$user = $_COOKIE['user'];
	$did = $_GET['did'];
	$hf = new HeaderFooter();
	$am = new AccountManager();
	$i = new Inputer();
	$text = $_POST['comment'];
	$hf->header();
	$array = array('text' => $text, 'username' => $user, 'did' => $did);
	$result = $i->insertWrite_Comment($array);
	if($result){
		echo "<table align='center'>
				<tr>
					<td>Comment Added!</td>
				</tr>
				<tr>
					<td>Thanks for your comment!</td>
				</tr>
			</table>";
	}
	else{
		echo "<table align='center'>
				<tr>
					<td>Comment Failed!</td>
				</tr>
				<tr>
					<td>Please make sure your comment has only alpha numeric characters and that you are logged in</td>
				</tr>
			</table>";
	}
	$hf->footer();
?>