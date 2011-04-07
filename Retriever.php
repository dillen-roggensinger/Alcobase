<?php 

class Retriever{
	
	function getData($did){
		if(!is_numeric($did)){
			return false;
		}
		$query="
		SELECT a.name, a.drink, a.volume, a.brand, a.alcohol_content, a.country, a.calories, a.type, a.year, a.flavor, a.rating
		FROM alcohol a
		WHERE a.did=" . $did;
		
		$conn = oci_connect("der2127", "c00kie5", "w4111c.cs.columbia.edu:1521/adb");
		$stid = oci_parse($conn, $query);
		$err=oci_execute($stid);
		
		$row = oci_fetch_array($stid,OCI_ASSOC+OCI_RETURN_NULLS);
		
		oci_close($conn);
		
		return $row;
	}
	
	function getStores($did){
		if(!is_numeric($did)){
			return false;
		}
		$query="
		SELECT s.location, s.store_name, s.store_hours, s.store_type, s.quantity, s.price
		FROM sold_at s
		WHERE s.did=" . $did;
		
		$conn = oci_connect("der2127", "c00kie5", "w4111c.cs.columbia.edu:1521/adb");
		$stid = oci_parse($conn, $query);
		$err=oci_execute($stid);
		
		$output=array();
		while($row = oci_fetch_array($stid,OCI_ASSOC+OCI_RETURN_NULLS)){
			array_push($output,$row);
		}
		
		oci_close($conn);
		
		return $output;
	}
	
	function getComments($did){
		if(!is_numeric($did)){
			return false;
		}
		$query="
		SELECT wc.username, wc.text, to_char(wc.time, 'Dy DD-Mon-YYYY HH12:MI AM')
		FROM write_comment wc
		WHERE wc.did=" . $did;
		
		$conn = oci_connect("der2127", "c00kie5", "w4111c.cs.columbia.edu:1521/adb");
		$stid = oci_parse($conn, $query);
		$err=oci_execute($stid);
		
		$output=array();
		while($row = oci_fetch_array($stid,OCI_ASSOC+OCI_RETURN_NULLS)){
			array_push($output,$row);
		}
		
		oci_close($conn);
		
		return $output;
	}
	
	function getBought($username){
		require_once("Validator.php");
		$val=new Validator();
		if(!$val->validUsername($username)){
			echo("Invalid username");
			return false;
		}
		
		$query="
		SELECT name, drink, volume, rating, brand, alcohol_content, country, quantity, price, store_name, store_type, location, to_char(time, 'Dy DD-Mon-YYYY HH12:MI AM')
		FROM alcohol natural join sold_at natural join bought
		WHERE username='" . $username . "'";
		
		$conn = oci_connect("der2127", "c00kie5", "w4111c.cs.columbia.edu:1521/adb");
		$stid = oci_parse($conn, $query);
		$err=oci_execute($stid);
		
		$output=array();
		while($row = oci_fetch_array($stid,OCI_ASSOC+OCI_RETURN_NULLS)){
			array_push($output,$row);
		}
		
		oci_close($conn);
		
		return $output;
	}
	
	function getFavorite($username){
		require_once("Validator.php");
		$val=new Validator();
		if(!$val->validUsername($username)){
			echo("Invalid username");
			return false;
		}
		
		$query="
		SELECT name, drink, volume, rating, brand, alcohol_content, country
		FROM alcohol natural join favorite
		WHERE username='" . $username . "'";
		
		$conn = oci_connect("der2127", "c00kie5", "w4111c.cs.columbia.edu:1521/adb");
		$stid = oci_parse($conn, $query);
		$err=oci_execute($stid);
		
		$output=array();
		while($row = oci_fetch_array($stid,OCI_ASSOC+OCI_RETURN_NULLS)){
			array_push($output,$row);
		}
		
		oci_close($conn);
		
		return $output;
	}
}


?>