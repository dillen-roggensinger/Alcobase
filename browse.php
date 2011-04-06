<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN""http://www.w3.org/TR/html4/loose.dtd">
<?php
include('headerfooter.php');
include('AccountManager.php'); 
include('Sorter.php');
$hf = new HeaderFooter();
$am = new AccountManager();
$s = new Sorter;
$hf->header();

$length = 12;
if(isset($_COOKIE['user'])){
	$user = $_COOKIE['user'];
	if($am->isAdmin($user))
		$length = 13;
}

echo "<table align='center'>
		<tr>
			<td colspan='".$length."'><h2>Browse</h2></td>
		</tr>
		<tr>
			<td><b>&uarr; Name &darr;</b></td>
			<td><b>&uarr; Drink &darr;</b></td>
			<td><b>&uarr; Volume &darr;</b></td>
			<td><b>&uarr; Rating &darr;</b></td>
			<td><b>&uarr; Brand &darr;</b></td>
			<td><b>&uarr; Alcohol Content &darr;</b></td>
			<td><b>&uarr; Country &darr;</b></td>
			<td><b>&uarr; Quantity &darr;</b></td>
			<td><b>&uarr; Price &darr;</b></td>
			<td><b>&uarr; Store Name &darr;</b></td>
			<td><b>&uarr; Store Type &darr;</b></td>
			<td><b>&uarr; Zip Code &darr;</b></td>";
if(isset($_COOKIE['user'])){
	$user = $_COOKIE['user'];
	if($am->isAdmin($user))
		echo "<td><b>&uarr; Did &darr;</b></td>";
}
			
echo "</tr>";
$data = $s->sortData('name', 0);
foreach($data as $r){
	echo "<tr>";
	$count = 0;
	foreach($r as $c){
		$count++;
		if($length<13 && $count>12){
			break;
		}
		echo "<td>".$c."</td>";
	}
	echo "</tr>";
}
echo "</table>";
$hf->footer();
?>