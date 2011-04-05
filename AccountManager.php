<?php 

class AccountManager{
	
	/*Create an account.
	 * 
	 */
	function createAccount($admin,$username, $password, $email){
		echo("Here we go!");
		require_once("AccountManager.php");
		if(!AccountManager::usernameAvailable($username)){	//Checks if it's valid and not already taken
			echo("<p>Username already exists!<p>");
			return false;
		}
		if(!AccountManager::emailAvailable($email)){	//Checks if it's valid and not already registered to another account
			echo("<p>Email already registered. Reset your password if you forgot it!<p>");
			return false;
		}
		require_once("Validator.php");
		if(!Validator::validPassword($password)){	//Checks that it is valid
			echo("<p>Invalid password!<p>");
			return false;
		}
		echo("Inserting into database!<br>");
//		echo("Admin: ".$admin."<br>Username: ".$username."<br>Password: ".$password."<br>Email: ".$email."<br>");
		$query="INSERT INTO account VALUES(" . $admin . ",'" . $username . "','" . md5($password) . "','" . $email . "')";
		
		echo("Query: ".$query);
		
		$conn = oci_connect("der2127", "c00kie5", "w4111c.cs.columbia.edu:1521/adb");
		$stid = oci_parse($conn, $query);
		$err=oci_execute($stid);
				
		echo("Emailing new user!");
		
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
		LoginManager::emailUser($email, $username, $subject, $body);
		return true;
	}
	
	/*Given a username, determine if it is valid and has not already been registered
	 * to an account.
	 */
	function usernameAvailable($username){
		require_once("Validator.php");
		if(!Validator::validUsername($username)){	//Checks that it is valid
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
		if(!Validator::validEmail($email)){	//Checks that it is valid
			echo("<p>Invalid email!<p>");
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
		if(!Validator::validUsername($username)){	//Checks to see if it is valid
			echo("<p>Invalid username!<p>");
			return false;
		}
		if(!Validator::validPassword($oldPass)){	//Checks to see if it is valid
			echo("<p>Invalid old password!<p>");
			return false;
		}
		if(!Validator::validPassword($newPass)){	//Checks to see if it is valid
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
		LoginManager::emailUser($email, $username, $subject, $body);
		return true;
	}
}

?>