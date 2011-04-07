<?php 

class AccountManager{
	
	/*Create an account.
	 * 
	 */
	function createAccount($admin,$username, $password, $email){
		if(!($admin==0 || $admin==1)){
			return false;
		}
		if(!$this->usernameAvailable($username)){	//Checks if it's valid and not already taken
			echo("<p>Username already exists!<p>");
			return false;
		}
		if(!$this->emailAvailable($email)){	//Checks if it's valid and not already registered to another account
			echo("<p>Email already registered. Reset your password if you forgot it!<p>");
			return false;
		}
		require_once("Validator.php");
		$val=new Validator();
		if(!$val->validPassword($password)){	//Checks that it is valid
			echo("<p>Invalid password!<p>");
			return false;
		}

		$query="INSERT INTO account VALUES(" . $admin . ",'" . $username . "','" . md5($password) . "','" . $email . "')";
		
		$conn = oci_connect("der2127", "c00kie5", "w4111c.cs.columbia.edu:1521/adb");
		$stid = oci_parse($conn, $query);
		$err=oci_execute($stid);
		
		oci_close($conn);
		
		// subject
		$subject = "Registration for " . $username;
		
		// message
		$body = '
		<html>
		<head>
		<title>Registration for your Alcobase Account</title>
		</head>
		<body>
		<p>Hi! Welcome to Alcobase, your one stop place for all your alcohol *erm* uhh college needs!</p>
		<p>Please store this username and password in your records!</p>
		<br>Username:
		<strong>' . $username . '</strong>
		<br>Password:
		<strong>' . $password . '</strong>
		<br /><br />
		</body>
		</html>
		';
		
		require_once("LoginManager.php");
		$lm=new LoginManager();
		$lm->emailUser($email, $username, $subject, $body);
		return true;
	}
	
	/*Given a username, determine if it is valid and has not already been registered
	 * to an account.
	 */
	function usernameAvailable($username){
		require_once("Validator.php");
		$val=new Validator();
		if(!$val->validUsername($username)){	//Checks that it is valid
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
		
		oci_close($conn);
		
		if($row[0]!=$username){
			return true;
		}
		else{
			return false;
		}
	}
	
	/*Checks if an email is valid and has not already been registered to another account
	 * 
	 */
	function emailAvailable($email){
		require_once("Validator.php");
		$lm=new Validator();
		if(!$lm->validEmail($email)){	//Checks that it is valid
			return false;
		}
		$query="
		SELECT a.email
		FROM account a
		WHERE a.email='".$email."'";

		$conn = oci_connect("der2127", "c00kie5", "w4111c.cs.columbia.edu:1521/adb");
		$stid = oci_parse($conn, $query);
		$err=oci_execute($stid);
		$row = oci_fetch_array($stid,OCI_BOTH+OCI_RETURN_NULLS);
		
		oci_close($conn);
		
		if($row[0]!=$email){
			return true;
		}
		else{
			return false;
		}
	}
	
	/*Allows a user to change their current password
	 * 
	 */
	function changePassword($username,$oldPass,$newPass){
		require_once("Validator.php");
		$val=new Validator();
		if(!$val->validUsername($username)){	//Checks to see if it is valid
			return false;
		}
		if(!$val->validPassword($oldPass)){	//Checks to see if it is valid
			return false;
		}
		if(!$val->validPassword($newPass)){	//Checks to see if it is valid
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
			return false;
		}
		
		$email=$row[0];
		
		$query = "
		UPDATE account a
		SET a.password = '" . md5($newPass) . "'
		WHERE a.username = '" . $username . "'";
		 
		$stid = oci_parse($conn, $query);
		$err = oci_execute($stid);
		
		oci_close($conn);
		
		// subject
		$subject = "Change Password for " . $username;
		
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
		$lm=new LoginManager();
		$lm->emailUser($email, $username, $subject, $body);
		return true;
	}
	
	function isAdmin($username){
		require_once("Validator.php");
		$val=new Validator();
		if(!$val->validUsername($username)){
			return false;
		}
		
		$query="
		SELECT a.admin
		FROM account a
		WHERE a.username='" . $username . "'";

		$conn = oci_connect("der2127", "c00kie5", "w4111c.cs.columbia.edu:1521/adb");
		$stid = oci_parse($conn, $query);
		$err=oci_execute($stid);
		$row = oci_fetch_array($stid,OCI_BOTH+OCI_RETURN_NULLS);
		
		oci_close($conn);
		
		if(!isset($row[0])){
			return false;
		}
		if($row[0]==1){
			return true;
		}
		else{
			return false;
		}
	}
	
	function makeAdmin($username){
		require_once("Validator.php");
		$val=new Validator();
		if(!$val->validUsername($username)){
			return false;
		}
		
		$query="
		SELECT a.username
		FROM account a
		WHERE a.username='$username'";
		
		$conn = oci_connect("der2127", "c00kie5", "w4111c.cs.columbia.edu:1521/adb");
		$stid = oci_parse($conn, $query);
		$err=oci_execute($stid);
		$row = oci_fetch_array($stid,OCI_NUM+OCI_RETURN_NULLS);
		
		if(!isset($row[0])){
			echo("Username does not exist!<br>");
			return false;
		}
		$query="UPDATE account a SET a.admin=1 WHERE a.username='" . $username . "'";
		$stid = oci_parse($conn, $query);
		$err=oci_execute($stid);
		
		oci_close($conn);
		return true;
	}
}

?>