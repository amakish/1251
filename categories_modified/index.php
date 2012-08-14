<?php
	require 'model/products.php';
	
	$products = get_products();
	
	include 'views/list.php';
?>