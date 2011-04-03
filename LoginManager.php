<?php

/*Given a username and md5 hashed password, determine
 * if the password is correct.
 */
function checkPassword($username,$password){
	$query="
	SELECT a.username
	FROM account a
	WHERE a.password=".$password.";";
	$conn = getConnection();
	$stid = oci_parse($conn, $query);
	$err=oci_execute($stid);
	$row = oci_fetch_array($stid,OCI_BOTH+OCI_RETURN_NULLS);
	
	if(row[0]==$username){
		return true;
	}
	else{
		return false;
	}
}


































?>