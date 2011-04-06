<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01 Transitional//EN''http://www.w3.org/TR/html4/loose.dtd'>
<?php
	
	include('headerfooter.php'); 
	include('LoginManager.php');
	include('AccountManager.php');
	$hf = new HeaderFooter();
	$lm = new LoginManager();
	$am = new AccountManager();
	$hf->header();
	$id = $_POST['id'];
	$oldpass = $_POST['oldpass'];
	$newpass = $_POST['newpass'];
	$newpasschk = $_POST['newpasschk'];
	if(!$am->usernameAvailable($id)){
		if($lm->checkPassword($id, $oldpass)){
			if(strcmp($newpass, $newpasschk)==0){
				$am->changePassword($id, $oldpass, $newpass);
				echo "<table align='center'>
						<tr>
							<td><h2>Password Changed</h2></td>
						</tr>
						<tr>
							<td>Check your email for your new password and <a href='login.php'>login</a> again</td>
						</tr>
					</table>";
			}
			else{
				echo "<table align='center'>
						<tr>
							<td><h2>Password Mismatch</h2></td>
						</tr>
						<tr>
							<td>New password does not match. Click here to <a href='passc.php'>try again</a></td>
						</tr>
					</table>";
			}
		}
		else{
			echo "<table align='center'>
				<tr>
					<td><h2>Password Mismatch</h2></td>
				</tr>
				<tr>
					<td>Old password does not match username. Click here to <a href='passc.php'>try again</a></td>
				</tr>
			</table>";
		}
	}
	else{
		echo "<table align='center'>
				<tr>
					<td><h2>Username Invalid</h2></td>
				</tr>
				<tr>
					<td>This username is not registered. Clike here to <a href='signup.php'>signup</a></td>
				</tr>
			</table>";
	}
	
	$hf->footer();

?>