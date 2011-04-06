<?php

class Sorter{
	
	/*Return a sorted array by the passed in attribute and ordering.
	 * Valid attributes include:
	 * name, drink, rating, brand, alcohol_content, country, quantity, price, store_name, store_type, zip_code
	 * Valid orderings include:
	 * 0 => descending, 1 => ascending
	 */
	function sortData($attribute,$order){
		if(!($order==0 || $order==1)){
			return NULL;
		}
		if($attribute=="name" || $attribute=="drink" || $attribute=="rating" || $attribute=="brand" ||
		$attribute=="alcohol_content" || $attribute=="country" || $attribute=="quantity" || $attribute=="price"
		|| $attribute=="store_name"	|| $attribute=="store_type" || $attribute=="zip_code"){
			
			if($attribute="zip_code"){
				$attribute="location";
			}
			
			$query="
			SELECT a.name, a.drink, a.volume, a.rating, a.brand, a.alcohol_content, a.country, s.quantity, s.price, s.store_name, s.store_type, s.location, a.did
			FROM alcohol a,sold_at s
			WHERE a.did=s.did";

			$conn = oci_connect("der2127", "c00kie5", "w4111c.cs.columbia.edu:1521/adb");
			$stid = oci_parse($conn, $query);
			$err=oci_execute($stid);
			$row = oci_fetch_array($stid,OCI_ASSOC+OCI_RETURN_NULLS);
			
			$output=array();
			while($row = oci_fetch_array($stid,OCI_ASSOC+OCI_RETURN_NULLS)){
				array_push($output,$row);
			}
			echo("Attribute: ".$attribute."<br>");
			
			$column=array();
			foreach ($output as $key => &$entry) {
				$pieces=explode(" ",$entry['LOCATION']);
				$entry['LOCATION']=$pieces[count($pieces)-1];
    			$column[$key]  = $entry[strtoupper($attribute)]; 
			}
			if($order==0){
				array_multisort($column, SORT_ASC, $output);
			}
			else{
				array_multisort($column, SORT_DESC, $output);
			}
			return $output;
		}
		else{
			return NULL;
		}
	}
	
	function searchData($category,$text){
		if(!(isset($category) && isset($text))){
			return NULL;
		}
		if($category=="name" || $category=="drink" || $category=="brand" || $category=="country"
		|| $category=="store_name"	|| $category=="store_type"){
			require_once("Validator.php");
			$val=new Validator();
			if(!$val->valid($text,1,1000)){
				return NULL;
			}
			
			$table=NULL;
			if($category=="store_name" || $category=="store_type"){
				$table="s";
			}
			else{
				$table="a";
			}
			
			$query="
			SELECT a.name, a.drink, a.rating, a.brand, a.alcohol_content, a.country, s.quantity, s.price, s.store_name, s.store_type, s.location
			FROM alcohol a,sold_at s
			WHERE a.did=s.did and " . $table . "." . $category . "='" . $text . "'";
			
			
			echo("Category: ".$category."<br>");
			echo("Text: ".$text."<br>");
			echo("Table: ".$table."<br>");
			echo("Query: ".$query."<br>");
			
			
			$conn = oci_connect("der2127", "c00kie5", "w4111c.cs.columbia.edu:1521/adb");
			$stid = oci_parse($conn, $query);
			$err=oci_execute($stid);
			$row = oci_fetch_array($stid,OCI_ASSOC+OCI_RETURN_NULLS);
			
			$output=array();
			while($row = oci_fetch_array($stid,OCI_ASSOC+OCI_RETURN_NULLS)){
				array_push($output,$row);
			}
			
			$column=array();
			foreach ($output as $key => &$entry) {
				$pieces=explode(" ",$entry['LOCATION']);
				$entry['LOCATION']=$pieces[count($pieces)-1];
    			$column[$key]  = $entry[strtoupper($category)]; 
			}
			if($order==0){
				array_multisort($column, SORT_ASC, $output);
			}
			else{
				array_multisort($column, SORT_DESC, $output);
			}
			return $output;
		}
		else if($category=="rating" ||	$category=="alcohol_content" || $category=="quantity"
		|| $category=="price" || $category=="zip_code"){
			if(!is_numeric($text)){
				return NULL;
			}
			
			if($attribute="zip_code"){
				$attribute="location";
			}
			
			$table=NULL;
			if($category=="rating" || $category=="alcohol_content"){
				$table="a";
			}
			else{
				$table="s";
			}
			
			$query="
			SELECT a.name, a.drink, a.rating, a.brand, a.alcohol_content, a.country, s.quantity, s.price, s.store_name, s.store_type, s.location
			FROM alcohol a,sold_at s
			WHERE a.did=s.did and " . $table . "." . $category . "='" . $text . "'";
			
			
			echo("Category: ".$category."<br>");
			echo("Text: ".$text."<br>");
			echo("Table: ".$table."<br>");
			echo("Query: ".$query."<br>");
			
			$conn = oci_connect("der2127", "c00kie5", "w4111c.cs.columbia.edu:1521/adb");
			$stid = oci_parse($conn, $query);
			$err=oci_execute($stid);
			$row = oci_fetch_array($stid,OCI_ASSOC+OCI_RETURN_NULLS);
			
			$output=array();
			while($row = oci_fetch_array($stid,OCI_ASSOC+OCI_RETURN_NULLS)){
				array_push($output,$row);
			}
			
			$column=array();
			foreach ($output as $key => &$entry) {
				$pieces=explode(" ",$entry['LOCATION']);
				$entry['LOCATION']=$pieces[count($pieces)-1];
    			$column[$key]  = $entry[strtoupper($category)]; 
			}
			if($order==0){
				array_multisort($column, SORT_ASC, $output);
			}
			else{
				array_multisort($column, SORT_DESC, $output);
			}
			return $output;
		}
		else{
			return NULL;
		}
	}
}



?>
