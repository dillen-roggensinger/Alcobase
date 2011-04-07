<?php 

echo("Working so far!<br>");
require_once("Statistician.php");
$stat=new Statistician();
$did=11;
echo("Favorite count for $did:<br>");
echo($stat->favoriteStats($did)."<br>");
echo("<br>");
echo("Bought count for $did:<br>");
echo($stat->boughtStats($did)."<br>");

?>