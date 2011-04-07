<?php

class Sorter{
	
	/*Return a sorted array by the passed in attribute and ordering.
	 * Valid attribute inputs include:
	 * name, drink, volume, rating, brand, alcohol_content, country, quantity, price, store_name,
	 * 		store_type, zip_code, rating
	 * Valid order inputs include:
	 * 0 => descending, 1 => ascending
	 */
	function browseData($attribute,$order){
		
		
		if(!($order==0 || $order==1)){
			return NULL;
		}
		if($attribute=="name" || $attribute=="drink" || $attribute=="rating" || $attribute=="brand" ||
		$attribute=="alcohol_content" || $attribute=="country" || $attribute=="quantity" || $attribute=="price"
		|| $attribute=="store_name"	|| $attribute=="store_type" || $attribute=="volume" || $attribute=="zip_code"
		|| $attribute=="did"){
			
			if($attribute=="zip_code"){
				$attribute="location";
			}
			
			$query="
			SELECT a.name, a.drink, a.volume, a.rating, a.brand, a.alcohol_content, a.country, s.quantity, s.price, s.store_name, s.store_type, s.location, a.did
			FROM alcohol a,sold_at s
			WHERE a.did=s.did";
			
			echo("Query:<br>".$query."<br><br><br>");
			
			
			$conn = oci_connect("der2127", "c00kie5", "w4111c.cs.columbia.edu:1521/adb");
			$stid = oci_parse($conn, $query);
			$err=oci_execute($stid);
			
			$output=array();
			while($row = oci_fetch_array($stid,OCI_ASSOC+OCI_RETURN_NULLS)){
				array_push($output,$row);
			}
			
			oci_close($conn);
			
			$column=array();
			foreach ($output as $key => &$entry) {
				$pieces=explode(" ",$entry['LOCATION']);
				$entry['LOCATION']=$pieces[count($pieces)-1];
			    $column[$key] = $entry[strtoupper($attribute)];
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
	
	/*Searches through a given category for matching rows.
	 * Valid attribute inputs include:
	 * name, drink, volume, rating, brand, alcohol_content, country, quantity, price, store_name,
	 * 		store_type, zip_code, rating
	 * Valid order inputs include:
	 * 0 => descending, 1 => ascending
	 * Valid sortBy inputs are the same as attribute.
	 * Valid text includes only alphanumerics and underscores.
	 */
	function searchData($category,$text,$sortBy,$order){
		if(!(isset($category) && isset($text))){
			return NULL;
		}
		if($category=="name" || $category=="drink" || $category=="brand" || $category=="country"
		|| $category=="store_name"	|| $category=="store_type" || $category=="rating"
		|| $category=="alcohol_content" || $category=="quantity" || $category=="price"
		|| $category=="zip_code" || $category=="volume" || $category=="did"){
			
			if($sortBy=="name" || $sortBy=="drink" || $sortBy=="brand" || $sortBy=="country"
			|| $sortBy=="store_name"	|| $sortBy=="store_type" || $sortBy=="rating"
			|| $sortBy=="alcohol_content" || $sortBy=="quantity" || $sortBy=="price"
			|| $sortBy=="zip_code" || $sortBy=="volume" || $sortBy=="did"){
			
				require_once("Validator.php");
				$val=new Validator();
				if(!$val->validSearch($text)){
					return NULL;
				}
				
				$table=NULL;
				if($category=="store_name" || $category=="store_type" || $category=="quantity"
				|| $category=="price" || $category=="zip_code"){
					$table="s";
				}
				else{
					$table="a";
				}
				
				if($category=="zip_code"){
					$category="location";
				}
				if($sortBy=="zip_code"){
					$sortBy="location";
				}
				
				$query="
				SELECT a.name, a.drink, a.volume, a.rating, a.brand, a.alcohol_content, a.country, s.quantity, s.price, s.store_name, s.store_type, s.location, a.did
				FROM alcohol a, sold_at s
				WHERE a.did=s.did and REGEXP_LIKE(" . $table . "." . $category . ",'" . $text . "','i')";
				
				$conn = oci_connect("der2127", "c00kie5", "w4111c.cs.columbia.edu:1521/adb");
				$stid = oci_parse($conn, $query);
				$err=oci_execute($stid);
				
				$output=array();
				while($row = oci_fetch_array($stid,OCI_ASSOC+OCI_RETURN_NULLS)){
					array_push($output,$row);
				}
				
				oci_close($conn);
				
				$column=array();
				foreach ($output as $key => &$entry) {
					$pieces=explode(" ",$entry['LOCATION']);
					$entry['LOCATION']=$pieces[count($pieces)-1];
					$column[$key] = $entry[strtoupper($sortBy)];
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
		else{
			return NULL;
		}
	}
}

?>

