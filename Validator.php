<?php
class Validator{
	
	/**
	 Validate an email address.
	 Provide email address (raw input)
	 Returns true if the email address has the email
	 address format and the domain exists.
	 */
	function validEmail($email){
		if(!isset($email)){
			return $false;
		}
		$isValid = true;
		$atIndex = strrpos($email, "@");
		if (is_bool($atIndex) && !$atIndex){
			$isValid = false;
		}
		else{
			$domain = substr($email, $atIndex+1);
			$local = substr($email, 0, $atIndex);
			$localLen = strlen($local);
			$domainLen = strlen($domain);
			if ($localLen < 1 || $localLen > 64){
				// local part length exceeded
				$isValid = false;
			}
			else if ($domainLen < 1 || $domainLen > 255){
				// domain part length exceeded
				$isValid = false;
			}
			else if ($local[0] == '.' || $local[$localLen-1] == '.'){
				// local part starts or ends with '.'
				$isValid = false;
			}
			else if (preg_match('/\\.\\./', $local)){
				// local part has two consecutive dots
				$isValid = false;
			}
			else if (!preg_match('/^[A-Za-z0-9\\-\\.]+$/', $domain)){
				// character not valid in domain part
				$isValid = false;
			}
			else if (preg_match('/\\.\\./', $domain)){
				// domain part has two consecutive dots
				$isValid = false;
			}
			else if(!preg_match('/^(\\\\.|[A-Za-z0-9!#%&`_=\\/$\'*+?^{}|~.-])+$/',str_replace("\\\\","",$local))){
				// character not valid in local part unless
				// local part is quoted
				if (!preg_match('/^"(\\\\"|[^"])+"$/',str_replace("\\\\","",$local))){
					$isValid = false;
				}
			}
			if ($isValid && !(checkdnsrr($domain,"MX") || checkdnsrr($domain,"A"))){
				// domain not found in DNS
				$isValid = false;
			}
		}
		return $isValid;
	}
	
	/*Validate an username.
	 * A username must have between 8-32 characters, start with a character
	 * and have at least 1 letter and 1 number. Only letters, underscores and
	 * numbers are allowed.
	 */
	function validUsername($username){
		if(strlen($username)>=8 && strlen($username)<=32){
			$test = filter_var($username, FILTER_VALIDATE_REGEXP,array('options'=>array('regexp'=>'/^[a-zA-Z]\w*$/')));
			if (isset($test)){
				return $test;
			}
			return false;
		}
	}
	
	/*Validate an password.
	 * A username must have between 8-32 characters, start with a character
	 * and have at least 1 letter and 1 number. Only letters, underscores and
	 * numbers are allowed.
	 */
	function validPassword($password){
		if(strlen($password)>=8 && strlen($password)<=32){
			$test = filter_var($password, FILTER_VALIDATE_REGEXP,array('options'=>array('regexp'=>'/^(\w*[a-zA-Z]\w*[0-9]\w*)|(\w*[0-9]\w*[a-zA-Z]\w*)$/')));
			if (isset($test)){
				return $test;
			}
			return false;
		}
	}
	
	/*Validate the text.
	 * The text must be between the input length limits and only contain alphanumerics.
	 */
	function valid($text,$lowerLimit,$upperLimit){
		if(strlen($text)>$lowerLimit && strlen($text)<=$upperLimit){
			$test = filter_var($password, FILTER_VALIDATE_REGEXP,array('options'=>array('regexp'=>'/^\w+$/')));
			if(isset($test)){
				return $test;
			}
			return false;
		}
	}
}







?>