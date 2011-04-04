<?php 

class AccountManager{
	
	/*Create an account.
	 * 
	 */
//	function createAccount($username, $password){
//		
//	}
	
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
	
	/*Allows a user to change their current password
	 * 
	 */
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
}

?>