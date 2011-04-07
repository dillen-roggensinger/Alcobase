<?php 

require_once("Retriever.php");
$ret=new Retriever();
$array1=$ret->getData(5);
foreach($array1 as $r){
	if(isset($r))
		echo($r."  ,  ");
}
echo("<br><br>");

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

$array4=$ret->getBought("ninjaturtles");
foreach($array4 as $r){
	foreach($r as $c){
		if(isset($c))
			echo($c."  ,  ");
	}
	echo("<br><br>");
}

echo("Bought retreival successful!<br><br>");

$array5=$ret->getFavorite("friday1234");
foreach($array5 as $r){
	foreach($r as $c){
		if(isset($c))
			echo($c."  ,  ");
	}
	echo("<br><br>");
}

echo("Favorite retreival successful!<br><br>");
?>