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
			<td><b><a href='browse.php?sort=name&order=0'>&uarr;</a>Name<a href='browse.php?sort=name&order=1'>&darr;</a></b></td>
			<td><b><a href='browse.php?sort=drink&order=0'>&uarr;</a>Drink<a href='browse.php?sort=drink&order=1'>&darr;</a></b></td>
			<td><b><a href='browse.php?sort=volume&order=0'>&uarr;</a>Volume<a href='browse.php?sort=volume&order=1'>&darr;</a></b></td>
			<td><b><a href='browse.php?sort=rating&order=1'>&uarr;</a>Rating<a href='browse.php?sort=rating&order=0'>&darr;</a></b></td>
			<td><b><a href='browse.php?sort=brand&order=0'>&uarr;</a>Brand<a href='browse.php?sort=brand&order=1'>&darr;</a></b></td>
			<td><b><a href='browse.php?sort=alcohol_content&order=1'>&uarr;</a>Alcohol Content<a href='browse.php?sort=alcohol_content&order=0'>&darr;</a></b></td>
			<td><b><a href='browse.php?sort=country&order=0'>&uarr;</a>Country<a href='browse.php?sort=country&order=1'>&darr;</a></b></td>
			<td><b><a href='browse.php?sort=quantity&order=1'>&uarr;</a>Quantity<a href='browse.php?sort=quantity&order=0'>&darr;</a></b></td>
			<td><b><a href='browse.php?sort=price&order=1'>&uarr;</a>Price<a href='browse.php?sort=price&order=0'>&darr;</a></b></td>
			<td><b><a href='browse.php?sort=store_name&order=0'>&uarr;</a>Store Name<a href='browse.php?sort=store_name&order=1'>&darr;</a></b></td>
			<td><b><a href='browse.php?sort=store_type&order=0'>&uarr;</a>Store Type<a href='browse.php?sort=store_type&order=1'>&darr;</a></b></td>
			<td><b><a href='browse.php?sort=zip_code&order=1'>&uarr;</a>Zip Code<a href='browse.php?sort=zip_code&order=0'>&darr;</a></b></td>";
if(isset($_COOKIE['user'])){
	$user = $_COOKIE['user'];
	if($am->isAdmin($user))
		echo "<td><b><a href='browse.php?sort=did&order=1'>&uarr;</a>DID<a href='browse.php?sort=did&order=0'>&darr;</a></b></td>";
}
			
echo "</tr>";

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

$data = $s->browseData($sort, $order);
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
echo "</table>";
$hf->footer();
?>