<?php 

require_once("Retreiver.php");
$ret=new Retreiver();
$array1=$ret->getData(5);
foreach($array1 as $r){
	foreach($r as $c){
		if(isset($c))
			echo($c."  ,  ");
	}
	echo("<br><br>");
}

echo("Data retreival successful!<br><br>");

$array2=$ret->getStores(5);
foreach($array2 as $r){
	foreach($r as $c){
		if(isset($c))
			echo($c."  ,  ");
	}
	echo("<br><br>");
}

echo("Store retreival successful!<br><br>");

$array3=$ret->getComments(5);
foreach($array3 as $r){
	foreach($r as $c){
		if(isset($c))
			echo($c."  ,  ");
	}
	echo("<br><br>");
}

echo("Comment retreival successful!<br><br>");

?>