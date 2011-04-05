<?php 
echo("Working so far!<br>");
require_once("Inputer.php");
//$input=array("name" => "Woodchuck Granny Smith", "drink" => "Beer", "volume" => 12, "brand" => "Woodchuck", "did" => 43, "alcohol_content" => 5, "country" => "Holland", "calories" => 120, "type" => "Hard Cider", "year" => "null", "flavor" => "Granny Smith", "rating" => 3.5);
//Inputer::insertAlcohol($input);
$input=array("location" => "2903 Broadway New York NY 10025","store_name" => "International Wine and Spirits","store_hours" => "Mon-Sat: 11:00 am - 10:00 pm","store_type" => "Liquor Store","did" => 32,"quantity" => 1,"price" => 19.99);
Inputer::insertSold_At($input);

?>