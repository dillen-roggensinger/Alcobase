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
if(LoginManager::checkPassword("ninjaturtles","abc123")){
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
	echo("Here we go!<br>");
	LoginManager::resetPassword($email);
}


?>

<form action="Test2.php" method="post">
<p>Please type your email address <input type="text" name="email" /></p>
<input type="submit" value="Reset Password" />
</form>
