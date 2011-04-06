<?php 

require_once("Sorter.php");
$sorter=new Sorter();
$array=$sorter->sortData("zip_code",0);
if(isset($array)){
	foreach($array as $r){
		foreach($r as $c){
			echo($c."  ,  ");
		}
		echo("<br>Next row<br>");
	}
}
echo("Successful Browse!<br>");

$array2=$sorter->searchData("zip_code","10025");
if(isset($array2)){
	foreach($array2 as $r){
		foreach($r as $c){
			echo($c."  ,  ");
		}
		echo("<br>Next row<br>");
	}
}
echo("Successful Search!");
?>