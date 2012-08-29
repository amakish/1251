<?php
	// php-activerecord is an open source ORM library based on the ActiveRecord pattern.
	// It simplifies the interactions with your database and eliminate the chore of hand written SQL for common operations	
	require_once '../ActiveRecord/ActiveRecord.php';

	ActiveRecord\Config::initialize(function($cfg)
	{
		$cfg->set_model_directory('model');
		$cfg->set_connections(
			array(
					'development' => 'mysql://root:@localhost/nhl',
					'test' => 'mysql://username:password@localhost/test_database_name',
					'production' => 'mysql://username:password@localhost/production_database_name'
			)
		);
	});
	
	// ******************************************************
	// Views Control
	// ******************************************************
	$action = (array_key_exists('action', $_POST)?$_POST['action']: '');
	$action = (array_key_exists('action', $_GET)?$_GET['action']: $action);
	
	if($action == '' || $action == 'overview'){
		include 'views\sktrstatsvmain.php';
	} // End if
	elseif($action == 'additional'){
		include 'views\sktrstatsvadditional.php';
	} // End if
	
?>