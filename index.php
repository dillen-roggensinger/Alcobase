<!DOCTYPE form PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>

</head>
<body>


<?php

require_once('Validator.php');
echo("This should be a valid username: ");
echo("The length is :". strlen(md5("random")));
if(Validator::validUsername("b34235234234")){
	echo("It is!<br>");
}
else{
	echo("It isn't :(<br>");
}


//include("webpage.php");

$con = oci_connect("der2127", "c00kie5", "w4111c.cs.columbia.edu:1521/adb");
if (!$con){
	$e = oci_error();
	echo "<br />ERROR: ".$e['message']."<br />";
}

$query = "SELECT * FROM bought";



$stid = oci_parse($con, $query);
$err=oci_execute($stid);


while($row = oci_fetch_array($stid,OCI_BOTH+OCI_RETURN_NULLS)){
	echo "INSERT INTO bought VALUES(" . $row['AID'] . "," . $row['DID'] .");";
	echo "<br />";
}

//"INSERT INTO account VALUES('" . $row['NAME'] . "','" . $row['DRINK'] . "'," . $row['VOLUME'] . ",'"
//	. $row['BRAND']. "'," . $row['DID']. "," . $row['ALCOHOL_CONTENT']. ",'" . $row['COUNTRY']. "'," . $row['CALORIES']
//	. ",'" . $row['TYPE']. "'," . $row['YEAR']. ",'" . $row['FLAVOR']. "'," . $row['RATING'] . ");";

oci_close($con);
?>





</body>
</html>
