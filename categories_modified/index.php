<?php
	require 'model/dogs.php';
	
	$dogs = get_dogs();
	
	include 'views/list.php';
?>