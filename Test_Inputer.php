<?php 
echo("Working so far!<br>");
require_once("Inputer.php");
echo("Inputing alcohol<br>");
$input=array("name" => "Woodchuck Granny Smith", "drink" => "Beer", "volume" => 12, "brand" => "Woodchuck", "alcohol_content" => 5, "country" => "Holland", "calories" => 120, "type" => "Hard Cider", "year" => "null", "flavor" => "Granny Smith", "rating" => 3.5);
Inputer::insertAlcohol($input);
echo("Inputing sold_at<br>");
$input=array("location" => "2903 Broadway New York NY 10025","store_name" => "International Wine and Spirits","store_hours" => "Mon-Sat: 11:00 am - 10:00 pm","store_type" => "Liquor Store","did" => 32,"quantity" => 1,"price" => 19.99);
Inputer::insertSold_At($input);
echo("Inputing favorite<br>");
$input=array("username" => "Badoofer108","did" => 32);
Inputer::insertFavorite($input);
echo("Inputing bought<br>");
$input=array("username" => "Badoofer108","did" => 11,"quantity" => 6,"location" => "1225 Amsterdam Avenue New York NY 10027", "store_name" => "Apple Tree Supermarket","price" => 11.99);
Inputer::insertBought($input);
echo("Inputing write_comment<br>");
$input=array("text" => "this comment will blow your mind!","username" => "Badoofer108","did" => 23);
Inputer::insertWrite_Comment($input);

?>