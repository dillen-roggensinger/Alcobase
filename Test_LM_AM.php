<?php 

require_once('LoginManager.php');
require_once('AccountManager.php');
echo("Matching correct password!<br>");

$lm=new LoginManager();
$am=new AccountManager();

if($lm->checkPassword("Badoofer108","getonmylevel")){
	echo("Matched!<br><br>");
}
else{
	echo("No dice :(<br><br>");
}
echo("Matching incorrect password!<br>");
if($lm->checkPassword("ninjaturtles","abcd1234")){
	echo("Matched!<br><br>");
}
else{
	echo("No dice :(<br><br>");
}
echo("Matching existing username!<br>");
if($am->usernameAvailable("ninjaturtles")){
	echo("Free!<br><br>");
}
else{
	echo("Already exists :(<br><br>");
}
echo("Matching nonexisting username!<br>");
if($am->usernameAvailable("thisdoesntexist")){
	echo("Free!<br><br>");
}
else{
	echo("Already exists :(<br><br>");
}

echo("Testing if admin is an admin!<br>");
if($am->isAdmin("sexytime")){
	echo("Admin!<br>");
}
else{
	echo("Not admin!<br>");
}

echo("<br>");

echo("Testing if nonadmin is an admin!<br>");
if($am->isAdmin("BruceWillis")){
	echo("Admin!<br>");
}
else{
	echo("Not admin!<br>");
}


if(isset($_POST['password'])){
	$username=$_POST['username'];
	$pass=$_POST['password'];
	$email=$_POST['email'];
	echo("Creating account!<br>");
	$am->createAccount(0,$username,$pass,$email);
}
else{
	if(isset($_POST['email'])){
		$email=$_POST['email'];
		echo("Resetting password!<br>");
		$lm->resetPassword($email);
	}
}

if(isset($_POST['old_password'])){
	$username=$_POST['username'];
	$oldPass=$_POST['old_password'];
	$newPass1=$_POST['new_password'];
	echo("Changing password!<br>");
	$am->changePassword($username,$oldPass,$newPass1);
}


?>

<form action="Test_LM_AM.php" method="post">
<p>Please type your email address <input type="text" name="email" /></p>
<input type="submit" value="Reset Password" />
</form>

<br><br><br><br>

<form action="Test_LM_AM.php" method="post">
<p>Username: <br /><input type="text" name="username" /></p>
<p>Old Password: <br /><input type="password" name="old_password" /></p>
<p>New Password: <br /><input type="password" name="new_password" /></p>
<input type="submit" value="Change Password" />
</form>

<form action="Test_LM_AM.php" method="post">
<p>Username: <br /> <input type="text" name="username" /></p>
<p>Password: <br /> <input type="password" name="password" /></p>
<p>Email Address: <br /> <input type="text" name="email" /></p>
<input type="submit" value="Register" />
</form>