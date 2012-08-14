<?php

require 'database.php';
function get_dogs()
{
	global $db;											// to access $db from the database.php file, you have to define it as a global variable inside the function
	$query = 'select name from dogs';
	return $db->query($query);
}
?>