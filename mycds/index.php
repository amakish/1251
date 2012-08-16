<?php
	require 'model/database.php';
	require 'model/mycds.php';
	
	if(array_key_exists('title', $_POST))
	{
		addCD($_POST['title']);
	} // End if
	
	$aMyCDs = getCDs();
	
	include 'views/newcd.php';
?>

