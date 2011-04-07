<?php
    include('headerfooter.php'); 
    include('AccountManager.php');
	$hf = new HeaderFooter();
	$am = new AccountManager();
	$hf->header();
	if($am->isAdmin($_COOKIE['user'])){
		echo "<form action='insert.php' method='POST'>
				<table align='center'>
					<tr>
						<td colspan='2'><h2>Add Alcohol</h2></td>
					</tr>
					<tr>
						<td>Name</td>
						<td><input type='text' name='name'></td>
					</tr>
					<tr>
						<td>Drink</td>
						<td><input type='text' name='drink'></td>
					</tr>
					<tr>
						<td>Volume</td>
						<td><input type='text' name='volume'></td>
					</tr>
					<tr>
						<td>Brand</td>
						<td><input type='text' name='brand'></td>
					</tr>
					<tr>
						<td>Alcohol Content</td>
						<td><input type='text' name='alcohol_content'></td>
					</tr>
					<tr>
						<td>Country</td>
						<td><input type='text' name='country'></td>
					</tr>
					<tr>
						<td>Calories</td>
						<td><input type='text' name='calories'></td>
					</tr>
					<tr>
						<td>Type</td>
						<td><input type='text' name='type'></td>
					</tr>
					<tr>
						<td>Year</td>
						<td><input type='text' name='year'></td>
					</tr>
					<tr>
						<td>Flavor</td>
						<td><input type='text' name='flavor'></td>
					</tr>
					<tr>
						<td>Rating</td>
						<td><input type='text' name='rating'></td>
					</tr>
					<tr>
						<td colspan='2'><input type='submit' value='Add'></td>
					</tr>
					<tr>
						<td colspan='2'><h2>Add Sold At Info</h2></td>
					</tr>
					<tr>
						<td>Store Name</td>
						<td><input type='text' name='store_name'></td>
					</tr>
					<tr>
						<td>Store Type</td>
						<td><input type='text' name='store_type'></td>
					</tr>
					<tr>
						<td>Store Hours</td>
						<td><input type='text' name='store_hours'></td>
					</tr>
					<tr>
						<td>Street Address</td>
						<td><input type='text' name='street_address'></td>
					</tr>
					<tr>
						<td>Zip Code</td>
						<td><input type='text' name='zip_code'></td>
					</tr>
					<tr>
						<td>Quantity</td>
						<td><input type='text' name='quantity'></td>
					</tr>
					<tr>
						<td>Price</td>
						<td><input type='text' name='price'></td>
					</tr>
					<tr>
						<td>Did</td>
						<td><input type='text' name='did'></td>
					</tr>
					<tr>
						<td colspan='2'><input type='submit' value='Add'></td>
					</tr>
					<tr>
						<td colspan='2'><h2>Add Admin</h2></td>
					</tr>
					<tr>
						<td>Username</td>
						<td><input type='text' name='admin'></td>
					</tr>
					<tr>
						<td colspan='2'><input type='submit' value='Add'></td>
					</tr>
				</table>
			</form>";
	}
	else{
		echo "<table align='center'>
					<tr>
						<td><h2>Not an Admin!</h2></td>
					</tr>
					<tr>
						<td>You can't be here.</td>
					</tr>
				</table>";
	}
	
	$hf->footer();
?>