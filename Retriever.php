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
		
		$output=array();
		while($row = oci_fetch_array($stid,OCI_ASSOC+OCI_RETURN_NULLS)){
			array_push($output,$row);
		}
		
		return $output;
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
		
		return $output;
	}
}


?>