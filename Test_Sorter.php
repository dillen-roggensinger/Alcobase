<?php 

require_once("Sorter.php");
$sorter=new Sorter();

echo("<strong>Sorting by 'name' by '0' (decending order):</strong><br><br>");
$array=$sorter->sortData("name",0);
if(isset($array)){
	foreach($array as $r){
		foreach($r as $c){
			echo($c."  ,  ");
		}
		echo("<br><br>");
	}
}
echo("<strong>Successful Browse!</strong><br>");

echo("<br><br><br><strong>Searching through 'name' for 'Bass':</strong><br><br>");
$array2=$sorter->searchData("name","Bass");
if(isset($array2)){
	foreach($array2 as $r){
		foreach($r as $c){
			echo($c."  ,  ");
		}
		echo("<br><br>");
	}
}
echo("<strong>Successful Search</strong>!");
?>