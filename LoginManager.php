<?php
class LoginManager{

	/*Given a username and md5 hashed password, determine
	 * if the password is correct.
	 */
	function checkPassword($username,$password){
		require_once("Validator.php");
		if(!Validator::validUsername($username)){
			echo("<p>Invalid username!<p>");
			return false;
		}
		if(!Validator::validPassword($password)){
			echo("<p>Invalid password!<p>");
			return false;
		}
		$query="
		SELECT a.password
		FROM account a
		WHERE a.username='".$username."'";

		$conn = oci_connect("der2127", "c00kie5", "w4111c.cs.columbia.edu:1521/adb");
		if (!$conn){
			echo "<br />ERROR: ".$e['message']."<br />";
		}
		$stid = oci_parse($conn, $query);
		$err=oci_execute($stid);
		$row = oci_fetch_array($stid,OCI_BOTH+OCI_RETURN_NULLS);

		echo("Row[0] is: ".$row[0]."<br>");

		if($row[0]==$password){
			return true;
		}
		else{
			return false;
		}
	}

	/*Given a username, determine if it has been registered
	 * to an account already.
	 */
	function usernameAvailable($username){
		require_once("Validator.php");
		if(!Validator::validUsername($username)){
			echo("<p>Invalid username!<p>");
			return false;
		}
		$query="
		SELECT a.username
		FROM account a
		WHERE a.username='".$username."'";

		$conn = oci_connect("der2127", "c00kie5", "w4111c.cs.columbia.edu:1521/adb");
		$stid = oci_parse($conn, $query);
		$err=oci_execute($stid);
		$row = oci_fetch_array($stid,OCI_BOTH+OCI_RETURN_NULLS);

		echo("Row[0] is: ".$row[0]."<br>");

		if($row[0]!=$username){
			return true;
		}
		else{
			return false;
		}
	}

	/*Resets a password for a given email.
	 * Sanitizes the input and then if the email is registered to an account it will
	 * send an email with the username and the new password for that account.
	 */
	function resetPassword($email){
		require_once("Validator.php");
		if(!Validator::validEmail($email)){
			echo("<p>Invalid email!<p>");
			return false;
		}
		$query="
		SELECT a.username
		FROM account a
		WHERE a.email='" . $email . "'";

		$conn = oci_connect("der2127", "c00kie5", "w4111c.cs.columbia.edu:1521/adb");
		$stid = oci_parse($conn, $query);
		$err=oci_execute($stid);
		$row = oci_fetch_array($stid,OCI_BOTH+OCI_RETURN_NULLS);

		if(!isset($row[0])){
			echo("<p>Not a registered email!<p>");
			return false;
		}
		
		$username=$row[0];
		$newPass = md5(date(DATE_RFC822));
		$newMD5pass = md5($newPass);

		$query = "
		UPDATE account a
		SET a.password = '" . $newMD5pass . "'
		WHERE a.email = '" . $email . "'";
		 
		$stid = oci_parse($conn, $query);
		$err = oci_execute($stid);
		
		// message
		$body = '
		<html>
		<head>
		<title>Change Password for your Alcobase Account</title>
		</head>
		<body>
		<p>Hi! You have requested a password reset for this account.</p>
		<p>Please return to Alcobase and use this password to log in</p>
		<strong>' . $newPass . '</strong>
		<br /><br />
		</body>
		</html>
		';
		
		require_once("LoginManager.php");
		LoginManager::emailUser($email, $username,$body);
	}
	
	function changePassword($username,$oldPass,$newPass){
		require_once("Validator.php");
		if(!Validator::validUsername($username)){
			echo("<p>Invalid username!<p>");
			return false;
		}
		if(!Validator::validPassword($oldPass)){
			echo("<p>Invalid old password!<p>");
			return false;
		}
		if(!Validator::validPassword($newPass)){
			echo("<p>Invalid new password!<p>");
			return false;
		}
		$query="
		SELECT a.email
		FROM account a
		WHERE a.username='" . $username . "' and a.password='" . md5($oldPass) . "'";

		$conn = oci_connect("der2127", "c00kie5", "w4111c.cs.columbia.edu:1521/adb");
		$stid = oci_parse($conn, $query);
		$err=oci_execute($stid);
		$row = oci_fetch_array($stid,OCI_BOTH+OCI_RETURN_NULLS);

		if(!isset($row[0])){
			echo("<p>Username and password do not match!<p>");
			return false;
		}
		
		$email=$row[0];
		
		$query = "
		UPDATE account a
		SET a.password = '" . md5($newPass) . "'
		WHERE a.username = '" . $username . "'";
		 
		$stid = oci_parse($conn, $query);
		$err = oci_execute($stid);
		
		// message
		$body = '
		<html>
		<head>
		<title>Change Password for your Alcobase Account</title>
		</head>
		<body>
		<p>Hi! You have changed your password for this account.</p>
		<p>Please store this password in your records</p>
		<strong>' . $newPass . '</strong>
		<br /><br />
		</body>
		</html>
		';
		
		require_once("LoginManager.php");
		LoginManager::emailUser($email, $username,$body);
	}
	
	/**Email a user with their reset password
	 * 
	 */
	function emailUser($email, $username, $body) {
		// subject
		$subject = "Change Password for " . $username;

		$headers = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		// Additional headers
		$headers .= 'From: Alcobase' . "\r\n";

		if (mail($email, $subject, $body, $headers)) {
			echo("<p>Message successfully sent!</p>");
		}
		else {
			echo("<p>Message delivery failed...</p>");
		}
	}



}

?>