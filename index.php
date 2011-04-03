<!DOCTYPE form PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>

</head>
<body>


<?php

//include("webpage.php");

$con = oci_connect("der2127", "c00kie5", "w4111c.cs.columbia.edu:1521/adb");
if (!$con){
	$e = oci_error();
	echo "<br />ERROR: ".$e['message']."<br />";
}

$query = "SELECT * FROM alcohol, sold_at where alcohol.did=sold_at.did";



$stid = oci_parse($con, $query);
$err=oci_execute($stid);


while($row = oci_fetch_array($stid,OCI_BOTH+OCI_RETURN_NULLS)){
echo $row['NAME'] . "  " . $row['LOCATION'] . "  " . $row['PRICE'];
echo "<br />";
}


oci_close($con);
?>

<p>I ain't a part of your system!</p>

</body>
</html>
<<<<<<< HEAD

PLEASE DON'T CHANGE ME :(
