<?php
	require 'model/categories.php';
	
	$categories = get_categories();
	
	include 'views/list.php';
?>