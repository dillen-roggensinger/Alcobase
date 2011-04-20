<?php
    $did = $_GET['did'];
    include('headerfooter.php'); 
    include('Retriever.php');
    include('Statistician.php');
    $ret = new Retriever();
	$hf = new HeaderFooter();
	$stat = new Statistician();
	$hf->header();
	if($_GET['drink']=='wine'){
		$attrib1='Type';
		$attrib2='Year';
	}
	if($_GET['drink']=='beer'){
		$attrib1='Calories';
		$attrib2='Type';
	}
	if($_GET['drink']=='liquor'){
		$attrib1='Type';
		$attrib2='Year';
	}
	if($_GET['drink']=='wdrink'){
		$attrib1='Calories';
		$attrib2='Flavor';
	}
	$result = $ret->getData($did);
	if($result==false)
		echo "<table align='center'>
				<tr>
					<td colspan='2'><h2>Invalid Drink</h2></td>
				</tr>
				<tr>
					<td>This page makes no sense without a good one.</td>
				</tr>";
	else{
		$name = $result['NAME'];
		echo "<table align='center'>
				<tr>
					<td colspan='9'><h2>".$name."</h2></td>
				</tr>
				<tr>
					<td colspan='9'>Favs: ".$stat->favoriteStats($did)." Buys: ".$stat->boughtStats($did)."</td>
				</tr>
				<tr>
					<td>Name</td>
					<td>Drink</td>
					<td>Volume</td>
					<td>Brand</td>
					<td>Alcohol Content</td>
					<td>Country</td>
					<td>".$attrib1."</td>
					<td>".$attrib2."</td>
					<td>Rating</td>
				</tr>";
		echo "<tr class='d1'>";
		foreach($result as $c){
			if($c!='')
				echo "<td>".$c."</td>";
		}
		echo "</tr>";
		$result = $ret->getStores($did);
		echo "</table>
			</br>
			<table align='center'>
				<tr>
					<td>Location</td>
					<td>Store Name</td>
					<td>Store Type</td>
					<td>Store Hours</td>
					<td>Quantity</td>
					<td>Price</td>
				</tr>";
		foreach($result as $r){
			$rows++;
			if($rows%2==0)
				echo "<tr class='d0'>";
			else
				echo "<tr class='d1'>";
			foreach($r as $c){
				echo "<td>".$c."</td>";
			}
			echo "<td><a href='buy.php?did=".$did."&location=".$r['LOCATION']."&store=".$r['STORE_NAME'].
				"&quantity=".$r['QUANTITY']."&price=".$r['PRICE']."'>Buy</a></td>";
			echo "</tr>";
		}
		echo "</table>
			</br>
			<table align='center'>
				<tr>
					<td><a href='fav.php?did=".$did."'>Favorite</a></td>
				</tr>";
		
		$result = $ret->getComments($did);
		echo "</table>
			</br>
			<table align='center'>
				<tr>
					<td colspan='3'><h2>Comments</h2></td>
				</tr>";
		$rows=0;
		foreach($result as $r){
			echo "<tr><td>".$r['USERNAME']."</td><td>".$r['TIME']."</td></tr>";
			echo "<tr><td colspan='2'>".$r['TEXT']."</td></tr>";
			
		}
		echo "</table>
			</br>
			<form action='comment.php?did=".$did."' method='POST'>
			<table align='center'>
				<tr>
					<td><textarea rows='5' cols='50' wrap='physical' name='limitedtextarea' 
					onKeyDown='limitText(this.form.limitedtextarea,this.form.countdown,1000);' 
					onKeyUp='limitText(this.form.limitedtextarea,this.form.countdown,1000);'>Add Comment</textarea><br>
					<font size='1'>(Maximum characters: 1000)<br>
					You have <input readonly type='text' name='countdown' size='4' value='1000'> characters left.</font></td>
				</tr>
				<tr>
					<td><input type='submit' value='Comment!'></td>
				</tr>
			</table>";
	}
	$hf->footer();
?>