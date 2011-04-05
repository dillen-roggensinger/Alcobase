<?php 


require_once("Validator.php");
$val=new Validator();
//
echo("Matching valid string with all characters!<br>");
$text="`~!@#$%^*()-_+={[]}\|:'\"<,>./?";
if($val->valid($text,0,50)){
	echo("Valid!<br>");
	echo(preg_replace("/'/","''",$text)."<br>");
}
else{
	echo("Invalid :(<br>");
}

echo("Success!<br>");








?>