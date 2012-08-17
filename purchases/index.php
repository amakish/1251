<?php
require '../ActiveRecord/ActiveRecord.php';

ActiveRecord\Config::initialize(function($cfg)
{
	$cfg->set_model_directory('model');
	$cfg->set_connections(
			array(
					'development' => 'mysql://root:@localhost/purchases',
					'test' => 'mysql://username:password@localhost/test_database_name',
					'production' => 'mysql://username:password@localhost/production_database_name'
			)
	);
});

if(array_key_exists('submit', $_POST)){
	$oPurchase = new Purchase();
	
	$oPurchase->date = $_POST['date'];
	$oPurchase->purchase = $_POST['purchase'];
	$oPurchase->price = $_POST['price'];
	
	$oPurchase->save();
}


if(array_key_exists('add', $_POST)){
	include 'views/add.php';
}
else {
	include 'views/list.php';
}

?>
