<?php
    include("AccountManager.php");
	include("LoginManager.php");
	include("Validator.php");
	include("headerfooter.php");
	$hf = new HeaderFooter();
	$am = new AccountManager();
	$lm = new LoginManager();
	$val = new Validator();
	$id = $_POST['id'];
    $pass = $_POST['pass'];
    $passchk = $_POST['passchk'];
    $email = $_POST['email'];
    if($val->validUsername($id)){
	    //check username
		if($am->usernameAvailable($id)){
			//valid password
			if($val->validPassword($pass)){
				//match passowrds
				if(strcmp($pass, $passchk)==0){
					//check email for validity
					if($val->validEmail($email)){
						//check email for duplicate
						if($am->emailAvailable($email)){
							$am->createAccount(0, $id, $pass, $email);
							echo "<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01 Transitional//EN''http://www.w3.org/TR/html4/loose.dtd'>";
							$hf->header();
							echo "<table align='center'>
								<tr>
									<td><h2>Sign up Successful!</h2></td>
								</tr>
								<tr>
									<td>Now you can <a href='login.php'>Login</a>.</td>
								</tr>
							</table>";
							$hf->footer();
						}
						else{
							echo "<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01 Transitional//EN''http://www.w3.org/TR/html4/loose.dtd'>";
							$hf->header();
							echo "<table align='center'>
								<tr>
									<td><h2>Email Taken!</h2></td>
								</tr>
								<tr>
									<td><a href='signup.php'>Try again</a> with another email.</td>
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
								<td><h2>Invalid Email!</h2></td>
							</tr>
							<tr>
								<td><a href='signup.php'>Try again</a></td>
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
							<td><h2>Passwords don't match!</h2></td>
						</tr>
						<tr>
							<td><a href='signup.php'>Try again</a></td>
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
						<td><h2>Invalid Password!</h2></td>
					</tr>
					<tr>
						<td>Passwords should only contain letters, numbers and underscore, and must contain at least one letter and one number.</td>
					</tr>
					<tr>
						<td><a href='signup.php'>Try again</a></td>
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
					<td><h2>Username Taken!</h2></td>
				</tr>
				<tr>
					<td><a href='signup.php'>Try again</a></td>
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
				<td>Usernames should only contain letters, numbers and underscore</td>
			</tr>
			<tr>
				<td><a href='signup.php'>Try again</a></td>
			</tr>
		</table>";
		$hf->footer();
    }
    
?>