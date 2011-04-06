<?php 

require_once("Sorter.php");
$sorter=new Sorter();
$array=$sorter->sortData("name");
echo("Success!");

?>