<?php

class Sorter{

	/*Return a sorted array by the passed in attribute.
	 * Valid attributes include:
	 * a.name, a.drink, a.rating, a.brand, a.alcohol_content, a.country, s.quantity, s.price, s.store_name, s.store_type, zip_code
	 */
	function sortData($attribute){
		if($attribute=="name" || $attribute=="drink" || $attribute=="rating" || $attribute=="brand" ||
		$attribute=="alcohol_content" || $attribute=="country" || $attribute=="quantity" || $attribute=="price"
		|| $attribute=="store_name"	|| $attribute=="store_type" || $attribute=="zip_code"){
				
			$query="
			select a.name, a.drink, a.rating, a.brand, a.alcohol_content, a.country, s.quantity, s.price, s.store_name, s.store_type, s.location
			from alcohol a,sold_at s
			where a.did=s.did";

			$conn = oci_connect("der2127", "c00kie5", "w4111c.cs.columbia.edu:1521/adb");
			$stid = oci_parse($conn, $query);
			$err=oci_execute($stid);
			$row = oci_fetch_array($stid,OCI_BOTH+OCI_RETURN_NULLS);
			
			echo("Query: ".$query."<br>");
			while($row = oci_fetch_array($stid,OCI_BOTH+OCI_RETURN_NULLS)){
				array_push($output);
			}
			
			foreach($output as $entry){
				foreach($entry as $column){
					echo($column." ");
				}
				echo("<br>");
			}
//			usort($products, '$this->compare');
			
		}
		else{
			return false;
		}
	}
	
//	function compare($x, $y){
//		if ( $x[1] == $y[1] )
//			return 0;
//		else if ( $x[1] < $y[1] )
//			return -1;
//		else
//			return 1;
//	}
//
//	function searchData(){
//
//	}
}



?>
