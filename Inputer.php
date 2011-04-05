<?php 

class Inputer{
	
	/*Inserts a new alcohol entry into the database.
	 * Takes an array of length 12 that has:
	 * (name, drink, volume, brand, did, alcohol_content, country, calories, type, year, flavor, rating)
	 */
	function insertAlcohol($input){
		if(count($input)!=12){
			echo("Invalid input!");
			return false;
		}
		
		$query="
		SELECT a.did
		FROM alcohol a
		WHERE a.did=".$input['did'];

		$conn = oci_connect("der2127", "c00kie5", "w4111c.cs.columbia.edu:1521/adb");
		$stid = oci_parse($conn, $query);
		$err=oci_execute($stid);
		$row = oci_fetch_array($stid,OCI_BOTH+OCI_RETURN_NULLS);

		if(isset($row[0])){
			echo("Alcohol already exists!");
			return false;
		}
		
		echo("Inserting into database!<br>");
		$query="INSERT INTO alcohol VALUES('" . $input['name'] . "','" . $input['drink'] . "'," . $input['volume']
			 . ",'" . $input['brand'] . "'," . $input['did'] . "," . $input['alcohol_content'] . ",'"
			 . $input['country'] . "'," . $input['calories'] . ",'" . $input['type'] . "'," . $input['year']
			 . ",'" . $input['flavor'] . "'," . $input['rating'] . ")";
		echo("(name, drink, volume, brand, did, alcohol_content, country, calories, type, year, flavor, rating)<br>");
		echo("Query: ".$query."<br>");
		$conn = oci_connect("der2127", "c00kie5", "w4111c.cs.columbia.edu:1521/adb");
		$stid = oci_parse($conn, $query);
		$err=oci_execute($stid);
		
		echo("Success!");
		return true;
	}
	
	/*Inserts a new sold_at entry into the database.
	 * Takes an array of length 12 that has:
	 * (location, store_name, store_hours, store_type, did, quantity, price)
	 */
	function insertSold_At($input){
		if(count($input)!=7){
			echo("Invalid input!");
			return false;
		}
		location,store_name,price,did
		$query="
		SELECT s.did
		FROM sold_at s
		WHERE s.location='".$input['location']."' and s.store_name='".$input['store_name']
		."' and s.price=".$input['price']." and s.did=".$input['did'];

		$conn = oci_connect("der2127", "c00kie5", "w4111c.cs.columbia.edu:1521/adb");
		$stid = oci_parse($conn, $query);
		$err=oci_execute($stid);
		$row = oci_fetch_array($stid,OCI_BOTH+OCI_RETURN_NULLS);

		if(isset($row[0])){
			echo("sold_at entry already exists!");
			return false;
		}
		
		echo("Inserting into database!<br>");
		$query="INSERT INTO alcohol VALUES('" . $input['location'] . "','" . $input['store_name'] . "','"
		. $input['store_hours'] . "','" . $input['store_type'] . "'," . $input['did'] . "," . $input['quantity'] . ","
			 . $input['price'] . ")";
		echo("(location, store_name, store_hours, store_type, did, quantity, price)<br>");
		echo("Query: ".$query."<br>");
		$conn = oci_connect("der2127", "c00kie5", "w4111c.cs.columbia.edu:1521/adb");
		$stid = oci_parse($conn, $query);
		$err=oci_execute($stid);
		
		echo("Success!");
		return true;
	}
}

?>