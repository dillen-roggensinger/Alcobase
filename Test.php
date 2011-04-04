<?php 

require_once('LoginManager.php');
echo("Matching correct password!<br>");
if(LoginManager::checkPassword("ninjaturtles","p4ssw0rd")){
	echo("Matched!<br><br>");
}
else{
	echo("No dice :(<br><br>");
}
echo("Matching incorrect password!<br>");
if(LoginManager::checkPassword("ninjaturtles","abcd1234")){
	echo("Matched!<br><br>");
}
else{
	echo("No dice :(<br><br>");
}
echo("Matching existing username!<br>");
if(LoginManager::usernameAvailable("ninjaturtles")){
	echo("Free!<br><br>");
}
else{
	echo("Already exists :(<br><br>");
}
echo("Matching nonexisting username!<br>");
if(LoginManager::usernameAvailable("thisdoesntexist")){
	echo("Free!<br><br>");
}
else{
	echo("Already exists :(<br><br>");
}

if(isset($_POST['email'])){
	$email=$_POST['email'];
	echo("Resetting password!<br>");
	LoginManager::resetPassword($email);
}

if(isset($_POST['old_password'])){
	$username=$_POST['username'];
	$oldPass=$_POST['old_password'];
	$newPass1=$_POST['new_password1'];
	$newPass2=$_POST['new_password2'];
	if($newPass1==$newPass2){
		echo("Changing password!<br>");
		LoginManager::changePassword($username,$oldPass,$newPass1);
	}
	else{
		echo("Passwords don't match!");
	}
}


?>

<form action="Test.php" method="post">
<p>Please type your email address <input type="text" name="email" /></p>
<input type="submit" value="Reset Password" />
</form>

<br><br><br><br>

<form action="Test.php" method="post">
<p>Username: <br /><input type="text" name="username" /></p>
<p>Old Password: <br /><input type="password" name="old_password" /></p>
<p>New Password: <br /><input type="password" name="new_password1" /></p>
<p>Confirm: <br /> <input type="password" name="new_password2" /></p>
<input type="submit" value="Change Password" />
</form>