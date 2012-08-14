<?php

require 'database.php';
function get_categories()
{
	global $db;											// to access $db from the database.php file, you have to define it as a global variable inside the function
	$query = 'select categoryName from categories';
	return $db->query($query);
}
?>