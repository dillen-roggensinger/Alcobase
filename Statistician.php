<?php 

class Statistician{
	
	function favoriteStats($did){
		if(!is_numeric($did)){
			return false;
		}
		$query="
		select count(*) as count from favorite where did=" . $did;
		
		$conn = oci_connect("der2127", "c00kie5", "w4111c.cs.columbia.edu:1521/adb");
		$stid = oci_parse($conn, $query);
		$err=oci_execute($stid);
		
		$row = oci_fetch_array($stid,OCI_ASSOC+OCI_RETURN_NULLS);
		$count=$row['COUNT'];
		
		oci_close($conn);
		
		return $count;
	}
	function boughtStats($did){
		if(!is_numeric($did)){
			return false;
		}
		$query="
		select count(*) as count from bought where did=" . $did;
		
		$conn = oci_connect("der2127", "c00kie5", "w4111c.cs.columbia.edu:1521/adb");
		$stid = oci_parse($conn, $query);
		$err=oci_execute($stid);
		
		$row = oci_fetch_array($stid,OCI_ASSOC+OCI_RETURN_NULLS);
		$count=$row['COUNT'];
		
		oci_close($conn);
		
		return $count;
	}
}


?>