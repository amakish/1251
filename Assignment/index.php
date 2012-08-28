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
	
	// included views files
	include 'views\sktrstatsview.php';
	
	// Error message: Fatal error: Class 'sktrstat' not found in C:\xampp\htdocs\1251\Assignment\views\sktrstatsview.php on line 5
?>