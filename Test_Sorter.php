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
echo("Success!");

?>