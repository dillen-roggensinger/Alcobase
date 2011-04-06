<?php
	include("AccountManager.php");
	include("LoginManager.php");
	include("headerfooter.php");
	$hf = new HeaderFooter();
	$am = new AccountManager();
	$lm = new LoginManager();
	$id = $_POST['id'];
    $pass = $_POST['pass'];
    $expire = 60 * 60 * 24 * 60 + time();
    //check username
	if(!$am->usernameAvailable($id)){
		//check username and password combo
		if($lm->checkPassword($id, $pass)){
			setcookie('user', $id, $expire);
			header('Location: account.php');
		}
		else{
			echo "<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01 Transitional//EN''http://www.w3.org/TR/html4/loose.dtd'>";
			$hf->header();
			echo "<table align='center'>
				<tr>
					<td><h2>Invalid Password!</h2></td>
				</tr>
				<tr>
					<td><a href='login.php'>Try again</a></td>
				</tr>
			</table>";
			$hf->footer();
		}
	} 
	else{
		echo "<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01 Transitional//EN''http://www.w3.org/TR/html4/loose.dtd'>";
		$hf->header();
		echo "<table align='center'>
			<tr>
				<td><h2>Invalid Username!</h2></td>
			</tr>
			<tr>
				<td>New User? <a href='signup.php'>Sign Up</a></td>
			</tr>
			<tr>
				<td>Or <a href='login.php'>try again</a></td>
			</tr>
		</table>";
		$hf->footer();
	}
	error_reporting(E_ALL);
	ini_set("display_errors", 1);
	
?>