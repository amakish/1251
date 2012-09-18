<?php
	$action = (array_key_exists('action', $_POST)?$_POST['action']: ''); 
	$action = (array_key_exists('action', $_GET)?$_GET['action']: $action);
	
	require '../ActiveRecord/ActiveRecord.php';
	
	ActiveRecord\Config::initialize(function($cfg)
	{
		$cfg->set_model_directory('model');
		$cfg->set_connections(
				array(
						'development' => 'mysql://root:@localhost/jobs',
						'test' => 'mysql://username:password@localhost/test_database_name',
						'production' => 'mysql://username:password@localhost/production_database_name'
				)
		);
	});
	
	if($action=='Update'){
		$oJob = Job::find($_POST['id']);
		$oJob->nextaction = $_POST['nextaction'];
		$oJob->save();
		include 'views/list.php';
	} // End if
	elseif($action == 'next'){
		include 'views/next.php';
	} // End elseif
	else{
		include 'model/scrape.php';
		scrapeData();
		include 'views/list.php';
	} // End else
?>
