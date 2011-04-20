<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01 Transitional//EN''http://www.w3.org/TR/html4/loose.dtd'>
<?php
	
	include('headerfooter.php'); 
	include('LoginManager.php');
	include('AccountManager.php');
	$hf = new HeaderFooter();
	$lm = new LoginManager();
	$am = new AccountManager();
	$hf->header();
	$email = $_POST['email'];
	if(!$am->emailAvailable($email)){
		$lm->resetPassword($email);
		echo "<table align='center'>
				<tr>
					<td><h2>Password Reset</h2></td>
				</tr>
				</table>
				<table align='center'>
				<tr>
					<td>Check your email for your new password and <a href='login.php'>login</a></td>
				</tr>
			</table>";
	}
	else{
		echo "<table align='center'>
				<tr>
					<td><h2>Invalid Email</h2></td>
				</tr>
				<tr>
					<td>This email is not registered. Clike here to <a href='signup.php'>signup</a></td>
				</tr>
			</table>";
	}
	
	$hf->footer();

?>