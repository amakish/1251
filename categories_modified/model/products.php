<?php

require 'database.php';
function get_products()
{
	global $db;											// to access $db from the database.php file, you have to define it as a global variable inside the function
	$query = 'select productName from products';
	return $db->query($query);
}
?>