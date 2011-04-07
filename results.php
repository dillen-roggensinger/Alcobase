<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN""http://www.w3.org/TR/html4/loose.dtd">
<?php
include('headerfooter.php');
include('AccountManager.php');
include('Sorter.php'); 
$hf = new HeaderFooter();
$am = new AccountManager();
$s = new Sorter();
$hf->header();
$cat = $_GET['choice'];
$text = $_GET['search'];

$length = 12;
if(isset($_COOKIE['user'])){
	$user = $_COOKIE['user'];
	if($am->isAdmin($user))
		$length = 13;
}
$sort = 'name';
$order = 0;
//set sort category
if(isset($_GET['sort'])){
	$sort = $_GET['sort'];
}

//set sort order
if(isset($_GET['order'])){
	$order = $_GET['order'];
}

$data = $s->searchData($cat, $text, $sort, $order);
if(!isset($data))
	echo "<table align='center'>
			<tr>
				<td><h2>Search Fail</h2></td>
			</tr>
			<tr>
				<td>Please enter a value into search that includes only letters, numbers and spaces</td>
			</tr>";
else{

	echo "<table align='center'>
			<tr>
				<td colspan='".$length."'><h2>Results</h2></td>
			</tr>
			<tr>
				<th><b><a href='results.php?choice=".$cat."&search=".$text."&sort=name&order=0'>&uarr;</a>Name<a href='results.php?choice=".$cat."&search=".$text."&sort=name&order=1'>&darr;</a></b></th>
				<th><b><a href='results.php?choice=".$cat."&search=".$text."&sort=drink&order=0'>&uarr;</a>Drink<a href='results.php?choice=".$cat."&search=".$text."&sort=drink&order=1'>&darr;</a></b></th>
				<th><b><a href='results.php?choice=".$cat."&search=".$text."&sort=volume&order=0'>&uarr;</a>Volume<a href='results.php?choice=".$cat."&search=".$text."&sort=volume&order=1'>&darr;</a></b></th>
				<th><b><a href='results.php?choice=".$cat."&search=".$text."&sort=rating&order=1'>&uarr;</a>Rating<a href='results.php?choice=".$cat."&search=".$text."&sort=rating&order=0'>&darr;</a></b></th>
				<th><b><a href='results.php?choice=".$cat."&search=".$text."&sort=brand&order=0'>&uarr;</a>Brand<a href='results.php?choice=".$cat."&search=".$text."&sort=brand&order=1'>&darr;</a></b></th>
				<th><b><a href='results.php?choice=".$cat."&search=".$text."&sort=alcohol_content&order=1'>&uarr;</a>Alcohol Content<a href='results.php?choice=".$cat."&search=".$text."&sort=alcohol_content&order=0'>&darr;</a></b></th>
				<th><b><a href='results.php?choice=".$cat."&search=".$text."&sort=country&order=0'>&uarr;</a>Country<a href='results.php?choice=".$cat."&search=".$text."&sort=country&order=1'>&darr;</a></b></th>
				<th><b><a href='results.php?choice=".$cat."&search=".$text."&sort=quantity&order=1'>&uarr;</a>Quantity<a href='results.php?choice=".$cat."&search=".$text."&sort=quantity&order=0'>&darr;</a></b></th>
				<th><b><a href='results.php?choice=".$cat."&search=".$text."&sort=price&order=1'>&uarr;</a>Price<a href='results.php?choice=".$cat."&search=".$text."&sort=price&order=0'>&darr;</a></b></th>
				<th><b><a href='results.php?choice=".$cat."&search=".$text."&sort=store_name&order=0'>&uarr;</a>Store Name<a href='results.php?choice=".$cat."&search=".$text."&sort=store_name&order=1'>&darr;</a></b></th>
				<th><b><a href='results.php?choice=".$cat."&search=".$text."&sort=store_type&order=0'>&uarr;</a>Store Type<a href='results.php?choice=".$cat."&search=".$text."&sort=store_type&order=1'>&darr;</a></b></th>
				<th><b><a href='results.php?choice=".$cat."&search=".$text."&sort=zip_code&order=1'>&uarr;</a>Zip Code<a href='results.php?choice=".$cat."&search=".$text."&sort=zip_code&order=0'>&darr;</a></b></th>";
	if(isset($_COOKIE['user'])){
		$user = $_COOKIE['user'];
		if($am->isAdmin($user))
			echo "<th><b><a href='results.php?sort=did&order=1'>&uarr;</a>DID<a href='results.php?sort=did&order=0'>&darr;</a></b></th>";
	}
	
	
	$rows=0;
	foreach($data as $r){
		$rows++;
		if($rows%2==0)
			echo "<tr class='d0'>";
		else
			echo "<tr class='d1'>";
		$count = 0;
		foreach($r as $c){
			$count++;
			if($length<13 && $count>12){
				break;
			}
			$did = $r['DID'];
			$drink = $r['DRINK'];
			echo "<td><a href='alcohol.php?did=".$did."&drink=".$drink."'>".$c."</td>";
		}
		echo "</tr>";
	}
	if($rows==0){
		echo "<tr><td colspan='".$length."'>No matches were found</td></tr>";
	}
}	
echo "</table>";

$hf->footer();
?>