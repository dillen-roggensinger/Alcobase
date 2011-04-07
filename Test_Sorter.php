<?php 

require_once("Sorter.php");
$sorter=new Sorter();

$array=$sorter->browseData("drink",0);
if(isset($array)){
	foreach($array as $r){
		foreach($r as $c){
			echo($c."  ,  ");
		}
		echo("<br><br>");
	}
}
echo("<strong>Successful Browse!</strong><br>");

$array2=$sorter->searchData("drink","beer","name",0);
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